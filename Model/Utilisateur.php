<?php
class Utilisateur {
    // Attributs
    private $idUser;
    private $nom;
    private $prenom;
    private $dateNaiss;
    private $email;
    private $password;
    private $isAdmin;
    
    //Constructeur
    function __construct($idUser,$nom,$prenom,$dateNaiss,$email,$password,$isAdmin) {
        $this->idUser=$idUser;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->dateNaiss=$dateNaiss;
        $this->email= $this->email();
        $this->password=$password;
        $this->isAdmin=$isAdmin;
        
    }

    
    function email() {
        return $this->prenom.'.'.$this->nom.'@univ-bejaia.dz';
    }


    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Get the value of dateNaiss
     */ 
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
}
?>