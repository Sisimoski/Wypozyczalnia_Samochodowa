<?php
    session_start();
     require_once("../../php/config.php");
     $idSession = $_SESSION['id'];
     $id = $_POST["id"];
     $dataRealizacji = date("Y-m-d");
     
    $sth = $db->prepare("UPDATE wypozyczenie SET czy_zrealizowano = 1 data_realizacji = :date WHERE id_wypozyczenia = {$id} AND czy_oplacono = 1");
    $sth ->bindValue(":date",$dataRealizacji,PDO::PARAM_STR);
    $sth ->execute();
    $sth = $db->prepare("SELECT specyfikacja_samochodu.id_specyfikacja_samochodu FROM wypozyczony_samochod
    INNER JOIN samochod ON samochod.vin = wypozyczony_samochod.vin
    INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu
    WHERE wypozyczony_samochod.id_wypozyczenia = {$id}");
    $sth ->execute();
    $result  = $sth ->fetchAll();
    $idSpecyfikajca = $result[0]["id_specyfikacja_samochodu"];

    $sth = $db->prepare("UPDATE specyfikacja_samochodu SET czy_posiadany = 1 WHERE id_specyfikacja_samochodu = {$idSpecyfikajca} ");
    $sth ->execute();

    echo "Oddano pojazd";


?>