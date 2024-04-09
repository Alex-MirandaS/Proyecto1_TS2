<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$condition = $_GET['data1'];
//VALIDACION DE DATOS

if ($condition == "insertCatalogue") {
    $idProductService = $_GET['data2'];
    $idUser = $_GET['data3'];
    try{
        echo "Hola, mundo!\n";
        mysqli_begin_transaction($getconection);
        insertCatalogues($getconection,$idProductService,0);
        mysqli_commit($getconection);
        header("Location: ../PHP/indexUser.php?data=".$idUser);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
}

?>