<?php
    if(isset($_SESSION['id'])){
        header("Location: ../index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/register.js"></script>
    <title>Document</title>
</head>
<body>
    
    <form class="signupForm" method="POST" action="">
        <b><label>Rejestracja w serwisie Car4Rent</label></b>
        <div class="field">
            <label>Login:</label>
            <input type="text" name="login" id="login">
             <span class="komunikat"></span> 
        </div>

        <div class="field">
            <label>Hasło:</label>
            <input type="password" name="haslo1" id="haslo1">
            <span class="komunikat"></span>
        </div>

        <div class="field">
            <label>Powtórz hasło:</label>
            <input type="password" name="haslo2" id="haslo2">
            <span class="komunikat"></span>
        </div>
        <b><label>Dane kontaktowe:</label></b>
        <div class="field">
            <label>Imie</label>
            <input type="text" name="imie" id="imie">
            <span class="komunikat"></span>
        </div>
        <div class="field">
            <label>Nazwisko</label>
            <input type="text" name="nazwisko" id="nazwisko">
            <span class="komunikat"></span>
        </div>
        <div class="field">
            <label>Nr komórkowy</label>
            <input type="text" name="nrKom" id="nrKom"> 
            <span class="komunikat"></span>
        </div>
        <div class="field">
            <label>Nr telefonu</label>
            <input type="text" name="nrTel" id="nrTel">
            <span class="komunikat"></span>
        </div>
        <div class="field">
            <label>Fax</label>
            <input type="text" name="fax" id="fax">
        </div>
        <div class="field">
            <label>Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="field">
            <label>Strona internetowa</label>
            <input type="text" name="stronaInternetowa" id="stronaInternetowa">
        </div>
        <b><label>Adres:</label></b>
        <div class="field">
            <label>Miejscowość</label>
            <input type="text" name="miejscowosc" id="miejscowosc">
        </div>
        <div class="field">
            <label>Województwo:</label>
            <input type="text" name="wojewodztwo" id="wojewodztwo">
        </div>
        <div class="field">
            <label>Kod pocztowy:</label>
            <input type="text" name="kodPocztowy" id="kodPocztowy">
        </div>
        <div class="field">
            <label>Ulica:</label>
            <input type="text" name="ulica" id="ulica ">
        </div>
        <div class="field">
            <label>Nr Domu:</label>
            <input type="text" name="nr_domu" id="nr_domu">
        </div>
        <div class="field">
            <label>Dodatkowe informacje</label>
            <input type="text" name="dodatkoweInformacje" id="dodatkowe informacje">
        </div>
        <b><label>Dane firmowe</label></b>
        <div class="field">
            <label>Zaznacz jeśli jesteś klientem firmowym</label>
            <input type="checkbox" name="czyFirma" id="czyFirma">
        </div>
        <div class="field">
            <label>Nazwa firmy</label>
            <input type="text" name="nazwaFirmy" id="nazwaFirmy">
        </div>
        <div class="field">
            <label>Regon</label>
            <input type="text" name="regon" id="regon">
        </div>
        <div class="field">
            <label>NIP</label>
            <input type="text" name="nip" id="nip">
        </div>   
        <div>
        <input id="zarejestruj" type="button" name="zarejestruj" value="Utwórz konto">
        </div>
    </form>
    <div class="alert"></div>
</body>
</html>