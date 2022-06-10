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
    

    $htmlBegin = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .myClass {
            color:red;
        }

        .d-flex {
            display: flex !important;
          }

        

        .text-center {
            text-align: center !important;
        }

        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * 0.5);
        padding-left: calc(var(--bs-gutter-x) * 0.5);
        margin-right: auto;
        margin-left: auto;
            }
        
        .vh-100 {
            height: 100vh !important;
            }

        .mt-3 {
            margin-top: 1rem !important;
            }
        
        .titre {
            color:rgb(8, 77, 204);
        }

        .mt-5 {
            margin-top: 3rem !important;
          }

          h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
            color: var(--bs-heading-color);
            
          }
        

        .justify-content-between {
        justify-content: space-between !important;
        }

        .justify-content-around {
            justify-content: space-around !important;
        }

        hr {
            margin: 1rem 0;
            color: inherit;
            border: 0;
            border-top: 1px solid;
            opacity: 0.25;
          }

        .nomSpecia {
            display:inline-block;
            width:500px;
        }

        .ordSpecia {
            display:inline-block;
            width:auto;
            text-align: end;
        }
    </style>
    <title>Ma fiche de voeux</title>
</head>
<body>
    <div class="container">
        <h2 class="titre text-center mt-3">Fiche de voeux</h2>
        <h5>Université de Béjaia</h5>
        <h6>Identifiant : '.$idUser.' </h6>
        <h6>Nom : '.$nom.'</h6>
        <h6>Prénom : '.$prenom.'</h6>
        <h6>Spécialité courante : '.$speciaCour.'</h6>
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h4 class="nomSpecia">Nom spécialité</h4>
                <h4 class="ordSpecia">Ordre</h4>
                
            </div>
            <hr>';
$htmlMid = '';
            foreach ($listVoeux as $v) {
                    $nomSpecia = htmlentities(getNomSpecialite($v->idSpecialite),ENT_QUOTES,"ISO-8859-1");
                    $ord = strval($v->ordre);
                    $htmlMid = $htmlMid.'<div class="d-flex justify-content-between">
                    
                    <h5 class="nomSpecia">'.$nomSpecia.'</h5>
                    
                    <h5 class="ordSpecia">'.$ord.'</h5>
                    
                    
                    
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