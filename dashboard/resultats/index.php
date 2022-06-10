<?php

include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/fiches.php';
$titrePage = "Admin - Résultats";
include_once '../../View/header.php';
?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Choisir une fiche pour visualiser le résultat des affecatations</h3>
</div>
<div class="container-fluid p-5">
    


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
                    <th scope="col">Spécialité concernée</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php remplirTableFicheResultat() ?>
            </tbody>
        </table>
    </div>


    
</div>

<?php
include_once '../../View/footer.php';
?>