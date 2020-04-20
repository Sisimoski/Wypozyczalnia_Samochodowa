<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: /index.php");
    }

    if(isset($_SESSION["rodzaj_pracownika"])){
        if($_SESSION["rodzaj_pracownika"] != 1 && $_SESSION["rodzaj_pracownika"] != 2)
          header("Location: ../index.php");
    }
    else{
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Panel klienta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/dashboardstyles.css">

    <!-- Deafult Bootstrap theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Flatly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yrfSO0DBjS56u5M+SjWTyAHujrkiYVtRYh2dtB3yLQtUz3bodOeialO59u5lUCFF" crossorigin="anonymous"> -->
    <!-- Darkly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rCA2D+D9QXuP2TomtQwd+uP50EHjpafN+wruul0sXZzX/Da7Txn4tB9aLMZV4DZm" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="../js/index.js"></script>
    <script src="js/employeeModules.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="/images/Car4You-line-logo.png" height="50" alt="car4you logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary mr-sm-2'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary my-2 my-sm-0'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_klienta'])){
                    if($_SESSION['rodzaj_klienta'] == 1 || $_SESSION['rodzaj_klienta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                        
                }
                if(isset($_SESSION['rodzaj_pracownika'])){                   
                        echo "<button id='panelPracownika' type='submit' class='btn btn-primary'>Panel Pracownika</button>"; 
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>
    <div class="container-fluid">
<!-- ALERT -->
    <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>

<!-- Modal usuwanie konta -->
    <div class="modal fade" id="usunKontoModal" tabindex="-1" role="dialog" aria-labelledby="usunKontoLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="usunKontoLabel">Usuwanie Konta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Po kliknięciu przycisku "Usuń Konto" wszystkie dane użytkownika zostną usunięte.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="button" id="usunKontoButton" value="" class="btn btn-danger">Usuń Konto</button>
                    </div>
                </div>
            </div>
        </div>

<!-- Modal edycja konta -->
        <div class="modal fade" id="edytujKontoModal" tabindex="-1" role="dialog" aria-labelledby="edytujKontoLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edytujKontoLabel">Edytowanie Pracownika</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="pracownikEditForm">
                            <div class="form-group">
                                <input type="text" name="imie" id="imieEdit" placeholder="Imie" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nazwisko" id="nazwiskoEdit" placeholder="Nazwisko" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" id="cityEdit" placeholder="Miasto" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputStateEdit">Województwo</label>
                                <select id="inputStateEdit" class="form-control" name="wojewodztwo">
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
                            <div class="form-group">
                                <input type="text" name="ulica" id="ulicaEdit" placeholder="Ulica" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nr_domu" id="numerDomuEdit" placeholder="Numer Domu" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="kod" id="kodEdit" placeholder="Kod Pocztowy" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefon" id="telefonEdit" placeholder="Numer Telefonu" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="komorka" id="komorkaEdit" placeholder="Numer Komórkowy" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="fax" id="faxEdit" placeholder="Fax" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="www" id="wwwEdit" placeholder="Adres www" />
                            </div>
                            <div class="form-group">
                                <input type="date" name="data_zwolnienia" id="dataZwolnieniaEdit" placeholder="Data Zwolnienia"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputRoleEdit">Rodzaj Konta</label>
                                <select id="inputRoleEdit" class="form-control" name="rodzajPracownika">
                                    <option value="1">Pracownik</option>
                                    <option value="2">Administrator</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputActivationEdit">Aktywacja Konta</label>
                                <select id="inputActivationEdit" class="form-control" name="aktywacjaPracownika">
                                    <option value="0">Nieaktywowany</option>
                                    <option value="1">Aktywowany</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="button" id="edytujKontoButton" value="" class="btn btn-success">Zapisz
                            Zmiany</button>
                    </div>

                </div>
            </div>
        </div>

<!-- SideBar -->       
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">

                    <!-- Default collapse  -->
                    <ul class="list-group">
                        <div>
                            <a data-toggle="collapse" href="#default"
                                class="list-group-item list-group-item-action list-group-item-dark">Default</a>
                        </div>
                        <div class="collapse" id="default">
                            <a href="#" class="list-group-item list-group-item-action">Default menu 1</a>
                            <a href="#" class="list-group-item list-group-item-action">Default menu 2</a>
                        </div>
                    </ul>
                    <!-- End of default collapse -->
                    <ul class="list-group">
                        <div>
                            <a data-toggle="collapse" href="#mojprofil"
                                class="list-group-item list-group-item-action list-group-item-primary">Mój profil</a>
                        </div>
                        <div class="collapse" id="mojprofil">
                            <a href="zmianadanychosobowych.php" class="list-group-item list-group-item-action">Zmiana danych osobowych</a>
                            <a href="zmianahasla.php" class="list-group-item list-group-item-action">Zmiana hasła</a>
                            <a href="zmianamaila.php" class="list-group-item list-group-item-action">Zmiana maila</a>
                        </div>
                    </ul>
                    <ul class="list-group">
                        <div>
                            <a data-toggle="collapse" href="#samochody"
                                class="list-group-item list-group-item-action list-group-item-primary">Samochody</a>
                        </div>
                        <div class="collapse" id="samochody">
                            <a href="dodawaniesamochodow.php" class="list-group-item list-group-item-action">Dodaj samochód</a>
                            <a href="statussamochodow.php" class="list-group-item list-group-item-action">Status samochodów</a>
                        </div>
                    </ul>
                    <?php
                        if(isset($_SESSION['rodzaj_pracownika'])){
                            

                            // Puste pole w echo na moduły pracownika
                            echo '
                                <ul class="list-group">
                                    <div>
                                        <a data-toggle="collapse" href="#employeePanel"
                                            class="list-group-item list-group-item-action list-group-item-primary">Panel Pracownika</a>
                                    </div>
                                    <div class="collapse" id="employeePanel">
                                    <a href="employeeCars.php" class="list-group-item list-group-item-action">Pojazdy</a>
                                    <a href="employeeNewsletter.php" class="list-group-item list-group-item-action">Newsletter</a>
                                    
                                    
                                    
                                    ';

                            if($_SESSION['rodzaj_pracownika'] == 2){
                                echo'
                                        <a href="employees.php" class="list-group-item list-group-item-action">Pracownicy</a>
                                        
                                ';
                            }
                            echo '</div></ul>';
                        }

                    ?>
            </nav>

<!-- Content -->
<!-- Dodawanie Pracowników in progress
                        
<form class="rejestracjaPracownika">
            <input type="text" name="imie" id="imie" placeholder="Imie" />
            <input type="text" name="nazwisko" id="nazwisko" placeholder="Nazwisko" />
            <input type="text" name="city" id="city" placeholder="Miasto" />
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
            <input type="text" name="login" id="login" placeholder="Login" />
            <input type="password" name="haslo" id="haslo" placeholder="Haslo" />
            <input type="text" name="ulica" id="ulica" placeholder="Ulica" />
            <input type="text" name="nr_domu" id="numerDomu" placeholder="Numer Domu" />
            <input type="text" name="kod" id="kod" placeholder="Kod Pocztowy" />
            <input type="text" name="dodatkowe" id="dodatkowe" placeholder="Dodatkowe Informacje o Pracowniku" />
            <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin" />
            <input type="text" name="email" id="email" placeholder="email" />
            <input type="text" name="email_pracowniczy" id="email_pracowniczy" placeholder="Email Pracowniczy" />
            <input type="text" name="telefon" id="telefon" placeholder="Numer Telefonu" />
            <input type="text" name="komorka" id="komorka" placeholder="Numer Komórkowy" />
            <input type="text" name="fax" id="fax" placeholder="Fax" />
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
 -->




            <div class="col-md-9 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:1030">          
                        <nav class="position-fixed breadcrumbStyleFixed"  aria-label="breadcrumb" style="width:100%">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                            </ol>
                        </nav>       
                </div>
                <div class="row justify-content-center" style="margin-top:50px">  
                    <div class="tabelaPracownicyHead">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imie</th>
                                    <th scope="col">Nazwisko</th>
                                    <th scope="col">Data Zatrudnienia</th>
                                    <th scope="col">Data Zwolnienia</th>
                                    <th scope="col">Status Aktywacji</th>
                                    <th scope="col">Funkcje</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaPracownicy">

                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>

    <script>
        zaladujPracownikow();
    </script>
</body>

</html>