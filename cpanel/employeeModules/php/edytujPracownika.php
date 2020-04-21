<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $id_pracownika = $_POST["id"];
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
    $data_zatrudnienia = $_POST["data_zatrudnienia"];
    $data_zwolnienia = $_POST["data_zwolnienia"];
    $rodzaj_pracownika = $_POST["rodzajPracownika"];
    $aktywacja = $_POST["aktywacjaPracownika"];



try{
    $sth = $db->prepare("Call zaladuj_pracownika(:id)");
    $sth -> bindValue(":id",$id_pracownika,PDO::PARAM_INT);
    $sth ->execute();

    if($sth ->rowCount() != 0){
        $response = $sth->fetchAll();
        $id_adres = $response[0]["id_adres"];
        $id_kontakt = $response[0]["id_kontakt"];
    }
    else{
        echo 'Problem z załadowaniem pracownika';
    }

    $sth = $db->prepare("UPDATE pracownicy SET imie = :imie,nazwisko = :nazwisko,rodzaj_pracownika = :rodzaj,data_zatrudnienia = :data_za,data_zwolnienia = :data_zw,czy_aktywowany = :aktywacja WHERE id_pracownik = :id");
    $sth -> bindValue(":id",$id_pracownika,PDO::PARAM_INT);
    $sth -> bindValue(":imie",$imie,PDO::PARAM_STR);
    $sth -> bindValue(":nazwisko",$nazwisko,PDO::PARAM_STR);
    $sth -> bindValue(":rodzaj",$rodzaj_pracownika,PDO::PARAM_INT);
    $sth -> bindValue(":aktywacja",$aktywacja,PDO::PARAM_INT);
    $sth -> bindValue(":data_za",$data_zatrudnienia,PDO::PARAM_STR);
    
    if(!empty($data_zwolnienia)){
        $sth -> bindValue(":data_zw",$data_zwolnienia,PDO::PARAM_STR);
    }
    else{
        $sth -> bindValue(":data_zw",null, PDO::PARAM_INT);
    }
    $sth ->execute();

    $sth = $db->prepare("UPDATE adres SET miejscowosc = :miejscowosc,wojewodztwo = :woj,kod_pocztowy = :kod,ulica = :ulica,nr_domu = :nr,dodatkowe_informacje = :informacje WHERE id_adres = :id");
    $sth -> bindValue(":id",$id_adres,PDO::PARAM_INT);
    $sth -> bindValue(":miejscowosc",$miasto,PDO::PARAM_STR);
    $sth -> bindValue(":woj",$wojewodztwo,PDO::PARAM_STR);
    $sth -> bindValue(":kod",$kod,PDO::PARAM_STR);
    $sth -> bindValue(":ulica",$ulica,PDO::PARAM_STR);
    $sth -> bindValue(":nr",$nr_domu,PDO::PARAM_INT);
    $sth -> bindValue(":informacje",$dodatkowe_informacje,PDO::PARAM_STR);
    
    $sth->execute();

   
        $sth = $db->prepare("UPDATE kontakty_pracownicy SET linkedin = :linkedin, email_pracowniczy = :email_prac, nr_kom = :nr_kom, nr_tel = :nr_tel, email = :email WHERE id_kontakt = :id");
        $sth -> bindValue(":id",$id_kontakt,PDO::PARAM_INT);
        $sth -> bindValue(":linkedin",$linkedin,PDO::PARAM_STR);
        $sth -> bindValue(":email_prac",$email_pracowniczy,PDO::PARAM_STR);
        $sth -> bindValue(":nr_kom",$komorka,PDO::PARAM_STR);
        $sth -> bindValue(":nr_tel",$telefon,PDO::PARAM_STR);
        $sth -> bindValue(":email",$email,PDO::PARAM_STR);

        $sth->execute();

        echo 'Zmieniono Dane Pracownika';


}
catch(Exception $e){
    echo 'Wystąpił błąd '+$e->getMessage();
}

?>