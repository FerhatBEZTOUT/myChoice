<?php
include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/utilisateur.php';
$titrePage = "Ajouter un membre";
include_once '../../View/header.php';
include_once '../../Model/Utilisateur.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/utilisateurs.php';

$msgError = "";

if (isset($_POST['addUserType'])) {
    $userType = $_POST['addUserType'];
    if ($userType=='etd') {
        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate'])
        && isset($_POST['addUserAnnee'])
        && isset($_POST['addUserSpecia']))  {
            
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $userPrenom.'.'.$userNom.'@univ-bejaia.dz';
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
            if (myCheckDate($userDate) && $userAnnee && $userSpecia && strlen($userMdp)>7) {
                 $userMdp = md5($userMdp);
                addEtd($userNom,$userPrenom,$userDate,$userEmail,$userMdp,0,$userType,$userLicence,$userAnnee,$userSpecia);
                header('location:../membres');
            } elseif (strlen($userMdp)<8) {
                $msgError = "Mot de passe trop court";
            } elseif (!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } elseif (!$userAnnee) {
                $msgError = "Choisissez une année";
            } elseif (!$userSpecia) {
                $msgError = "Choisissez une spécialité";
            }


        } else {
            $msgError = "Tous les champs doivent être remplis";
        }
    } else {
        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate']))  {
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $userPrenom.'.'.$userNom.'@univ-bejaia.dz';
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];

            if (myCheckDate($userDate) && strlen($userMdp)>7) {
                $userMdp = md5($userMdp);
                addAdmin($userNom,$userPrenom,$userDate,$userEmail,$userMdp,true,$userType);
            } elseif (strlen($userMdp)<8) {
                $msgError = "Mot de passe trop court";
            }
            else {
                $msgError = "Date de naissance incorrete";
            }
            

        } else {
            $msgError = "Tous les champs doivent être remplis";
        }

    }

}

?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Membre - Ajout</h3>
</div>

<div class="container mx-auto px-5">

    <form method="POST" action="add.php">

        <div class="form-group mb-3">
            <label class="myLabel" for="roleDiv">Rôle</label>
            <div class="form-control" id="roleDiv">
                <div>
                <input class="form-check-input" type="radio" name="addUserType" id="addUserType1" checked value='etd'>
                <label class="form-check-label" for="addUserType1">
                    Etudiant
                </label>
                </div>
                <div>
                <input class="form-check-input" type="radio" name="addUserType" id="addUserType2" value='admin'>
                <label class="form-check-label" for="addUserType2">
                    Admin
                </label>
                </div>
                
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="myLabel" for="addUserNom">Nom</label>
            <input class="form-control" type="text" name="addUserNom" id="addUserNom" placeholder="Nom" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserPrenom">Prénom</label>
            <input class="form-control" type="text" name="addUserPrenom" id="addUserPrenom" placeholder="Prénom" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserMdp">Mot de passe</label>
            <input class="form-control" type="password" name="addUserMdp" id="addUserMdp" placeholder="Mot de passe" required autocomplete="off">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserDate">Date de naissance</label>
            <input class="form-control" type="text" name="addUserDate" id="addUserDate" placeholder="Date de naissance" autocomplete="off" required>
        </div>

        <div class="form-group mb-3" id="addUserAnneeDiv">
            <label class="myLabel" for="addUserAnnee">Année en cours</label>
            <select class="form-select" aria-label="Etat" id="addUserAnnee" name="addUserAnnee" required>
                <option value="0" selected>Choisir une année</option>
                <option value="1" >Licence 1</option>
                <option value="2" >Licence 2</option>
                <option value="3" >Licence 3</option>
                <option value="4" >Master 1</option>
                <option value="5" >Master 2</option>
            </select>
        </div>


        <div class="form-group mb-3" id="addUserSpeciaDiv">
            <label class="myLabel" for="addUserSpecia">Spécialité</label>
            <select class="form-select" aria-label="Etat" id="addUserSpecia" name="addUserSpecia" required>
                <option value="0" selected>Choisir une spécialité</option>
                <?php remplirOptionsSpecialite() ?>
            </select>
        </div>
        <div class="form-group mb-3 text-center">
            <button class="btn btn-primary" type="submit">Ajouter</button>
            <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $msgError ?></h6>
        </div>


    </form>
</div>
<?php
include_once '../../View/footer.php';
?>