$(document).ready(function() { 

    $("#zarejestrujPracownika").click(function() {
        var request;
        var data = $(".rejestracjaPracownika").serialize();
        request = $.ajax({
            url: "./php/dodajPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function(response) {
            console.log(response);
        });

        request.fail(function(response) {
            console.log("Error: ",response);
                       
        });
    });
});