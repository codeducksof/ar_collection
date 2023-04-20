
$(function () {
  
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd'
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });
    
    var currenturl = window.location.href;  
    var url = new URL(currenturl);
    var ptype = url.searchParams.get("ptype");
   
    
    $("#btnReload").on("click", function (e) {       
        var $this = $(this);
        $this.button('loading');        
        LoadDataJson(ptype);        
    });
    
    $.ajax({
        url:'worklist/' + $("#txtEmpID").val() + ptype +'.json',
            type:'HEAD',
            error: function()
            {  
                $("#btnReload").button('loading');
                //alert('1');
                LoadDataJson(ptype);
            },
            success: function()
            {  
                LoadDatatable('worklist/'+$("#txtEmpID").val() + ptype + '.json');
                //alert('2');
            }
    });
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
    
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

function formatDateTime2(nStr) {

   Date.prototype.changeFormat = function () {
        var mm = this.getMonth() + 1; // getMonth() is zero-based
        var dd = this.getDate();
        var hh = this.getHours();
        var mmm = this.getMinutes();
        var ss = this.getSeconds();
        return [this.getFullYear() - 543, (mm > 9 ? '' : '0') + mm, (dd > 9 ? '' : '0') + dd + ' ' + (hh > 9 ? '' : '0') + hh + ':' + (mmm > 9 ? '' : '0') + mmm + ':' + (ss > 9 ? '' : '0') + ss

        ].join('-');
    };
    var getDate = new Date(nStr);
    var reformatDate = getDate.changeFormat();

    return reformatDate;
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

function LoadDataJson(ptype){
    
    //setTimeout( function() {
        $.ajax('get_arcollection.php', {       
            method: 'POST',
            async: true,
            cache: false,
            data: {wktype: ptype},
            timeout: 6000000,
        }).then(function success(data) {

            //console.log(data);
          // var table = $('#WORKLISTOD').DataTable();
          // table.destroy();
            var result = data.data;
            //if(result == 'DEADLOCK'){

                //$('#btnReload').button('reset');
                //alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');

            //}else{
                var file = 'worklist/' + $("#txtEmpID").val() + ptype + '.json';
                LoadDatatable(file);
            //}


          // $('#WORKLISTOD tbody').on('click', 'tr', function () {
          //      var table = $('#WORKLISTOD').DataTable();
          //      var tbRow = table.row(this).data();
          //      //console.log(tbRow.ARM_ACC_NO);
          //      window.location.assign("arcollection_detial.php?accno=" + btoa(tbRow.ARM_ACC_NO));
          //  });

        }, function fail(data, status) {
            console.log(status);
            $('#btnReload').button('reset');
            alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');
        });
    //},3000);
    
}

function LoadDatatable(file){
    
       
        $('#WORKLISTOD').empty();
   
        var table = $('#WORKLISTOD').dataTable({
        dom: 'Bfrtip',
        destroy: true,
        stateSave: true,
        sScrollX: "80%",
        sScrollXInner: "200%",
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
             {"data": "COLOR", "className": "text-center", "defaultContent": '' ,
                "render": function (data, type, full) {                    
                    var result;  
                    if(data == '0'){
                       result = '<a href="#" style="background-color:#000000;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '1'){
                       result = '<a href="#" style="background-color:#F00D25;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '2'){
                       result = '<a href="#" style="background-color:#F1C40F;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '3'){
                       result = '<a href="#" style="background-color:#27AE60;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '4'){
                       result = '<a href="#" style="background-color:#2874A6;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '5'){
                       result = '<a href="#" style="background-color:#641E16;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '6'){
                       result = '<a href="#" style="background-color:#CA6F1E;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '7'){
                       result = '<a href="#" style="background-color:#EC7063;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    if(data == '8'){
                       result = '<a href="#" style="background-color:#6C3483;color:#fff;width:20px;display:block;"> ' + data + '</a>'; 
                    }
                    return result;
                }          
                      
            },
            {"data": "TIME_PLAN", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear() + 543;

                    today = yyyy  + '/' + mm + '/' + dd;
                            
                    var result = '';
                    if (data == '') {
                        result = '-';
                    } else {
                        
                        if(formatDate(data) == today){
                            result = '<i class="fa fa-check text-success"></i>';
                        }else{
                            result = '-'
                        }
                        
                    }
                    return result;
                }            
            },
            {"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": '',},
            {"data": "ARM_BUSINESS_TYPE", "className": "text-center", "defaultContent": '',},
            {"data": "ARM_CUST_NAME", "className": "text-center", "defaultContent": '',},   
            
            {"data": "ARM_PAID_CURR_AMT", "className": "text-center", "defaultContent": '' ,
                "render": function (data, type, full) {                    
                    var result = formatNumber(data);                   
                    return result;
                }          
                      
            },
            {"data": "ARM_ARREAR_AMT", "className": "text-center", "defaultContent": '' ,
                "render": function (data, type, full) {                   
                    var result = formatNumber(data);                   
                    return result;
                }          
                      
            },
            {"data": "ARM_SALES_DATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {                    
                    var result = formatDate(data);                   
                    return result;
                }          
            },
            {"data": "ARM_LAST_PAYDATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {                    
                    var result = formatDate(data);                   
                    return result;
                }          
            },
            {"data": "ARM_PROVISION_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {                    
                    var result = formatNumber(parseFloat(data).toFixed(2));                   
                    return result;
                }          
                      
            },
            {"data": "ARM_CURR_ECC", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {                    
                    var result = formatNumber(data);                   
                    return result;
                }          
                      
          
            },
            {"data": "SHOULD_PAID", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) { 
                    var result = formatNumber(data);  
                    if(data < 0 ){
                         result = "<a style='color:red;font-weight:bold;'><u>" + result + "</u></a>";  
                    }
                                   
                    return result;
                }          
                      
            },            
            {"data": "ARM_AGING_TYPE", "className": "text-center", "defaultContent": '',},
            {"data": "ARM_AGING_CURR_TYPE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result = '';
                    if(data.includes('OD') == true){                   
                       result = "<a style='color:red;font-weight:bold;'>" + data + "</a>";  
                    }else if(data.includes('XDAY') == true){
                       result = "<a style='color:orange;font-weight:bold;'>" + data + "</a>";   
                    }else if(data.includes('CURRENT') == true){
                       result = "<a style='color:green;font-weight:bold;'>" + data + "</a>";   
                    }else if(data.includes('EXCESS') == true){
                       result = "<a style='color:green;font-weight:bold;'>" + data + "</a>";   
                    }else{
                       result = "<a style='color:grey;font-weight:bold;'>" + data + "</a>"; 
                    }                            
                    return result;
                }          
            },   
            
            {"data": "EMP_NAME", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result = '';
                    if(typeof data === 'undefined' || data == ''){
                        result = "<a style='color:blue;font-weight:bold;'> - </a>"; 
                    }else{
                       result = "<a style='color:blue;font-weight:bold;'>" + data + "</a>";  
                    }
                                       
                    return result;
                }          
            },            
            {"data": "ARM_PAYMENT_TYPE", "className": "text-center", "defaultContent": '',},            
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
            },
            {"data": "WORK_PLAN", "className": "text-center", "defaultContent": '',},
            {"data": "REMARK", "className": "text-center", "defaultContent": '',}
        ],
        ajax : file,       
        initComplete: function () {
           
           this.api().columns(12).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""> ทั้งหมด </option></select>')
                    .appendTo( $("#filterAgeType").empty() )
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
            
            this.api().columns(13).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""> ทั้งหมด </option></select>')
                    .appendTo( $("#filterAgeCurType").empty() )
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
            
            this.api().columns(14).every( function () {
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
            
             this.api().columns(18).every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""> ทั้งหมด </option></select>')
                    .appendTo( $("#filterGroup").empty() )
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
       

    });
    
//    var table = $('#WORKLISTOD').DataTable();    
//    table.ajax.reload();
    
    
$('#txtLastPayFrom,#txtLastPayTo').change(function(){ table.fnDraw(); });
$('#txtSaleDateForm,#txtSaleDateTo').change(function(){ table.fnDraw(); });
    
    var table = $('#WORKLISTOD').DataTable();
    table.columns(0).header().to$().text('PRIORITY');
    table.columns(1).header().to$().text('การติดตาม');
    table.columns(2).header().to$().text('เลขที่บัญชี');
    table.columns(3).header().to$().text('ชื่อลูกค้า');
    table.columns(4).header().to$().text('PAID_CURR_AMT');
    table.columns(5).header().to$().text('ARREAR_AMT');
    table.columns(6).header().to$().text('LAST_PAYMENT');
    table.columns(7).header().to$().text('PROVISION');
    table.columns(8).header().to$().text('ECC');
    table.columns(9).header().to$().text('ค่างวดที่ต้องเก็บ');    
    table.columns(10).header().to$().text('สถานะสิ้นเดือน');
    table.columns(11).header().to$().text('สถานะปัจจุบัน');
    table.columns(12).header().to$().text('พนักงาน')
    table.columns(13).header().to$().text('กลุ่มลุกค้าผู้รับผิดชอบ');
    table.columns(14).header().to$().text('วันที่บันทึก');
    table.columns(15).header().to$().text('ผลการโทร'); 
    table.columns(16).header().to$().text('GroupRemark');   
    



      $('#WORKLISTOD tbody').on('click', 'tr', function () {
            var table = $('#WORKLISTOD').DataTable();
            var tbRow = table.row(this).data();
            //console.log(tbRow.ARM_ACC_NO);
            var currenturl = window.location.href;  
            var url = new URL(currenturl);
            var ptype = url.searchParams.get("ptype");
    
            window.open("arcollection_detial.php?pageslug="+ ptype +"&readonly=false&accno=" + btoa(tbRow.ARM_ACC_NO),'_blank');
            //window.location.assign("arcollection_detial.php?pageslug=ALL&accno=" + btoa(tbRow.ARM_ACC_NO));        
    });
    $("#btnReload").button('reset');
   
    
    
    
    $('#WORKLISTOD').dataTable();
    $('#WORKLISTOD_filter input').removeClass("input-sm");
 
   
    $.fn.dataTable.ext.search.push(
            
         function( settings, data, dataIndex ) {

                var columnPayDate1 = new Date(formatDateTime2(data[8]));
                var start = $("#txtLastPayFrom").val();
                var end = $("#txtLastPayTo").val();
                
                var customDate1 = new Date(formatDateTime2(start));
                var customDate2 = new Date(formatDateTime2(end));
                var evalDate = Date.parse(columnPayDate1.toDateString());
            
                var dateStart = Date.parse(customDate1.toDateString());
                var dateEnd = Date.parse(customDate2.toDateString());
                
                if(start == "" || end == ""){
                    return true;
                }else{
                
                    if (evalDate >= dateStart && evalDate <= dateEnd) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                
                
               
        
});
    
$.fn.dataTable.ext.search.push(
            
         function( settings, data, dataIndex ) {

                var columnPayDate1 = new Date(formatDateTime2(data[7]));
                var start = $("#txtSaleDateForm").val();
                var end = $("#txtSaleDateTo").val();
                
                var customDate1 = new Date(formatDateTime2(start));
                var customDate2 = new Date(formatDateTime2(end));
                var evalDate = Date.parse(columnPayDate1.toDateString());
            
                var dateStart = Date.parse(customDate1.toDateString());
                var dateEnd = Date.parse(customDate2.toDateString());
                
                if(start == "" || end == ""){
                    return true;
                }else{
                
                    if (evalDate >= dateStart && evalDate <= dateEnd) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
        
});   


  

}