<?php
    if(isset($_POST["aktywacja"])){
        $kodAktywacyjny = $_POST["aktywacja"];
        if(!empty($kodAktywacyjny)){
            require 'config.php';
            $sth = $db -> prepare('CALL aktywacja_konta(:kod)');
            $sth -> bindValue(':kod',$kodAktywacyjny,PDO::PARAM_STR);
            $sth -> execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            if($result){
                $id = $result["id_uzytkownik"];
                $sth = $db-> prepare('UPDATE uzytkownik SET czy_aktywowany = 1 WHERE (id_uzytkownik = :id)');
                $sth -> bindValue(':id',$id,PDO::PARAM_INT);
                $sth -> execute();
                
                echo "Konto zostało aktywowane";
            }
            else{
                die("Podany kod aktywacyjny jest niepoprawny lub wygasła jego ważność");
            }
        }

    }
    else{
        die("Błędny kod aktywacyjny");
    } 
?>