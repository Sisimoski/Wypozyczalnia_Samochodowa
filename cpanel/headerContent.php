<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <a class="navbar-brand ml-2" href="../index.php">
        <img src="/images/Car4You-line-logo.png" height="50" alt="car4you logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-nowrap">
                <input class="form-control form-control" type="text" placeholder="Szukaj" aria-label="Search">
                
                </li>
            </ul>
        <button type='button' id='wyloguj' class='btn btn-outline-danger ml-0 mt-2 ml-lg-2 mt-lg-0'>Wyloguj</button>
        <div class="d-lg-none mt-2">
        <?php
            include("sidebarContent.php");
        ?>
        </div>
    </div>
</nav>