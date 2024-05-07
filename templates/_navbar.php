<div class="d-flex flex-column w-100">
    <a href="../index.php">
        <img class="m-4 logo" src="../images/logo.png" alt="logo du site">
    </a>
</div>

<nav class="navbar navbar-expand-lg w-100">
    <div class="container-fluid">
        <!--        <button class="navbar-toggler btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"-->
        <!--                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">-->
        <!--            <span class="navbar-toggler-icon"></span>-->
        <!--        </button>-->
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-buttons nav-link btn btn-primary text-light px-3" style="margin-right: 0.5px"
                       aria-current="page" href="#">Tous les jeux</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3" href="#"
                       role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Par console </a>
                    <ul class="dropdown-menu">
                        <?php get_games_by_platform(); ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
