<?php 

include_once __DIR__.'/../queries/specialite.php';
include_once __DIR__.'/../queries/annee.php';

function remplirOptionsSpecialite() {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
    }
}


function remplirSpeciaWithValue($id) {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        if ($idSpec==$id) {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'" selected>'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        } else {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        }
        
    }
}

function remplirTableSpecialite() {

    $listSpecia = getSpecialites();
    foreach ($listSpecia as $elem) {
        $id = $elem->idSpecialite;
        $nom = htmlentities($elem->nomSpecialite,ENT_QUOTES,"ISO-8859-1");
        $annee = getAnneeById($elem->anneeDebut);
        $cycle = $annee->cycleEtud;
        $anneeDeb =$annee->annee;
        
        $msgConfirm = "return confirm('Voulez-vous vraiment supprimer cet élément ?');";

        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$nom.'</td>
        <td>'.$cycle.'</td>
        <td>'.$anneeDeb.'</td>
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


function remplirSpecialiteFiche() {
    global $listSpecialite;
    global $trouve;
    global $dateD;
    global $dateF;
    global $fiche;
    
        if ($trouve && !$listSpecialite) {
        echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
        <div  class="mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(17, 128, 231)" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </svg>
        </div>
        <h3 class="text-center">Fiche de voeux pas encore prête</h3>
        <p class="text-center">Revenez plus tard ou contactez votre département pour plus d\'informations</p>

    </div>';
    } elseif (!$trouve) {

        if ($dateD) {
            echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
            <div  class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(17, 128, 231)" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
            </div>
            <h3 class="text-center">Créneau de soumission des voeux pas encore ouvert</h3>
            <p class="text-center">La date de début de soumission des voeux est : <b>'.$fiche->DateDebut.'</b></p>
    
        </div>';
        } elseif ($dateF) {
            echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
            <div  class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(17, 128, 231)" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
            </div>
            <h3 class="text-center">Créneau de soumission des voeux fermé</h3>
            <p class="text-center">Il est trop tard pour soumettre vos voeux, le dernier délai était : <b>'.$fiche->DateFin.'</b>. Vous avez été automatiquement affecté à une filiére, contactez votre département pour plus d\'informations ou en cas de réclamations</p>
    
        </div>';
        } else {
            echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
            <div  class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(17, 128, 231)" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
            </div>
            <h3 class="text-center">Aucune fiche de voeux trouvée</h3>
            <p class="text-center">Revenez plus tard ou contactez votre département pour connaître la date de soumission des voeux</p>
    
        </div>';
        }
        
    }  
    
    else {
        
        echo '<h5 class="text-center mb-5">Classez les spécialités et validez vos voeux</h5>
        <div class="container px-5">
            <div class="row p-1 d-flex align-items-center justify-content-between myDiv1">
                <div class="col-5 col-md-4">
                    <h5 class="monTitre text-start">Nom spécialité</h5>
                </div>
                <div class="col-3 col-md-4">
                    <h5 class="monTitre text-center">Ordre</h5>
                </div>
                <div class="col-3 col-md-4">
                    <h5 class="monTitre text-end">Programme détaillé</h5>
                </div>
            </div>
            <form method="POST" action="index.php" onsubmit="return confirm(\'Etes-vous sûr de vox voeux ?\');">';
        foreach ($listSpecialite as $s) {
            
            $id =$s[0];
            $nomSpecia = htmlentities(getNomSpecialite($id),ENT_QUOTES,"ISO-8859-1");
            $prog = $s[1];
            echo '<div class="row p-1  d-flex align-items-center myDiv">
            <div class="form-check col-5 col-md-4 ms-4">
                <input class="form-check-input mySpeciaCheck" type="checkbox" value="'.$id.'" id="spec'.$id.'" name="spec'.$id.'">
                <label class="form-check-label mySpeciaCheckLabel" for="spec'.$id.'">
                    '.$nomSpecia.'
                </label>
            </div>
            <div class="col-3 ">
                <h5 class="text-center"><input class="text-center myInput" type="number" id="ordre'.$id.'" name="ordre'.$id.'" readonly></h5>
            </div>
            <div class="col-3 col-md-4 text-end">
                <a href="http:\\dashboard/specialites/programmes/'.$prog.'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF0000" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                    </svg></a>
            </div>
    
            
        </div>
        ';
        
        }
        
        
    echo '<div class="form-group my-3 text-center">
    <button class="btn btn-primary" type="submit" onclick="">Valider</button>
    
</div>
</form>
</div>';
    }
    


}


function afficherDejaValide($idUser) {
     echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
        <div class="mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#249109" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
    </div>
    <h3 class="text-center">Voeux validés</h3>
    <a class="mt-3 btn btn-primary" href="telechargerFiche.php" target="_blank" rel="noopener noreferrer" >Télécharger ma fiche de voeux</a>

</div>';
}
