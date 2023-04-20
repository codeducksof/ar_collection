<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid)) {
    //$result = GetDashboardWorkListARCollection($empid);
    //$checkDeadLock = CheckDeadLock();
    //var_dump($checkDeadLock);
    //echo $checkDeadLock[0]['LOCKED_TABLE_NAME'];
    //exit();
    //if($checkDeadLock[0]['LOCKED_TABLE_NAME'] == 'Not_Found'){
        $result = GetMenuWorkListARCollection();
    //}else{
        //$result = "DEADLOCK";
        //lineNoti('LOCK','ขณะนี้ระบบ AR Collection มีการ LockTable โปรดตรวจสอบใน LOG โปรแกรม');
    //}

    $enc_data = array("data" => $result);
    echo json_encode($enc_data);

}



function GetDashboardWorkListARCollection($empid) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <WorkList_Dashbord_Count xmlns="http://tempuri.org/">
                      <EMP_CODE>'.$empid.'</EMP_CODE>
                    </WorkList_Dashbord_Count>
                  </soap:Body>
                </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/WorkList_Dashbord_Count\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=WorkList_Dashbord_Count');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->WorkList_Dashbord_CountResponse->WorkList_Dashbord_CountResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function GetMenuWorkListARCollection() {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <GET_AR_MENU xmlns="http://tempuri.org/" />
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_AR_MENU\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_AR_MENU');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_AR_MENUResponse->GET_AR_MENUResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function GetWorkListMainCount($empid,$boxid){
    
    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
              <soap:Body>
                <WorkList_Main_Count xmlns="http://tempuri.org/">
                  <EMP_CODE>'.$empid.'</EMP_CODE>
                  <MENU_CODE>'.$boxid.'</MENU_CODE>
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