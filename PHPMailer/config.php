<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

/* Exception class. */
require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/SMTP.php';

$email = new PHPMailer(TRUE);
/* ... */
    $email->setLanguage('pl', 'language');
    $email->CharSet = "UTF-8";
    //Server settings
    //$email->SMTPDebug = SMTP::DEBUG_SERVER;     // DEBUGOWANIE                  
    $email->isSMTP();                                            
    $email->Host       = 'smtp.gmail.com';                    
    $email->SMTPAuth   = true;                                   
    $email->Username   = 'car4youcompany@gmail.com';                     
    $email->Password   = 'Kappa123';                               
    $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $email->Port       = 587;                                    

    //Recipients
    $email->setFrom('car4youcompany@gmail.com', 'Car4You');   
    $email->addReplyTo('car4youcompany@gmail.com', 'Support');

    // $email->addAddress('krystian.brzoza@outlook.com', 'Krystian Brzoza');     // Add a recipient   

    // // Content
    // $email->isHTML(true);                                  // Set email format to HTML
    // $email->Subject = 'Temat Wiadomości';
    // $email->Body    = 'Siemanko Testuję właśnie poczte email';
    // $email->AltBody = 'Test';

    // $email->send();
    // echo 'Wiadomość Wysłana';
