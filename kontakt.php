<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - wypożyczalnia samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/jpg" href="favicon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/contact.js"></script>
</head>

<body>
<div class="fixed-top justify-content-center d-flex">
      <div class="alert ml-5 mr-5  text-center" style="width:40%"></div>
    </div>
    
<form class="contactForm mt-5" method="POST">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="imie">Imię oraz nazwisko*</label>
                <input data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="form-control" id="imie"
                  placeholder="Wprowadź imie" name="imie">
                <div class="komunikat"> </div>
              </div>            
              <div class="form-group col-md-12">
                <label for="email">Adres e-mail*</label>
                <input data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="form-control" id="email"
                  placeholder="Wprowadź email" name="email">
                <div class="komunikat"> </div>
              </div>   
              <div class="form-group col-md-12">
                <label for="content">Treść wiadomości*</label>
                <input type="textarea" data-toggle="tooltip" data-placement="top" title="Tooltip on top" class="form-control" id="content"
                  placeholder="Wprowadź treść wiadomości" name="content">
                <div class="komunikat"></div>
              </div>     
              <div class="form-group col-xs-auto">
                <button class="btn btn-primary" id="contact" type="button">Wyślij wiadomość</button>
              </div>
            </div>
          </form>
          *pole wymagane
</body>

</html>