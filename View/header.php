<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http:\\myChoice\bootstrap\css\bootstrap.css">
    <link rel="stylesheet" href="http:\\myChoice\styles\headerfooter.css">
    
    <link rel="stylesheet" href="http:\\myChoice\styles\bootstrap-datepicker.css">
    <link rel="stylesheet" href="http:\\myChoice\styles\dashboard.css">
    
    <link rel="shortcut icon" href="http:\\myChoice/icon/ananas.ico" type="image/x-icon">
    <title><?= $titrePage ?></title>
</head>

<body>

<div class="container-fluid px-5 bg-dark">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
        <a class="navbar-brand" href="../">
            <img src="http:\\localhost\myChoice\img\ananas.png" width="35" height="35" class="d-inline-block align-top" alt="logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="navbar-collapse collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            
            <li class="nav-item">
                <a class="nav-link menuNav" href="http:\\myChoice/dashboard/fiches/">Fiches de voeux</a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link menuNav" href="http:\\myChoice/dashboard/specialites/">Spécialités</a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link menuNav" href="http:\\myChoice/dashboard/membres/">Membres</a>
                
            </li>

            <li class="nav-item">
            <a class="nav-link menuNav" href="http:\\myChoice/dashboard/resultats/">Résultats</a>
             </li>

            </ul>
            <a class="nav-link deconnect" href="http:\\myChoice\Controller\deconnexion.php">
                    Deconnexion <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg></a>
        </div>
        
    </nav>

</div>
