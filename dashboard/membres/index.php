<?php

include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/utilisateur.php';
$titrePage = "Admin - Membres";
include_once '../../View/header.php';
?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Membres existants</h3>
</div>
<div class="container-fluid p-5">
    <a href="add.php">
        <div class="btn btn-success mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
            </svg> Nouveau membre
        </div>
    </a>


    <div class="table-responsive">
        <table class="table table-hover" id="tableMembres">
            <form id="filterForm" class="mb-2">
                <thead class="pb-5">
                    <tr>
                        <th scope="col">Recherche</th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechNomUser" placeholder="Nom"></th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechPrenomUser" placeholder="Prénom"></th>
                        <th scope="col"><select class="form-select" aria-label="Etat" id="rechUserType">
                                <option value="0" selected>Tous</option>
                                <option value="etd">Etudiant</option>
                                <option value="admin">Admin</option>
                            </select></th>
                        <th scope="col"><select class="form-select" aria-label="Etat" id="rechUserAnnee">
                            <option value="0" selected>Tous</option>
                            <option value="1">Licence 1</option>
                            <option value="2">Licence 2</option>
                            <option value="3">Licence 3</option>
                            <option value="4">Master 1</option>
                            <option value="5">Master 2</option>
                        </select></th>
                        
                        <th scope="col"><select class="form-select" aria-label="Etat" id="rechUserSpecia">
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
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Année étude</th>
                    <th scope="col">Specialité</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php remplirTableUsers() ?>
            </tbody>
        </table>
    </div>



</div>

<?php
include_once '../../View/footer.php';
?>