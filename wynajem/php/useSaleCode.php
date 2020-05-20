<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $kod = $_POST["kod_rabatowy"];
    
    $sth = $db->prepare("SELECT * FROM kody_rabatowe WHERE nazwa_kodu = :kod AND ilosc_kodow > 0");
    $sth -> bindValue(":kod",$kod,PDO::PARAM_STR);
    $sth ->execute();

    if($sth->rowCount() != 0){
        $data = $sth->fetchAll();
        $_SESSION["kod_rabatowy"] = $kod;
        $_SESSION["czy_kod"] = 1;
        echo "Success".$data[0]["procent_rabatu"];
    } 
    else{
        unset($_SESSION["czy_kod"]);
        unset($_SESSION["kod_rabatowy"]);
        echo "Podany kod nie istnieje lub został wykorzystany.";
    }

?>