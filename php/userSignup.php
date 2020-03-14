<?php

    require_once("../php/config.php");
        $login = ($_POST['login']);
        $haslo1 = ($_POST['haslo1']);
        $haslo2 = ($_POST['haslo2']);
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
        //$czyFirma= ($_POST['czyFirma']);
        $nazwaFirmy= ($_POST['nazwaFirmy']);
        $regon= ($_POST['regon']);
        $nip= ($_POST['nip']);

        $sth = $db->prepare('SELECT login,email FROM Klient INNER JOIN Kontakt_Klient ON Kontakt_Klient.idKontakt=Klient.idKontakt  WHERE login = :login OR email = :email limit 1');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            die("Istnieje") ;
        }
        
        $sth = $db->prepare('INSERT INTO Klient(idKontakt,idAdres,login,haslo,nazwa_firmy,REGON,NIP,nazwisko,imie,aktywacja,rodzaj_klienta) VALUE 
        (:idKontakt,:idAdres,:login,:haslo1,:nazwa_firmy,:REGON,:NIP,:nazwisko,:imie,:aktywacja,:rodzajKlienta)');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':haslo1',$haslo1,PDO::PARAM_STR);
        $sth ->bindValue(':nazwa_firmy',$nazwaFirmy,PDO::PARAM_STR);
        $sth ->bindValue(':REGON',$regon,PDO::PARAM_STR);
        $sth ->bindValue(':NIP',$nip,PDO::PARAM_STR);
        $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        $sth ->bindValue(':aktywacja',1,PDO::PARAM_INT);
        $sth ->bindValue(':idKontakt',1,PDO::PARAM_INT);
        $sth ->bindValue(':idAdres',1,PDO::PARAM_INT);
        $sth ->bindValue(':rodzajKlienta',1,PDO::PARAM_INT);
        $sth->execute();
        
        
?>