
$(function () {
    
    $("#btnReload").on("click", function (e) {       
        var $this = $(this);
        $this.button('loading');        
        LoadDataJson();        
    });
    
    $.ajax({
        url:'worklist/' + $("#txtEmpID").val() + 'XDAY.json',
            type:'HEAD',
            error: function()
            {            
               
                $("#btnReload").button('loading');
                LoadDataJson();
            },
            success: function()
            {  
                LoadDatatable('worklist/'+$("#txtEmpID").val() + 'XDAY.json');
            }
    });
   
    
});

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

function LoadDataJson(){
    
    $.ajax('get_arcollection.php', {       
        method: 'GET',
        data: {wktype: "XDAY"}
    }).then(function success(data) {
       
       console.log(data);
       var table = $('#WORKLISTOD').DataTable();     
       table.destroy();  
       var file = 'worklist/' + $("#txtEmpID").val() + 'XDAY.json';
       LoadDatatable(file);        
//       $('#WORKLISTOD tbody').on('click', 'tr', function () {
//            var table = $('#WORKLISTOD').DataTable();
//            var tbRow = table.row(this).data();
//            //console.log(tbRow.ARM_ACC_NO);
//            window.location.assign("arcollection_detial.php?accno=" + btoa(tbRow.ARM_ACC_NO));        
//        });
    }, function fail(data, status) {
        console.log(status);
    });
    
}

function LoadDatatable(file){
    
    $('#WORKLISTOD').empty();
    $('#WORKLISTOD').show();
    var table = $('#WORKLISTOD').dataTable({

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
            {"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_BUSINESS_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_CUST_NAME", "className": "text-center", "defaultContent": ''},           
            {"data": "ARM_AGING_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_AGING_CURR_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_PAYMENT_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "WORK_PLAN", "className": "text-center", "defaultContent": ''},
            {"data": "TIME_PLAN", "className": "text-center", "defaultContent": '',
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
        ajax : file
//        ajax: {
//            url: "ListHistoryCollection.php",
//            method: "GET",
//           
//        },

    });

var table = $('#WORKLISTOD').DataTable();
    table.columns(0).header().to$().text('เลขที่บัญชี');
    table.columns(1).header().to$().text('ประเภทบัญชี');
    table.columns(2).header().to$().text('ชื่อลูกค้า');
    table.columns(3).header().to$().text('สถานะสิ้นเดือน');
    table.columns(4).header().to$().text('สถานะปัจจุบัน');
    table.columns(5).header().to$().text('กลุ่มลุกค้า');
    table.columns(6).header().to$().text('เวลาแผนงาน');
    table.columns(7).header().to$().text('แผนงาน');   
    
    $("#btnReload").button('reset');
    $('#WORKLISTOD tbody').on('click', 'tr', function () {
            var table = $('#WORKLISTOD').DataTable();
            var tbRow = table.row(this).data();
            //console.log(tbRow.ARM_ACC_NO);
            window.open("arcollection_detial.php?pageslug=XDAY&accno=" + btoa(tbRow.ARM_ACC_NO),'_blank');
            //window.location.assign("arcollection_detial.php?accno=" + btoa(tbRow.ARM_ACC_NO));        
        });
    
}