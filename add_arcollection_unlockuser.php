<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['empunlock']) && isset($_GET['otp'])){
    
    $unlockuser = $_GET['empunlock'];
    $otp = $_GET['otp'];
    
   
    $result = AddUnlockUser($unlockuser,$otp,$empid);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function AddUnlockUser($unlockuser,$otp,$empid){

    global $websrv2, $websrvnoport2;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
              <soap:Body>
                <UNBLOCK xmlns="http://tempuri.org/">
                  <USER>'.$unlockuser.'</USER>
                  <OTP>'.$otp.'</OTP>
                  <PROJECT_TYPE>AR_COLLECTION</PROJECT_TYPE>
                  <EMP_CODE>'.$empid.'</EMP_CODE>
                </UNBLOCK>
              </soap:Body>
            </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport2,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/UNBLOCK\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv2 . '/Management_Main_User.asmx?op=UNBLOCK');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->UNBLOCKResponse->UNBLOCKResult[0];

    $result2 = json_decode($response, true);
   
    return $result2;
}

?>