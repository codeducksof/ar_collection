$(function () {
    
    getLocation();  
    LoadTrackResultM();
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
    $("#txtTrackCode").on("change", function (e) {
        var trackcode = $(this).val();
        LoadSubTrackResultM(trackcode);
    });
    
     $('#cContactDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        date: new Date()
        //daysOfWeekDisabled: [0, 6]
    });
    
    $("#btnSaveRecordCall").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });
    
    $('#frmAddrecordCall').validator().on('submit', function (e) {

        if (e.isDefaultPrevented(e)) {
            $("#btnSaveRecordCall").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnSaveRecordCall").removeClass("disabled");
            $("#btnSaveRecordCall").removeAttr('disabled');
            return false;
        } else {

            AddDataRecordCall();
            return false;
        }
    });

});

async function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        //$("#err3").hide();
    } else {
        //$("#err3").show();
    }
}

async function showPosition(position) {
    $("#txtLat").val(position.coords.latitude);
    $("#txtLong").val(position.coords.longitude);
}

async function LoadTrackResultM() {

    $.ajax('get_customer_service_tile.php', {
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result[1]);
        $("#txtTrackCode").html('');
        $("#txtTrackCode").append('<option value="" data-subtext=""> --- เลือก --- </option>');
        for (var i = 0; i < result.length; i++) {
            $("#txtTrackCode").append('<option value="' + result[i].ARM_TRACK_CODE + '" data-subtext="' + result[i].ARM_TRACK_CODE + '">' + result[i].ARM_TRACK_CODE + " - " + result[i].ARM_TRACK_NAME + '</option>');
        }
        $('#txtTrackCode').selectpicker('refresh');

    }, function fail(data, status) {
        console.log(status);
    });
}

async function LoadSubTrackResultM(trackcode) {

    $.ajax('get_customer_service_sub_title.php', {
        data: {title: trackcode},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        $("#txtSubTrackCode").html('');

        for (var i = 0; i < result.length; i++) {

            $("#txtSubTrackCode").append('<option value="' + result[i].ARM_TRACK_CODE + '" data-subtext="' + result[i].ARM_TRACK_CODE + '">' + result[i].ARM_TRACK_CODE + " - " + result[i].ARM_TRACK_NAME + '</option>');
        }
        $("#txtSubTrackCode").append('<option value="" data-subtext=""> --- เลือก --- </option>');
        $('#txtSubTrackCode').selectpicker('refresh');

    }, function fail(data, status) {
        console.log(status);
    });
}

function AddDataRecordCall() {

    var recordCallForm = $('#frmAddrecordCall')[0];
    var formData = new FormData(recordCallForm);
    formData.append('txtTrackCode', $("#txtTrackCode").val());
    formData.append('txtSubTrackCode', $("#txtSubTrackCode").val());
    formData.append('txtContactDate', $("#txtContactDate").val());
   
    
    $.ajax('add_customerservice_recordcall.php', {
        data: formData,
        method: 'POST',
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json'
    }).then(function success(data) {
        //console.log(data)
        var result = data.data[0];
        //console.log(result);
        
        if(result == 'PASS'){
            $('#succ').show();
            $('#err').hide();
            $('#txtCustTel').val('');
            $('#txtCustName').val('');
            $('#txtRecordDesc').val('');
            
            $('#txtTrackCode').val('');
            $('#txtTrackCode').selectpicker('refresh');

            $('#txtSubTrackCode').val('');
            $('#txtSubTrackCode').selectpicker('refresh');

            
        }else{
            $('#err').show();
            $('#succ').hide();
        }
        $("#btnSaveRecordCall").button('reset');
    }, function fail(data, status) {
        console.log(status);
    });

}
