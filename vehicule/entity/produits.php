<?php
class Produits
{
    private $id;
    private $marque;
    private $titre;
    private $description;

    // public function __construct($monId = null, $maMarque, $monTitre, $maDescription)
    // {
    //     $this->id = $monId;
    //     $this->marque = $maMarque;
    //     $this->titre = $monTitre;
    //     $this->description = $maDescription;
    // }

    public function getId()
    {
        return $this->id;
    }
    public function setId($paramId)
    {
        $this->id = $paramId;
    }

    public function getMarque()
    {
        return $this->marque;
    }
    public function setMarque($paramMarque)
    {
        $this->marque = $paramMarque;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($paramTitre)
    {
        $this->titre = $paramTitre;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($paramDescription)
    {
        $this->description = $paramDescription;
    }
}
