$(document).ready(function() { 

    $('#login').blur(function(){
        var input = $(this);       
        var login_length = input.val().length;
        if(login_length >= 3 && login_length <= 15){ 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').text("Wprowadzono poprawną nazwę.");       
        }
        else{   
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Nazwa musi mieć więcej niż 3 i mniej niż 15 znaków!");		
		}
    });

    $('#haslo1').blur(function(){
        var input = $(this);     
        var login = input.val()       
        var passwordReg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
               
        if( passwordReg.test(login)) {    
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').text("Wprowadzono poprawne hasło.");                
        }
        else{   
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Wprowadź kombiancje co najmniej 8 cyfr, małych liter, dużych liter i znaków (takich jak !@#$%^&*)");	
        }
   
    });

    $('#haslo2').blur(function(){
        var input = $(this);     
        
        if($("#haslo1").val() == $('#haslo2').val()) {
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').text("Wprowadzono poprawne hasło.");    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Podane hasła nie zgadzają się.");	
        }
  
    });
    $('#imie').blur(function(){
        var input = $(this);  
        var imie = input.val()  
        var onlyLetters = new RegExp("^[a-zA-Z\s]+$");  
        
        if(onlyLetters.test(imie)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').text("Wprowadzono poprawne dane");    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }
  
    });

    $('#nazwisko').blur(function(){
        var input = $(this);  
        var imie = input.val()  
        var onlyLetters = new RegExp("^[a-zA-Z\s]+$");  
        
        if(onlyLetters.test(imie)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').text("Wprowadzono poprawne dane");    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter " );	
        }
  
    });

    // $('#nazwisko').blur(function(){
    //     var input = $(this);  
    //     var imie = input.val()  
    //     var onlyLetters = new RegExp("^[a-zA-Z\s]+$");  
        
    //     if(onlyLetters.test(imie)) { 
    //         input.removeClass("invalid").addClass("valid");
    //         input.next('.komunikat').text("Wprowadzono poprawne dane");    
    //     }
    //     else{
    //         input.removeClass("valid").addClass("invalid");
    //         input.next('.komunikat').text("Użyj kombinacji liter");	
    //     }
  
    // });


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