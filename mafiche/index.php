<?php
include_once '../Controller/checkConnexion.php';
include_once '../Controller/specialites.php';
include_once '../queries/utilisateurs.php';
include_once '../queries/fiches.php';
include_once '../queries/specialite.php';
include_once '../queries/voeux.php';

$errorMsg = "";
$idUser = $_SESSION['id'];
$today = date('Y-m-d');
$user = getUserById($idUser);
$nomUser = $user->nom;
$prenomUser = $user->prenom;
$anneeUser = $user->anneeCourante;
$SpeciaUser = $user->specialiteCourante;

$ficheVoeux =  getFichesBySpecialite($SpeciaUser);
global $trouve;
$trouve = false;
global $dateD;
$dateD = false;
global $dateF;
$dateF = false;
global $fiche;
global $listSpecialite;
$listSpecialite = [];



foreach ($ficheVoeux as $f) {

    if ($today >= $f->DateDebut && $today <= $f->DateFin) {
        $fiche = $f;
        $i = 1;
        $specias = getSpecialitesOfFiche($f->idFiche);
        foreach ($specias as $s) {
            $listSpecialite[$i] = [$s->idSpecialite, getProgrammeSpecialite($s->idSpecialite)];
            $i++;
        }

        $trouve = true;

        break;
    }
}

if (!$trouve) {
    foreach ($ficheVoeux as $f) {
        if ($today < $f->DateDebut) {
            $dateD = true;
            $fiche = $f;
            break;
        } elseif ($today > $f->DateFin) {
            $dateF = true;
            $fiche = $f;
            break;
        }
    }
}

$_SESSION['idFiche'] = $fiche->idFiche;


$dejaValide = (int)getVoeuxByUserFiche($idUser, $fiche->idFiche);

$allOk = false;

if (!$dejaValide) {
    $isset = true;
    foreach ($listSpecialite as $spec) {
        if (!isset($_POST['ordre' . $spec[0]]) || $_POST['ordre' . $spec[0]] == '') {
            $isset = false;
            break;
        }
    }

    if ($isset) {
        $listValueSpecia = [];
        foreach ($listSpecialite as $spec) {
            array_push($listValueSpecia, $_POST['ordre' . $spec[0]]);
        }
        $setValueSpecia = array_unique($listValueSpecia);
        if (sizeof($setValueSpecia) == sizeof($listValueSpecia)) {
            $i = 1;
            $sum1 = 0;
            while ($i <= sizeof($listValueSpecia)) {
                $sum1 += $i;
                $i++;
            }
            $sum2 = 0;
            foreach ($listValueSpecia as $v) {
                $sum2 += intval($v);
                
            }
           
            if ($sum1 == $sum2 && $sum1>0) {
                $allOk = true;
            } elseif ($sum1>0){
               
                $errorMsg = 'Vous avez introduis des chiffres erronés';
            }
        } elseif (sizeof($setValueSpecia)>0) {
            
            $errorMsg = 'Vous avez introduit des spécialités ayant le même ordre';
        }

        
        if ($allOk) {
            $ordreSpecialite = [];

            foreach ($listSpecialite as $s) {
                $tmp = [$s[0], $_POST['ordre' . $s[0]]];
                array_push($ordreSpecialite, $tmp);
            }
            insertVoeux($idUser, $fiche->idFiche, $ordreSpecialite);
            header('location:.');
        }
    } else {
        $errorMsg = 'Ordonnez vos voeux';
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/mafiche.css">
    <link rel="shortcut icon" href="http:\\myChoice/icon/ananas.ico" type="image/x-icon">
    <title>Ma fiche de voeux</title>
</head>

<body>
    <div class="container-fluid monNavBar">
        <nav class="monNavBar row navbar">
            <div class="col-2 col-sm-2 d-flex justify-content-center align-items-center row mx-auto">
                <div class="col-12 text-center"><img src="../img/ananas.png" width="50" height="50" class="d-inline-block align-top" alt=""></div>
                <div class="titre-logo col-12">
                    <h6 class="text-center">MyChoice</h6>
                </div>
            </div>
            <div class="col-4 col-sm-8">
                <h1 class="d-none d-sm-block titre-page-connexion text-center">MyChoice</h1>
            </div>
            <div class="col-6 col-sm-2 text-center">
                <a class="nav-link deconnect" href="http:\\myChoice\Controller\deconnexion.php">
                    Deconnexion <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg></a>
            </div>

        </nav>
    </div>

    <div class="container py-4 text-center">
        <h2 class="titrePage">Bienvenue <?= $nomUser . ' ' . $prenomUser ?></h2>
    </div>

    <?php

    if ($dejaValide) {
        afficherDejaValide($idUser);
    } else {
        remplirSpecialiteFiche();
    }

    ?>

    <h6 class="msgError mt-1 mb-3 text-center" id="errorMsgAddFiche"><?= $errorMsg ?></h6>
    <?php include_once '../View/footer.php' ?>
    <script src="../scripts/fiche.js"></script>
</body>

</html>