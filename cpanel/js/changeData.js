$(document).ready(function() { 
$("#changePassword").click(function() {

    $(".alert-success").html("");
    $(".alert-error").html("");
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").html('');
    $(".alert").fadeIn();

    var data = $(".changePasswordForm").serialize();
    var request;

    request = $.ajax({
        url: "./php/userChangePassword.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response == "Pomyślnie zmieniono hasło"){
            $(".alert").addClass("alert-success");
            $(".alert-success").html(response);
            $(".alert-success").fadeOut(3000);                
            
        }
        else{
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);     
            $(".alert-danger").html(response);            
        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-success").fadeOut(3000);   
        $(".alert-danger").html(response);    
    });

    
});

});
