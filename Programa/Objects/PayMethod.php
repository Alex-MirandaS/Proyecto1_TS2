<?php

class PayMethod
{
    private $idPayMethod, $cardNumber, $cvv, $expiredDate, $total, $idUser;

    public function __construct($idPayMethod, $cardNumber, $cvv, $expiredDate, $total, $idUser)
    {
        $this->idPayMethod = $idPayMethod;
        $this->cardNumber = $cardNumber;
        $this->cvv = $cvv;
        $this->expiredDate = $expiredDate;
        $this->total = $total;
        $this->idUser = $idUser;
    }

    public function getIdPayMethod()
    {
        return $this->idPayMethod;
    }

    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function getExpiredDate()
    {
        return $this->expiredDate;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

}
?>