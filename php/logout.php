<?php
    //Usuwanie sesji użytkownika
    session_start();
    session_destroy();
    echo "Wylogowano";



?>