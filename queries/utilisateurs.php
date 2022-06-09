<?php 
    include_once __DIR__.'/../Model/connexionBDD.php';


    function getUsers() {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT * FROM Utilisateur");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    
        
    }

    function getUserById($id) {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT * FROM Utilisateur WHERE idUser=?");
            $request->execute(array($id));
            $result = $request->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function addAdmin($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType) {
        global $bdd;
        try {
            $request = $bdd->prepare("INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType) values (?,?,?,?,?,?,?)");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function addEtd($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType,$licenceTrois,$anneeCourante,$specialiteCourante) {
        global $bdd;
        try {
            $request = $bdd->prepare("INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) values (?,?,?,?,?,?,?,?,?,?)");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType,$licenceTrois,$anneeCourante,$specialiteCourante));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    
    function editAdmin($nom,$prenom,$dateNaiss,$email,$password,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,password=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editAdminNoPass($nom,$prenom,$dateNaiss,$email,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function editEtd($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,password=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editEtdNoPass($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    function deleteUser($id) {
        global $bdd;
        try {
            $request = $bdd->prepare("DELETE FROM Utilisateur WHERE idUser=?");
            $request->execute(array($id));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    function setSpecialiteFuture($specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET specialiteFuture=? WHERE idUser=?");
            $request->execute(array($specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    
?>