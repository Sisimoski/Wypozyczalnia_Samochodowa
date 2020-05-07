 <!-- Default collapse  -->
 <!-- d-none, żeby się nie świeciło na stronie, ale z tego możecie korzystać -->
 <ul class="list-group mb-2 d-none">
     <div>
         <a data-toggle="collapse" href="#default"
             class="list-group-item list-group-item-action list-group-item-dark">Default</a>
     </div>
     <div class="collapse" id="default">
         <a href="#" class="list-group-item list-group-item-action">Default menu 1</a>
         <a href="#" class="list-group-item list-group-item-action">Default menu 2</a>
     </div>
 </ul>
 <!-- End of default collapse -->

 <ul class="list-group mb-2">
     <div>
         <a data-toggle="collapse" href="#mojprofil"
             class="list-group-item list-group-item-action list-group-item-primary">
             <i class='bx bxs-user-detail'></i>
             Mój profil
             <i class="bx bx-chevrons-down text-right"></i>
         </a>
     </div>
     <div class="collapse" id="mojprofil">
         <a href="/cpanel/zmianadanychosobowych.php" class="list-group-item list-group-item-action text-secondary">
             <i class="bx bx-dots-vertical-rounded"></i>
             Zmiana danych osobowych</a>
         <a href="/cpanel/zmianahasla.php" class="list-group-item list-group-item-action text-secondary">
             <i class="bx bx-dots-vertical-rounded"></i>
             Zmiana hasła</a>
         <a href="/cpanel/zmianamaila.php" class="list-group-item list-group-item-action text-secondary">
             <i class="bx bx-dots-vertical-rounded"></i>
             Zmiana maila</a>
         <a href="/cpanel/usuwaniekonta.php" class="list-group-item list-group-item-action text-danger">
             <i class="bx bx-dots-vertical-rounded"></i>
             Usuń Konto</a>
     </div>
 </ul>

 <!-- PANEL KLIENTA -->
<ul class="list-group mb-2">
    <div>
        <a data-toggle="collapse" href="#clientPanel"
            class="list-group-item list-group-item-action list-group-item-info">
            <i class='bx bxs-dashboard'></i>
            Panel Klienta
            <i class="bx bx-chevrons-down text-right"></i>
        </a>
    </div>
    <div class="collapse" id="clientPanel">
        <ul class="list-group mt-1">
            <a href="/cpanel/index.php" class="list-group-item list-group-item-action list-group-item
                                                list-group-item">
                <i class="bx bx-news"></i>
                Dashboard
            </a>
        </ul>
            <!-- SAMOCHODY KLIENTA -->
            <ul class="list-group">
                <div class="mt-1">
                    <a data-toggle="collapse" href="#samochody"
                        class="list-group-item list-group-item-action list-group-item">
                        <i class='bx bxs-car'></i>
                        Samochody
                        <i class="bx bx-chevrons-down text-right"></i>
                    </a>
                </div>
                <div class="collapse" id="samochody">
                    <a href="/cpanel/dodawaniesamochodow.php" class="list-group-item list-group-item-action text-secondary">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        Dodaj samochód</a>
                    <a href="/cpanel/statussamochodow.php" class="list-group-item list-group-item-action text-secondary">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        Status samochodów</a>
                </div>
            </ul>

            <!-- Wypożyczenia -->
            <ul class="list-group">
                <div class="mt-1">
                    <a data-toggle="collapse" href="#wypozyczenia"
                        class="list-group-item list-group-item-action list-group-item">
                        <i class='bx bxs-car'></i>
                        Moje Wypożyczenia
                        <i class="bx bx-chevrons-down text-right"></i>
                    </a>
                </div>
                <div class="collapse" id="wypozyczenia">
                    <a href="/cpanel/activeRent.php" class="list-group-item list-group-item-action text-secondary">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        Aktualne Wypożyczenia</a>
                    <a href="/cpanel/rentHistory.php" class="list-group-item list-group-item-action text-secondary">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        Historia Wypożyczeń</a>
                </div>
            </ul>
    </div>
</ul>


 
 
 <!-- MODUŁY PRACOWNIKA -->
 <?php
                        if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                            echo '
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom my-2">
                            </div>
                                <ul class="list-group mb-2">
                                    <div>
                                        <a data-toggle="collapse" href="#employeePanel"
                                            class="list-group-item list-group-item-action list-group-item-info">
                                            <i class="bx bxs-notepad"></i>
                                            Panel Pracownika
                                            <i class="bx bx-chevrons-down text-right"></i>
                                        </a>
                                    </div>
                                    <div class="collapse" id="employeePanel">
                                        <ul class="list-group mb-1">
                                        <div class=" mt-1">
                                            <a data-toggle="collapse" href="#employeePojazdy"
                                                class="list-group-item list-group-item-action list-group-item
                                                list-group-item">
                                                <i class="bx bx-car"></i>
                                                Pojazdy
                                                <i class="bx bx-chevrons-down text-right"></i>
                                            </a>
                                        </div>
                                        <div class="collapse" id="employeePojazdy">
                                            <a href="/cpanel/employeeModules/employeeCars.php"
                                                class="list-group-item list-group-item-action text-secondary">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                Status Wypożyczeń</a>
                                            <a href="/cpanel/employeeModules/employeeCarsAcceptance.php"
                                                class="list-group-item list-group-item-action text-secondary">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                Akceptacje Pojazdów</a>
                                        </div>
                                        </ul>

                                        <ul class="list-group mb-1">
                                            <a href="/cpanel/employeeModules/employeeNewsletter.php"
                                                class="list-group-item list-group-item-action list-group-item
                                                list-group-item">
                                                <i class="bx bx-news"></i>
                                                Newsletter
                                            </a>
                                        </ul>
                                    
                                    
                                    
                                    ';

                        // MODUŁY ADMINA
                            if($_SESSION['rodzaj_konta'] == 4){
                                echo'
                                <ul class="list-group mb-1">
                                    <a href="/cpanel/employeeModules/employees.php"
                                        class="list-group-item list-group-item-action list-group-item
                                        list-group-item">
                                        <i class="bx bxs-group"></i>
                                        Pracownicy
                                    </a>
                                </ul>
                                        
                                ';
                            }
                            echo '</div></ul>';
                        }

                    ?>

 <!-- ODSYŁACZE DO STRONY GŁÓWNEJ -->
 <div
     class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-top border-secondary my-2">
 </div>
 <a class="nav-link text-secondary" href="/index.php">Strona główna<span class="sr-only">(current)</span></a>
 <a class="nav-link text-secondary" href="/oferty.php">Oferty</a>
 <a class="nav-link text-secondary" href="/aboutus.php">O nas</a>
 <a class="nav-link text-secondary" href="/kontakt.php">Kontakt</a>