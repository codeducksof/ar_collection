<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if(isset($_GET['accno'])){
    $accno = $_GET['accno'];
    $result = GetDebtStep($accno);
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);
}

function GetDebtStep($accno) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
					<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
					  <soap:Body>
						<DATA_FOR_SCHEDULE_LOAN xmlns="http://tempuri.org/">
						  <Acc_No>'.$accno.'</Acc_No>
						</DATA_FOR_SCHEDULE_LOAN>
					  </soap:Body>
					</soap:Envelope>';
					 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/DATA_FOR_SCHEDULE_LOAN\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=DATA_FOR_SCHEDULE_LOAN');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->DATA_FOR_SCHEDULE_LOANResponse->DATA_FOR_SCHEDULE_LOANResult;

    $result2 = json_decode($response, true);
    return $result2;
}
?>