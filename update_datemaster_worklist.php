<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['pStart']) && isset($_GET['pEnd'])) {    
    
    $pStartDate = $_GET['pStart'];
    $pEndDate = $_GET['pEnd'];   
    
    $result = UpdateDateMaster($empid,$pStartDate,$pEndDate);    
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);
    
}

function UpdateDateMaster($empid,$pStartDate,$pEndDate) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Update_M_Date xmlns="http://tempuri.org/">
                          <S_DATE>'.$pStartDate.'</S_DATE>
                          <E_DATE>'.$pEndDate.'</E_DATE>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                        </Update_M_Date>
                      </soap:Body>
                    </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Update_M_Date\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Update_M_Date');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Update_M_DateResponse->Update_M_DateResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

?>