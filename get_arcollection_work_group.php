<?php

ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid)) {

    //$checkDeadLock = CheckDeadLock();
    $fileurl = 'worklist/' . $empid . 'GROUP_WORK.json';

    //if($checkDeadLock[0]['LOCKED_TABLE_NAME'] == 'Not_Found') {

        if (file_exists($fileurl)) {
            unlink($fileurl);
        }
        $result = GetARCollection($empid);

        if ($result == '' || empty($result)) {
			
            $result = array(
                "ID" => "",
                "ARM_ACC_NO" => "",
                "ARM_CUST_MOBILE" => "",
                "ARM_GROUP_ASSIGN" => "",
                "ARM_ACC_STATUS" => "",
                "USER_REV" => "",
                "CREATE_DATE" => "",
                "CREATE_BY" => ""                
            );
			
        }
		
        $result2 = "SUCCESS";

    $enc_data = array("data" => $result);
    $file_wk = fopen('worklist/'.$empid.'GROUP_WORK.json', 'w');
    fwrite($file_wk, json_encode($enc_data));
    fclose($file_wk);
    //}else{

        //if (file_exists($fileurl)) {
            //unlink($fileurl);
        //}
        //$result2 = "DEADLOCK";
    //}

    $enc_data2 = array("data" => $result2);
    echo json_encode($enc_data2);
    //echo json_encode($enc_data);
}

function GetARCollection($empid) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
						<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
						  <soap:Body>
							<LOAD_GET_ARM_T_PORT_AUTO_DIAL xmlns="http://tempuri.org/" />
						  </soap:Body>
						</soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/LOAD_GET_ARM_T_PORT_AUTO_DIAL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=LOAD_GET_ARM_T_PORT_AUTO_DIAL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LOAD_GET_ARM_T_PORT_AUTO_DIALResponse->LOAD_GET_ARM_T_PORT_AUTO_DIALResult;

    $result2 = json_decode($response, true);
    return $result2;
}

function CheckDeadLock(){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <DEADLOCK_TABLE_SELECT xmlns="http://tempuri.org/" />
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/DEADLOCK_TABLE_SELECT\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=DEADLOCK_TABLE_SELECT');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->DEADLOCK_TABLE_SELECTResponse->DEADLOCK_TABLE_SELECTResult[0];

    $result2 = json_decode($response, true);
    return $result2;

}
?>