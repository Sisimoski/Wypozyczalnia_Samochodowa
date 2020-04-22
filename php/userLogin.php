<?php
    require_once("config.php");
    
    $login = trim($_POST['login']);
    $haslo = trim($_POST['password']);
    if(isset($_POST['rememberMe'])){
        $remember = trim($_POST['rememberMe']);
    }

    if((!empty($login) || !empty($haslo)) == true){
        $sth = $db->prepare('SELECT id_uzytkownik,imie,nazwisko,login,haslo,rodzaj_uzytkownika,czy_aktywowany,email FROM uzytkownik INNER JOIN kontakty ON kontakty.id_kontakt=uzytkownik.id_kontakt WHERE login = :login OR email = :email limit 1');
        $sth -> bindValue(':login',$login,PDO::PARAM_STR);
        $sth -> bindValue(':email',$login,PDO::PARAM_STR);
        $sth -> execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            $id = $result["id_uzytkownik"];
            $resultLogin = $result['login'];
            $resultHaslo = $result["haslo"];
            $resultImie = $result["imie"];
            $resultNazwisko = $result["nazwisko"];
            $rodzajUzytkownika = $result["rodzaj_uzytkownika"];
            $czyAktywowany = $result["czy_aktywowany"];
        }
        else{
            echo "Niepoprawny login/email";
        }
        

        if(isset($id)){
            if( $resultHaslo == md5($haslo)){
                if($czyAktywowany == 1){
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['login'] = $resultLogin;
                    $_SESSION['imie'] = $resultImie;
                    $_SESSION["nazwisko"] = $resultNazwisko;
                    $_SESSION['rodzaj_konta'] = $rodzajUzytkownika;
                    $_SESSION['aktywacja'] = $czyAktywowany;
                    if(isset($remember)){
                        setcookie ("id",$id,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("login",$resultLogin,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("imie",$resultImie,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("nazwisko",$resultNazwisko,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("rodzaj_konta",$rodzajUzytkownika,time()+ (10 * 365 * 24 * 60 * 60));
                        setcookie ("aktywacja",$czyAktywowany,time()+ (10 * 365 * 24 * 60 * 60));
                    }else {
                        if(isset($_COOKIE["login"])) {
                            setcookie ("id","");
                            setcookie ("login","");
                            setcookie ("imie","");
                            setcookie ("nazwisko","");
                            setcookie ("rodzaj_konta","");
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
     }
    else{
        echo "Nie podano żadnych danych logowania";
    }
?>