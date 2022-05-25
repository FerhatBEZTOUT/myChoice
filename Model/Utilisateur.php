<?php
class Utilisateur {
    // Attributs
    private string $nom;
    private string $prenom;
    
    //Constructeur
    function __construct($nom,$prenom) {
        $this->nom=$nom;
        $this->prenom=$prenom;
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
}
?>