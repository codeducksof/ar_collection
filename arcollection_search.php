<?php
include('config.php');
$pageGroup = 'ARCOLLECTION2';
$pageSlug = 'SEARCH';
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
        <title>AR COLLECTION | SEARCH</title>
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
        <link href="styles/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>
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
                                    <a href="arcollection_search.php">AR Collection Search</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>ค้นหารายการบัญชีทั้งหมด</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <?php 
                                    $permission = "true";
                                   
                                    foreach ($rolemenu as $key => $data) {  
                                        if($data['MENU_NAME'] == "SUP_RECORD_CALL"){
                                             $permission = "false";
                                        }
                                    }
                                    
                                  
                                ?>
                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Dashboard
                            <small>ค้นหารายการบัญชีทั้งหมด</small>
                           
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            
                                       
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtAccountNo"> เลขที่บัญชี : </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-book"></i>
                                                        </span>
                                                        <input type="text" id="txtAccountNo" class="form-control" placeholder="เลขที่บัญชี"> 
                                                        <input type="hidden" id="txtRoleUser" class="form-control" value="<?php echo $permission; ?>">
                                                        <input type="hidden" id="txtAccBlock" class="form-control" value="<?php echo $_SESSION['accblock']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtAging"> AGING : </label>
                                                    <select class="form-control" id="txtAging">
                                                        <option value = "">-- เลือก --</option>
                                                        <option value = "XDAY"> XDAY </option>
                                                        <option value = "OD"> OD </option>
                                                        <option value = "CURRENT"> CURRENT </option>
                                                        <option value = "EXCESS"> EXCESS </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtSSaleDate"> วันที่ขายเริ่มต้น : </label>
                                                    <div class='input-group date' id='saleSDate'>
                                                        <input type='text' class="form-control" id="txtSSaleDate" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtESaleDate"> วันที่ขายสิ้นสุด : </label>
                                                    <div class='input-group date' id='saleEDate'>
                                                        <input type='text' class="form-control" id="txtESaleDate" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtCustID"> เลขที่บัตรประชาชน ลูกค้า : </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" id="txtCustID" class="form-control" placeholder="เลขที่บัตรประชาชน"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtCustname"> ชื่อ-นามสกุล ลูกค้า : </label>
                                                    <input type="text" class="form-control" id="txtCustname" placeholder="ชื่อ">
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtSaleID"> รหัสพนักงานขาย : </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" id="txtSaleID" class="form-control" placeholder="รหัสพนักงานขาย"> 
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtSaleName"> ชื่อ-นามสกุลพนักงานขาย : </label>
                                                    <input type="text" class="form-control" id="txtSaleName" placeholder="ชื่อพนักงานขาย">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtRecNo"> ใบเสร็จมือ : </label>
                                                    <input type="text" class="form-control" id="txtRecNo" placeholder="เลขที่ใบเสร็จ">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group"> 
                                                    <label for="txtSerialNo"> S/N : </label>
                                                    <input type="text" class="form-control" id="txtSerialNo" placeholder="SN">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <button type="button" id="btnClear" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg default"><i class='fa fa fa-minus'></i> เคลียร์ </button>
                                                <button type="button" id="btnSearch" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg red"><i class='fa fa fa-search'></i> ค้นหา</button>
                                            </div>                                    
                                        </div>
                                    </div>

                                    <table class="display dataTable dtr-inline collapsed" id="WORKLIST" >
                                        <thead>
                                            <tr>
                                                <th> เลขที่บัญชี </th>
                                                <th> ประเภทบัญชี </th> 
                                                <th> ชื่อลูกค้า </th>
                                                <th> เลขบัตรประชาชนลูกค้า </th>
                                                <th> สถานะสิ้นเดือน </th> 
                                                <th> สถานะปัจจุบัน </th>
                                                <th> พนักงาน </th>
                                                <th> กลุ่มลุกค้าผู้รับผิดชอบ </th>
                                                <th> วันที่บันทึก </th>
                                                <th> ผลการโทร </th>
												<th> สถานะบัญชี </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>                                
                            </div> 
                        </div>
                        <div class="clearfix"></div>
                        <!-- END DASHBOARD STATS 1-->



                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <?php //include 'layout/quicksidebar.php';  ?>

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
		<input type="hidden" id="lbUsGroup" name="lbUsGroup" value="<?php echo $_SESSION['pdpa']; ?>">
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
        <script src="plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

        <script src="js/arcollection_search.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
    
    