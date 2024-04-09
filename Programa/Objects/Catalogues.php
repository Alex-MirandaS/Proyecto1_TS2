<?php

class Catalogues
{
    private $idCatalogues, $idProductServiceVol, $status;

    public function __construct($idCatalogues, $idProductServiceVol, $status)
    {
        $this->idCatalogues = $idCatalogues;
        $this->idProductServiceVol = $idProductServiceVol;
        $this->status = $status;
    }

    public function getIdCatalogues()
    {
        return $this->idCatalogues;
    }

    public function getIdProductServiceVol()
    {
        return $this->idProductServiceVol;
    }

    public function getStatus()
    {
        return $this->status;
    }

}
?>