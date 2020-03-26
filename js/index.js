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
            window.location.replace("../logowanie.php");
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
    
});