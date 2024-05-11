<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php

// on recupere le numero de la page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// on definit le nombre de jeux par page
$records_per_page = 4;
// on recupere le nombre total de jeux
$total_records = get_total_records();
// on calcule le nombre de pages
$total_pages = ceil($total_records / $records_per_page);

?>
    <div class="row justify-content-center">
        <?php get_all_video_games($page, $records_per_page) ?>
    </div>
<?php

// on affiche les liens pour naviguer entre les pages
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo "$i ";
    } else {
        echo "<a href=\"index.php?page=$i\">$i</a> ";
    }
}
?>

<?php require_once('./templates/_footer.php') ?>