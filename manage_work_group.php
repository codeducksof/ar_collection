<?php
$pageGroup = 'MANAGE';
$pageSlug = 'WORK2';
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>MANAGE DATA | WORK</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="styles/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="styles/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="styles/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <link href="styles/responsive.dataTables.min.css" rel="stylesheet"  type="text/css" />
        <link href="styles/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="styles/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">

            <?php include 'layout/header.php'; ?>

            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">

                <?php include 'layout/sidebar.php'; ?>
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->


                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#">Manage Data AUTODIAL</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>จัดการงาน AUTODIAL</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> จัดการงาน AUTODIAL
                            <small></small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="portlet-body">

                                    <div class="table-toolbar">
                                        <div class="form-group">
                                            <div id="imsucc" class="alert alert-success" style="display:none;">
                                                <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                            </div>
                                            <div id="imerr" class="alert alert-danger" style="display:none;">
                                                <strong>ERROR !</strong> ไม่สามารถทำรายการได้. กรุณาติดต่อ SYSTEM ADMIN !
                                                <span id="errdt"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <button type="button" id="brnReload" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success"><i class='fa fa fa-refresh'></i> โหลดข้อมูลใหม่ </button>
                                            <button type="button" id="btnExport" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-info"><i class='fa fa fa-file'></i> ส่งออกข้อมูล </button>
                                            <button type="button" id="btnImport" data-target="#uploadfile" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-warning"><i class='fa fa fa-file'></i> นำเข้าข้อมูล </button>
<!--                                            <button type="button" id="btnClear" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-danger"><i class='fa fa fa-recycle'></i> ล้างข้อมูลทั้งหมด </button>-->
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label>User_ID_FROM :</label>
                                                    <div id="filterPerson"></div>
                                                </div>
                                               
                                        </div>
                                    </div>
                                    <table class="display dataTable dtr-inline collapsed" id="WORKALL">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> ARM_ACC_NO </th> 
                                                <th> ARM_CUST_MOBILE </th>                                               
                                                <th> ARM_GROUP_ASSIGN </th> 
                                                <th> ARM_ACC_STATUS </th>  
                                                <th> USER_REV </th>
                                                <th> CREATE_DATE </th>
                                                <th> CREATE_BY </th>                                              
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>

                                    <!-- Modal -->
                                    <div id="uploadfile" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><i class='fa fa fa-file'></i> นำเข้าข้อมูล</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form data-toggle="validator" role="form" id="frmImportFile">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="txtAttachDesc">เอกสารนำเข้า : <font color="red">*</font></label>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div id="filinputg" class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="input-group input-large">
                                                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                <span class="fileinput-filename"> </span>
                                                                            </div>
                                                                            <span class="input-group-addon btn default btn-file">
                                                                                <span class="fileinput-new"> เลือกไฟล์ </span>
                                                                                <span class="fileinput-exists"> แก้ไข </span>
                                                                                <input type="file" name="txtImportFile" id="txtImportFile" required autofocus> 
                                                                            </span>
                                                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> ลบ </a>
                                                                        </div>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                <div id="asucc" class="alert alert-success" style="display:none;">
                                                                    <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                                </div>
                                                                <div id="aerr" class="alert alert-danger" style="display:none;">
                                                                    <strong>ERROR !</strong> ไม่สามารถทำรายการได้. กรุณาติดต่อ SYSTEM ADMIN !
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div style="height:20px;"></div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group"> 
                                                                    <button type="submit" id="btnFileImport" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-danger center-block"><i class='fa fa fa-save'></i> นำเข้าข้อมูล </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div style="height:20px;"></div>
                                                            </div>
                                                        </div>
                                                     </form>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->



                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <?php //include 'layout/quicksidebar.php'; ?>

                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>

            </div>
            <!-- END CONTAINER -->

            <?php include 'layout/footer.php'; ?>
        </div>
        <div class="bg_load"></div>
            <div class="wrapper">
                <div class="inner">
                    <span>L</span>
                    <span>o</span>
                    <span>a</span>
                    <span>d</span>
                    <span>i</span>
                    <span>n</span>
                    <span>g</span>
                </div>
            </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="plugins/jquery.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="plugins/moment.min.js" type="text/javascript"></script>
        <script src="plugins/validator.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="layout/scripts/layout.min.js" type="text/javascript"></script>
       <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="js/arcollection_work_group.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

    </body>