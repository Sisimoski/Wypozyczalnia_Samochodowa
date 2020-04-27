<?php 
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];


    $sth = $db->prepare('DELETE FROM specyfikacja_samochodu USING specyfikacja_samochodu INNER JOIN samochod on samochod.id_specyfikacja_samochodu=specyfikacja_samochodu.id_specyfikacja_samochodu
    WHERE (samochod.id_uzytkownik=:id_uzytkownik);');
    $sth ->bindValue(':id_uzytkownik',$idSession,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare('DELETE FROM uzytkownik WHERE id_uzytkownik=:id_uzytkownik;');
    $sth ->bindValue(':id_uzytkownik',$idSession,PDO::PARAM_STR);
    $sth->execute();

    session_destroy();

    echo 'Pomyślnie usunięto konto';
?>