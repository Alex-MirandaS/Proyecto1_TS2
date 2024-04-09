<?php

class User
{
    private $idUser, $username, $password, $firstName, $lastName, $idUserType;

    public function __construct($idUser, $username, $password, $firstName, $lastName, $idUserType)
    {
        $this->idUser = $idUser;
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->idUserType = $idUserType;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getIdUserType(){
        return $this->idUserType;
    }
    
}

?>