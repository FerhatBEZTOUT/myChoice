<?php 
class AnneeEtud {
    private $idAnneeEtud;
    private $cycle;
    private $annee;

    function __construct($idAnneeEtud,$cycle,$annee){
        $this->idAnneeEtud=$idAnneeEtud;
        $this->cycle=$cycle;
        $this->annee=$annee;
    }

    

    /**
     * Get the value of idAnneeEtud
     */ 
    public function getIdAnneeEtud()
    {
        return $this->idAnneeEtud;
    }

    /**
     * Get the value of cycle
     */ 
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }
}

?>