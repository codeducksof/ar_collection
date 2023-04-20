(function ($) {
    
    ListUserBlock();
    
    
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
    $("#btnUnlock").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });
    
    $("#btnReload").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');   
        ListUserBlock();        
    });
    
    $('#frmUnlock').validator().on('submit', function (e) {

        if (e.isDefaultPrevented(e)) {
            $("#btnUnlock").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnUnlock").removeClass("disabled");
            $("#btnUnlock").removeAttr('disabled');
            return false;
        } else {
           AddUnlockUser();
            return false;
        }
        
    });

})(jQuery);

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

function formatDate2(nStr) {

    Date.prototype.changeFormat = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();

        return [this.getFullYear() + 543, (mm > 9 ? '' : '0') + mm

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

function AddUnlockUser() {

    var empunlock = $("#txtUserLock").val();  
    var otp = $("#txtOTP").val();
 

    $.ajax('add_arcollection_unlockuser.php', {
        data: {empunlock:empunlock,otp:otp},
        method: 'GET',
        cache: false,
        dataType: 'json'

    }).then(function success(data) {

        console.log(data);
        var result = data.data;
        //console.log(result);
        if (result.STATUS == 'Pass') {
            $('#succ').show();
            $('#err').hide();
            $("#txtUserLock").val('');  
            $("#txtOTP").val('');
        } else {
            $('#succ').hide();
            $('#err').show();
        }
        ListUserBlock();
        $("#btnUnlock").button('reset');
       

    }, function fail(data, status) {
        console.log(status);
    });




}

function ListUserBlock(){
    
    
     var table = $('#BLOCKLIST').dataTable({
        destroy: true,
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
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        oLanguage: {
            sLengthMenu: "แสดง _MENU_ รายการ/หน้า",
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
            {"data": "OTP", "className": "text-center", "defaultContent": ''},
            {"data": "STATUS_OTP", "className": "text-center", "defaultContent": ''},
            {"data": "CREATE_DATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }
            },
            {"data": "CREATE_BY", "className": "text-center", "defaultContent": ''},          

        ],
        order: [[2, "desc"]],
        ajax: {
            url: "get_arcollection_unlockuser.php",
            method: "GET",
            cache: false,
            async: true,
            

        }

    });

    var table = $('#BLOCKLIST').DataTable();
    table.ajax.reload();
    
    $('#BLOCKLIST tbody').on('click', 'tr', function () {        
        var table = $('#BLOCKLIST').DataTable();
        var tbRow = table.row(this).data();
          
       $("#txtUserLock").val(tbRow.EMP_CODE);  
       $("#txtOTP").val(tbRow.OTP);
    
    });
    
    $("#btnReload").button('reset');
    
}