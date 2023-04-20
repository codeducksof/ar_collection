<?php
$pageGroup = 'HOME';
$pageSlug = 'PASSWORD';
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
        <title>AR COLLECTION | หน้าหลัก</title>
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
                                    <a href="agreement.php">หน้าหลัก</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>เปลี่ยนรหัสผ่าน</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">

                            </div>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> เปลี่ยนรหัสผ่าน
                            <small>  </small> 

                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <!-- BEGIN DASHBOARD STATS 1-->
                        <div class="row">
                            <form class="register-form" id="changepassword" data-toggle="validator" novalidate="novalidate">
                                <div class="col-md-6 col-sm-6">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-share font-dark hide"></i>
                                                <span class="caption-subject font-dark bold uppercase">การตั้งรหัสผ่าน ขั้นต่ำ 8 ตัวอักษร รูปแบบ ต้องมี ตัวอักษร ตัวเล็ก ตัวใหญ่ ตัวเลข และ อักขระ ปนกัน</span>
                                            </div>                                        
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row"> 
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group has-success has-success">
                                                        <label class='control-label' id="success" style="display:none;">SUCCESS : เปลี่ยนรหัสผ่านเรียบร้อย !</label>
                                                   </div>
                                                    <div class="form-group has-error has-danger">
                                                        <label class='control-label' id="err-passnotmatch" style="display:none;">ERROR : รหัสผ่านไม่ตรงกัน</label>
                                                        <label class='control-label' id="err-passnotstength" style="display:none;">ERROR : รูปแบบรหัสผ่านไม่ถูกต้อง</label>
                                                        <label class='control-label' id="err-passless" style="display:none;">ERROR : รหัสผ่านอย่างน้อย 8 หลัก</label>
                                                        <label class='control-label' id="err-passsystem" style="display:none;">ERROR : โปรดติดต่อ System Admin </label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">                                            
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <i class="fa fa-lock"></i>
                                                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="รหัสผ่านใหม่" id="repassword" name="repassword" required="" autofocus=""> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                            
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <i class="fa fa-lock"></i>
                                                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="ยืนยันรหัสผ่านใหม่" id="crepassword" name="crepassword" required="" autofocus=""> 
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn green pull-right" id="btnChangePassword" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"> ยืนยันการเปลี่ยนรหัสผ่าน </button>
                                                    </div>  
                                                </div>                                                                                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>  


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
        <script src="plugins/validator.min.js"></script>  
        <script>


            $(function () {

                $(".bg_load").fadeOut("slow");
                $(".wrapper").fadeOut("slow");

                $('#changepassword').validator().on('submit', function (e) {

                    if (e.isDefaultPrevented()) {
                        $("#btnChangePassword").button('reset');
                        $(e).closest('.control-group').removeClass('success').addClass('error');
                        return false;
                    } else {

                        var empcode, password, confirmpassword;
                        empcode = $("#txtEmpID").val();
                        password = $("#repassword").val();
                        confirmpassword = $("#crepassword").val();

                        changePassword(empcode, password, confirmpassword);
                        return false;

                    }

                });

                $("#btnChangePassword").on("click", function (e) {
                    var $this = $(this);
                    $this.button('loading');
                });

            });


            function changePassword(empcode, password, confirmpassword) {

                var passpolicy = ispwdPolicy(password);

                if (password.length < 8) {

                    $("#err-passless").show();
                    $("#err-passnotmatch").hide();
                    $("#err-passnotstength").hide();
                    $("#btnChangePassword").button('reset');

                    return false;

                } else if (password != confirmpassword) {

                    $("#err-passnotmatch").show();
                    $("#err-passnotstength").hide();
                    $("#err-passless").hide();
                    $("#btnChangePassword").button('reset');

                    return false;

                } else if (passpolicy == "failed") {

                    $("#err-passnotstength").show();
                    $("#err-passnotmatch").hide();
                    $("#err-passless").hide();
                    $("#btnChangePassword").button('reset');

                    return false;

                }

                $.ajax('changepassword.php', {
                    data: {empcode: empcode, pass: password},
                    method: 'POST',
                    dataType: 'json'
                }).then(function success(data) {

                    var result = data.data;
                    if (result == 'Pass') {

                        $("#success").show();
                        $("#err-passsystem").hide();
                        $("#err-passnotstength").hide();
                        $("#err-passnotmatch").hide();
                        $("#err-passless").hide();
                        $("#repassword").val('');
                        $("#crepassword").val('');
                        $("#btnChangePassword").button('reset');
                    } else {
                        $("#success").hide();
                        $("#err-passsystem").show();
                        $("#err-passnotstength").hide();
                        $("#err-passnotmatch").hide();
                        $("#err-passless").hide();
                        $("#btnChangePassword").button('reset');
                    }
                    //console.log(data);

                }, function fail(data, status) {
                    console.log(status);
                });

            }

            function ispwdPolicy(password) {

                var result;
                var pwdPolicy = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*()]).{8,}/;
                result = pwdPolicy.test(password);
                if (result == true) {
                    result = "pass";
                } else {
                    result = "failed";
                }

                return result;
            }
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>