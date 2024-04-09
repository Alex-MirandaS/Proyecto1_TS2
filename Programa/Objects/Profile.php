<?php

class Profile
{
    private $idProfile, $chelines, $online, $idUser;

    public function __construct($idProfile, $chelines, $online, $idUser)
    {
        $this->idProfile = $idProfile;
        $this->chelines = $chelines;
        $this->online = $online;
        $this->idUser = $idUser;  
    }

    public function getIdProfile()
    {
        return $this->idProfile;
    }

    public function getChelines()
    {
        return $this->chelines;
    }

    public function getOnline()
    {
        return $this->online;
    }

    public function geIdUser(){
        return $this->idUser;
    }

}
?>