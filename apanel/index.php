<!-- Index file for Admin Panel -->

<?php
    session_start();
    if(isset($_SESSION["rodzaj_pracownika"])){
        if($_SESSION["rodzaj_pracownika"] != 2){
            header("Location: ../index.php");
        }
    }
    else{
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <script src="js/index.js"></script>
    <title>Panel Administratora</title>
</head>
<body>
    <div class=container-fluid>

<!-- 
           
           Jak będziecie robić to polecam
           
        Menu góra :
        https://getbootstrap.com/docs/4.4/components/navbar/
        https://getbootstrap.com/docs/4.4/components/navs/
        

        Dobre jako side menu Fajnie by to wyglądało:
        https://getbootstrap.com/docs/4.4/components/collapse/


        Tagi każdej zakładki : 
        https://getbootstrap.com/docs/4.4/components/breadcrumb/


        -->

    <!-- Statusy Pojazdów -->
        <form class="statusPojazdowDane">
            <input class="form-control" type="date" id="dataOd" name="dataOd" placeholder="Data Wynajmu Od"/>
            <input class="form-control" type="date" id="dataDo" name="dataDo" placeholder="Data Wynajmu Do" />
            <button type="button" id="zaladujStatus" class="btn btn-primary">Status Pojadów</button>
        </form> 
        <div class="statusContent">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imie</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Pojazd</th>
                    <th scope="col">Status Przyjecia</th>
                    <th scope="col">Status Płatności</th>
                    <th scope="col">Status Realizacji</th>
                  </tr>
                </thead>
                <tbody id="tabelaStatus">
                </tbody>
              </table>
              <div id="alert"></div>

        </div>
    
    DODAWANIE PRACOWNIKA
         <form class="rejestracjaPracownika">
        <input type="text" name="imie" id="imie" placeholder="Imie"/>
        <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko"/>
        <input type="text" name="city" id="city" placeholder="Miasto"/>
        <div class="form-group col-md-4">
            <label for="inputState">Województwo</label>
            <select id="inputState" class="form-control" name="wojewodztwo">
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
        <input type="text" name="login" id="login" placeholder="Login"/>
        <input type="password" name="haslo" id="haslo" placeholder="Haslo"/>
        <input type="text" name="ulica" id="ulica" placeholder="Ulica"/>
        <input type="text" name="nr_domu" id="numerDomu" placeholder="Numer Domu"/>
        <input type="text" name="kod" id="kod" placeholder="Kod Pocztowy"/>
        <input type="text" name="dodatkowe" id="dodatkowe" placeholder="Dodatkowe Informacje o Pracowniku"/>
        <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin"/>
        <input type="text" name="email" id="email" placeholder="email"/>
        <input type="text" name="email_pracowniczy" id="email_pracowniczy" placeholder="Email Pracowniczy"/>
        <input type="text" name="telefon" id="telefon" placeholder="Numer Telefonu"/>
        <input type="text" name="komorka" id="komorka" placeholder="Numer Komórkowy"/>
        <input type="text" name="fax" id="fax" placeholder="Fax"/>
        <input type="text" name="www" id="www" placeholder="Adres www" />
        
        <div class="form-group col-md-4">
            <label for="inputRole">Rodzaj Konta</label>
            <select id="inputRole" class="form-control" name="rodzajPracownika">
              <option value="1">Pracownik</option>
              <option value="2">Administrator</option>
            </select>
          </div>
          <button type="button" id="zarejestrujPracownika">Zarejestruj</button>
    </form>
       




    </div>  
</body>
</html>