$(document).ready(function() { 

    $("#wyloguj").click(function() {
        var request;
        request = $.ajax({
            url: "./php/logout.php"
        });

        request.done(function() {
            
        });

        request.fail(function() {
                       
        });
    });
});