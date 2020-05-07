<?php

$server = 'mysql:host=35.198.107.158;port=3306;dbname=developer;charset=utf8';
$dbUser = 'admin';
$dbPass = 'Kappa123';

// Logowanie do bazy danych
   try{
      $db = new PDO($server, $dbUser, $dbPass);
   }catch(PDOException $e){
      echo $e;
      echo 'Połączenie nie mogło zostać utworzone.<br />';
   }
?>