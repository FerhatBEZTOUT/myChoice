<?php 
    include_once __DIR__.'/../Model/connexionBDD.php';



function insertVoeux($id,$idFiche,$specialiteOrdre) {
    global $bdd;
    foreach ($specialiteOrdre as $s) {
        try {
            $request = $bdd->prepare("INSERT INTO Voeux(idUser,idFiche,idSpecialite,ordre) values (?,?,?,?)");
            $request->execute(array($id,$idFiche,$s[0],$s[1]));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
}


function getVoeuxByUserFiche($idUser,$idFiche) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT idSpecialite,ordre FROM Voeux WHERE idUser=? AND idFiche=?");
        $request->execute(array($idUser,$idFiche));
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }

    
}




?>