$(document).ready(function(){

    $("#wyloguj").click(function() {
        var request;
        request = $.ajax({
            url:  "../php/logout.php",
            data: null,
            type: "POST"
        });

        request.done(function() {
            window.location.replace( "../index.php");
        });

        request.fail(function() {
                       
        });
    });


});