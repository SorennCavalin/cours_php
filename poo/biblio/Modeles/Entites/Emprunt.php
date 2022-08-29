<?php
namespace Modeles\Entites;

use Modeles\Bdd;

class Emprunt extends EntiteBase {
    private $date_sortie;
    private $date_rendu;
    private $livre_id;
    private $abonne_id;


    /**
     * Get the value of date_sortie
     */ 
    public function getDate_sortie()
    {
        return $this->date_sortie;
    }

    /**
     * Set the value of date_sortie
     *
     * @return  self
     */ 
    public function setDate_sortie($date_sortie)
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    /**
     * Get the value of date_rendu
     */ 
    public function getDate_rendu()
    {
        return $this->date_rendu;
    }

    /**
     * Set the value of date_rendu
     *
     * @return  self
     */ 
    public function setDate_rendu($date_rendu)
    {
        $this->date_rendu = $date_rendu;

        return $this;
    }

    /**
     * Get the value of livre_id
     */ 
    public function getLivre_id()
    {
        return $this->livre_id;
    }

    /**
     * Set the value of livre_id
     *
     * @return  self
     */ 
    public function setLivre_id($livre_id)
    {
        $this->livre_id = $livre_id;

        return $this;
    }

    /**
     * Get the value of abonne_id
     */ 
    public function getAbonne_id()
    {
        return $this->abonne_id;
    }

    /**
     * Set the value of abonne_id
     *
     * @return  self
     */ 
    public function setAbonne_id($abonne_id)
    {
        $this->abonne_id = $abonne_id;

        return $this;
    }


    public function getAbonne(){
        return Bdd::selectionId("abonne", $this->abonne_id);
    }

    public function getLivre(){
        return Bdd::selectionId("livre", $this->livre_id);
    }
}
