<?php
ini_set('max_execution_time', 123456);
ini_set('memory_limit', '-1');
session_start();
header('Content-Type: text/html; charset=utf-8');
include('config.php');
require_once 'PHP_XLSXWriter/xlsxwriter.class.php';
$empid = $_SESSION['usid'];

if (!empty($empid)) {
    
    
    $rowNo = 2;
    $json_str = file_get_contents('worklist/'.$empid.'reportrecord.json');
    $fileNameExcel = 'export/export_'.$empid.'reportrecord.xlsx';
    $json_obj = json_decode($json_str,true);
    $result = $json_obj['data'];
    
    $writer = new XLSXWriter();
    $writer->writeSheetHeader('ARCOLLECTION', array('ARM_ACC_NO'=>'string',
                                              'ARM_AGING_TYPE'=>'string',
                                              'ARM_CALL_DATE'=>'string',
                                              'ARM_COLLECTOR_NAME_TH'=>'string',
                                              'ARM_DEPARTMENT_NAME'=>'string',
                                              'ARM_PAYMENT_AMT'=>'string',
                                              'ARM_PAYMENT_DATE'=>'string',
                                              'ARM_RECORD_CALL_DETAIL'=>'string',
                                              'ARM_TRACK_CODE' => 'string',
                                              'ARM_TRACK_NAME'=>'string',
                                              'ARM_EMPLOYEE_CALL_NAME'=>'string',
                                              'ARM_CUSTOMER_TEL'=>'string',
        
                                        )
            );

    
    foreach ($result as $key => $row) {
        
        if(!empty($row['ARM_CALL_DATE'])){
           $calldate = date('d/m/Y H:i:s',strtotime($row['ARM_CALL_DATE']));
        }else{
           $calldate = null; 
        }
       
        
        if(!empty($row['ARM_PAYMENT_DATE'])){
           $paymentdate = date('d/m/Y H:i:s',strtotime($row['ARM_PAYMENT_DATE']));
        }else{
           $paymentdate = null; 
        }
       
        $writer->writeSheetRow('ARCOLLECTION'
                                ,array($row['ARM_ACC_NO']
                                    ,$row['ARM_AGING_TYPE']
                                    ,$calldate
                                    ,$row['ARM_COLLECTOR_NAME_TH']
                                    ,$row['ARM_DEPARTMENT_NAME']
                                    ,$row['ARM_PAYMENT_AMT']
                                    ,$paymentdate                             
                                    ,$row['ARM_RECORD_CALL_DETAIL']
                                    ,$row['ARM_TRACK_CODE']
                                    ,$row['ARM_TRACK_NAME']
                                    ,$row['ARM_EMPLOYEE_CALL_NAME']
                                    ,$row['ARM_CUSTOMER_TEL']
                
                ));
        
      
    }
    
    $writer->writeToFile($fileNameExcel);    
    $urlGetFile = $pathupload.$fileNameExcel;
    
    $enc_data = array("data" => $urlGetFile);
    echo json_encode($enc_data); 
    
}


?>