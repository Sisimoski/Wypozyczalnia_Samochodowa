<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $messages = $_POST["message"];

    $sth = $db->prepare("SELECT email from newsletter");
    $sth ->execute();
    $response = $sth->fetchAll();

    $email->isHTML(true); 
    $email->Subject = 'Car4You - Newsletter';
    $email->Body = $messages;
    $email->AltBody = 'Test';

   for($i=0;$i<count($response);$i++){
        try{   
            $email->addAddress($response[$i][0]);
            $email->send();
            $email->ClearAddresses();
        }catch (Exception $e){
            echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
        }
   }
   echo "Wiadomości zostały wysłane";
    
    



?>