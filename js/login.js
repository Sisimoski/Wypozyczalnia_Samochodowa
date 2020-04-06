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
            $(".alert").removeClass("alert-success");
            $(".alert").removeClass("alert-danger");
            $(".alert").removeClass("alert-warning");
            $(".alert").html('');
            $(".alert").stop().fadeOut();
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
                switch(response){
                    case "Zalogowano Użytkownika":
                        $(".alert").addClass("alert-success");
                        $(".alert-success").html("Zalogowano Użytkownika");
                        setTimeout(function(){ window.location.replace("../index.php"); }, 2000);
                        break;
                    case "Brak Aktywacji":
                        $(".alert").addClass("alert-warning");
                        $(".alert-warning").html("Konto wymaga aktywacji");
                        $(".alert").fadeOut(3000);
                        break;
                    case "Niepoprawny login":
                        $(".alert").addClass("alert-danger");
                        $(".alert-danger").html("Niepoprawny email/login");
                        $(".alert").fadeOut(3000);
                        break;
                    case "Niepoprawne Haslo": 
                        $(".alert").addClass("alert-danger");
                        $(".alert-danger").html("Niepoprawne hasło");
                        $(".alert").fadeOut(3000);
                        break;
                    default:
                        $(".alert").addClass("alert-danger");
                        $(".alert-danger").html(response);
                        $(".alert").fadeOut(3000);
                        break;
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




