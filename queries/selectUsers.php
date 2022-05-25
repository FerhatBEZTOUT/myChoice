<?php

    include_once '../Model/connexionBDD.php';
    try {
    $requeteUser = $bdd->prepare("SELECT * FROM Utilisateur");
    $requeteUser->execute([$_POST['name']]);

    if ($requeteUser->rowCount() == 1) {
            $result = $requeteUser->fetchALL(PDO::FETCH_ASSOC);
            $json = json_encode($result);
            echo $json;
        } else {
            echo json_encode('erreur');
        }
    } catch (Exception $e) {
        echo 'exception error';
    }



?>