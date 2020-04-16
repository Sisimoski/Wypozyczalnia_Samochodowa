<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $email = $_POST["email"];
    try{

    $sth = $db->prepare("SELECT * FROM newsletter WHERE email=:email");
    $sth -> bindValue(':email',$email,PDO::PARAM_STR);
    $sth -> execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            echo "Podany Adres Email jest już zarejestrowany";
        }
        else{
            $sth = $db->prepare("INSERT INTO newsletter(email)VALUES(:email)");
            $sth -> bindValue(':email',$email,PDO::PARAM_STR);
            $sth -> execute();
            echo "Email został dodany do naszego Newslettera";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

?>