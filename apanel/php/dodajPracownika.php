<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $miasto = $_POST["city"];
    $wojewodztwo = $_POST["wojewodztwo"];
    $kod_pocztowy = $_POST["kod"];
    $linkedin = $_POST["linkedin"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $fax = $_POST["fax"];
    $dodatkowe = $_POST["dodatkowe"];
    $ulica = $_POST["ulica"];
    $nr_domu = $_POST["nr_domu"];
    $email_pracowniczy = $_POST["email_pracowniczy"];
    $www = $_POST["www"];
    $login = $_POST["login"];
    $password = $_POST["haslo"];
    $email = $_POST["email"];
    $komorka = $_POST["komorka"];



    $sth = $db->prepare('INSERT INTO Adres(miejscowosc,wojewodztwo,kod_pocztowy,ulica,nr_domu,dodatkowe_informacje)
        VALUE (:miejscowosc,:wojewodztwo,:kod_pocztowy,:ulica,:nr_domu,:dodatkowe_informacje)');
        $sth ->bindValue(':miejscowosc',$miasto,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kod_pocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkowe,PDO::PARAM_STR);
        $sth->execute();

        $idAdres = $db->lastInsertID();
        echo $idAdres;

       

        // Dodawanie danych kontaktowych pracownika
        // Do poprawienia baza danych
        $sth = $db->prepare('INSERT INTO kontakty_pracownicy(linkedin,email_pracowniczy,nr_kom,nr_tel,fax,email,www) 
        VALUE (:linked,:email_pracowniczy,:nr_kom,:nr_tel,:fax,:email,:www)');
        $sth ->bindValue(':linked',$linkedin,PDO::PARAM_STR);
        $sth ->bindValue(':email_pracowniczy',$email_pracowniczy,PDO::PARAM_STR);
        $sth ->bindValue(':nr_kom',$komorka,PDO::PARAM_STR);
        $sth ->bindValue(':nr_tel',$telefon,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        if(!empty($www)){
            echo 'test';
            $sth ->bindValue(':www',$www,PDO::PARAM_STR);
        }
        else{
            $www = null;
            $sth ->bindValue(':www',$www,PDO::PARAM_NULL);

        }
        $sth->execute();

        $idKontakt = $db->lastInsertID();
        echo $idKontakt;

        // $sth = $db->prepare('SELECT idKontakt FROM Kontakt_Klient WHERE nr_kom = :nr_kom AND nr_tel = :nr_tel AND fax = :fax
        // AND email = :email AND www = :www limit 1');
        // $sth ->bindValue(':nr_kom',$nrKom,PDO::PARAM_STR);
        // $sth ->bindValue(':nr_tel',$nrTel,PDO::PARAM_STR);
        // $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        // $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        // $sth ->bindValue(':www',$stronaInternetowa,PDO::PARAM_STR);
        // $sth->execute();
        // $result = $sth->fetch(PDO::FETCH_ASSOC);
        // $idKontakt = $result['idKontakt'];
           
        
        //  //Dodawanie klienta
        // $sth = $db->prepare('INSERT INTO Klient(idKontakt,idAdres,login,haslo,nazwa_firmy,REGON,NIP,nazwisko,imie,aktywacja,rodzaj_klienta) 
        // VALUE (:idKontakt,:idAdres,:login,:haslo1,:nazwa_firmy,:REGON,:NIP,:nazwisko,:imie,:aktywacja,:rodzajKlienta)');
        // $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        // $sth ->bindValue(':haslo1',$haslo1,PDO::PARAM_STR);
        // $sth ->bindValue(':nazwa_firmy',$nazwaFirmy,PDO::PARAM_STR);
        // $sth ->bindValue(':REGON',$regon,PDO::PARAM_STR);
        // $sth ->bindValue(':NIP',$nip,PDO::PARAM_STR);
        // $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        // $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        // $sth ->bindValue(':aktywacja',0,PDO::PARAM_INT);
        // $sth ->bindValue(':idKontakt',$idKontakt,PDO::PARAM_INT);
        // $sth ->bindValue(':idAdres',$idAdres,PDO::PARAM_INT);
        // $sth ->bindValue(':rodzajKlienta',$czyFirma,PDO::PARAM_INT);
        // $sth->execute();







?>