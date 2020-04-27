<?php

    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];
    
    $producent = ($_POST['producent']);
    $model= ($_POST['model']);
    $rok= ($_POST['rok_produkcji']);
    $kolor= ($_POST['kolor']);
    $opis= ($_POST['opis']);
    $cena= ($_POST['cena']);
    $vin= ($_POST['vin']);
    //new
    $segment= ($_POST['segment']);
    $typ_silnika= ($_POST['typ_silnika']);
    $moc= ($_POST['moc']);
    $pojemnosc_silnika= ($_POST['pojemnosc_silnika']);
    $srednie_spalanie= ($_POST['srednie_spalanie']);
    $skrzynia_biegow= ($_POST['skrzynia_biegow']);
    $ilosc_miejsc= ($_POST['ilosc_miejsc']);
    $pojemnosc_bagaznika= ($_POST['pojemnosc_bagaznika']);
    $zasieg= ($_POST['zasieg']);

    $numer_tablicy_rejestracyjnej=($_POST['nr_tablicy']);
    $fileExist = true;

    $sth = $db->prepare('SELECT vin FROM samochod WHERE :vin=vin OR numer_tablicy_rejestracyjnej=:numer_tablicy_rejestracyjnej limit 1');
    $sth ->bindValue(':numer_tablicy_rejestracyjnej',$numer_tablicy_rejestracyjnej,PDO::PARAM_STR);
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result){
      die("Podany VIN lub numer rejestracji znajduje się już w systemie");
    }


 //Dodawanie zdjecia
    while($fileExist==true){
      $randomNumber = rand(1000000,9999999); 
      $nazwa_pliku= "$randomNumber.png";

      $sth = $db->prepare('SELECT fotografia FROM specyfikacja_samochodu WHERE fotografia=:nazwa_pliku');
      $sth ->bindValue(':nazwa_pliku',$nazwa_pliku,PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
        if(!$result){
           $fileExist=false;
        }
      }
    
    $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/CarPictures/';
    $uploadfile = $uploaddir . basename($nazwa_pliku);
    
    if (move_uploaded_file($_FILES['zdjecie']['tmp_name'], $uploadfile)) {
   } 
   else {
    die ("Coś poszło nie tak z dodanym plikiem");
   }
    $cena_brutto =((23/ 100) * $cena)+$cena;


   //Uzupelnianei tabeli specyfikacja samochodu
    $sth = $db->prepare('INSERT INTO specyfikacja_samochodu(producent,model,rok,kolor,fotografia,opis,cena_netto,procent_vat_ceny,cena_brutto,czy_posiadany,segment,typ_silnika,moc,pojemnosc_silnika,srednie_spalenie,skrzynia_biegow,ilosc_miejsc,pojemnosc_bagaznika,zasieg,sredni_koszt_wynajmu)
    VALUES (:producent,:model,:rok,:kolor,:fotografia,:opis,:cena_netto,:procent_vat_ceny,:cena_brutto,:czy_posiadany,
    :segment,:typ_silnika,:moc,:pojemnosc_silnika,:srednie_spalanie,:skrzynia_biegow,:ilosc_miejsc,:pojemnosc_bagaznika,:zasieg,:sredni_koszt_wynajmu)');
    $sth ->bindValue(':producent',$producent,PDO::PARAM_STR);
    $sth ->bindValue(':model',$model,PDO::PARAM_STR);
    $sth ->bindValue(':rok',$rok,PDO::PARAM_STR);
    $sth ->bindValue(':kolor',$kolor,PDO::PARAM_STR);
    $sth ->bindValue(':fotografia',$nazwa_pliku,PDO::PARAM_STR);
    $sth ->bindValue(':cena_netto',$cena,PDO::PARAM_STR);
    $sth ->bindValue(':opis',$opis,PDO::PARAM_STR);
    $sth ->bindValue(':procent_vat_ceny',23,PDO::PARAM_STR);
    $sth ->bindValue(':cena_brutto',$cena_brutto,PDO::PARAM_STR);
    $sth ->bindValue(':czy_posiadany',3,PDO::PARAM_STR);
    $sth ->bindValue(':segment',$segment,PDO::PARAM_STR);
    $sth ->bindValue(':typ_silnika',$typ_silnika,PDO::PARAM_STR);
    $sth ->bindValue(':moc',$moc,PDO::PARAM_STR);
    $sth ->bindValue(':pojemnosc_silnika',$pojemnosc_silnika,PDO::PARAM_STR);
    $sth ->bindValue(':srednie_spalanie',$srednie_spalanie,PDO::PARAM_STR);
    $sth ->bindValue(':skrzynia_biegow',$skrzynia_biegow,PDO::PARAM_STR);
    $sth ->bindValue(':ilosc_miejsc',$ilosc_miejsc,PDO::PARAM_STR);
    $sth ->bindValue(':pojemnosc_bagaznika',$pojemnosc_bagaznika,PDO::PARAM_STR);
    $sth ->bindValue(':zasieg',$zasieg,PDO::PARAM_STR);
    $sth ->bindValue(':sredni_koszt_wynajmu',211,PDO::PARAM_STR);
   
   
    $sth->execute();

    $sth = $db->prepare('SELECT id_specyfikacja_samochodu FROM specyfikacja_samochodu WHERE :fotografia=fotografia limit 1');
    $sth ->bindValue(':fotografia',$nazwa_pliku,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result){
      $id_specyfikacja_samochodu = $result['id_specyfikacja_samochodu'];
 
    }
    else{
      die("Coś poszło nie tak");
    }

  //Uzupelnianei tabeli samochod
    $sth = $db->prepare('INSERT INTO samochod(vin,id_specyfikacja_samochodu,numer_tablicy_rejestracyjnej,id_uzytkownik)
    VALUES (:vin,:id_specyfikacja_samochodu,:numer_tablicy_rejestracyjnej,:id_klient)');
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth ->bindValue(':id_specyfikacja_samochodu',$id_specyfikacja_samochodu,PDO::PARAM_STR);
    $sth ->bindValue(':numer_tablicy_rejestracyjnej',$numer_tablicy_rejestracyjnej,PDO::PARAM_STR);
    $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
    $sth->execute();

  echo "Pomyślnie dodano samochód"

?>