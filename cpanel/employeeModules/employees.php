<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: /index.php");
    }

    if(isset($_SESSION["rodzaj_konta"])){
        if($_SESSION["rodzaj_konta"] != 3 && $_SESSION["rodzaj_konta"] != 4)
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

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="../js/collapse.js"></script>
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
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Imię:</label>
                                <input class="form-control" type="text" name="imie" id="imieAdd" placeholder=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nazwisko:</label>
                                <input class="form-control" type="text" name="nazwisko" id="nazwiskoAdd" placeholder=""/>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="">Adres e-mail:</label>
                                <input class="form-control" type="text" name="email" id="emailAdd" placeholder=""/>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Miasto:</label>
                                    <input class="form-control" type="text" name="city" id="cityAdd" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ulica:</label>
                                    <input class="form-control" type="text" name="ulica" id="ulicaAdd" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStateAdd">Województwo:</label>
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Numer domu:</label>
                                    <input class="form-control" type="text" name="nr_domu" id="numerDomuAdd" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Kod pocztowy:</label>
                                    <input class="form-control" type="text" name="kod" id="kodAdd" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Numer telefonowy:</label>
                                    <input class="form-control" type="text" name="telefon" id="telefonAdd" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Numer komórkowy:</label>
                                    <input class="form-control" type="text" name="komorka" id="komorkaAdd" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Dodatkowe informacje:</label>
                                <textarea class="form-control" type="text" name="dodatkowe_informacje" id="dodatkowe_informacjeAdd"
                                    placeholder=""></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Data zatrudnienia:</label>
                                    <input class="form-control" type="date" name="data_zatrudnienia" id="dataZatrudnieniaAdd"
                                        placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Data zwolnienia:</label>
                                    <input class="form-control" type="date" name="data_zwolnienia" id="dataZwolnieniaAdd"
                                        placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRoleAdd">Rodzaj Konta:</label>
                                <select id="inputRoleAdd" class="form-control" name="rodzajPracownika">
                                    <option value="3">Pracownik</option>
                                    <option value="4">Administrator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputActivationAdd">Aktywacja Konta:</label>
                                <select id="inputActivationAdd" class="form-control" name="aktywacjaPracownika">
                                    <option value="0">Nieaktywowany</option>
                                    <option value="1">Aktywowany</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                        <button type="button" id="dodajKontoButton" class="btn btn-success">Utwórz Konto</button>
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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Imię:</label>
                                <input class="form-control" type="text" name="imie" id="imieEdit" placeholder=""/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nazwisko:</label>
                                <input class="form-control" type="text" name="nazwisko" id="nazwiskoEdit" placeholder=""/>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="">Adres e-mail:</label>
                                <input class="form-control" type="text" name="email" id="emailEdit" placeholder=""/>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Miasto:</label>
                                    <input class="form-control" type="text" name="city" id="cityEdit" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Ulica:</label>
                                    <input class="form-control" type="text" name="ulica" id="ulicaEdit" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStateEdit">Województwo:</label>
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Numer domu:</label>
                                    <input class="form-control" type="text" name="nr_domu" id="numerDomuEdit" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Kod pocztowy:</label>
                                    <input class="form-control" type="text" name="kod" id="kodEdit" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Numer telefonowy:</label>
                                    <input class="form-control" type="text" name="telefon" id="telefonEdit" placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Numer komórkowy:</label>
                                    <input class="form-control" type="text" name="komorka" id="komorkaEdit" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Dodatkowe informacje:</label>
                                <textarea class="form-control" type="text" name="dodatkowe_informacje" id="dodatkowe_informacjeEdit"
                                    placeholder=""></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Data zatrudnienia:</label>
                                    <input class="form-control" type="date" name="data_zatrudnienia" id="dataZatrudnieniaEdit"
                                        placeholder=""/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Data zwolnienia:</label>
                                    <input class="form-control" type="date" name="data_zwolnienia" id="dataZwolnieniaEdit"
                                        placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRoleEdit">Rodzaj Konta:</label>
                                <select id="inputRoleEdit" class="form-control" name="rodzajPracownika">
                                    <option value="3">Pracownik</option>
                                    <option value="4">Administrator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputActivationEdit">Aktywacja Konta:</label>
                                <select id="inputActivationEdit" class="form-control" name="aktywacjaPracownika">
                                    <option value="0">Nieaktywowany</option>
                                    <option value="1">Aktywowany</option>
                                </select>
                            </div>
                        </div>
                    </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                            <button type="button" id="edytujKontoButton" value="" class="btn btn-primary">Zapisz
                                Zmiany</button>
                            </div>
                </div>
            </div>
        </div>

        <!-- SideBar -->
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                        include("../sidebarContent.php");
                    ?>
                </div>
            </nav>

            <!-- Content -->

            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel Pracownika</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pracownicy</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Pracownicy</h1>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type='button' class='btn btn-success btn-block mb-3' id='dodajKontoButton' data-toggle='modal' data-target='#dodajKontoModal'>Dodawanie Konta</button>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Table Template -->
                                <div class="tabelaPracownicyHead table-responsive">
                                    <table class="table table-striped table-hover text-center align-items-center border">
                                        <thead class="thead-light">
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
                                        <tbody class="" id="tabelaPracownicy">
        
                                        </tbody>
                                    </table>
                                    <div id="alert"></div>
                                </div>
                                <!-- End of Table Template -->

                            </div>
                        </div>
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