<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['accno']) 
        && isset($_GET['aging']) 
        && isset($_GET['ssaledate']) 
        && isset($_GET['esaledate']) 
        && isset($_GET['custid']) 
        && isset($_GET['custname']) 
        && isset($_GET['saleid']) 
        && isset($_GET['salename'])
        && isset($_GET['recno'])
        && isset($_GET['snno'])  
        && isset($_GET['flagblock'])      
        ) {
    
   
    
    $accno = $_GET['accno'];
    $aging = $_GET['aging'];
    $ssaledate = $_GET['ssaledate'];
    $esaledate = $_GET['esaledate'];
    $custid = $_GET['custid'];
    $custname = $_GET['custname'];
    $saleid = $_GET['saleid'];
    $salename = $_GET['salename'];
    $recno = $_GET['recno'];
    $snno = $_GET['snno'];
    $flagblock = $_GET['flagblock'];

    //echo $empid,$accno,$aging,$ssaledate,$esaledate,$custid,$custname,$saleid,$salename;
    $result = GetARCollection($empid,$accno,$aging,$ssaledate,$esaledate,$custid,$custname,$saleid,$salename,$recno,$snno,$flagblock);
    
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);    

}

function GetARCollection($empid,$accno,$aging,$ssaledate,$esaledate,$custid,$custname,$saleid,$salename,$recno,$snno,$flagblock) {
    
    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <SEARCH_ACC xmlns="http://tempuri.org/">
                          <ACC_NO>'.$accno.'</ACC_NO>
                          <CUS_NIC>'.$custid.'</CUS_NIC>
                          <CUS_NAME>'.$custname.'</CUS_NAME>
                          <SALES_DATE_S>'.$ssaledate.'</SALES_DATE_S>
                          <SALES_DATE_E>'.$esaledate.'</SALES_DATE_E>
                          <AGING>'.$aging.'</AGING>
                          <SALES_ID>'.$saleid.'</SALES_ID>
                          <SALES_NAME>'.$salename.'</SALES_NAME>
                          <ARM_RECEIPT_MANUAL_NO>'.$recno.'</ARM_RECEIPT_MANUAL_NO>
                          <ARM_SERIAL_NO>'.$snno.'</ARM_SERIAL_NO>
                          <FLAG_BLOCK>'.$flagblock.'</FLAG_BLOCK>
                        </SEARCH_ACC>
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/SEARCH_ACC\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=SEARCH_ACC');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->SEARCH_ACCResponse->SEARCH_ACCResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}


?>