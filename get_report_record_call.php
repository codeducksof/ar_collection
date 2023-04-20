<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['startdate']) && isset($_GET['enddate'])) {
    
    $startDate = $_GET['startdate'];
    $endDate = $_GET['enddate'];
    
    $result = GetReportRecordCall($empid,$startDate,$endDate);
    
    $fileurl = 'worklist/' . $empid .  'reportrecord.json';
    if (file_exists($fileurl)) {
        unlink($fileurl);
    } 
    $enc_data = array("data" => $result);  
    file_put_contents($fileurl, json_encode($enc_data));
    //echo json_encode($enc_data);
       
}

function GetReportRecordCall($empid,$startDate,$endDate) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <GET_REPORT_RECORD_CALL xmlns="http://tempuri.org/">
                      <SALES_DATE_S>'.$startDate.'</SALES_DATE_S>
                      <SALES_DATE_E>'.$endDate.'</SALES_DATE_E>
                    </GET_REPORT_RECORD_CALL>
                  </soap:Body>
                </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_REPORT_RECORD_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_REPORT_RECORD_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_REPORT_RECORD_CALLResponse->GET_REPORT_RECORD_CALLResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}



?>