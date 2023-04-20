
$(function () {

    $('#dateStart').datetimepicker({
       format: 'YYYY-MM-DD'
    });
    
    $('#dateEnd').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $("#dateStart").on("dp.change", function (e) {
        $('#dateEnd').data("DateTimePicker").minDate(e.date);
    });
    $("#dateEnd").on("dp.change", function (e) {
        $('#dateStart').data("DateTimePicker").maxDate(e.date);
    });

    GetMasterDate();
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
    $("#btnSave").on('click',function (){
        var $this = $(this);
        $this.button('loading'); 
        var sDateSatrt,sDateEnd;
        sDateSatrt = $('#sStart').val();
        sDateEnd = $('#sEnd').val();
        if(sDateSatrt != "" && sDateEnd != ""){
            $("#warn").hide();
            UpdateMasterDate(sDateSatrt,sDateEnd);
        }else{
            var $this = $(this);
            $this.button('reset'); 
            $("#warn").show();
        }
        
    });


});

function GetMasterDate(){
   
    $.ajax('get_arcollection_master_dateworjlost.php', {        
        method: 'GET',
        dataType: 'json',        
        async: true
    }).then(function success(data) {
        
       var result = data.data;
       if(result[0] != ""){
          $('#sStart').val(result[0].S_DATE);
          $('#sEnd').val(result[0].E_DATE);
       }
       //console.log(result[0]);
       
       
    }, function fail(data, status) {
        console.log(status);
    });
    
}

function UpdateMasterDate(pStart,pEnd){
   
    $.ajax('update_datemaster_worklist.php', {        
        method: 'GET',
        dataType: 'json',  
        data: {pStart:pStart,pEnd:pEnd},
        async: true
    }).then(function success(data) {
        
       var result = data.data;      
       //console.log(result);
       if(result.Status == "PASS"){
           $("#succ").show();
           $("#err").hide();
       }else{
           $("#succ").hide();
           $("#err").show();
       }
       $("#btnSave").button('reset');
       
    }, function fail(data, status) {
        console.log(status);
    });
    
}

