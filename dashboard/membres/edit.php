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
                echo $userNom.' '.$userPrenom.' '.$userEmail.' '.$userMdp.' '.$userDate.' '.$userType.' '.$userLicence.' '.$userSpecia.' '.$userAnnee;
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
    <h3 class="titrePage">Membre - Modification</h3>
</div>
<div class="container mx-auto px-5">
    
    <form method="POST" action="edit.php?id=<?= $id ?>">

        
        <div class="form-group mb-3">
            <label class="myLabel" for="addUserNom">Nom</label>
            <input class="form-control" type="text" name="addUserNom" id="addUserNom" placeholder="Nom" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserPrenom">Prénom</label>
            <input class="form-control" type="text" name="addUserPrenom" id="addUserPrenom" placeholder="Prénom" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserEmail">Email</label>
            <input class="form-control" type="text" name="addUserEmail" id="addUserEmail" placeholder="Email" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserMdp">Mot de passe</label>
            <input class="form-control" type="password" name="addUserMdp" id="addUserMdp" placeholder="Laisser vide pour ne pas modifier" required autocomplete="off">
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
            <label class="myLabel" for="addUserSpecia">Spécialité courante</label>
            <select class="form-select" aria-label="Etat" id="addUserSpecia" name="addUserSpecia" required>
                <option value="0" selected>Choisir une spécialité</option>
                <?php remplirOptionsSpecialite() ?>
            </select>
        </div>

        <div class="form-group mb-3" id="addUserSpeciaFutureDiv">
            <label class="myLabel" for="addUserSpeciaFuture">Spécialité future</label>
            <select class="form-select" aria-label="Etat" id="addUserSpeciaFuture" name="addUserSpeciaFuture" required>
                <option value="0" selected>Choisir une spécialité</option>
                <?php remplirOptionsSpecialite() ?>
            </select>
        </div>

        <div class="form-group mb-3 text-center">
            <button class="btn btn-primary" type="submit">Modifier</button>
            <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $msgError ?></h6>
        </div>


    </form>
</div>
<?php
if (isset($_GET['id'])) {
    
    if ($typeUser=='etd') {

    } else {
        echo '<script type="text/javascript">
        document.getElementById("addUserAnneeDiv").style.display="none";
        document.getElementById("addUserSpeciaDiv").style.display="none";
        document.getElementById("addUserSpeciaFutureDiv").style.display="none";
        </script>';
    }
}
include_once '../../View/footer.php';
?>