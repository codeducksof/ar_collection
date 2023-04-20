<?php
@ini_set('upload_max_size' , '256M');
@ini_set('post_max_size', '256M');
@ini_set('max_execution_time', 123456);
@ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_FILES)) {
    
    $fileName = $_FILES['txtImportFile']['name'];
    $fileType = $_FILES['txtImportFile']['type'];
    $fileTmp = $_FILES["txtImportFile"]["tmp_name"];
    
    $fullPathFile = UploadFileImport($fileTmp,$fileName,$fileType,$pathupload2,$empid);
    
    
//    echo $fileName;
//    echo $fullPathFile;    
//    exit();
    $result = ImportFile($fullPathFile,$empid,$fileName);
    // var_dump($result); 
    // echo $fullPathFile;
    // echo $empid;
    // echo $fileName;
    // exit();
//    var_dump($result);
//    exit();
//   echo $fileName."<br />";
//   echo $fullPathFile;
//   exit();
    $enc_data = array("data" => $result);
    echo json_encode($enc_data);
    
}

function UploadFileImport($fileTmp,$fileName,$fileType,$pathupload,$empid){
    
    $year = date("Y");   
    $month = date("m");   
    $day = date("d");
    $main = $year.$month.$day;
    
    if(!is_dir('import/'.$main)){
        mkdir('import/'.$main); 
    }
    
    if (!is_dir('import/'.$main.'/'.$empid)) {
        mkdir('import/'.$main.'/'.$empid);
    }
    
    $path = 'import/' . $main . '/' . $empid . '/';
    $pathfile = $path . $fileName;
    move_uploaded_file($fileTmp, $pathfile);
    $fileulr = $pathupload . $pathfile;
    
    return $fileulr;
    
}

function ImportFile($fiePathUrl,$empid,$fileName){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Import_File_Excel_ARM_M_GROP_CALL  xmlns="http://tempuri.org/">
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <File_Name>'.$fileName.'</File_Name>
                          <Full_Path>'.$fiePathUrl.'</Full_Path>
                        </Import_File_Excel_ARM_M_GROP_CALL>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Import_File_Excel_ARM_M_GROP_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Import_File_Excel_ARM_M_GROP_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Import_File_Excel_ARM_M_GROP_CALLResponse->Import_File_Excel_ARM_M_GROP_CALLResult[0];

    //$result2 = json_decode($response, true);
    $result2 = $response;
    return $result2;
}

?>