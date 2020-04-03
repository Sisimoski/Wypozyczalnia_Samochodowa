<!-- Index file for Client pannel -->
<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/changeData.js"></script>
    </head>
<body>

<div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
<span>Zmianna hasła</span>
    <form class="changePasswordForm" method="POST">
        <div>
            <label for="oldPswd">Stare hasło</label>
            <input id="oldPswd" name="oldPswd" type="password" placeholder="Wprowadź dotychczasowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd">Nowe hasło</label>
            <input id="newPswd" name="newPswd" type="password" placeholder="Wprowadź nowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd1">Powtórz nowe hasło</label>
            <input id="newPswd1" name="renewPswd1" type="password" placeholder="Wprowadź ponownie nowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="changePassword" name="changePassword" type="button">Zmień hasło</button>
        </div>
    </form>

    <span>Dane osobowe</span>

    <form class="ChangePersonalDataForm mt-3" method="POST">
    <span>Zmiana danych osobowych</span>
        <div>
            <label for="imie">Imie</label>
            <input id="imie" name="imie" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nazwisko">Nazwisko</label>
            <input id="nazwisko" name="nazwisko" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="ulica">Ulica</label>
            <input id="ulica" name="ulica" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nr_domu">Nr domu</label>
            <input id="nr_domu" name="nr_domu" >
            <div class="komunikat"> </div>
        </div>
        <label for="wojewodztwo">Województwo</label>
                <select id="wojewodztwo" class="form-control" name="wojewodztwo">
                  <option value="dolnośląskie">dolnośląskie</option>
                  <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                  <option value="lubelskie">lubelskie</option>
                  <option value="lubuskie">lubuskie</option>
                  <option value="łódzkie">łódzkie</option>
                  <option value="małopolskie">małopolskie</option>
                  <option value="mazowieckie">mazowieckie</option>
                  <option value="opolskie">opolskie</option>
                  <option value="podkarpackie">podkarpackie</option>
                  <option value="podlaskie">podlaskie</option>
                  <option value="pomorskie">pomorskie</option>
                  <option value="śląskie">śląskie</option>
                  <option value="świętokrzyskie">świętokrzyskie</option>
                  <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                  <option value="wielkopolskie">wielkopolskie</option>
                  <option value="zachodniopomorskie">zachodniopomorskie</option>
                </select>
        <div>
            <label for="kod_pocztowy">Kod pocztowy</label>
            <input id="kod_pocztowy" name="kod_pocztowy" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="miejscowosc">Miejscowosc</label>
            <input id="miejscowosc" name="miejscowosc" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nr_kom">Nr kom.</label>
            <input id="nr_kom" name="nr_kom" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nr_tel">Nr tel.</label>
            <input id="nr_tel" name="nr_tel" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="fax">Fax</label>
            <input id="fax" name="fax" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="dodatkowe_informacje">Dodatkowe informacje</label>
            <input id="dodatkowe_informacje" name="dodatkowe_informacje" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="www">Strona internetowa</label>
            <input id="www" name="www" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nazwa_firmy" id="nazwa_firmy_label">Nazwa firmy</label>
            <input id="nazwa_firmy" name="nazwa_firmy" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="regon" id="regon_label">Regon</label>
            <input id="regon" name="regon" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="nip" id="nip_label">Nip</label>
            <input id="nip" name="nip" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="changePersonalData" name="changePersonalData" type="button">Zatwierdź dane</button>
        </div>
    </form> 
    <span>Zmiana maila</span>
    <form class="changeMailForm" method="POST">
        <div>
            <label for="oldMail">Aktualny adres mailowy</label>
            <input id="oldMail" name="oldMail"  placeholder="Wprowadź dotychczasowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newMail">Nowy adres mailowy</label>
            <input id="newMail" name="newMail"placeholder="Wprowadź nowe hasło">
            <div class="komunikat"> </div>
        </div>

        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="changeMail" name="changePassword" type="button">Zatwierdź zmianę</button>
        </div>
    </form>

</body>