<?php
$pageGroup = 'USER';
$pageSlug = 'OTP';
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
        <title>MANAGE DATA | USER OTP</title>
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
                                    <a href="#">Manage User</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>ปลดล็อค USER OTP</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> ปลดล็อค USER OTP 
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
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="portlet grey-mint box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user"></i>ปลดล็คอ User
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <form data-toggle="validator" role="form" id="frmUnlock">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="form-group">                                                   
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="txtRecieveNo">รหัสพนักงานที่โดนล็อค : <font color="red">*</font></label>  
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="number" id="txtUserLock" maxlength="13" name="txtUserLock" class="form-control"  required autofocus/>
                                                                </div>   
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                                            <div class="form-group">                                                   
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <label for="txtRecieveNo">รหัส OTP ที่ได้รับ : <font color="red">*</font></label>  
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="number" id="txtOTP" maxlength="5" name="txtOTP" class="form-control"  required autofocus/>
                                                                </div>   
                                                            </div> 
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div style="height:20px;"></div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                            <div id="succ" class="alert alert-success" style="display:none;">
                                                                <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                            </div>
                                                            <div id="err" class="alert alert-danger" style="display:none;">
                                                                <strong>ERROR !</strong> ไม่สามารถทำรายการได้. กรุณาติดต่อ SYSTEM ADMIN !
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div style="height:20px;"></div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group"> 
                                                                <button type="submit" id="btnUnlock" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success grey-mint center-block"><i class='fa fa fa-save'></i> ปลดล็อค</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div style="height:20px;"></div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="portlet grey-mint box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-list"></i>รายาร User ที่โดนล็อค
                                                </div>
                                            </div>
                                            
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="table-toolbar">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <button type="button" id="btnReload" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success center-block"><i class='fa fa fa-refresh'></i> </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <table class="display dataTable dtr-inline collapsed responsive" id="BLOCKLIST">
                                                        <thead>
                                                            <tr>
                                                                <th> รหัสพนักงาน </th>
                                                                <th> OTP </th>
                                                                <th> สถานะ </th> 
                                                                <th> วันที่โดนล็อค </th>
                                                                <th> ผู้ทำรหัสโดนล็อค </th>  
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                        </tbody>

                                                    </table>
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
            <!-- END CONTAINER -->

            <?php include 'layout/footer.php'; ?>
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

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="plugins/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="plugins/validator.min.js" type="text/javascript"></script>
        <script src="js/arcollection_user.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->

    </body>