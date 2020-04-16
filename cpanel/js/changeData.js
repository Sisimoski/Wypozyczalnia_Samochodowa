$(document).ready(function() { 
    //Zczytywanie danych z bazy zalogowanego użytkownika
    function reqListener () {
        console.log(this.responseText);
      }
      var oReq = new XMLHttpRequest(); 
    oReq.onload = function() {
        var arr = JSON.parse(this.responseText);
        $("#imie").val(arr[0]);
        $("#nazwisko").val(arr[1]);
        $("#ulica").val(arr[3]);
        $("#nr_domu").val(arr[4]);
        $("#wojewodztwo").val(arr[5]);
        $("#kod_pocztowy").val(arr[6]);
        $("#nr_kom").val(arr[7]);
        $("#nr_tel").val(arr[8]);
        $("#fax").val(arr[9]);
        $("#dodatkowe_informacje").val(arr[10]);
        $("#www").val(arr[11]);
        $("#nazwa_firmy").val(arr[12]);
        $("#regon").val(arr[13]);
        $("#nip").val(arr[14]);  
        $("#miejscowosc").val(arr[15]);  
       
        if(arr[2]==1){
            $("#nazwa_firmy").prop('hidden', true);
            $("#regon").prop('hidden', true);
            $("#nip").prop('hidden', true); 
            $("#nazwa_firmy_label").prop('hidden', true); 
            $("#regon_label").prop('hidden', true); 
            $("#nip_label").prop('hidden', true); 
        }
        
    };
    oReq.open("get", "./php/showUserInfo.php", true);
    oReq.send();

   //Walidacja zmiany danych użytkownika
   $(document).ready(function() { 
    $("#imie").addClass("valid");
    $("#nazwisko").addClass("valid");
    $("#ulica").addClass("valid");
    $("#nr_domu").addClass("valid");
    $("#kod_pocztowy").addClass("valid");
    $("#nr_kom").addClass("valid");
    $("#nr_tel").addClass("valid");
    $("#fax").addClass("valid");
    $("#www").addClass("valid");
    $("#nazwa_firmy").addClass("valid");
    $("#regon").addClass("valid");
    $("#nip").addClass("valid");
    $("#miejscowosc").addClass("valid");

    

 


    $('#newPswd').blur(function(){
        var input = $(this);     
        var login = input.val()       
        var passwordReg = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
               
        if( passwordReg.test(login)) {    
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	               
        }
        else{   
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Wprowadź kombiancje co najmniej 8 cyfr, małych liter, dużych liter i znaków (takich jak !@#$%^&*)");	
        }
   
    });

    $('#newPswd1').blur(function(){
        var input = $(this);     
        
        if($("#newPswd").val() == $('#newPswd1').val()) {
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Podane hasła nie zgadzają się.");	
        }
  
    });
    $('#imie').blur(function(){
        var input = $(this);  
        var imie = input.val()  
        var onlyLetters = new RegExp("^[a-zA-Z\s]+$");  
        
        if(onlyLetters.test(imie)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }
  
    });

    $('#nazwisko').blur(function(){
        var input = $(this);  
        var nazwisko = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;
        
        if(onlyLetters.test(nazwisko)) { 
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }
  
    });

    $('#nr_kom').blur(function(){
        var input = $(this);  
        var nrKom= input.val()  
        var onlyNumbers =/^\d{9}$/;
        
        if(onlyNumbers.test(nrKom)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });

    $('#nr_tel').blur(function(){
        var input = $(this);  
        var nrTel= input.val()  
        var onlyNumbers = /^\d{9}$/;  
        
        if(onlyNumbers.test(nrTel) || nrTel.length==0) { 
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });

    $('#fax').blur(function(){
        var input = $(this);  
        var fax= input.val()  
        var onlyNumbers = /^\d{9}$/;  
        
        if(onlyNumbers.test(fax) || fax.length==0) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji 9 liczb");	
        }
  
    });



    $('#www').blur(function(){
        var input = $(this);  
        var www= input.val()  
        var wwwRegex = new RegExp(
            "^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
        
        if(wwwRegex.test(www) || www==0) { 
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Podano nieprawidłowy adres strony internetowej");	
        }
    });

    $('#miejscowosc').blur(function(){
        var input = $(this);  
        var miejscowosc = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;
        
        if(onlyLetters.test(miejscowosc)) { 
            input.removeClass("invalid").addClass("valid");  
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }  
    });

    $('#kod_pocztowy').blur(function(){
        var input = $(this);  
        var kodPocztowy = input.val()  
        var kodPocztowyRegEx = /\d{2}-\d{3}/;  
        
        if(kodPocztowyRegEx.test(kodPocztowy)) { 
            input.removeClass("invalid").addClass("valid"); 
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji xx-xxx");	
        }  
    });

    $('#ulica').blur(function(){
        var input = $(this);  
        var miejscowosc = input.val()  
        var onlyLetters = /^[\s\p{L}]+$/u;;  
        
        if(onlyLetters.test(miejscowosc)) { 
            input.removeClass("invalid").addClass("valid");  
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Użyj kombinacji liter");	
        }  
    });

    $('#nr_domu').blur(function(){
        var input = $(this);  
        var nr_domu = input.val()  
        var onlyLetters = /^\d+[a-zA-Z]*$/;
        
        if(onlyLetters.test(nr_domu)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	    
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });


    $('#nazwa_firmy').blur(function(){
        var input = $(this);  
        var nazwaFirmy = input.val().length;

        if(nazwaFirmy>0) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Pole jest puste");	

        }
    });

    $('#regon').blur(function(){
        var input = $(this);  
        var regon = input.val();
        var onlyDigits = /^[0-9]{9}$/;
        
        if(onlyDigits.test(regon)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });

    $('#nip').blur(function(){
        var input = $(this);  
        var nip = input.val();  
        var onlyDigits = /^[0-9]{10}$/;
        
        if(onlyDigits.test(nip)) { 
            input.removeClass("invalid").addClass("valid");
            input.removeClass("border border-danger").addClass("border border-success");    
            input.next('.komunikat').text("");	   
        }
        else{
            input.removeClass("valid").addClass("invalid");
            input.removeClass("border border-success").addClass("border border-danger");
            input.next('.komunikat').text("Niepoprawane dane");	
        }  
    });

   




 //Zmiana hasła uzytkownika
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
//Zmiana danych użytkownika
$("#changePersonalData").click(function() {
    $(".alert-success").html("");
    $(".alert-error").html("");
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").html('');
    $(".alert").fadeIn();

    var data = $(".ChangePersonalDataForm").serialize();
    var request;
    var validated=validate();
    if(validated==true){
    request = $.ajax({
        url: "./php/userChangePersonalData.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response == "Pomyślnie zmieniono dane"){
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
}
else
{
    $(".alert").addClass("alert-danger");
    $(".alert-success").fadeOut(3000);
    $(".alert").text("Wprowadź poprawne dane");	
}
    
    });

//Zmiana maila
$("#changeMail").click(function() {
    $(".alert-success").html("");
    $(".alert-error").html("");
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").html('');
    $(".alert").fadeIn();

    var data = $(".changeMailForm").serialize();
    var request;

    request = $.ajax({
        url: "./php/userChangeMail.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response == "Pomyślnie wysłano maila"){
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

$("#goMainPage").click(function() {

    window.location.href = "http://car4you.net.pl";
    });

});

});
function validate(){
    var imie= $('#imie');
    var nazwisko = $('#nazwisko');
    var nr_kom= $('#nr_kom');
    var nr_tel = $('#nr_tel');
    var fax = $('#fax');
    var www = $('#www');
    var miejscowosc = $('#miejscowosc');
    var kod_pocztowy= $('#kod_pocztowy');
    var ulica = $('#ulica');
    var nr_domu = $('#nr_domu');
    var nazwa_firmy= $('#nazwa_firmy');
    var regon = $('#regon');
    var nip = $('#nip');


    if( imie.hasClass('valid') && nazwisko.hasClass('valid') && nr_kom.hasClass('valid') && nr_tel.hasClass('valid') && 
        fax.hasClass('valid') && www.hasClass('valid') && miejscowosc.hasClass('valid') && 
        kod_pocztowy.hasClass('valid') && ulica.hasClass('valid') && 
        nr_domu.hasClass('valid') && nazwa_firmy.hasClass('valid') &&  regon.hasClass('valid') && nip.hasClass('valid'))
    {
        return true;
    }
    else{
        return false;
    }
}


