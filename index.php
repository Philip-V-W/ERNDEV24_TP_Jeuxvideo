<?php require_once('./sql_requests/db_connection.php') ?>
<?php require_once('./sql_requests/sql_functions.php') ?>
<?php require_once('./templates/render_functions.php') ?>

<?php require_once('./templates/_header.php') ?>
<?php require_once('./templates/_navbar.php') ?>

    <div class="d-flex flex-wrap justify-content-center">
        <?php get_all_video_games() ?>
    </div>

<?php require_once('./templates/_footer.php') ?>