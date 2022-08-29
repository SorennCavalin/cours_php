<?php

namespace Modeles\Entities;

abstract class BaseEntity
{
    protected $id;


    public function __toString()
    {
        $classe = get_called_class();
        $classe = explode("\\", $classe);
        $table = $classe[count($classe) - 1];
        // strtolower = met tous les caractères d'un string en minuscule
        return strToLower($table);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
