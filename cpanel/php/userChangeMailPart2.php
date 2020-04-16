<?php   
      require_once("../php/config.php");
    
    $sth = $db->prepare('SELECT id_klient,nowy_mail FROM zmiana_maila WHERE wartosc_hash=:hash');
    $sth ->bindValue(':hash',$hash,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result==0){
        die("Podany link nie istnieje");
    }

    $id_klient = $result['id_klient'];
    $newMail = $result['nowy_mail'];
    
    $sth = $db->prepare('UPDATE kontakty_klienci 
    INNER JOIN  klienci ON klienci.id_kontakt=kontakty_klienci.id_kontakt SET email=:email WHERE  id_klient=:id_klient');
    $sth ->bindValue(':id_klient',$id_klient,PDO::PARAM_STR);
    $sth ->bindValue(':email',$newMail,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare('DELETE FROM zmiana_maila WHERE wartosc_hash=:hash');
    $sth ->bindValue(':hash',$hash,PDO::PARAM_STR);
    $sth->execute();
    
    echo "Pomyślnie zmieniono adres email";


?>