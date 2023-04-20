
$(function () {

   $(".bg_load").fadeOut("slow");
   $(".wrapper").fadeOut("slow");
   
     
    $('#btnReload').on('click', function (e) {
        var $this = $(this);
        $this.button('loading');
        GetWorklistMenu();
        $(".bg_load").show();
        $(".wrapper").show();
    });
	
    //if($("#ME021").text() == "0" ){
		GetWorklistMenu();
	//}
    //alert('1');
    


});



//async function getDataWorkList(menuID, currFile, start, end) {
//    $.ajax({
//        url: currFile,
//        type: 'HEAD',
//        async: true,
//        cache: false,
//        error: function ()
//        {
//            LoadDashBoradData(menuID, start, end);
//        },
//        success: function ()
//        {
//            ShowDashBoradDataFile(currFile, menuID, start, end);
//        }
//    });
//}

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

function GetWorklistMenu() {
       
    $('#btnReload').button('loading');
     //setTimeout( function() {
      $.ajax('get_wroklist_all.php', {
        method: 'GET',
        dataType: 'json',
        cache: false,
        crossDomain: true,
        async: true,
        //timeout: 60000
    }).then(function success(data) {
        
        
        //console.log(data);
        var result = data.data;
        //if(result !== 'DEADLOCK'){

            var maxResult = result.length;
			//console.log(maxResult);
            for (var i = 0; i < maxResult; i++) {
                $("#" + result[i].MENU_CODE).text(formatNumber(0));
            }

            //console.log(maxResult);
            //for (var i = 0; i < maxResult; i++) {
				
                //LoadDashBoradData(result[i].MENU_CODE, i, maxResult-1);
			//}
			
			LoadDashBoradData(result[0].MENU_CODE, 0, 17);
			LoadDashBoradData(result[1].MENU_CODE, 1, 17);
			LoadDashBoradData(result[2].MENU_CODE, 2, 17);
			LoadDashBoradData(result[4].MENU_CODE, 4, 17);			
			LoadDashBoradData(result[5].MENU_CODE, 5, 17);
			LoadDashBoradData(result[6].MENU_CODE, 6, 17);
			LoadDashBoradData(result[7].MENU_CODE, 7, 17);
			LoadDashBoradData(result[11].MENU_CODE, 11, 17);
			LoadDashBoradData(result[12].MENU_CODE, 12, 17);
			LoadDashBoradData(result[13].MENU_CODE, 13, 17);
			LoadDashBoradData(result[14].MENU_CODE, 14, 17);
			LoadDashBoradData(result[15].MENU_CODE, 15, 17);
			LoadDashBoradData(result[16].MENU_CODE, 16, 17);
			LoadDashBoradData(result[17].MENU_CODE, 17, 17);
			
			
			
			
			
			
                //LoadDashBoradData(result[i].MENU_CODE, i, maxResult-1);
                //console.log(i);
                //console.log(maxResult-1);
                //var currFile = 'worklist/TOT' + $("#txtEmpID").val() + result[i].MENU_CODE + '.json';
                //var menuID = result[i].MENU_CODE;
                //getDataWorkList(menuID, currFile, i, maxResult - 1);
                // $("#" + result[i].ME_NAME).text(formatNumber(result[i].NUM));

            
        //}else{

            //$('#btnReload').button('reset');
            //alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');
        //}

        

    }, function fail(data, status) {
        console.log(status);
		$('#btnReload').button('reset');
        //alert('ขณะนี้การใช้งานโปรแกรม มีใช้งานข้อมูลค่อนข้างเยอะ โปรดลองใหม่ภายหลัง ขออภัยในความไม่สะดวก');
        alert('Timeout โปรดรีเฟชหน้าจอ อีกครั้ง !');
    });
    //},30000);

}

async function LoadDashBoradData(id, start, end) {

    $.ajax('get_arcollection_dashboard.php', {
        data: {wktype: id},
        method: 'GET',
        dataType: 'json',
        cache: true,
        crossDomain: true,
        async: true,
        //timeout: 60000
    }).then(function success(data) {

        var result = data.data;
        //console.log(start + ':' + end);
        $("#" + id).text(formatNumber(result));
        if (start == end) {
            $('#btnReload').button('reset');
            // $(".bg_load").fadeOut("slow");
            // $(".wrapper").fadeOut("slow");
        }

    }, function fail(data, status) {
        console.log(status);
        $('#btnReload').button('reset');
        alert('Timeout โปรดรีเฟชหน้าจอ อีกครั้ง !');
    });
    
//    $.ajax('get_arcollection_dashboard_worklist.php', {
//        data: {wktype: id},
//        method: 'GET',        
//        cache: false,
//        crossDomain: true,
//        async: true
//    });

}


function ShowDashBoradDataFile(file, id, start, end) {

    $.ajax(file, {
        method: 'GET',
        dataType: 'json',
        cache: false,
        crossDomain: true,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        $("#" + id).text(formatNumber(result));
        if (start == end) {
            $('#btnReload').button('reset');
            $(".bg_load").fadeOut("slow");
            $(".wrapper").fadeOut("slow");
        }

    }, function fail(data, status) {
        console.log(status);
    });

}