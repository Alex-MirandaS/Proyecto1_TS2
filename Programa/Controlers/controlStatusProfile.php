<?php
//IMPORTS
include ("../DB/conection.php");
include ("../DB/update.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

//GET DATA
$idUserAdmin = $_GET['data1'];
$idUserNormal = $_GET['data2'];
$online = $_GET['data3'];

//VALIDACION DE DATOS
if ($idUserAdmin == '' || $idUserNormal == '' || $online == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/newUsersAdmin.php?data=".$idUserAdmin.";</script>";
} else {
    try{
        mysqli_begin_transaction($getconection);
        updateProfile($getconection,$online,$idUserNormal);
        echo "<script> alert('El usuario ha actualizado correctamente');  </script>"; //NO LO LEE XD
        mysqli_commit($getconection);
        header("Location: ../PHP/newUsersAdmin.php?data=".$idUserAdmin);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>