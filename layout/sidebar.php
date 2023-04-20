<!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
<!--                            <li class="sidebar-search-wrapper">
                                 BEGIN RESPONSIVE QUICK SEARCH FORM 
                                 DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box 
                                 DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box 
                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                 END RESPONSIVE QUICK SEARCH FORM 
                            </li>-->
                            <?php 
                               
                                $rolemenu = $_SESSION['role'];
                               
                            ?>
                            <li class="nav-item <?php echo ($pageGroup == "HOME" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Home</span>
                                    <?php echo ($pageGroup == "HOME" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "HOME" ? "open":""); ?>"></span>
                                    
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo ($pageSlug == "AGREEMENT" ? "start active open":""); ?>">
                                        <a href="agreement.php" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">ข้อความประกาศ</span>
                                            <?php echo ($pageSlug == "AGREEMENT" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li>
									<li class="nav-item <?php echo ($pageSlug == "AUTODIAL" ? "start active open":""); ?>">
                                        <a href="auto_dial.php" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title"> AUTO DIAL</span>
                                            <?php echo ($pageSlug == "AUTODIAL" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "PASSWORD" ? "start active open":""); ?>">
                                        <a href="changepassworduser.php" class="nav-link ">
                                            <i class="icon-lock"></i>
                                            <span class="title">เปลี่ยนรหัสผ่าน</span>
                                            <?php echo ($pageSlug == "PASSWORD" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li>
                                    <?php  
                                     foreach ($rolemenu as $key => $data) {   
                                         
                                         if($data['MENU_NAME'] == 'AR Collection'){
                                    ?>
                                    <li class="nav-item <?php echo ($pageSlug == "DASHBOARD" ? "start active open":""); ?>">
                                        <a href="home.php" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">Dashboard</span>
                                            <?php echo ($pageSlug == "DASHBOARD" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li>
                                    <?php 
                                            }
                                        }
                                    ?>
<!--                                    <li class="nav-item start ">
                                        <a href="dashboard_2.html" class="nav-link ">
                                            <i class="icon-bulb"></i>
                                            <span class="title">Dashboard 2</span>
                                            <span class="badge badge-success">1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item start ">
                                        <a href="dashboard_3.html" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">Dashboard 3</span>
                                            <span class="badge badge-danger">5</span>
                                        </a>
                                    </li>-->
                                </ul>
                            </li>
                              <?php  
                                     foreach ($rolemenu as $key => $data) {   
                                         
                                         if($data['MENU_NAME'] == 'Customer Service'){
                                    ?>
                            <li class="nav-item <?php echo ($pageGroup == "CUSTOMER SERVICE" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-social-dribbble"></i>
                                    <span class="title">Customer Service</span>
                                    <?php echo ($pageGroup == "CUSTOMER SERVICE" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "CUSTOMER SERVICE" ? "open":""); ?>"></span>
                                    
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo ($pageSlug == "RECORD SERVICE" ? "start active open":""); ?>">
                                        <a href="customer_service_add.php" class="nav-link ">
                                            <i class="fa fa-edit"></i>
                                            <span class="title">Add Customer Service Record Call</span>
                                            <?php echo ($pageSlug == "RECORD SERVICE" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li> 
                                    <li class="nav-item <?php echo ($pageSlug == "RECORD SERVICE CALL" ? "start active open":""); ?>">
                                        <a href="customer_service_list.php" class="nav-link ">
                                            <i class="fa fa-navicon"></i>
                                            <span class="title">List Customer Service Record Call</span>
                                            <?php echo ($pageSlug == "RECORD SERVICE CALE" ? "<span class='selected'></span>":""); ?>
                                            
                                        </a>
                                    </li> 
                                    <li class="nav-item <?php echo ($pageSlug == "RPTRECORFCALL" ? "start active open":""); ?>">
                                        <a href="report_record_call.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">รายงานบันทึกผลการโทร </span>
                                            <?php echo (RPTRECORFCALL == "RPTRECORFCALL" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                              <?php 
                                            }
                                        }
                                    ?>
                            <?php   
                            foreach ($rolemenu as $key => $data) { 
                                if($data['MENU_NAME'] == 'AR Collection'){
                            ?>
                            <li class="nav-item <?php echo ($pageGroup == "ARCOLLECTION" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title">AR Collection</span>
                                    <?php echo ($pageGroup == "ARCOLLECTION" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "ARCOLLECTION" ? "open":""); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php 
                                        $result = '';
                                        $result = GetMenuWorkListARCollection();
                                        if(!empty($result)){
                                            //var_dump($result);
                                            foreach ($result as $key => $value) {                                               
                                            
                                        
                                    ?>
                                            <li class="nav-item <?php echo ($pageSlug == $value['MENU_CODE'] ? "start active open":""); ?>">
                                                <a href="<?php echo $value['MENU_URL']; ?>" class="nav-link ">
                                                    <i class="fa fa-navicon"></i>
                                                    <span class="title"><?php echo $value['MENU_NAME']; ?> </span>
                                                    <?php echo ($pageSlug == $value['MENU_CODE'] ? "<span class='selected'></span>":""); ?>
                                                </a>
                                            </li>
                                    <?php 
                                            }
                                        }
                                    ?>
<!--                                    <li class="nav-item <?php //echo ($pageSlug == "OD" ? "start active open":""); ?>">
                                        <a href="arcollection_od.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี OD++ </span>
                                            <?php //echo ($pageSlug == "OD" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php //echo ($pageSlug == "XDAY" ? "start active open":""); ?>">
                                        <a href="arcollection_xday.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี X-Day </span>
                                            <?php //echo ($pageSlug == "XDAY" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php //echo ($pageSlug == "CURRENT" ? "start active open":""); ?>">
                                        <a href="arcollection_current.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี Current </span>
                                            <?php //echo ($pageSlug == "CURRENT" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php //echo ($pageSlug == "EXCESS" ? "start active open":""); ?>">
                                        <a href="arcollection_excess.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี Excess </span>
                                            <?php //echo ($pageSlug == "EXCESS" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php //echo ($pageSlug == "CLOSED" ? "start active open":""); ?>">
                                        <a href="arcollection_closed.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี Closed </span>
                                            <?php //echo ($pageSlug == "CLOSED" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php //echo ($pageSlug == "PTP" ? "start active open":""); ?>">
                                        <a href="arcollection_ptp.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี PTP </span>
                                            <?php //echo ($pageSlug == "PTP" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item <?php //echo ($pageSlug == "END" ? "start active open":""); ?>">
                                        <a href="arcollection_end.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชี END </span>
                                            <?php //echo ($pageSlug == "END" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>-->
<!--                                    <li class="nav-item <?php //echo ($pageSlug == "TRAN" ? "start active open":""); ?>">
                                        <a href="arcollection_tran.php" class="nav-link ">
                                            <i class="icon-wallet"></i>
                                            <span class="title">รายการบัญชีที่ส่งงาน </span>
                                            <?php //echo ($pageSlug == "TRAN" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>-->
                                </ul>
                            </li>
                            
                            <?php 
                                }
                            }
                            ?>
                             <?php   
                            foreach ($rolemenu as $key => $data) { 
                                if($data['MENU_NAME'] == 'WAIVE'){
                            ?>
                            <li class="nav-item <?php echo ($pageGroup == "WAVECLAIM" ? "start active open":""); ?>">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-feed"></i>
                                        <span class="title">WAIVE</span>
                                        <?php echo ($pageGroup == "WAVECLAIM" ? "<span class='selected'></span>":""); ?>
                                        <span class="arrow <?php echo ($pageGroup == "WAVECLAIM" ? "open":""); ?>"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item <?php echo ($pageSlug == "REQ" ? "start active open":""); ?>">
                                            <a href="arcollection_waive.php" class="nav-link ">
                                                <i class="icon-docs"></i>
                                                <span class="title">รายการขอ WAIVE  </span>
                                                <?php echo ($pageSlug == "REQ" ? "<span class='selected'></span>":""); ?>
                                            </a>
                                        </li>

                                    </ul>
                            </li>
                            <?php 
                                }
                            }
                            ?>
                            <?php 
                            foreach ($rolemenu as $key => $data) { 
                                if($data['MENU_NAME'] == 'AR Collection Search'){
                            ?>
                            <li class="nav-item <?php echo ($pageGroup == "ARCOLLECTION2" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-layers"></i>
                                    <span class="title">AR Collection Search</span>
                                    <?php echo ($pageGroup == "ARCOLLECTION2" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "ARCOLLECTION2" ? "open":""); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo ($pageSlug == "SEARCH" ? "start active open":""); ?>">
                                            <a href="arcollection_search.php" class="nav-link ">
                                                    <i class="fa fa-navicon"></i>
                                                    <span class="title"> ค้นหารายการบัญชีทั้งหมด </span>
                                                    <?php echo ($pageSlug == "SEARCH" ? "<span class='selected'></span>":""); ?>
                                            </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "SG-HOME-REPORT-CONTACT" ? "start active open":""); ?>">
                                            <a href="sg_home_report_contact.php" class="nav-link ">
                                                    <i class="fa fa-navicon"></i>
                                                    <span class="title"> รายงาน SG-HOME Contact </span>
                                                    <?php echo ($pageSlug == "SG-HOME-REPORT-CONTACT" ? "<span class='selected'></span>":""); ?>
                                            </a>
                                    </li>
                                </ul>
                                
                                
                            </li>
                            <?php 
                                    }
                            
                                }
                            foreach ($rolemenu as $key => $data) { 
                                if($data['MENU_NAME'] == 'Manage Data'){
                            ?>
                            <li class="nav-item <?php echo ($pageGroup == "MANAGE" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Manage Data</span>
                                    <?php echo ($pageGroup == "MANAGE" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "MANAGE" ? "open":""); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                          
                                    <li class="nav-item <?php echo ($pageSlug == "WORK" ? "start active open":""); ?>">
                                        <a href="manage_work.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">จัดการงาน </span>
                                            <?php echo ($pageSlug == "WORK" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo ($pageSlug == "WORK2" ? "start active open":""); ?>">
                                        <a href="manage_work_group.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">จัดการงาน AUTODIAL </span>
                                            <?php echo ($pageSlug == "WORK2" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo ($pageSlug == "EMP-GROUP" ? "start active open":""); ?>">
                                        <a href="manage_work_group_emp.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">จัดการกลุ่มพนักงาน AUTODIAL </span>
                                            <?php echo ($pageSlug == "EMP-GROUP" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
									<li class="nav-item <?php echo ($pageSlug == "EMP-AUTO" ? "start active open":""); ?>">
                                        <a href="manage_work_emp.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">จัดการพนักงาน AUTODIAL </span>
                                            <?php echo ($pageSlug == "EMP-AUTO" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "WORK-PRO" ? "start active open":""); ?>">
                                        <a href="manage_work_provision.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title"> นำเข้างาน PROVISION/ECC/NPL </span>
                                            <?php echo ($pageSlug == "WORK-PRO" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "WORKDATE" ? "start active open":""); ?>">
                                        <a href="manage_work_date.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">จัดการช่วงเวลา WorkList </span>
                                            <?php echo ($pageSlug == "WORKDATE" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "RPTRECORFCALL" ? "start active open":""); ?>">
                                        <a href="report_record_call.php" class="nav-link ">
                                            <i class="icon-wrench"></i>
                                            <span class="title">รายงานบันทึกผลการโทร </span>
                                            <?php echo (RPTRECORFCALL == "RPTRECORFCALL" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <?php 
                                }
                            }
                            
                            foreach ($rolemenu as $key => $data) { 
                                if($data['MENU_NAME'] == 'Manage User'){
                            ?>
                            
                            <li class="nav-item <?php echo ($pageGroup == "USER" ? "start active open":""); ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Manage User </span>
                                    <?php echo ($pageGroup == "USER" ? "<span class='selected'></span>":""); ?>
                                    <span class="arrow <?php echo ($pageGroup == "USER" ? "open":""); ?>"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo ($pageSlug == "OTP" ? "start active open":""); ?>">
                                        <a href="manage_user.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">ปลดล็อค USER OTP</span>
                                            <?php echo ($pageSlug == "OTP" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "LEVEL" ? "start active open":""); ?>">
                                        <a href="manage_level.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">จัดการกลุ่ม </span>
                                            <?php echo ($pageSlug == "LEVEL" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "LEVEL_EMP" ? "start active open":""); ?>">
                                        <a href="manage_level_emp.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">จัดการพนักงานในกลุ่ม </span>
                                            <?php echo ($pageSlug == "LEVEL_EMP" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "LEVEL_ROLE" ? "start active open":""); ?>">
                                        <a href="manage_role.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">จัดการ Role </span>
                                            <?php echo ($pageSlug == "LEVEL_ROLE" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>   
                                    <li class="nav-item <?php echo ($pageSlug == "LEVEL_MENU" ? "start active open":""); ?>">
                                        <a href="manage_menu.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">จัดการ Menu </span>
                                            <?php echo ($pageSlug == "LEVEL_MENU" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo ($pageSlug == "MANAGE_ACC_USER" ? "start active open":""); ?>">
                                        <a href="manage_acccount_user.php" class="nav-link ">
                                            <i class="icon-user"></i>
                                            <span class="title">สร้าง User AR </span>
                                            <?php echo ($pageSlug == "LEVEL_MENU" ? "<span class='selected'></span>":""); ?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <?php 
                                }
                            }
                            ?>

<!--                            <li class="heading">
                                <h3 class="uppercase">Features</h3>
                            </li>-->
                           
                           
                            
                           
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                
  <?php 
  
  function GetMenuWorkListARCollection() {

    global $websrv, $websrvnoport;
    $soap_request = '<?xml version="1.0" encoding="utf-8"?>
                    <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                        <GET_AR_MENU xmlns="http://tempuri.org/" />
                      </soap:Body>
                    </soap:Envelope>';
 
    $header = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Host:" . $websrvnoport,
        "Pragma: no-cache",
        "SOAPAction: \"http://tempuri.org/GET_AR_MENU\"",
        "Content-length: " . strlen($soap_request),
    );

    $soap_do = curl_init();
    curl_setopt($soap_do, CURLOPT_URL, $websrv . '/WebService_Main_AR_Collection.asmx?op=GET_AR_MENU');
    curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($soap_do, CURLOPT_POST, true);
    curl_setopt($soap_do, CURLOPT_POSTFIELDS, $soap_request);
    curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($soap_do);
    $content = simplexml_load_string($result, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_PARSEHUGE);
    $response = $content->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->GET_AR_MENUResponse->GET_AR_MENUResult[0];

    $result2 = json_decode($response, true);
    return $result2;
}
  
  ?>