<?php
include('validateLogin.php');
$pageGroup = 'HOME';
$pageSlug = 'DASHBOARD';
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
        <title>AR COLLECTION | Dashboard</title>
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
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
            
            .dashboard-stat.green { background-color:#00cec9; }
            .dashboard-stat.green .details .desc { color: #FFF; }
            .dashboard-stat.green .details .number { color: #FFF; }
            .dashboard-stat.green .visual>i { color: #FFF;opacity: .1;  }            
            
            .dashboard-stat.blue { background-color:#0984e3; }
            .dashboard-stat.blue .details .desc { color: #FFF; }
            .dashboard-stat.blue .details .number { color: #FFF; }
            .dashboard-stat.blue .visual>i { color: #FFF;opacity: .1;  }
            
            .dashboard-stat.pink { background-color:#e84393; }
            .dashboard-stat.pink .details .desc { color: #FFF; }
            .dashboard-stat.pink .details .number { color: #FFF; }
            .dashboard-stat.pink .visual>i { color: #FFF;opacity: .1; }
            
            .dashboard-stat.red { background-color:#d63031; }
            .dashboard-stat.red .details .desc { color: #FFF; }
            .dashboard-stat.red .details .number { color: #FFF; }
            .dashboard-stat.red .visual>i { color: #FFF;opacity: .1;  }
            
            .dashboard-stat.violet { background-color:#6c5ce7; }
            .dashboard-stat.violet .details .desc { color: #FFF; }
            .dashboard-stat.violet .details .number { color: #FFF; }
            .dashboard-stat.violet .visual>i { color: #FFF;opacity: .1;}
            
            .dashboard-stat.orange { background-color:#e17055; }
            .dashboard-stat.orange .details .desc { color: #FFF; }
            .dashboard-stat.orange .details .number { color: #FFF; }
            .dashboard-stat.orange .visual>i { color: #FFF;opacity: .1; }
            
            .dashboard-stat.yellow { background-color:#fdcb6e; }
            .dashboard-stat.yellow .details .desc { color: #FFF; }
            .dashboard-stat.yellow .details .number { color: #FFF; }
            .dashboard-stat.yellow .visual>i { color: #FFF; opacity: .1; }
            
        </style>
        
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
            <?php //include 'layout/header.php'; ?>

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
                                    <a href="home.php">หน้าหลัก</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Dashboard</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Dashboard
                            <small>สรุป รายการ AR COLLECTION วันนี้</small> 
                            <button type="button" id="btnReload" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" class="btn btn-lg btn-success center-block"><i class='fa fa fa-refresh'></i> </button>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                                                  
                            <?php
                            $Dashboard = '';
                            $Dashboard = GetDashboardWorkListARCollection();
                            if (!empty($Dashboard)) {
                                //var_dump($result);
                                $colors = array('green','yellow','yellow','red','yellow','red','red','yellow','red','violet','violet','violet','red','red','red');
                                //$icon = array('fa-shopping-cart','fa-shopping-cart','fa-warning','fa-globe','fa-shopping-cart','fa-shopping-cart','fa-warning','fa-globe','fa-globe','fa-mail-forward','fa-close','fa-pie-chart','fa-arrow-circle-right','fa-arrow-circle-left','fa-list-alt','fa-warning','fa-warning','fa-shopping-cart');
                                $i=0;
                                foreach ($Dashboard as $key => $value) {
                            ?>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat dashboard-stat-v2 <?php  echo $colors[$i]; ?>" href="<?php echo $value['MENU_URL']; ?>">
                                            <div class="visual">
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                            <div class="details">
                                                <div class="number">
                                                    <span data-counter="counterup" <?php echo 'id="'.$value['MENU_CODE'].'"'; ?>>0</span> 
                                                </div>
                                                <div class="desc"> <?php echo $value['MENU_NAME']; ?></div>
                                            </div>
                                        </a>
                                    </div>
                           <?php
                                   $i++;
                                }
                            }
                            
                            function GetDashboardWorkListARCollection() {

                                global $websrv, $websrvnoport;
                                $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                                      <soap:Body>
                                        <GET_AR_MENU_BOX xmlns="http://tempuri.org/" />
                                      </soap:Body>
                                    </soap:Envelope>';

                                $header = array(
                                    "Content-type: text/xml;charset=\"utf-8\"",
                                    "Accept: text/xml",
                                    "Cache-Control: no-cache",
                                    "Host:" . $websrvnoport,
                                    "Pragma: no-cache",
                                    "SOAPAction: \"http://tempuri.org/GET_AR_MENU_BOX\"",
                                    "Content-length: " . strlen($soap_request),
                                );

                                $soap_do = curl_init();
                                curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_AR_MENU_BOX');
                                curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($soap_do, CURLOPT_POST, true);
                                curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
                                curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
                                $result = curl_exec($soap_do);
                                $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
                                $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_AR_MENU_BOXResponse->GET_AR_MENU_BOXResult[0];

                                $result2 = json_decode($response, true);
                                return $result2;
                            }
                            ?>

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
<!--       <div class="bg_load"></div>-->
<!--        <div class="wrapper">-->
<!--            <div class="inner">-->
<!--                <span>L</span>-->
<!--                <span>o</span>-->
<!--                <span>a</span>-->
<!--                <span>d</span>-->
<!--                <span>i</span>-->
<!--                <span>n</span>-->
<!--                <span>g</span>-->
<!--            </div>-->
<!--        </div>-->
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

        <script src="js/arcollection_dashboard.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>