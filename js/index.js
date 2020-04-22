$(document).ready(function() {    

    $("#wyloguj").click(function() {
        var request;
        request = $.ajax({
            url: "./php/logout.php",
            data: null,
            type: "POST"
        });

        request.done(function() {
            window.location.replace("../index.php");
        });

        request.fail(function() {
                       
        });
    });

    $("#zaloguj").click(function() {
            window.location.replace("../logowanie.php"); /* Nie powinno być "logowanie.php"? 
            Bo jak masz w htdocs osobny folder ze stroną (np. htdocs/Car4You/), to wtedy ta linijka z ../logowanie.php wraca aż do root'a i próbuje otworzyć logowanie.php w samym htdocs, zamiast w rzeczywistym folderze ze stroną. Taka tylko uwaga, jak uważacie ~ Marcin */
    });

    $("#panelKlienta").click(function() {
        window.location.replace("../cpanel/index.php");
    });

    $("#zarejestruj").click(function() {
        window.location.replace("../register.php");
    });
    
    $('.next').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('next');return false; 
    });

    $('.prev').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('prev');return false; 
    });

    $('#subscribeNewsletterButton').click(function(){
            $(".alert").removeClass("alert-success");
            $(".alert").removeClass("alert-danger");
            $(".alert").removeClass("alert-warning");
            $(".alert").html('');
            $(".alert").fadeIn();
        if(emailVerify()){
            var data = $('.newsletterForm').serialize();
            console.log(data);
            request = $.ajax({
                url: "./php/userNewsletter.php",
                data: data,
                type: "POST"
            });

            request.done(function (response) {
                if(response == "Podany Adres Email jest już zarejestrowany"){
                    $(".alert").addClass("alert-warning");
                }
                else{
                    $(".alert").addClass("alert-success");

                }  
                $(".alert").html(response);
                $(".alert").fadeOut(1500);
            });

            request.fail(function (response) {
                $(".alert").addClass("alert-danger");
                $(".alert").html(response);
                $(".alert").fadeOut(1500);

            });
        }
        else{
                $(".alert").addClass("alert-danger");
                $(".alert").html("Nie poprawny adres Email!");
                $(".alert").fadeOut(1500);
        }
        event.preventDefault();
    });
});

function emailVerify(){
    var email = $('#newsletterEmail').val();
    var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

    if(emailRegex.test(email)) { 
        return true;
    }
    else{
        return false;
    }

    
}



