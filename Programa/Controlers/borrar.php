<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");
include_once("../DB/query.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$cardNumber = 5876984687654425;
$dateExpired = "2026-06-01";
$cvv = 325;
$total = 0.00;
$idOwner = 87;
//VALIDACION DE DATOS


if ($cardNumber == '' || $dateExpired == '' || $cvv == '' || $total == '' || $idOwner == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/register.php';</script>";
} else if(strlen($cardNumber)!=16){
    echo "<script> alert('Hey! Los números de la tarjeta no son validos, por favor, debes agregar 16 digitos'); location.href='../PHP/register.php';</script>";
} else if(strlen($cvv)< 3 ||strlen($cvv)> 4 ){
    echo "<script> alert('Hey! El valor CVV no es válido, por favor, debes agregar el correcto); location.href='../PHP/register.php';</script>";
}else {
    
    try{
       mysqli_begin_transaction($getconection);
       $query = insertQ('paymethod');
       /*echo $query;
       if($getconection){
        echo "TODO BIEN CON LA CONEXION";
       }else{
        echo "TODO MAL";
       }*/
       $stmt = mysqli_prepare($conection, $query);
       echo $stmt;
       mysqli_stmt_bind_param($stmt, "isdsi", $cardNumber, $cvv, $expiredDate, $total, $idUser);
       insert($stmt, $conection);
       mysqli_commit($getconection);
       header("Location: ../PHP/profileUser.php?data=".$idOwner);
        exit;
    } catch (Exception $e) {
        //mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>