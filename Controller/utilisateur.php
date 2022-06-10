<?php
include_once '../../queries/utilisateurs.php';
include_once '../../queries/specialite.php';


function remplirTableUsers() {

    $listUsers = getUsers();
    foreach ($listUsers as $elem) {
        $id = $elem->idUser;
        $nom = $elem->nom;
        $prenom = $elem->prenom;
        
        if ($elem->userType=='etd') {
            $role = "Etudiant";
        } else {
            $role = "Admin";
        }
        $annee = $elem->anneeCourante;
        if ($annee==1) {
            $userAnnee ="Licence 1";
        } elseif ($annee==2){
            $userAnnee ="Licence 2";
        } elseif ($annee==3){
            $userAnnee ="Licence 3";
        } elseif ($annee==4){
            $userAnnee ="Master 1";
        } elseif ($annee==5){
            $userAnnee ="Master 2";
        } else {
            $userAnnee ="Non concerné";
        }

        

        if ($elem->userType=='admin') {
            $specUser ="Aucune";
        } else {
            $specUser = htmlentities(getNomSpecialite($elem->specialiteCourante),ENT_QUOTES,"ISO-8859-1");
        }

        $msgConfirm = "return confirm('Voulez-vous vraiment supprimer cet élément ?');";
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$nom.'</td>
        <td>'.$prenom.'</td>
        <td>'.$role.'</td>
        <td>'.$userAnnee.'</td>
        <td>'.$specUser.'</td>
        <td>
            <a href="edit.php?id='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(15, 111, 221)" class="bi bi-pencil-square pointer" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></a>
            <a href="delete.php?id='.$id.'" onclick="'.$msgConfirm.'"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="rgb(231, 34, 7)" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg></a>
        </td>
    </tr>';
    }
    
}

function afficherEtudiants($idFiche) {
    $users = getUsersWithFiche($idFiche);

    $l3 = (int)$users[0]->licenceTrois;

    if ($l3) {
        foreach ($users as $u) {
            
            $moyInfos = getMoyenneByUser($u->idUser);
            foreach ($moyInfos as $m) {
                $ann = $m->idAnneeEtud;
                if ($ann>0 && $ann<4) {
                    $moy = $m->moyenne;
                    $ratt = $m->rattrapage;
                    $redoub = $m->redouble;
                    $dett = $m->dette;
                    $moyTmp[$ann] = moyClassementAnnuelle($moy,$redoub,$dett,$ratt);
                }
                
            }
            
            $moyClass= sprintf('%.2f', (float)($moyTmp[1]+ $moyTmp[2]+ $moyTmp[3])/3);
            $id = $u->idUser;
            $nom = $u->nom;
            $prenom = $u->prenom;
            $speciaCour = $u->specialiteCourante;
            $speciaFutur = $u->specialiteFuture;
        }

        
    } else {

    }
    
}

?>

<div class="table-responsive">
        <table class="table table-hover" id="tableMembres">
            <form id="filterForm" class="mb-2">
                <thead class="pb-5">
                    <tr>
                        <th scope="col">Recherche</th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechNomUser" placeholder="Nom"></th>
                        <th scope="col"><input class="form-control" type="text" name="" id="rechPrenomUser" placeholder="Prénom"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        
                        <th scope="col"></th>
                            
                    </tr>
                </thead>
            </form>

            
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Spécialité courante</th>
                    <th scope="col">Spécialité orientée</th>
                    <th scope="col">Moyenne</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php remplirTableUsers() ?>
            </tbody>
        </table>
    </div>