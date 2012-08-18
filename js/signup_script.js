var base_url = "http://localhost/dts/";

$(document).ready(function(){
	$("#password").keyup(function(){
        
        if($("#con_password").val().length >= 4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('" + base_url + "images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('" + base_url + "images/no.png')" });
                pwd=false;
                register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('" + base_url + "images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('" + base_url + "images/yes.png')" });
            }
        }
    });
    
    $("#con_password").keyup(function(){
        
        if($("#password").val().length >=4)
        {
            if($("#con_password").val()!=$("#password").val())
            {
                $("#confrimpwd_verify").css({ "background-image": "url('" + base_url + "images/no.png')" }); 
                $("#password_verify").css({ "background-image": "url('" + base_url + "images/no.png')" });
                pwd=false;
                register_show();
            }
            else{
                $("#confrimpwd_verify").css({ "background-image": "url('" + base_url + "images/yes.png')" }); 
                $("#password_verify").css({ "background-image": "url('" + base_url + "images/yes.png')" });

            }
        }
    });
});