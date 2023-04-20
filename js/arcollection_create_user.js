(function ($) {


    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");

    $("#btnSave").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
    });


    $('#frmAddUser').validator().on('submit', function (e) {
        if (e.isDefaultPrevented(e)) {
            $("#btnSave").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            $("#btnSave").removeClass("disabled");
            $("#btnSave").removeAttr('disabled');
            return false;
        } else {
            createUserMain($("#txtEmpCode").val(),$("#txtPassword").val());
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

function ispwdPolicy(password) {

    var result;
    var pwdPolicy = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*()]).{8,}/;
    result = pwdPolicy.test(password);
    if (result == true) {
        result = "pass";
    } else {
        result = "failed";
    }

    return result;
}

function createUserMain(empcode, password) {

    var passpolicy = ispwdPolicy(password);

    if (password.length < 8) {

        $("#err-passless").show();
        $("#err-passnotmatch").hide();
        $("#err-passnotstength").hide();
        $("#btnSave").button('reset');
        return false;

    } else if (passpolicy == "failed") {

        $("#err-passnotstength").show();
        $("#err-passnotmatch").hide();
        $("#err-passless").hide();
        $("#btnSave").button('reset');

        return false;

    }

    $.ajax('add_user_new.php', {
        data: {empcode: empcode, pass: password},
        method: 'POST',
        dataType: 'json'
    }).then(function success(data) {
        //console.log(data);
        var result = data.data;
        if (result.STATUS == 'Pass') {

            $("#success").show();
            $("#err-passsystem").hide();
            $("#err-passnotstength").hide();
            $("#err-passnotmatch").hide();
            $("#err-passless").hide();
            $("#repassword").val('');
            $("#crepassword").val('');
            $("#btnSave").button('reset');
        } else {
            $("#success").hide();
            $("#err-passsystem").show();
            $("#err-passnotstength").hide();
            $("#err-passnotmatch").hide();
            $("#err-passless").hide();
            $("#btnSave").button('reset');
        }
        //console.log(data);

    }, function fail(data, status) {
        console.log(status);
    });

}
