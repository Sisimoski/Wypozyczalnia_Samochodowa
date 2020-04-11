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
    $("#panelPracownika").click(function() {
        window.location.replace("../wpanel/index.php");
    });

    $("#panelAdministratora").click(function() {
        window.location.replace("../apanel/index.php");
    });
    
    $('.next').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('next');return false; 
    });

    $('.prev').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('prev');return false; 
    });
});

