<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['roleid']) && isset($_GET['groupid']) && isset($_GET['type'])) {    
    
    $groupid = $_GET['groupid'];
    $roleid = $_GET['roleid'];  
    $type = $_GET['type'];
    
    $result = AddRoleGroup($empid,$groupid,$roleid,$type);
   
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);
    
}

function AddRoleGroup($empid,$groupid,$roleid,$type) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Manange_Role_In_Group xmlns="http://tempuri.org/">
                          <User_Grp_ID>'.$groupid.'</User_Grp_ID>
                          <User_Role_ID>'.$roleid.'</User_Role_ID>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <MG_Type>'.$type.'</MG_Type>
                        </Manange_Role_In_Group>
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Manange_Role_In_Group\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Manange_Role_In_Group');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Manange_Role_In_GroupResponse->Manange_Role_In_GroupResult[0];

    $result2 = json_decode($response, true);
    return $result2;
    
}

?>