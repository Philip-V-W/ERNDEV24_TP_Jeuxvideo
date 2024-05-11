<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php
$console_id = isset($_GET['console_id']) ? intval($_GET['console_id']) : null;
$order = isset($_GET['order']) ? $_GET['order'] : null;
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : null;

echo '<div class="d-flex flex-wrap justify-content-center">';

if ($order_by === 'price') {
    get_games_by_platform_id($console_id, $order);
} elseif ($order_by === 'age') {
    get_games_ordered_by_age($console_id, $order);
} else {
    get_games_by_platform_id($console_id);
}

echo '</div>';
?>

<?php require_once('./templates/_footer.php') ?>