$(document).ready(function() { 


    var data = $(".signupForm").serialize();
    var request;

    $("#zarejestruj").click(function() {
        request = $.ajax({
            url: "./php/userSignup.php",
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