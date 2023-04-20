$(function () {
    
   
    $('#dateStart').datetimepicker({
       format: 'YYYY-MM-DD'
    });
    
    $('#dateEnd').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    GetCurrentDate();
    LoadDatatable();
    
    $("#brnReload").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadDatatable();
    });
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    

});



function GetCurrentDate(){
    
        Date.prototype.yyyymmdd = function() {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();

        return [  this.getFullYear(),               
                (mm>9 ? '' : '0') + mm,
                 (dd>9 ? '' : '0') + dd
               
               ].join('-');
    };
    
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    
    $('#sStart').val(date.yyyymmdd());
    $('#sEnd').val(date.yyyymmdd());
    
      
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

function LoadDatatable(){
    
    var startDate = $('#sStart').val();
    var endDate = $('#sEnd').val();
    
    var table = $('#WORKLISTREPORT').DataTable();     
     table.destroy();  
       
    $('#WORKLISTREPORT').empty();   
    
    
    var table = $('#WORKLISTREPORT').dataTable({
       
        destroy: true,
        stateSave: true,
        sScrollX: "100%",
        sScrollXInner: "120%",
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
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        columns: [
            {"data": "ARM_TRACK_GROUP_DESC", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_TRACK_NAME", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_CUSTOMER_NAME", "className": "text-center", "defaultContent": ''},   
            {"data": "ARM_CUSTOMER_TEL", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_CALL_DATE", "className": "text-center", "defaultContent": '',
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
            {"data": "ARM_EMPLOYEE_CALL_NAME", "className": "text-center", "defaultContent": ''},   
            {"data": "ARM_RECORD_CALL_DETAIL", "className": "text-center", "defaultContent": ''},   
            {"data": "CREATE_DATE", "className": "text-center", "defaultContent": '',
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
            
           
        ],       
        
        ajax: {
            url: "get_customer_record_call.php",
            data: {startdate:startDate,enddate:endDate},
            method: "GET"
           
        },

    });

    var table = $('#WORKLISTREPORT').DataTable();
    table.ajax.reload();
    
var table = $('#WORKLISTREPORT').DataTable();
    table.columns(0).header().to$().text('ARM_TRACK_GROUP_DESC');
    table.columns(1).header().to$().text('ARM_TRACK_NAME');
    table.columns(2).header().to$().text('ARM_CUSTOMER_NAME');
    table.columns(3).header().to$().text('ARM_CUSTOMER_TEL');    
    table.columns(4).header().to$().text('ARM_CALL_DATE');    
    table.columns(5).header().to$().text('ARM_EMPLOYEE_CALL_NAME');    
    table.columns(6).header().to$().text('ARM_RECORD_CALL_DETAIL');    
    table.columns(7).header().to$().text('CREATE_DATE');    
    
    $("#brnReload").button('reset');
 
}