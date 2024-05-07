<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

<?php $console_id = intval($_GET['console_id']) ?>

    <div class="d-flex flex-wrap justify-content-center">
        <?php get_games_by_platform() ?>
    </div>


<?php require_once('./templates/_footer.php') ?>