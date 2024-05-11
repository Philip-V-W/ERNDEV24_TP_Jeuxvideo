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
    $query = "
SELECT j.id,
       j.titre,
       j.description,
       j.prix,
       j.date_sortie,
       j.image_path,
       ra.label AS restriction_age_label,
       ra.image_path AS restriction_age_image_path,
       n.note_media,
       n.note_utilisateur,
       GROUP_CONCAT(DISTINCT c.label) AS console_label
FROM jeu j
         INNER JOIN restriction_age ra ON j.age_id = ra.id
         INNER JOIN note n ON j.id = n.id
         INNER JOIN game_console gc ON j.id = gc.jeu_id
         INNER JOIN console c ON gc.console_id = c.id
WHERE j.id = ?
GROUP BY j.id";
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
                    // prepare restriction_age array
                    $restriction_age = [
                        'image_path' => $jeu['restriction_age_image_path'],
                        'label' => $jeu['restriction_age_label']
                    ];
                    // prepare note array
                    $note = [
                        'note_media' => $jeu['note_media'],
                        'note_utilisateur' => $jeu['note_utilisateur']
                    ];
                    $console = [
                        'console_label' => $jeu['console_label']
                    ];
                    // on appelle la methode pour afficher les jeux video
                    render_game_detail($jeu, $restriction_age, $note, $console);
                }
            }
        }
    }
}

// methode pour afficher les jeux video disponibles en fonction de la plateforme
function get_games_by_platform()
{
    // on recupere la connexion
    global $connection;
    // on cree la requete
    $query = "
SELECT c.id, 
       c.label, 
       COUNT(gc.jeu_id) game_count
FROM console c
         INNER JOIN game_console gc ON c.id = gc.console_id
GROUP BY c.id, c.label";
    // on prepare la requete
    if ($result = mysqli_query($connection, $query)) {
        // on verifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {
            // on peut parcourir les resultats
            while ($jeu = mysqli_fetch_assoc($result)) { ?>
                <li><a class="dropdown-item fw-semibold text-light"
                       href="../gaming_platforms.php?console_id=<?php echo $jeu['id'] ?>">
                        <?php echo $jeu['label'] . ' ( ' . $jeu['game_count'] . ' )' ?>
                    </a>
                </li>
            <?php }
        }
    }
}

// methode pour afficher les jeux video en fonction de leur plateforme id
function get_games_by_platform_id($console_id, $order = null)
{
    global $connection;
    $orderQuery = $order ? "ORDER BY j.prix $order" : "";
    $query = "
SELECT j.* 
FROM jeu j 
    INNER JOIN game_console gc ON j.id = gc.jeu_id 
WHERE gc.console_id = ? $orderQuery";
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $console_id);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Erreur lors de l'execution de la requete";
        }
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            while ($jeu = mysqli_fetch_assoc($result)) {
                render_all_video_games($jeu);
            }
        }
    }
}

// methode pour afficher les jeux video en fonction du prix
function get_games_ordered_by_price($order)
{
    // on expose la variable connection dans la fonction
    global $connection;
    // on cree la requete
    $query = "
SELECT * 
FROM jeu 
ORDER BY prix " . ($order == 'asc' ? 'ASC' : 'DESC');
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

// methode pour afficher les jeux video en fonction des avis presse
function get_games_ordered_by_note_press($order)
{
    // on expose la variable connection dans la fonction
    global $connection;
    // on cree la requete
    $query = "
SELECT j.*
FROM jeu j
    INNER JOIN note n ON j.note_id = n.id
ORDER BY n.note_media " . ($order == 'asc' ? 'ASC' : 'DESC');

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

// methode pour afficher les jeux video en fonction des avis utilisateur
function get_games_ordered_by_note_user($order)
{
    // on expose la variable connection dans la fonction
    global $connection;
    // on cree la requete
    $query = "
SELECT j.*
FROM jeu j
    INNER JOIN note n ON j.note_id = n.id
ORDER BY n.note_utilisateur " . ($order == 'asc' ? 'ASC' : 'DESC');

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

// methode pour afficher les jeux video en fonction de l'age
function get_games_ordered_by_age($order)
{
    // on expose la variable connection dans la fonction
    global $connection;
    // on cree la requete
    $query = "
SELECT j.* 
FROM jeu j 
    INNER JOIN restriction_age ra ON j.age_id = ra.id 
ORDER BY ra.label " . ($order == 'asc' ? 'ASC' : 'DESC');
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