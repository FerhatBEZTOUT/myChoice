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

function addSpecia($nomSpecialite,$anneeDebut,$programme) {
    global $bdd;
    try {
        $request = $bdd->prepare("INSERT INTO Specialite(nomSpecialite,anneeDebut,programme) values (?,?,?)");
        $request->execute(array($nomSpecialite,$anneeDebut,$programme));
    } catch (PDOException $e) {
        echo $e;
    }
}


function editSpeciaAll($nomSpecialite,$anneeDebut,$programme,$id) {
    global $bdd;
    try {
        $request = $bdd->prepare("UPDATE Specialite SET nomSpecialite=?,anneeDebut=?,programme=? WHERE idSpecialite=?");
        $request->execute(array($nomSpecialite,$anneeDebut,$programme,$id));
    } catch (PDOException $e) {
        echo $e;
    }
}

function editSpecia($nomSpecialite,$anneeDebut,$id) {
    global $bdd;
    try {
        $request = $bdd->prepare("UPDATE Specialite SET nomSpecialite=?,anneeDebut=? WHERE idSpecialite=?");
        $request->execute(array($nomSpecialite,$anneeDebut,$id));
    } catch (PDOException $e) {
        echo $e;
    }
}



function deleteSpecia($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("DELETE FROM Specialite WHERE idSpecialite=?");
        $request->execute(array($id));
    } catch (PDOException $e) {
        echo $e;
    }
}


function getSpecialiteById($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM Specialite WHERE idSpecialite=?");
        $request->execute(array($id));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}
?>