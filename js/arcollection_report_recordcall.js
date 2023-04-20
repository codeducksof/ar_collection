
$(function () {
    $('#dateStart').datetimepicker({
       format: 'YYYY-MM-DD'
    });
    
    $('#dateEnd').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    GetCurrentDate();
    $("#btnReload").button('loading');
    
    $("#btnReload").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');  
        LoadDataJson();
    });
    
//    $("#dateStart").on("dp.change", function (e) {
//        //$('#dateEnd').data("DateTimePicker").minDate(e.date);
//        LoadDatatable2();
//    });
//    $("#dateEnd").on("dp.change", function (e) {
//        //$('#dateStart').data("DateTimePicker").maxDate(e.date);
//        LoadDatatable2();
//    });
    
    LoadDataJson();
    
    $("#btnExport").on("click", function (e) { 
        var $this = $(this);
        $this.button('loading');  
        ExportFile();
    });
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");    
    
});

function LoadDatatable2(){
    
    $.ajax({
        url:'worklist/' + $("#txtEmpID").val() + 'reportrecord.json',
            type:'HEAD',
            error: function()
            {   
                LoadDataJson();
            },
            success: function()
            {  
                LoadDatatable('worklist/'+$("#txtEmpID").val() + 'reportrecord.json');
            }
    });
    
}

function LoadDataJson(){
    
    
   var startDate = $('#sStart').val();
    var endDate = $('#sEnd').val();
    
    $.ajax('get_report_record_call.php', {       
        method: 'GET',
        async: true,
        cache: false,  
        data: {startdate:startDate,enddate:endDate},
    }).then(function success(data) {
       
 
       var file = 'worklist/' + $("#txtEmpID").val() + 'reportrecord.json';
       LoadDatatable(file); 
       $("#btnReload").button('reset');


    }, function fail(data, status) {
        console.log(status);
    });
    
}

function ExportFile(){
    
    $.ajax('export_arcollection_recordcall.php', {       
        method: 'GET',
        dataType: 'json',
    }).then(function success(data) {  
    var result = data.data;  
        //console.log(result);
        if(result != ''){
            window.open(result,'_blank');
        }
       $("#btnExport").button('reset');
        
    }, function fail(data, status) {
     
        $("#btnExport").button('reset');
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
        return [(dd > 9 ? '' : '0') + dd ,(mm > 9 ? '' : '0') + mm, (this.getFullYear() + 543) + ' ' + (hh > 9 ? '' : '0') + hh + ':' + (mmm > 9 ? '' : '0') + mmm + ':' + (ss > 9 ? '' : '0') + ss

        ].join('/');
    };
    var getDate = new Date(nStr);
    var reformatDate = getDate.changeFormat();

    return reformatDate;
}


function LoadDatatable(file){
    
    var startDate = $('#sStart').val();
    var endDate = $('#sEnd').val();
    
    var table = $('#WORKLISTREPORT').DataTable();     
     table.destroy();  
       
    //$('#WORKLISTREPORT').empty();
   
    $('#WORKLISTREPORT').show();
    
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
         buttons: [
            'excel', 'print','pageLength'
        ],
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
            {"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_AGING_TYPE", "className": "text-center", "defaultContent": ''},
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
            {"data": "ARM_COLLECTOR_NAME_TH", "className": "text-center", "defaultContent": ''},   
            {"data": "ARM_DEPARTMENT_NAME", "className": "text-center", "defaultContent": ''},   
            {"data": "ARM_PAYMENT_AMT", "className": "text-center", "defaultContent": ''},   
            {"data": "ARM_PAYMENT_DATE", "className": "text-center", "defaultContent": '',
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
            {"data": "ARM_RECORD_CALL_DETAIL", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_TRACK_CODE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_TRACK_NAME", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_EMPLOYEE_CALL_NAME", "className": "text-center", "defaultContent": ''},  
            {"data": "ARM_CUSTOMER_TEL", "className": "text-center", "defaultContent": ''},  
            
           
        ],       
        ajax : file,
//        ajax: {
//            url: "get_report_record_call.php",
//            data: {startdate:startDate,enddate:endDate},
//            method: "GET"
//           
//        },

    });

//    var table = $('#WORKLISTREPORT').DataTable();
//    table.ajax.reload();
    
var table = $('#WORKLISTREPORT').DataTable();

    table.columns(0).header().to$().text('ARM_ACC_NO');
    table.columns(1).header().to$().text('ARM_AGING_TYPE');
    table.columns(2).header().to$().text('ARM_CALL_DATE');
    table.columns(3).header().to$().text('ARM_COLLECTOR_NAME_TH');    
    table.columns(4).header().to$().text('ARM_DEPARTMENT_NAME');    
    table.columns(5).header().to$().text('ARM_PAYMENT_AMT');    
    table.columns(6).header().to$().text('ARM_PAYMENT_DATE');    
    table.columns(7).header().to$().text('ARM_RECORD_CALL_DETAIL');    
    table.columns(8).header().to$().text('ARM_TRACK_CODE');
    table.columns(9).header().to$().text('ARM_TRACK_NAME');    
    table.columns(10).header().to$().text('ARM_EMPLOYEE_CALL_NAME');  
  
}