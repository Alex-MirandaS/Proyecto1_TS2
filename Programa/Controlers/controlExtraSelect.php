<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/select.php");
//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();
//GET CONDITION
$condition = $_GET['data1'];
//CONDITIONS
if ($condition == "getProduct") {
    $idOwner = $_GET['data2'];
    try{
        mysqli_begin_transaction($getconection);
        $product = selectProductService_idOwnerLast($getconection,$idOwner); 
        $product = $product[0];
        mysqli_commit($getconection);
        header("Location: controlExtraInsert.php?data1=insertCatalogue&data2=".$product->getIdProductServiceVol()."&data3=".$idOwner);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
}



?>