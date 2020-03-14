$(document).ready(function() { 


    
    
    

    $("#zarejestruj").click(function() {

        var data = $(".signupForm").serialize();
        console.log(data);
        var request;

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