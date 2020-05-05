<?php
    require_once("../php/config.php");
    require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
    $value=($_POST['value']);
       

    if($value=='login'){
        $loginRecovery=($_POST['loginRecovery']);
        $sth = $db->prepare('SELECT email FROM uzytkownik INNER JOIN kontakty ON uzytkownik.id_kontakt = kontakty.id_kontakt WHERE login = :login limit 1');
        $sth ->bindValue(':login',$loginRecovery,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){

            $hash = uniqid();
            $emailRecovery=$result['email'];

            $passwordChangerLink = 'http://car4you.net.pl/recoverPassword.php?hash='.$hash;
            $message = '
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <img style="width:50%; height:auto;" src="http://car4you.net.pl/images/Car4You-line-logo.png"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h1>Witaj '.$emailRecovery.'</h1>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2>Aby zmienić hasło kliknij w link</h2>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="'.$passwordChangerLink.'">'.$passwordChangerLink.'</a></br>
                    </td>    
                </tr>
            </table>
            </br>     
            Pozdrawiamy</br>
            Zespół car4you.net.pl
            ';
            try{
                
                $email->addAddress($emailRecovery);   
               
                // Content
                $email->isHTML(true);                        
                $email->Subject = 'Car4You - Zmiana hasła';
                $email->Body    = $message;
                $email->AltBody = 'Test';
                $email->send();
                echo "Pomyślnie wysłano maila";
            }catch (Exception $e){
                echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
            }
        }
        else {
            die("Brak podanego loginu w systemie") ;
        }
    }
    else if($value=='email'){
        $emailRecovery=($_POST['emailRecovery']);
        $sth = $db->prepare('SELECT * FROM kontakty WHERE email = :email limit 1');
        $sth ->bindValue(':email',$emailRecovery,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){

            $hash = uniqid();

            $passwordChangerLink = 'http://car4you.net.pl/recoverPassword.php?hash='.$hash;
            $message = '
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <img style="width:50%; height:auto;" src="http://car4you.net.pl/images/Car4You-line-logo.png"/>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h1>Witaj '.$emailRecovery.'</h1>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2>Aby zmienić hasło kliknij w link</h2>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="'.$passwordChangerLink.'">'.$passwordChangerLink.'</a></br>
                    </td>    
                </tr>
            </table>
            </br>     
            Pozdrawiamy</br>
            Zespół car4you.net.pl
            ';
            try{
                
                $email->addAddress($emailRecovery);   
                // Content
                $email->isHTML(true);                        
                $email->Subject = 'Car4You - Zmiana hasła';
                $email->Body    = $message;
                $email->AltBody = 'Test';
                 $email->send();
              echo "Pomyślnie wysłano maila";
            }catch (Exception $e){
                echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
            }
        }
        else {
            die("Brak podanego maila w systemie") ;
        }
    }
    else{
        'Coś poszlo nei tak';
    }


?>
