<?php 
    include_once __DIR__.'/../Model/connexionBDD.php';
    include_once __DIR__.'/../queries/fiches.php';
    include_once __DIR__.'/../queries/moyenne.php';
    include_once __DIR__.'/../queries/voeux.php';

    function getUsers() {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT * FROM Utilisateur");
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    
        
    }

    function getUsersBySpecia($id) {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT * FROM Utilisateur WHERE specialiteCourante=?");
            $request->execute(array($id));
            $result = $request->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserById($id) {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT * FROM Utilisateur WHERE idUser=?");
            $request->execute(array($id));
            $result = $request->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function addAdmin($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType) {
        global $bdd;
        try {
            $request = $bdd->prepare("INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType) values (?,?,?,?,?,?,?)");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function addEtd($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType,$licenceTrois,$anneeCourante,$specialiteCourante) {
        global $bdd;
        try {
            $request = $bdd->prepare("INSERT INTO Utilisateur(nom,prenom,dateNaiss,email,password,isAdmin,userType,licenceTrois,anneeCourante,specialiteCourante) values (?,?,?,?,?,?,?,?,?,?)");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$userType,$licenceTrois,$anneeCourante,$specialiteCourante));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    
    function editAdmin($nom,$prenom,$dateNaiss,$email,$password,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,password=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editAdminNoPass($nom,$prenom,$dateNaiss,$email,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function editEtd($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,password=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editEtdNoPass($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=? WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function editEtdNoFutur($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,password=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=NULL WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$password,$licenceTrois,$anneeCourante,$specialiteCourante,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editEtdNoPassNoFutur($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET nom=?,prenom=?,dateNaiss=?,email=?,licenceTrois=?,anneeCourante=?,specialiteCourante=?,specialiteFuture=NULL WHERE idUser=?");
            $request->execute(array($nom,$prenom,$dateNaiss,$email,$licenceTrois,$anneeCourante,$specialiteCourante,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }


    function updateSpeciaFuture($specialiteCourante,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET specialiteFuture=? WHERE idUser=?");
            $request->execute(array($specialiteCourante,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    
    
    function deleteUser($id) {
        global $bdd;
        try {
            $request = $bdd->prepare("DELETE FROM Utilisateur WHERE idUser=?");
            $request->execute(array($id));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    function setSpecialiteFuture($specialiteFuture,$id) {
        global $bdd;
        try {
            $request = $bdd->prepare("UPDATE Utilisateur SET specialiteFuture=? WHERE idUser=?");
            $request->execute(array($specialiteFuture,$id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getNbrUserValide($idFiche) {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT COUNT(DISTINCT idUser) FROM Voeux WHERE idFiche=?");
            $request->execute(array($idFiche));
            $result = $request->fetch(PDO::FETCH_NUM);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getNbrUserSpecia($idSpecia) {
        global $bdd;
        try {
            $request = $bdd->prepare("SELECT COUNT(*) FROM Utilisateur WHERE specialiteCourante=?");
            $request->execute(array($idSpecia));
            $result = $request->fetch(PDO::FETCH_NUM);
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    

    function orienterEtudiants($id) {
        $fiche = getFichesById($id);
        $idFic = $fiche->idFiche;
        $destin = $fiche->Destination;

        $etudiants = getUsersBySpecia($destin);
        $specialites = getSpecialitesOfFiche($idFic);
        foreach ($specialites as $s) {
            $listSpecia[$s->idSpecialite]=$s->nbrPlaces;
            
        }
        $listEtudiantMoyenne = [];
        $listVoeux = [];
        $l3 = (int)$etudiants[0]->licenceTrois;
        
        if ($l3) {
            foreach ($etudiants as $e) {
                $moyInfos = getMoyenneByUser($e->idUser);
                foreach ($moyInfos as $m) {
                    $ann = $m->idAnneeEtud;
                    if ($ann>0 && $ann<4) {
                        $moy = $m->moyenne;
                        $ratt = $m->rattrapage;
                        $redoub = $m->redouble;
                        $dett = $m->dette;
                        $moyTmp[$ann] = moyClassementAnnuelle($moy,$redoub,$dett,$ratt);
                    }
                    
                }
                
                $listEtudiantMoyenne[$e->idUser]= (float)($moyTmp[1]+ $moyTmp[2]+ $moyTmp[3])/3;
                arsort($listEtudiantMoyenne);
           }
           

           foreach ($listEtudiantMoyenne as $key => $value) {
            
            $voeux = getVoeuxByUserFiche($key,$idFic);
            foreach ($voeux as $v) {
                $listVoeux[$v->idSpecialite]= $v->ordre;
            }
            asort($listVoeux);
            $oriented = false;
            foreach ($listVoeux as $idSpec => $ord) {
                if($listSpecia[$idSpec]>0) {
                    updateSpeciaFuture($idSpec,$key);
                    $listSpecia[$idSpec]=$listSpecia[$idSpec]-1;
                    $oriented = true;
                    break;
                }
            }

            if(!$oriented) {
                updateSpeciaFuture($listVoeux[end($listVoeux)],$key);
                
                
            }
           
           }
           
        } else {
            foreach ($etudiants as $e) {
                $moyInfos = getMoyenneByUserAnnee($e->idUser,$e->anneeCourante);
                $moy = $moyInfos->moyenne;
                $ratt = $moyInfos->rattrapage;
                $redoub = $moyInfos->redouble;
                $dett = $moyInfos->dette;
                $moyClassement = moyClassementAnnuelle($moy,$redoub,$dett,$ratt);
                $listEtudiantMoyenne[$e->idUser]= $moyClassement;
                arsort($listEtudiantMoyenne);
           }

           

           foreach ($listEtudiantMoyenne as $key => $value) {
            
            $voeux = getVoeuxByUserFiche($key,$idFic);
            foreach ($voeux as $v) {
                $listVoeux[$v->idSpecialite]= $v->ordre;
            }
            asort($listVoeux);
            $oriented = false;
            foreach ($listVoeux as $idSpec => $ord) {
                if($listSpecia[$idSpec]>0) {
                    updateSpeciaFuture($idSpec,$key);
                    $listSpecia[$idSpec]=$listSpecia[$idSpec]-1;
                    $oriented = true;
                    break;
                }
            }

            if(!$oriented) {
                updateSpeciaFuture($listVoeux[end($listVoeux)],$key);
               
            }
            
           }
        }
        
        setFicheAcheve($idFic);
    }


    function getUsersWithFiche($idFiche) {
        $spec = getFichesById($idFiche);
        $dest = $spec->Destination;
        $users = getUsersBySpecia($dest);

        return $users;

    }
?>