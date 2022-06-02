<?php
 include_once __DIR__.'/../Model/connexionBDD.php';
function getAutoIncrementValue() {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'Orientation'
        AND   TABLE_NAME   = 'FicheVoeux';");
        $request->execute();
        $result = $request->fetch(PDO::FETCH_OBJ);
        return (int)$result->AUTO_INCREMENT;
    } catch (PDOException $e) {
        echo $e;
    }
}
?>