<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_GET['wktype'])) {
    
    $wktype = $_GET['wktype']; 
    
    $filetoturl = 'worklist/TOT' . $empid . $wktype . '.json';
    if (file_exists($filetoturl)) {
        unlink($filetoturl);
    }      
        
    if($wktype != "" || !empty($wktype)){ 
        
        $data = CountARCollection($empid,$wktype);

        if ($data != '' || !empty($data)) {
            
            $record = $data[0]['Status'];
            
        }else{            
           $record = 0; 
           
        }
        
        $enc_data = array("data" => $record);
        
//        $file_tot = fopen('worklist/TOT' . $empid .$wktype . '.json', 'w');        
//        fwrite($file_tot, json_encode($enc_data));
//        fclose($file_tot);        
        
        //$file_tot = 'worklist/TOT' . $empid .$wktype . '.json';
        //file_put_contents($file_tot, json_encode($enc_data));
          
        
        echo json_encode($enc_data);
       
    }
    

}

function CountARCollection($empid,$wktype) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
              <soap:Body>
                <WorkList_Main_Count xmlns="http://tempuri.org/">
                  <EMP_CODE>'.$empid.'</EMP_CODE>
                  <MENU_CODE>'.$wktype.'</MENU_CODE>
                </WorkList_Main_Count>
              </soap:Body>
            </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/WorkList_Main_Count\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=WorkList_Main_Count');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->WorkList_Main_CountResponse->WorkList_Main_CountResult[0];

    $result2 = json_decode($response, true);
    
    return $result2;
}

?>