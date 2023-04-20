<?php
include('validateLogin.php');
$pageGroup = 'WAVECLAIM';
$pageSlug;
if(isset($_GET['pageslug'])){
    $pageSlug = $_GET['pageslug'];
}


$accno = '';
if (isset($_GET['accno']) && isset($_GET['readonly'])) {

    if (base64_encode(base64_decode($_GET['accno'])) === $_GET['accno']) {
        $readonly = $_GET['readonly'];
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
                <title>AR COLLECTION | <?php echo $pageSlug; ?> Detail</title>
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
                    <div class="page-header navbar navbar-fixed-top">
                        <!-- BEGIN HEADER INNER -->
                        <div class="page-header-inner ">
                            <!-- BEGIN LOGO -->
                            <div class="page-logo">
                                <a class="logo-default" href="home.php" style="color:#fff;">AR <span style="color:#F3565D;">Collection</span> <span  class="badge">V.2.0

                </span></a>
                                <!--                       <a href="">
                                                            <span>AR Collection</span>
                                                            <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />

                                                        </a>-->
                                <div class="menu-toggler sidebar-toggler">
                                    <span></span>
                                </div>
                            </div>
                            <!-- END LOGO -->
                            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                                <span></span>
                            </a>
                            <!-- END RESPONSIVE MENU TOGGLER -->
                            <!-- BEGIN TOP NAVIGATION MENU -->
                            <div class="top-menu">
                                <ul class="nav navbar-nav pull-right">
                                    <!--                             BEGIN NOTIFICATION DROPDOWN
                                                                 DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte
                                                                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                        <i class="icon-bell"></i>
                                                                        <span class="badge badge-default"> 7 </span>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="external">
                                                                            <h3>
                                                                                <span class="bold">12 pending</span> notifications</h3>
                                                                            <a href="page_user_profile_1.html">view all</a>
                                                                        </li>
                                                                        <li>
                                                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">just now</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-success">
                                                                                                <i class="fa fa-plus"></i>
                                                                                            </span> New user registered. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">3 mins</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-danger">
                                                                                                <i class="fa fa-bolt"></i>
                                                                                            </span> Server #12 overloaded. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">10 mins</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-warning">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </span> Server #2 not responding. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">14 hrs</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-info">
                                                                                                <i class="fa fa-bullhorn"></i>
                                                                                            </span> Application error. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">2 days</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-danger">
                                                                                                <i class="fa fa-bolt"></i>
                                                                                            </span> Database overloaded 68%. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">3 days</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-danger">
                                                                                                <i class="fa fa-bolt"></i>
                                                                                            </span> A user IP blocked. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">4 days</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-warning">
                                                                                                <i class="fa fa-bell-o"></i>
                                                                                            </span> Storage Server #4 not responding dfdfdfd. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">5 days</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-info">
                                                                                                <i class="fa fa-bullhorn"></i>
                                                                                            </span> System Error. </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="time">9 days</span>
                                                                                        <span class="details">
                                                                                            <span class="label label-sm label-icon label-danger">
                                                                                                <i class="fa fa-bolt"></i>
                                                                                            </span> Storage server failed. </span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                 END NOTIFICATION DROPDOWN -->
                                    <!--                             BEGIN INBOX DROPDOWN
                                                                 DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte
                                                                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                        <i class="icon-envelope-open"></i>
                                                                        <span class="badge badge-default"> 4 </span>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="external">
                                                                            <h3>You have
                                                                                <span class="bold">7 New</span> Messages</h3>
                                                                            <a href="app_inbox.html">view all</a>
                                                                        </li>
                                                                        <li>
                                                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <span class="photo">
                                                                                            <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                                                        <span class="subject">
                                                                                            <span class="from"> Lisa Wong </span>
                                                                                            <span class="time">Just Now </span>
                                                                                        </span>
                                                                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <span class="photo">
                                                                                            <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                                                        <span class="subject">
                                                                                            <span class="from"> Richard Doe </span>
                                                                                            <span class="time">16 mins </span>
                                                                                        </span>
                                                                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <span class="photo">
                                                                                            <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                                                                        <span class="subject">
                                                                                            <span class="from"> Bob Nilson </span>
                                                                                            <span class="time">2 hrs </span>
                                                                                        </span>
                                                                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <span class="photo">
                                                                                            <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                                                                        <span class="subject">
                                                                                            <span class="from"> Lisa Wong </span>
                                                                                            <span class="time">40 mins </span>
                                                                                        </span>
                                                                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <span class="photo">
                                                                                            <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                                                                        <span class="subject">
                                                                                            <span class="from"> Richard Doe </span>
                                                                                            <span class="time">46 mins </span>
                                                                                        </span>
                                                                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                 END INBOX DROPDOWN -->
                                    <!--                             BEGIN TODO DROPDOWN
                                                                 DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte
                                                                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                        <i class="icon-calendar"></i>
                                                                        <span class="badge badge-default"> 3 </span>
                                                                    </a>
                                                                    <ul class="dropdown-menu extended tasks">
                                                                        <li class="external">
                                                                            <h3>You have
                                                                                <span class="bold">12 pending</span> tasks</h3>
                                                                            <a href="app_todo.html">view all</a>
                                                                        </li>
                                                                        <li>
                                                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">New release v1.2 </span>
                                                                                            <span class="percent">30%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">40% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">Application deployment</span>
                                                                                            <span class="percent">65%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">65% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">Mobile app release</span>
                                                                                            <span class="percent">98%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">98% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">Database migration</span>
                                                                                            <span class="percent">10%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">10% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">Web server upgrade</span>
                                                                                            <span class="percent">58%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">58% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">Mobile development</span>
                                                                                            <span class="percent">85%</span>
                                                                                        </span>
                                                                                        <span class="progress">
                                                                                            <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">85% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:;">
                                                                                        <span class="task">
                                                                                            <span class="desc">New UI release</span>
                                                                                            <span class="percent">38%</span>
                                                                                        </span>
                                                                                        <span class="progress progress-striped">
                                                                                            <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                                                                <span class="sr-only">38% Complete</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                 END TODO DROPDOWN -->
                                    <!-- BEGIN USER LOGIN DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <input type="hidden" id="txtEmpID" value="<?php echo $_SESSION['usid']; ?>">
                                            <span class="username"><i class="fa fa-user"></i> <?php echo $_SESSION['usid']." (".$_SESSION['usname'].")"; ?> </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <!--                                    <li>
                                                                                    <a href="page_user_profile_1.html">
                                                                                        <i class="icon-user"></i> My Profile </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="app_calendar.html">
                                                                                        <i class="icon-calendar"></i> My Calendar </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="app_inbox.html">
                                                                                        <i class="icon-envelope-open"></i> My Inbox
                                                                                        <span class="badge badge-danger"> 3 </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="app_todo.html">
                                                                                        <i class="icon-rocket"></i> My Tasks
                                                                                        <span class="badge badge-success"> 7 </span>
                                                                                    </a>
                                                                                </li>
                                                                                <li class="divider"> </li>
                                                                                <li>
                                                                                    <a href="page_user_lock_1.html">
                                                                                        <i class="icon-lock"></i> Lock Screen </a>
                                                                                </li>-->
                                            <li>
                                                <a href="changepassworduser.php">
                                                    <i class="icon-lock"></i> เปลี่ยนรหัสผ่าน </a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <i class="icon-key"></i> ออกจากระบบ </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- END USER LOGIN DROPDOWN -->
                                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <!--                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                                                    <a href="javascript:;" class="dropdown-toggle">
                                                                        <i class="icon-logout"></i>
                                                                    </a>
                                                                </li>-->
                                    <!-- END QUICK SIDEBAR TOGGLER -->
                                </ul>
                            </div>
                            <!-- END TOP NAVIGATION MENU -->
                        </div>
                        <!-- END HEADER INNER -->
                    </div>
                    <?php
                    //include 'layout/header.php';
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
                                                <?php
                                                if (!empty($result)) {

                                                    foreach ($result as $key => $value) {

                                                        if ($value['MENU_CODE'] == $pageSlug) {
                                                            echo $value['MENU_NAME'];
                                                        }
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="page-toolbar">

                                    </div>
                                </div>
                                <!-- END PAGE BAR -->
                                <!-- BEGIN PAGE TITLE-->
                                <h1 class="page-title"> รายการบัญชีเลขที่ 
                                    <small><?php echo $accno; ?><input type='hidden' id='txtGetAccNo' name='txtGetAccNo' value='<?php echo $accno; ?>'></small>
                                </h1>
                                <!-- END PAGE TITLE-->
                                <!-- END PAGE HEADER-->
                                <!-- BEGIN DASHBOARD STATS 1-->
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="portlet-body">
                                            <div class="tabbable-line">

                                                <div class="text-center" id="dtLoading" style="display:none;"><i class="fa fa-circle-o-notch fa-spin fa-4x fa-fw"></i></div>

                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab" href="#ar">รายละเอียดบัญชี</a></li>
                                                    <li><a data-toggle="tab" id="btnRecord" href="#record">บันทึกผลการติดตาม</a></li>
                                                    <li><a data-toggle="tab" id="btnCustomer" href="#customer">ผู้เช่าซื้อ/ผู้ค้ำ</a></li>
                                                    <li><a data-toggle="tab" id="btnPayment" href="#payment">รายละเอียดการชำระเงิน</a></li>
                                                    <li><a data-toggle="tab" id="btnMail" href="#mail">จดหมายตอบกลับ</a></li>
                                                    
                                                    <li><a data-toggle="tab" id="btnFile" href="#attach">เอกสารแนบ</a></li>
                                                    <li><a data-toggle="tab" id="btnSpecialNote" href="#specialnote">SPECIAL NOTE</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="ar" class="tab-pane fade in active">
                                                        <div class="table-toolbar">

                                                            <div class="col-lg-2 col-md-2 col-sm-2">

                                                            </div>
                                                            <!--- TAG แจ้งเตือน -->
                                                            <div id="tagNotification" class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-top:20px;display:none;">

                                                                <div class="alert alert-danger alert-dismissable">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                    <span><i class="fa fa-bell"></i> <strong>แจ้งเตือน</strong> &nbsp;</span><span id="txtTagNotifucation"></span>  
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2">

                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div class="portlet grey-mint box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-list"></i>ข้อมูลรายละเอียดบัญชี
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">

                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>สินค้า :</label>
                                                                                <div class="table-scrollable">
                                                                                    <table class="table table-bordered table-hover">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th> # </th>
                                                                                                <th> รหัสสินค้า </th>
                                                                                                <th> รายละเอียดสินค้า </th>
                                                                                                <th> รายละเอียดสินค้ารุ่นสินค้า </th>
                                                                                                <th> ซีเรียล </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="lbProduct">

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ประเภทบัญชี :</label> <label id="ARM_BUSINESS_TYPE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>เลขที่บัญชี :</label> <label id="ARM_ACC_NO">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="alert alert-info">

                                                                                <label>สถานะ ณ สิ้นเดือน :</label> <label id="ARM_AGING_TYPE">  </label>

                                                                            </div>                                                                    
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="alert alert-info">

                                                                                <label>สถานะปัจจุบัน :</label> <label id="ARM_AGING_CURR_TYPE">  </label>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>สถานะบัญชี :</label> <label id="ARM_ACC_STAT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>กลุ่มลูกค้า :</label> <label id="ARM_PAYMENT_TYPE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>บัญชีโครงการประวัติดี Refinance :</label> <label id="REFINANCE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <!--
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>รหัสสินค้า :</label> <label id="ARM_SALES_PART_CODE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ซีเรียล :</label> <label id="ARM_SERIAL_NO">  </label>
                                                                            </div>
                                                                        </div>-->
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ราคาเช่าซื้อ :</label> <label id="ARM_HP_PRICE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ราคาเงินสด(Vat) :</label> <label id="ARM_CASH_PRICE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>เงินดาวน์ :</label> <label class="alert-info" style="padding:5px;"  id="ARM_DOWN_AMT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ค่างวด :</label> <label class="alert-info" style="padding:5px;"  id="ARM_INSTALLMENT_AMT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>งวดที่ชำระ/ทั้งหมด :</label> <label class="alert-success" style="padding:5px;" id="ARM_CONTRACT_TERM">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ยอดคงเหลือ :</label> <label class="alert-warning" style="padding:5px;" id="ARM_BALANCE_AMT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>จำนวนเดือนที่ติด M-Arr :</label> <label class="alert-danger" style="padding:5px;" id="ARM_MNT_ARREAR">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>จำนวนเงินที่ชำระ :</label> <label class="alert-success" style="padding:5px;" id="ARM_PAID_AMT">  </label>
                                                                            </div>
                                                                        </div>                                                                
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="note note-warning">

                                                                                <label>ยอดค้างชำระ :</label> <label id="ARM_ARREAR_AMT">  </label>

                                                                            </div>                                                                    
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="note note-danger">

                                                                                <label>ยอด Claim :</label> <label id="CLAIM_FEE">  </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="note note-danger">

                                                                                <label>ยอด Late :</label> <label id="LATE_FEE">  </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="note note-success">

                                                                                <label>ยอดเงินที่ต้องชำระทั้งหมด :</label> <label id="MUST_PAID">  </label>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ยึดคืน ยกเลิก และส่วนลด :</label> <label id="ARM_DISCOUNT_AMT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>สถานะการปิดปัญชี :</label> <label id="ARM_CLOSED_TYPE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ยอดเงินค้างชำระ (OD เดิม) :</label> <label class="alert-danger" style="padding:5px;" id="ARM_ORG_ARREAR_AMT">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ยอดเงินที่ต้องชำระทั้งหมด (OD เดิม) :</label> <label class="alert-danger" style="padding:5px;" id="ARM_ORG_ARREAR_AMT_PAD">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>สถานะลูกหนี้ ณ สิ้นเดือน (OD เดิม) :</label> <label class="alert-danger" style="padding:5px;" id="ARM_ORG_AGING_CURR_TYPE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>สถานะลูกหนี้ ณ ปัจจุบัน (OD เดิม) :</label> <label class="alert-danger" style="padding:5px;" id="ARM_ORG_AGING_TYPE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันที่ปิดบัญชี :</label> <label id="ARM_CLOSED_DATE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <h4 class="text-info">ข้อมูลการขาย</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>เขต/ภาค :</label> <label id="A_R">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ร้านสาขา :</label> <label id="DEP_NAME_THA">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>โอนจาก :</label> <label id="ARM_PREVIOUS_ACCNO">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันที่โอน :</label> <label id="ARM_VARIATION_DATE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันที่ขาย :</label> <label id="ARM_SALES_DATE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>พนักงานขาย :</label> <label id="SALES_MAN">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>เบอร์โทรพนักงานขาย :</label> <label id="EMP_MOBILE_NO">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>พนักงานเก็บเงิน :</label> <label id="COLLECTOR">  </label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันที่ครบกำหนดชำระครั้งแรก :</label> <label id="ARM_FIRST_DUEDATE">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันที่ครบกำหนดสัญญา :</label> <label id="ARM_MATURITY_DATE">  </label>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>  
                                                    <div id="customer" class="tab-pane fade in">
                                                        <input type="hidden" id="tabCustomer" name="tabCustomer" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading2" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i> </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                            <div class="portlet blue-steel box">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-user"></i>ผู้เช่าซื้อ
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ชื่อลูกค้า :</label> <label id="ARM_CUST_NAME">  </label>
                                                                            </div> 
                                                                        </div> 
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                                   
                                                                            <div class="form-group">                                                   
                                                                                <label>เลขบัตรประชาชน :</label> <label id="ARM_CUST_NIC">  </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>วันเกิด :</label> <label id="BirthDate">  </label>
                                                                            </div>
                                                                        </div> 
                                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>อายุ :</label> <label id="AgeYears">  </label>
                                                                            </div> 
                                                                        </div> 
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>กลุ่มอาชีพ/อาชีพ :</label> <label id="OCCUPATION"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ที่อยู่ตามทะเบียนบ้าน :</label> <label id="ADDRESS_ID"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="alert alert-info">

                                                                                <label>เบอร์โทร :</label> <label id="TEL_ID"> </label>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ที่อยู่ปัจจุบัน :</label> <label id="ADDRESS_CURRENT"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="alert alert-info">

                                                                                <label>เบอร์โทร :</label> <label id="TEL_CURRENT"> </label>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ที่อยู่ที่ทำงาน :</label> <label id="ADDRESS_COMPANY"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="alert alert-info">

                                                                                <label>เบอร์โทร :</label> <label id="TEL_COMPANY"> </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <label>ที่อยู่จัดส่งเอกสาร :</label> <label id="ADDRESS_DOCUMENT"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="alert alert-info">
                                                                                <label>เบอร์โทร :</label> <label id="TEL_DOCUMENT"> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                            <div class="form-group">                                                   
                                                                                <label>ผู้อ้างอิง1 :</label> <label id="OTHER_C1"> </label>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                            <div class="form-group">                                                   
                                                                                <label>ผู้อ้างอิง2 :</label> <label id="OTHER_C2"> </label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="lbGrantor">

                                                        </div>


                                                    </div>
                                                    <div id="payment" class="tab-pane fade in">
                                                        <input type="hidden" id="tabPayment" name="tabPayment" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading3" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i></div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="portlet blue box">
                                                                <div class="portlet-title">
                                                                    <div class="form-group">                                                   
                                                                        <h4><i class="fa fa-list-alt"></i> ประวัติการชำระเงิน</h4>
                                                                    </div>  
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <button type="button" id="btnRefreshPay" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success blue center-block"><i class='fa fa fa-refresh'></i> </button>
                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="PAYMENT">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> DPS </th>
                                                                                            <th> วันที่ใบเสร็จ </th> 
                                                                                            <th> เลขที่ใบเสร็จ </th>
                                                                                            <th> ประเภท </th> 
                                                                                            <th> ค่างวด </th>  
                                                                                            <th> ค่าปรับ </th>
                                                                                            <th> ค่าติดตาม </th>
                                                                                            <th> อื่นๆ </th>
                                                                                            <th> ช่องทางชำระ </th>
                                                                                            <th> ยอดโอน </th>
                                                                                            <th> วันที่โอน </th>
                                                                                            <th> REF4 </th>
                                                                                            <th> สถานะ </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>


                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr class="underlined">
                                                                                            <th>รวม</th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th> 
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="portlet yellow-gold box">
                                                                <div class="portlet-title">
                                                                    <div class="form-group">                                                   
                                                                        <h4><i class="fa fa-list-alt"></i> รายละเอียด CLAIM/LATE</h4>
                                                                    </div> 
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <button type="button" id="btnRefreshClaim" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success yellow-gold center-block"><i class='fa fa fa-refresh'></i> </button>

                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="WAIVE">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> ปี </th>
<!--                                                                                            <th> เดือน </th> -->
                                                                                            <th> เลขที่บัญชี </th>
                                                                                            <th> ค่างวด </th> 
                                                                                            <th> AGING </th>  
                                                                                            <th> เบี้ยปรับล่าช้าของงวดที่แล้ว </th>
                                                                                            <th> เบี้ยปรับล่าช้าเดือนปัจจุบัน </th>
                                                                                            <th> เบี้ยปรับล่าช้าที่ชำระเข้ามา </th>
                                                                                            <th> ยอดที่ขอ Waive </th>
                                                                                            <th> เบี้ยปรับล่าช้าเดือนถัดไป </th>
                                                                                            <th> ค่าติดตามล่าช้าของงวดที่แล้ว </th>
                                                                                            <th> ค่าติดตามงวดปัจจุบัน </th>
                                                                                            <th> ค่าติดตามล่าช้าที่ชำระเข้ามา </th>
                                                                                            <th> WAIVE </th>
                                                                                            <th> ค่าติดตามเดือนถัดไป </th>
                                                                                            <th> หมายเหตุ </th>
                                                                                            <th> WAIVE หมายเหตุ </th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>


                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr class="underlined">
                                                                                            <th>รวม</th>
<!--                                                                                            <th></th>-->
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th> 
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                            <th></th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet grey-mint box">
                                                                <div class="portlet-title">
                                                                    <div class="form-group">                                                   
                                                                        <h4><i class="fa fa-list-alt"></i> WAIVE CLAIM/LATE</h4>
                                                                    </div> 
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <div class="form-group">
                                                                                        
                                                                                        <button type="button" id="btnRefreshWaive" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success"><i class='fa fa fa-refresh'></i> </button>                                                                            
                                                                                         <?php if ($readonly == 'false') { ?>
                                                                                        <button type="button" id="btnRequestWaive" data-toggle="modal" data-target="#REWAIVE" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-primary"><i class='fa fa fa-plus'></i> </button>
                                                                                         <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="WAIVEREQUEST">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> WAIVE CODE </th>
                                                                                            <th> จำนวนเงินที่ขอ WAIVE </th>                                                                                         
                                                                                            <th> จำนวนเงินที่ WAIVE </th> 
                                                                                            <th> รายละเอียด </th> 
                                                                                            <th> ผู้ขออนุมัติ </th>
                                                                                            <th> วันที่ขออนุมัติ </th>
                                                                                            <th> สถานะ </th>
                                                                                            <th> </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>


                                                                                    </tbody>
                                                                                </table>
                                                                                <div id="ACTIONWAIVE" class="modal fade" role="dialog">                                    
                                                                                    <div class="modal-dialog modal-lg">
                                                                                                <!-- Modal content-->
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                        <h4 class="modal-title"> WAIVE ACTION <span id="lbWaiveID"></span> </h4>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label> CLAIM </label>
                                                                                                                        <input type="number" id="aClaim" name="aClaim" class="form-control" >
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label> LATE </label>
                                                                                                                        <input type="number" id="aLate" name="aLate" class="form-control" >
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label> ยอดที่ขอ WAIVE </label>
                                                                                                                        <input type="number" id="aWaive" name="aWaive" class="form-control" readonly="readonly">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label> ยอดที่อนุมัติ WAIVE </label>
                                                                                                                        <input type="number" id="aApproveWaive" name="aApproveWaive" class="form-control" readonly="readonly">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label> รายละเอียด </label>
                                                                                                                        <textarea id="aRemark" name="aRemark" class="form-control" readonly="readonly"></textarea>
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
                                                                                                                <div class="form-group">
                                                                                                                    <button type="button" id="btnApprove" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success"><i class='fa fa-check'></i> อนุมัติ </button>
                                                                                                                    <button type="button" id="btnReject" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-danger"><i class='fa fa-close'></i> ปฏิเสธ </button>
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
                                                                        <div id="REWAIVE" class="modal fade" role="dialog">                                    
                                                                            <div class="modal-dialog modal-lg">
                                                                                <!-- Modal content-->
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        <h4 class="modal-title"> สร้างใบคำขอ WAIVE CLAIM/LATE</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="form-group">
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                                                        <div id="c_succ" class="alert alert-success" style="display:none;">
                                                                                                            <strong>SUCCESS !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                                                                        </div>
                                                                                                        <div id="c_err" class="alert alert-danger" style="display:none;">
                                                                                                            <strong>ERROR !</strong> ไม่สามารถบันทึกข้อมูลได้กรุณาตอดต่อ SYSTEM ADMIN !
                                                                                                        </div>
                                                                                                        <div id="c_warining" class="alert alert-warning" style="display:none;">
                                                                                                            <strong>WARNING !</strong> ยอดเงินที่ขอเกินกว่าความเป็นจริง !
                                                                                                        </div>
                                                                                                        <div id="c_warining2" class="alert alert-warning" style="display:none;">
                                                                                                            <strong>WARNING !</strong> กรุณาป้อนข้อมูลให้ครบ * !
                                                                                                        </div>
                                                                                                       
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group"> 
                                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                                        <label> ยอด CLAIM <font style="color:red;">*</font></label>
                                                                                                        <input type="number" id="reClaim" name="reClaim" class="form-control">                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                                         <label> ยอด LATE <font style="color:red;">*</font></label>
                                                                                                         <input type="number" id="reLate" name="reLate" class="form-control">      
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                                        <label> ยอดเงินที่ขอ WAIVE <font style="color:red;">*</font></label>
                                                                                                        <input type="number" id="reWaive" name="reWaive" class="form-control" readonly="readonly">                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                                        <label> ยอดเงินที่สามรถขอได้ <font style="color:red;">*</font></label>
                                                                                                        <input type="number" id="reRequestMaxAmt" name="reRequestMaxAmt" class="form-control" readonly="readonly">                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                                         <label> หมายเหตุ </label>
                                                                                                         <textarea id="reRemark" name="reRemark" class="form-control"></textarea>
                                                                                                    </div>
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <div style="height:20px;"></div>
                                                                                                    </div>
                                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                        <div class="form-group"> 
                                                                                                            <button type="button" id="btnCreateRequest" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success center-block"><i class='fa fa fa-save'></i> ส่งใบคำขอ </button>
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
                                                            </div>




                                                        </div>
                                                    </div>
                                                    <div id="mail" class="tab-pane fade in">
                                                        <input type="hidden" id="tabMail" name="tabMail" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading4" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i></div>
                                                        </div>
                                                        <div class="portlet red-mint box">
                                                            <div class="portlet-title">
                                                                <div class="form-group">                                                   
                                                                    <h4><i class="fa fa-mail-forward"></i> จดหมายตอบกลับ</h4>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <button type="button" id="btnRefreshMail" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success red-mint center-block"><i class='fa fa fa-refresh'></i> </button>
                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="MAIL">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> เลขที่ใบแจ้งหนี้ </th>
                                                                                            <th> รหัสบาร์โค้ด </th> 
                                                                                            <th> ประเภทจดหมาย </th>
                                                                                            <th> วันที่ออกใบแจ้งหนี้/วันที่ได้รับคืน </th> 
                                                                                            <th> สถานะใบแจ้งหนี้ </th>  
                                                                                            <th> การตอบกลับ </th>


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
                                                    <div id="record" class="tab-pane fade in">
                                                        <input type="hidden" id="tabRecord" name="tabRecord" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading5" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i></div>
                                                        </div>
        <?php if ($readonly == 'false') { ?>
                                                            <div class="portlet grey-mint box">
                                                                <div class="portlet-title">
                                                                    <div class="form-group">                                                   
                                                                        <h4><i class="fa fa-reply"></i> บันทึกผลการติดตาม</h4>
                                                                    </div>
                                                                </div>

                                                                <div class="portlet-body">

                                                                    <div class="row">


                                                                        <form data-toggle="validator" role="form" id="frmAddrecordCall">
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtRecieveNo">เบอร์โทรติดต่อ : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="tel" id="txtCustTel" maxlength="10" name="txtCustTel" pattern="^[0-9-+s()]*$" class="form-control"  required autofocus/>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtRecieveNo">ผลการติดตาม : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="txtTrackCode" required autofocus>
                                                                                            <option value="" data-subtext=""> --- เลือก --- </option>                                                               
                                                                                        </select>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtRecieveNo">แผนงาน : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="txtWorkPlan" required autofocus>
                                                                                            <option value="" data-subtext=""> --- เลือก --- </option>

                                                                                        </select>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtRecieveNo">วัน/เวลา ที่ติดตาม : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <div class='input-group date' id='cContactDate'>
                                                                                                <input type='text' class="form-control" id="txtContactDate" name='txtContactDate' disabled="disabled" required autofocus/>
                                                                                                <span class="input-group-addon">
                                                                                                    <span class="glyphicon glyphicon-calendar">
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtActionPer">ผู้ดำเนินการ : </label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" id="txtActionPer" name="txtActionPer">
                                                                                            <option value="" data-subtext=""> --- เลือก --- </option>
                                                                                        </select>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="cPlanDate">วัน/เวลา แผนงาน : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="form-group">
                                                                                            <div class='input-group date' id='cPlanDate'>
                                                                                                <input type='text' class="form-control" id="txtPlanDate" name='txtPlanDate' required autofocus/>
                                                                                                <span class="input-group-addon">
                                                                                                    <span class="glyphicon glyphicon-calendar">
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group"> 
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtRecordDesc">รายละเอียดผลการติดตาม : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <textarea id="txtRecordDesc" name="txtRecordDesc" rows="5" class="form-control" required autofocus></textarea>
                                                                                    </div>   

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group"> 
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtLat">ละติจูด : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="text" id="txtLat" name="txtLat" class="form-control" readonly="readonly" required autofocus>
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group"> 
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtLong">ลองจิจูด : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="text" id="txtLong" name="txtLong" class="form-control" readonly="readonly" required autofocus>
                                                                                    </div> 

                                                                                </div>
                                                                            </div>  
                                                                            <div id="bldiscount" style="display:none;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtDiscount">จำนวนเงินที่ให้ส่วนลด : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtDiscount" name="txtDiscount" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>    
                                                                            </div>
                                                                            <div id="bldrefinance" style="display:none;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtLoff">ค่าธรรมเนียม : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtLoff" name="txtLoff" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtReHp">ราคาเช่าซื้อรีไฟแนนซ์ : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtReHp" name="txtReHp" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtFirstPayment">จำนวนเงินที่เก็บครั้งแรก : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtFirstPayment" name="txtFirstPayment" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtInstallment">ค่างวด : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtInstallment" name="txtInstallment" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtTerm">จำนวนงวด : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtTerm" name="txtTerm" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 

                                                                            </div>
                                                                            <div id="blreturn" style="display:none;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtRecievereturn">ผู้รับสินค้า : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" id="txtRecievereturn" name="txtRecievereturn" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="cDateReturn">วันที่ยึดคืน : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <div class='input-group date' id='cDateReturn'>
                                                                                                    <input type='text' class="form-control" id="txtDateReturn" name="txtDateReturn"/>
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon glyphicon-calendar">
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtBranchReturn">คืนสินค้าที่สาขา : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" id="txtBranchReturn" name="txtBranchReturn" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 

                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtRecievePostion">ตำแหน่งผู้รับคืนสินค้า : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" id="txtRecievePostion" name="txtRecievePostion" class="form-control" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div> 
                                                                            </div>
                                                                            <div id="blford" style="display:none;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtFordAmt">จำนวนเงินที่ทุจริต : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtFordAmt" name="txtFordAmt" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtFordName">ชื่อผู้ทุจริต : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" id="txtFordName" name="txtFordName" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>  
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtFordPosition">ตำแหน่งผู้ทุจริต : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" id="txtFordPosition" name="txtFordPosition" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                            </div>
                                                                            <div id="blsignal" style="display:none;">
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group">                                                   
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="cCloseSignalDate">วัน/เวลา ปิดสัญญาณ : <font color="red">*</font></label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <div class='input-group date' id='cCloseSignalDate'>
                                                                                                    <input type='text' class="form-control" id="txtCloseSignalDate" name="txtCloseSignalDate" />
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon glyphicon-calendar">
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>   
                                                                                    </div>                                                   
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group">                                                   
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="cOpenSignalDate">วัน/เวลา เปิดสัญญาณ : <font color="red">*</font></label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <div class='input-group date' id='cOpenSignalDate'>
                                                                                                    <input type='text' class="form-control" id="txtOpenSignalDate" name="txtOpenSignalDate" />
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon glyphicon-calendar">
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>   
                                                                                    </div>                                                   
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group">
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtOpenSignalAmt">ค่าต่อสัญญาณ : <font color="red">*</font></label>  
                                                                                        </div> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type='number' class="form-control" id="txtOpenSignalAmt" name="txtOpenSignalAmt" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtCloseDesc">สาเหตุการเปิด : <font color="red">*</font></label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <textarea id="txtCloseDesc" name="txtCloseDesc" rows="5" class="form-control"></textarea>
                                                                                        </div>   

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div id="blpayment" style="display:none;">    
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group">                                                   
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="cCustAppointDate">วัน/เวลา นัดชำระ : <font color="red">*</font></label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <div class='input-group date' id='cCustAppointDate'>
                                                                                                    <input type='text' class="form-control" id="txtCustAppointDate" name="txtCustAppointDate"/>
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon glyphicon-calendar">
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>   
                                                                                    </div>                                                   
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group">                                                   
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtAppointmentAmt">จำนวนเงินที่ชำระ : <font color="red">*</font></label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="number" id="txtAppointmentAmt" name="txtAppointmentAmt"  pattern="^(0|[1-9][0-9]*)$" class="form-control"/>
                                                                                        </div>   
                                                                                    </div>                                                   
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                    <div class="form-group"> 
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <label for="txtTerm">วันที่เก็บเงิน : </label>  
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="form-group">
                                                                                                <div class='input-group date' id='cDateCollect'>
                                                                                                    <input type='text' class="form-control" id="txtDateCollect" name="txtDateCollect" disabled="disabled"/>
                                                                                                    <span class="input-group-addon">
                                                                                                        <span class="glyphicon glyphicon-calendar">
                                                                                                        </span>
                                                                                                    </span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
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
                                                                                    <button type="submit" id="btnSaveRecordCall" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success grey-mint center-block"><i class='fa fa fa-save'></i> บันทึก</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div style="height:20px;"></div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
        <?php } ?>
                                                        <div class="portlet grey-mint box">
                                                            <div class="portlet-title">
                                                                <div class="form-group">                                                   
                                                                    <h4><i class="fa fa-reply"></i> ประวัติการติดตาม</h4>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <button type="button" id="btnRefreshRecord" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success grey-mint center-block"><i class='fa fa fa-refresh'></i> </button>
                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="RECORD">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th> วันที่ติดต่อ </th>
                                                                                            <th> เบอร์ที่ติดต่อ </th> 
                                                                                            <th> ผลการติดตาม </th>                                                                                   
                                                                                            <th> แผนงาน </th> 
                                                                                            <th> หน่วยงานที่รับผิดชอบ </th>  
                                                                                            <th> ผู้ดำเนินการ </th>                                                                                   
                                                                                            <th> วัน/เวลาแผนงาน </th>  
                                                                                            <th> ID </th>  
                                                                                            <th> ผู้บันทึก </th>

                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>


                                                                                    </tbody>
                                                                                </table>
                                                                            </div> 
                                                                            <!-- Modal -->
                                                                            <div id="rdDetail" class="modal fade" role="dialog">
                                                                                <div class="modal-dialog modal-lg">

                                                                                    <!-- Modal content-->
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                            <h4 class="modal-title">ผลการโทรบัญชี <span id="pTopHead"></span></h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>เบอร์โทรติดต่อ : </label> <label class="text-success" id="ARM_CUSTOMER_TEL">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ผลการติดตาม : </label> <label class="text-danger" id="ARM_TRACK_CODE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>แผนงาน : </label> <label class="text-danger" id="ARM_WORKPLAN_ID">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วัน/เวลา ที่ติดตาม : </label> <label class="text-warning" id="ARM_CALL_DATE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วัน/เวลา แผนงาน : </label> <label class="text-warning" id="ARM_WORKPLAN_TIME">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ผู้ดำเนินการ : </label> <label id="ARM_OPERATOR_ID">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>รายละเอียดการติดตาม : </label> <label id="ARM_RECORD_CALL_DETAIL">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ละติจูด : </label> <label id="ARM_LATITUDE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ลองจิจูด : </label> <label id="ARM_LONGITUDE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วัน/เวลา นัดชำระ : </label> <label class="text-warning" id="ARM_PAYMENT_DATE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนเงินที่นัดชำระ : </label> <label id="ARM_PAYMENT_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วันที่เก็บเงิน : </label> <label id="ARM_DATE_COLLECT">  </label>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนเงินที่ให้ส่วนลด : </label> <label id="ARM_MONEY_DISCOUNT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนเงินที่ชำระ : </label> <label id="ARM_PAYMENT_AMT2">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วัน/เวลา ปิดสัญญาณ : </label> <label class="text-success" id="ARM_SIGNAL_CLOSE_DATE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วัน/เวลา เปิดสัญญาณ : </label> <label class="text-success" id="ARM_SIGNAL_OPEN_DATE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ค่าต่อสัญญาณ : </label> <label id="ARM_SIGNAL_OPEN_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ค่าธรรมเนียม : </label> <label id="ARM_FEE_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ราคาเช่าซื้อรีไฟแนนซ์ : </label> <label id="ARM_REFINANCE_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนเงินที่เก็บครั้งแรก : </label> <label id="ARM_FIRST_COLLECT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ค่างวด : </label> <label id="ARM_INSTALLMENT_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนงวด : </label> <label id="ARM_INSTALLMENT_COUNT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>จำนวนเงินที่ทุจริต : </label> <label id="ARM_CORRUPT_AMT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ชื่อผู้ทุจริต : </label> <label id="ARM_CORRUPT_NAME">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ตำแหน่งผู้ทุจริต : </label> <label id="ARM_CORRUPT_POSITION">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ผู้รับคืนสินค้า : </label> <label id="ARM_RECIEVER_PRODUCT">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>วันที่ยึดคืน : </label> <label id="ARM_IMPOUND_DATE">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>คืนสินค้าที่สาขา : </label> <label id="ARM_SHOP_NAME">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                    <div class="form-group">                                                   
                                                                                                        <label>ตำแหน่งผู้รับคืนสินค้า : </label> <label id="ARM_RECIEVER_POSITION">  </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>                                                                                        
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div id="attach" class="tab-pane fade in">
                                                        <input type="hidden" id="tabAttach" name="tabAttach" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading4" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i></div>
                                                        </div>
        <?php if ($readonly == 'false') { ?>
                                                            <div class="portlet grey-salsa box">
                                                                <div class="portlet-title">
                                                                    <div class="form-group">                                                   
                                                                        <h4><i class="fa fa-file-photo-o"></i> แนบเอกสาร</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="row">
                                                                        <form data-toggle="validator" role="form" id="frmAttachFile">


                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtAttachName">ชื่อเอกสาร : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="text" id="txtAttachName" name="txtAttachName" class="form-control"  required autofocus/>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtAttachDesc">รายละเอียดเอกสาร : <font color="red">*</font></label>  
                                                                                    </div>
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <input type="text" id="txtAttachDesc" name="txtAttachDesc" class="form-control"  required autofocus/>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-group">                                                   
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                        <label for="txtAttacchFile">ไฟล์เอกสาร : <font color="red">*</font></label>  
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
                                                                                                    <input type="file" name="txtUploadFile" id="txtUploadFile" required autofocus> 
                                                                                                </span>
                                                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> ลบ </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>   
                                                                                </div>                                                   
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div style="height:20px;"></div>
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
                                                                                    <button type="submit" id="btnAttach" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-danger grey-salsa center-block"><i class='fa fa fa-save'></i> บันทึก</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <div style="height:20px;"></div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
        <?php } ?>
                                                        <div class="portlet grey-salsa box">
                                                            <div class="portlet-title">
                                                                <div class="form-group">                                                   
                                                                    <h4><i class="fa fa-file-photo-o"></i> ประวัติการแนบเอกสาร</h4>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="portlet-body">
                                                                                <div class="table-toolbar">
                                                                                    <button type="button" id="btnRefreshAttach" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success grey-salsa center-block"><i class='fa fa fa-refresh'></i></button>
                                                                                </div>
                                                                                <table class="display dataTable dtr-inline collapsed" id="ATTACH">
                                                                                    <thead>
                                                                                        <tr>

                                                                                            <th> ไฟล์เอกสาร </th> 
                                                                                            <th> ชื่อเอกสาร </th>
                                                                                            <th> รายละเอียดเอกสาร </th> 
                                                                                            <th> ผู้แนบเอกสาร </th>  
                                                                                            <th> วันที่แนบเอกสาร </th>

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
                                                    <div id="specialnote" class="tab-pane fade in">
                                                        <input type="hidden" id="tabSpecialNote" name="tabSpecialNote" value="0">
                                                        <div class="table-toolbar">
                                                            <div class="text-center" id="dtLoading4" style="display:none;"><i class='fa fa-spinner fa-spin fa-4x'></i></div>
                                                        </div>
                                                        <div class="portlet red-thunderbird box">
                                                            <div class="portlet-title">
                                                                <div class="form-group">                                                   
                                                                    <h4><i class="fa fa-sticky-note-o"></i> SPECIAL NOTE</h4>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">                                                               

                                                                    <form data-toggle="validator" role="form" id="frmAddSpecialNote">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group">                                                   
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label for="txtAttachName">SPECIAL NOTE : <font color="red">*</font></label>  
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <textarea rows="5" id="txtSpecialText" name="txtSpecialText" class="form-control"  required autofocus/></textarea>
                                                                                </div>   
                                                                            </div>                                                   
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div style="height:20px;"></div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                                            <div id="ssucc" class="alert alert-success" style="display:none;">
                                                                                <strong>สำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.!
                                                                            </div>
                                                                            <div id="serr" class="alert alert-danger" style="display:none;">
                                                                                <strong>ERROR !</strong> ไม่สามารถทำรายการได้. กรุณาติดต่อ SYSTEM ADMIN !
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div style="height:20px;"></div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="form-group"> 
                                                                                <button type="submit" id="btnSavenote" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-danger red-thunderbird center-block"><i class='fa fa fa-save'></i> บันทีก </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div style="height:20px;"></div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet red-thunderbird box">
                                                            <div class="portlet-title">
                                                                <div class="form-group">                                                   
                                                                    <h4><i class="fa fa-sticky-note-o"></i> ประวัติ SPECIAL NOTE</h4>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row">

                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="portlet-body">
                                                                            <div class="table-toolbar">
                                                                                <button type="button" id="btnRefreshSpecialNote" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success red-thunderbird center-block"><i class='fa fa fa-refresh'></i> </button>
                                                                            </div>
                                                                            <table class="display dataTable dtr-inline collapsed" id="SPECIALNOTE">
                                                                                <thead>
                                                                                    <tr>

                                                                                        <th> ข้อความ </th> 
                                                                                        <th> ผู้บันทึก </th>
                                                                                        <th> วันที่บันทึก </th> 

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
                <script src="js/arcollection_detail_waive.js" type="text/javascript"></script>
            </body>
        <?php
    }
}
?>