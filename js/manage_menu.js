$(function () {    
    
    LoadMenu();
    
    $('#MENUROLEMANAGE').on('shown.bs.modal', function (e) {        
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    
    $('#btnAddMenu').on('click', function () {        
        $('#MENUADD').modal('show');
    });
    
    $("#btnSaveMenu").on('click',function (){
        var $this = $(this);
        $this.button('loading'); 
        AddMenu();
    });
   
    $("#btnEditMenu").on('click',function (){
        var $this = $(this);
        $this.button('loading'); 
        EditMenu();
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
    
    $('#btnAddRole').on('click', function () {        
        var $this = $(this);
        $this.button('loading'); 
        AddRoleMenu();
    });
   
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
});

function AddRoleMenu(){
    
    var rolename,roleid,menuid;
    roleid = $("#textRoleID").val();
    rolename = $("#textRolename").val();
    menuid = $("#lbMenuID").val();
    
    if(roleid != "" && rolename != "" && menuid != ""){  
        
        $("#menu_role_err").hide();
        
        $.ajax('add_role_menu.php', {        
            method: 'GET',
            dataType: 'json',
            data: {roleid:roleid,menuid:menuid,type:"I"},
            async: true
        }).then(function success(data) {
            var result = data.data;
            //console.log(data);
            if(result.Status == 'PASS'){
                
                $("#menu_role_succ").show();
                $("#menu_role_err").hide();
                $("#menu_role_dup").hide();
                $("#menu_role_failed").hide();
                $("#textRoleID").val('');
                $("#textRolename").val('');
                $("#role_del_succ").hide();
                
                var table = $('#MENUROLE').DataTable();
                table.destroy();
                LoadRoleMenu(menuid);
                
            }else if(result.Status == 'DUPLICATE'){
                $("#menu_role_dup").show();
                $("#menu_role_succ").hide();
                $("#menu_role_err").hide();
                $("#menu_role_failed").hide();
                $("#menu_role_succ").hide();
            }else{
                $("#menu_role_failed").show();
                $("#menu_role_err").hide();
                $("#menu_role_dup").hide();
                $("#menu_role_succ").hide();
                $("#menu_role_succ").hide();
            }
            //console.log(data);
            $('#btnAddRole').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
    }else{
        $("#menu_role_err").show();
        $("#menu_role_failed").hide();
        $("#menu_role_dup").hide();
        $("#menu_role_succ").hide();
        $('#btnAddRole').button('reset');
    }
    
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

function LoadMenu(){
    
    $('#ROLEMENU').empty();
    
    var table = $('#ROLEMENU').dataTable({

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
           {"data": "MENU_ID", "className": "text-center", "defaultContent": ''},
           {"data": "MENU_NAME", "className": "text-center", "defaultContent": ''},
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
            {"data": "MENU_ID", "className": "text-center", "defaultContent": '',
             "render": function (data, type, full) {
                      
                 var result = "<a href='#' class='edit' data='" + data + "' data2='" + full.MENU_NAME + "'><i class='fa fa-edit'></i></a>";;                       
                 return result;
                }        
            },
//            {"data": "MENU_ID", "className": "text-center", "defaultContent": '',
//             "render": function (data, type, full) {
//                        
//                 var result = "<a href='#' class='del' data='" + data + "'><i class='fa fa-close'></i></a>";;                       
//                 return result;
//                }        
//            },
            {"data": "MENU_ID", "className": "text-center", "defaultContent": '',
             "render": function (data, type, full) {
                        
                 var result = "<a href='#' class='role' data='" + data + "' data2='" + full.MENU_NAME + "'><i class='fa fa-edit'></i></a>";;                       
                 return result;
                }        
            }
            
           
        ],
        order: [[3, "desc"]],   
        ajax: {
            url: "get_menu.php", 
            async: true
        }
        
        

    });
    
    var table = $('#ROLEMENU').DataTable();
        table.columns(0).header().to$().text('รหัส MENU');
        table.columns(1).header().to$().text('ชื่อ MENU');
        table.columns(2).header().to$().text('วันที่สร้าง');
        table.columns(3).header().to$().text('วันที่แก้ไข');
        table.columns(4).header().to$().text('แก้ไข');
//        table.columns(5).header().to$().text('ลบ');
        table.columns(5).header().to$().text('ROLE');
        
    $("#ROLEMENU").on('click','a.edit', function() {        
        var $tr = $(this).closest('a');
        var menuid = $tr.attr("data"); 
        var menuname = $tr.attr("data2"); 
        LoadMenuData(menuid,menuname);
    });
    
    $("#ROLEMENU").on('click','a.del', function() {        
        var $tr = $(this).closest('a');
        var menuid = $tr.attr("data");        
        DelMenu(menuid);
    });
    
    $("#ROLEMENU").on('click','a.role', function() {        
        var $tr = $(this).closest('a');
        var menuid = $tr.attr("data"); 
        var menuname = $tr.attr("data2"); 
        var table = $('#MENUROLE').DataTable();
        table.destroy();
        LoadRoleMenuData(menuid,menuname);
    });
    
        
}

function LoadRoleMenu(menuid){
    
    $('#MENUROLE').empty();
    
    var table = $('#MENUROLE').dataTable({

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
           {"data": "MENU_ID", "className": "text-center", "defaultContent": ''},
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
           
            {"data": "User_Role_ID", "className": "text-center", "defaultContent": '',
             "render": function (data, type, full) {
                        
                 var result = "<a href='#' class='del' data='" + data + "' data2='" + full.MENU_ID + "'><i class='fa fa-close'></i></a>";;                       
                 return result;
                }        
            }
            
            
           
        ],
        order: [[3, "desc"]],   
        ajax: {
            url: "get_role_menu.php", 
            data:{menuid:menuid},
            async: true
        }
        
        

    });
    
    var table = $('#MENUROLE').DataTable();
        table.columns(0).header().to$().text('รหัส MENU');
        table.columns(1).header().to$().text('User_Role_ID');
        table.columns(2).header().to$().text('User_Role_Name');
        table.columns(3).header().to$().text('วันที่เพิ่ม');
        table.columns(4).header().to$().text('ลบ');
               

    
    $("#MENUROLE").on('click','a.del', function() {        
        var $tr = $(this).closest('a');
        var roleid = $tr.attr("data");  
        var menuid = $tr.attr("data2"); 
        DelRoleMenu(roleid,menuid);
    });

        
}

function DelRoleMenu(roleid,menuid){
    
   
    
    if(roleid != "" && menuid != ""){  
        
        $("#emp_err").hide();
        
        $.ajax('add_role_menu.php', {        
            method: 'GET',
            dataType: 'json',
            data: {roleid:roleid,menuid:menuid,type:"D"},
            async: true
        }).then(function success(data) {
            var result = data.data;
            //console.log(data);
            if(result.Status == 'PASS'){
                
                var table = $('#MENUROLE').DataTable();
                table.destroy();
                LoadRoleMenu(menuid);
                
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

function LoadRoleMenuData(menuid,menuname){
    
    $("#lbMenuID").val('');
    $("#lbMenuID").val(menuid);
    $("#lbNameRole").text('');
    $("#lbNameRole").text(menuname);
    $('#MENUROLEMANAGE').modal('show');
    LoadRoleMenu(menuid);
    
}

function EditMenu(){
    
    var menuname = $("#txtEditMenuName").val();
    var menuid = $("#txtEditMenuID").val();
    if(menuname != ""){
        
          $.ajax('add_menu.php', {        
            method: 'GET',
            dataType: 'json',
            data: {menuname:menuname,menuid:menuid,type:"U"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            //console.log(result);
            if(result.Status == 'PASS'){
                
                $("#edit_role_succ").show();
                $("#edit_role_failed").hide();  
                $("#edit_role_err").hide();                
                $("#txtMenuName").val('');
                
                var table = $('#ROLEMENU').DataTable();
                table.destroy();
                LoadMenu();
                
         
            }else{
                $("#edit_role_failed").show();                
                $("#edit_role_succ").hide();
                $("#edit_role_err").hide();  
               
            }
            //console.log(data);
            $('#btnEditMenu').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
        
    }else{
        $("#edit_role_err").show();
        $("#edit_role_succ").hide();
        $("#edit_role_failed").hide(); 
    }
    
}

function DelMenu(menuid){
    
    if(menuid != ""){
        
         $.ajax('add_menu.php', {        
            method: 'GET',
            dataType: 'json',
            data: {menuname:"-",menuid:menuid,type:"D"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;           
            //console.log(data);
            if(result.Status == "PASS"){                
                var table = $('#ROLEMENU').DataTable();
                table.destroy();  
                LoadMenu();
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

function AddMenu(){
    
    var menuname = $("#txtMenuName").val();
    if(menuname != ""){
        
          $.ajax('add_menu.php', {        
            method: 'GET',
            dataType: 'json',
            data: {menuname:menuname,menuid:"-",type:"I"},
            async: true
        }).then(function success(data) {
            
            var result = data.data;
            //console.log(result);
            if(result.Status == 'PASS'){
                
                $("#role_succ").show();
                $("#role_failed").hide();  
                $("#role_err").hide();                
                $("#txtMenuName").val('');
                
                var table = $('#ROLEMENU').DataTable();
                table.destroy();
                LoadMenu();
                
         
            }else{
                $("#role_failed").show();                
                $("#role_succ").hide();
                $("#role_err").hide();  
               
            }
            //console.log(data);
            $('#btnSaveMenu').button('reset');

        }, function fail(data, status) {
            console.log(status);
        });
        
        
    }else{
        $("#role_err").show();
        $("#role_succ").hide();
        $("#role_failed").hide();  
    }
    
}

function LoadMenuData(menuid,menuname){
    
    $("#txtEditMenuID").val('');
    $("#txtEditMenuID").val(menuid);
    $("#txtEditMenuName").val('');
    $("#txtEditMenuName").val(menuname);
    $('#MENUEDIT').modal('show');
    
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








