<?php
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];
    $oldPswd = MD5($_POST['oldPswd']);
    $newPswd = MD5($_POST['newPswd']);

          
        $sth = $db->prepare('SELECT id_klient FROM klienci WHERE id_klient = :id_klient AND haslo = :haslo limit 1');
        $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
        $sth ->bindValue(':haslo',$oldPswd,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            die("Stare hasło nie zgadza się") ;
        }
        else {
            $id_klient = $result['id_klient'];
        }
            
        $sth = $db->prepare('UPDATE klienci SET haslo=:haslo WHERE id_klient = :id_klient');
        $sth ->bindValue(':haslo',$newPswd,PDO::PARAM_STR);
        $sth ->bindValue(':id_klient',$id_klient,PDO::PARAM_STR);
        $sth->execute();

        echo "Pomyślnie zmieniono hasło"


?>