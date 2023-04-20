<?php

ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid)) {

    //$checkDeadLock = CheckDeadLock();
    $fileurl = 'worklist/' . $empid . 'WORK_GROUP_EMP.json';

    //if($checkDeadLock[0]['LOCKED_TABLE_NAME'] == 'Not_Found') {

        if (file_exists($fileurl)) {
            unlink($fileurl);
        }
        $result = GetARCollection($empid);

        if ($result == '' || empty($result)) {
            $result = array(
                "ARM_GROUP_NAME" => "",
                "ARM_GROUP_DESC" => "",
                "CREATE_DATE" => "",
                "CREATE_BY" => "",
                "UPDATE_DATE" => "",
                "UPDATE_BY" => "",
                "ACTIVE" => "",
               
            );
        }
        $result2 = "SUCCESS";

    $enc_data = array("data" => $result);
    $file_wk = fopen('worklist/'.$empid.'WORK_GROUP_EMP.json', 'w');
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
						<LOAD_ARM_M_GROP_CALL xmlns="http://tempuri.org/" />
					  </soap:Body>
					</soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/LOAD_ARM_M_GROP_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=LOAD_ARM_M_GROP_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LOAD_ARM_M_GROP_CALLResponse->LOAD_ARM_M_GROP_CALLResult;

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