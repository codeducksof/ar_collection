<?php
$pageGroup = 'USER';
$pageSlug = 'LEVEL_EMP';
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
        <title>MANAGE DATA | LEVEL</title>
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
        <link href="styles/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>

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
                                    <a href="#">Manage Data</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>จัดการพนักงานในกลุ่ม</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> จัดการพนักงานในกลุ่ม 
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

                                        </div>
                                    </div>
                                    <table class="display dataTable dtr-inline collapsed" id="WORKGROUP">

                                        <thead>
                                            <tr>
                                                <th> รหัสกลุ่ม </th>
                                                <th> ชื่อกลุ่ม </th>
                                                <th> วันที่สร้าง </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>

                                    </table>

                                </div> 

                                <div id="GROUPDETAIL" class="modal fade" role="dialog">                                    
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"> กลุ่ม <span id="pGroupName"> </span></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="tabbable-line">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#emp">พนักงาน</a></li>
                                                            <li><a data-toggle="tab" href="#role">ROLE</a></li>                                                      
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="emp" class="tab-pane fade in active">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                    <table class="display dataTable dtr-inline collapsed" id="WORKLISTEMP">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> รหัสพนักงาน </th>
                                                                                <th> ชื่อ-สกุลพนักงาน </th>
                                                                                <th> วันที่เพิ่ม </th>  
                                                                                <th> </th>   

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>

                                                                    </table>

                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                    <div class="form-group">
                                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                            <div id="emp_succ" class="alert alert-success" style="display:none;">
                                                                                <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                                            </div>
                                                                            <div id="emp_err" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> กรุณาป้อนข้อมูลให้ครบทุกช่องที่มี * !
                                                                            </div>
                                                                            <div id="emp_dup" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> รหัสพนักงานที่ป้อนเข้าระบบซ้ำในสายงานเดียวกัน !
                                                                            </div>
                                                                            <div id="emp_failed" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> ERROR โปรดติดต่อ System ADMIN * !
                                                                            </div>
                                                                            <div id="emp_del_succ" class="alert alert-success" style="display:none;">
                                                                                <strong>สำเร็จ !</strong> ลบรายการสำเร็จ  !
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <div class="form-group"> 
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="txtEmpcode">รหัสพนักงาน : <font color="red"> * </font> </label>  
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" id="txtEmpcode">
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn green" type="button" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" id="btnSearchEmp"><i class="fa fa-search"></i></button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="textEmpName">ชื่อพนักงานงาน : <font color="red"> * </font> </label>  
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="hidden" class="form-control" id="txtGroupCode" name="txtGroupCode">
                                                                                <input type="text" class="form-control" id="textEmpName" name="textEmpName" readonly="readonly">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div style="height:20px;"></div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group"> 
                                                                                <button type="button" id="btnAddEmp" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success center-block"><i class='fa fa fa-save'></i> เพิ่มพนักงาน </button>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="role" class="tab-pane fade in">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                    <table class="display dataTable dtr-inline collapsed" id="WORKROLE">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> รหัสกลุ่ม </th>
                                                                                <th> User_Role_ID </th>
                                                                                <th> User_Role_Name </th>  
                                                                                <th> วันที่เพิ่ม </th>   

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>

                                                                    </table>

                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                    <div class="form-group">
                                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                            <div id="role_succ" class="alert alert-success" style="display:none;">
                                                                                <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                                            </div>
                                                                            <div id="role_err" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> กรุณาป้อนข้อมูลให้ครบทุกช่องที่มี * !
                                                                            </div>
                                                                            <div id="role_dup" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> รหัสพนักงานที่ป้อนเข้าระบบซ้ำในสายงานเดียวกัน !
                                                                            </div>
                                                                            <div id="role_failed" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> ERROR โปรดติดต่อ System ADMIN * !
                                                                            </div>
                                                                            <div id="role_del_succ" class="alert alert-success" style="display:none;">
                                                                                <strong>สำเร็จ !</strong> ลบรายการสำเร็จ  !
                                                                            </div>
                                                                        </div>
                                                                    </div>   

                                                                    <div class="form-group"> 
                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="txtEmpcode">User_Role_ID : <font color="red"> * </font> </label>  
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" id="textRoleID" name="textRoleID">
                                                                                    <span class="input-group-btn">
                                                                                        <button class="btn green" type="button" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" id="btnSearchRole"><i class="fa fa-search"></i></button>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <label for="textEmpName"> User_Role_Name : <font color="red"> * </font> </label>  
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                               
                                                                                <input type="text" class="form-control" id="textRolename" name="textRolename" readonly="readonly">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></div>

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div style="height:20px;"></div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group"> 
                                                                                <button type="button" id="btnAddRole" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success center-block"><i class='fa fa fa-save'></i> เพิ่ม ROLE </button>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> ปิด </button>
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
        <script src="plugins/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="plugins/moment.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="plugins/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/manage_level_emp.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

    </body>