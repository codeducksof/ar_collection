<?php
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
$empid = $_SESSION['usid'];



if (!empty($empid) && isset($_POST['txtTrackCode']) && isset($_POST['txtWorkPlan']) && isset($_POST['txtArmAccNo']) && isset($_POST['txtContactDate']) && isset($_POST['ARM_CUST_NAME']) && isset($_POST['ARM_AGING_CURR_TYPE'])
        && isset($_POST['txtOpenSignalAmt']) && isset($_POST['txtDateCollect']) && isset($_POST['txtCustTel']) && isset($_POST['txtActionPer']) && isset($_POST['txtPlanDate']) && isset($_POST['txtRecordDesc']) && isset($_POST['txtLat'])
        && isset($_POST['txtLong']) && isset($_POST['txtDiscount']) && isset($_POST['txtLoff']) && isset($_POST['txtReHp']) && isset($_POST['txtFirstPayment']) && isset($_POST['txtInstallment']) && isset($_POST['txtTerm']) 
        && isset($_POST['txtRecievereturn']) && isset($_POST['txtDateReturn']) && isset($_POST['txtBranchReturn']) && isset($_POST['txtRecievePostion']) && isset($_POST['txtFordAmt']) && isset($_POST['txtFordName']) 
        && isset($_POST['txtFordPosition']) && isset($_POST['txtCloseSignalDate'])  && isset($_POST['txtOpenSignalDate'])  && isset($_POST['txtCloseDesc'])  && isset($_POST['txtCustAppointDate'])
        && isset($_POST['txtAppointmentAmt']) && isset($_POST['txtAgingCurType'])
        && isset($_POST['txttcReqLate']) && isset($_POST['txttcReqClaim']) && isset($_POST['txttcReqInstallment'])
        ){

    //$checkDeadLock = CheckDeadLock();

    //if($checkDeadLock[0]['LOCKED_TABLE_NAME'] == 'Not_Found') {

        $txtContactID = '-';
        $txtTrackCode = $_POST['txtTrackCode'];
        $txtWorkPlan = $_POST['txtWorkPlan'];
        $txtArmAccNo = $_POST['txtArmAccNo'];
        $txtContactDate = $_POST['txtContactDate'];
        $ARM_CUST_NAME = $_POST['ARM_CUST_NAME'];
        $ARM_AGING_CURR_TYPE = $_POST['ARM_AGING_CURR_TYPE'];
        $txtOpenSignalAmt = $_POST['txtOpenSignalAmt'];
        $txtDateCollect = $_POST['txtDateCollect'];

        $txtCustTel = $_POST['txtCustTel'];
        $txtActionPer = $_POST['txtActionPer'];
        $txtPlanDate = $_POST['txtPlanDate'];
        $txtRecordDesc = htmlentities($_POST['txtRecordDesc']);

        $txtLat = $_POST['txtLat'];
        $txtLong = $_POST['txtLong'];
        $txtDiscount = $_POST['txtDiscount'];
        $txtLoff = $_POST['txtLoff'];
        $txtReHp = $_POST['txtReHp'];
        $txtFirstPayment = $_POST['txtFirstPayment'];
        $txtInstallment = $_POST['txtInstallment'];
        $txtTerm = $_POST['txtTerm'];
        $txtRecievereturn = $_POST['txtRecievereturn'];
        $txtDateReturn = $_POST['txtDateReturn'];
        $txtBranchReturn = $_POST['txtBranchReturn'];
        $txtRecievePostion = $_POST['txtRecievePostion'];
        $txtFordAmt = $_POST['txtFordAmt'];
        $txtFordName = $_POST['txtFordName'];
        $txtFordPosition = $_POST['txtFordPosition'];
        $txtCloseSignalDate = $_POST['txtCloseSignalDate'];
        $txtOpenSignalDate = $_POST['txtOpenSignalDate'];
        $txtCloseDesc = $_POST['txtCloseDesc'];
        $txtCustAppointDate = $_POST['txtCustAppointDate'];

        $txtAppointmentAmt = str_replace(',', '', $_POST['txtAppointmentAmt']);

        $txtAgingCurType = $_POST['txtAgingCurType'];

        $txReqClaim = $_POST['txttcReqClaim'];
        $txReqLate = $_POST['txttcReqLate'];
        $txReqInstallment = $_POST['txttcReqInstallment'];

        if (empty($txtDiscount)) {
            $txtDiscount = '-';
        }
        if (empty($txtLoff)) {
            $txtLoff = '-';
        }
        if (empty($txtReHp)) {
            $txtReHp = '-';
        }
        if (empty($txtFirstPayment)) {
            $txtFirstPayment = '-';
        }
        if (empty($txtInstallment)) {
            $txtInstallment = '-';
        }
        if (empty($txtTerm)) {
            $txtTerm = '-';
        }
        if (empty($txtRecievereturn)) {
            $txtRecievereturn = '-';
        }
        if (empty($txtDateReturn)) {
            $txtDateReturn = '-';
        }
        if (empty($txtBranchReturn)) {
            $txtBranchReturn = '-';
        }
        if (empty($txtRecievePostion)) {
            $txtRecievePostion = '-';
        }
        if (empty($txtFordAmt)) {
            $txtFordAmt = '-';
        }
        if (empty($txtFordName)) {
            $txtFordName = '-';
        }
        if (empty($txtFordPosition)) {
            $txtFordPosition = '-';
        }
        if (empty($txtCloseSignalDate)) {
            $txtCloseSignalDate = '-';
        }
        if (empty($txtOpenSignalDate)) {
            $txtOpenSignalDate = '-';
        }
        if (empty($txtCloseDesc)) {
            $txtCloseDesc = '-';
        }
        if (empty($txtCustAppointDate)) {
            $txtCustAppointDate = '-';
        }
        if (empty($txtAppointmentAmt)) {
            $txtAppointmentAmt = '-';
        }
        if (empty($txtAgingCurType)) {
            $txtAgingCurType = '-';
        }
        if (empty($txtDateCollect)) {
            $txtDateCollect = '-';
        }
        if (empty($txtOpenSignalAmt)) {
            $txtOpenSignalAmt = '-';
        }


        $result = AddArCollection($empid, $txtContactID, $txtTrackCode, $txtArmAccNo, $txtContactDate, $txtCustTel, $ARM_CUST_NAME, $txtPlanDate, $txtWorkPlan, $txtActionPer
            , $txtCustAppointDate, $txtAppointmentAmt, $txtRecordDesc, $ARM_AGING_CURR_TYPE, $txtCloseSignalDate, $txtOpenSignalAmt, $txtCloseDesc
            , $txtDiscount, $txtReHp, $txtFirstPayment, $txtInstallment, $txtTerm, $txtLoff, $txtDateReturn, $txtBranchReturn, $txtRecievereturn
            , $txtRecievePostion, $txtFordAmt, $txtFordName, $txtFordPosition, $txtDateCollect, $txtLat, $txtLong, $txtOpenSignalDate
            , $txReqClaim, $txReqLate, $txReqInstallment
        );

        $enc_data = array("data" => $result);

    //}else{
        //$result = "DEADLOCK";
        //$enc_data = array("data" => $result);
        //lineNoti('LOCK','ขณะนี้ระบบ AR Collection มีการ LockTable โปรดตรวจสอบใน LOG โปรแกรม');
    //}

    echo json_encode($enc_data);
}

function AddArCollection($empid,$txtContactID,$txtTrackCode,$txtArmAccNo,$txtContactDate,$txtCustTel,$ARM_CUST_NAME,$txtPlanDate,$txtWorkPlan,$txtActionPer
        ,$txtCustAppointDate,$txtAppointmentAmt,$txtRecordDesc,$ARM_AGING_CURR_TYPE,$txtCloseSignalDate,$txtOpenSignalAmt,$txtCloseDesc
        ,$txtDiscount,$txtReHp,$txtFirstPayment,$txtInstallment,$txtTerm,$txtLoff,$txtDateReturn,$txtBranchReturn,$txtRecievereturn
        ,$txtRecievePostion,$txtFordAmt,$txtFordName,$txtFordPosition,$txtDateCollect,$txtLat,$txtLong,$txtOpenSignalDate
        ,$txReqClaim,$txReqLate,$txReqInstallment
        
 ){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
              <soap:Body>
                <INSERT_RECORD_CALL xmlns="http://tempuri.org/">
                  <ARM_CONTRACT_ID>'.$txtContactID.'</ARM_CONTRACT_ID>
                  <ARM_TRACK_CODE>'.$txtTrackCode.'</ARM_TRACK_CODE>
                  <ARM_ACC_NO>'.$txtArmAccNo.'</ARM_ACC_NO>
                  <ARM_CALL_DATE>'.$txtContactDate.'</ARM_CALL_DATE>
                  <ARM_CUSTOMER_TEL>'.$txtCustTel.'</ARM_CUSTOMER_TEL>
                  <ARM_CUSTOMER_NAME>'.$ARM_CUST_NAME.'</ARM_CUSTOMER_NAME>
                  <ARM_EMPLOYEE_CALL>'.$empid.'</ARM_EMPLOYEE_CALL>
                  <ARM_WORKPLAN_TIME>'.$txtPlanDate.'</ARM_WORKPLAN_TIME>
                  <ARM_WORKPLAN_ID>'.$txtWorkPlan.'</ARM_WORKPLAN_ID>
                  <ARM_OPERATOR_DEPARTMENT>'.$txtActionPer.'</ARM_OPERATOR_DEPARTMENT>
                  <ARM_OPERATOR_ID>'.$txtActionPer.'</ARM_OPERATOR_ID>
                  <ARM_CALL_STAT>-</ARM_CALL_STAT>
                  <ARM_PAYMENT_DATE>'.$txtCustAppointDate.'</ARM_PAYMENT_DATE>
                  <ARM_PAYMENT_AMT>'.$txtAppointmentAmt.'</ARM_PAYMENT_AMT>
                  <ARM_ADDRESS_TYPE>-</ARM_ADDRESS_TYPE>
                  <ARM_RECORD_CALL_DETAIL>'.$txtRecordDesc.'</ARM_RECORD_CALL_DETAIL>
                  <ARM_AGING_TYPE>'.$ARM_AGING_CURR_TYPE.'</ARM_AGING_TYPE>
                  <ARM_RUNNING_FLAG>-</ARM_RUNNING_FLAG>
                  <ARM_SIGNAL_CLOSE_DATE>'.$txtCloseSignalDate.'</ARM_SIGNAL_CLOSE_DATE>
                  <ARM_SIGNAL_OPEN_DATE>'.$txtOpenSignalDate.'</ARM_SIGNAL_OPEN_DATE>
                  <ARM_SIGNAL_OPEN_AMT>'.$txtOpenSignalAmt.'</ARM_SIGNAL_OPEN_AMT>
                  <ARM_OPEN_REASON>'.$txtCloseDesc.'</ARM_OPEN_REASON>
                  <ARM_CONTACT_PLACE>-</ARM_CONTACT_PLACE>
                  <ARM_MONEY_DISCOUNT>'.$txtDiscount.'</ARM_MONEY_DISCOUNT>
                  <ARM_REFINANCE_AMT>'.$txtReHp.'</ARM_REFINANCE_AMT>
                  <ARM_FIRST_COLLECT>'.$txtFirstPayment.'</ARM_FIRST_COLLECT>
                  <ARM_INSTALLMENT_AMT>'.$txtInstallment.'</ARM_INSTALLMENT_AMT>
                  <ARM_INSTALLMENT_COUNT>'.$txtTerm.'</ARM_INSTALLMENT_COUNT>
                  <ARM_FEE_AMT>'.$txtLoff.'</ARM_FEE_AMT>
                  <ARM_IMPOUND_DATE>'.$txtDateReturn.'</ARM_IMPOUND_DATE>
                  <ARM_SHOP_NAME>'.$txtBranchReturn.'</ARM_SHOP_NAME>
                  <ARM_RECIEVER_PRODUCT>'.$txtRecievereturn.'</ARM_RECIEVER_PRODUCT>
                  <ARM_RECIEVER_POSITION>'.$txtRecievePostion.'</ARM_RECIEVER_POSITION>
                  <ARM_CORRUPT_AMT>'.$txtFordAmt.'</ARM_CORRUPT_AMT>
                  <ARM_CORRUPT_NAME>'.$txtFordName.'</ARM_CORRUPT_NAME>
                  <ARM_CORRUPT_POSITION>'.$txtFordPosition.'</ARM_CORRUPT_POSITION>
                  <ARM_DATE_COLLECT>'.$txtDateCollect.'</ARM_DATE_COLLECT>
                  <ARM_LATITUDE>'.$txtLat.'</ARM_LATITUDE>
                  <ARM_LONGITUDE>'.$txtLong.'</ARM_LONGITUDE>
                  <ARM_FIX_FLAG>-</ARM_FIX_FLAG>
                  <ARM_RQ_NUMBER>-</ARM_RQ_NUMBER>
                  <ARM_RQ_DATE>-</ARM_RQ_DATE>
                  <ARM_RQ_TEL>-</ARM_RQ_TEL>
                  <ARM_RQ_STATUS>-</ARM_RQ_STATUS>
                  <ARM_RQ_REMARK>-</ARM_RQ_REMARK>
                  <USER_TYPE>-</USER_TYPE>
                  <CLAIM>'.$txReqClaim.'</CLAIM>
                  <LATE>'.$txReqLate.'</LATE>
                  <INSTALLMENT>'.$txReqInstallment.'</INSTALLMENT>
                </INSERT_RECORD_CALL>
              </soap:Body>
            </soap:Envelope>';
   
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/INSERT_RECORD_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=INSERT_RECORD_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->INSERT_RECORD_CALLResponse->INSERT_RECORD_CALLResult;

    //$result2 = json_decode($response, true);
    $result2 = $response;
    return $result2;
}


function CheckDeadLock(){

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <DEADLOCK_TABLE_SELECT xmlns="http://tempuri.org/" />
                      </soap:Body>
                    </soap:Envelope>';

    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/DEADLOCK_TABLE_SELECT\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=DEADLOCK_TABLE_SELECT');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->DEADLOCK_TABLE_SELECTResponse->DEADLOCK_TABLE_SELECTResult[0];

    $result2 = json_decode($response, true);
    return $result2;

}

function lineNoti($groupname,$message){

    $websrv = 'http://poss.singerthai.co.th:8002/';
    $websrvnoport = 'poss.singerthai.co.th';

    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
      <soap:Body>
        <LINE_NOTI_CALL xmlns="http://tempuri.org/">
          <GROUP>'.$groupname.'</GROUP>
          <MESSAGE>'.$message.'</MESSAGE>
        </LINE_NOTI_CALL>
      </soap:Body>
    </soap:Envelope>';


    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/LINE_NOTI_CALL\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WS_HOME.asmx?op=LINE_NOTI_CALL');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result);

    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->LINE_NOTI_CALLResponse->LINE_NOTI_CALLResult;

    return $response;

}

?>