<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['wktype'])) {
    
    $wktype = $_GET['wktype']; 
    
    $fileurl = 'worklist/' . $empid . $wktype . '.json';
    if (file_exists($fileurl)) {
        unlink($fileurl);
    }   
            
    if($wktype != "" || !empty($wktype)){ 
        

        $result = GetARCollection($empid,$wktype);
        if ($result == '' || empty($result)) {            
      
           $result = array(
                "ARM_ACC_NO" => "",
                "ARM_BUSINESS_TYPE" => "",
                "ARM_CUST_NAME" => "",
                "ARM_CUST_NIC" => "",
                "ARM_AGING_TYPE" => "",
                "ARM_AGING_CURR_TYPE" => "",
                "ARM_PAYMENT_TYPE" => "",
                "WORK_PLAN" => "",
                "TIME_PLAN" => ""            
            );
           
        }
        
        $file_wk = fopen('worklist/' . $empid .$wktype . '.json', 'w');
        $worklist = array("data" => $result);
        fwrite($file_wk, json_encode($worklist));
        fclose($file_wk);
       
    }
    

}

function GetARCollection($empid,$wktype) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                          <soap:Body>
                            <WorkList_Main xmlns="http://tempuri.org/">
                              <EMP_CODE>'.$empid.'</EMP_CODE>
                              <MENU_CODE>'.$wktype.'</MENU_CODE>
                            </WorkList_Main>
                          </soap:Body>
                        </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/WorkList_Main\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=WorkList_Main');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->WorkList_MainResponse->WorkList_MainResult[0];

    $result2 = json_decode($response, true);
    
    return $result2;
}


?>