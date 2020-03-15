<?php
session_start();

if(isset($_SESSION['id'])){
    header("Location: ../index.php");
    }


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/login.js"></script>
    <title>Document</title>
</head>
<body>
    <form class="loginForm">
        <input type="text" id="login" name="login" placeholder="Login"/>
        <input type="password" id="haslo" name="haslo" placeholder="Hasło"/>
        <button id="zaloguj" type="button">Zaloguj</button>
    </form>
    <div class="alert"></div>
</body>
</html>