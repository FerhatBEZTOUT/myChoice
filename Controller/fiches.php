<?php
include_once '../../queries/fiches.php';
include_once '../../queries/specialite.php';


function remplirSpecialitesFiche($idFiche) {
    
    $listSpecialite = getSpecialites();
    global $arraySpecia;

    foreach ($listSpecialite as $elem) {
       
        $id = $elem->idSpecialite;
        $nomSpecia = htmlentities(getNomSpecialite($id),ENT_QUOTES,"ISO-8859-1");
        $exist = existSpecialitesFiche($idFiche,$id);
        if ($exist) { 
            
            $arraySpecia[$id] = true;
            $nbrPlace = $exist->nbrPlaces;
            echo '<li class="row">
                        <div class="col-12 col-md-6">
                        <input type="checkbox" name="spec'.$id.'" id="spec'.$id.'" value="'.$id.'" checked>
                        <label for="spec'.$id.'">'.$nomSpecia.'</label>
                        </div>
                        <div class="col-12 col-md-6">
                        <label class="sousTitreNbrPlaces" for="spec'.$id.'nbr">Nombre de places</label>
                        <input class="text-center" type="number" name="spec'.$id.'nbr" id="spec'.$id.'nbr" placeholder="Nombre de places" value="'.$nbrPlace.'">
                        </div>
                        
                    </li>
                    <hr>';
        } else {
            $arraySpecia[$id] = false;
            echo '<li class="row">
            <div class="col-12 col-md-6">
            <input type="checkbox" name="spec'.$id.'" id="spec'.$id.'" value="'.$id.'">
            <label for="spec'.$id.'">'.$nomSpecia.'</label>
            </div>
            <div class="col-12 col-md-6">
            <label class="sousTitreNbrPlaces" for="spec'.$id.'nbr">Nombre de places</label>
            <input class="text-center" type="number" name="spec'.$id.'nbr" id="spec'.$id.'nbr" placeholder="Nombre de places">
            </div>
            
        </li>
        <hr>';
        }

        
    }
}


function addSpecialitesFiche() {
    
    $listSpecialite = getSpecialites();
    global $arraySpecia;

    foreach ($listSpecialite as $elem) {
       
        $id = $elem->idSpecialite;
        $nomSpecia = htmlentities(getNomSpecialite($id),ENT_QUOTES,"ISO-8859-1");
            $arraySpecia[$id] = true;
            echo '<li class="row">
                        <div class="col-12 col-md-6">
                        <input type="checkbox" name="spec'.$id.'" id="spec'.$id.'" value="'.$id.'">
                        <label for="spec'.$id.'">'.$nomSpecia.'</label>
                        </div>
                        <div class="col-12 col-md-6">
                        <label class="sousTitreNbrPlaces" for="spec'.$id.'nbr">Nombre de places</label>
                        <input class="text-center" type="number" name="spec'.$id.'nbr" id="spec'.$id.'nbr" placeholder="Nombre de places" >
                        </div>
                        
                    </li>
                    <hr>';
        

        
    }
}




function remplirTableFiche() {

    $listFiche = getFiches();
    foreach ($listFiche as $elem) {
        $id = $elem->idFiche;
        $intit = $elem->intituleFiche;
        $dateDeb = $elem->DateDebut;
        $dateFin = $elem->DateFin;
        if ($elem->acheve==1) {
            $etat ="achevé";
        } else {
            $etat = "en cours";
        }
        $nomSpec = htmlentities(getNomSpecialite($elem->Destination),ENT_QUOTES,"ISO-8859-1");
        $msgConfirm = "return confirm('Voulez-vous vraiment supprimer cet élément ?');";
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$intit.'</td>
        <td>'.$dateDeb.'</td>
        <td>'.$dateFin.'</td>
        <td>'.$etat.'</td>
        <td>'.$nomSpec.'</td>
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


function remplirTableFicheResultat() {

    $listFiche = getFiches();
    foreach ($listFiche as $elem) {
        $id = $elem->idFiche;
        $intit = $elem->intituleFiche;
        $dateDeb = $elem->DateDebut;
        $dateFin = $elem->DateFin;
        if ($elem->acheve==1) {
            $etat ="achevé";
        } else {
            $etat = "en cours";
        }
        $nomSpec = htmlentities(getNomSpecialite($elem->Destination),ENT_QUOTES,"ISO-8859-1");
        $msgConfirm = "return confirm('Voulez-vous vraiment supprimer cet élément ?');";
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$intit.'</td>
        <td>'.$dateDeb.'</td>
        <td>'.$dateFin.'</td>
        <td>'.$etat.'</td>
        <td>'.$nomSpec.'</td>
        <td>
            <a href="result.php?id='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(20, 105, 184)" class="bi bi-eye-fill pointer" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
        </svg></a>
        </td>
    </tr>';
    }
    
}



?>