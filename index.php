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
        <a class="cta" href="login.php"><button>Zaloguj się</button></a>
        <a class="cta" href="#"><button>Zarejestruj się</button></a>
    </header>
</body>
</html>