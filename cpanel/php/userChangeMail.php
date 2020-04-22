<?php
       session_start();
       require_once("../../php/config.php");
       $idSession = $_SESSION['id'];
       $oldMail= ($_POST['oldMail']);
       $newMail= ($_POST['newMail']);

       $sth = $db->prepare('SELECT email,login FROM kontakty
       INNER JOIN uzytkownik ON uzytkownik.id_kontakt=kontakty.id_kontakt
       WHERE id_uzytkownik = :id_klient');
       $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
       $sth->execute();
       $result = $sth->fetch(PDO::FETCH_ASSOC);
       $login=$result['login'];

    if($oldMail!=$result['email']){
        die("Aktualny mail się nie zgadza z wprowadzonym");
    }

    // $sth = $db->prepare('SELECT email FROM kontakty_klienci
    // INNER JOIN klienci ON klienci.id_kontakt=kontakty_klienci.id_kontakt
    // WHERE id_klient = :id_klient');
    // $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
    // $sth->execute();
    // $result = $sth->fetch(PDO::FETCH_ASSOC);
    // $login=$result['login'];

    // if($oldMail!=$result['email']){
    //     die("Aktualny mail się nie zgadza z wprowadzonym");
    // }
   
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';

    $hash = uniqid();

    $sth = $db->prepare('INSERT INTO zmiana_maila(wartosc_hash,id_uzytkownik,nowy_mail)
    VALUES (:wartosc_hash,:id_klient,:nowy_mail)');
    $sth ->bindValue(':wartosc_hash',$hash,PDO::PARAM_STR);
    $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
    $sth ->bindValue(':nowy_mail',$newMail,PDO::PARAM_STR);
    $sth->execute();

    $mailChangerLink = 'http://car4you.net.pl/cpanel/ChangeMail.php?hash='.$hash;
    $message = '
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <img style="width:50%; height:auto;" src="http://car4you.net.pl/images/Car4You-line-logo.png"/>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h1>Witaj '.$login.'</h1>
            </td>
        </tr>
        <tr>
            <td align="center">
                <h2>Aby zmienić mail na '.$newMail.' kliknij w link</h2>
            </td>
        </tr>
        <tr>
            <td align="center">
                 <a href="'.$mailChangerLink.'">'.$mailChangerLink.'</a></br>
            </td>    
        </tr>
    </table>
    </br>     
    Pozdrawiamy</br>
    Zespół car4you.net.pl
    ';
    try{
        
        $email->addAddress($oldMail);   
        // Content
        $email->isHTML(true);                        
        $email->Subject = 'Car4You - Zmiana adresu email';
        $email->Body    = $message;
        $email->AltBody = 'Test';
        $email->send();
        echo "Pomyślnie wysłano maila";
    }catch (Exception $e){
        echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
    }




?>