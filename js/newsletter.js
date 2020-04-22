$(document).ready(function() { 
    $(".alert").fadeOut();


    $('#subscribeNewsletterButton').click(function(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
    if(emailVerify()){
        var data = $('.newsletterForm').serialize();
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