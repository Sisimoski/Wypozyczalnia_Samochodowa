<?php
    session_start();
    require_once("../../php/config.php");
    require_once("randomCodeGenerator.php");
    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

     $idSession = $_SESSION['id'];
     $id = $_POST["id"];
     $dataRealizacji = date("Y-m-d");
     
    $sth = $db->prepare("UPDATE wypozyczenie SET czy_zrealizowano = 1 , data_realizacji = :date WHERE id_wypozyczenia = {$id} AND czy_oplacono = 1");
    $sth ->bindValue(":date",$dataRealizacji,PDO::PARAM_STR);
    $sth ->execute();
    $sth = $db->prepare("SELECT specyfikacja_samochodu.id_specyfikacja_samochodu, wypozyczenie.kwota FROM wypozyczony_samochod
     INNER JOIN samochod ON samochod.vin = wypozyczony_samochod.vin 
     INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu 
     INNER JOIN wypozyczenie ON wypozyczenie.id_wypozyczenia = wypozyczony_samochod.id_wypozyczenia 
        WHERE wypozyczony_samochod.id_wypozyczenia = {$id}");
    $sth ->execute();
    $result  = $sth ->fetchAll();
    
    $idSpecyfikajca = $result[0]["id_specyfikacja_samochodu"];
    $kwota = intval($result[0]['kwota']);

    $sth = $db->prepare("UPDATE specyfikacja_samochodu SET czy_posiadany = 1 WHERE id_specyfikacja_samochodu = {$idSpecyfikajca} ");
    $sth ->execute();
    
    $sth = $db->prepare("SELECT ilosc_punktow FROM uzytkownik WHERE id_uzytkownik = {$idSession}");
    $sth ->execute();
    $result = $sth->fetchAll();

    $iloscPunktow1 = $result[0]["ilosc_punktow"];


    $sth = $db->prepare("UPDATE uzytkownik SET ilosc_punktow = ilosc_punktow + {$kwota} WHERE id_uzytkownik = {$idSession}");
    $sth ->execute();

    $sth = $db->prepare("SELECT ilosc_punktow FROM uzytkownik WHERE id_uzytkownik = {$idSession}");
    $sth ->execute();
    $result = $sth->fetchAll();

    $iloscPunktow2 = $result[0]["ilosc_punktow"];

    if(($iloscPunktow1 <650 && $iloscPunktow2>= 650) || ($iloscPunktow1 <3000 && $iloscPunktow2>= 3000) || ($iloscPunktow1 <7000 && $iloscPunktow2>= 7000)){
        $date = date('Y-m-d', strtotime('+1 year'));
        $kod = struuid(false);
        $sth = $db->prepare("INSERT INTO `kody_rabatowe`(`nazwa_kodu`, `ilosc_kodow`, `procent_rabatu`, `data_waznosci`) VALUES (:kod, 1, 10, :data )");
        $sth ->bindValue(":kod",$kod,PDO::PARAM_STR);
        $sth ->bindValue(":data",$date,PDO::PARAM_STR);
        $sth ->execute();

        $messages = "W nagrodę za uzyskanie nowego poziomu Konta kod rabatowy: ".$kod." na -10% do wykorzystania jednorazowo";

        $sth = $db->prepare("SELECT email from uzytkownik 
        INNER JOIN kontakty ON kontakty.id_kontakt = uzytkownik.id_kontakt
        WHERE id_uzytkownik = {$idSession}");
        $sth ->execute();
        $response = $sth->fetchAll();

        $email->isHTML(true); 
        $email->Subject = 'Car4You - Newsletter';
        $email->Body = $messages;
        $email->AltBody = 'Test';
        $email->addAddress($response[0][0]);
        $email->send();
        $email->ClearAddresses();
    }
    
    echo "Oddano pojazd";


?>