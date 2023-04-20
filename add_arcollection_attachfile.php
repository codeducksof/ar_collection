<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_FILES) && isset($_POST['txtAttachName']) && isset($_POST['txtAttachDesc']) && isset($_POST['txtAccNo'])) {
    
    
    
    $fileNameDesc = $_POST['txtAttachName'];
    $fileDesc = $_POST['txtAttachDesc'];
    $accNo = $_POST['txtAccNo'];
   
    $fileName = $_FILES['txtFileAttach']['name'];
    $fileType = $_FILES['txtFileAttach']['type'];
    $fileTmp = $_FILES["txtFileAttach"]["tmp_name"];
    $fullPathFile = UploadFileAttach($accNo,$fileTmp,$fileName,$fileType,$pathupload,$empid);
    
    $result = AddAttachFile($empid,$accNo,$fullPathFile,$fileNameDesc,$fileDesc);    
    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}

function UploadFileAttach($accNo,$fileTmp,$fileName,$fileType,$pathupload,$empid){
    
    $year = date("Y");   
    $month = date("m");   
    $day = date("d");
    $main = $year.$month.$day;
    
    if(!is_dir('upload/'.$main)){
        mkdir('upload/'.$main); 
    }
    
    if (!is_dir('upload/'.$main.'/'.$accNo)) {
        mkdir('upload/'.$main.'/'.$accNo);
    }
    
    if (!is_dir('upload/'.$main.'/'.$accNo.'/'.$empid)) {
        mkdir('upload/'.$main.'/'.$accNo.'/'.$empid);
    }
    $path = 'upload/' . $main . '/' .$accNo. '/' . $empid . '/';
    $pathfile = $path . $fileName;
    move_uploaded_file($fileTmp, $pathfile);
    $fileulr = $pathupload . $pathfile;
    
    return $fileulr;
    
}

function AddAttachFile($empid,$accNo,$fullPathFile,$fileNameDesc,$fileDesc){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Save_Attach_File xmlns="http://tempuri.org/">
                          <ARM_ACC_NO>'.$accNo.'</ARM_ACC_NO>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <PATH>'.$fullPathFile.'</PATH>
                          <NAME_DOC>'.$fileNameDesc.'</NAME_DOC>
                          <DESC_DOC>'.$fileDesc.'</DESC_DOC>
                        </Save_Attach_File>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Save_Attach_File\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Save_Attach_File');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Save_Attach_FileResponse->Save_Attach_FileResult[0];

    $result2 = json_decode($response, true);
    //$result2 = $response;
    return $result2;
}

?>