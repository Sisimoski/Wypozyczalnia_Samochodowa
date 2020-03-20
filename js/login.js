$(document).ready(function() { 

    $('#login').blur(function(){
        if($('#login').val() == ""){
            $('#loginInfo').addClass("text-danger");     
            $('#loginInfo').html("Nie podano login/email.");
            $('#login').addClass("border border-danger");
        }
        else{
            $("#loginInfo").removeClass("text-danger");
            $('#loginInfo').html("");
            $('#login').removeClass("border border-danger");
        }

    });

    $('#password').blur(function(){
        if($('#password').val() == ""){
            $('#passwordInfo').addClass("text-danger");
            $('#passwordInfo').html("Nie podano hasła.");
            $('#password').addClass("border border-danger");
        }
        else{
            $("#passwordInfo").removeClass("text-danger");
            $('#passwordInfo').html("");
            $('#password').removeClass("border border-danger");
        }
    });





    $("#zaloguj").click(function() {
        event.preventDefault();
        var loginBool = !$('#login').val();
        var passwordBool = !$('#password').val();
        if((loginBool || passwordBool) == false){
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
                    setTimeout(function(){ window.location.replace("../index.php"); }, 2000); 
                    
                }
                else{
                    if(response == "Brak Aktywacji"){
                        $(".alert").addClass("alert-warning");
                        $(".alert-danger").html("Konto wymaga aktywacji");
                        $(".alert-danger").fadeOut(3000); 
                    }
                    else{
                        console.log("Nie zalogowano");
                    }
                }
            });

            request.fail(function(response) {
                $(".alert").addClass("alert-danger");
                $(".alert-danger").html(response);
                $(".alert-danger").fadeOut(3000);            
            });

        }
    });
    
});




