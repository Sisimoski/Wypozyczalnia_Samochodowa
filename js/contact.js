$(document).ready(function() {    
    $(".alert").fadeOut();
   
    $('#imie').blur(function(){
        var input = $(this);        
        var imie = input.val()  
        var onlyLetters = new RegExp("\w*[a-zA-Z]\w*");  

       if(onlyLetters.test(imie)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("To pole jest wymagane");	
        }
  
    });

  
    $('#email').blur(function(){
        var input = $(this);  
        var email= input.val()  
        var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        
        if(emailRegex.test(email)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Podano nieprawidłowy adres mailowy");	
        }
  
    });

    $('#content').blur(function(){
        var input = $(this);  
        var content = input.val()  
        var onlyLetters = new RegExp("\w*[a-zA-Z]\w*");  
        
        if(onlyLetters.test(content)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("To pole jest wymagane");	
        }
  
    });



    $("#contact").click(function() {
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();

        var data = $(".contactForm").serialize();
        var request;
        var validated=validate();
        if(validated==true){
        request = $.ajax({
            url: "./php/contact.php",
            data: data,
            type: "POST"
        });
        request.done(function(response) {
            if(response == "Pomyślnie wysłano wiadomość"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);                
                
            }
            else{
                $(".alert").addClass("alert-danger");               
                $(".alert-danger").html(response);    
                $(".alert-success").fadeOut(3000);        
            }
        });

        request.fail(function(response) {
            $(".alert").addClass("alert-danger");        
            $(".alert-danger").html(response);   
            $(".alert-success").fadeOut(3000); 
        });
    }
    else
    {
        $(".alert").addClass("alert-danger");
        $(".alert").html("Wprowadź poprawne dane");	
        $(".alert").fadeOut(3000);
    }
        
    });
});


function validate(){
    var imie= $('#imie');
    var content = $('#content');
    var email= $('#content');


    if(imie.hasClass('valid') && email.hasClass('valid') && content.hasClass('valid'))
    {
        return true;
    }
    else{
        return false;
    }
}




