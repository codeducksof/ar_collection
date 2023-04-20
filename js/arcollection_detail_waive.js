$(function () {
    
    
    
    $("#dtLoading").show();
    var accno = $('#txtGetAccNo').val();

    //setTimeout(LoadTrackResultM(), 2000),
        setTimeout(TagNotification(accno), 2000),
        setTimeout(ProductDesc(accno), 2000),
            setTimeout(getLocation(), 2000),
            setTimeout(LoadTrackResultM(), 2000),
            setTimeout(LoadTbRecord(accno), 2000),
            setTimeout(LoadTbAccount(accno), 2000),
            setTimeout(LoadTbCust(accno), 2000),
            setTimeout(LoadTbPayment(accno), 2000),
            //LoadTbWaive(accno);
    setTimeout(LoadRequestWaive(accno), 2000),
            setTimeout(LoadSpecialNote(accno), 2000),
            setTimeout(LoadTbMail(accno), 2000),
            setTimeout(LoadDataAttachFile(accno), 2000),



            $("#txtTrackCode").on("change", function (e) {
        var trackcode = $(this).val();
        LoadWorkPlanM(trackcode);
        LoadWorkPlanMUser(trackcode);
        
        if (trackcode == 'B2' || trackcode == 'B3' || trackcode == 'B4' || trackcode == 'B5'
                || trackcode == 'B6' || trackcode == 'B9' || trackcode == 'B10' || trackcode == 'B11'
                || trackcode == 'B12' || trackcode == 'FC01' || trackcode == 'FC02') {

            //$("#blsignal").hide();
            $("#blpayment").show();
        } else {

            //$("#blsignal").hide();
            $("#blpayment").hide();
        }

        if (trackcode == 'FC02') {
            $("#bldiscount").show();
            //$("#blpayment").hide();
        } else {
            $("#bldiscount").hide();
            //$("#blpayment").hide(); 
        }

        if (trackcode == 'FC03') {
            $("#bldrefinance").show();
            //$("#blpayment").hide();
        } else {
            $("#bldrefinance").hide();
            //$("#blpayment").hide(); 
        }

        if (trackcode == 'FC04') {
            $("#blreturn").show();
            //$("#blpayment").hide();
        } else {
            $("#blreturn").hide();
            //$("#blpayment").hide(); 
        }

        if (trackcode == 'FC07') {
            $("#blford").show();
            //$("#blpayment").hide();
        } else {
            $("#blford").hide();
            //$("#blpayment").hide(); 
        }

        if (trackcode == 'I1') {
            $("#blsignal").show();
            //$("#blpayment").hide();
        } else {
            $("#blsignal").hide();
            //$("#blpayment").hide(); 
        }
        //alert(trackcode);
    });
    var todayDate = new Date().getDate();

    $('#cContactDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        daysOfWeekDisabled: [0, 6]
    });

    $('#cDateReturn').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
    });

    $('#cPlanDate').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
        daysOfWeekDisabled: [0, 6]
    });

    $('#cDateCollect').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
        daysOfWeekDisabled: [0, 6]
    });

    $('#cCloseSignalDate').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
        //daysOfWeekDisabled: [0, 6]
    });
    $('#cOpenSignalDate').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
        //daysOfWeekDisabled: [0, 6]
    });
    $('#cCustAppointDate').datetimepicker({
        minDate: new Date(),
        maxDate: new Date(new Date().setDate(todayDate + 30)),
        format: 'YYYY-MM-DD HH:mm:ss',
        //daysOfWeekDisabled: [0, 6]
    });



    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
    });

   

//    $("#btnCustomer").on("click", function (e) {
//        var tabonload = $("#tabCustomer").val();
//        if (tabonload == '0') {
//            $("#tabCustomer").val('1');
//            $("#dtLoading2").show();
//            LoadTbCust(accno);
//        }
//    });

//    $("#btnSpecialNote").on("click", function (e) {
//        var tabonload2 = $("#tabSpecialNote").val();
//        if (tabonload2 == '0') {
//            $("#tabSpecialNote").val('1');
//            $("#btnRefreshSpecialNote").button('loading');
//            LoadSpecialNote(accno);
//        }
//    });

    $("#btnRefreshSpecialNote").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadSpecialNote(accno);
        
    });
    
    $("#btnRefreshWaive").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadRequestWaive(accno);
        
    });
    
//    $("#btnFile").on("click", function (e) {
//        var tabonload2 = $("#tabAttach").val();
//        if (tabonload2 == '0') {
//            $("#tabAttach").val('1');
//            $("#btnRefreshAttach").button('loading');
//            LoadDataAttachFile(accno);
//        }
//    });

    $("#btnRefreshAttach").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadDataAttachFile(accno);

    });

//    $("#btnPayment").on("click", function (e) {
//        var tabonload2 = $("#tabPayment").val();
//        if (tabonload2 == '0') {
//            $("#tabPayment").val('1');
//            $("#btnRefreshPay").button('loading');
//            LoadTbPayment(accno);
//            LoadTbWaive(accno);
//        }
//    });

    $("#btnRefreshPay").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadDatablePayment(accno);

    });

    $("#btnRefreshClaim").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadTbWaive(accno);
    });

//    $("#btnMail").on("click", function (e) {
//        var tabonload3 = $("#tabMail").val();
//        if (tabonload3 == '0') {
//            $("#tabMail").val('1');
//            $("#btnRefreshMail").button('loading');
//            LoadTbMail(accno);
//        }
//    });

    $("#btnRefreshMail").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadTbMail(accno);
    });

    $("#btnRefreshRecord").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        LoadTbRecord(accno);
    });

//    $("#btnRecord").on("click", function (e) {
//        var tabonload4 = $("#tabRecord").val();
//        if (tabonload4 == '0') {
//            $("#tabRecord").val('1');
//            $("#btnRefreshRecord").button('loading');
//            LoadTbRecord(accno);
//        }
//    });

    $("#btnSavenote").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });

    $('#frmAddSpecialNote').validator().on('submit', function (e) {

        if (e.isDefaultPrevented(e)) {
            $("#btnSavenote").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnSavenote").removeClass("disabled");
            $("#btnSavenote").removeAttr('disabled');
            return false;
        } else {

            AddSpecialNote(accno);
            return false;
        }
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

    $("#btnAttach").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });

    $('#frmAttachFile').validator().on('submit', function (e) {

        if (e.isDefaultPrevented(e)) {
            $("#btnAttach").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnAttach").removeClass("disabled");
            $("#btnAttach").removeAttr('disabled');
            return false;
        } else {

            AddAttachFile(accno);
            return false;
        }
    });
    
    
    $("#aClaim").on("change", function (e) {       
        var claim = parseFloat($(this).val());
        var late = parseFloat($("#aLate").val());
        var oLate = parseFloat($("#LATE_FEE").text());
        var oClaim = parseFloat($("#CLAIM_FEE").text());

        var result; 
        
        if(claim > oClaim || late > oLate){
           result = 0;
        }else{
           result = claim + late;  
        }
        $("#aApproveWaive").val(result);       
    });
    
    $("#aLate").on("change", function (e) {       
        var claim = parseFloat($("#aClaim").val());
        var late = parseFloat($(this).val());
        var oLate = parseFloat($("#LATE_FEE").text());
        var oClaim = parseFloat($("#CLAIM_FEE").text());

        var result; 
        
        if(claim > oClaim || late > oLate){
           result = 0;
        }else{
           result = claim + late;  
        }
        $("#aApproveWaive").val(result);   
       
    });
    
       
  
    $("#reClaim").on("change", function (e) {       
        var claim = $(this).val();
        var late = $("#reLate").val();
        var result = parseFloat(claim) + parseFloat(late);        
        $("#reWaive").val(result);       
    });
    
    $("#reLate").on("change", function (e) {       
        var claim = $("#reClaim").val();
        var late = $(this).val();
        var result = parseFloat(claim) + parseFloat(late);        
        $("#reWaive").val(result); 
       
    });
    
    $("#btnCreateRequest").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        AddRequestWaive(accno);
    });
    
    $("#btnApprove").on("click", function (e) {        
        var $this = $(this);
        $this.button('loading');  
        ActionWaive("APPROVED",accno);
    });
    
    $("#btnReject").on("click", function (e) {        
        var $this = $(this);
        $this.button('loading'); 
        ActionWaive("REJECTED",accno);
    });
    
    
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    

});

function ActionWaive(action,accno){
    
    var Claim = $("#aClaim").val();
    var Late = $("#aLate").val();
    var waiveid =  $("#lbWaiveID").text();
    
    $.ajax('actin_arcollection_waive.php', {
        data: {waiveid: waiveid, action: action, claim: Claim, late: Late},
        method: 'GET',
        cache: false,
        dataType: 'json'

    }).then(function success(data) {

        //console.log(data);
        var result = data.data;
        if(result.Status == 'PASS'){
           $("#asucc").show();
           $("#aerr").hide();
           LoadRequestWaive(accno);
           $('#ACTIONWAIVE').modal('hide');    
        }else{
            $("#aerr").show();
            $("#asucc").hide();
           
        }
        $("#btnApprove").button('reset');
        $("#btnReject").button('reset');        

    }, function fail(data, status) {
        console.log(status);
    });
    
}

function AddRequestWaive(accno){
    
    var Waive = $("#reWaive").val();
    var MaxRequest = $("#reRequestMaxAmt").val();
    var Claim = $("#reClaim").val(); 
    var Late = $("#reLate").val(); 
    var Remark = $("#reRemark").val();
  
        if(Waive != "" || Waive != 0){
            
            if(Waive <= MaxRequest){
                
                $("#c_warining").hide(); 
                $("#c_warining2").hide(); 
            
                $.ajax('add_arcollection_waive.php', {
                    data: {accno:accno,txtremark:Remark,claim:Claim,late:Late},
                    method: 'POST',                  
                    cache: false,                    
                    dataType: 'json'

                }).then(function success(data) {
                    
                    
                    var result = data.data;
                    //console.log(result);
                    if(result.Status == 'PASS'){
                       $("#c_succ").show(); 
                       $("#c_err").hide();
                       $("#reClaim").val(''); 
                       $("#reLate").val(''); 
                       $("#reRemark").val('');
                    }else{
                       $("#c_succ").hide(); 
                       $("#c_err").show();
                    }
                    LoadRequestWaive(accno);
                    $("#btnCreateRequest").button('reset');

                }, function fail(data, status) {
                    console.log(status);
                });
        
            }else{
                 $("#c_warining").show(); 
                 $("#c_warining2").hide(); 
                 $("#c_succ").hide(); 
                 $("#btnCreateRequest").button('reset');
                
            }
            
    }else{
        $("#c_warining2").show(); 
        $("#c_succ").hide(); 
        $("#btnCreateRequest").button('reset');
    }
    
}

function AddAttachFile(accno) {
    //console.log(formData);
    var AttachlForm = $('#frmAttachFile')[0];
    var formData = new FormData(AttachlForm);
    formData.append('txtFileAttach', $('#txtUploadFile')[0].files[0]);
    formData.append('txtAccNo', accno);

    $.ajax('add_arcollection_attachfile.php', {
        data: formData,
        method: 'POST',
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json',
       
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        if (result == 'PASS') {


            $("#asucc").show();
            $("#aerr").hide();
            $("#btnAttach").button('reset');
            var table = $('#ATTACH').DataTable();
            table.destroy();
            LoadDataAttachFile(accno);
            $("#txtAttachName").val('');
            $("#txtAttachDesc").val('');
            //$('.fileinput').fileinput();
            $('#filinputg').fileinput('reset');

        } else {
            $("#asucc").hide();
            $("#aerr").show();
            $("#btnAttach").button('reset');
        }


    }, function fail(data, status) {
        console.log(status);
    });

}

function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        //$("#err3").hide();
    } else {
        //$("#err3").show();
    }
}

function showPosition(position) {
    $("#txtLat").val(position.coords.latitude);
    $("#txtLong").val(position.coords.longitude);
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

function AddSpecialNote(accno) {

    var txtRemark = $("#txtSpecialText").val();

    $.ajax('add_arcollection_specialnote.php', {
        data: {accno: accno, txtremark: txtRemark},
        method: 'POST',
        dataType: 'json',
        cache: false,
    }).then(function success(data) {

        var result = data.data;
        var accno = $('#txtGetAccNo').val();
        //console.log(result);

        if (result.Status == 'PASS') {

            $("#txtSpecialText").val('');
            $("#ssucc").show();
            $("#serr").hide();
            $("#btnSavenote").button('reset');
            var table = $('#SPECIALNOTE').DataTable();
            table.destroy();
            LoadSpecialNote(accno);
            TagNotification(accno);

        } else {
            $("#serr").show();
            $("#ssucc").hide();
            $("#btnSavenote").button('reset');

        }

    }, function fail(data, status) {
        console.log(status);
    });

}

function AddDataRecordCall() {

    var recordCallForm = $('#frmAddrecordCall')[0];
    var formData = new FormData(recordCallForm);
    formData.append('txtAgingCurType', $("#ARM_AGING_CURR_TYPE").text());
    formData.append('txtTrackCode', $("#txtTrackCode").val());
    formData.append('txtWorkPlan', $("#txtWorkPlan").val());
    formData.append('txtArmAccNo', $("#ARM_ACC_NO").text());
    formData.append('txtContactDate', $("#txtContactDate").val());
    formData.append('ARM_CUST_NAME', $("#ARM_CUST_NAME").text());
    formData.append('ARM_AGING_CURR_TYPE', $("#ARM_AGING_CURR_TYPE").text());
    formData.append('txtDateCollect', $("#txtDateCollect").text());
    
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }
    //console.log(formData);
    $.ajax('add_arcollection_recordcall.php', {
        data: formData,
        method: 'POST',
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json'
    }).then(function success(data) {
        var result = data.data[0];
        var accno = $('#txtGetAccNo').val();

        //console.log(result);
        if (result == 'PASS') {

            $('#succ').show();
            $('#err').hide();


            $('#txtCustTel').val('');
            $('#txtRecordDesc').text('');
            $('#txtPlanDate').val('');
            $('#txtDiscount').val('');
            $('#txtLoff').val('');
            $('#txtReHp').val('');
            $('#txtFirstPayment').val('');
            $('#txtInstallment').val('');
            $('#txtTerm').val('');
            $('#txtRecievereturn').val('');
            $('#txtDateReturn').val('');
            $('#txtBranchReturn').val('');
            $('#txtRecievePostion').val('');
            $('#txtFordAmt').val('');
            $('#txtFordName').val('');
            $('#txtFordPosition').val('');
            $('#txtCloseSignalDate').val('');
            $('#txtOpenSignalDate').val('');
            $('#txtOpenSignalAmt').val('');
            $('#txtCloseDesc').text('');
            $('#txtCustAppointDate').val('');
            $('#txtAppointmentAmt').val('');
            $('#txtDateCollect').val('');

            $('#txtTrackCode').val('');
            $('#txtTrackCode').selectpicker('refresh');

            $('#txtWorkPlan').val('');
            $('#txtWorkPlan').selectpicker('refresh');

            $("#btnSaveRecordCall").button('reset');
            var table = $('#RECORD').DataTable();
            table.destroy();
            LoadTbRecord(accno);

        } else {

            $('#succ').hide();
            $('#err').show();
            $("#btnSaveRecordCall").button('reset');

        }

    }, function fail(data, status) {
        console.log(status);
    });

}

function LoadTbAccount(accno) {
    
    $.ajax('get_arcollection_detial.php', {
        data: {accno: accno},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result[0].ARM_BUSINESS_TYPE);
        if (result.length > 0) {
            $("#ARM_BUSINESS_TYPE").text(result[0].ARM_BUSINESS_TYPE);
            $("#ARM_ACC_NO").text(result[0].ARM_ACC_NO);
            $("#ARM_AGING_TYPE").text(result[0].ARM_AGING_TYPE);
            $("#ARM_AGING_CURR_TYPE").text(result[0].ARM_AGING_CURR_TYPE);
            $("#ARM_ACC_STAT").text(result[0].ARM_ACC_STAT);
            $("#ARM_PAYMENT_TYPE").text(result[0].ARM_PAYMENT_TYPE);
            if (result[0].REFINANCE == null) {
                $("#REFINANCE").text('-');
            } else {
                $("#REFINANCE").text(result[0].REFINANCE);
            }
            $("#ARM_ITEMCODE_DESC").text(result[0].ARM_ITEMCODE_DESC);
            $("#ARM_SALES_PART_CODE").text(result[0].ARM_SALES_PART_CODE);
            $("#ARM_SERIAL_NO").text(result[0].ARM_SERIAL_NO);
            $("#ARM_HP_PRICE").text(formatNumber(result[0].ARM_HP_PRICE) + ' บาท');
            $("#ARM_CASH_PRICE").text(formatNumber(result[0].ARM_CASH_PRICE) + ' บาท');
            $("#ARM_DOWN_AMT").text(formatNumber(result[0].ARM_DOWN_AMT) + ' บาท');
            $("#ARM_INSTALLMENT_AMT").text(formatNumber(result[0].ARM_INSTALLMENT_AMT) + ' บาท');
            var paidTerm = (result[0].ARM_PAID_AMT - result[0].ARM_DOWN_AMT) / result[0].ARM_INSTALLMENT_AMT;
            $("#ARM_CONTRACT_TERM").text(paidTerm.toFixed(0) + ' / ' + result[0].ARM_CONTRACT_TERM + ' งวด');

            $("#ARM_BALANCE_AMT").text(formatNumber(result[0].ARM_BALANCE_AMT) + ' บาท');
            $("#ARM_MNT_ARREAR").text(result[0].ARM_MNT_ARREAR + ' งวด');
            $("#ARM_PAID_AMT").text(formatNumber(result[0].ARM_PAID_AMT) + ' บาท');
            $("#ARM_ARREAR_AMT").text(formatNumber(result[0].ARM_ARREAR_AMT) + ' บาท');
            $("#CLAIM_FEE").text(formatNumber(result[0].CLAIM_FEE) + ' บาท');
            $("#reClaim").val(result[0].CLAIM_FEE);
            if (result[0].LATE_FEE == null) {
                $("#LATE_FEE").text('0' + 'บาท');
            } else {
                $("#LATE_FEE").text(formatNumber(result[0].LATE_FEE) + ' บาท');
            }
            $("#reLate").val(result[0].LATE_FEE);
            
                       
            $("#reRequestMaxAmt").val(result[0].CLAIM_FEE + result[0].LATE_FEE);
            $("#reWaive").val(result[0].CLAIM_FEE + result[0].LATE_FEE);
            if (result[0].MUST_PAID == null) {
                $("#MUST_PAID").text('0' + 'บาท');
                //$("#txtAppointmentAmt").val(0.00);
            } else {
                $("#MUST_PAID").text(formatNumber(result[0].MUST_PAID) + ' บาท');
                //$("#txtAppointmentAmt").val(result[0].MUST_PAID);
            }
            $("#ARM_DISCOUNT_AMT").text(formatNumber(result[0].ARM_DISCOUNT_AMT) + ' บาท');
            $("#ARM_CLOSED_TYPE").text(result[0].ARM_CLOSED_TYPE);
            $("#ARM_ORG_ARREAR_AMT").text(formatNumber(result[0].ARM_ORG_ARREAR_AMT) + ' บาท');
            $("#ARM_ORG_ARREAR_AMT_PAD").text(formatNumber(result[0].ARM_ORG_ARREAR_AMT_PAD) + ' บาท');
            $("#ARM_ORG_AGING_CURR_TYPE").text(result[0].ARM_ORG_AGING_CURR_TYPE);
            $("#ARM_ORG_AGING_TYPE").text(result[0].ARM_ORG_AGING_TYPE);
            if (result[0].ARM_CLOSED_DATE == '') {
                $("#ARM_CLOSED_DATE").text('-');
            } else {
                $("#ARM_CLOSED_DATE").text(formatDate(result[0].ARM_CLOSED_DATE));
            }
            LoadTbSaleDetail(accno);
            




        }
        //console.log(result);
    }, function fail(data, status) {
        console.log(status);
    });

}

function LoadTbSaleDetail(accno) {

    $.ajax('get_arcollection_shop_detail.php', {
        data: {accno: accno},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result[0].ARM_BUSINESS_TYPE);
        if (result.length > 0) {
            $("#A_R").text(result[0].A_R);
            $("#DEP_NAME_THA").text(result[0].DEP_NAME_THA);

            if (result[0].ARM_PREVIOUS_ACCNO == '') {
                $("#ARM_PREVIOUS_ACCNO").text('-');
            } else {
                $("#ARM_PREVIOUS_ACCNO").text(result[0].ARM_CLOSED_DATE);
            }

            if (result[0].ARM_VARIATION_DATE == '') {
                $("#ARM_VARIATION_DATE").text('-');
            } else {
                $("#ARM_VARIATION_DATE").text(formatDate(result[0].ARM_CLOSED_DATE));
            }
            $("#ARM_SALES_DATE").text(formatDate(result[0].ARM_SALES_DATE));
            $("#SALES_MAN").text(result[0].SALES_MAN);
            $("#EMP_MOBILE_NO").text(result[0].EMP_MOBILE_NO);
            $("#COLLECTOR").text(result[0].COLLECTOR);
            $("#ARM_FIRST_DUEDATE").text(formatDate(result[0].ARM_FIRST_DUEDATE));
            $("#ARM_MATURITY_DATE").text(formatDate(result[0].ARM_MATURITY_DATE));
            $("#dtLoading").hide();

        }
        //console.log(result);
    }, function fail(data, status) {
        console.log(status);
    });
}

function LoadTbCust(accno) {

    $.ajax('get_arcollection_customer_detail.php', {
        data: {accno: accno},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result[0].ARM_BUSINESS_TYPE);
        if (result.length > 0) {
            $("#ARM_CUST_NAME").text(result[0].ARM_CUST_NAME);
            $("#ARM_CUST_NIC").text(result[0].ARM_CUST_NIC);
            $("#BirthDate").text(formatDate(result[0].BirthDate));
            $("#AgeYears").text(result[0].AgeYears + ' ปี');
            $("#OCCUPATION").text(result[0].Occupation);
            $("#ADDRESS_ID").text(result[0].ADDRESS_ID);
            $("#TEL_ID").text(result[0].TEL_ID);
            $("#ADDRESS_COMPANY").text(result[0].ADDRESS_COMPANY);
            $("#TEL_COMPANY").text(result[0].TEL_COMPANY);
            $("#ADDRESS_CURRENT").text(result[0].ADDRESS_CURRENT);
            $("#TEL_CURRENT").text(result[0].TEL_CURRENT);
            $("#ADDRESS_DOCUMENT").text(result[0].ADDRESS_DOCUMENT);
            $("#TEL_DOCUMENT").text(result[0].TEL_DOCUMENT);
            $("#OTHER_C1").text(result[0].OTHER_C1);
            $("#OTHER_C2").text(result[0].OTHER_C2);
            LoadTbGarantor(accno);
           
            
        }
        //console.log(result);
    }, function fail(data, status) {
        console.log(status);
    });


}

function LoadTbGarantor(accno) {

    $.ajax('get_arcollection_garantor_detail.php', {
        data: {accno: accno},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        var template;
        //console.log(result[0].ARM_BUSINESS_TYPE);
        if (result.length > 0) {
            for (var i = 0; i < result.length; i++) {
                var x = i + 1;
                template = '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="portlet yellow-mint box"><div class="portlet-title"><div class="caption"><i class="fa fa-user"></i>ผู้ค้ำ ' + x + '</div></div>';
                template += '<div class="portlet-body"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"> <label>ชื่อผู้ค้ำ :</label> <label id="G_ARM_CUST_NAME">' + result[i].ARM_CUST_NAME + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>เลขบัตรประชาชน :</label> <label id="G_ARM_CUST_NIC">' + result[i].ARM_CUST_NIC + '</label></div></div>';
                template += '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-group"><label>วันเกิด :</label> <label id="G_BirthDate"> ' + formatDate(result[i].BirthDate) + ' </label></div></div>';
                template += '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-group"><label>อายุ :</label> <label id="G_AgeYears">' + result[i].AgeYears + ' ปี </label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>กลุ่มอาชีพ/อาชีพ :</label> <label id="G_OCCUPATION">' + result[i].Occupation + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>ที่อยู่ตามทะเบียนบ้าน :</label> <label id="G_ADDRESS_ID">' + result[i].ADDRESS_ID + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="alert alert-warning"><label>เบอร์โทร :</label> <label id="G_TEL_ID">' + result[i].TEL_ID + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>ที่อยู่ปัจจุบัน :</label> <label id="G_ADDRESS_CURRENT">' + result[i].ADDRESS_CURRENT + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="alert alert-warning"><label>เบอร์โทร :</label> <label id="G_TEL_CURRENT">' + result[i].TEL_CURRENT + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>ที่อยู่ที่ทำงาน :</label> <label id="G_ADDRESS_COMPANY">' + result[i].ADDRESS_COMPANY + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="alert alert-warning"><label>เบอร์โทร :</label> <label id="G_TEL_COMPANY">' + result[i].TEL_COMPANY + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-group"><label>ที่อยู่จัดส่งเอกสาร :</label> <label id="G_ADDRESS_DOCUMENT">' + result[i].ADDRESS_DOCUMENT + '</label></div></div>';
                template += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="alert alert-warning"><label>เบอร์โทร :</label> <label id="G_TEL_DOCUMENT">' + result[i].TEL_DOCUMENT + '</label></div></div>';
                template += '</div></div></div></div>';
                $("#lbGrantor").append(template);

            }

        }
        
        //console.log(result);
    }, function fail(data, status) {
        console.log(status);
    });


}

function LoadTbPayment(accno) {

    LoadDatablePayment(accno);
    

}

function LoadDatablePayment(accno) {


    //$('#PAYMENT').empty();
    var table = $('#PAYMENT').dataTable({

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
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        bProcessing: true,
        bDeferRender: true,
        deferRender: true,
        columns: [
            {"data": "ARM_REFERENCE_NO", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_RECEIPT_DATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatDate(data);
                }
            },
            {"data": "ARM_RECEIPT_NO", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_RECEIPT_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_RECEIPT_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "ARM_LATE_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "ARM_CLAIM_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "ARM_OTHER_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "ARM_DIRECT_BANK", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_BANK_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },

            {"data": "ARM_ACTUAL_BANKDATE", "className": "text-center", "defaultContent": '',
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
            {"data": "ARM_REF4", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_RECEIPT_STAT", "className": "text-center", "defaultContent": ''}

        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(), data;
            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };

            var sumInstallment = api.column(4).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

            var sumClaim = api.column(5).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumLate = api.column(6).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumOther = api.column(7).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumTrans = api.column(9).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
//           var pageTotal = api.column(4).data().reduce( function (a, b) {
//                    return intVal(a) + intVal(b);
//                },0);
            $(api.column(4).footer()).html(formatNumber(parseFloat(sumInstallment).toFixed(2)));
            $(api.column(5).footer()).html(formatNumber(parseFloat(sumClaim).toFixed(2)));
            $(api.column(6).footer()).html(formatNumber(parseFloat(sumLate).toFixed(2)));
            $(api.column(7).footer()).html(formatNumber(parseFloat(sumOther).toFixed(2)));
            $(api.column(9).footer()).html(formatNumber(parseFloat(sumTrans).toFixed(2)));
        },
        order: [[1, "desc"]],
        ajax: {
            url: "get_arcollection_tpayment.php",
            method: "GET",
            cache: false,
            async: true,
            data: {accno: accno}
        }

    });

    var table = $('#PAYMENT').DataTable();
    table.ajax.reload();

    var table = $('#PAYMENT').DataTable();
    table.columns(0).header().to$().text('DPS');
    table.columns(1).header().to$().text('วันที่ใบเสร็จ');
    table.columns(2).header().to$().text('เลขที่ใบเสร็จ');
    table.columns(3).header().to$().text('ประเภท');
    table.columns(4).header().to$().text('ค่างวด');
    table.columns(5).header().to$().text('ค่าปรับ');
    table.columns(6).header().to$().text('ค่าติดตาม');
    table.columns(7).header().to$().text('อื่นๆ');
    table.columns(8).header().to$().text('ช่องทางชำระ');
    table.columns(9).header().to$().text('ยอดโอน');
    table.columns(10).header().to$().text('วันที่โอน');
    table.columns(11).header().to$().text('REF4');
    table.columns(12).header().to$().text('สถานะ');

    $("#btnRefreshPay").button('reset');

}

function LoadTbWaive(accno) {

    LoadDatableWaive(accno);
    

}

function LoadDatableWaive(accno) {

    var table = $('#WAIVE').dataTable({
        destroy: true,
        stateSave: true,
        sScrollX: "100%",
        sScrollXInner: "250%",
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
            {"data": "ARD_YEAR", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDate2(data);
                    }else{
                        result = '-';
                    }
                    return result;
                }
            },
//            {"data": "ARD_MONTH", "className": "text-center", "defaultContent": ''},
            {"data": "ARD_ACC_NO", "className": "text-center", "defaultContent": ''},
            {"data": "ARD_MN_TRM", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "ARD_MN_ARR_L", "className": "text-center", "defaultContent": ''},
            {"data": "BGN_LATE_FEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "LATE_FEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "LATE_FEE_SETTLE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "WAIVE_LATEFEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "END_LATE_FEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "BEG_CLAIM_FEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "CLAIM_FEE_INCL_VAT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "CLAIM_FEE_INCL_SETTLE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "WAIVE_CLAIM", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "END_CLAIM_FEE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    return formatNumber(data);
                }
            },
            {"data": "REMARK", "className": "text-center", "defaultContent": ''},
            {"data": "WAIVE_REMARK", "className": "text-center", "defaultContent": ''}


        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api(), data;
            var intVal = function (i) {
                return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
            };

            var sumInstallment = api.column(2).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

            var sumRateLate = api.column(4).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumCurRateLate = api.column(5).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumPayLate = api.column(6).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumWaive = api.column(7).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumRateLateNext = api.column(8).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumRateLatePrev = api.column(9).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

            var sumRateClaimCurr = api.column(10).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumPayClaim = api.column(11).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

            var sumWaive = api.column(12).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
            var sumClaimNext = api.column(13).data().reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);
//           var pageTotal = api.column(4).data().reduce( function (a, b) {
//                    return intVal(a) + intVal(b);
//                },0);
            $(api.column(2).footer()).html(formatNumber(parseFloat(sumInstallment).toFixed(2)));
            $(api.column(4).footer()).html(formatNumber(parseFloat(sumRateLate).toFixed(2)));            
            $(api.column(5).footer()).html(formatNumber(parseFloat(sumCurRateLate).toFixed(2)));            
            $(api.column(6).footer()).html(formatNumber(parseFloat(sumPayLate).toFixed(2)));
            
            $(api.column(7).footer()).html(formatNumber(parseFloat(sumWaive).toFixed(2)));
            
            $(api.column(8).footer()).html(formatNumber(parseFloat(sumRateLateNext).toFixed(2)));
            
            $(api.column(9).footer()).html(formatNumber(parseFloat(sumRateLatePrev).toFixed(2)));
            $(api.column(10).footer()).html(formatNumber(parseFloat(sumRateClaimCurr).toFixed(2)));
            $(api.column(11).footer()).html(formatNumber(parseFloat(sumPayClaim).toFixed(2)));
            $(api.column(12).footer()).html(formatNumber(parseFloat(sumWaive).toFixed(2)));
            $(api.column(13).footer()).html(formatNumber(parseFloat(sumClaimNext).toFixed(2)));

        },
        order: [[0, "desc"]],
        ajax: {
            url: "get_arcollection_waive.php",
            method: "GET",
            cache: false,
            async: true,
            data: {accno: accno}

        }

    });

    var table = $('#WAIVE').DataTable();
    table.columns(0).header().to$().text('ปี');
  
    table.columns(1).header().to$().text('เลขที่บัญชี');
    table.columns(2).header().to$().text('ค่างวด');
    table.columns(3).header().to$().text('AGING');
    table.columns(4).header().to$().text('เบี้ยปรับล่าช้าของงวดที่แล้ว');
    table.columns(5).header().to$().text('เบี้ยปรับล่าช้าเดือนปัจจุบัน');
    table.columns(6).header().to$().text('เบี้ยปรับล่าช้าที่ชำระเข้ามา');
    table.columns(7).header().to$().text('ยอดที่ขอ Waive');
    table.columns(8).header().to$().text('เบี้ยปรับล่าช้าเดือนถัดไป');
    table.columns(9).header().to$().text('ค่าติดตามล่าช้าของงวดที่แล้ว');
    table.columns(10).header().to$().text('ค่าติดตามงวดปัจจุบัน');
    table.columns(11).header().to$().text('ค่าติดตามล่าช้าที่ชำระเข้ามา');
    table.columns(12).header().to$().text('WAIVE');
    table.columns(13).header().to$().text('ค่าติดตามเดือนถัดไป');
    table.columns(14).header().to$().text('หมายเหตุ');
    table.columns(15).header().to$().text('WAIVE หมายเหตุ');
    var table = $('#WAIVE').DataTable();
    table.ajax.reload();

    $("#btnRefreshClaim").button('reset');

}

function LoadTbMail(accno) {

    $('#MAIL').empty();
    var table = $('#MAIL').dataTable({
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
            {"data": "ARM_LETTER_ID", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_BARCODE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_LETTER_TYPE", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_INVOICE_NUMBER", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != '') {
                        result = formatDate(data);
                    } else {
                        result = '-';
                    }
                    return result;
                }
            },
            {"data": "ARM_INVOICE_STAT", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_REJECT_DESC", "className": "text-center", "defaultContent": ''},
        ],
        order: [[3, "desc"]],
        ajax: {
            url: "get_arcollection_letter.php",
            method: "GET",
            async: true,
            cache: false,
            data: {accno: accno}
        }

    });

    var table = $('#MAIL').DataTable();
    table.columns(0).header().to$().text('เลขที่ใบแจ้งหนี้');
    table.columns(1).header().to$().text('รหัสบาร์โค้ด');
    table.columns(2).header().to$().text('ประเภทจดหมาย');
    table.columns(3).header().to$().text('วันที่ออกใบแจ้งหนี้/วันที่ได้รับคืน');
    table.columns(4).header().to$().text('สถานะใบแจ้งหนี้');
    table.columns(5).header().to$().text('การตอบกลับ');
    var table = $('#MAIL').DataTable();
    table.ajax.reload();

    $("#btnRefreshMail").button('reset');


}

function LoadTbRecord(accno) {

    LoadDatableRecordCall(accno);
    

}

function LoadDatableRecordCall(accno) {

    $('#RECORD').empty();
    var table = $('#RECORD').dataTable({
        destroy: true,
        stateSave: true,
        bAutoWidth: false,
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
            {"data": "ARM_CALL_DATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }, "width": "10%"
            },
            {"data": "ARM_CUSTOMER_TEL", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_TRACK_NAME", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_WORKPLAN_DESC", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_OPERATOR_DEPARTMENT", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_OPERATOR_DEPARTMENT_D", "className": "text-center", "defaultContent": ''},

            {"data": "ARM_WORKPLAN_TIME", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }, "width": "10%"
            },
            {"data": "ARM_RECORD_CALL_ID", "className": "text-center", "defaultContent": ''},
            {"data": "EMP_NAME", "className": "text-center", "defaultContent": ''}


        ],
        order: [[0, "desc"]],
        ajax: {
            url: "get_arcollection_recordcall.php",
            method: "GET",
            async: true,
            cache: false,
            data: {accno: accno}

        }

    });
    
    
    var table = $('#RECORD').DataTable();
    table.columns(0).header().to$().text('วันที่ติดต่อ');
    table.columns(1).header().to$().text('เบอร์ที่ติดต่อ');
    table.columns(2).header().to$().text('ผลการติดตาม');   
    table.columns(3).header().to$().text('แผนงาน');
    table.columns(4).header().to$().text('หน่วยงานที่รับผิดชอบ');
    table.columns(5).header().to$().text('ผู้ดำเนินการ');   
    table.columns(6).header().to$().text('วัน/เวลาแผนงาน');
    table.columns(7).header().to$().text('ID');
    table.columns(8).header().to$().text('ผู้บันทึก');
    
    var table = $('#RECORD').DataTable();
    table.ajax.reload();

    $('#RECORD tbody').on('click', 'tr', function () {
        var table = $('#RECORD').DataTable();
        var tbRow = table.row(this).data();
        var ReCordID = tbRow.ARM_RECORD_CALL_ID;

        var AccNo = $('#ARM_ACC_NO').text();
        ShowRecordDetail(ReCordID, AccNo);

    });
    
   
    $("#btnRefreshRecord").button('reset');
   

}

function LoadTrackResultM() {

    $.ajax('get_trackresult_m.php', {
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

function LoadWorkPlanM(trackcode) {

    $.ajax('get_workplan_m.php', {
        data: {trackcode: trackcode},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        $("#txtWorkPlan").html('');

        for (var i = 0; i < result.length; i++) {

            $("#txtWorkPlan").append('<option value="' + result[i].ARM_WORKPLAN_ID + '" data-subtext="' + result[i].ARM_WORKPLAN_ID + '">' + result[i].ARM_WORKPLAN_ID + " - " + result[i].ARM_WORKPLAN_DESC + '</option>');
        }
        $("#txtWorkPlan").append('<option value="" data-subtext=""> --- เลือก --- </option>');
        $('#txtWorkPlan').selectpicker('refresh');

    }, function fail(data, status) {
        console.log(status);
    });
}

function LoadWorkPlanMUser(plancode) {

    $.ajax('get_workplan_user.php', {
        data: {plancode: plancode},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        $("#txtActionPer").html('');

        for (var i = 0; i < result.length; i++) {

            $("#txtActionPer").append('<option value="' + result[i].ARM_OPERATOR_DESC + '" data-subtext="' + result[i].ARM_OPERATOR_DESC + '">' + result[i].ARM_OPERATOR_ID + " - " + result[i].ARM_OPERATOR_DESC + '</option>');
        }
        $("#txtActionPer").append('<option value="" data-subtext=""> --- เลือก --- </option>');
        $('#txtActionPer').selectpicker('refresh');

    }, function fail(data, status) {
        console.log(status);
    });
}


function ShowRecordDetail(ReCordID, AccNo) {
    //alert(ReCordID);
    $.ajax('get_recordcall_detail.php', {
        data: {reid: ReCordID},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        //console.log(data);
        var result = data.data;
        //console.log(result);
        $("#pTopHead").text('');
        $("#pTopHead").text(AccNo);

        $("#ARM_CUSTOMER_TEL").text('');
        $("#ARM_CUSTOMER_TEL").text(result[0].ARM_CUSTOMER_TEL);

        $("#ARM_TRACK_CODE").text('');
        $("#ARM_TRACK_CODE").text(result[0].ARM_TRACK_CODE);

        $("#ARM_WORKPLAN_ID").text('');
        $("#ARM_WORKPLAN_ID").text(result[0].ARM_WORKPLAN_ID);

        $("#ARM_CALL_DATE").text('');
        if (result[0].ARM_CALL_DATE == '') {
            $("#ARM_CALL_DATE").text('-');
        } else {
            $("#ARM_CALL_DATE").text(formatDateTime(result[0].ARM_CALL_DATE));
        }


        $("#ARM_WORKPLAN_TIME").text('');
        if (result[0].ARM_WORKPLAN_TIME == '') {
            $("#ARM_WORKPLAN_TIME").text('-');
        } else {
            $("#ARM_WORKPLAN_TIME").text(formatDateTime(result[0].ARM_WORKPLAN_TIME));
        }


        $("#ARM_OPERATOR_ID").text('');
        $("#ARM_OPERATOR_ID").text(result[0].ARM_OPERATOR_ID);

        $("#ARM_RECORD_CALL_DETAIL").text('');
        $("#ARM_RECORD_CALL_DETAIL").text(result[0].ARM_RECORD_CALL_DETAIL);

        $("#ARM_LATITUDE").text('');
        $("#ARM_LATITUDE").text(result[0].ARM_LATITUDE);

        $("#ARM_LONGITUDE").text('');
        $("#ARM_LONGITUDE").text(result[0].ARM_LONGITUDE);

        $("#ARM_PAYMENT_DATE").text('');
        if (result[0].ARM_PAYMENT_DATE == '') {
            $("#ARM_PAYMENT_DATE").text('-');
        } else {
            $("#ARM_PAYMENT_DATE").text(formatDateTime(result[0].ARM_PAYMENT_DATE));
        }


        $("#ARM_PAYMENT_AMT").text('');
        $("#ARM_PAYMENT_AMT").text(formatNumber(result[0].ARM_PAYMENT_AMT));

        $("#ARM_DATE_COLLECT").text('');
        if (result[0].ARM_DATE_COLLECT == '') {
            $("#ARM_DATE_COLLECT").text('-');
        } else {
            $("#ARM_DATE_COLLECT").text(formatDateTime(result[0].ARM_DATE_COLLECT));
        }


        $("#ARM_MONEY_DISCOUNT").text('');
        $("#ARM_MONEY_DISCOUNT").text(result[0].ARM_MONEY_DISCOUNT);

        $("#ARM_PAYMENT_AMT2").text('');
        $("#ARM_PAYMENT_AMT2").text(formatNumber(result[0].ARM_PAYMENT_AMT));

        $("#ARM_SIGNAL_CLOSE_DATE").text('');
        if (result[0].ARM_SIGNAL_CLOSE_DATE == '') {
            $("#ARM_SIGNAL_CLOSE_DATE").text('-');
        } else {
            $("#ARM_SIGNAL_CLOSE_DATE").text(formatDateTime(result[0].ARM_SIGNAL_CLOSE_DATE));
        }


        $("#ARM_SIGNAL_OPEN_DATE").text('');
        if (result[0].ARM_SIGNAL_OPEN_DATE == '') {
            $("#ARM_SIGNAL_OPEN_DATE").text('-');
        } else {
            $("#ARM_SIGNAL_OPEN_DATE").text(formatDateTime(result[0].ARM_SIGNAL_OPEN_DATE));
        }


        $("#ARM_SIGNAL_OPEN_AMT").text('');
        $("#ARM_SIGNAL_OPEN_AMT").text(formatNumber(result[0].ARM_SIGNAL_OPEN_AMT));

        $("#ARM_FEE_AMT").text('');
        $("#ARM_FEE_AMT").text(formatNumber(result[0].ARM_FEE_AMT));

        $("#ARM_FEE_AMT").text('');
        $("#ARM_FEE_AMT").text(formatNumber(result[0].ARM_FEE_AMT));

        $("#ARM_REFINANCE_AMT").text('');
        $("#ARM_REFINANCE_AMT").text(formatNumber(result[0].ARM_REFINANCE_AMT));

        $("#ARM_FIRST_COLLECT").text('');
        $("#ARM_FIRST_COLLECT").text(formatNumber(result[0].ARM_FIRST_COLLECT));

        $("#ARM_INSTALLMENT_AMT").text('');
        $("#ARM_INSTALLMENT_AMT").text(formatNumber(result[0].ARM_INSTALLMENT_AMT));

        $("#ARM_INSTALLMENT_COUNT").text('');
        $("#ARM_INSTALLMENT_COUNT").text(result[0].ARM_INSTALLMENT_COUNT);

        $("#ARM_CORRUPT_AMT").text('');
        $("#ARM_CORRUPT_AMT").text(formatNumber(result[0].ARM_CORRUPT_AMT));

        $("#ARM_CORRUPT_NAME").text('');
        $("#ARM_CORRUPT_NAME").text(result[0].ARM_CORRUPT_NAME);

        $("#ARM_CORRUPT_POSITION").text('');
        $("#ARM_CORRUPT_POSITION").text(result[0].ARM_CORRUPT_POSITION);

        $("#ARM_RECIEVER_PRODUCT").text('');
        $("#ARM_RECIEVER_PRODUCT").text(result[0].ARM_RECIEVER_PRODUCT);

        $("#ARM_IMPOUND_DATE").text('');
        if (result[0].ARM_IMPOUND_DATE == '') {
            $("#ARM_IMPOUND_DATE").text('-');
        } else {
            $("#ARM_IMPOUND_DATE").text(formatDateTime(result[0].ARM_IMPOUND_DATE));
        }


        $("#ARM_SHOP_NAME").text('');
        $("#ARM_SHOP_NAME").text(result[0].ARM_SHOP_NAME);

        $("#ARM_RECIEVER_POSITION").text('');
        $("#ARM_RECIEVER_POSITION").text(result[0].ARM_RECIEVER_POSITION);

        $('#rdDetail').modal('show');


    }, function fail(data, status) {
        console.log(status);
    });

}

function LoadDataAttachFile(accno) {

    $('#ATTACH').empty();
    var table = $('#ATTACH').dataTable({
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

            {"data": "PATH", "className": "text-center", "defaultContent": '', "width": "20%",
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = "<a href='" + data + "' target='_blank'> DOWNLOAD </a>";
                    }
                    return result;
                }

            },
            {"data": "NAME_DOC", "className": "text-center", "defaultContent": '', "width": "20%"},
            {"data": "DESC_DOC", "className": "text-center", "defaultContent": '', "width": "20%"},
            {"data": "CREATE_BY", "className": "text-center", "defaultContent": '', "width": "20%"},
            {"data": "CREATE_DATE", "className": "text-center", "defaultContent": '', "width": "20%",
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }
            }

        ],
        order: [[4, "desc"]],
        ajax: {
            url: "get_arcollection_attachfile.php",
            method: "GET",
            async: true,
            cache: false,
            data: {accno: accno}

        }

    });

    var table = $('#ATTACH').DataTable();
    table.columns(0).header().to$().text('ไฟล์เอกสาร');
    table.columns(1).header().to$().text('ชื่อเอกสาร');
    table.columns(2).header().to$().text('รายละเอียดเอกสาร');   
    table.columns(3).header().to$().text('ผู้แนบเอกสาร');
    table.columns(4).header().to$().text('วันที่แนบเอกสาร');

    var table = $('#ATTACH').DataTable();
    table.ajax.reload();

    $("#btnRefreshAttach").button('reset');
     

}

function TagNotification(AccNo) {
    
    
    
    $.ajax('get_tag_notification.php', {
        data: {accno: AccNo},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        if (result.Status != '-') {
            $("#txtTagNotifucation").text("");
            $("#txtTagNotifucation").text(result.Status);
            $("#tagNotification").show();
        }



    }, function fail(data, status) {
        console.log(status);
    });

}

function ProductDesc(AccNo) {

    $.ajax('get_all_product.php', {
        data: {accno: AccNo},
        method: 'GET',
        dataType: 'json',
        cache: false,
        async: true
    }).then(function success(data) {

        var result = data.data;
        //console.log(result);
        if (result.length > 0) {
            var x = 1;
            for (var i = 0; i < result.length; i++) {
                $("#lbProduct").append("<tr><td>" + x + "</td><td>" + result[i].SALES_PART_CODE + "</td><td>" + result[i].DESCRIPTION + "</td><td>" + result[i].MODEL_DESCRIPTION + "</td><td>" + result[i].SERIAL_NO + "</td></tr>");
                x++;
            }
        }



    }, function fail(data, status) {
        console.log(status);
    });

}

function LoadRequestWaive(accno) {


    var table = $('#WAIVEREQUEST').dataTable({
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
            {"data": "ARM_WAIVE_ID", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_TOTAL_CLAIM_LATE_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                  
                    var result = formatNumber(data);                
                    return result;
                }
            },
            {"data": "ARM_APPROVE_TOTAL_AMT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    
                    var result = formatNumber(data);         
                    return result;
                }
            },
            {"data": "ARM_WAIVE_COMMENT", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_REQUEST_USER", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_REQUEST_DATE", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }
            },
            {"data": "ARM_WAIVE_STAT", "className": "text-center", "defaultContent": ''},
            {"data": "ARM_WAIVE_STAT", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                   if(data == 'REQUEST WAIVE'){
                       result = "<a href='#' class='action' data='" + full.ARM_WAIVE_ID + "' data2='" + full.ARM_TOTAL_CLAIM_LATE_AMT + "' data3='" + full.ARM_REQUEST_CLAIM_AMT + "' data4='" + full.ARM_REQUEST_LATE_AMT + "' data5='" + full.ARM_WAIVE_COMMENT + "'><i class='fa fa-cog'></i></a>";   
                   }else{
                       result = "-";
                   }
                    return result;
                }
            },

        ],
        order: [[5, "desc"]],
        ajax: {
            url: "get_arcollection_waive_request.php",
            method: "GET",
            cache: false,
            async: true,
            data: {accno: accno}
        }

    });

    var table = $('#WAIVEREQUEST').DataTable();
    table.ajax.reload();

    $("#btnRefreshWaive").button('reset');
    
    $("#WAIVEREQUEST").on('click','a.action', function(e) {
        e.preventDefault();
        var $tr = $(this).closest('a');
        var waiveid = $tr.attr("data"); 
        var waiveamt = $tr.attr("data2"); 
        var claim = $tr.attr("data3"); 
        var late = $tr.attr("data4"); 
        var remark = $tr.attr("data5"); 
        
        LoadRequestWaiveAction(waiveid,waiveamt,claim,late,remark);
    });

}

function LoadRequestWaiveAction(waiveid,waiveamt,claim,late,remark){
    
    $("#lbWaiveID").text(waiveid);
    $("#aClaim").val(claim);
    $("#aLate").val(late);
    $("#aWaive").val(waiveamt);
    $("#aApproveWaive").val(waiveamt);
    $("#aRemark").val(remark);
    $('#ACTIONWAIVE').modal('show');    
    
}

function LoadSpecialNote(accno) {


    var table = $('#SPECIALNOTE').dataTable({
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
            {"data": "SPECAIL_REMARK", "className": "text-center", "defaultContent": ''},
            {"data": "Create_By", "className": "text-center", "defaultContent": ''},
            {"data": "Create_Date", "className": "text-center", "defaultContent": '',
                "render": function (data, type, full) {
                    var result;
                    if (data != 0 || data != '') {
                        result = formatDateTime(data);
                    }
                    return result;
                }
            }

        ],
        order: [[2, "desc"]],
        ajax: {
            url: "get_arcollection_specialnote.php",
            method: "GET",
            cache: false,
            async: true,
            data: {accno: accno}

        }

    });

    var table = $('#SPECIALNOTE').DataTable();
    table.ajax.reload();

    $("#btnRefreshSpecialNote").button('reset');

}