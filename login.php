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
    <title>Document</title>
</head>
<body>
    <form class="loginForm">
        <input type="text" id="login" name="login" placeholder="Login"/>
        <input type="password" id="haslo" name="haslo" placeholder="Hasło"/>
        <button id="zaloguj" type="button">Zaloguj</button>
    </form>
</body>
</html>