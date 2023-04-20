<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['empcode']) && isset($_GET['roleid']) && isset($_GET['type'])) {    
    
    $searchemp = $_GET['empcode'];
    $roleid = $_GET['roleid'];  
    $type = $_GET['type'];
    
    if($type == 'I'){
         $result = AddEmpRole($empid,$searchemp,$roleid);
    }
    
    if($type == 'D'){
         $result = AddEmpRole($empid,$searchemp,$roleid);
    }
   
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);
    
}

function AddEmpRole($empid,$searchemp,$roleid) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Insert_Role_In_User xmlns="http://tempuri.org/">
                          <User_ID>'.$searchemp.'</User_ID>
                          <User_Role_ID>'.$roleid.'</User_Role_ID>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                        </Insert_Role_In_User>
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Insert_Role_In_User\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Insert_Role_In_User');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Insert_Role_In_UserResponse->Insert_Role_In_UserResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

?>