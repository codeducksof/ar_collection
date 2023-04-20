$(function () {    
    
    $('#ROLEEMP').on('shown.bs.modal', function (e) {        
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    
    LoadRole();
    
    $('#btnAddRole').on('click', function () {        
        $('#ROLEDETAIL').modal('show');
    });
    
    $('#btnSaveRole').on('click', function () {  
        var $this = $(this);
        $this.button('loading'); 
        AddRole();
    });
    
     $('#btnUpdateRole').on('click', function () {  
        var $this = $(this);
        $this.button('loading'); 
        UpdateRole();
    });
    
    $('#btnSearchEmp').on('click', function () {
        
        var $this = $(this);
        $this.button('loading');  
        var empcode = $("#txtEmpcode").val();  
        if(empcode !== ''){
            GetEmpCode(empcode);
            $("#emp_err").hide();
        }else{
            $("#emp_err").show();
            $('#btnSearchEmp').button('reset');
        }
        
    });
    
    $('#btnAddEmp').on('click', function () {        
        var $this = $(this);
        $this.button('loading'); 
        AddEmpRole();
    });
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
});

function AddEmpRole(){
    
    var empcode,empname,roleid,rolename;
    empcode = $("#txtEmpcode").val();
    empname = $("#textEmpName").val();
    roleid = $("#txtRoleID").val();
    rolename = $("#pRoleName").text();
    
    if(empcode != "" && empname != "" && roleid != ""){  
        
        $("#emp_err").hide();
        
        $.ajax('add_emp_role.php', {        
            method: 'GET',
            dataType: 'json',
            data: {empcode:empcode,roleid:roleid,type:"I"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            //console.log(result);
            if(result == 'PASS'){
                $("#emp_succ").show();
                $("#emp_dup").hide();
                $("#emp_failed").hide();
                $("#txtEmpcode").val('');
                $("#textEmpName").val('');
                $("#emp_del_succ").hide();
                
                var table = $('#WORKLISTEMP').DataTable();
                table.destroy();
                LoadEmpRole(roleid,rolename);
                
            }else if(result == 'DUPLICATE'){
                $("#emp_dup").show();
                $("#emp_succ").hide();
                $("#emp_failed").hide();
                $("#emp_del_succ").hide();
            }else{
                $("#emp_failed").show();
                $("#emp_dup").hide();
                $("#emp_succ").hide();
                $("#emp_del_succ").hide();
            }
            //console.log(data);
            $('#btnAddEmp').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#emp_err").show();
        $("#emp_succ").hide();
        $('#btnAddEmp').button('reset');
    }
    
    
}

function GetEmpCode(empcode){
    
    $.ajax('get_all_emp.php', {        
        method: 'GET',
        dataType: 'json',
        data: {empcode:empcode},
        async: true
    }).then(function success(data) {
        
       var result = data.data;
       if(result.length > 0){
           $("#textEmpName").val(result[0].User_Name);
       }    
       $('#btnSearchEmp').button('reset');
    }, function fail(data, status) {
        console.log(status);
    });
}

function formatNumber(nStr) {
    
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
    
}

function formatDate(nStr) {

    Date.prototype.changeFormat = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();

        return [this.getFullYear() + 543, (mm > 9 ? '' : '0') + mm, (dd > 9 ? '' : '0') + dd

        ].join('/');
    };
    var getDate = new Date(nStr);
    var reformatDate = getDate.changeFormat();

    return reformatDate;
}

function formatDateTime(nStr) {

    Date.prototype.changeFormat = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();
        var hh = this.getHours();
        var mmm = this.getMinutes();
        var ss = this.getSeconds();
        return [this.getFullYear() + 543, (mm > 9 ? '' : '0') + mm, (dd > 9 ? '' : '0') + dd + ' ' + (hh > 9 ? '' : '0') + hh + ':' + (mmm > 9 ? '' : '0') + mmm + ':' + (ss > 9 ? '' : '0') + ss

        ].join('/');
    };
    var getDate = new Date(nStr);
    var reformatDate = getDate.changeFormat();

    return reformatDate;
}

function AddRole(){
    
    var roleName = $("#txtRoleName").val();
    
    if(roleName != ""){
        
         $.ajax('add_role.php', {        
            method: 'GET',
            dataType: 'json',
            data: {rolename:roleName,roldid:"-",type:"I"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            if(result.Status == "PASS"){
                
                 $("#txtRoleName").val('');
                $('#btnSaveRole').button('reset');
                $("#role_succ").show();
                $("#role_err").hide();
                var table = $('#ROLE').DataTable();
                table.destroy();
                LoadRole();
                
            }else{
               
                $("#role_succ").hide();
                $("#role_err").show();
                $('#btnSaveRole').button('reset');
                
            }
            //console.log(data);
            
        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#role_succ").hide();
        $("#role_err").show();
        $('#btnSaveRole').button('reset');
    }
   
            
    
}

function UpdateRole(){
    
    var roleName = $("#txtRoleNameEdit").val();
    var roleID = $("#txtRoleIDEdit").val();
    
    if(roleName != ""){
        
         $.ajax('add_role.php', {        
            method: 'GET',
            dataType: 'json',
            data: {rolename:roleName,roldid:roleID,type:"U"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            if(result.Status == "PASS"){
                
                         
                $("#rolee_succ").show();
                $("#rolee_err").hide();
                var table = $('#ROLE').DataTable();
                table.destroy();
                LoadRole();
                $('#btnUpdateRole').button('reset');
                
            }else{
               
                $("#rolee_succ").hide();
                $("#rolee_err").show();
                $('#btnUpdateRole').button('reset');
                
            }
            //console.log(data);
            
        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#rolee_succ").hide();
        $("#rolee_err").show();
        $('#btnUpdateRole').button('reset');
    }
   
            
    
}

function LoadRole(){
    
    
    $('#ROLE').empty();
    
    var table = $('#ROLE').dataTable({

        stateSave: true,
        sScrollX: "100%",
        sScrollXInner: "100%",
        bScrollCollapse: true,
        processing: true,
        serverside: true,
        searching: true,
        scrollx: true,
        pagingType: "first_last_numbers",
        deferLoading: 10,
        lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
        oLanguage: {
            sLoadingRecords: '<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i>...กำลังโหลดข้อมูล...',
            sInfo: "รายการทั้งหมด _TOTAL_ รายการ แสดงรายการ (_START_ ถึง _END_)",
            sInfoFiltered: " - คัดกรอง จาก _MAX_ รายการ",
            sInfoEmpty: "ไม่พบรายการ",
            sEmptyTable: "ไม่พบรายการ",
            sSearch: "ค้นหารายการ",
            oPaginate: {
                sFirst: "หน้าแรก", // This is the link to the first page
                sPrevious: "ก่อนหน้า", // This is the link to the previous page
                sNext: "ถัดไป", // This is the link to the next page
                sLast: "หน้าสุดท้าย" // This is the link to the last page
            }
        },
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
           {"data": "User_Role_ID", "className": "text-center", "defaultContent": ''},
           {"data": "User_Role_Name", "className": "text-center", "defaultContent": ''},
           {"data": "Create_Date", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                         var result = '';
                         if (data == '') {
                             result = '-';
                         } else {
                             result = formatDateTime(data);
                         }
                         return result;
                }        
            },
            {"data": "Update_Date", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                         var result = '';
                         if (data == '') {
                             result = '-';
                         } else {
                             result = formatDateTime(data);
                         }
                         return result;
                }        
            },
            {"data": "User_Role_ID", "className": "text-center", "defaultContent": '',
             "render": function (data, type, full) {
                      
                 var result = "<a href='#' class='edit' data='" + data + "' data2='" + full.User_Role_Name + "'><i class='fa fa-edit'></i></a>";                     
                 return result;
                }        
            },
//            {"data": "User_Role_ID", "className": "text-center", "defaultContent": '',
//             "render": function (data, type, full) {
//                        
//                 var result = "<a href='#' class='del' data='" + data + "'><i class='fa fa-close'></i></a>";;                       
//                 return result;
//                }        
//            },
//            {"data": "User_Role_ID", "className": "text-center", "defaultContent": '',
//             "render": function (data, type, full) {
//                        
//                 var result = "<a href='#' class='emp' data='" + data + "'  data2='" + full.User_Role_Name + "'><i class='fa fa-edit'></i></a>";;                       
//                 return result;
//                }        
//            }
           
        ],
        order: [[2, "desc"]],   
        ajax: {
            url: "get_role.php", 
            async: true
        }
        
        

    });
    
    var table = $('#ROLE').DataTable();
        table.columns(0).header().to$().text('User_Role_ID');
        table.columns(1).header().to$().text('User_Role_Name');
        table.columns(2).header().to$().text('วันที่สร้าง');
        table.columns(3).header().to$().text('วันที่แก้ไข');
        table.columns(4).header().to$().text('แก้ไข');
//        table.columns(5).header().to$().text('ลบ');
//        table.columns(6).header().to$().text('พนักงาน');
    
    $("#ROLE").on('click','a.del', function() {
        var $tr = $(this).closest('a');
        var roleid = $tr.attr("data");       
        DelRole(roleid);
    });
    
    $("#ROLE").on('click','a.edit', function() {
        var $tr = $(this).closest('a');
        var roleid = $tr.attr("data"); 
        var roleName = $tr.attr("data2"); 
        
        LoadRoleData(roleid,roleName);
    });
    
    $("#ROLE").on('click','a.emp', function() {
        var $tr = $(this).closest('a');
        var roleid = $tr.attr("data"); 
        var roleName = $tr.attr("data2");  
        var table = $('#WORKLISTEMP').DataTable();
        table.destroy();
        LoadEmpRole(roleid,roleName);
    });
    
    
}

function LoadEmpRole(roleid,roleName){
    
    $("#pRoleName").text('');
    $("#pRoleName").text(roleName);  
    $("#txtRoleID").val('');
    $("#txtRoleID").val(roleid);
    $('#ROLEEMP').modal('show');
    
    $('#WORKLISTEMP').empty();
     
    var table = $('#WORKLISTEMP').dataTable({

        stateSave: true,
        sScrollX: "100%",
        sScrollXInner: "100%",
        bScrollCollapse: true,
        processing: true,
        serverside: true,
        searching: true,
        scrollx: true,
        pagingType: "first_last_numbers",
        deferLoading: 10,
        lengthMenu: [[10, 20, 30, 50], [10, 20, 30, 50]],
        oLanguage: {
            sLoadingRecords: '<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw"></i>...กำลังโหลดข้อมูล...',
            sInfo: "รายการทั้งหมด _TOTAL_ รายการ แสดงรายการ (_START_ ถึง _END_)",
            sInfoFiltered: " - คัดกรอง จาก _MAX_ รายการ",
            sInfoEmpty: "ไม่พบรายการ",
            sEmptyTable: "ไม่พบรายการ",
            sSearch: "ค้นหารายการ",
            oPaginate: {
                sFirst: "หน้าแรก", // This is the link to the first page
                sPrevious: "ก่อนหน้า", // This is the link to the previous page
                sNext: "ถัดไป", // This is the link to the next page
                sLast: "หน้าสุดท้าย" // This is the link to the last page
            }
        },
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
           {"data": "EMP_CODE", "className": "text-center", "defaultContent": ''},
           {"data": "EMP_NAME", "className": "text-center", "defaultContent": ''},
           {"data": "Create_Date", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                         var result = '';
                         if (data == '') {
                             result = '-';
                         } else {
                             result = formatDateTime(data);
                         }
                         return result;
                }        
            },
            {"data": "EMP_CODE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result = '';
                     if (data == '') {
                        result = '';
                     } else {
                        result = "<a href='#'class='del' data='" + data + "'><i class='fa fa-minus-square'></i></a>";
                     }    
                    return result;
                }        
            }
           
        ],
        order: [[2, "desc"]],   
        ajax: {
            url: "get_role_list_emp.php",
            data: {"roleid":roleid},
            async: true
        }
        

    });
    
    var table = $('#WORKLISTEMP').DataTable();
    table.columns(0).header().to$().text('รหัสพนักงาน');
    table.columns(1).header().to$().text('ชื่อ-สกุลพนักงาน');
    table.columns(2).header().to$().text('วันที่เพิ่ม');
    table.columns(3).header().to$().text('');
    
    $("#WORKLISTEMP").on('click','a.del', function() {
        var $tr = $(this).closest('a');
        var usid = $tr.attr("data");
        var table = $('#WORKLISTEMP').DataTable();
        table.destroy();
        DelEmpGroup(usid);
     });
    
}

function DelEmpGroup(empcode){
    
    var roleid;
    roleid = $("#txtRoleID").val();
       
    if(empcode != ""){  
        
        $("#emp_err").hide();
        
        $.ajax('add_emp_role.php', {        
            method: 'GET',
            dataType: 'json',
            data: {empcode:empcode,roleid:"-",type:"D"},
            async: true
        }).then(function success(data) {
            var result = data.data;
            if(result == 'PASS'){
                $("#emp_del_succ").show();
                $("#emp_dup").hide();
                $("#emp_failed").hide();
                $("#txtEmpcode").val('');
                $("#textEmpName").val('');
                $("#emp_succ").hide();
                 var table = $('#WORKLISTEMP').DataTable();
                table.destroy();
                LoadEmpRole(roleid);
                
            }else if(result == 'DUPLICATE'){
                $("#emp_dup").show();
                $("#emp_del_succ").hide();
                $("#emp_failed").hide();
                $("#emp_succ").hide();
            }else{
                $("#emp_failed").show();
                $("#emp_dup").hide();
                $("#emp_del_succ").hide();
                $("#emp_succ").hide();
            }
            //console.log(data);
            //$('#btnAddEmp').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#emp_err").show();
        $("#emp_succ").hide();
        //$('#btnAddEmp').button('reset');
    }
    
    
}

function DelRole(roleid){
    
    if(roleid != ""){
        
         $.ajax('add_role.php', {        
            method: 'GET',
            dataType: 'json',
            data: {rolename:"-",roldid:roleid,type:"D"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;           
            //console.log(data);
            if(result.Status == "PASS"){                
                var table = $('#ROLE').DataTable();
                table.destroy();  
                LoadRole();
            }
            
        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#role_succ").hide();
        $("#role_err").show();
        $('#btnSaveRole').button('reset');
    }
   
    
}

function LoadRoleData(roldid,rolename){
    
    $("#txtRoleIDEdit").val('');
    $("#txtRoleIDEdit").val(roldid);
    $("#txtRoleNameEdit").val('');
    $("#txtRoleNameEdit").val(rolename);
    $('#ROLEDETAILEDIT').modal('show');
    
    
}






