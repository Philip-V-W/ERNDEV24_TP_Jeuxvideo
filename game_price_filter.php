<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php
if (isset($_GET['order'])) {
    $order = $_GET['order'] == 'asc' ? 'asc' : 'desc';
    echo '<div class="d-flex flex-wrap justify-content-center">';
    get_games_ordered_by_price($order);
    echo '</div>';
} ?>

<?php require_once('./templates/_footer.php') ?>