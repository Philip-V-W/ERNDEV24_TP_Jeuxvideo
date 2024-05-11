<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php
// on recupere l'id passe dans l'url
$jeu_id = intval($_GET['jeu_id']);
// on appelle la fonction en lui transmettant l'id
get_game_by_id($jeu_id);
?>

<?php require_once('./templates/_footer.php') ?>