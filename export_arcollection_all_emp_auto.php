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
    $json_str = file_get_contents('worklist/'.$empid.'WORK_EMP.json');
    $fileNameExcel = 'export/export_emp_auto_'.$empid.'.xlsx';
    $json_obj = json_decode($json_str,true);
    $result = $json_obj['data'];
    
    $writer = new XLSXWriter();
    $writer->writeSheetHeader('ARM_T_GROP_CALL', array('ID'=>'string',
                                              'ARM_GROUP_NAME'=>'string',
                                              'ARM_GROP_CHILD'=>'string',
                                              'ARM_GRUOP_PARENT'=>'string',
                                              'CREATE_DATE'=>'string',
                                              'CREATE_BY'=>'string',
                                              'UPDATE_DATE'=>'string',
                                              'UPDATE_BY'=>'string',
                                              'ACTIVE' => 'string'
                                        )
            );

    
    foreach ($result as $key => $row) {
        
        $writer->writeSheetRow('ARM_T_GROP_CALL'
                                ,array($row['ID']
                                    ,$row['ARM_GROUP_NAME']
                                    ,$row['ARM_GROP_CHILD']
                                    ,$row['ARM_GRUOP_PARENT']
                                    ,$row['CREATE_DATE']
                                    ,$row['CREATE_BY']
                                    ,$row['UPDATE_DATE']                              
                                    ,$row['UPDATE_BY']
                                    ,$row['ACTIVE']
                
                ));
        
      
    }
    
    $writer->writeToFile($fileNameExcel);    
    $urlGetFile = $pathupload.$fileNameExcel;
    
    $enc_data = array("data" => $urlGetFile);
    echo json_encode($enc_data); 
    
}


?>