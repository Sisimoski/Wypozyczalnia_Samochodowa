<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Zmiana danych osobowych</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/changeData.js"></script>
</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                <?php
                        include("sidebarContent.php");
                    ?>
                </div>
            </nav>

            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                            <li class="breadcrumb-item active">Mój profil</li>
                            <li class="breadcrumb-item active" aria-current="page">Zmiana danych osobowych</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>Zmiana danych osobowych</h1>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form class="ChangePersonalDataForm" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="imie">Imie</label>
                                            <input id="imie" class="form-control" name="imie">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nazwisko">Nazwisko</label>
                                            <input id="nazwisko" class="form-control" name="nazwisko">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="ulica">Ulica</label>
                                            <input id="ulica" class="form-control" name="ulica">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="nr_domu">Nr domu</label>
                                            <input id="nr_domu" class="form-control" name="nr_domu">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="miejscowosc">Miejsowość</label>
                                            <input id="miejscowosc" class="form-control" name="miejscowosc">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-4">
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
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="kod_pocztowy">Kod pocztowy</label>
                                            <input id="kod_pocztowy" class="form-control" name="kod_pocztowy">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nr_kom">Nr kom.</label>
                                            <input id="nr_kom" class="form-control" name="nr_kom">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nr_tel">Nr tel.</label>
                                            <input id="nr_tel" class="form-control" name="nr_tel">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="fax">Fax</label>
                                            <input id="fax" class="form-control" name="fax">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dodatkowe_informacje">Dodatkowe informacje</label>
                                        <textarea id="dodatkowe_informacje" class="form-control" rows="4"
                                            name="dodatkowe_informacje"></textarea>
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="www">Strona internetowa</label>
                                        <input id="www" class="form-control" name="www">
                                        <div class="komunikat"> </div>
                                    </div>
                                    <h5><label>Dane firmowe:</label></h5>
                                    <div class="form-group">
                                        <label for="nazwa_firmy" id="nazwa_firmy_label">Nazwa firmy</label>
                                        <input id="nazwa_firmy" class="form-control" name="nazwa_firmy">
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="regon" id="regon_label">Regon</label>
                                            <input id="regon" class="form-control" name="regon">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nip" id="nip_label">Nip</label>
                                            <input id="nip" class="form-control" name="nip">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="komunikat"> </div>
                                        <button class="btn btn-primary" id="changePersonalData"
                                            name="changePersonalData" type="button">Zatwierdź dane</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    loadUserInfo();
    </script>
</body>

</html>