<?php
include_once '../Controller/checkConnexion.php';
$titrePage = "Accueil - Admin";
include_once '../View/header.php';
?>

<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center p-5">
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card" style="width: 15rem;">
            <a href="http:\\myChoice/dashboard/fiches/">
            <img src="../img/fichedevoeux.png" class="card-img-top" alt="...">
            </a>
                
                <div class="card-body">
                    <h5 class="card-title">Fiche de voeux</h5>
                    <div class="d-flex justify-content-around">
                        <a href="http:\\myChoice/dashboard/fiches/add.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(39, 165, 14)" class="bi bi-plus-square-fill pointer" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                        </a>
                        <a href="http:\\myChoice/dashboard/fiches">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(202, 54, 8)" class="bi bi-pencil-square pointer" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        </a>
                        
                        
                    </div>


                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card" style="width: 15rem;">
            <a href="http:\\myChoice/dashboard/specialites">
            <img src="../img/specialite.png" class="card-img-top" alt="...">
            </a>
                
                <div class="card-body">
                    <h5 class="card-title">Specialités</h5>

                    <div class="d-flex justify-content-around">
                        <a href="http:\\myChoice/dashboard/specialites">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(39, 165, 14)" class="bi bi-plus-square-fill pointer" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                        </a>
                        <a href="http:\\myChoice/dashboard/specialites/add.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(202, 54, 8)" class="bi bi-pencil-square pointer" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                        </a>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card" style="width: 15rem;">
            <a href="http:\\myChoice/dashboard/membres">
            <img src="../img/user.png" class="card-img-top" alt="...">
            </a>
                
                <div class="card-body">
                    <h5 class="card-title">Membres</h5>

                    <div class="d-flex justify-content-around">
                    <a href="http:\\myChoice/dashboard/membres/add.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(39, 165, 14)" class="bi bi-plus-square-fill pointer" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                    </a>
                    <a href="http:\\myChoice/dashboard/membres">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(202, 54, 8)" class="bi bi-pencil-square pointer" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 ">
            <div class="card" style="width: 15rem;">
            <a href="http:\\myChoice/dashboard/resultats">
            <img src="../img/ok.png" class="card-img-top" alt="...">
            </a>
                
                <div class="card-body">
                    <h5 class="card-title">Résultats</h5>

                    <div class="d-flex justify-content-around">
                    <a href="http:\\myChoice/dashboard/resultats">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(20, 105, 184)" class="bi bi-eye-fill pointer" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once '../View/footer.php';
?>