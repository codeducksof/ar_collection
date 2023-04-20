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
    $json_str = file_get_contents('worklist/'.$empid.'GROUP_WORK.json');
    $fileNameExcel = 'export/export_'.$empid.'GROUP_WORK.xlsx';
    $json_obj = json_decode($json_str,true);
    $result = $json_obj['data'];
    
    $writer = new XLSXWriter();
    $writer->writeSheetHeader('ARM_T_PORT_AUTO_DIAL', array(
                                              'ID'=>'string',
                                              'ARM_ACC_NO'=>'string',
                                              'ARM_CUST_MOBILE'=>'string',
                                              'ARM_GROUP_ASSIGN'=>'string',
                                              'ARM_ACC_STATUS'=>'string',
                                              'USER_REV'=>'string',
                                              'CREATE_DATE'=>'string',
                                              'CREATE_BY' => 'string'
                                        )
            );

    
    foreach ($result as $key => $row) {
        
        $writer->writeSheetRow('ARM_T_PORT_AUTO_DIAL'
                                ,array($row['ID']
                                    ,$row['ARM_ACC_NO']
                                    ,$row['ARM_CUST_MOBILE']
                                    ,$row['ARM_GROUP_ASSIGN']
                                    ,$row['ARM_ACC_STATUS']
                                    ,$row['USER_REV']
                                    ,$row['CREATE_DATE']                              
                                    ,$row['CREATE_BY']
                                    
                
                ));
        
      
    }
    
    $writer->writeToFile($fileNameExcel);    
    $urlGetFile = $pathupload.$fileNameExcel;
    
    $enc_data = array("data" => $urlGetFile);
    echo json_encode($enc_data); 
    
}


?>