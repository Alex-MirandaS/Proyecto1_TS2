<?php

class ProductServiceVol
{
    private $idProductServiceVol, $idOwner, $name, $price, $description, $idCategory, $stock;

    public function __construct($idProductServiceVol, $idOwner, $name, $price, $description, $idCategory, $stock){
        $this->idProductServiceVol = $idProductServiceVol;
        $this->idOwner = $idOwner;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->idCategory = $idCategory;
        $this->stock = $stock;
    }

    public function getIdProductServiceVol()
    {
        return $this->idProductServiceVol;
    }

    public function getIdOwner()
    {
        return $this->idOwner;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public function getStock()
    {
        return $this->stock;
    }
}
?>