<?php
session_start();
require __DIR__.'/../vendor/autoload.php';
include_once __DIR__.'/../queries/utilisateurs.php';
include_once __DIR__.'/../queries/voeux.php';
include_once __DIR__.'/../queries/specialite.php';
use Dompdf\Dompdf;

    $idUser = $_SESSION['id'];
    $idFiche = $_SESSION['idFiche'];
    $listVoeux = getVoeuxByUserFiche($idUser,$idFiche);
    $userInfo = getUserById($idUser);

    $nom = $userInfo->nom;
    $prenom = $userInfo->prenom;
    $speciaCour = htmlentities(getNomSpecialite($userInfo->specialiteCourante),ENT_QUOTES,"ISO-8859-1");




    $html2pdf = new Dompdf();
    $html2pdf->set_base_path("http:\\myChoice/");

    $htmlBegin = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="http:styles\pdfStyle.css">
    <title>Ma fiche de voeux</title>
</head>
<body>
    <div class="container vh-100">
        <h2 class="titre text-center mt-3">Fiche de voeux</h2>
        <h5>Université de Béjaia</h5>
        <h6>Identifiant : '.$idUser.' </h6>
        <h6>Nom : '.$nom.'</h6>
        <h6>Prénom : '.$prenom.'</h6>
        <h6>Spécialité courante : '.$speciaCour.'</h6>
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h4>Liste des spécialités</h4>
                
            </div>
            <hr>';
$htmlMid = '';
            foreach ($listVoeux as $v) {
                    $nomSpecia = htmlentities(getNomSpecialite($v->idSpecialite),ENT_QUOTES,"ISO-8859-1");
                    $ord = strval($v->ordre);
                    $htmlMid = $htmlMid.'<div class="d-flex justify-content-around">
                    <h5>'.$nomSpecia.'</h5>
                    <h5>Ordre : '.$ord.'</h5>
                </div>
                <hr>';
            }
             

        
        
 $htmlEnd= '</div>
    </div>
</body>
</html>';
    $html = $htmlBegin.$htmlMid.$htmlEnd;
    $html2pdf->loadHtml($html);
    $html2pdf->setPaper('A4','portrait');
    $html2pdf->render();
    
    $html2pdf->stream('fiche-de-voeux.pdf');
    
  



?>