<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['waiveid']) && isset($_GET['claim']) && isset($_GET['late']) && isset($_GET['action'])){
    
    $waiveid = $_GET['waiveid'];
    $claim = $_GET['claim'];
    $late = $_GET['late'];
    $action = $_GET['action'];
   
   
    $result = ActionWaiveRequest($empid,$waiveid,$claim,$late,$action);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function ActionWaiveRequest($empid,$waiveid,$claim,$late,$action){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <APPROVE_WAIVE_CLAME_LATE xmlns="http://tempuri.org/">
                          <ARM_WAIVE_ID>'.$waiveid.'</ARM_WAIVE_ID>
                          <AP_CLAME>'.$claim.'</AP_CLAME>
                          <AP_LATE>'.$late.'</AP_LATE>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <ARM_WAIVE_STAT>'.$action.'</ARM_WAIVE_STAT>
                        </APPROVE_WAIVE_CLAME_LATE>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/APPROVE_WAIVE_CLAME_LATE\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=APPROVE_WAIVE_CLAME_LATE');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->APPROVE_WAIVE_CLAME_LATEResponse->APPROVE_WAIVE_CLAME_LATEResult[0];

    $result2 = json_decode($response, true);
   
    return $result2;
}

?>