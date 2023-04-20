<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');


if (isset($_GET['empcode'])){
    
    $empcode = $_GET['empcode'];
    $result = unlockList($empcode);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function unlockList($empcode){

    global $websrv2, $websrvnoport2;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <LIST_BLOCK xmlns="http://tempuri.org/">
                      <USER>'.$empcode.'</USER>
                    </LIST_BLOCK>
                  </soap:Body>
                </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport2,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/LIST_BLOCK\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv2 . '/Management_Main_User.asmx?op=LIST_BLOCK');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LIST_BLOCKResponse->LIST_BLOCKResult[0];

    $result2 = json_decode($response, true);
   
    return $result2;
}

?>