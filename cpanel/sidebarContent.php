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
                    <!-- PANEL KLIENTA -->
                    <ul class="list-group mb-2">
                        <a href="/cpanel/index.php" class="list-group-item list-group-item-action list-group-item-info">
                            <i class='bx bxs-id-card'></i>
                            Panel klienta
                        </a>
                    </ul>

                    <ul class="list-group mb-2">
                        <div>
                            <a data-toggle="collapse" href="#mojprofil"
                                class="list-group-item list-group-item-action list-group-item-primary">
                                <i class='bx bxs-user-detail'></i>
                                Mój profil
                            </a>
                        </div>
                        <div class="collapse" id="mojprofil">
                            <a href="/cpanel/zmianadanychosobowych.php" class="list-group-item list-group-item-action">Zmiana
                                danych osobowych</a>
                            <a href="/cpanel/zmianahasla.php" class="list-group-item list-group-item-action">Zmiana hasła</a>
                            <a href="/cpanel/zmianamaila.php" class="list-group-item list-group-item-action">Zmiana maila</a>
                            <a href="/cpanel/usuwaniekonta.php" class="list-group-item list-group-item-action">Usuń Konto</a>
                        </div>
                    </ul>
                        <!-- SAMOCHODY KLIENTA -->
                    <ul class="list-group mb-2">
                        <div>
                            <a data-toggle="collapse" href="#samochody" class="list-group-item list-group-item-action list-group-item-primary">
                                <i class='bx bxs-car'></i>
                                Samochody
                            </a>
                        </div>
                        <div class="collapse" id="samochody">
                            <a href="/cpanel/dodawaniesamochodow.php" class="list-group-item list-group-item-action">Dodaj
                                samochód</a>
                            <a href="/cpanel/statussamochodow.php" class="list-group-item list-group-item-action">Status
                                samochodów</a>
                        </div>
                    </ul>

                        <!-- MODUŁY PRACOWNIKA -->
                    <?php
                        if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                            echo '
                                <ul class="list-group mb-2">
                                    <div>
                                        <a data-toggle="collapse" href="#employeePanel"
                                            class="list-group-item list-group-item-action list-group-item-primary">
                                            <i class="bx bxs-music"></i>Panel Pracownika</a>
                                    </div>
                                    <div class="collapse" id="employeePanel">
                                        <ul class="list-group mb-2">
                                        <div class="mx-1 mt-1">
                                            <a data-toggle="collapse" href="#employeePojazdy"
                                                class="list-group-item list-group-item-action list-group-item-secondary">Pojazdy</a>
                                        </div>
                                        <div class="collapse mx-2" id="employeePojazdy">
                                            <a href="/cpanel/employeeModules/employeeCars.php" class="list-group-item list-group-item-action">Status Wypożyczeń</a>
                                            <a href="/cpanel/employeeModules/employeeCarsAcceptance.php" class="list-group-item list-group-item-action">Akceptacje Pojazdów</a>
                                            <a href="/cpanel/employeeModules/employeeCarsInspection.php" class="list-group-item list-group-item-action">Przeglądy</a>
                                        </div>
                                        </ul>

                                    <a href="/cpanel/employeeModules/employeeNewsletter.php" class="list-group-item list-group-item-action">Newsletter</a>
                                    
                                    
                                    
                                    ';

                        // MODUŁY ADMINA
                            if($_SESSION['rodzaj_konta'] == 4){
                                echo'
                                        <a href="/cpanel/employeeModules/employees.php" class="list-group-item list-group-item-action">Pracownicy</a>
                                        
                                ';
                            }
                            echo '</div></ul>';
                        }

                    ?>

                    <!-- ODSYŁACZE DO STRONY GŁÓWNEJ -->
                    <a class="nav-link text-secondary" href="/index.php">Strona główna<span class="sr-only">(current)</span></a>