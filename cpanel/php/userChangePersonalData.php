<?php
        session_start();
         require_once("../../php/config.php");
        $idSession = $_SESSION['id'];

        $imie = ($_POST['imie']);
        $nazwisko = ($_POST['nazwisko']);
        $nr_kom = ($_POST['nr_kom']);
        $nr_tel = ($_POST['nr_tel']);
        $fax = ($_POST['fax']);
        $www = ($_POST['www']);
        $miejscowosc = ($_POST['miejscowosc']);
        $wojewodztwo= ($_POST['wojewodztwo']);
        $kod_pocztowy = ($_POST['kod_pocztowy']);
        $ulica = ($_POST['ulica']);
        $nr_domu= ($_POST['nr_domu']);
        $dodatkowe_informacje = ($_POST['dodatkowe_informacje']);
        
        if(isset($_POST['nazwa_firmy'])){
            $nazwa_firmy= ($_POST['nazwa_firmy']);
            $regon= ($_POST['regon']);
            $nip= ($_POST['nip']);
        }


        $sth = $db->prepare('UPDATE klienci 
        INNER JOIN kontakty_klienci ON kontakty_klienci.id_kontakt=klienci.id_kontakt INNER JOIN adres ON adres.id_adres= klienci.id_adres SET imie=:imie,nazwisko=:nazwisko,nazwa_firmy=:nazwa_firmy,nip=:nip,regon=:regon,ulica=:ulica,nr_domu=:nr_domu,wojewodztwo=:wojewodztwo,kod_pocztowy=:kod_pocztowy,miejscowosc=:miejscowosc,nr_kom=:nr_kom,nr_tel=:nr_tel,fax=:fax,dodatkowe_informacje=:dodatkowe_informacje,www=:www WHERE id_klient = :id_klient');
        $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        $sth ->bindValue(':nazwa_firmy',$nazwa_firmy,PDO::PARAM_STR);
        $sth ->bindValue(':nip',$nip,PDO::PARAM_STR);
        $sth ->bindValue(':regon',$regon,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kod_pocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':miejscowosc',$miejscowosc,PDO::PARAM_STR);
        $sth ->bindValue(':nr_kom',$nr_kom,PDO::PARAM_STR);
        $sth ->bindValue(':nr_tel',$nr_tel,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkowe_informacje,PDO::PARAM_STR);
        $sth ->bindValue(':www',$www,PDO::PARAM_STR);   
        $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
        $sth->execute();


echo 'Pomyślnie zmieniono dane'
?>