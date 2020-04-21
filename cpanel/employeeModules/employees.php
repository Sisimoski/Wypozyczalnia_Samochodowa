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

    
    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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
    <script src="/cpanel/js/logout.js"></script>
    <script src="js/employeeModules.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("../headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
<!-- ALERT -->
    <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
<!-- Modal dodawanie konta -->
<div class="modal fade" id="dodajKontoModal" tabindex="-1" role="dialog" aria-labelledby="dodajKontoLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dodajKontoLabel">Tworzenie Konta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="pracownikAddForm">
                            <div class="form-group">
                                <input type="text" name="login" id="loginAdd" placeholder="Login" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="haslo" id="hasloAdd" placeholder="Hasło" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="imie" id="imieAdd" placeholder="Imie" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nazwisko" id="nazwiskoAdd" placeholder="Nazwisko" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" id="emailAdd" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="email_pracowniczy" id="email_pracowniczyAdd" placeholder="Email Pracowniczy" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" id="cityAdd" placeholder="Miasto" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputStateAdd">Województwo</label>
                                <select id="inputStateAdd" class="form-control" name="wojewodztwo">
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
                                <input type="text" name="ulica" id="ulicaAdd" placeholder="Ulica" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="nr_domu" id="numerDomuAdd" placeholder="Numer Domu" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="kod" id="kodAdd" placeholder="Kod Pocztowy" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefon" id="telefonAdd" placeholder="Numer Telefonu" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="komorka" id="komorkaAdd" placeholder="Numer Komórkowy" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="linkedin" id="linkedinAdd" placeholder="LinkedIn" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="dodatkowe_informacje" id="dodatkowe_informacjeAdd" placeholder="Dodatkowe Informacje" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputRoleAdd">Rodzaj Konta</label>
                                <select id="inputRoleAdd" class="form-control" name="rodzajPracownika">
                                    <option value="1">Pracownik</option>
                                    <option value="2">Administrator</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputActivationAdd">Aktywacja Konta</label>
                                <select id="inputActivationAdd" class="form-control" name="aktywacjaPracownika">
                                    <option value="0">Nieaktywowany</option>
                                    <option value="1">Aktywowany</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="button" id="dodajKontoButton" class="btn btn-primary">Utwórz Konto</button>
                    </div>
                </div>
            </div>
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
                                <input type="text" name="email" id="emailEdit" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="email_pracowniczy" id="email_pracowniczyEdit" placeholder="Email Pracowniczy" />
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
                                <input type="text" name="linkedin" id="linkedinEdit" placeholder="LinkedIn" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="dodatkowe_informacje" id="dodatkowe_informacjeEdit" placeholder="Dodatkowe Informacje" />
                            </div>
                            <div class="form-group">
                                <input type="date" name="data_zatrudnienia" id="dataZatrudnieniaEdit" placeholder="Data Zatrudnienia"/>
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
                    <?php
                        include("../sidebarContent.php");
                    ?>
                </div>
            </nav>

<!-- Content -->

            <div class="col-md-9 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:1030">          
                        <nav class="position-fixed breadcrumbStyleFixed"  aria-label="breadcrumb" style="width:100%">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                            </ol>
                        </nav>       
                </div>
                <div class="row justify-content-center" style="margin-top:50px"> 
                <button type='button' class='btn btn-success' id='dodajKontoButton' data-toggle='modal' data-target='#dodajKontoModal'>Dodawanie Konta</button > 
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