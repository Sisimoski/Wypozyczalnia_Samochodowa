$(document).ready(function(){

    $("#loginRecoveryButton").click(function() {
        var value ="login";
        recover(value);
    })

    $("#emailRecoveryButton").click(function() {
        var value ="email";
        recover(value);
    })

})


function recover(value){
    $(".alert-success").html("");
    $(".alert-error").html("");
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").html('');
    $(".alert").fadeIn();
    var data = $(".recoveryForm").serialize();
    data = data+ "&value=" + value;
    var request;

 

    request = $.ajax({
        url: "./php/recoveryFunc.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response=="Pomyślnie wysłano maila"){
        $(".alert").addClass("alert-success");
        $(".alert-success").html(response);
        $(".alert-success").fadeOut(3000);  
        console.log(response);
        }
        else{
        $(".alert").addClass("alert-danger");
        $(".alert-danger").html(response);
        $(".alert-danger").fadeOut(3000);  

        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-danger").html(response);     
        $(".alert-danger").fadeOut(3000);  
    });
}