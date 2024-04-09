<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$idUser = $_GET['data'];
//VALIDACION DE DATOS

if ($idUser == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/register.php';</script>";
} else {
    try{
        mysqli_begin_transaction($getconection);
        insertProfile($getconection, false, 0, $idUser);
        mysqli_commit($getconection);
        header("Location: ../PHP/indexExtra.php?data=0");
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>