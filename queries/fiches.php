<?php 
    include_once __DIR__.'/../Model/connexionBDD.php';

function getFiches() {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM FicheVoeux");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }

    
}

?>