$(function () {    
    
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    
    $('#GROUPDETAIL').on('shown.bs.modal', function (e) {        
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    
    LoadGroupLevel();
    
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
    
    $('#btnSearchRole').on('click', function () {
        
        var $this = $(this);
        $this.button('loading');  
        
        var roleid = $("#textRoleID").val();  
        if(roleid !== ''){
            GetRoleCode(roleid);
            $("#role_err").hide();
        }else{
            $("#role_err").show();
            $('#btnSearchRole').button('reset');
        }
        
    });
    
    $('#btnAddEmp').on('click', function () {        
        var $this = $(this);
        $this.button('loading'); 
        AddEmpGroup();
    });
    
    $('#btnAddRole').on('click', function () {        
        var $this = $(this);
        $this.button('loading'); 
        AddRoleGroup();
    });
    
    
    
    $('#WORKGROUP tbody').on('click', 'tr', function () {
        
        var table = $('#WORKGROUP').DataTable();
        var tbRow = table.row(this).data();
        var GroupID = tbRow.User_Grp_ID;
        var GroupName = tbRow.User_Grp_Name;
        
        $("#pGroupName").text('');
        $("#pGroupName").text(GroupName);
        
        $("#txtGroupCode").val('');
        $("#txtGroupCode").val(GroupID);
        
        $('#GROUPDETAIL').modal('show');   
        var table = $('#WORKLISTEMP').DataTable();
        table.destroy();
        LoadEmpList(GroupID);
        var table2 = $('#WORKROLE').DataTable();
        table2.destroy();
        LoadRoleList(GroupID); 
        
        
    });
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
});

function LoadRoleList(GroupID){
    
    $('#WORKROLE').empty();
    var table = $('#WORKROLE').dataTable({

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
           {"data": "User_Grp_ID", "className": "text-center", "defaultContent": ''},
           {"data": "User_Role_ID", "className": "text-center", "defaultContent": ''},
           {"data": "User_Role_Name", "className": "text-center", "defaultContent": '' },
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
            {"data": "User_Grp_ID", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result = "";
                    var retrun = full.User_Role_ID;
                   
                     if (retrun == '') {
                        result = '';
                     } else {
                        result = "<a href='#'class='delr' data='" + data + "'><i class='fa fa-minus-square'></i></a>";
                     }    
                    return result;
                }        
            }
           
        ],
        order: [[3, "desc"]],   
        ajax: {
            url: "get_group_list_role.php",
            data: {"groupID":GroupID},
            async: true
        }
        

    });
    
    var table = $('#WORKROLE').DataTable();
    table.columns(0).header().to$().text('รหัสกลุ่ม');
    table.columns(1).header().to$().text('User_Role_ID');
    table.columns(2).header().to$().text('User_Role_Name');
    table.columns(3).header().to$().text('วันที่เพิ่ม');
    table.columns(4).header().to$().text('');
    
    $("#WORKROLE").on('click','a.delr', function() {
        var $tr = $(this).closest('a');
        var groupid = $tr.attr("data");
        var table = $('#WORKROLE').DataTable();
        table.destroy();
        DelRoleGroup();
     });
    
}

function GetRoleCode(roleid){
    
    $.ajax('get_all_role.php', {        
        method: 'GET',
        dataType: 'json',
        data: {roleid:roleid},
        async: true
    }).then(function success(data) {       
       
       var result = data.data;
       //console.log(result);
        
       if(result.length > 0){
           $("#textRolename").val(result[0].User_Role_Name);
       }    
       $('#btnSearchRole').button('reset');
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

function LoadGroupLevel(){
        
    var table = $('#WORKGROUP').dataTable({

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
           {"data": "User_Grp_ID", "className": "text-center", "defaultContent": ''},
           {"data": "User_Grp_Name", "className": "text-center", "defaultContent": ''},
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
            }
           
        ],
        order: [[2, "desc"]],   
        ajax: {
            url: "get_level_management_emp.php", 
            async: true
        }

    });
    
    
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

function LoadEmpList(GroupID){
    
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
           {"data": "User_ID", "className": "text-center", "defaultContent": ''},
           {"data": "User_Name", "className": "text-center", "defaultContent": ''},
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
            {"data": "User_ID", "className": "text-center", "defaultContent": '',
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
            url: "get_group_list_emp.php",
            data: {"groupID":GroupID},
            async: true
        }
        

    });
    
    var table = $('#WORKLISTEMP').DataTable();
    table.columns(0).header().to$().text('รหัสพนักงาน');
    table.columns(1).header().to$().text('ชื่อ-สกุลพนักงาน');
    table.columns(2).header().to$().text('วันที่เพิ่ม');
    table.columns(3).header().to$().text('');
    
//   $(".del").on('click', function () {        
//        var usid = $(this).attr("data");
//        console.log(usid);  
//    });
    
    $("#WORKLISTEMP").on('click','a.del', function() {
        var $tr = $(this).closest('a');
        var usid = $tr.attr("data");
        var table = $('#WORKLISTEMP').DataTable();
        table.destroy();
        DelEmpGroup(usid);
     });
    
}

function AddEmpGroup(){
    
    var empcode,empname,groupid;
    empcode = $("#txtEmpcode").val();
    empname = $("#textEmpName").val();
    groupid = $("#txtGroupCode").val();
    
    if(empcode != "" && empname != ""){  
        
        $("#emp_err").hide();
        
        $.ajax('add_emp_group.php', {        
            method: 'GET',
            dataType: 'json',
            data: {empcode:empcode,groupid:groupid,type:"I"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            //console.log(data);
            if(result.Status == 'PASS'){
                $("#emp_succ").show();
                $("#emp_dup").hide();
                $("#emp_failed").hide();
                $("#txtEmpcode").val('');
                $("#textEmpName").val('');
                $("#emp_del_succ").hide();
                
                var table = $('#WORKLISTEMP').DataTable();
                table.destroy();
                LoadEmpList(groupid);
                
            }else if(result.Status == 'DUPLICATE'){
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

function AddRoleGroup(){
    
    var rolename,roleid,groupid;
    roleid = $("#textRoleID").val();
    rolename = $("#textRolename").val();
    groupid = $("#txtGroupCode").val();
    
    if(roleid != "" && rolename != "" && groupid != ""){  
        
        $("#role_err").hide();
        
        $.ajax('add_role_group.php', {        
            method: 'GET',
            dataType: 'json',
            data: {roleid:roleid,groupid:groupid,type:"I"},
            async: true
        }).then(function success(data) {
            var result = data.data;
            //console.log(result);
            if(result.Status == 'PASS'){
                $("#role_succ").show();
                $("#role_dup").hide();
                $("#role_failed").hide();
                $("#textRoleID").val('');
                $("#textRolename").val('');
                $("#role_del_succ").hide();
                
                var table = $('#WORKROLE').DataTable();
                table.destroy();
                LoadRoleList(groupid);
                
            }else if(result.Status == 'DUPLICATE'){
                $("#role_dup").show();
                $("#role_succ").hide();
                $("#role_failed").hide();
                $("#role_del_succ").hide();
            }else{
                $("#role_failed").show();
                $("#role_dup").hide();
                $("#role_succ").hide();
                $("#role_del_succ").hide();
            }
            //console.log(data);
            $('#btnAddRole').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#role_err").show();
        $("#role_succ").hide();
        $('#btnAddRole').button('reset');
    }
    
    
}

function DelEmpGroup(empcode){
    
    var groupid;
    groupid = $("#txtGroupCode").val();
    
    if(empcode != ""){  
        
        $("#emp_err").hide();
        
        $.ajax('add_emp_group.php', {        
            method: 'GET',
            dataType: 'json',
            data: {empcode:empcode,groupid:groupid,type:"D"},
            async: true
        }).then(function success(data) {
            var result = data.data;
            if(result.Status == 'PASS'){
                $("#emp_del_succ").show();
                $("#emp_dup").hide();
                $("#emp_failed").hide();
                $("#txtEmpcode").val('');
                $("#textEmpName").val('');
                $("#emp_succ").hide();
                 var table = $('#WORKLISTEMP').DataTable();
                table.destroy();
                LoadEmpList(groupid);
                
            }else if(result.Status == 'DUPLICATE'){
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

function DelRoleGroup(){
    
    var groupid;
    groupid = $("#txtGroupCode").val();
    
        $("#role_err").hide();
        
        $.ajax('add_role_group.php', {        
            method: 'GET',
            dataType: 'json',
            data: {roleid:"-",groupid:groupid,type:"D"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            //console.log(result);
            if(result.Status == 'PASS'){
                $("#role_del_succ").show();
                $("#role_dup").hide();
                $("#role_failed").hide();
               
                $("#role_succ").hide();
                var table = $('#WORKROLE').DataTable();
                table.destroy();
                LoadRoleList(groupid);
                
            }else if(result.Status == 'DUPLICATE'){
                $("#role_dup").show();
                $("#role_del_succ").hide();
                $("#role_failed").hide();
                $("#role_succ").hide();
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
        
   
}






