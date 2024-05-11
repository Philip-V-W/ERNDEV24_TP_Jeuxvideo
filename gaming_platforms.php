<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php if (isset($_GET['console_id'])) {
    $console_id = intval($_GET['console_id']);
    echo '<div class="d-flex flex-wrap justify-content-center">';
    get_games_by_platform_id($console_id);
    echo '</div>';
} ?>

<?php require_once('./templates/_footer.php') ?>