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

function getFichesById($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM FicheVoeux WHERE idFiche=?");
        $request->execute(array($id));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }

    
}

function addFiche($intitule,$dateDeb,$dateFin,$destin) {
    global $bdd;
    try {
        $request = $bdd->prepare("INSERT INTO FicheVoeux(intituleFiche,DateDebut,DateFin,Destination) values (?,?,?,?)");
        $request->execute(array($intitule,$dateDeb,$dateFin,$destin));
    } catch (PDOException $e) {
        echo $e;
    }
}


function editFiche($intitule,$dateDeb,$dateFin,$destin,$id) {
    global $bdd;
    try {
        $request = $bdd->prepare("UPDATE FicheVoeux SET intituleFiche=?,DateDebut=?,DateFin=?,Destination=? WHERE idFiche=?");
        $request->execute(array($intitule,$dateDeb,$dateFin,$destin,$id));
    } catch (PDOException $e) {
        echo $e;
    }
}



function deleteFiche($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("DELETE FROM FicheVoeux WHERE idFiche=?");
        $request->execute(array($id));
    } catch (PDOException $e) {
        echo $e;
    }
}


function specialitesFiche($idFiche) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM SpecialiteFiche WHERE idFiche=?");
        $request->execute(array($idFiche));
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}


function existSpecialitesFiche($idFiche,$idSpecia) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM SpecialiteFiche WHERE idFiche=? AND idSpecialite=?");
        $request->execute(array($idFiche,$idSpecia));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}

?>