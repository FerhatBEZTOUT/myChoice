<?php 
class AnneeEtud extends Utilisateur{
    private $nextSpecialite;
    private $currentSpecialite;
    private $currentAnnee;
    private bool $LicenceTrois;

    function __construct($idUser,$nom,$prenom,$dateNaiss,$email,$password,$isAdmin,$currentSpecialite,$nextSpecialite,$currentAnnee,$LicenceTrois){
        parent::__construct($idUser,$nom,$prenom,$dateNaiss,$email,$password,$isAdmin);
        $this->currentSpecialite=$currentSpecialite;
        $this->nextSpecialite=$nextSpecialite;
        $this->$currentAnnee=$currentAnnee;
        $this->$LicenceTrois=$LicenceTrois;
    }

    function moyClassementAnnuelle($moyAnnee,$nbrRedouble,$nbrDette,$nbrRattrap) {
        return  $moyAnnee*(1 - 0.4*($nbrRedouble + ($nbrDette)/2 + $nbrRattrap/4));
    }

    function moyClassementLicence($moyL1,$moyL2,$moyL3,$nbrRedouble,$nbrDette,$nbrRattrap) {
        $moyGenerale = ($moyL1+$moyL2+$moyL3)/3;
        return  $moyGenerale*(1 - 0.4*($nbrRedouble + ($nbrDette)/2 + $nbrRattrap/4));
    }

    

    /**
     * Get the value of nextSpecialite
     */ 
    public function getNextSpecialite()
    {
        return $this->nextSpecialite;
    }

    /**
     * Get the value of currentSpecialite
     */ 
    public function getCurrentSpecialite()
    {
        return $this->currentSpecialite;
    }

    /**
     * Get the value of isLicenceTrois
     */ 
    public function IsLicenceTrois()
    {
        return $this->isLicenceTrois;
    }

    /**
     * Get the value of currentAnnee
     */ 
    public function getCurrentAnnee()
    {
        return $this->currentAnnee;
    }
}
?>