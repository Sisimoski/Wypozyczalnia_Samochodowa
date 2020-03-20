<?php
    require_once("config.php");
    
    $login = trim($_POST['login']);
    $haslo = trim($_POST['password']);
    if((!empty($login) || !empty($haslo)) == true){
    
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
			
			if(!empty($_POST["remember"])) {
                setcookie ("id",$result['idKlient'],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("login",$result['login'],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("rodzaj_klienta",$result['rodzaj_klienta'],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("aktywacja",$result['aktywacja'],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["login"])) {
                    setcookie ("id","");
                    setcookie ("login","");
                    setcookie ("rodzaj_klienta","");
                    setcookie ("aktywacja","");
				}
			}


            echo "Zalogowano Użytkownika";
        }
        else{       
                echo "Podano niepoprawne hasło";
        }
    }
    else{
            echo "Podano niepoprawny Login";
        }

    }
    else{
        echo "Nie podano żadnych danych logowania";
    }
?>