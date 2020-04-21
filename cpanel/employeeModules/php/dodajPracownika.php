<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    $email_pracowniczy = $_POST["email_pracowniczy"];
    $miasto = $_POST["city"];
    $wojewodztwo = $_POST["wojewodztwo"];
    $ulica = $_POST["ulica"];
    $nr_domu = $_POST["nr_domu"];
    $kod = $_POST["kod"];
    $telefon = $_POST["telefon"];
    $komorka = $_POST["komorka"];
    $linkedin = $_POST["linkedin"];
    $dodatkowe_informacje = $_POST["dodatkowe_informacje"];
    $rodzaj_pracownika = $_POST["rodzajPracownika"];
    $aktywacja = $_POST["aktywacjaPracownika"];


    try{
        $sth = $db->prepare('INSERT INTO adres(miejscowosc,wojewodztwo,kod_pocztowy,ulica,nr_domu,dodatkowe_informacje)
            VALUE (:miejscowosc,:wojewodztwo,:kod_pocztowy,:ulica,:nr_domu,:dodatkoweinformacje)');
            $sth ->bindValue(':miejscowosc',$miasto,PDO::PARAM_STR);
            $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
            $sth ->bindValue(':kod_pocztowy',$kod,PDO::PARAM_STR);
            $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
            $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
            $sth ->bindValue(':dodatkoweinformacje',$dodatkowe_informacje,PDO::PARAM_STR);
            $sth->execute();

            $idAdres = $db->lastInsertID();

        

            $sth = $db->prepare('INSERT INTO kontakty_pracownicy(linkedin,email_pracowniczy,nr_kom,nr_tel,email) 
            VALUE (:linked,:email_pracowniczy,:nr_kom,:nr_tel,:email)');
            $sth ->bindValue(':linked',$linkedin,PDO::PARAM_STR);
            $sth ->bindValue(':email_pracowniczy',$email_pracowniczy,PDO::PARAM_STR);
            $sth ->bindValue(':nr_kom',$komorka,PDO::PARAM_STR);
            $sth ->bindValue(':nr_tel',$telefon,PDO::PARAM_STR);
            $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        
            $sth->execute();

            $idKontakt = $db->lastInsertID();
            $data = date('Y-m-d');

            $sth = $db->prepare('INSERT INTO pracownicy(id_adres,id_kontakt,login,haslo,imie,nazwisko,rodzaj_pracownika,data_zatrudnienia,czy_aktywowany) VALUES
            (:adres,:kontakt,:login,:haslo,:imie,:nazwisko,:rodzaj,:data,:aktywacja)');
            $sth ->bindValue(':adres',$idAdres,PDO::PARAM_INT);
            $sth ->bindValue(':kontakt',$idKontakt,PDO::PARAM_INT);
            $sth ->bindValue(':login',$login,PDO::PARAM_STR);
            $sth ->bindValue(':haslo',$haslo,PDO::PARAM_STR);
            $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
            $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
            $sth ->bindValue(':rodzaj',$rodzaj_pracownika,PDO::PARAM_STR);
            $sth ->bindValue(':data',$data,PDO::PARAM_STR);
            $sth ->bindValue(':aktywacja',$aktywacja,PDO::PARAM_INT);
            $sth->execute();
        
            
            
            echo 'Dodano Pracownika';
    }
    catch(Exception $e){
        echo 'Wystąpił błąd '.$e->getMessage();
    }







?>