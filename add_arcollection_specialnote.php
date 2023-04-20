<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];

if (!empty($empid) && isset($_POST['accno']) && isset($_POST['txtremark'])){
    
    $accNo = $_POST['accno'];
    $reMark = checkWordBad($_POST['txtremark']);
    
    
    
    $result = AddSpecialNote($empid,$accNo,$reMark);    
    $enc_data = array("data" => $result);  
    echo json_encode($enc_data);
}


function checkWordBad($word){
    
    $strwordArr = array("แม่ง","k-u-y","k u y","k.u.y","kuy","fuck","f u c k","f.u.c.k","มึง","มึ ง","ม ึ ง","ม ึง","มงึ","มึ.ง","มึ_ง","มึ-ง","มึ+ง","กู","ค ว ย","ค- ว -ย","ค.ว.ย","คอ วอ ยอ","คอ-วอ-ยอ","ไอ้","ปี้","เหี้ย","เหี้-ย","ไอ้***","เฮี้ย","ชาติหมา","ชาดหมา","ช า ด ห ม า","ช.า.ด.ห.ม.า","ช า ติ ห ม า","ช.า.ติ.ห.ม.า","สัดหมา","สัด","หี","สันดาน","ส้นตีน","แตด") ;
    $strCensor = "*" ;

    foreach ($strwordArr as $value) {
        $word = str_replace($value,$strCensor ,$word);
    }
    return ($word);
}

function AddSpecialNote($empid,$accNo,$reMark){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Save_New_Specail_Remaek xmlns="http://tempuri.org/">
                          <ACC_CODE>'.$accNo.'</ACC_CODE>
                          <EMP_CODE>'.$empid.'</EMP_CODE>
                          <SPECAIL_REMARK>'.$reMark.'</SPECAIL_REMARK>
                        </Save_New_Specail_Remaek>
                      </soap:Body>
                    </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Save_New_Specail_Remaek\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=Save_New_Specail_Remaek');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->Save_New_Specail_RemaekResponse->Save_New_Specail_RemaekResult[0];

    $result2 = json_decode($response, true);
   
    return $result2;
}

?>