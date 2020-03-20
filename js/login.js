$(document).ready(function() { 

    $('#login').blur(function(){
        if($('#login').val() == ""){
            $('#loginInfo').addClass("text-danger");     
            $('#loginInfo').html("Nie podano login/email.");
        }
        else{
            $("#loginInfo").removeClass("text-danger");
            $('#loginInfo').html("");
        }

    });

    $('#password').blur(function(){
        if($('#password').val() == ""){
            $('#passwordInfo').addClass("text-danger");
            $('#passwordInfo').html("Nie podano hasła.");
        }
        else{
            $("#passwordInfo").removeClass("text-danger");
            $('#passwordInfo').html("");
        }
    });





    $("#zaloguj").click(function() {
        event.preventDefault();
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
        var data = $(".loginForm").serialize();
        console.log(data);
        var request;

        request = $.ajax({
            url: "./php/userLogin.php",
            data: data,
            type: "POST"
        });

        request.done(function(response) {
            if(response == "Zalogowano Użytkownika"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                setTimeout(function(){ window.location.replace("../index.php"); }, 2000); 
                
            }
            else{
                $(".alert").addClass("alert-danger");
                $(".alert-danger").html(response);
                $(".alert-danger").fadeOut(3000); 
            }
        });

        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html(response);
            $(".alert-danger").fadeOut(3000);            
        });
    });
    
});




