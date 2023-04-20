
$(function () {
   
    
    $('#btnClear').on('click', function () {        
        var $this = $(this);
        $this.button('loading'); 
        ResetFiedls();
    });
    
    $('#btnSearch').on('click', function () {        
        var $this = $(this);
        $this.button('loading');       
        SearchWorklist();    
    });
         
   
    $('#saleSDate').datetimepicker({
       format: 'YYYY-MM-DD'
    }); 
    $('#saleEDate').datetimepicker({
       format: 'YYYY-MM-DD'
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

function ResetFiedls(){
      
        $("#txtAccountNo").val('');
        $("#txtAging").val('');
        $("#txtSSaleDate").val('');
        $("#txtESaleDate").val('');
        $("#txtCustID").val('');
        $("#txtCustname").val('');
        $("#txtSaleID").val('');
        $("#txtSaleName").val('');
        
        $('#btnClear').button('reset');
}
function SearchWorklist(){
    SearchWorklistTable();
    // $.ajax('check_lock.php', {
    //     method: 'POST',
    //     contentType: false,
    //     processData: false,
    //     cache: false,
    //     dataType: 'json'
    // }).then(function success(data) {
    //     var result = data.data;
    //     //console.log(result);
    //     if(result == 'DEADLOCK'){
    //         $("#btnSearch").button('reset');
    //         alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');
    //     }else{
    //         SearchWorklistTable();
    //     }
    //
    //
    // }, function fail(data, status) {
    //     console.log(status);
    // });

}

function SearchWorklistTable(){
    
     
     var table = $('#WORKLIST').DataTable();     
     table.destroy(); 
    
    var accno,aging,ssaledate,esaledate,custid,custname,saleid,salename,recno,snno,flagblock;
    accno =  $("#txtAccountNo").val();
    aging = $("#txtAging").val();
    ssaledate = $("#txtSSaleDate").val();
    esaledate = $("#txtESaleDate").val();
    custid = $("#txtCustID").val();
    custname =  $("#txtCustname").val();
    saleid = $("#txtSaleID").val();
    salename = $("#txtSaleName").val();
    recno = $("#txtRecNo").val();
    snno = $("#txtSerialNo").val();
	flagblock = $("#txtAccBlock").val();
    
    if(accno == ""){
        accno = "-";
    }
    if(aging == ""){
        aging = "-";
    }
    if(ssaledate == ""){
        ssaledate = "-";
    }
    if(esaledate == ""){
        esaledate = "-";
    }
    if(custid == ""){
        custid = "-";
    }
    if(custname == ""){
        custname = "-";
    }
    if(saleid == ""){
        saleid = "-";
    }
    if(salename == ""){
        salename = "-";
    }
    if(recno == ""){
        recno = "-";
    }
    if(snno == ""){
        snno = "-";
    }
	if(flagblock == "0"){
        flagblock = "-";
    }
    //console.log(accno,aging,ssaledate,esaledate,custid,custname,saleid,salename);    
    LoadDatatable(accno,aging,ssaledate,esaledate,custid,custname,saleid,salename,recno,snno,flagblock);
    
}

function LoadDatatable(accno,aging,ssaledate,esaledate,custid,custname,saleid,salename,recno,snno,flagblock){    
    
   $('#WORKLIST').empty();
    
    var table = $('#WORKLIST').dataTable({
        destroy: true,
        stateSave: true,
        sScrollX: "100%",
        sScrollXInner: "100%",
        bScrollCollapse: true,
        bAutoWidth: false,
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
            {"data": "ACC_SPECIAL", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_BUSINESS_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_CUST_NAME", "className": "text-center", "defaultContent": ''
				
				,"render": function (data, type, full) {
                    var result = '';
					var usGroup = $("#lbUsGroup").val();
                    if(usGroup == 'Y'){  
									
                       result =  data.substring(0,data.length -6) + "******";                      
                    }else{
                       result = data; 
                    }                            
                    return result;
                }          
			  
			},   
            {"data": "ARM_CUST_NIC", "className": "text-center", "defaultContent": ''
				,"render": function (data, type, full) {
                    var result = '';
					var usGroup = $("#lbUsGroup").val();
                    if(usGroup == 'Y'){  
									
                       result = data.substring(0, 2) + "********" + data.substring(9, 13);                      
                    }else{
                       result = data; 
                    }                            
                    return result;
                }          
			},  
            {"data": "ARM_AGING_TYPE", "className": "text-center", "defaultContent": ''},
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
            {"data": "ARM_PAYMENT_TYPE", "className": "text-center", "defaultContent": ''},            
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
            {"data": "WORK_PLAN", "className": "text-center", "defaultContent": ''},			
            {"data": "ARM_ACC_STAT", "className": "text-center", "defaultContent": ''},
			{"data": "ARM_ACC_NO", "className": "text-center", "defaultContent": ''},
			
        ],
		
		columnDefs: [
            { 'visible': false, 'targets': [11] }

        ],
		
        ajax: {
            url: "get_arcollection_search.php",
            method: "GET",
            cache: false,
            async: true,
            data: {
                accno: accno,
                aging: aging,
                ssaledate: ssaledate,
                esaledate: esaledate,
                custid: custid,
                custname: custname,
                saleid: saleid,
                salename: salename,
                recno: recno,
                snno: snno,
				flagblock: flagblock,
            }
           
        }
    });

//    var table = $('#WORKLIST').DataTable();
//    table.ajax.reload();
   
				

    var table = $('#WORKLIST').DataTable();
    table.columns(0).header().to$().text('เลขที่บัญชี');
    table.columns(1).header().to$().text('ประเภทบัญชี');
    table.columns(2).header().to$().text('ชื่อลูกค้า');
    table.columns(3).header().to$().text('เลขบัตรประชาชนลูกค้า');
    table.columns(4).header().to$().text('สถานะสิ้นเดือน');
    table.columns(5).header().to$().text('สถานะปัจจุบัน');
    table.columns(6).header().to$().text('พนักงาน');
    table.columns(7).header().to$().text('กลุ่มลุกค้า');
    table.columns(8).header().to$().text('วันที่บันทึก');
    table.columns(9).header().to$().text('ผลการโทร');	
    table.columns(10).header().to$().text('สถานะบัญชี');
	
    $("#btnSearch").button('reset');
    
    $('#WORKLIST tbody').on('click', 'tr', function () {
            var table = $('#WORKLIST').DataTable();
            var tbRow = table.row(this).data();
            //console.log(tbRow.ARM_ACC_NO);
            var currenturl = window.location.href;  
            var url = new URL(currenturl);
            var ptype = url.searchParams.get("ptype");
            var role = $("#txtRoleUser").val();
    
            window.open("arcollection_detial.php?pageslug="+ ptype +"&readonly=" + role + "&accno=" + btoa(tbRow.ARM_ACC_NO),'_blank');
            //window.location.assign("arcollection_detial.php?pageslug=ALL&accno=" + btoa(tbRow.ARM_ACC_NO));        
    });
    
	 var table = $('#WORKLIST').DataTable();
	var column = table.column(11);
	//console.log(column);
	column.visible(!column.visible());
}

