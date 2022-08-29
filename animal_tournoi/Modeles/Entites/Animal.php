<?php

namespace Modeles\Entites;

class Animal extends EntiteBase
{
    private $nom;
    private $minParticipant;
    private $maxParticipant;


    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * Get the value of minParticipant
     */
    public function getMinParticipant()
    {
        return $this->minParticipant;
    }

    /**
     * Set the value of minParticipant
     *
     * @return  self
     */
    public function setMinParticipant($minParticipant)
    {
        $this->minParticipant = $minParticipant;

        return $this;
    }

    /**
     * Get the value of maxParticipant
     */
    public function getMaxParticipant()
    {
        return $this->maxParticipant;
    }

    /**
     * Set the value of maxParticipant
     *
     * @return  self
     */
    public function setMaxParticipant($maxParticipant)
    {
        $this->maxParticipant = $maxParticipant;

        return $this;
    }
}
