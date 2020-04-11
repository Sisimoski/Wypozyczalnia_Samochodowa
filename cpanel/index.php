<!-- Index file for Client pannel 
W divach "komunikat" musi być miejsce na wyświetlanie tekstu do walidacji jak w rejestracji.
W spanach są umieszczone nazwy zakładek do menu z lewej strony.
Opis samochodu fajnie żeby miał większe okno.
Przy VIN i NR tablicy można by było zrobić dymek z informacja dalczego o to pytamy(dla bezpeiczensta,ubezpeiczenai itd.)
Przejście do edycji samochodu ma być w statusie nie róbcie go w menu(tylko front niego).
-->
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
    <script src="./js/carManagement.js"></script>
    </head>
<body>

<div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
<span><b>Zmiana hasła</b></span>
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
            <button class="btn btn-primary" id="changePassword" name="changePassword" type="button">Zatwierdź zmianę</button>
        </div>
    </form>
    <span><b>Zmiana danych osobowych</b></span>
    <form class="ChangePersonalDataForm mt-3" method="POST">

        <div>
            <label for="imie">Imie</label>
            <input id="imie" name="imie">
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

    <form class="changeMailForm" method="POST">
    <span><b>Zmiana maila</b></span>
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
    <form class="addCarForm mt-3" method="POST">
    <span><b>Dodawanie samochodu</b></span>
        <div>
            <label for="producent">Producennt</label>
            <input id="producent" name="producent"  placeholder="np. Audi">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="model">Model</label>
            <input id="model" name="model"placeholder="np. RS5">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="rok_produkcji">Rok produkcji</label>
            <input id="rok_produkcji" type="number" min="1960" max="2020" step="1" name="rok_produkcji "placeholder="np. 1995" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="kolor">Kolor</label>
            <input id="kolor" type="input" name="kolor "placeholder="czerwony" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="opis">Opis</label>
            <input id="opis" type="input" name="opis" placeholder="czerwony" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="cena">Cena wypożyczenia na jeden dzień</label>
            <input id="cena" type="input" name="cena" placeholder="np. 200zł" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="">VIN</label>
            <input id="vin" type="input" name="vin" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="">Nr tablicy rejestracyjnej</label>
            <input id="nr_tablicy" type="input" name="nr_tablicy" placeholder="OK 99999" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="zdjecie">Dodaj zdjęcie</label>
            <input id="zdjecie" type="file" name="zdjecie">
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="addCar" name="addCar" type="button">Dodaj samochód</button>
        </div>
        </form>
        <!-- edycja samochodu -->
        <form class="editCarForm mt-3" method="POST">
        <span><b>Edycja samochodu</b></span>
        <div>
            <label for="producentEdit">Producent</label>
            <input id="producentEdit" name="producentEdit"  placeholder="np. Audi">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="modelEdit">Model</label>
            <input id="modelEdit" name="modelEdit" placeholder="np. RS5">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="rok_produkcjiEdit">Rok produkcji</label>
            <input id="rok_produkcjiEdit" type="number" min="1960" max="2020" step="1" name="rok_produkcjiEdit"placeholder="np. 1995" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="kolorEdit">Kolor</label>
            <input id="kolorEdit" type="input" name="kolorEdit"placeholder="czerwony" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="opisEdit">Opis</label>
            <input id="opisEdit" type="input" name="opisEdit" placeholder="czerwony" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="cenaEdit">Cena wypożyczenia na jeden dzień</label>
            <input id="cenaEdit" type="input" name="cenaEdit" placeholder="np. 200zł" >
            <div class="komunikat"> </div>
        </div>

        <div>
            <label for="zdjecieEdit">Zmień zdjęcie</label>
            <input id="zdjecieEdit" type="file" name="zdjecieEdit">
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="changeMail" name="changePassword" type="button">Zatwierdź zmianę</button>
        </div>
    </form>
    <label><b>Status samochodów</b></label>
    <div class="tabelaPracownicyHead">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Nr wypożyczenia</th>
                    <th scope="col">Status</th>
                    <th scope="col">Funkcje</th>
                  </tr>
                </thead>
                <tbody id="tabelaPracownicy">
                  
                </tbody>
              </table>
              <div id="alert"></div>
        </div>


</body>