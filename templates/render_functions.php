<?php

// methode pour render tous les jeux video
function render_all_video_games($jeu)
{ ?>
    <div class="card m-2">
        <div class="d-flex flex-column align-items-center">
            <img class="jeu_image" src="../images/games/<?php echo $jeu['image_path'] ?>"
                 alt="image de <?php echo $jeu['titre'] ?>">
            <h5 class="jeu_nom"><?php echo $jeu['titre'] ?></h5>
            <p class="jeu_prix">
                <?php
                if ($jeu['prix'] == 0) {
                    echo "Gratuit";
                } else {
                    echo number_format($jeu['prix'] / 100, 2, ',', ' ') . "€";
                } ?>
            </p>
            <a class="align-self-start btn btn-primary ms-3 mb-3 text-light fw-semibold"
               href="../game_detail.php?jeu_id=<?php echo $jeu['id'] ?>">Voir détail</a>
        </div>
    </div>
<?php }

// methode pour render le detail d'un jeu video
function render_game_detail($jeu, $restriction_age, $note, $console)
{ ?>
    <div class="border rounded-3 d-flex align-items-center" style="margin: 0 6rem">
        <div class="row">
            <!-- Image column -->
            <div class="col-sm-4 m-1">
                <img class="jeu_image" src="../images/games/<?php echo $jeu['image_path'] ?>"
                     alt="image de <?php echo $jeu['titre'] ?>"
                     style="max-width: 100%; height: auto; object-fit: cover;">
            </div>
            <!-- Text column -->
            <div class="col-sm-7">
                <div class="justify-content-end">
                    <h5 class="jeu_nom text-primary" style="padding: 15px 0 5px 0"><?php echo $jeu['titre'] ?></h5>
                    <p class="jeu_label">
                        <?php $console_labels = explode(',', $console['console_label']);
                        foreach ($console_labels as $label) { ?>
                            <span class="badge bg-primary text-white rounded-pill"><?php echo $label ?></span>
                        <?php } ?>
                    </p>
                    <p class="jeu_description fw-bold">Synopsis: <span
                                class="fw-normal"><?php echo $jeu['description'] ?></span></p>
                    <p class="jeu_date_sortie fw-lighter">Date de sorti: <span
                                class="text-primary fw-bold">
                                <?php echo date('d/m/Y', strtotime($jeu['date_sortie'])); ?></span>
                    </p>
                    <div class="d-flex align-items-center mt-4">
                        <img class="jeu_restriction_age border rounded-2 border-1" style="padding: 5px"
                             src="../images/pegi/<?php echo $restriction_age['image_path'] ?>"
                             alt="pegi <?php echo $restriction_age['label'] ?>">
                        <p class="ms-2">age: <?php echo $restriction_age['label'] ?>+</p>
                    </div>
                    <div class="d-flex justify-content-around mt-4">
                        <p class="jeu_note"><i class="text-warning fas fa-star mx-1"></i>Avis presse: <span
                                    class="text-primary fw-bold"><?php echo $note['note_media'] ?></span>/20</p>
                        <p class="jeu_note ms-2"><i class="text-warning fas fa-star mx-1"></i>Avis utilisateur: <span
                                    class="text-primary fw-bold"><?php echo $note['note_utilisateur'] ?></span>/20</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

