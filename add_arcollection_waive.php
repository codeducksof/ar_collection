<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_POST['accno']) && isset($_POST['txtremark']) && isset($_POST['claim']) && isset($_POST['late']) ){
    
    $accNo = $_POST['accno'];
    $claim = $_POST['claim'];
    $late = $_POST['late'];
    $reMark = $_POST['txtremark'];   
   
    $result = AddRequestWaive($empid,$accNo,$claim,$late,$reMark);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function AddRequestWaive($empid,$accNo,$claim,$late,$reMark){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <REQ_WAIVE_CLAME_LATE xmlns="http://tempuri.org/">
                          <ACC_NO>'.$accNo.'</ACC_NO>
                          <CLAME>'.$claim.'</CLAME>
                          <LATE>'.$late.'</LATE>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <WAIVE_COMMENT>'.$reMark.'</WAIVE_COMMENT>
                        </REQ_WAIVE_CLAME_LATE>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/REQ_WAIVE_CLAME_LATE\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=REQ_WAIVE_CLAME_LATE');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->REQ_WAIVE_CLAME_LATEResponse->REQ_WAIVE_CLAME_LATEResult[0];

    $result2 = json_decode($response, true);
   
    return $result2;
}

?>