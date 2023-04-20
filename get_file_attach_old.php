<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if(isset($_GET['path'])){
    
    $path = base64_decode($_GET['path']);
    $result = GetFileAttach($path);
     header( "location:".$result );
    
}

function GetFileAttach($filepath) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <GetArFileAttach xmlns="http://tempuri.org/">
                          <pathFile>'.$filepath.'</pathFile>
                        </GetArFileAttach>
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host: poss.singerthai.co.th" ,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GetArFileAttach\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL,  'http://poss.singerthai.co.th:8121/GetAttachfile.asmx?op=GetArFileAttach');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    
   
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GetArFileAttachResponse->GetArFileAttachResult;
	
//    if(!empty($response)){
//		
//        $files = file_get_contents($response);
//        header('Content-Type: application/octet-stream');
//        header("Content-Transfer-Encoding: Binary"); 
//        header("Content-disposition: attachment; filename=\"".$file_name."\""); 
//        readfile($file_url);
//        exit;
//       
//		
//    }
	curl_close($soap_do);
       

    return $response;
}

?>