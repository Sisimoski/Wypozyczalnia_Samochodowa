<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $id = $_POST["idCar"];
    $user = $_SESSION["id"];
    
    $sth = $db->prepare("UPDATE specyfikacja_samochodu SET czy_posiadany = 0 WHERE id_specyfikacja_samochodu = {$id}");
    $sth ->execute();
    $sth = $db->prepare("SELECT email FROM samochod
     INNER JOIN uzytkownik ON uzytkownik.id_uzytkownik = samochod.id_uzytkownik
     INNER JOIN kontakty ON kontakty.id_kontakt = uzytkownik.id_kontakt
     WHERE samochod.id_specyfikacja_samochodu = {$id}");
    $sth ->execute();
    $response = $sth ->fetchAll();

    $message = 'Twój pojazd nie został zaakceptowany';

    $email->isHTML(true); 
    $email->Subject = 'Car4You - Akceptacja Pojazdu';
    $email->Body = $message;
    $email->AltBody = 'Test';

    $email->addAddress($response[0]["email"]);
    $email->send();

    echo "Pomyślnie Odrzucono Pojazd";

    





?>