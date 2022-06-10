<?php

include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/fiches.php';
include_once '../../queries/utilisateurs.php';
$titrePage = "Admin - Résultats";
include_once '../../View/header.php';




?>

<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Résultats</h3>
</div>
<div class="container-fluid p-5">
<a href="add.php">
        <div class="btn btn-success mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
            </svg> Exporter vers Excel
        </div>
    </a>
    <?php 
        if(isset($_GET['id'])) {
            $idFiche = $_GET['id'];
            $acheve = getEtatFiche($idFiche);

            if($acheve) {
                afficherEtudiants($idFiche);
            } else {
                if(ficheAchevee($idFiche)) {
                    echo 'fiche achevée';
                    orienterEtudiants($idFiche);
                    afficherEtudiants($idFiche);
                } else {
                    echo 'fiche non achevée';
                }
            }
            
        }
    ?>
</div>


<?php
include_once '../../View/footer.php';
?>