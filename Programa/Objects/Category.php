<?php

class Category
{
    private $idCategory, $name;

    public function __construct($idCategory, $name){
        $this->idCategory = $idCategory;
        $this->name = $name;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getName()
    {
        return $this->name;
    }

}
?>