<?php
    require_once("config.php");
    
    $login = trim($_POST['login']);
    $haslo = trim($_POST['password']);
    if((!empty($login) || !empty($haslo)) == true){
        $sth = $db->prepare('SELECT id_pracownik,login,haslo,rodzaj_pracownika,czy_aktywowany FROM pracownicy WHERE login = :login limit 1');
        $sth -> bindValue(':login',$login,PDO::PARAM_STR);
        $sth -> execute();

        if($result){
            if($result["haslo"] == md5($haslo)){
                if($result["czy_aktywowany"] == 1){
                    session_start();
                    $_SESSION['id'] = $result['id_pracownik'];
                    $_SESSION['login'] = $result['login'];
                    $_SESSION['rodzaj_pracownika'] = $result['rodzaj_pracownika'];
                    $_SESSION['aktywacja'] = $result['czy_aktywowany'];
                    
                    if(!empty($_POST["remember"])) {
                        setcookie ("id",$result['idKlient'],time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("login",$result['login'],time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("rodzaj_pracownika",$result['rodzaj_pracownika'],time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("aktywacja",$result['czy_aktywowany'],time()+ (10 * 365 * 24 * 60 * 60));
                    } else {
                        if(isset($_COOKIE["login"])) {
                            setcookie ("id","");
                            setcookie ("login","");
                            setcookie ("rodzaj_pracownika","");
                            setcookie ("aktywacja","");
                        }
                    
                            echo "Zalogowano Użytkownika";
                        }
                        }
                        else
                        {
                            echo "Brak Aktywacji";
                        }
                        }else
                        {       
                            echo "Niepoprawne Haslo";
                        }
        }
        else{
            $sth = $db->prepare('SELECT id_klient,login,haslo,rodzaj_klienta,czy_aktywowany FROM klienci WHERE login = :login limit 1');
            $sth -> bindValue(':login',$login,PDO::PARAM_STR);
            $sth -> execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC); 
            if($result){
                    if( $result["haslo"] == md5($haslo)){
                        if($result["czy_aktywowany"] == 1){
                            session_start();
                            $_SESSION['id'] = $result['id_klient'];
                            $_SESSION['login'] = $result['login'];
                            $_SESSION['rodzaj_klienta'] = $result['rodzaj_klienta'];
                            $_SESSION['aktywacja'] = $result['czy_aktywowany'];
                            
                            if(!empty($_POST["remember"])) {
                                setcookie ("id",$result['idKlient'],time()+ (10 * 365 * 24 * 60 * 60));
                                setcookie ("login",$result['login'],time()+ (10 * 365 * 24 * 60 * 60));
                                setcookie ("rodzaj_klienta",$result['rodzaj_klienta'],time()+ (10 * 365 * 24 * 60 * 60));
                                setcookie ("aktywacja",$result['czy_aktywowany'],time()+ (10 * 365 * 24 * 60 * 60));
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
                    else
                    {
                        echo "Brak Aktywacji";
                    }
                    }else
                    {       
                        echo "Niepoprawne Haslo";
                    }
            
            }
            else{
                    echo "Niepoprawny login";
                }
        }
        

    }
    else{
        echo "Nie podano żadnych danych logowania";
    }
?>