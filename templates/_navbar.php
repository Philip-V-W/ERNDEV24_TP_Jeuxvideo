<div class="d-flex flex-column w-100">
    <img class="m-4 logo" src="../images/logo.png" alt="logo du site">
</div>

<nav class="navbar navbar-expand-lg w-100">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-buttons nav-link btn btn-primary text-light px-3 fw-semibold"
                       style="margin-right: 1px"
                       aria-current="page" href="../index.php">Tous les jeux</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                       style="margin-right: 1px" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Par console </a>
                    <ul class="dropdown-menu bg-primary rounded-0">
                        <?php get_games_by_platform(); ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Par prix </a>
                    <ul class="dropdown-menu bg-primary">
                        <li><a class="dropdown-item fw-semibold text-light" href="../toys.php?order=asc">Prix croissant</a></li>
                        <li><a class="dropdown-item fw-semibold text-light" href="../toys.php?order=desc">Prix décroissant</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
