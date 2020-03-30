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
    $rodzaj_pracownika = $_POST["rodzajPracownika"];



    $sth = $db->prepare('INSERT INTO adres(miejscowosc,wojewodztwo,kod_pocztowy,ulica,nr_domu,dodatkowe_informacje)
        VALUE (:miejscowosc,:wojewodztwo,:kod_pocztowy,:ulica,:nr_domu,:dodatkoweinformacje)');
        $sth ->bindValue(':miejscowosc',$miasto,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kod_pocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkoweinformacje',$dodatkowe,PDO::PARAM_STR);
        $sth->execute();

        $idAdres = $db->lastInsertID();

       

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
            $sth ->bindValue(':www',$www,PDO::PARAM_STR);
        }
        else{
            $www = null;
            $sth ->bindValue(':www',$www,PDO::PARAM_NULL);

        }
        $sth->execute();

        $idKontakt = $db->lastInsertID();
        $data = date('Y-m-d');
        $sth = $db->prepare('INSERT INTO pracownicy(id_adres,id_kontakt,login,haslo,imie,nazwisko,rodzaj_pracownika,data_zatrudnienia,czy_aktywowany) VALUES
        (:adres,:kontakt,:login,:haslo,:imie,:nazwisko,:rodzaj,:data,:aktywacja)');
        $sth ->bindValue(':adres',$idAdres,PDO::PARAM_INT);
        $sth ->bindValue(':kontakt',$idKontakt,PDO::PARAM_INT);
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':haslo',$password,PDO::PARAM_STR);
        $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        $sth ->bindValue(':rodzaj',$rodzaj_pracownika,PDO::PARAM_STR);
        $sth ->bindValue(':data',$data,PDO::PARAM_STR);
        $sth ->bindValue(':aktywacja',1,PDO::PARAM_INT);
        $sth->execute();
    
           
        
        echo 'Dodano Pracownika';







?>