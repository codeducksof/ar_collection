$(function () {
    
    if (location.protocol != 'https:') {
        location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
    }
    
    $("#ckShowPass").on("click", function (e) {
        showPass();
    });

    function showPass() {
        var x = $("#password").attr('type');
        if (x === 'password') {
            $("#password").attr('type', 'text');           
        } else {
            $("#password").attr('type', 'password');             
        }
    }

    $('#frmLogin').validator().on('submit', function (e) {
        
        var username,password;
        username = $("#username").val();
        password = $("#password").val();
        
        if (e.isDefaultPrevented()) {
            $("#btnLogin").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
        } else {           
            Login(username,password);
            //$(e).text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
            return false;            
        }
    });
    
    $('#frmForgetPassword').validator().on('submit', function (e) {
        
        var idcard,datebirth,empcode;
        idcard = $("#idcard").val();
        datebirth = $("#dateofbirth").val();
        empcode = $("#fempcode").val();
        
        if (e.isDefaultPrevented()) {
            $("#brnConfirmChange").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
           
        } else {  
            
            var valiidcard = checkID(idcard);
            if(valiidcard != true){
                               
                $("#err-idcard").show();
                $("#err-data").hide();
                $("#brnConfirmChange").button('reset');
                return false; 
            }
            

            ForgetPassword(empcode,idcard,datebirth);
            return false;            
        }
        
    });
    
    $("#brnConfirmChange").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        
    });
    
    
    $('#changepassword').validator().on('submit', function (e) {
        
        if (e.isDefaultPrevented()) {            
            $("#btnChangePassword").button('reset');
            $(e).closest('.control-group').removeClass('success').addClass('error');
            return false;
        } else {
            
            var empcode,password,confirmpassword;
            empcode = $("#cempcode").val();
            password = $("#repassword").val();
            confirmpassword = $("#crepassword").val();
            
            changePassword(empcode,password,confirmpassword);
            return false; 
            
        }
        
    });
    
    $("#btnChangePassword").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');        
    });
    
    $("#btnLogin").on("click", function (e) {
        var $this = $(this);
        $this.button('loading');
        
    });
    
    $('#forget-password').click(function() {
        $('.login-form').hide();
        $('.forget-form').show();
    });

    $('#back-btn').click(function() {
        $('.login-form').show();
        $('.forget-form').hide();
    });
    
});


function changePassword(empcode,password,confirmpassword){
    
    var passpolicy = ispwdPolicy(password);
 
    if(password.length < 8){
        
        $("#err-passless").show();
        $("#err-passnotmatch").hide();
        $("#err-passnotstength").hide();
        $("#btnChangePassword").button('reset');
        
        return false;
        
    }else if(password != confirmpassword){
        
        $("#err-passnotmatch").show();
        $("#err-passnotstength").hide();
        $("#err-passless").hide();
        $("#btnChangePassword").button('reset');
        
        return false;
         
    }else if(passpolicy == "failed"){
        
        $("#err-passnotstength").show();
        $("#err-passnotmatch").hide();
        $("#err-passless").hide();
        $("#btnChangePassword").button('reset');
        
        return false;
        
    }
    
    $.ajax('changepassword2.php', {
        data: {empcode:empcode,pass:password},
        method: 'POST',
        dataType: 'json'
    }).then(function success(data) {
        //console.log(data);
        var result = data.data;
        if(result == 'Pass'){
            
            Login(empcode,password);
            
        }else{
            
            $("#err-passsystem").show();
            $("#err-passnotstength").hide();
            $("#err-passnotmatch").hide();
            $("#err-passless").hide();
            $("#btnChangePassword").button('reset'); 
        }
       //console.log(data);
       
    }, function fail(data, status) {
        console.log(status);
    });
    
}

function ispwdPolicy(password){
    
    var result;
    var pwdPolicy = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*()]).{8,}/;    
    result = pwdPolicy.test(password);
    if(result == true){
        result = "pass";    
    }else{
	result = "failed";	
    }  
    
    return result;
}


function ForgetPassword(empcode,idcard,datebirth){
    
   $.ajax('forgotpassword2.php', {
        data: {empcode:empcode,idcard:idcard,datebirth:datebirth},
        method: 'POST',
        dataType: 'json'
    }).then(function success(data) {
        
       //console.log(data);
       var result = data.data;   
        if(result == 'Pass'){
            
              checkBloxkAccount(empcode);
          
           
//           $("#cempcode").val(empcode); 
//           $("#idcard").val('');
//           $("#dateofbirth").val('');
//           $("#fempcode").val('');
//           $(".forget-form").hide();
//           $("#changepassword").show();
           
        }else{
           $("#err-data").show();
           $("#err-idcard").hide();
           $("#brnConfirmChange").button('reset');
        }
        //console.log(data);
       
    }, function fail(data, status) {
        console.log(status);
    });
    
}


function checkBloxkAccount(empcode){
    
   
    $.ajax('check_arcollection_lockuser.php', { 
        data: {empcode:empcode},
        method: 'GET',
        dataType: 'json'
    }).then(function success(data) {        
        
        var result = data.data;
        //console.log(result[0].OTP);
        if(result.length == 0){
           
           $("#cempcode").val(empcode); 
           $('#err-block2').hide();
           $("#idcard").val('');
           $("#dateofbirth").val('');
           $("#fempcode").val('');
           $(".forget-form").hide();
           $("#changepassword").show();
           

        }else{
            
          
           var otp = result[0].OTP;
           $('#err-block2').show();
           $("#otplock").text('');
           $("#otplock").text(otp);
           $('#OTPLOCK').modal('show');
           $("#brnConfirmChange").button('reset');
            //$(".forget-form").hide();
        }

       
    }, function fail(data, status) {
        console.log(status);
    });
    
   
}


function checkID(IDcard)
{
    var id = IDcard;
// console.log(id);
    if (id.length != 13)
        return false;
    for (i = 0, sum = 0; i < 12; i++)
        sum += parseFloat(id.charAt(i)) * (13 - i);
    if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
        return false;
    return true;
}

function Login(username,password){
    
    $.ajax('login.php', {
        data: {username:username,password:password},
        method: 'POST',
        dataType: 'json'
    }).then(function success(data) {
        
        //console.log(data);        
        var result = data.data.STATUS;
        var otp = data.data.OTP;
        
        if(result == 'Fail'){
            
            $('#err-block').hide();
            $('#alerterr1').show();  
            $('#alerterr2').hide();
            $("#btnLogin").button('reset');
            
        }     
        
        if(result == 'Exp'){
            
            $('#err-block').hide();
            $('#alerterr1').hide(); 
            $('#alerterr2').show();
            $("#btnLogin").button('reset');
            
        }
        
        if(result == 'Block'){
            
            
            $('#err-block').show();
            $('#alerterr1').hide(); 
            $('#alerterr2').hide();
            $("#btnLogin").button('reset');
            $("#otplock").text('');
            $("#otplock").text(otp);
            $('#OTPLOCK').modal('show');
            
        }
        
        if(result == 'Succ'){
          
            $('#alerterr1').hide(); 
            $('#alerterr2').hide();
            $('#err-block').hide();
            window.location.assign("agreement.php");
            
        }
        
        //console.log(result);
       
    }, function fail(data, status) {
        console.log(status);
    });
    
    //window.location.assign("home.php");
}