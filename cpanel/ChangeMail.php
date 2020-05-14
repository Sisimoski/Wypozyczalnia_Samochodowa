<?php
    $hash=$_GET["hash"];
    echo $hash;
    include "php/userChangeMailPart2.php"; 
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Zmiana adresu email</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/jpg" href="favicon.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

    <!-- Custom CSS Files -->
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/logowanie.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="./js/changeData.js"></script>
</head>

<body>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>

        <div class="row" style="height: 100%;">
            <div class="col-lg-6 p-0">
                <a href="index.php"><img src="/images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo"
                        style="width: 200px;"></a>
                <img src="/images/bg/login-man1-background.png" class="img-fluid d-none d-lg-block"
                    alt="man-standing-background">
                <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
            </div>
            <div class="col-md p-5 text-light" style="background-color: #8AC2F6;">
                <div>
                    <h1>Pomyślnie zmieniono maila.</h1>
                    <div class="my-4">
                        <button class="btn btn-primary" id="goMainPage" name="goMainPage" type="button">Wróć na
                            stronę główną</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>