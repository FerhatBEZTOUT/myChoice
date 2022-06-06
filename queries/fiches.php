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

function getFichesBySpecialite($specia) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM FicheVoeux WHERE Destination=?");
        $request->execute(array($specia));
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }

    
}

function getSpecialitesOfFiche($fiche) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM SpecialiteFiche WHERE idFiche=?");
        $request->execute(array($fiche));
        $result = $request->fetchAll(PDO::FETCH_OBJ);
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


function insertSpecialiteFiche($id,$idSpecia,$nbrplc) {
    global $bdd;
    try {
        $request = $bdd->prepare("INSERT INTO SpecialiteFiche(idFiche,idSpecialite,nbrPlaces) values (?,?,?)");
        $request->execute(array($id,$idSpecia,$nbrplc));
    } catch (PDOException $e) {
        echo $e;
    }

}


function deleteSpecialiteFiche($id,$idSpecia) {
    global $bdd;
    try {
        $request = $bdd->prepare("DELETE FROM SpecialiteFiche WHERE idFiche=? AND idSpecialite=?");
        $request->execute(array($id,$idSpecia));
    } catch (PDOException $e) {
        echo $e;
    }
}




?>