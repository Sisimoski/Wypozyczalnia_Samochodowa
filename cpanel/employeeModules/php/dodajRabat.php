<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $kod = $_POST["kod"];
    $procent = $_POST["procent"];
    $data = $_POST["data"];
    $ilosc = $_POST["ilosc"];
    $dzisiaj = date('Y-m-d');

    if($dzisiaj < $data){

        $sth = $db->prepare("SELECT * FROM kody_rabatowe WHERE nazwa_kodu = :kod");
        $sth -> bindValue(":kod",$kod,PDO::PARAM_STR);
        $sth->execute();

        if($sth->rowCount() == 0){


            try{
            $sth = $db->prepare("INSERT INTO kody_rabatowe(nazwa_kodu,ilosc_kodow, procent_rabatu, data_waznosci) VALUES (:kod,:ilosc, :procent, :data);");
            $sth -> bindValue(":kod",$kod,PDO::PARAM_STR);
            $sth -> bindValue(":ilosc",$ilosc,PDO::PARAM_INT);
            $sth -> bindValue(":procent",$procent,PDO::PARAM_INT);
            $sth -> bindValue(":data",$data,PDO::PARAM_STR);
            $sth->execute();
            echo "Utworzono Kod Rabatowy";    
            
            }
            catch(Exception $e){
                echo "Wystąpił błąd"+ $e->getMessage();
            }
        }
        else{
            echo "Podany kod jest już utworzony";
        }
    }
    else{
        echo "Wybrano niepoprawną datę";
    }

?>