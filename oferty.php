<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $searchResult=NULL;
    $producentF='default';
    $modelF='default';
    $rokF='default';
    if(isset($_GET['searchResult'])){
    $searchResult = ($_GET['searchResult']);
    }

    if(isset($_GET['producentF'])){
        $producentF = ($_GET['producentF']);
    }

    if(isset($_GET['modelF'])){
        $modelF = ($_GET['modelF']);
    }

    if(isset($_GET['rokF'])){
        $rokF = ($_GET['rokF']);
    }

    $limit = 12;
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
    $start = ($page - 1) * $limit;

    if($searchResult!=NULL){
        $sth = $db->prepare("SELECT count(id_specyfikacja_samochodu) FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE '%{$searchResult}%' OR
        model LIKE '%{$searchResult}%'");
    }
    else if($rokF!='default'){
        $sth = $db->prepare("SELECT count(id_specyfikacja_samochodu) FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent AND model LIKE :model
        AND rok LIKE :rok ");
         $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
         $sth ->bindValue(':model',$modelF,PDO::PARAM_STR);
         $sth ->bindValue(':rok',$rokF,PDO::PARAM_STR);
    }
    else if($modelF!='default'){
        $sth = $db->prepare("SELECT count(id_specyfikacja_samochodu) FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent AND model LIKE :model");
         $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
         $sth ->bindValue(':model',$modelF,PDO::PARAM_STR);
    }
    else if($producentF!='default'){
        $sth = $db->prepare("SELECT count(id_specyfikacja_samochodu) FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent");
         $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
    }
    else{
    $sth = $db->prepare('SELECT count(id_specyfikacja_samochodu) FROM specyfikacja_samochodu WHERE czy_posiadany != 3');
    }
    $sth->execute();
    $ammountOfCars = $sth->fetchAll();
    

    $pages = ceil( $ammountOfCars[0][0] / $limit);

    if($sth ->rowCount() == 0){
        // Tutaj wyświetlanie informacji że nie ma samochodów w bazie;
    }
    else{
        if($searchResult!=NULL){
            $sth = $db->prepare("SELECT * FROM specyfikacja_samochodu WHERE producent LIKE '%{$searchResult}%' OR
            model LIKE '%{$searchResult}%' AND czy_posiadany != 3 LIMIT :start , :limit ");
        }
        else if($rokF!='default'){
            $sth = $db->prepare("SELECT * FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent AND model LIKE :model
            AND rok LIKE :rok LIMIT :start , :limit");
             $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
             $sth ->bindValue(':model',$modelF,PDO::PARAM_STR);
             $sth ->bindValue(':rok',$rokF,PDO::PARAM_STR);
        }
        else if($modelF!='default'){
            $sth = $db->prepare("SELECT * FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent AND model LIKE :model LIMIT :start , :limit");
             $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
             $sth ->bindValue(':model',$modelF,PDO::PARAM_STR);
        }
        else if($producentF!='default'){
            $sth = $db->prepare("SELECT * FROM specyfikacja_samochodu WHERE czy_posiadany != 3 AND producent LIKE :producent LIMIT :start , :limit");
             $sth ->bindValue(':producent',$producentF,PDO::PARAM_STR);
        }
        else{
        $sth = $db->prepare('SELECT * FROM specyfikacja_samochodu WHERE czy_posiadany != 3 LIMIT :start , :limit ');
        }
        $sth ->bindValue(":start",$start,PDO::PARAM_INT);
        $sth ->bindValue(":limit",$limit,PDO::PARAM_INT);
        $sth ->execute();  
        $amountOfCarsInPage = $sth ->rowCount();
        
        if($amountOfCarsInPage != 0){
            $pageCars = $sth->fetchAll();
        }
    }
    if(!isset($_GET['searchResult'])){
        $previousPage = '?page='.($page - 1);
        $nextPage = '?page='.($page + 1);
    }
    else{
        $previousPage = '?page='.($page - 1).'&searchResult='.$searchResult;
        $nextPage = '?page='.($page + 1).'&searchResult='.$searchResult;
    }
//producent
    if(isset($_GET['producentF'])){
        $previousPage = '?page='.($page - 1).'&producentF='.$producentF;
        $nextPage = '?page='.($page + 1).'&producentF='.$producentF;
    }
//model
    if(isset($_GET['modelF'])){

        $previousPage = '?page='.($page - 1).'&producentF='.$producentF.'&modelF='.$modelF;
        $nextPage = '?page='.($page + 1).'&producentF='.$producentF.'&modelF='.$modelF;
    }
//rok 
    if(isset($_GET['rokF'])){

        $previousPage = '?page='.($page - 1).'&producentF='.$producentF.'&modelF='.$modelF.'&rokF='.$rokF;
        $nextPage = '?page='.($page + 1).'&producentF='.$producentF.'&modelF='.$modelF.'&rokF='.$rokF;
    }
    
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Oferty</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>

    <script src="./js/index.js"></script>
    <script src="js/newsletter.js"></script>
    <script src="js/oferty.js"></script>
</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary ml-2'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_konta'])){
                    if($_SESSION['rodzaj_konta'] == 1 || $_SESSION['rodzaj_konta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>

    <!-- Sekcja Hero -->
    <section id="herous" class="text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12 pt-lg-0 order-2 order-lg-1">
                    <h1>Oferty</h1>
                    <h2>Wybierz samochód z dostępnej oferty.</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="car-catalog" class="car-catalog car-catalog-bg text-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <!-- Default Filter Card -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="id1" role="tablist">
                               
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="nav1" role="tabpanel">
                                <form class="findCarForm" id="findCarForm" method="POST">
                                            <label for="searchResult">Wyszukiwarka</label>
                                            <input id="searchResult" name="searchResult" class="form-control" placeholder="Wpisz jakiego samochodu szukasz :)"> 
                                            </br>                                       
                                        <button name="findCarButton" id="findCarButton" class="btn btn-primary" type="button">Szukaj</button>
                                    
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav2" role="tabpanel">
                                    <form>
                                        <div class="form-group">
                                            <label for="#">Title 2:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Zastosuj</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Default Filter Card -->
                    <!-- Filter Panel -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="carFilterCard" role="tablist">
                                
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel">
                                    <form class="filterForm" method="POST">
                                    <label for="searchResult">Filtry:</label>
                                        <div class="form-group">
                                            <label for="producentFilter">Producent:</label>
                                            <select class="form-control" id="producentFilter" name="producentFilter">
                                            <option value="default">Wszystkie</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="modelFilter">Model:</label>
                                            <select class="form-control" id="modelFilter"  name="modelFilter" disabled>
                                            <option value="default">Wszystkie</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="yearFilter">Rok produkcji od:</label>
                                            <select class="form-control" id="yearFilter" name="yearFilter" disabled>
                                            <option value="default">Wszystkie</option>
                                            </select>
                                        </div>
                                        <button name="filterButton" id="filterButton" type="button" class="btn btn-primary">Filtruj</button>
                                    </form>
                                </div>
                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Oferty Cards -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 justify-content-center card-content" id="scrollThere">
                <?php for($j = 0; $j < $amountOfCarsInPage; $j++) : ?>
                    <div class="col mb-4">
                        <div class="card bg-light text-center h-100">
                            <img src="/CarPictures/<?= $pageCars[$j]['fotografia'] ?>" class="card-img-top" alt="Default Card Image">
                            <div class="card-body card-body-flex">
                                <h5 class="card-title"><?= $pageCars[$j]['producent'].' '.$pageCars[$j]['model']  ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $pageCars[$j]['cena_brutto'] ?>zł/dzień</h6>
                                <div class="text-left">
                                    <p class="card-text">
                                        <h6><b>Klasa: <?= $pageCars[$j]['segment'] ?></b></h6>
                                        Rok produkcji: <?= $pageCars[$j]['rok'] ?><br>
                                        Silnik: <?= $pageCars[$j]['pojemnosc_silnika'].'L '.$pageCars[$j]['pojemnosc_silnika'].'KM '.$pageCars[$j]['typ_silnika']  ?><br>
                                        Skrzynia biegów: <?= $pageCars[$j]['skrzynia_biegow'] ?>
                                    </p>
                                </div>
                                <a href="wynajem/samochod.php?idCar=<?= $pageCars[$j]['id_specyfikacja_samochodu'] ?>" class="btn  <?= ($pageCars[$j]['czy_posiadany'] == 2 ? 'disabled btn-danger' : 'btn-primary')  ?>"><?= ($pageCars[$j]['czy_posiadany'] == 2 ? 'Aktualnie niedostępny' : 'Wypożycz')  ?></a>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
                
                
            </div>

            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item" id="previousPage">
                        <a class="page-link"  href="/oferty.php<?= $previousPage; ?>" tabindex="-1" >Poprzednia strona</a>
                    </li>
                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                        <li class="page-item" id="pageID-<?= $i; ?>">
                            
                            <?php
                                $string = "";
                                if(isset($_GET['searchResult'])){
                                    $string =  "<a class='page-link'  href='/oferty.php?page=".$i.'&searchResult='.$searchResult."' >".$i."</a>";
                                }
                                //producent
                                if(isset($_GET['producentF'])){
                                    $string = "<a class='page-link'  href='/oferty.php?page=".$i.'&producentF='.$producentF."' >".$i."</a>";
                                }
                                //model
                                if(isset($_GET['modelF'])){
                                    $string = "<a class='page-link'  href='/oferty.php?page=".$i.'&producentF='.$producentF.'&modelF='.$modelF."' >".$i."</a>";
                                }
                                //rok 
                                if(isset($_GET['rokF'])){
                                    $string = "<a class='page-link'  href='/oferty.php?page=".$i.'&producentF='.$producentF.'&modelF='.$modelF.'&rokF='.$rokF."' >".$i."</a>";
                                }
                                if($string == ""){
                                    $string =  "<a class='page-link'  href='/oferty.php?page=".$i."' >".$i."</a>";
                                }
                                echo $string;
                             
                             ?>
                        </li>
                    <?php endfor; ?>
                    
                    <li class="page-item" id="nextPage">
                        <a class="page-link"  tabindex="<?=$i++ ?>" href="/oferty.php<?= $nextPage; ?>">Następna strona</a>
                    </li>
                </ul>
            </nav>

            <!-- <div class="row justify-content-center">
                <div class="col d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><img src="images/samochody/Ford_mondeo.png" class="img-fluid" alt="Ford Mondeo"></div>
                        <div class="mt-auto">
                            <h5 class="title">Ford Mondeo</h5>
                            <h6 class="mb-2 text-muted">95zł</h6>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><img src="images/samochody/hyundai i10.png" class="img-fluid"
                                alt="Ford Mondeo"></div>
                                <div class="mt-auto">
                                    <h3 class="title">Ford Mondeo</h4>
                                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                            excepturi sint occaecati cupiditate</p>

                                </div>
                    </div>
                </div>
                
            </div> -->
        </div>
    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>
    <script>updatePaginator(<?php echo $page.','.$pages ?>);</script>

</body>

</html>