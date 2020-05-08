$(document).ready(function(){
//wysylanie linku do zmiany hasła
    $("#loginRecoveryButton").click(function() {
        var value ="login";
        recover(value);
    })

    $("#emailRecoveryButton").click(function() {
        var value ="email";
        recover(value);
    })
//zmiana hasła
$("#newPswdButton").click(function() {
    $password=$('#newPswd');
    
    let searchParams = new URLSearchParams(window.location.search)
    searchParams.has('hash');
    $hash = searchParams.get('hash');

    $(".alert-success").html("");
    $(".alert-error").html("");
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").html('');
    $(".alert").fadeIn();
    var data = $(".newPswdForm").serialize();
    data = data+ "&hash=" + $hash;

    var request;
    if($password.hasClass('valid')){
            request = $.ajax({
                url: "./php/recoveryFunc2.php",
                data: data,
                type: "POST"
            });
        
            request.done(function(response) {
                if(response=="Pomyślnie zmieniono hasło. Poczekaj, zostaniesz przekierowany na stronę główną"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(4000);  
                setTimeout(function(){ window.location.replace("../index.php"); }, 6000);
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
        else{
                $(".alert").addClass("alert-danger");
                $(".alert-danger").html("Wprowadź hasło zgodnie z instrukcją");     
                $(".alert-danger").fadeOut(3000);  
        }
    })
//walidacja
    $('#newPswd').blur(function(){
        var input = $(this);     
        var login = input.val()       
        var passwordReg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!-@#\$%\^&\*])(?=.{8,})");
               
        if( passwordReg.test(login)) {    
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	               
        }
        else{   
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Wprowadź kombiancje co najmniej 8 cyfr, małych liter, dużych liter i znaków (takich jak !-@#$%^&*)");	
        }
   
    });

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

function checkHash(){
    let searchParams = new URLSearchParams(window.location.search)
    searchParams.has('hash');
    $hash = searchParams.get('hash');
    if($hash==null){
        setTimeout(function(){ window.location.replace("../index.php"); }, 1);
    }
}