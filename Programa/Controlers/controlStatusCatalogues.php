<?php
//IMPORTS
include ("../DB/conection.php");
include ("../DB/update.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

//GET DATA
$idUserAdmin = $_GET['data1'];
$idProductService = $_GET['data2'];
$available = $_GET['data3'];

//VALIDACION DE DATOS
if ($idUserAdmin == '' || $idProductService == '' || $available == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/newUsersAdmin.php?data=".$idUserAdmin.";</script>";
} else {
    try{
        mysqli_begin_transaction($getconection);
        updateCatalogues($getconection,$available,$idProductService);
        echo "<script> alert('El usuario ha actualizado correctamente');  </script>"; //NO LO LEE XD
        mysqli_commit($getconection);
        header("Location: ../PHP/newPostAdmin.php?data=".$idUserAdmin);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>