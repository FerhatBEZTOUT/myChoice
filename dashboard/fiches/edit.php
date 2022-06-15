<?php
include_once '../../Controller/checkConnexion.php';
$titrePage = "Modifier une fiche de voeux";
include_once '../../View/header.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/fiches.php';
include_once '../../Controller/fiches.php';
include_once '../../Controller/specialites.php';
$msgError = "";
global $arraySpecia;
$arraySpecia = [];
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $fiche = getFichesById($id);

    $champIntitule = $fiche->intituleFiche;
    $champDateDeb = $fiche->DateDebut;
    $champDateFin = $fiche->DateFin;
    $champDestin = $fiche->Destination;

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
            if ($dateFin < $dateDeb) {
                $msgError = "Date fin doit être supérieur à date début";
            } else {
                editFiche($intitule, $dateDeb, $dateFin, $destin, $id);
               header("location:../fiches");
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
}


?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Fiche de voeux - Modification</h3>
</div>

<div class="container mx-auto px-5">
    <form method="POST" action="edit.php?id=<?= $id ?>">
        <div class="form-group mb-3">
            <label class="myLabel" for="addIntitule">Intitulé</label>
            <input class="form-control" type="text" name="addIntitule" id="addIntitule" placeholder="Intitule" required value="<?= htmlentities($champIntitule) ?>" )>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addSpecialites">Spécialités de la fiche de voeux</label>
            <ul class="form-control" style="list-style: none;">
                <?php remplirSpecialitesFiche($id); ?>
            </ul>
        </div>
        <?php
        
        foreach ($arraySpecia as $idSpecia => $value) {
            if(isset($_POST['spec'.$idSpecia]) && isset($_POST['spec'.$idSpecia.'nbr'])) {
                $nbrplc = $_POST['spec'.$idSpecia.'nbr'];
                insertSpecialiteFiche($id,$idSpecia,$nbrplc);
            } else {
                deleteSpecialiteFiche($id,$idSpecia);
                
            }
        }

        ?>
        <div class="form-group mb-3">
            <label class="myLabel" for="addDateDebut">Date début</label>
            <input class="form-control" type="text" name="addDateDebut" id="addDateDebut" placeholder="Date début" autocomplete="off" required value="<?= htmlentities($champDateDeb) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addDateFin">Date fin</label>
            <input class="form-control" type="text" name="addDateFin" id="addDateFin" placeholder="Date fin" autocomplete="off" required value="<?= htmlentities($champDateFin) ?>">
        </div>
        <div class="form-group mb-3">
            <label class="myLabel" for="addDateFin">Fiche de voeux destinée pour :</label>
            <select class="form-select" aria-label="Etat" id="addDestination" name="addDestination" required>
                <option value="0">Choisir une spécialité</option>
                <?php remplirSpeciaWithValue($champDestin) ?>
            </select>
        </div>
        <div class="form-group mb-3 text-center">
            <button class="btn btn-primary" type="submit">Modifier</button>
            <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $msgError ?></h6>
        </div>


    </form>
</div>

<?php
include_once '../../View/footer.php';
?>