<?php 
 include_once __DIR__.'/../Model/connexionBDD.php';

function getAnneeById($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM AnneeEtud WHERE idAnneeEtud=?");
        $request->execute(array($id));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}
 ?>
