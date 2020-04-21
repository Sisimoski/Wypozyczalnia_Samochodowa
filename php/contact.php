<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
$imie = ($_POST['imie']);
$userEmail = ($_POST['email']);
$content = ($_POST['content']);
$companyMail ='car4youcompany@gmail.com';


$message = '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="left">
            <img style="width:50%; height:auto;" src="http://car4you.net.pl/images/Car4You-line-logo.png"/>
        </td>
    </tr>
    <tr>
        <td align="left">
            <h1>Imie oraz nazwisko:' .$imie.'<br> Email:'.$userEmail.'</h1>
        </td>
    </tr>
    <tr>
        <td align="left">
        <h2>'.$content.'</h2></br>
        </td>    
    </tr>
</table>
</br>     
Pozdrawiamy</br>
Zespół car4you.net.pl
';
try{
    
    $email->addAddress($companyMail);   
    // Content
    $email->isHTML(true);                        
    $email->Subject = 'Kontakt z działem technicznym';
    $email->Body    = $message;
    $email->AltBody = 'Test';
    $email->send();
    echo "Pomyślnie wysłano wiadomość";
}catch (Exception $e){
    echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
}

?>