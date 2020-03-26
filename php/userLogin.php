<?php
    require_once("config.php");
    
    $login = trim($_POST['login']);
    $haslo = trim($_POST['password']);
    if(isset($_POST['rememberMe'])){
        $remember = trim($_POST['rememberMe']);
    }

    if((!empty($login) || !empty($haslo)) == true){
        $sth = $db->prepare('SELECT id_pracownik,login,haslo,rodzaj_pracownika,czy_aktywowany,email FROM pracownicy INNER JOIN kontakty_pracownicy ON kontakty_pracownicy.id_kontakt=pracownicy.id_pracownik WHERE login = :login OR email = :email limit 1');
        $sth -> bindValue(':login',$login,PDO::PARAM_STR);
        $sth -> bindValue(':email',$login,PDO::PARAM_STR);
        $sth -> execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            $id = $result["id_pracownik"];
            $resultLogin = $result['login'];
            $resultHaslo = $result["haslo"];
            $rodzajPracownika = $result["rodzaj_pracownika"];
            $czyAktywowany = $result["czy_aktywowany"];
        }else{
            $sth = $db->prepare('SELECT id_klient,login,haslo,rodzaj_klienta,czy_aktywowany,email FROM klienci INNER JOIN kontakty_klienci ON kontakty_klienci.id_kontakt=klienci.id_klient WHERE login = :login OR email = :email limit 1');
            $sth -> bindValue(':login',$login,PDO::PARAM_STR);
            $sth -> bindValue(':email',$login,PDO::PARAM_STR);
            $sth -> execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            if($result){
                $id = $result["id_klient"];
                $resultLogin = $result['login'];
                $resultHaslo = $result["haslo"];
                $rodzajKlienta = $result["rodzaj_klienta"];
                $czyAktywowany = $result["czy_aktywowany"];
                }
            else{
                echo "Niepoprawny login/email";
            }
        }

        if(isset($id)){
            if( $resultHaslo == md5($haslo)){
                if($czyAktywowany == 1){
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['login'] = $resultLogin;
                    if(isset($rodzajKlienta))
                        $_SESSION['rodzaj_klienta'] = $rodzajKlienta;
                    if(isset($rodzajPracownika))
                        $_SESSION['rodzaj_pracownika'] = $rodzajPracownika;
                    $_SESSION['aktywacja'] = $czyAktywowany;
                    if(isset($remember)){
                        setcookie ("id",$id,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("login",$resultLogin,time()+ (10 * 365 * 24 * 60 * 60));
                        if(isset($rodzajKlienta))
                            setcookie ("rodzaj_klienta",$rodzajKlienta,time()+ (10 * 365 * 24 * 60 * 60));
                        if(isset($rodzajPracownika))
                            setcookie ("rodzaj_pracownika",$rodzajPracownika,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("aktywacja",$czyAktywowany,time()+ (10 * 365 * 24 * 60 * 60));
                    }else {
                        if(isset($_COOKIE["login"])) {
                            setcookie ("id","");
                            setcookie ("login","");
                            if(isset($rodzajKlienta))
                                setcookie ("rodzaj_klienta","");
                            if(isset($rodzajPracownika))
                                setcookie ("rodzaj_pracownika","");
                            setcookie ("aktywacja","");
                        }
                    }
                    echo "Zalogowano Użytkownika";
                }else{
                    echo "Brak Aktywacji";
                }
            }else{
                echo "Niepoprawne Haslo";
            }
        }

    //     else{
    //         $sth = $db->prepare('SELECT id_klient,login,haslo,rodzaj_klienta,czy_aktywowany FROM klienci WHERE login = :login limit 1');
    //         $sth -> bindValue(':login',$login,PDO::PARAM_STR);
    //         $sth -> execute();
    //         $result = $sth->fetch(PDO::FETCH_ASSOC); 
    //         if($result){
    //                 if( $result["haslo"] == md5($haslo)){
    //                     if($result["czy_aktywowany"] == 1){
    //                         session_start();
    //                         $_SESSION['id'] = $result['id_klient'];
    //                         $_SESSION['login'] = $result['login'];
    //                         $_SESSION['rodzaj_klienta'] = $result['rodzaj_klienta'];
    //                         $_SESSION['aktywacja'] = $result['czy_aktywowany'];
                            
    //                         if(!empty($_POST["remember"])) {
    //                             setcookie ("id",$result['idKlient'],time()+ (10 * 365 * 24 * 60 * 60));
    //                             setcookie ("login",$result['login'],time()+ (10 * 365 * 24 * 60 * 60));
    //                             setcookie ("rodzaj_klienta",$result['rodzaj_klienta'],time()+ (10 * 365 * 24 * 60 * 60));
    //                             setcookie ("aktywacja",$result['czy_aktywowany'],time()+ (10 * 365 * 24 * 60 * 60));
    //                         } else {
    //                             if(isset($_COOKIE["login"])) {
    //                                 setcookie ("id","");
    //                                 setcookie ("login","");
    //                                 setcookie ("rodzaj_klienta","");
    //                                 setcookie ("aktywacja","");
    //                             }
    //                         }
    //                     
    
    //                 }
    //                 else
    //                 {
    //                     
    //                 }
    //                 }else
    //                 {       
    //                     
    //                 }
            
    //         }
    //         else{
    //                 
    //             }
    //     }
        

     }
    else{
        echo "Nie podano żadnych danych logowania";
    }
?>