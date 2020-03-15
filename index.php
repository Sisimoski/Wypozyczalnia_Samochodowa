<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
    <title>Car4You - wypożyczalnia samochodów</title>
</head>
<body>
    <header>
        <img class="logo" src="images/logo.svg" alt="Car4You Logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Strona domowa</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </nav>
        <?php
            if(!isset($_SESSION['id'])){
            echo "<a class='cta' href='login.php'><button>Zaloguj się</button></a>";
            echo "<a class='cta' href='#'><button>Zarejestruj się</button></a>" ;
            }
            else{
                if($_SESSION['rodzaj_klienta'] == 1){
                    echo "<a class='cta' href='./cpanel/index.php'><button>Panel Klienta</button></a>";
                }
                if($_SESSION['rodzaj_klienta'] == 2){
                    echo "<a class='cta' href='./apanel/index.php'><button>Panel Administratora</button></a>"; 
                }
                echo "<a class='cta'><button id='wyloguj'>Wyloguj</button></a>";
            }
        ?>
    </header>
</body>
</html>