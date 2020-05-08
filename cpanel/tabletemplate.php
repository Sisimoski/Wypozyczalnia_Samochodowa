<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>TABLE PAGE TEMPLATE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
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
        <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
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
                            <li class="breadcrumb-item"><a href="index.php">X</a></li>
                            <li class="breadcrumb-item active">Y</li>
                            <li class="breadcrumb-item active" aria-current="page">Z</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Page Title</h1>
                        </div>
                        <!-- Table Template -->
                        <div class="">
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">TH 1</th>
                                        <th scope="col">TH 2</th>
                                        <th scope="col">TH 3</th>
                                    </tr>
                                </thead>
                                <tbody class="" id="">

                                </tbody>
                            </table>
                            <div id="alert"></div>
                        </div>
                        <!-- End of Table Template -->
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal Template -->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Modal body
                    <form class="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Label</label>
                            <input id="" class="form-control" name="" placeholder="Input">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="komunikat"> </div>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
                            <button type="button" id="editCarButton" name="editCarButton" value=""
                                class="btn btn-success">Zatwierdź zmianę</button>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Button</button>
                    <button type="button" class="btn btn-primary">Button</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>