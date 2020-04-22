<?php
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];
   

          
        $sth = $db->prepare('SELECT imie,nazwisko,rodzaj_uzytkownika,ulica,nr_domu,miejscowosc,wojewodztwo,kod_pocztowy,
        nr_kom,nr_tel,fax,dodatkowe_informacje,www,nazwa_firmy,regon,nip FROM uzytkownik
        INNER JOIN kontakty ON kontakty.id_kontakt=uzytkownik.id_kontakt
        INNER JOIN adres ON adres.id_adres= uzytkownik.id_adres
        WHERE id_uzytkownik = :id_uzytkownik limit 1');
        $sth ->bindValue(':id_uzytkownik',$idSession,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            die("Coś psozło nie tak! Spróbuj ponnownie się zalogować!") ;
        }
        else {
            $imie = $result['imie'];
            $nazwisko = $result['nazwisko'];
            $rodzaj_klienta= $result['rodzaj_uzytkownika'];
            $ulica = $result['ulica'];
            $nr_domu = $result['nr_domu'];
            $wojewodztwo = $result['wojewodztwo'];
            $kod_pocztowy = $result['kod_pocztowy'];
            $nr_kom = $result['nr_kom'];
            $nr_tel = $result['nr_tel'];
            $fax = $result['fax'];
            $dodatkowe_informacje = $result['dodatkowe_informacje'];
            $www = $result['www'];
            $nazwa_firmy = $result['nazwa_firmy'];
            $regon = $result['regon'];
            $nip = $result['nip'];
            $miejscowosc = $result['miejscowosc'];
        }

        $dataArray = array($imie,$nazwisko,$rodzaj_klienta,$ulica,$nr_domu,$wojewodztwo,$kod_pocztowy,$nr_kom,$nr_tel,$fax,$dodatkowe_informacje,$www,$nazwa_firmy,$regon,$nip,$miejscowosc);
            
    

        echo json_encode($dataArray);


?>