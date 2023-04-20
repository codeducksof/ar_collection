
$(function () {
        
    LoadDataJson();
    
    $("#brnReload").on("click", function (e) {       
        var $this = $(this);
        $this.button('loading');        
        LoadDataJson();        
    });    
    
	$('#WORKALL tbody').on('click', 'tr', function () {
            var table = $('#WORKALL').DataTable();
            var tbRow = table.row(this).data();
            //console.log(tbRow.ARM_ACC_NO);
            var currenturl = window.location.href;  
            var url = new URL(currenturl);
            var ptype = url.searchParams.get("ptype");
            var role = $("#txtRoleUser").val();
    
            window.open("arcollection_detial.php?pageslug="+ ptype +"&readonly=" + role + "&accno=" + btoa(tbRow.ARM_ACC_NO),'_blank');
            //window.location.assign("arcollection_detial.php?pageslug=ALL&accno=" + btoa(tbRow.ARM_ACC_NO));        
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

function LoadDataJson(){
    
    $.ajax('get_arcollection_autodail.php', {       
        method: 'POST',
        async: true,
        cache: false,
        //timeout: 60000,
    }).then(function success(data) {
        
       //console.log(data);
        var result = data.data;
        if(result == 'DEADLOCK'){

            $('#btnReload').button('reset');
           alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');

        }else {
			
            var table = $('#WORKALL').DataTable();
            table.destroy();
            var file = 'worklist/' + $("#txtEmpID").val() + 'WORK_LIST_EMP.json';
            LoadDatatable(file);
        }

    }, function fail(data, status) {
        console.log(status);
        $('#btnReload').button('reset');
        //alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');
    });
    
}

function LoadDatatable(file){
    
    var table = $('#WORKALL').DataTable();
        table.clear();
     
    table.buttons( '.export' ).remove();
        
    var table = $('#WORKALL').dataTable({
        
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
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
            {"data": "ID", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": ''},
          	{"data": "ARM_CUST_MOBILE", "className": "text-center", "defaultContent": ''},	
			{"data": "ARM_GROUP_ASSIGN", "className": "text-center", "defaultContent": ''},	
			{"data": "ARM_ACC_STATUS", "className": "text-center", "defaultContent": ''},	
			{"data": "USER_REV", "className": "text-center", "defaultContent": ''},				
            {"data": "CREATE_DATE", "className": "text-center", "defaultContent": ''
            ,
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
            {"data": "CREATE_BY", "className": "text-center", "defaultContent": ''}
            
        ],       
        ajax : file,
        initComplete: function () {
           
           this.api().columns(4).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""> ทั้งหมด </option></select>')
                    .appendTo( $("#filterPerson").empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
            });
            
           
        }
		
		
//        ajax: {
//            url: "ListHistoryCollection.php",
//            method: "GET",
//           
//        },

    });
	
	

//var table = $('#WORKALL').DataTable();
//    table.columns(0).header().to$().text('User_ID_FROM');
//    table.columns(1).header().to$().text('User_ID_TO');
//    table.columns(2).header().to$().text('ARM_ACC_NO');
//    table.columns(3).header().to$().text('Create_Date');
//    table.columns(4).header().to$().text('Create_By');
//    table.columns(5).header().to$().text('Update_Date');
//    table.columns(6).header().to$().text('Update_By');
//    table.columns(7).header().to$().text('InActive');   
//    table.columns(8).header().to$().text('Remark');   
    
    $("#brnReload").button('reset');

    
    
}