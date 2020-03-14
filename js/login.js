$(document).ready(function() { 

    $("#zaloguj").click(function() {

        var data = $(".loginForm").serialize();
        console.log(data);
        var request;

        request = $.ajax({
            url: "./php/userLogin.php",
            data: data,
            type: "POST"
        });

        request.done(function(response) {
            $(".alert").html(response);
        });

        request.fail(function(response) {
            $(".alert").html(response);           
        });
    });
});