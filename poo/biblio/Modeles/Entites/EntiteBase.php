<?php

namespace Modeles\Entites;

class EntiteBase {
    protected $id;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){
        $classe = get_called_class();
        $classe = explode("\\", $classe);
        $table = $classe[ count($classe) - 1 ];
        // strtolower = met tous les caractères d'un string en minuscule
        return strToLower($table);
    }
}