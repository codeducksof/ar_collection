<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');

$result = '';
$output = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
   
    $user = $_POST['username'];
    $password = $_POST['password'];
    
    
    $result = CheckeExpirePassword($user,$password);
    //var_dump($result);
    //exit();
        
    if($result['STATUS'] == 'Fail' || $result['STATUS'] == 'Exp' || $result['STATUS'] == 'Block'){
       $output = array( "STATUS" => (string) $result['STATUS'],"OTP" => (string) $result['OTP'] );
    }else{
        
        $empid = $_POST['username'];        
        $menufile = '';
        $menufile = GetMenuWorkListARCollection();
        $role = GetRolwMenu($empid);
        $pdpa = GetDataPDPA($empid);
        $userAccBlock = GetDataBlockAccount($empid);
        //echo $userAccBlock['statusAccBlock'];
        //exit();
		//$pdpa['PDPA_C_FLAG'];
		
		
        if (!empty($menufile)) {
             $fileurl13 = 'worklist/' . $empid .'WAIVE.json';
                if (file_exists($fileurl13)) {
                     unlink($fileurl13);
                }   
            foreach ($menufile as $key => $value) {                
                $fileurl1 = 'worklist/' . $empid .$value['MENU_CODE'].'.json';
                if (file_exists($fileurl1)) {
                     unlink($fileurl1);
                }   
                $fileurl12 = 'worklist/TOT' . $empid .$value['MENU_CODE'].'.json';
                if (file_exists($fileurl12)) {
                     unlink($fileurl12);
                }    
                
            }
        }
  
        sleep(1);
        $_SESSION = array();
        $_SESSION['usid'] = $_POST['username'];
        $_SESSION['usname'] = (string)$result['EMP_NAME'];
        $_SESSION['role'] = $role;
        $_SESSION['start'] = time();      
        $_SESSION['expire'] = $_SESSION['start'] + (180 * 60);  
		$_SESSION['pdpa'] = $pdpa['PDPA_C_FLAG'];
        $_SESSION['accblock'] = $userAccBlock['statusAccBlock'];
		
        $output = array( "STATUS" => "Succ","OTP" => "" );
        //$output = "Succ";
       
    }
     
    
}

$enc_data = array("data" => $output); 
echo json_encode($enc_data);


function checkLogin($username, $password) {
    
    global $websrv,$websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <Login xmlns="http://tempuri.org/">
                          <EMP_CODE>'.$username.'</EMP_CODE>
                          <EMP_BDATE>'.$password.'</EMP_BDATE>
                        </Login>
                      </soap:Body>
                    </soap:Envelope>';
    
   

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:".$websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/Login\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv.'/WebService_Main_AR_Collection.asmx?op=Login');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result);
   
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LoginResponse->LoginResult;
    
    return $response[0];
}

function GetMenuWorkListARCollection() {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <GET_AR_MENU xmlns="http://tempuri.org/" />
                      </soap:Body>
                    </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_AR_MENU\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_AR_MENU');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_AR_MENUResponse->GET_AR_MENUResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function GetRolwMenu($empcode) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <GET_MAIN_MANU_USER xmlns="http://tempuri.org/">
                      <EMP_CODE>'.$empcode.'</EMP_CODE>
                    </GET_MAIN_MANU_USER>
                  </soap:Body>
                </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_MAIN_MANU_USER\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_MAIN_MANU_USER');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_MAIN_MANU_USERResponse->GET_MAIN_MANU_USERResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function CheckeExpirePassword($user,$password){
    
    global $websrv2, $websrvnoport2;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                  <soap:Body>
                    <CHECK_USER_EXPIRED xmlns="http://tempuri.org/">
                      <USER>'.$user.'</USER>
                      <PASS>'.$password.'</PASS>
                      <PROJECT_TYPE>AR_COLLECTION</PROJECT_TYPE>
                    </CHECK_USER_EXPIRED>
                  </soap:Body>
                </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport2,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/CHECK_USER_EXPIRED\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv2 . '/Management_Main_User.asmx?op=CHECK_USER_EXPIRED');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->CHECK_USER_EXPIREDResponse->CHECK_USER_EXPIREDResult;

    $result2 = json_decode($response, true);
    return $result2;
    
}

function GetDataPDPA($empcode) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
			<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
			  <soap:Body>
				<GET_PDPA_AR_USER xmlns="http://tempuri.org/">
				  <Emp_Code>'.$empcode.'</Emp_Code>
				</GET_PDPA_AR_USER>
			  </soap:Body>
			</soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_PDPA_AR_USER\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_PDPA_AR_USER');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_PDPA_AR_USERResponse->GET_PDPA_AR_USERResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}

function GetDataBlockAccount($empcode) {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
			<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
			  <soap:Body>
				<GET_USER_ACC_BLOCK xmlns="http://tempuri.org/">
				  <Emp_Code>'.$empcode.'</Emp_Code>
				</GET_USER_ACC_BLOCK>
			  </soap:Body>
			</soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_USER_ACC_BLOCK\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_USER_ACC_BLOCK');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_USER_ACC_BLOCKResponse->GET_USER_ACC_BLOCKResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}
?>