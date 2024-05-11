<div class="d-flex flex-column w-100">
    <img class="m-4 logo" src="../images/logo.png" alt="logo du site">
</div>

<?php
$currentFile = basename($_SERVER['PHP_SELF']);
$hideNavItems = $currentFile === 'game_detail.php';
?>

<nav class="navbar navbar-expand-lg w-100">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <!-- bouton pour retourner a la page d'accueil -->
                <li class="nav-item">
                    <a class="nav-buttons nav-link btn btn-primary text-light px-3 fw-semibold"
                       style="margin-right: 1px"
                       aria-current="page" href="../index.php">Tous les jeux</a>
                </li>
                <!-- dropdown pour afficher les jeux par console -->
                <li class="nav-item dropdown">
                    <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                       style="margin-right: 1px" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">Par console </a>
                    <ul class="dropdown-menu bg-primary rounded-0">
                        <?php get_games_by_platform(); ?>
                    </ul>
                </li>
                <!-- dropdown pour afficher les jeux par prix -->
                <?php if (!$hideNavItems) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                           style="margin-right: 1px"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Par prix </a>
                        <ul class="dropdown-menu bg-primary">
                            <?php
                            $console_id = isset($_GET['console_id']) ? intval($_GET['console_id']) : null;
                            $price_url = $console_id ? "../gaming_platforms.php?console_id=$console_id&order_by=price&order=" : "../game_price_filter.php?order=";
                            ?>
                            <li><a class="dropdown-item fw-semibold text-light" href="<?php echo $price_url; ?>asc">Prix
                                    croissant</a></li>
                            <li><a class="dropdown-item fw-semibold text-light" href="<?php echo $price_url; ?>desc">Prix
                                    décroissant</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <!-- dropdown pour afficher les jeux par avis -->
                <?php if (!$hideNavItems) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                           style="margin-right: 1px"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Par avis </a>
                        <ul class="dropdown-menu bg-primary">
                            <?php
                            $console_id = isset($_GET['console_id']) ? intval($_GET['console_id']) : null;
                            $press_note_url = $console_id ? "../gaming_platforms.php?console_id=$console_id&order_by=press_note&order=" : "../game_note_press_filter.php?order=";
                            ?>
                            <li><a class="dropdown-item fw-semibold text-light"
                                   href="<?php echo $press_note_url; ?>asc">Avis
                                    presse croissant</a></li>
                            <li><a class="dropdown-item fw-semibold text-light"
                                   href="<?php echo $press_note_url; ?>desc">Avis
                                    presse décroissant</a></li>
                            <?php
                            $console_id = isset($_GET['console_id']) ? intval($_GET['console_id']) : null;
                            $user_note_url = $console_id ? "../gaming_platforms.php?console_id=$console_id&order_by=user_note&order=" : "../game_note_user_filter.php?order=";
                            ?>
                            <li><a class="dropdown-item fw-semibold text-light" href="<?php echo $user_note_url; ?>asc">Avis
                                    utilisateur croissant</a></li>
                            <li><a class="dropdown-item fw-semibold text-light"
                                   href="<?php echo $user_note_url; ?>desc">Avis
                                    utilisateur décroissant</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <!-- dropdown pour afficher les jeux par age -->
                <?php if (!$hideNavItems) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-buttons nav-link dropdown-toggle btn btn-primary text-light px-3 fw-semibold"
                           href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Par age </a>
                        <ul class="dropdown-menu bg-primary">
                            <?php
                            $console_id = isset($_GET['console_id']) ? intval($_GET['console_id']) : null;
                            $age_url = $console_id ? "../gaming_platforms.php?console_id=$console_id&order_by=age&order=" : "../game_age_filter.php?order=";
                            ?>
                            <li><a class="dropdown-item fw-semibold text-light" href="<?php echo $age_url; ?>asc">Age
                                    croissant</a></li>
                            <li><a class="dropdown-item fw-semibold text-light" href="<?php echo $age_url; ?>desc">Age
                                    décroissant</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
