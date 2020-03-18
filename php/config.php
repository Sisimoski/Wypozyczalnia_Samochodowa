<?php

$server = 'mysql:host=35.246.20.38;port=3306;dbname=developer';
$dbUser = 'root';
$dbPass = 'Kappa123';

// Logowanie do bazy danych
   try{
      $db = new PDO($server, $dbUser, $dbPass);
   }catch(PDOException $e){
      echo $e;
      echo 'Połączenie nie mogło zostać utworzone.<br />';
   }
?>