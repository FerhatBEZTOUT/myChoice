<?php


    if(isset($_POST['email']) && $_POST['password']) {
        include_once '../Model/connexionBDD.php';
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        try {
            $requeteLogin = $bdd->prepare("SELECT * FROM Utilisateur WHERE email=? AND password=?");
            $requeteLogin->execute(array($email,$mdp));
            if ($requeteLogin->rowCount() == 1) {
                session_start();
                $user = $requeteLogin->fetch(PDO::FETCH_OBJ);
                $_SESSION['connecté']=true;
                $_SESSION['id']= $user->idUser;
                $_SESSION['userType']=$user->userType;
                $_SESSION['infos']=$user;
                echo $_SESSION['userType'];
                
            } else {
                echo 'erreur';
            }
        } catch (Exception $e) {
    
        }
        
    }

    

?>