


(function ($) {
    
    GetLevelManagement();
    $(".bg_load").fadeOut("slow");
    $(".wrapper").fadeOut("slow");
    
})(jQuery);

function GetLevelManagement(){
    
    $.ajax('get_level_management.php', {       
        method: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json'
    }).then(function success(data) {
        
        var result = data.data;        
        if (result.length > 0) {
            var tree = $("#easy-tree");
            var main,sub;
            for (var i = 0; i < result.length; i++) {                
               
                if(result[i].User_Grp_Parent == ''){
                    main = result[i].User_Grp_ID;
                    tree.append("<ul> <li group=" + result[i].User_Grp_ID + " parent=" + result[i].User_Grp_Parent + ">" + result[i].User_Grp_Name + "<ul id=" + result[i].User_Grp_ID + "></ul></li></ul>");
                }else{
                    
                    sub = result[i].User_Grp_Parent;
                    if(result[i].User_Grp_Parent == main){                        
                        $("#" + main).append("<li group=" + result[i].User_Grp_ID + " parent=" + result[i].User_Grp_Parent + ">" + result[i].User_Grp_Name + "<ul id=" + result[i].User_Grp_ID + "></ul></li>");
                    }else{                        
                        $("#" + sub).append("<li group=" + result[i].User_Grp_ID + " parent=" + result[i].User_Grp_Parent + ">" + result[i].User_Grp_Name + "<ul id=" + result[i].User_Grp_ID + "></ul></li>");
 
                    }
                    
                }
                
            }
        }
        $('.easy-tree').EasyTree({
                addable: true,
                editable: true,
                deletable: true
        });
        //console.log(result);

    }, function fail(data, status) {
        console.log(status);
    });
}


