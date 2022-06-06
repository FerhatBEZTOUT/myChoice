<?php
include_once '../../Controller/checkConnexion.php';
$titrePage = "Modifier une spécialité";
include_once '../../View/header.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/fiches.php';
include_once '../../Controller/fiches.php';
include_once '../../Controller/specialites.php';
$msgError = "";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $specia = getSpecialiteById($id);

    $champNomSpecia = $specia->nomSpecialite ;
    $champAnnee = $specia->anneeDebut;
    $champProgramme = $specia->programme;
    
    echo isset($_POST['addProgramme']);
    if (
        isset($_POST['addNomSpecia'])
        && isset($_POST['addAnneeSpecia'])
        && isset($_POST['addProgramme'])

    ) {

        $nomSpecia = $_POST['addNomSpecia'];
        $anneeSpecia = $_POST['addAnneeSpecia'];
        $programme = $_POST['addProgramme'];
        
        if ($nomSpecia && $anneeSpecia && $programme) {
            
                editSpeciaAll($nomSpecia, $anneeSpecia, $programme, $id);
                header("location:../specialites");
             
        } elseif ($nomSpecia && $anneeSpecia) {
            editSpecia($nomSpecia, $anneeSpecia, $id);
                header("location:../specialites");
        }
        
        else if (!$nomSpecia && !$anneeSpecia && !$programme) {
            $msgError = "Tous les champs sont incorrects ou incomplets";
        } else if (!$programme) {
            $msgError = "Choisissez un programme";
        } else if (!$anneeSpecia) {
            $msgError = "Choisissez une année";
        } else if (!$nomSpecia) {
            $msgError = "Remplissez le champ 'Nom spécialité'";
        }
    } 
}


?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Spécialité - Modification</h3>
</div>

<div class="container mx-auto px-5">
    <form method="POST" action="edit.php?id=<?= $id ?>">
        <div class="form-group mb-3">
            <label class="myLabel" for="addNomSpecia">Nom spécialité</label>
            <input class="form-control" type="text" name="addNomSpecia" id="addNomSpecia" placeholder="Nom spécialité" required value="<?= $champNomSpecia?>" )>
        </div>
        <div class="form-group mb-3">
            <label class="myLabel" for="addAnneeSpecia">Année début</label>
            <select class="form-select" aria-label="Etat" id="addAnneeSpecia" name="addAnneeSpecia" required>
                <option value="1" <?php if($champAnnee==1) echo "selected"?>>Licence 1</option>
                <option value="2" <?php if($champAnnee==2) echo "selected"?>>Licence 2</option>
                <option value="3" <?php if($champAnnee==3) echo "selected"?>>Licence 3</option>
                <option value="4" <?php if($champAnnee==4) echo "selected"?>>Master 1</option>
                <option value="5" <?php if($champAnnee==5) echo "selected"?>>Master 2</option>
                
            </select>
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addProgramme">Lien vers le programme détaillé</label>
            <input class="form-control" type="file" name="addProgramme" id="addProgramme" placeholder="Programme" autocomplete="off" value="<?= htmlentities($champProgramme) ?>">
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