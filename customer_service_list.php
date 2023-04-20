<?php
$pageGroup = 'CUSTOMER SERVICE';
$pageSlug = 'RECORD SERVICE CALL';
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
                <title>AR COLLECTION | Customer Service</title>
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
                <link href="plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
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
                <link href="styles/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
                <link href="styles/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

                <style>
                    .underlined {
                        color: #FFF;
                        text-decoration-line: underline;
                        text-decoration-style: double;
                        background-color: #525e64;
                    }
                </style>
                <link rel="shortcut icon" href="favicon.ico" /> 
            </head>
            <!-- END HEAD -->

            <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
                <div class="page-wrapper">

                    <?php
                    include 'layout/header.php';
                    $accno = base64url_decode($_GET['accno']);
                    ?>

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
                                            <a href="#">AR Collection</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>
                                               
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="page-toolbar">

                                    </div>
                                </div>
                                <!-- END PAGE BAR -->
                                <!-- BEGIN PAGE TITLE-->
                                <h1 class="page-title"> Customer Service 
                                    <small>Add Customer Service Record Call</small>
                                </h1>
                                <!-- END PAGE TITLE-->
                                <!-- END PAGE HEADER-->
                                <!-- BEGIN DASHBOARD STATS 1-->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="portlet grey-mint box">
                                           <div class="portlet-title">
                                                <div class="form-group">                                                   
                                                    <h4><i class="icon-paper-plane"></i>ประวัติการบันทึกการโทรของลูกค้าทั่วไป</h4>
                                                </div>
                                            </div> 
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="table-toolbar">
                                                        <div class='col-md-4 col-lg-4 col-sm-4 col-xs-12'>
                                                            <div class="form-group">
                                                                <label>วันที่เริ่มต้น <font color="red">*</font></label>
                                                                <div class='input-group date' id='dateStart'>
                                                                    <input type='text' class="form-control" id="sStart" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4 col-lg-4 col-sm-4 col-xs-12'>
                                                            <div class="form-group">
                                                                <label>วันที่สิ้นสุด <font color="red">*</font></label>
                                                                <div class='input-group date' id='dateEnd'>
                                                                    <input type='text' class="form-control" id="sEnd" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-4 col-lg-4 col-sm-4 col-xs-12'>
                                                            <div class="form-group">
                                                                <button type="button" id="brnReload" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success"><i class='fa fa fa-refresh'></i> โหลดข้อมูลใหม่ </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="display dataTable dtr-inline collapsed" id="WORKLISTREPORT">
                                                        <thead>
                                                            <tr>
                                                                <th> ARM_TRACK_GROUP_DESC </th>
                                                                <th> ARM_TRACK_NAME </th>
                                                                <th> ARM_CUSTOMER_NAME </th> 
                                                                <th> ARM_CUSTOMER_TEL </th>                                                    
                                                                <th> ARM_CALL_DATE </th>                                                    
                                                                <th> ARM_EMPLOYEE_CALL_NAME </th>                                                    
                                                                <th> ARM_RECORD_CALL_DETAIL</th>
                                                                <th> CREATE_DATE</th>                                                    
                                                               

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
                                <div class="clearfix"></div>
                                <!-- END DASHBOARD STATS 1-->



                            </div>
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
        <?php //include 'layout/quicksidebar.php';    ?>

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
                <script src="plugins/jquery.dataTables.min.js" type="text/javascript"></script>
                <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

                <script src="plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="plugins/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="plugins/moment.min.js" type="text/javascript"></script>
                <script src="plugins/bootstrap-select.min.js" type="text/javascript"></script>
                <script src="plugins/jszip.min.js" type="text/javascript"></script>
                <script src="plugins/pdfmake.min.js" type="text/javascript"></script>
                <script src="plugins/vfs_fonts.js" type="text/javascript"></script>
                <script src="plugins/buttons.html5.min.js" type="text/javascript"></script>
                <script src="plugins/dataTables.buttons.min.js" type="text/javascript"></script>
                <script src="plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <script src="plugins/validator.min.js" type="text/javascript"></script>
                <script src="plugins/th.js" type="text/javascript"></script>
                <script src="plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
                <script src="plugins/jquery.pulsate.min.js" type="text/javascript"></script>
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="js/app.js" type="text/javascript"></script>
                <!-- END THEME GLOBAL SCRIPTS -->

                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                <script src="layout/scripts/layout.min.js" type="text/javascript"></script>       
                <!-- END THEME LAYOUT SCRIPTS -->        
                <script src="js/customer_service_list.js" type="text/javascript"></script>
            </body>
