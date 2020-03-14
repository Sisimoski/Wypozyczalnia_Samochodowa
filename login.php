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
    <form>
        <input type="text" id="email" placeholder="email"/>
        <input type="password" id="password" placeholder="Hasło"/>
        <button type="button">Zaloguj</button>
    </form>
</body>
</html>