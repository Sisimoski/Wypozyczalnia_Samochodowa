<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Kontakt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>

    <script src="./js/recovery.js"></script>
    <script src="./js/index.js"></script>
</head>


<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
                <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary ml-2'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_konta'])){
                    if($_SESSION['rodzaj_konta'] == 1 || $_SESSION['rodzaj_konta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>
<section>

    <label>
        Wprowadź swoje nowe hasło.
    </label>
    <form class="newPswdForm" type="POST">
            <div class="form-group">
              <label for="newPswd">Hasło</label>
              <input type="password" name="newPswd" class="form-control" id="newPswd">
              <div class="komunikat"></div>
                <div class="form-group col-xs-auto">
                    <button id="newPswdButton" class="btn btn-primary"  type="button">Zatwierdź</button>
                </div>
            </div>
    </form>
</section>


   
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>

    
<script>
checkHash();
</script>
</body>

</html>