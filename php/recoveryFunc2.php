<?php

require_once("../php/config.php");
$hash = $_POST["hash"];
$newPswd = md5($_POST["newPswd"]);
    
$sth = $db->prepare('SELECT id_uzytkownik FROM zmiana_hasla WHERE wartosc_hash=:hash');
$sth ->bindValue(':hash',$hash ,PDO::PARAM_STR);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
if($result==0){
    die("Podany link wygasł lub nie istnieje");
}
    $id_uzytkownik=$result['id_uzytkownik'];
    $sth = $db->prepare('UPDATE uzytkownik SET haslo=:haslo WHERE id_uzytkownik = :id_uzytkownik');
    $sth ->bindValue(':haslo',$newPswd,PDO::PARAM_STR);
    $sth ->bindValue(':id_uzytkownik',$id_uzytkownik,PDO::PARAM_STR);
    $sth->execute();
    if($sth){
        echo'Pomyślnie zmieniono hasło. Poczekaj, zostaniesz przekierowany na stronę główną';
    }
    else{
     echo 'Coś poszło nie tak';
    }
?>