<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_POST['txtTrackCode']) && isset($_POST['txtSubTrackCode']) && isset($_POST['txtContactDate']) && isset($_POST['txtCustTel']) && isset($_POST['txtCustName']) && isset($_POST['txtLat']) && isset($_POST['txtLong']) && isset($_POST['txtRecordDesc'])){
    
    $trackCode = $_POST['txtTrackCode'];
    $subTrackCode = $_POST['txtSubTrackCode'];
    $callDAte = $_POST['txtContactDate'];
    $tel = $_POST['txtCustTel'];
    $custName = $_POST['txtCustName'];
    $lat = $_POST['txtLat'];
    $long = $_POST['txtLong'];
    $rdDetail = htmlentities($_POST['txtRecordDesc']);    

   
    
    $result = AddCustomerService($empid,$trackCode,$subTrackCode,$callDAte,$tel,$custName,$lat,$long,$rdDetail);
    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function AddCustomerService($empid,$trackCode,$subTrackCode,$callDAte,$tel,$custName,$lat,$long,$rdDetail){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Insert_Data_CustomerService xmlns="http://tempuri.org/">
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <ARM_TRACK_CODE>'.$trackCode.'</ARM_TRACK_CODE>
                          <ARM_TRACK_GROUP_ID>'.$subTrackCode.'</ARM_TRACK_GROUP_ID>
                          <ARM_CALL_DATE>'.$callDAte.'</ARM_CALL_DATE>
                          <ARM_CUSTOMER_TEL>'.$tel.'</ARM_CUSTOMER_TEL>
                          <ARM_CUSTOMER_NAME>'.$custName.'</ARM_CUSTOMER_NAME>
                          <ARM_LATITUDE>'.$lat.'</ARM_LATITUDE>
                          <ARM_LONGITUDE>'.$long.'</ARM_LONGITUDE>
                          <ARM_RECORD_CALL_DETAIL>'.$rdDetail.'</ARM_RECORD_CALL_DETAIL>
                        </Insert_Data_CustomerService>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Insert_Data_CustomerService\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Insert_Data_CustomerService');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Insert_Data_CustomerServiceResponse->Insert_Data_CustomerServiceResult[0];

    //$result2 = json_decode($response, true);
    $result2 = $response;
    return $result2;
}

?>