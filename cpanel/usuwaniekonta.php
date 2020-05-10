<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/changeData.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">

                  <!-- Sidebar -->
                    <?php
                        include("sidebarContent.php");
                    ?>
                   
                </div>
            </nav>
            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="row px-4 mb-2">
                    <div class="col">
                        <input class="form-control form-control-sm w-100" type="text" placeholder="Szukaj"
                            aria-label="Search">
                    </div>
                </div> -->

                <!-- Popout okno do usuwanai konta -->
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountLabel"
                     aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                             <h5 class="modal-title" id="deleteAccountLabel">Usuń Konto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy napewno chcesz konto? Utracisz wszystkie twoje dane wraz z dodanymi samochodami.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
                    <button type="button" id="deleteAccountButton" name="deleteAccountButton" value="" class="btn btn-danger">Usuwam</button>
                </div>
            </div>
        </div>
    </div>
                <div class="col px-4">
                    <div class="col mb-3">
                       </div>
                       <div>
                       <button type='button' class='deleteCarButtonValue btn btn-danger' data-toggle='modal' data-target='#deleteAccountModal'  >Usuń Konto</button>
                       </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>