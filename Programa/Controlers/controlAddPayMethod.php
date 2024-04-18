<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$cardNumber = filter_input(INPUT_POST, "cardNumber", FILTER_SANITIZE_NUMBER_INT);
$dateExpired = filter_input(INPUT_POST, "expiredDate", FILTER_SANITIZE_STRING);
$cvv = filter_input(INPUT_POST, "cvv", FILTER_SANITIZE_NUMBER_INT);
$total = 0.00;
$idOwner = $_GET['data'];
//VALIDACION DE DATOS


if ($cardNumber == '' || $dateExpired == '' || $cvv == '' || $total == '' || $idOwner == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/payMethodUser.php?data".$idOwner."';</script>";
} else if(strlen($cardNumber)!=16){
    echo "<script> alert('Hey! Los números de la tarjeta no son validos, por favor, debes agregar 16 digitos'); location.href='../PHP/payMethodUser.php?data".$idOwner."';</script>";
} else if(strlen($cvv)< 3 ||strlen($cvv)> 4 ){
    echo "<script> alert('Hey! El valor CVV no es válido, por favor, debes agregar el correcto); location.href='../PHP/payMethodUser.php?data".$idOwner."';</script>";
}else {
    
    try{
       mysqli_begin_transaction($getconection);
       insertPayMethod($conection, $cardNumber, $cvv, $dateExpired, $total, $idOwner);
       mysqli_commit($getconection);
       header("Location: ../PHP/profileUser.php?data=".$idOwner);
        exit;
    } catch (Exception $e) {
        //mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>