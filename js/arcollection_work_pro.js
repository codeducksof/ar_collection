
$(function () {


    $("#btnImport").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });

    $('#frmImportFile').validator().on('submit', function (e) {

        if (e.isDefaultPrevented(e)) {
            $("#btnImport").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnImport").removeClass("disabled");
            $("#btnImport").removeAttr('disabled');
            return false;
        } else {


            $.ajax('import_arcollection_pro.php', {
                method: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: new FormData(this),
                dataType: 'json'
            }).then(function success(data) {
                var result = data.data;
                if(result[0] == 'PASS'){
                    ShowDataPro();
                    $("#btnImport").button('reset');
                }
                

            }, function fail(data, status) {
                console.log(status);
            });
            return false;
        }

    });

    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");

});



function ShowDataPro(){
    
     var table = $('#WORKPRO').DataTable();     
     table.destroy(); 
    
     $('#WORKPRO').empty();
    
   

       
    var table = $('#WORKPRO').dataTable({
        dom: 'Bfrtip',
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
            {"data": "Create_Date", "className": "text-center", "defaultContent": ''},
            {"data": "Create_By", "className": "text-center", "defaultContent": ''},
            {"data": "Update_Date", "className": "text-center", "defaultContent": ''},
            {"data": "Update_By", "className": "text-center", "defaultContent": ''},
            {"data": "InActive", "className": "text-center", "defaultContent": ''}           
        ],       
       
        ajax: {
            url: "import_arcollection_view_pro.php",
            method: "GET",
           
        }

    });

    var table = $('#WORKPRO').DataTable();
    table.columns(0).header().to$().text('เลขที่บัญชี');
    table.columns(1).header().to$().text('วันที่สร้าง');
    table.columns(2).header().to$().text('ผู้สร้าง');
    table.columns(3).header().to$().text('วันที่แก้ไข');
    table.columns(4).header().to$().text('ผู้แก้ไข');
    table.columns(5).header().to$().text('InActive');
   
   
    
}

