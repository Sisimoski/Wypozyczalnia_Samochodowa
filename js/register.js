$(document).ready(function() { 

    $("#zarejestruj").click(function() {

        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();

        var data = $(".signupForm").serialize();
        console.log(data);
        var request;

        request = $.ajax({
            url: "./php/userSignup.php",
            data: data,
            type: "POST"
        });

        request.done(function(response) {
            if(response == "Zarejestrowano Użytkownika"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                setTimeout(function(){ window.location.replace("../index.php");; }, 1500);
                
            }
            else{
                $(".alert").addClass("alert-danger");
                $(".alert-danger").html(response);
                $(".alert-danger").fadeOut(5000); 
            }
        });

        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html(response);
            $(".alert-danger").fadeOut(5000);            
        });
    });
});