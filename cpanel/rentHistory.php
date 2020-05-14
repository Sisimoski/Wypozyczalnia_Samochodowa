<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Historia Wypożyczeń</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="./js/rater.min.js"></script> 
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/carManagement.js"></script>
    

</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("headerContent.php");
        ?>
        </nav>
    </section>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                            include("sidebarContent.php");
                        ?>
                </div>
            </nav>
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel Klienta</a></li>
                            <li class="breadcrumb-item active">Moje Wypożyczenia</li>
                            <li class="breadcrumb-item active" aria-current="page">Historia Wypożyczeń</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Historie Wypożyczeń</h1>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <h3 class="ml-2">Filtruj</h3>
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 border-bottom px-2"></div>
                                <form class="historiaPojazdow">
                                    <div class="form-group d-flex">
                                        <div class="mr-3">
                                            <label for="" class="col-form-label">Od:</label>
                                        </div>
                                        <div class="flex-grow-1">
                                            <?php
                                            $d=strtotime("-1 Months");
                                            $data = date("Y-m-d", $d); 
                                            ?>
                                            <input class="form-control" type="date" id="dataOd" name="dataOd"
                                                value=<?php echo '"'.$data.'"' ?> placeholder="Data Wynajmu Od" />
                                        </div>

                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="mr-3">
                                            <label for="" class="col-form-label">Do:</label>
                                        </div>
                                        <div class="flex-grow-1">
                                            <input class="form-control" type="date" id="dataDo" name="dataDo"
                                                value=<?php echo '"'.date('Y-m-d').'"' ?>
                                                placeholder="Data Wynajmu Do" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 border-bottom px-2"></div>
                            </div>
                        </div>
                        <!-- Table Template -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pojazd</th>
                                        <th scope="col">Data Złożenia</th>
                                        <th scope="col">Data Odbioru</th>
                                        <th scope="col">Data Zwrotu</th>
                                        <th scope="col">Status Płatności</th>
                                        <th scope="col">Status Realizacji</th>
                                        <th scope="col">Funkcje</th>
                                    </tr>
                                </thead>
                                <tbody class="historyRentCars" id="">
                                
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- End of Table Template -->

                        <!-- Modal wystawiania opinii -->
                        <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog"
                            aria-labelledby="addReviewLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCarLabel">Wystawianie Opinii</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="">Twoja ocena:</label>
                                                <div id="rate"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Komentarz:</label>
                                                <textarea type="text" class="form-control" rows="4" id="commentText"
                                                    name="comment"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Zamknij</button>
                                        <button type="button" id="sendRateButton" name="sendRate" value=""
                                            class="btn btn-primary">Wystaw Opinię</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteCarLabel">Wystawianie Opinii</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                        Twoja ocena: 
                                        <div id="rate"></div>
                                        Komentarz: 
                                        <input class="form-control" type="text" id="commentText" name="comment" />
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                                        <button type="button" id="sendRateButton" name="sendRate" value=""
                                            class="btn btn-primary">Wystaw Opinię</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>