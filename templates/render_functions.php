<?php

// methode pour render tous les jeux video
function render_all_video_games($jeu)
{ ?>
    <a class="card m-2" href="../detail.php?jeu_id=<?php echo $jeu['id'] ?>" style="width: 18rem;">
        <div class="d-flex flex-column align-items-center card-body">
            <img class="jeu_image" src="../images/games/<?php echo $jeu['image_path'] ?>"
                 alt="image de <?php echo $jeu['titre'] ?>">
            <h5 class="jeu_nom"><?php echo $jeu['titre'] ?></h5>
            <p class="jeu_prix"><?php echo str_replace('.', ',', $jeu['prix']) ?>€</p>
        </div>
    </a>
<?php }