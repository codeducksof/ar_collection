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
    $json_str = file_get_contents('worklist/'.$empid.'WORK.json');
    $fileNameExcel = 'export/export_'.$empid.'.xlsx';
    $json_obj = json_decode($json_str,true);
    $result = $json_obj['data'];
    
    $writer = new XLSXWriter();
    $writer->writeSheetHeader('ARCOLLECTION', array('User_ID_FROM'=>'string',
                                              'User_ID_TO'=>'string',
                                              'ARM_ACC_NO'=>'string',
                                              'Create_Date'=>'string',
                                              'Create_By'=>'string',
                                              'Update_Date'=>'string',
                                              'Update_By'=>'string',
                                              'InActive'=>'string',
                                              'Remark' => 'string'
                                        )
            );

    
    foreach ($result as $key => $row) {
        
        $writer->writeSheetRow('ARCOLLECTION'
                                ,array($row['User_ID_FROM']
                                    ,$row['User_ID_TO']
                                    ,$row['ARM_ACC_NO']
                                    ,$row['Create_Date']
                                    ,$row['Create_By']
                                    ,$row['Update_Date']
                                    ,$row['Update_By']                              
                                    ,$row['InActive']
                                    ,$row['Remark']
                
                ));
        
      
    }
    
    $writer->writeToFile($fileNameExcel);    
    $urlGetFile = $pathupload.$fileNameExcel;
    
    $enc_data = array("data" => $urlGetFile);
    echo json_encode($enc_data); 
    
}


?>