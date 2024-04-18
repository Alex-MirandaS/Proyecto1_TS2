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
$stock = NULL;
if($idCategory!=2){
    $stock = filter_input(INPUT_POST, "stock", FILTER_SANITIZE_NUMBER_INT);
}
$idOwner = $_GET['data1'];
$idCategory = $_GET['data2'];
//VALIDACION DE DATOS

if ($name == '' || $price == '' || $description == '' || $idCategory == '' || $idOwner == '') {
    echo "<script> alert('Algun valor no tiene contenido'); location.href='../PHP/register.php';</script>";
} else {
    
    try{
       mysqli_begin_transaction($getconection);
       insertProductService($getconection, $name, $price, $description, $idCategory, $idOwner, $stock);
       mysqli_commit($getconection);
       header("Location: controlExtraSelect.php?data1=getProduct&data2=".$idOwner);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>