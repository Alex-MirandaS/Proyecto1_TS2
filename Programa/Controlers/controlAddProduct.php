<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$name = filter_input(INPUT_POST, "titleProduct", FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, "priceProduct", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$description = filter_input(INPUT_POST, "desctProduct", FILTER_SANITIZE_STRING);
$idCategory = filter_input(INPUT_POST, "categoryProduct", FILTER_SANITIZE_NUMBER_INT);
$idOwner = $_GET['data'];
//VALIDACION DE DATOS

if ($name == '' || $price == '' || $description == '' || $idCategory == '' || $idOwner == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/register.php';</script>";
} else {
    
    try{
       mysqli_begin_transaction($getconection);
       insertProductService($getconection, $name, $price, $description, $idCategory, $idOwner);
       mysqli_commit($getconection);
       header("Location: controlExtraSelect.php?data1=getProduct&data2=".$idOwner);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>