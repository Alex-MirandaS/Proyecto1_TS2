<?php
//IMPORTS
include_once("../DB/conection.php");
include_once("../DB/insert.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
$password = $_POST["password"];
$confpassword = $_POST["confpassword"];
//VALIDACION DE DATOS

if ($username == '' || $name == '' || $lastname == '' || $password == '' || $confpassword == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/register.php';</script>";
} else if ($password != $confpassword) {
    echo "<script> alert('La contraseña no coincide, por favor, ingresala correctamente'); location.href='../PHP/register.php';</script>";
} else {
    try{
        mysqli_begin_transaction($getconection);
        insertUser($getconection, $username, $password, $name, $lastname, 2);
        mysqli_commit($getconection);
        header("Location: controlGetIdUser.php?data1=".$username."&data2=".$password);
        exit;
    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }
   
}

?>