
$(function () {
    $('#dateStart').datetimepicker({
       format: 'YYYY-MM-DD'
    });
    
    $('#dateEnd').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    GetCurrentDate();
    //$("#btnReload").button('loading');
    
    $("#btnReload").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');  
        LoadDatatable();
    });
    
//    $("#dateStart").on("dp.change", function (e) {
//        //$('#dateEnd').data("DateTimePicker").minDate(e.date);
//        LoadDatatable2();
//    });
//    $("#dateEnd").on("dp.change", function (e) {
//        //$('#dateStart').data("DateTimePicker").maxDate(e.date);
//        LoadDatatable2();
//    });
    
   LoadDatatable();
    
//    $("#btnExport").on("click", function (e) { 
//        var $this = $(this);
//        $this.button('loading');  
//        ExportFile();
//    });
    
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


function LoadDatatable(){
    
    var startDate = $('#sStart').val();
    var endDate = $('#sEnd').val();
    
    var table = $('#SGHOMEREPORT').DataTable();     
    table.destroy();
    $('#SGHOMEREPORT').empty();
   
    //$('#SGHOMEREPORT').show();
    
    var table = $('#SGHOMEREPORT').dataTable({
        
        
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
        dom: 'Bfrtip',
         buttons: [
            'excel','pageLength'
        ],
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
            {"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": ''},
            {"data": "NAME_DOC", "className": "text-center", "defaultContent": ''},           
            {"data": "DESC_DOC", "className": "text-center", "defaultContent": ''},   
            {"data": "PATH", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result = '';
                    if (data == '') {
                        result = '-';
                    } else {
                        result = "<a href='" + data + "' target='_blank'> LINK FILE </a>";
                    }
                    return result;
                }       
            },   
            {"data": "CREATE_BY", "className": "text-center", "defaultContent": ''}, 
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
            {"data": "CustomerID", "className": "text-center", "defaultContent": ''},
            {"data": "MobileNo1", "className": "text-center", "defaultContent": ''},
            {"data": "MobileNo2", "className": "text-center", "defaultContent": ''},
            {"data": "FirstName", "className": "text-center", "defaultContent": ''},   
            {"data": "LastName", "className": "text-center", "defaultContent": ''},   
            
           
        ],       
//        ajax : file,
        ajax: {
            url: "get_report_sg_home_contact.php",
            data: {startdate:startDate,enddate:endDate},
            method: "GET"
           
        },

    });

    $("#btnReload").button('reset');
    //    var table = $('#WORKLISTREPORT').DataTable();
    //    table.ajax.reload();

    var table = $('#SGHOMEREPORT').DataTable();

        table.columns(0).header().to$().text('ARM_ACC_NO');
        table.columns(1).header().to$().text('NAME_DOC');
        table.columns(2).header().to$().text('DESC_DOC');
        table.columns(3).header().to$().text('PATH');    
        table.columns(4).header().to$().text('CREATE_BY');    
        table.columns(5).header().to$().text('CREATE_DATE');    
        table.columns(6).header().to$().text('CustomerID');    
        table.columns(7).header().to$().text('MobileNo1');    
        table.columns(8).header().to$().text('MobileNo2');
        table.columns(9).header().to$().text('FirstName');    
        table.columns(10).header().to$().text('LastName');  
  
}