$(document).ready(function() { 
    $("#nrKom").addClass("valid");
    $("#fax").addClass("valid");
    $("#nazwaFirmy").addClass("valid");
    $("#regon").addClass("valid");
    $("#nip").addClass("valid");
    $("#stronaInternnetowa").addClass("valid");
   


    $('#login').blur(function(){
        var input = $(this);       
        var login_length = input.val().length;
        if(login_length >= 3 && login_length <= 15){ 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');      
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
            input.next('.komunikat').html('&#10004;');                 
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
            input.next('.komunikat').html('&#10004;');     
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
            input.next('.komunikat').html('&#10004;');    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }
  
    });

    $('#nazwisko').blur(function(){
        var input = $(this);  
        var nazwisko = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;
        
        if(onlyLetters.test(nazwisko)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');     
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }
  
    });

    $('#nrKom').blur(function(){
        var input = $(this);  
        var nrKom= input.val()  
        var onlyNumbers =/^\d{9}$/;
        
        if(onlyNumbers.test(nrKom)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });

    $('#nrTel').blur(function(){
        var input = $(this);  
        var nrTel= input.val()  
        var onlyNumbers = /^\d{9}$/;  
        
        if(onlyNumbers.test(nrTel) || nrTel.length==0) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');     
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });

    $('#fax').blur(function(){
        var input = $(this);  
        var fax= input.val()  
        var onlyNumbers = /^\d{9}$/;  
        
        if(onlyNumbers.test(fax) || fax.length==0) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });

    $('#email').blur(function(){
        var input = $(this);  
        var email= input.val()  
        var emailRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        
        if(emailRegex.test(email)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Podano nieprawidłowy adres mailowy");	
        }
  
    });

    $('#stronaInternetowa').blur(function(){
        var input = $(this);  
        var www= input.val()  
        var wwwRegex = new RegExp(
            "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
        
        if(wwwRegex.test(www) || www==0) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');     
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Podano nieprawidłowy adres strony internetowej");	
        }
    });

    $('#miejscowosc').blur(function(){
        var input = $(this);  
        var miejscowosc = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;
        
        if(onlyLetters.test(miejscowosc)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');      
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }  
    });

    $('#kodPocztowy').blur(function(){
        var input = $(this);  
        var kodPocztowy = input.val()  
        var kodPocztowyRegEx = /\d{2}-\d{3}/;  
        
        if(kodPocztowyRegEx.test(kodPocztowy)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');      
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji xx-xxx");	
        }  
    });

    $('#ulica').blur(function(){
        var input = $(this);  
        var miejscowosc = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;;  
        
        if(onlyLetters.test(miejscowosc)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');      
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }  
    });

    $('#nr_domu').blur(function(){
        var input = $(this);  
        var nr_domu = input.val()  
        var onlyLetters = /^\d+[a-zA-Z]*$/;
        
        if(onlyLetters.test(nr_domu)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');     
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });

    $('#czyFirma').change(function() {   
        var nazwaFirmy = $("#nazwaFirmy");
        var regon = $("#regon");
        var nip = $("#nip");
        
        if(this.checked==true) {         
            nazwaFirmy.prop('disabled', false);
            regon.prop('disabled', false);
            nip.prop('disabled', false);
            nazwaFirmy.removeClass("valid").addClass("invalid");
            regon.removeClass("valid").addClass("invalid");
            nip.removeClass("valid").addClass("invalid");
        }   
        else {         
            nazwaFirmy.prop('disabled', true);
            regon.prop('disabled', true);
            nip.prop('disabled', true);

            nazwaFirmy.removeClass("valid").addClass("valid");
            regon.removeClass("valid").addClass("valid");
            nip.removeClass("valid").addClass("valid");

            nazwaFirmy.val("");
            regon.val("");
            nip.val("");

            nazwaFirmy.next(".komunikat").text("");
            regon.next(".komunikat").text("");
            nip.next(".komunikat").text("");
        }                   
    });

    $('#nazwaFirmy').blur(function(){
        var input = $(this);  
        var nazwaFirmy = input.val().length;

        if(nazwaFirmy>0) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;'); 
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Pole jest puste");	

        }
    });

    $('#regon').blur(function(){
        var input = $(this);  
        var regon = input.val();
        var onlyDigits = /^[0-9]{9}$/;
        
        if(onlyDigits.test(regon)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;'); 
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });

    $('#nip').blur(function(){
        var input = $(this);  
        var nip = input.val();  
        var onlyDigits = /^[0-9]{10}$/;
        
        if(onlyDigits.test(nip)) { 
            input.removeClass("invalid").addClass("valid");
            input.next('.komunikat').html('&#10004;');    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });

    $('#login').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });
    $('#haslo1').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

    $('#haslo2').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

    $('#imie').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

    $('#nazwisko').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

    $('#nrKom').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

    $('#nrTel').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });

     $('#fax').click(function(){
        var input = $(this);  
      input.next('.komunikat').text("");  
    });
    $('#email').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#stronaInternetowa').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#miejscowosc').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#kodPocztowy').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#ulica').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#nr_domu').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#nazwaFirmy').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#regon').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });
    $('#nip').click(function(){
        var input = $(this);  
      input.next('.fax').text("");  
    });




    $("#zarejestruj").click(function() {
        var login = $('#login');
        var haslo1 = $('#haslo1');
        var haslo2 = $('#haslo2');
        var imie= $('#imie');
        var nazwisko = $('#nazwisko');
        var nrKom= $('#nrKom');
        var nrTel = $('#nrTel');
        var fax = $('#fax');
        var email= $('#email');
        var stronaInterentowa = $('#stronaInternetowa');
        var miejscowosc = $('#miejscowosc');
        var kodPocztowy= $('#kodPocztowy');
        var ulica = $('#ulica');
        var nr_domu = $('#nr_domu');
        var nazwaFirmy= $('#nazwaFirmy');
        var regon = $('#regon');
        var nip = $('#nip');


        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();

        var data = $(".signupForm").serialize();
        var request;

        if(login.hasClass('valid') && haslo1.hasClass('valid') && haslo2.hasClass('valid') && 
        imie.hasClass('valid') && nazwisko.hasClass('valid') && nrKom.hasClass('valid') && nrTel.hasClass('valid') && 
        fax.hasClass('valid') && email.hasClass('valid') && stronaInterentowa.hasClass('valid') && miejscowosc.hasClass('valid') && 
        kodPocztowy.hasClass('valid') && ulica.hasClass('valid') && 
        nr_domu.hasClass('valid') && nazwaFirmy.hasClass('valid') &&  regon.hasClass('valid') && nip.hasClass('valid')){
        request = $.ajax({
            url: "./php/userSignup.php",
            data: data,
            type: "POST"
        });
    
        request.done(function(response) {
            if(response == "Zarejestrowano Użytkownika"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                $(".alert").text("Pomyślnie zarejestrowano");	
                setTimeout(function(){ window.location.replace("../index.php");; }, 1500);
                
            }
            else{
                $(".alert").addClass("alert-danger");
                $(".alert-danger").html(response);
                $(".alert-danger").fadeOut(5000); 
            }
        });

        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html(response);
            $(".alert-danger").fadeOut(5000);            
        });
    }
    else
    {
        $(".alert").text("Wprowadź poprawane dane");	
    }
        
    });
    

});