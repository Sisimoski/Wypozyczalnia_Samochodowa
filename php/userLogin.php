<?php
    require_once("config.php");
    
    $login = trim($_POST['login']);
    $haslo = trim($_POST['password']);
    
    
    $sth = $db->prepare('SELECT idKlient, login, haslo,rodzaj_klienta,aktywacja FROM Klient WHERE login = :login limit 1');
    $sth -> bindValue(':login',$login,PDO::PARAM_STR);
    $sth -> execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result){
        if( $result["haslo"] == md5($haslo)){
            session_start();
            $_SESSION['id'] = $result['idKlient'];
            $_SESSION['login'] = $result['login'];
            $_SESSION['rodzaj_klienta'] = $result['rodzaj_klienta'];
            $_SESSION['aktywacja'] = $result['aktywacja'];
            echo "Zalogowano Użytkownika";
        }
        else{       
                echo "Podano niepoprawne hasło";
        }
    }
    else{
            echo "Podano niepoprawny Login";
        }
?>