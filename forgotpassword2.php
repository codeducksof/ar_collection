<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');

$result = '';
$output = '';


if (isset($_POST['empcode']) && isset($_POST['idcard']) && isset($_POST['datebirth'])) {
   
    $idcard = $_POST['idcard'];
    $empid = $_POST['empcode'];
    $birthdate =  $_POST['datebirth'];
    
    
    $result = forGotPassword($idcard,$empid,$birthdate);
    $output = $result['STATUS'];     
    $enc_data = array("data" => $output); 
    echo json_encode($enc_data);
    
}





function forGotPassword($idcard,$empid,$birthdate){
    
    global $websrv2, $websrvnoport2;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <CHECK_BEFOR_CREATE_AND_CHANGE xmlns="http://tempuri.org/">
                      <EMP_CODE>'.$empid.'</EMP_CODE>
                      <ID_CARD>'.$idcard.'</ID_CARD>
                      <B_DATE>'.$birthdate.'</B_DATE>
                    </CHECK_BEFOR_CREATE_AND_CHANGE>
                  </soap:Body>
                </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport2,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/CHECK_BEFOR_CREATE_AND_CHANGE\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv2.'/Management_Main_User.asmx?op=CHECK_BEFOR_CREATE_AND_CHANGE');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->CHECK_BEFOR_CREATE_AND_CHANGEResponse->CHECK_BEFOR_CREATE_AND_CHANGEResult;

    $result2 = json_decode($response, true);
    return $result2;
    
}
?>