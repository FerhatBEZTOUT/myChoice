<?php
    session_start();
    include_once 'Model/Utilisateur.php';
    
    if(isset($_SESSION['connecté'])) {
        $userType = $_SESSION['userType'];

        if ($userType=='admin') {
            header('location:dashboard');
        } else {
            header('location:mafiche');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="shortcut icon" href="icon/ananas.ico" type="image/x-icon">
    
    <title>MyChoice - Connexion</title>
</head>

<body>
    
    <div class="container-fluid monNavBar">
        <nav class="monNavBar row navbar navbar-dark bg-dark">
            <div class="col-2 col-sm-2 d-flex justify-content-center align-items-center row mx-auto">
                <div class="col-12 text-center"><img src="img/ananas.png" width="50" height="50"
                        class="d-inline-block align-top" alt=""></div>
                <div class="titre-logo col-12">
                    <h6 class="text-center">MyChoice</h6>
                </div>
            </div>
            <div class="col-10 col-sm-10">
                <h1 class="titre-page-connexion text-center">MyChoice</h1>
            </div>
        </nav>
    </div>
    
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-0 shadow login-form">
                        <div class="card-body">
                            <div class="row m-auto">
                                <svg class="mt-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                    fill="#FFFFFF" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </div>

                            <form method="POST" id="postFormLogin">
                                <input type="email" name="email" id="email" class="form-control my-4 py-2"
                                    placeholder="Email">
                                <input type="password" name="password" id="password" class="form-control my-4 py-2"
                                    placeholder="Mot de passe">
                                <div class="text-center">
                                    <button type="button" id="btnSeConnecter" value="Se connecter" class="btn btn-success">Se connecter</button>
                                    <h6 id="errorMsg"></h6>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="scripts/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="scripts/index.js"></script>
   
   
</body>

</html>