<?php
error_reporting(E_ALL);
error_reporting(-1);
set_time_limit(0);
ini_set('error_reporting', E_ALL);
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = '17910113';
//&& isset($_POST['wktype'])
if (!empty($empid)) {
    
    $wktype = 'ME015';
    $fileurl = 'worklist/' . $empid . $wktype . '.json';
    //unlink($fileurl);


		//$checkDeadLock = CheckDeadLock();

    //if($checkDeadLock[0]['LOCKED_TABLE_NAME'] == 'Not_Found'){

        if($wktype != "" || !empty($wktype)){

            if (file_exists($fileurl)) {
                unlink($fileurl);
            }
			
            $result = GetARCollection($empid,$wktype);
            //$data = count($result );
            //var_dump($result);
            //exit('1');

            if ($result == '' || empty($result)) {
                $result = array(
                    "ARM_ACC_NO" => "",
                    "ARM_BUSINESS_TYPE" => "",
                    "ARM_CUST_NAME" => "",
                    "ARM_CUST_NIC" => "",
                    "ARM_AGING_TYPE" => "",
                    "ARM_AGING_CURR_TYPE" => "",
                    "EMP_NAME" => "",
                    "ARM_PAYMENT_TYPE" => "",
                    "WORK_PLAN" => "",
                    "TIME_PLAN" => ""
                );
            }

            //if ($data != '' || !empty($data)) {
                //$record = $data[0]['Status'];
            //}else{
                //$record = 0;
            //}

            //$enc_data2 = array("data" => $record);
//        $file_tot = fopen('worklist/TOT' . $empid .$wktype . '.json', 'w');
//        fwrite($file_tot, json_encode($enc_data2));
//        fclose($file_tot);

//            $file_tot = 'worklist/TOT' . $empid .$wktype . '.json';
//            file_put_contents($file_tot, json_encode($enc_data2));

//        $file_wk = fopen('worklist/' . $empid .$wktype . '.json', 'w');
//        fwrite($file_wk, json_encode($enc_data));
//        fclose($file_wk);
            $enc_data = array("data" => $result);
            $file_wk = 'worklist/' . $empid .$wktype . '.json';
            file_put_contents($file_wk, json_encode($enc_data));
            $result2 = "SUCCESS";

        }

    //}else{
        //if (file_exists($fileurl)) {
            //unlink($fileurl);
        //}
        //$result2 = "DEADLOCK";
        //lineNoti('LOCK','ขณะนี้ระบบ AR Collection มีการ LockTable โปรดตรวจสอบใน LOG โปรแกรม');
    //}

    $enc_data2 = array("data" => $result2);
    echo json_encode($enc_data2);
    

}

function GetARCollection($empid,$wktype) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                          <soap:Body>
                            <WorkList_Main xmlns="http://tempuri.org/">
                              <EMP_CODE>'.$empid.'</EMP_CODE>
                              <MENU_CODE>'.$wktype.'</MENU_CODE>
                            </WorkList_Main>
                          </soap:Body>
                        </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/WorkList_Main\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=WorkList_Main');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->WorkList_MainResponse->WorkList_MainResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function CountARCollection($empid,$wktype) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
              <soap:Body>
                <WorkList_Main_Count xmlns="http://tempuri.org/">
                  <EMP_CODE>'.$empid.'</EMP_CODE>
                  <MENU_CODE>'.$wktype.'</MENU_CODE>
                </WorkList_Main_Count>
              </soap:Body>
            </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/WorkList_Main_Count\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=WorkList_Main_Count');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->WorkList_Main_CountResponse->WorkList_Main_CountResult[0];

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

function lineNoti($groupname,$message){

    $websrv = 'http://poss.singerthai.co.th:8002/';
    $websrvnoport = 'poss.singerthai.co.th';

    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
      <soap:Body>
        <LINE_NOTI_CALL xmlns="http://tempuri.org/">
          <GROUP>'.$groupname.'</GROUP>
          <MESSAGE>'.$message.'</MESSAGE>
        </LINE_NOTI_CALL>
      </soap:Body>
    </soap:Envelope>';


    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/LINE_NOTI_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WS_HOME.asmx?op=LINE_NOTI_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result);

    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LINE_NOTI_CALLResponse->LINE_NOTI_CALLResult;

    return $response;

}

?>