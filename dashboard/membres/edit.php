<?php
include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/utilisateur.php';
$titrePage = "Modifier un membre";
include_once '../../View/header.php';
include_once '../../Model/Utilisateur.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/utilisateurs.php';
$msgError = "";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $user = getUserById($id);

    $typeUser = $user->userType;
    $nomUser = $user->nom;
    $prenomUser = $user->prenom; 
    $dateNaissUser = $user->dateNaiss;
    $emailUser = $user->email;
    $passwordUser = $user->password;
    
    if ($typeUser=='etd') {
        
        $anneeCouranteUser = $user->anneeCourante;
        $specialiteCouranteUser = $user->specialiteCourante;
        $specialiteFutureUser = $user->specialiteFuture;

        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserEmail'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate'])
        && isset($_POST['addUserAnnee'])
        && isset($_POST['addUserSpecia'])
        && isset($_POST['addUserSpeciaFuture'])
        && $_POST['addUserSpeciaFuture']!=0)  {
           
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];
            $userAnnee = (int)$_POST['addUserAnnee'];
            if ($userAnnee == 3) {
                $userLicence = true;
            } else {
                $userLicence = 0;
            }
            $userSpecia = (int)$_POST['addUserSpecia'];
            $userSpeciaFuture = (int)$_POST['addUserSpeciaFuture'];
            
            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate) && $userAnnee && $userSpecia && $userSpeciaFuture) {
                   
                    editEtdNoPass($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                    header("location:../membres");
                } elseif (!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } elseif (!$userAnnee) {
                    $msgError = "Choisissez une année";
                } elseif (!$userSpecia) {
                    $msgError = "Choisissez une spécialité courante";
                } elseif (!$userSpeciaFuture) {
                    
                    editEtdNoPassNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$id);
                } else {
                    $msgError = "Tous les champs doivent être remplis";
                }
            } 
            
            
            elseif (myCheckDate($userDate) && $userAnnee && $userSpecia && $userSpeciaFuture && strlen($userMdp)>7) {
                 $userMdp = md5($userMdp);
                editEtd($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                header("location:../membres");
            } elseif (!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } elseif (!$userAnnee) {
                $msgError = "Choisissez une année";
            } elseif (!$userSpecia) {
                $msgError = "Choisissez une spécialité courante";
            } elseif (!$userSpeciaFuture) {
              
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                
            } else {
                $msgError = "Tous les champs doivent être remplis";
            }
        
         } elseif (
            isset($_POST['addUserNom'])
            && isset($_POST['addUserPrenom'])
            && isset($_POST['addUserEmail'])
            && isset($_POST['addUserMdp'])
            && isset($_POST['addUserDate'])
            && isset($_POST['addUserAnnee'])
            && isset($_POST['addUserSpecia'])
         ) {
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];
            $userAnnee = (int)$_POST['addUserAnnee'];
            if ($userAnnee == 3) {
                $userLicence = true;
            } else {
                $userLicence = 0;
            }
            $userSpecia = (int)$_POST['addUserSpecia'];
           
            
            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate) && $userAnnee && $userSpecia) {
                   
                    editEtdNoPass($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                    header("location:../membres");
                } elseif (!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } elseif (!$userAnnee) {
                    $msgError = "Choisissez une année";
                } elseif (!$userSpecia) {
                    $msgError = "Choisissez une spécialité courante";
                } else {
                    
                    editEtdNoPassNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$id);
                    header("location:../membres");
                } 
            } 
            
            
            elseif (myCheckDate($userDate) && $userAnnee && $userSpecia && strlen($userMdp)>7) {
                 $userMdp = md5($userMdp);
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                header("location:../membres");
            } elseif (!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } elseif (!$userAnnee) {
                $msgError = "Choisissez une année";
            } elseif (!$userSpecia) {
                $msgError = "Choisissez une spécialité courante";
            } else {
               
                $userMdp = md5($userMdp);
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                header("location:../membres");
                
            } 
         }
        
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    else {
        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserEmail'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate']))  {
            
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];


            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate)) {
                   
                    editAdminNoPass($userNom,$userPrenom,$userDate,$userEmail,$id);
                    header("location:../membres");
                }
                elseif(!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } else {
                    $msgError = "Tous les champs doivent être remplis";
                }
            }
            elseif (myCheckDate($userDate) && strlen($userMdp)>7) {
                $userMdp = md5($userMdp);
                
                editAdmin($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$id);
                header("location:../membres");
            }
            elseif(!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } else {
                $msgError = "Tous les champs doivent être remplis";
            }
        
        } 
          
         
    }


}


    
    



?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Membre - Modification</h3>
</div>
<div class="container mx-auto px-5">
    
    <form method="POST" action="edit.php?id=<?= $id ?>">

        
        <div class="form-group mb-3">
            <label class="myLabel" for="addUserNom">Nom</label>
            <input class="form-control" type="text" name="addUserNom" id="addUserNom" placeholder="Nom" required value="<?= htmlentities($nomUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserPrenom">Prénom</label>
            <input class="form-control" type="text" name="addUserPrenom" id="addUserPrenom" placeholder="Prénom" required value="<?= htmlentities($prenomUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserEmail">Email</label>
            <input class="form-control" type="text" name="addUserEmail" id="addUserEmail" placeholder="Email" required value="<?= htmlentities($emailUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserMdp">Mot de passe</label>
            <input class="form-control" type="password" name="addUserMdp" id="addUserMdp" placeholder="Laisser vide pour ne pas modifier" autocomplete="off">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserDate">Date de naissance</label>
            <input class="form-control" type="text" name="addUserDate" id="addUserDate" placeholder="Date de naissance" autocomplete="off" required value="<?= htmlentities($dateNaissUser) ?>">
        </div>

        <div class="form-group mb-3" id="addUserAnneeDiv">
            <label class="myLabel" for="addUserAnnee">Année en cours</label>
            <select class="form-select" aria-label="Etat" id="addUserAnnee" name="addUserAnnee">
                <option value="1" <?php if ($typeUser=='etd' && $anneeCouranteUser==1) echo 'selected'?>>Licence 1</option>
                <option value="2" <?php if ($typeUser=='etd' && $anneeCouranteUser==2) echo 'selected'?>>Licence 2</option>
                <option value="3" <?php if ($typeUser=='etd' && $anneeCouranteUser==3) echo 'selected'?>>Licence 3</option>
                <option value="4" <?php if ($typeUser=='etd' && $anneeCouranteUser==4) echo 'selected'?>>Master 1</option>
                <option value="5" <?php if ($typeUser=='etd' && $anneeCouranteUser==5) echo 'selected'?>>Master 2</option>
            </select>
        </div>


        <div class="form-group mb-3" id="addUserSpeciaDiv">
            <label class="myLabel" for="addUserSpecia">Spécialité courante</label>
            <select class="form-select" aria-label="Etat" id="addUserSpecia" name="addUserSpecia" >
                <?php if ($typeUser=='etd') remplirSpeciaWithValue($specialiteCouranteUser) ?>
            </select>
        </div>

        <div class="form-group mb-3" id="addUserSpeciaFutureDiv">
            <label class="myLabel" for="addUserSpeciaFuture">Spécialité future</label>
            <select class="form-select" aria-label="Etat" id="addUserSpeciaFuture" name="addUserSpeciaFuture" >
                <option value="0" selected >Aucune</option>
                <?php if ($typeUser=='etd') remplirSpeciaWithValue($specialiteFutureUser) ?>
            </select>
        </div>

        <div class="form-group mb-3 text-center">
            <button class="btn btn-primary" type="submit">Modifier</button>
            <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $msgError ?></h6>
        </div>


    </form>
</div>
<?php

    
    if ($typeUser=='admin') {
        echo '<script type="text/javascript">
        document.getElementById("addUserAnneeDiv").style.display="none";
        document.getElementById("addUserAnneeDiv").removeAttribute("required");
        document.getElementById("addUserSpeciaDiv").style.display="none";
        document.getElementById("addUserSpeciaDiv").removeAttribute("required");
        document.getElementById("addUserSpeciaFutureDiv").style.display="none";
        document.getElementById("addUserAnneeDiv").removeAttribute("required");
        </script>';
    }

include_once '../../View/footer.php';
?>