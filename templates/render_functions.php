<?php

// methode pour render tous les jeux video
function render_all_video_games($jeu)
{ ?>
    <div class="card m-2">
        <div class="d-flex flex-column align-items-center">
            <img class="jeu_image" src="../images/games/<?php echo $jeu['image_path'] ?>"
                 alt="image de <?php echo $jeu['titre'] ?>">
            <h5 class="jeu_nom"><?php echo $jeu['titre'] ?></h5>
            <p class="jeu_prix"><?php echo number_format($jeu['prix'] / 100, 2, ',', ' '); ?>€</p>
            <a class="align-self-start btn btn-primary ms-3 mb-3 text-light" href="../detail.php?jeu_id=<?php echo $jeu['id'] ?>">Voir détail</a>
        </div>
    </div>
<?php }