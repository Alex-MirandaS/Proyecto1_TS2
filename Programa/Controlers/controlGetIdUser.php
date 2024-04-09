<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/select.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$username = $_GET['data1'];
$password = $_GET['data2'];
//VALIDACION DE DATOS

if ($username == '' ||$password == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/register.php';</script>";
} else {
    try{
        mysqli_begin_transaction($getconection);
        $user = selectUser_UserPass($getconection, $username, $password);
        $user = $user[0];
        mysqli_commit($getconection);
        header("Location: controlAddProfile.php?data=".$user->getIdUser());
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>