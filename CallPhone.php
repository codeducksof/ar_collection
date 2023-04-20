<?php 
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];


if(isset($_GET['telno']) && !empty($empid)){
    
    $telNo = $_GET['telno'];    
    $result = CallPhone($empid,$telNo);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
    
}


function CallPhone($empid,$telNo){

    //global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <CallPhone xmlns="http://tempuri.org/">
                          <User>'.$empid.'</User>
                          <Tel>'.$telNo.'</Tel>
                        </CallPhone>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host: poss.singerthai.co.th" ,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/CallPhone\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, 'http://poss.singerthai.co.th:8124/WsZoiper.asmx?op=CallPhone');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->CallPhoneResponse->CallPhoneResult;
    $result = $response;
   
    return $result;
}


?>