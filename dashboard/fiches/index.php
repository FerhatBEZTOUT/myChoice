<?php

include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/fiches.php';
$titrePage = "Admin - Fiches de voeux";
include_once '../../View/header.php';
?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Fiches de voeux existantes</h3>
</div>
<div class="container-fluid p-5">
    <a href="add.php">
        <div class="btn btn-success mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
            </svg> Nouvelle fiche de voeux
        </div>
    </a>


    <div class="table-responsive">
        <table class="table table-hover" id="tableFiches">
            <form id="filterForm" class="mb-2">
                <thead class="pb-5">
                    <tr>
                        <th scope="col">Recherche</th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechIntitule" placeholder="Intitule"></th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechDateDebut" placeholder="Date début" autocomplete="off"></th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechDateFin" placeholder="Date fin"></th>
                        <th scope="col"><select class="form-select" aria-label="Etat" id="rechFicheAchevee">
                                <option value="0" selected>Tous</option>
                                <option value="1">Achevé</option>
                                <option value="2">En cours</option>
                            </select></th>
                        <th scope="col"><select class="form-select" aria-label="Etat" id="rechDestination">
                                <option value="0" selected>Tous</option>
                                <?php remplirOptionsSpecialite() ?>
                            </select></th>
                            <th scope="col" style="width:100px ;"> </th>
                    </tr>
                </thead>
            </form>

            
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Intitule</th>
                    <th scope="col">Date début</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php remplirTableFiche() ?>
            </tbody>
        </table>
    </div>



</div>

<?php
include_once '../../View/footer.php';
?>