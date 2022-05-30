<?php 
    include_once __DIR__.'/../Model/connexionBDD.php';

function getSpecialites() {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM specialite");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }

    
}

function getNomSpecialite($id){
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT nomSpecialite FROM specialite WHERE idSpecialite=?");
        $request->execute(array($id));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result->nomSpecialite;
    } catch (PDOException $e) {
        echo $e;
    }
}


function getIdSpecialite($nom){
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT nomSpecialite FROM specialite WHERE idSpecialite=?");
        $request->execute(array($nom));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result->nomSpecialite;
    } catch (PDOException $e) {
        echo $e;
    }
}

?>