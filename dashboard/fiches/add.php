<?php
include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/fiches.php';
$titrePage = "Ajouter une fiche de voeux";
include_once '../../View/header.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/fiches.php';
include_once '../../queries/bddinfos.php';
$msgError = "";
$arraySpecia = [];
if (
    isset($_POST['addIntitule'])
    && isset($_POST['addDateDebut'])
    && isset($_POST['addDateFin'])
    && isset($_POST['addDestination'])

) {
    $intitule = $_POST['addIntitule'];
    $dateDeb = $_POST['addDateDebut'];
    $dateFin = $_POST['addDateFin'];
    $destin = $_POST['addDestination'];
    if ($intitule && myCheckDate($dateDeb) && myCheckDate($dateFin) && $destin) {
        if ($dateFin<$dateDeb) {
            $msgError = "Date fin doit être supérieur à date début";
        } else {
            $yearExist = false;
            $yearDebut = substr($dateDeb, 0, 4);
        
            $years = getYearFiche($destin);
            foreach ($years as $y) {
                
                
                if (strcmp($y[0],$yearDebut)==0) {
                    $yearExist = true;
                  
                } else {
                   
                }
            }
        
        
            if ($yearExist) {
                $msgError = "Une fiche pour la spécialité choisie existe déjà pour cette année";
            } else {
                addFiche($intitule,$dateDeb,$dateFin,$destin);
                header("location:../fiches");
            }
            
        }
    } else if (!$intitule && !myCheckDate($dateDeb) && !myCheckDate($dateFin) && !$destin) {
        $msgError = "Tous les champs sont incorrects ou incomplets";
    } else if (!$destin) {
        $msgError = "Choisissez une spécialité";
    } else if (!myCheckDate($dateDeb) || !myCheckDate($dateFin)) {
        $msgError = "Date incorrecte";
    } else if (!$intitule) {
        $msgError = "Remplissez le champ 'Intitulé'";
    } 
    

}
?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Fiche de voeux - Ajout</h3>
</div>

<div class="container mx-auto px-5">
    <form method="POST" action="add.php">
        <div class="form-group mb-3">
            <label class="myLabel" for="addIntitule">Intitulé</label>
            <input class="form-control checkBoxSpecialites" type="text" name="addIntitule" id="addIntitule" placeholder="Intitule" required>
        </div>
        
        <div class="form-group mb-3">
            <label class="myLabel"  for="addSpecialites">Spécialités de la fiche de voeux</label>
            <ul class="form-control" style="list-style: none;">
                <?php addSpecialitesFiche() ?>
            </ul>
        </div>
        <?php
        $myArray = [];
        foreach ($arraySpecia as $idSpecia => $value) {
            if(isset($_POST['spec'.$idSpecia]) && isset($_POST['spec'.$idSpecia.'nbr'])) {
                $nbrplc = $_POST['spec'.$idSpecia.'nbr'];
                insertSpecialiteFiche(getAutoIncrementValue()-1,$idSpecia,$nbrplc);
            }
        }
        
        ?>
        <div class="form-group mb-3">
            <label class="myLabel"  for="addDateDebut">Date début</label>
            <input class="form-control" type="text" name="addDateDebut" id="addDateDebut" placeholder="Date début" autocomplete="off" required>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel"  for="addDateFin">Date fin</label>
            <input class="form-control" type="text" name="addDateFin" id="addDateFin" placeholder="Date fin" autocomplete="off" required>
        </div>
        <div class="form-group mb-3">
        <label class="myLabel" for="addDateFin">Spécialité concernée :</label>
        <select class="form-select" aria-label="Etat" id="addDestination" name="addDestination" required>
            <option value="0" selected>Choisir une spécialité</option>
            <?php remplirOptionsSpecialite() ?>
        </select>
        </div>
        <div class="form-group mb-3 text-center">
        <button class="btn btn-primary" type="submit">Ajouter</button>
        <h6 class="msgError mt-3" id="errorMsgAddFiche"><?=$msgError?></h6>
        </div>

        
    </form>
</div>
<?php
include_once '../../View/footer.php';
?>