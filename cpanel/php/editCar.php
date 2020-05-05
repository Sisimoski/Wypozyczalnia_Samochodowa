<?php
        session_start();
        require_once("../../php/config.php");
        $idSession = $_SESSION['id'];
        $vin= ($_POST['vin']);
        $producentEdit= ($_POST['producentEdit']);
        $modelEdit= ($_POST['modelEdit']);
        $rok_produkcjiEdit= ($_POST['rok_produkcjiEdit']);
        $kolorEdit= ($_POST['kolorEdit']);
        $opisEdit= ($_POST['opisEdit']);
        $cenaEdit= ($_POST['cenaEdit']);
        $segmentEdit= ($_POST['segmentEdit']);
        $typ_silnikaEdit= ($_POST['typ_silnikaEdit']);
        $mocEdit= ($_POST['mocEdit']);
        $pojemnosc_silnikaEdit= ($_POST['pojemnosc_silnikaEdit']);
        $srednie_spalenieEdit= ($_POST['srednie_spalenieEdit']);
        $skrzynia_biegowEdit= ($_POST['skrzynia_biegowEdit']);
        $ilosc_miejscEdit= ($_POST['ilosc_miejscEdit']);
        $pojemnosc_bagaznikaEdit= ($_POST['pojemnosc_bagaznikaEdit']);
        $zasiegEdit= ($_POST['zasiegEdit']);


        $sth = $db->prepare('SELECT  id_specyfikacja_samochodu FROM samochod WHERE vin=:vin');
        $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $id_specyfikacja_samochodu = $result['id_specyfikacja_samochodu'];
  
        $cenaEdit_brutto =((23/ 100) * $cenaEdit)+$cenaEdit;
        $sth = $db->prepare('UPDATE specyfikacja_samochodu SET producent=:producentEdit,model=:modelEdit,rok=:rok_produkcjiEdit,
        kolor=:kolorEdit,opis=:opisEdit,cena_netto=:cena_netto,cena_brutto=:cena_brutto,
        segment=:segment,typ_silnika=:typ_silnika,moc=:moc,pojemnosc_silnika=:pojemnosc_silnika,srednie_spalenie=:srednie_spalenie,
        skrzynia_biegow=:skrzynia_biegow,ilosc_miejsc=:ilosc_miejsc,pojemnosc_bagaznika=:pojemnosc_bagaznika,zasieg=:zasieg      
         WHERE id_specyfikacja_samochodu=:id_specyfikacja_samochodu');
        $sth ->bindValue(':producentEdit',$producentEdit,PDO::PARAM_STR);
        $sth ->bindValue(':modelEdit',$modelEdit,PDO::PARAM_STR);
        $sth ->bindValue(':rok_produkcjiEdit',$rok_produkcjiEdit,PDO::PARAM_STR);
        $sth ->bindValue(':kolorEdit',$kolorEdit,PDO::PARAM_STR);
        $sth ->bindValue(':opisEdit',$opisEdit,PDO::PARAM_STR);
        $sth ->bindValue(':cena_netto',$cenaEdit,PDO::PARAM_STR);
        $sth ->bindValue(':cena_brutto',$cenaEdit_brutto,PDO::PARAM_STR);
        $sth ->bindValue(':segment',$segmentEdit,PDO::PARAM_STR);
        $sth ->bindValue(':typ_silnika',$typ_silnikaEdit,PDO::PARAM_STR);
        $sth ->bindValue(':moc',$mocEdit,PDO::PARAM_STR);
        $sth ->bindValue(':pojemnosc_silnika',$pojemnosc_silnikaEdit,PDO::PARAM_STR);
        $sth ->bindValue(':srednie_spalenie',$srednie_spalenieEdit,PDO::PARAM_STR);
        $sth ->bindValue(':skrzynia_biegow',$skrzynia_biegowEdit,PDO::PARAM_STR);
        $sth ->bindValue(':ilosc_miejsc',$ilosc_miejscEdit,PDO::PARAM_STR);
        $sth ->bindValue(':pojemnosc_bagaznika',$pojemnosc_bagaznikaEdit,PDO::PARAM_STR);
        $sth ->bindValue(':zasieg',$zasiegEdit,PDO::PARAM_STR);    
        $sth ->bindValue(':id_specyfikacja_samochodu',$id_specyfikacja_samochodu,PDO::PARAM_STR);
        $sth->execute();
?>