<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="./js/register.js"></script>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 p-0">
            <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo" style="width: 200px;"></a>
            <img src="../images/register-women1-background.eps" class="img-fluid d-none d-lg-block" alt="women-standing-background">
            <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
        </div>
        <div class="col-md p-5 text-light" style="background-color: #BACC60;">
            <div>
                <h1>Jesteś nowy? Zarejestruj się już teraz.</h1>
                <form>
                    <div class="form-group">
                        <label for="inputEmail1">Email</label>
                        <input class="form-control" id="login" placeholder="Wprowadź login">
                        <span class="komunikat"></span>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1">Login</label>
                        <input type="email" class="form-control" id="email" placeholder="Wprowadź adres e-mail">
                        <span class="komunikat"></span>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword1">Hasło</label>
                        <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="haslo1" placeholder="Wprowadź hasło">
                        <span class="komunikat"></span>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Powtórz hasło</label>
                        <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="haslo2">
                        <span class="komunikat"></span>
                      </div>
                    </div>
                    <div class="form-group">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Twoje hasło musi mieć 8-20 znaków, zzawierać litery and cyfry, i nie może zawierać spacji, specjalnych znaków lub emoji.
                        </small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName1">Imię</label>
                            <input type="text" class="form-control" id="imie" placeholder="Imię">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName1">Nazwisko</label>
                            <input type="text" class="form-control" id="nazwisko" placeholder="Nazwisko">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                        <label for="inputAddress1">Ulica</label>
                        <input type="text" class="form-control" id="ulica" placeholder="ul. Przykładowa">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress2">Numer domu</label>
                            <input type="text" class="form-control" id="nr_domu">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Miasto</label>
                        <input type="text" class="form-control" id="miejscowosc">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Województwo</label>
                        <select id="inputState" class="form-control">
                          <option selected>Wybierz...</option>
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
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Kod poczt.</label>
                        <input type="text" class="form-control" id="kodPocztowy">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhoneNumber">Numer komórkowy</label>
                            <input type="tel" class="form-control" id="nrKom" placeholder="123456789">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelNumber">Numer telefonu</label>
                            <input type="tel" class="form-control" id="nrTel" placeholder="123456789">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputFax">Fax</label>
                            <input type="tel" class="form-control" id="fax" placeholder="123456789">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWebsite">Strona internetowa</label>
                        <input type="url" class="form-control" id="stronaInternetowa" placeholder="http://www.mojastrona.pl/">
                    </div>
                    <div class="form-group">
                        <label for="inputAdditionalInformation">Dodatkowe informacje</label>
                        <textarea class="form-control" id="dodatkoweInformacje" rows="3"></textarea>
                    </div>
                    <h5><label>Dane firmowe:</label></h5>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="czyFirma">
                            <label class="form-check-label" for="checkCompany">Zaznacz, jeśli jesteś klientem firmowym</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCompanyName">Nazwa firmy</label>
                        <input type="text" class="form-control" id="nazwaFirmy" placeholder="Nazwa firmy">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputRegon">Regon</label>
                            <input type="text" class="form-control" id="regon" disabled="disabled">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNIP">NIP</label>
                            <input type="text" class="form-control" id="nip" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                          <label class="form-check-label" for="invalidCheck2">
                            Zgadzam się z regulaminem
                          </label>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Zarejestruj się</button>
                  </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>