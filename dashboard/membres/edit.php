<?php
include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/utilisateur.php';
$titrePage = "Modifier un membre";
include_once '../../View/header.php';
include_once '../../Model/Utilisateur.php';
include_once '../../Controller/checkData.php';
include_once '../../queries/utilisateurs.php';
include_once '../../queries/moyenne.php';
$msgError = "";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $user = getUserById($id);

    $typeUser = $user->userType;
    $nomUser = $user->nom;
    $prenomUser = $user->prenom; 
    $dateNaissUser = $user->dateNaiss;
    $emailUser = $user->email;
    $passwordUser = $user->password;
    
    if ($typeUser=='etd') {
        
        $mL1 = getMoyenneByUserAnnee($id,1);
        $mL2 = getMoyenneByUserAnnee($id,2);
        $mL3 = getMoyenneByUserAnnee($id,3);
        $mM1 = getMoyenneByUserAnnee($id,4);
        $mM2 = getMoyenneByUserAnnee($id,5);
        if ($mL1) {
            $moyL1 = $mL1->moyenne;
            } else {
                $moyL1 = '';
            }

        if ($mL2) {
            $moyL2 = $mL2->moyenne;
            } else {
                $moyL2 = '';
            }

        if ($mL3) {
            $moyL3 = $mL3->moyenne;
            } else {
                $moyL3 = '';
            }

        if ($mM1) {
            $moyM1 = $mM1->moyenne;
            } else {
                $moyM1 = '';
            }

        if ($mM2) {
            $moyM2 = $mM2->moyenne;
            } else {
                $moyM2 = '';
            }
        
        
        
        
        

        $anneeCouranteUser = $user->anneeCourante;
        $specialiteCouranteUser = $user->specialiteCourante;
        $specialiteFutureUser = $user->specialiteFuture;

        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserEmail'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate'])
        && isset($_POST['addUserAnnee'])
        && isset($_POST['addUserSpecia'])
        && isset($_POST['addUserSpeciaFuture'])
        && $_POST['addUserSpeciaFuture']!=0)  {
           
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];
            $userAnnee = (int)$_POST['addUserAnnee'];
            if ($userAnnee == 3) {
                $userLicence = true;
            } else {
                $userLicence = 0;
            }
            $userSpecia = (int)$_POST['addUserSpecia'];
            $userSpeciaFuture = (int)$_POST['addUserSpeciaFuture'];
            
            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate) && $userAnnee && $userSpecia && $userSpeciaFuture) {
                    if(isset($_POST['moyL1'])) {
                        
                        if($_POST['moyL1']>=0 && $_POST['moyL1']<=20) {
                            $moyData = getMoyenneByUserAnneeSpecia($id,1,$specialiteCouranteUser);
                            if($moyData) {
                                $ratt = $moyData->rattrapage;
                                $redd = $moyData->redouble;
                                $dett = $moyData->dette;
                            } else {
                                $ratt = 0;
                                $redd = 0;
                                $dett = 0;
                            }
                            
                            replaceMoy($id,1,$specialiteCouranteUser,(float)$_POST['moyL1'],$ratt,$redd,$dett);
                        } else {
                            $msgError = 'Moyenne L1 doit être entre 0 et 20';
                        }
                    }

                    if(isset($_POST['moyL2'])) {
                        if($_POST['moyL2']>=0 && $_POST['moyL2']<=20) {
                            $moyData = getMoyenneByUserAnneeSpecia($id,2,$specialiteCouranteUser);
                            if($moyData) {
                                $ratt = $moyData->rattrapage;
                                $redd = $moyData->redouble;
                                $dett = $moyData->dette;
                            } else {
                                $ratt = 0;
                                $redd = 0;
                                $dett = 0;
                            }
                            
                            replaceMoy($id,1,$specialiteCouranteUser,(float)$_POST['moyL2'],$ratt,$redd,$dett);
                        } else {
                            $msgError = 'Moyenne L2 doit être entre 0 et 20';
                        }
                    }

                    if(isset($_POST['moyL3'])) {
                        if($_POST['moyL3']>=0 && $_POST['moyL3']<=20) {
                            $moyData = getMoyenneByUserAnneeSpecia($id,1,$specialiteCouranteUser);
                            if($moyData) {
                                $ratt = $moyData->rattrapage;
                                $redd = $moyData->redouble;
                                $dett = $moyData->dette;
                            } else {
                                $ratt = 0;
                                $redd = 0;
                                $dett = 0;
                            }
                            
                            replaceMoy($id,1,$specialiteCouranteUser,(float)$_POST['moyL3'],$ratt,$redd,$dett);
                        } else {
                            $msgError = 'Moyenne L3 doit être entre 0 et 20';
                        }
                    }

                    if(isset($_POST['moyM1'])) {
                        if($_POST['moyM1']>=0 && $_POST['moyM1']<=20) {
                            $moyData = getMoyenneByUserAnneeSpecia($id,1,$specialiteCouranteUser);
                            if($moyData) {
                                $ratt = $moyData->rattrapage;
                                $redd = $moyData->redouble;
                                $dett = $moyData->dette;
                            } else {
                                $ratt = 0;
                                $redd = 0;
                                $dett = 0;
                            }
                            
                            replaceMoy($id,1,$specialiteCouranteUser,(float)$_POST['moyM1'],$ratt,$redd,$dett);
                        } else {
                            $msgError = 'Moyenne M1 doit être entre 0 et 20';
                        }
                    }

                    if(isset($_POST['moyM2'])) {
                        if($_POST['moyM2']>=0 && $_POST['moyM2']<=20) {
                            $moyData = getMoyenneByUserAnneeSpecia($id,1,$specialiteCouranteUser);
                            if($moyData) {
                                $ratt = $moyData->rattrapage;
                                $redd = $moyData->redouble;
                                $dett = $moyData->dette;
                            } else {
                                $ratt = 0;
                                $redd = 0;
                                $dett = 0;
                            }
                            
                            replaceMoy($id,1,$specialiteCouranteUser,(float)$_POST['moyM2'],$ratt,$redd,$dett);
                        } else {
                            $msgError = 'Moyenne M2 doit être entre 0 et 20';
                        }
                    }

                    editEtdNoPass($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                    header("location:../membres");
                } elseif (!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } elseif (!$userAnnee) {
                    $msgError = "Choisissez une année";
                } elseif (!$userSpecia) {
                    $msgError = "Choisissez une spécialité courante";
                } elseif (!$userSpeciaFuture) {
                    
                    editEtdNoPassNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$id);
                } else {
                    $msgError = "Tous les champs doivent être remplis";
                }
            } 
            
            
            elseif (myCheckDate($userDate) && $userAnnee && $userSpecia && $userSpeciaFuture && strlen($userMdp)>7) {
                 $userMdp = md5($userMdp);
                editEtd($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                header("location:../membres");
            } elseif (!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } elseif (!$userAnnee) {
                $msgError = "Choisissez une année";
            } elseif (!$userSpecia) {
                $msgError = "Choisissez une spécialité courante";
            } elseif (!$userSpeciaFuture) {
              
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                
            } else {
                $msgError = "Tous les champs doivent être remplis";
            }
        
         } elseif (
            isset($_POST['addUserNom'])
            && isset($_POST['addUserPrenom'])
            && isset($_POST['addUserEmail'])
            && isset($_POST['addUserMdp'])
            && isset($_POST['addUserDate'])
            && isset($_POST['addUserAnnee'])
            && isset($_POST['addUserSpecia'])
         ) {
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];
            $userAnnee = (int)$_POST['addUserAnnee'];
            if ($userAnnee == 3) {
                $userLicence = true;
            } else {
                $userLicence = 0;
            }
            $userSpecia = (int)$_POST['addUserSpecia'];
           
            
            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate) && $userAnnee && $userSpecia) {
                   
                    editEtdNoPass($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$userSpeciaFuture,$id);
                    header("location:../membres");
                } elseif (!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } elseif (!$userAnnee) {
                    $msgError = "Choisissez une année";
                } elseif (!$userSpecia) {
                    $msgError = "Choisissez une spécialité courante";
                } else {
                    
                    editEtdNoPassNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userLicence,$userAnnee,$userSpecia,$id);
                    header("location:../membres");
                } 
            } 
            
            
            elseif (myCheckDate($userDate) && $userAnnee && $userSpecia && strlen($userMdp)>7) {
                 $userMdp = md5($userMdp);
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                header("location:../membres");
            } elseif (!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } elseif (!$userAnnee) {
                $msgError = "Choisissez une année";
            } elseif (!$userSpecia) {
                $msgError = "Choisissez une spécialité courante";
            } else {
               
                $userMdp = md5($userMdp);
                editEtdNoFutur($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$userLicence,$userAnnee,$userSpecia,$id);
                header("location:../membres");
                
            } 
         }
        
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    else {
        if (isset($_POST['addUserNom'])
        && isset($_POST['addUserPrenom'])
        && isset($_POST['addUserEmail'])
        && isset($_POST['addUserMdp'])
        && isset($_POST['addUserDate']))  {
            
            $userNom = $_POST['addUserNom'];
            $userPrenom = $_POST['addUserPrenom'];
            $userEmail = $_POST['addUserEmail'];
            $userNom =  ucfirst($userNom);
            $userPrenom = ucfirst($userPrenom);
            $userMdp = $_POST['addUserMdp'];
            $userDate = $_POST['addUserDate'];


            if (strlen($userMdp)==0) {
                if (myCheckDate($userDate)) {
                   
                    editAdminNoPass($userNom,$userPrenom,$userDate,$userEmail,$id);
                    header("location:../membres");
                }
                elseif(!myCheckDate($userDate)) {
                    $msgError = "Date de naissance incorrete";
                } else {
                    $msgError = "Tous les champs doivent être remplis";
                }
            }
            elseif (myCheckDate($userDate) && strlen($userMdp)>7) {
                $userMdp = md5($userMdp);
                
                editAdmin($userNom,$userPrenom,$userDate,$userEmail,$userMdp,$id);
                header("location:../membres");
            }
            elseif(!myCheckDate($userDate)) {
                $msgError = "Date de naissance incorrete";
            } else {
                $msgError = "Tous les champs doivent être remplis";
            }
        
        } 
          
         
    }


}


    
    



?>
<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Membre - Modification</h3>
</div>
<div class="container mx-auto px-5">
    
    <form method="POST" action="edit.php?id=<?= $id ?>">

        
        <div class="form-group mb-3">
            <label class="myLabel" for="addUserNom">Nom</label>
            <input class="form-control" type="text" name="addUserNom" id="addUserNom" placeholder="Nom" required value="<?= htmlentities($nomUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserPrenom">Prénom</label>
            <input class="form-control" type="text" name="addUserPrenom" id="addUserPrenom" placeholder="Prénom" required value="<?= htmlentities($prenomUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserEmail">Email</label>
            <input class="form-control" type="text" name="addUserEmail" id="addUserEmail" placeholder="Email" required value="<?= htmlentities($emailUser) ?>">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserMdp">Mot de passe</label>
            <input class="form-control" type="password" name="addUserMdp" id="addUserMdp" placeholder="Laisser vide pour ne pas modifier" autocomplete="off">
        </div>

        <div class="form-group mb-3">
            <label class="myLabel" for="addUserDate">Date de naissance</label>
            <input class="form-control" type="text" name="addUserDate" id="addUserDate" placeholder="Date de naissance" autocomplete="off" required value="<?= htmlentities($dateNaissUser) ?>">
        </div>

        <div class="form-group mb-3" id="addUserAnneeDiv">
            <label class="myLabel" for="addUserAnnee">Année en cours</label>
            <select class="form-select" aria-label="Etat" id="addUserAnnee" name="addUserAnnee">
                <option value="1" <?php if ($typeUser=='etd' && $anneeCouranteUser==1) echo 'selected'?>>Licence 1</option>
                <option value="2" <?php if ($typeUser=='etd' && $anneeCouranteUser==2) echo 'selected'?>>Licence 2</option>
                <option value="3" <?php if ($typeUser=='etd' && $anneeCouranteUser==3) echo 'selected'?>>Licence 3</option>
                <option value="4" <?php if ($typeUser=='etd' && $anneeCouranteUser==4) echo 'selected'?>>Master 1</option>
                <option value="5" <?php if ($typeUser=='etd' && $anneeCouranteUser==5) echo 'selected'?>>Master 2</option>
            </select>
        </div>


        <div class="form-group mb-3" id="addUserSpeciaDiv">
            <label class="myLabel" for="addUserSpecia">Spécialité courante</label>
            <select class="form-select" aria-label="Etat" id="addUserSpecia" name="addUserSpecia" >
                <?php if ($typeUser=='etd') remplirSpeciaWithValue($specialiteCouranteUser) ?>
            </select>
        </div>

        <div class="form-group mb-3" id="addUserSpeciaFutureDiv">
            <label class="myLabel" for="addUserSpeciaFuture">Spécialité future</label>
            <select class="form-select" aria-label="Etat" id="addUserSpeciaFuture" name="addUserSpeciaFuture" >
                <option value="0" selected >Aucune</option>
                <?php if ($typeUser=='etd') remplirSpeciaWithValue($specialiteFutureUser) ?>
            </select>
        </div>
        
        <div class="form-control ml-2 mb-3 row d-flex justify-content-around" id="moyenneDiv">
        <label class="myLabel" for="moyenneDiv">Moyennes annuelles</label>
            <div class="col-2 row">
                <label for="moyL1">Licence 1</label>
                <input type="number" name="moyL1" id="moyL1" value="<?php if ($typeUser=='etd' && $moyL1) echo sprintf('%.2f',htmlentities($moyL1)) ?>" step="any">
            </div>

            <div class="col-2 row">
                <label for="moyL2">Licence 2</label>
                <input type="number" name="moyL2" id="moyL2" value="<?php if ($typeUser=='etd' && $moyL2) echo sprintf('%.2f',htmlentities($moyL2)) ?>" step="any">
            </div>
            <div class="col-2 row">
                <label for="moyL3">Licence 3</label>
                <input type="number" name="moyL3" id="moyL3" value="<?php if ($typeUser=='etd' && $moyL3) echo sprintf('%.2f',htmlentities($moyL3)) ?>" step="any">
            </div>
            <div class="col-2 row">
                <label for="moyM1">Master 1</label>
                <input type="number" name="moyM1" id="moyM1" value="<?php if ($typeUser=='etd' && $moyM1) echo sprintf('%.2f',htmlentities($moyM1))  ?>" step="any">
            </div>
            <div class="col-2 row">
                <label for="moyM2">Master 2</label>
                <input type="number" name="moyM2" id="moyM2" value="<?php if ($typeUser=='etd' && $moyM2) echo sprintf('%.2f',htmlentities($moyM2)) ?>" step="any">
            </div>
            
        </div>

        <div class="form-group mb-3 text-center">
            <button class="btn btn-primary" type="submit">Modifier</button>
            <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $msgError ?></h6>
        </div>


    </form>
</div>
<?php

    
    if ($typeUser=='admin') {
        echo '<script type="text/javascript">
        document.getElementById("addUserAnneeDiv").style.display="none";
        document.getElementById("addUserAnneeDiv").removeAttribute("required");
        document.getElementById("addUserSpeciaDiv").style.display="none";
        document.getElementById("addUserSpeciaDiv").removeAttribute("required");
        document.getElementById("addUserSpeciaFutureDiv").style.display="none";
        document.getElementById("addUserAnneeDiv").removeAttribute("required");
        document.getElementById("moyenneDiv").classList.remove("d-flex");
        document.getElementById("moyenneDiv").style.display="none";
        </script>';
    }

include_once '../../View/footer.php';
?>