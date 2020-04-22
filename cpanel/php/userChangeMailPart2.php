<?php   
      require_once("../php/config.php");
    
    $sth = $db->prepare('SELECT id_uzytkownik,nowy_mail FROM zmiana_maila WHERE wartosc_hash=:hash');
    $sth ->bindValue(':hash',$hash,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result==0){
        die("Podany link nie istnieje");
    }

    $id_klient = $result['id_uzytkownik'];
    $newMail = $result['nowy_mail'];
    
    $sth = $db->prepare('UPDATE kontakty 
    INNER JOIN  uzytkownik ON uzytkownik.id_kontakt=kontakty.id_kontakt SET email=:email WHERE  id_uzytkownik=:id_klient');
    $sth ->bindValue(':id_klient',$id_klient,PDO::PARAM_STR);
    $sth ->bindValue(':email',$newMail,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare('DELETE FROM zmiana_maila WHERE wartosc_hash=:hash');
    $sth ->bindValue(':hash',$hash,PDO::PARAM_STR);
    $sth->execute();
    
    echo "Pomyślnie zmieniono adres email";


?>