<?php

    require_once("../php/config.php");
        $login = ($_POST['login']);
        $haslo1 = MD5($_POST['haslo1']);
        $imie = ($_POST['imie']);
        $nazwisko = ($_POST['nazwisko']);
        $nrKom = ($_POST['nrKom']);
        $nrTel = ($_POST['nrTel']);
        $fax = ($_POST['fax']);
        $email= ($_POST['email']);
        $stronaInternetowa = ($_POST['stronaInternetowa']);
        $miejscowosc = ($_POST['miejscowosc']);
        $wojewodztwo= ($_POST['wojewodztwo']);
        $kodPocztowy = ($_POST['kodPocztowy']);
        $ulica = ($_POST['ulica']);
        $nr_domu= ($_POST['nr_domu']);
        $dodatkoweInformacje = ($_POST['dodatkoweInformacje']);

        if(isset($_POST['nazwaFirmy'])) {
            $nazwaFirmy= ($_POST['nazwaFirmy']);
        }
        else{
            $nazwaFirmy="";
        }
        if(isset($_POST['regon'])) {
            $regon= ($_POST['regon']);
        }
        else{
            $regon="";
        }
        if(isset($_POST['nip'])) {
            $nip= ($_POST['nip']);
        }
        else{
            $nip="";
        }

        if(isset($_POST['czyFirma'])) {
            $czyFirma=2;
        }
        else{
            $czyFirma=1;
        }

        $sth = $db->prepare('SELECT login, email FROM klienci INNER JOIN kontakty_klienci ON kontakty_klienci.id_kontakt=klienci.id_klient WHERE login = :login OR email = :email limit 1');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            die("Podany login lub e-mail już istnieje") ;
        }


      //  Dodawanie adresu klienta
        $sth = $db->prepare('INSERT INTO adres(miejscowosc,wojewodztwo,kod_pocztowy,ulica,nr_domu,dodatkowe_informacje) 
        VALUE (:miejscowosc,:wojewodztwo,:kod_pocztowy,:ulica,:nr_domu,:dodatkowe_informacje)');
        $sth ->bindValue(':miejscowosc',$miejscowosc,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kodPocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkoweInformacje,PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('SELECT id_adres FROM adres WHERE miejscowosc = :miejscowosc AND wojewodztwo = :wojewodztwo AND kod_pocztowy = :kod_pocztowy AND ulica = :ulica AND 
        nr_domu = :nr_domu and dodatkowe_informacje = :dodatkowe_informacje limit 1');
        $sth ->bindValue(':miejscowosc',$miejscowosc,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kodPocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkoweInformacje,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $idAdres = $result['id_adres'];

        // Dodawanie danych kontaktowych klienta
        $sth = $db->prepare('INSERT INTO kontakty_klienci(nr_kom,nr_tel,fax,email,www) 
        VALUE (:nrKom,:nrTel,:fax,:email,:www)');
        $sth ->bindValue(':nrKom',$nrKom,PDO::PARAM_STR);
        $sth ->bindValue(':nrTel',$nrTel,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth ->bindValue(':www',$stronaInternetowa,PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('SELECT id_kontakt FROM kontakty_klienci WHERE nr_kom = :nr_kom AND nr_tel = :nr_tel AND fax = :fax
        AND email = :email AND www = :www limit 1');
        $sth ->bindValue(':nr_kom',$nrKom,PDO::PARAM_STR);
        $sth ->bindValue(':nr_tel',$nrTel,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth ->bindValue(':www',$stronaInternetowa,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $idKontakt = $result['id_kontakt'];
           
        
         //Dodawanie klienta
        $sth = $db->prepare('INSERT INTO klienci(id_kontakt,id_adres,login,haslo,nazwa_firmy,REGON,NIP,nazwisko,imie,czy_aktywowany,rodzaj_klienta) 
        VALUE (:idKontakt,:idAdres,:login,:haslo1,:nazwa_firmy,:REGON,:NIP,:nazwisko,:imie,:aktywacja,:rodzajKlienta)');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':haslo1',$haslo1,PDO::PARAM_STR);
        $sth ->bindValue(':nazwa_firmy',$nazwaFirmy,PDO::PARAM_STR);
        $sth ->bindValue(':REGON',$regon,PDO::PARAM_STR);
        $sth ->bindValue(':NIP',$nip,PDO::PARAM_STR);
        $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        $sth ->bindValue(':aktywacja',0,PDO::PARAM_INT);
        $sth ->bindValue(':idKontakt',$idKontakt,PDO::PARAM_INT);
        $sth ->bindValue(':idAdres',$idAdres,PDO::PARAM_INT);
        $sth ->bindValue(':rodzajKlienta',$czyFirma,PDO::PARAM_INT);
        $sth->execute();
        

        $mail = $email;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/config.php';
        
        $activation = 'http://car4you.net.pl/logowanie.php?aktywacja='.sha1($haslo1);
        $message = '
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center">
                    <img style="width:50%; height:auto;" src="http://car4you.net.pl/images/Car4You-line-logo.png"/>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h1>Witaj '.$login.'</h1>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h2>Dziękujemy za dokonanie rejestracji w serwisie car4you.net.pl.</h2>
                </td>
            </tr>
            <tr>
                <td align="center">
                <h2>Już tylko jedno kliknięcie dzieli Cię od możliwości wypożyczania oraz wynajmowania samochodów z naszej firmy.</h2>
                </td>
            </tr>
            <tr>
                <td align="center">
                <h2>Aby aktywować konto i móc zalogować się do swojego profilu, prosimy o kliknięcie w poniższy link aktywacyjny:</h2>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <a href="'.$activation.'">'.$activation.'</a></br>
                </td>    
            </tr>
        </table>
        </br>     
        Pozdrawiamy</br>
        Zespół car4you.net.pl
        ';
        try{
            
            $email->addAddress($mail, $imie.' '.$nazwisko);   
            // Content
            $email->isHTML(true);                        
            $email->Subject = 'Car4You - Aktywacja Konta';
            $email->Body    = $message;
            $email->AltBody = 'Test';
            $email->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/images/Car4You-line-logo.png', 'logo');
            $email->send();
            echo "Zarejestrowano Użytkownika";
        }catch (Exception $e){
            echo "Wiadomość nie mogła zostać wysłana: {$email->ErrorInfo}";
        }


        
?>