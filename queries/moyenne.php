<?php

include_once __DIR__.'/../Model/connexionBDD.php';

    
function getMoyenneByUser($id) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM Moyenne WHERE idUser=?");
        $request->execute(array($id));
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}


function getMoyenneByUserAnnee($id,$annee) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM Moyenne WHERE idUser=? AND idAnneeEtud=?");
        $request->execute(array($id,$annee));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}

function getMoyenneByUserAnneeSpecia($id,$annee,$specia) {
    global $bdd;
    try {
        $request = $bdd->prepare("SELECT * FROM Moyenne WHERE idUser=? AND idAnneeEtud=? AND idSpecialite=?");
        $request->execute(array($id,$annee,$specia));
        $result = $request->fetch(PDO::FETCH_OBJ);
        return $result;
    } catch (PDOException $e) {
        echo $e;
    }
}



function moyClassementAnnuelle($moyAnnee,$nbrRedouble,$nbrDette,$nbrRattrap) {
     return  $moyAnnee*(1 - 0.04*($nbrRedouble + ($nbrDette)/2 + $nbrRattrap/4));
 }

function moyClassementLicence($moyL1,$moyL2,$moyL3,$nbrRedouble,$nbrDette,$nbrRattrap) {
     $moyGenerale = ($moyL1+$moyL2+$moyL3)/3;
     return  $moyGenerale*(1 - 0.04*($nbrRedouble + ($nbrDette)/2 + $nbrRattrap/4));
 }

?>