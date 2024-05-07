<?php

// methode pour afficher tous les jeux video
function get_all_video_games()
{
    // on recupere la connexion
    global $connection;
    // on cree la requete
    $query = "SELECT * FROM jeu";
    // on execute la requete
    if ($result = mysqli_query($connection, $query)) {
        // on verifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {
            // on peut parcourir les resultats
            while ($video_game = mysqli_fetch_assoc($result)) {
                // on appelle la methode pour afficher les jeux video
                render_all_video_games($video_game);
            }
        }
    }
}

// methode qui recupere les jeux video en fonction de l'id
function get_game_by_id($jeu_id)
{
    // on recupere la connexion
    global $connection;
    // on cree la requete
    $query = "SELECT * FROM jeu WHERE id = ?";
    // on prepare la requete
    if ($stmt = mysqli_prepare($connection, $query)) {
        // on bind les parametres
        mysqli_stmt_bind_param($stmt, 'i', $jeu_id);
        // on execute la requete
        if (mysqli_stmt_execute($stmt)) {
            // on recupere le resultat
            $result = mysqli_stmt_get_result($stmt);
            // on verifie que l'on a des resultats
            if (mysqli_num_rows($result) > 0) {
                // on peut parcourir les resultats
                while ($jeu = mysqli_fetch_assoc($result)) {
                    // on appelle la methode pour afficher les jeux video
                    // TODO: display the game detail
                    render_game_detail($jeu);
                }
            }
        }
    }
}

// methode pour afficher les jeux disponibles en fonction de la plateforme
function get_games_by_platform()
{
    // on recupere la connexion
    global $connection;
    // on cree la requete
    $query = "SELECT c.id, c.label, gc.id, gc.jeu_id
FROM console AS c
INNER JOIN game_console AS gc ON c.id = gc.console_id
INNER JOIN jeu AS j ON gc.jeu_id = j.id
WHERE c.id = ?;";
    // on prepare la requete
    if ($result = mysqli_query($connection, $query)) {
        // on verifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {
            // on peut parcourir les resultats
            while ($jeu = mysqli_fetch_assoc($result)) { ?>
                <li><a class="dropdown-item" href="../brand.php?brand_id=<?php echo $brand['id'] ?>">
                        <?php echo $brand['name'] . ' (' . $brand['total'] . ')' ?>
                    </a>
                </li>
            <?php }
        }
    }
}
