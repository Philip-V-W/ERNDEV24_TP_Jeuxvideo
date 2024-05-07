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
    $query = "SELECT j.id, j.titre, j.description, j.date_sortie, j.image_path, ra.label AS restriction_age_label, ra.image_path AS restriction_age_image_path, n.note_media AS note_media, n.note_utilisateur AS note_utilisateur
FROM jeu AS j
INNER JOIN restriction_age AS ra ON j.id = ra.id
INNER JOIN note AS n ON j.id = n.id
WHERE j.id = ?";
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
                    // Prepare restriction_age array
                    $restriction_age = [
                        'image_path' => $jeu['restriction_age_image_path'],
                        'label' => $jeu['restriction_age_label']
                    ];
                    // Prepare note array
                    $note = [
                        'note_media' => $jeu['note_media'],
                        'note_utilisateur' => $jeu['note_utilisateur']
                    ];
                    // on appelle la methode pour afficher les jeux video
                    render_game_detail($jeu, $restriction_age, $note);
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
    $query = "SELECT c.id, c.label, COUNT(gc.jeu_id) AS game_count
FROM console AS c
         INNER JOIN game_console AS gc ON c.id = gc.console_id
GROUP BY c.id, c.label";
    // on prepare la requete
    if ($result = mysqli_query($connection, $query)) {
        // on verifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {
            // on peut parcourir les resultats
            while ($jeu = mysqli_fetch_assoc($result)) { ?>
                <li><a class="dropdown-item" href="../gaming_platforms.php?console_id=<?php echo $jeu['id'] ?>">
                        <?php echo $jeu['label'] . ' (' . $jeu['game_count'] . ')' ?>
                    </a>
                </li>
            <?php }
        }
    }
}
