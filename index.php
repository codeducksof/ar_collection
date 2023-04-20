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
        <title>AR COLLECTION | User Login</title>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="styles/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="styles/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="styles/login.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style>
            h1 { margin: 0;}
        </style>
    
    </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">            
            <h1><span style="color:#FFFFFF;">AR</span> <span style="color:#F3565D;">Collection</span> <span  class="badge">V.2.2 </span></h1> 
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form id="frmLogin" role="form" class="login-form"  data-toggle="validator"  method="post">
                <h3 class="form-title font-green">เข้าสู่ระบบ</h3>
                <div class="form-group has-error has-danger">
                    <label id="err-block" class='control-label' style="display:none;">ERROR : คุณถูกบล็อคเนื่องจากเข้าสู่ระบบไม่ถูกต้อง เกินจำนวนครั้งที่กำหนด โปรดติดต่อ System Admin.</label>
                    <label id="alerterr1" class="control-label" style="display:none;">รหัสผ่านไม่ถูกต้อง</label> 
                    <label id="alerterr2" class="control-label" style="display:none;">รหัสผ่านหมดอายุ</label> 
                    <?php
                    if (isset($_GET['err'])) {
                        
                        $err = $_GET['err'];                       
                        if ($err == '02') {
                            echo "<label class='control-label'>SESSION EXPIRE</label>";
                        }
                        if ($err == '03') {
                            echo "<label class='control-label'>คุณเข้าระบบแบบไม่ถูกต้อง</label>";
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">ชื่อผู้ใช้งาน</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="number" autocomplete="off" placeholder="ชื่อผู้ใช้งาน" id="username" name="username" required autofocus/> 
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">รหัสผ่าน</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="รหัสผ่าน" id="password" name="password" required autofocus/> 
                </div>
                <div class="form-actions">
                    <button type="submit" id="btnLogin" class="btn green uppercase" data-loading-text="<i class='fa fa-spinner fa-spin '></i>">เข้าสู่ระบบ</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" id="ckShowPass" name="ckShowPass" />แสดงรหัสผ่าน
                        <span></span>
                    </label>
                </div>
                <div class="forget-password">
                    <h4>ลืมรหัสผ่าน ?</h4>
                    <p> คลิก <a href="javascript:;" id="forget-password"> ที่นี่ </a>เพื่อทำการรีเซ็ตรหัสผ่าน. </p>
                </div>

            </form>
            <!-- END LOGIN FORM -->
            <!-- START RESET PASSWORD FORM -->
            <form class="forget-form" id="frmForgetPassword" role="form" data-toggle="validator" novalidate="novalidate">
                <h3>ลืมรหัสผ่าน ?</h3>
                <p> ***โปรดระบุ เลขบัตรประจำตัวประชาชน และ วันเดือนปีเกิด เพื่อใช้รีเซ็ตรหัสผ่าน. </p>
                <div class="form-group has-error has-danger">
                    <label class='control-label' id="err-data" style="display:none;">ERROR : ข้อมูลไม่ตรงกัน</label>
                    <label class='control-label' id="err-idcard" style="display:none;">ERROR : รูปแบบบัตรระชาชนไม่ถูกต้อง</label>
                    <label id="err-block2" class='control-label' style="display:none;">ERROR : คุณถูกบล็อคเนื่องจากเข้าสู่ระบบไม่ถูกต้อง เกินจำนวนครั้งที่กำหนด โปรดติดต่อ System Admin.</label>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" maxlength="13" placeholder="รหัสพนักงาน" id="fempcode" name="fempcode" required autofocus/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" maxlength="13" placeholder="เลขบัตรประจำตัวประชาชน" id="idcard" name="idcard" required autofocus/> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-calendar"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" maxlength="8" placeholder="วันเดือนปีเกิด" id="dateofbirth" name="dateofbirth" required autofocus/> 
                    </div>
                </div>
                <p class="text-danger"> ***โปรดระบุ วันเดือนปีเกิด พ.ศ. โดยใส่แต่ตัวเลขเท่านั้นตามนี้ วัน 2 หลัก เดือน 2 หลัก ปี 4 หลัก ดังนี้  <strong>01012500</strong> </p>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> กลับ </button>
                    <button type="submit" class="btn green pull-right" id="brnConfirmChange" data-loading-text="<i class='fa fa-spinner fa-spin '></i>"> ยืนยัน </button>
                </div>
            </form>
            <!-- END RESET PASSWORD FORM -->
            <!-- START RESET PASSWORD FORM -->
            <form class="register-form" id="changepassword" data-toggle="validator" novalidate="novalidate">
                <h3>เปลี่ยนรหัสผ่าน ?</h3>
                <p> ***โปรดระบุ รหัสผ่าน อย่างน้อย 8 หลัก. ในรหัสต้องประกอบไปด้วย ตัวอักษร ตัวเลข และ อักขระ </p>
                
                <div class="form-group has-error has-danger">
                   
                   <label class='control-label' id="err-passnotmatch" style="display:none;">ERROR : รหัสผ่านไม่ตรงกัน</label>
                   <label class='control-label' id="err-passnotstength" style="display:none;">ERROR : รูปแบบรหัสผ่านไม่ถูกต้อง</label>
                   <label class='control-label' id="err-passless" style="display:none;">ERROR : รหัสผ่านอย่างน้อย 8 หลัก</label>
                   <label class='control-label' id="err-passsystem" style="display:none;">ERROR : โปรดติดต่อ System Admin </label>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="number" autocomplete="off" placeholder="รหัสพนักงาน" id="cempcode" readonly="readonly" name="cempcode" required autofocus> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="รหัสผ่านใหม่" id="repassword" name="repassword" required autofocus> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="ยืนยันรหัสผ่านใหม่" id="crepassword" name="crepassword" required autofocus> 
                    </div>
                </div>                
                <div class="form-actions">                    
                    <button type="submit" class="btn green pull-right" id="btnChangePassword" data-loading-text="<i class='fa fa-spinner fa-spin'></i>"> ยืนยันการเปลี่ยนรหัสผ่าน </button>
                </div>
            </form>
            <!-- END RESET PASSWORD FORM -->
            
            <div id="OTPLOCK" class="modal fade" role="dialog">                                    
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> OTP. UNLOCK.</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 center-block">
                                            <h3 id="otplock" class="control-label text-danger" style="text-align:center"></h3>
                                        </div>
                                    </div>                                                                                                
                                </div>
                            </div>                                                                                        
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <div class="copyright"> 2019 &copy; Singer Thai </div>
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

        <script src="plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="plugins/validator.min.js"></script>  
        <script src="js/login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>