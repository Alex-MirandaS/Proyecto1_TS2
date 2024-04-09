<?php
//IMPORTS
include ("../DB/conection.php");
include ("../DB/select.php");

//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

//GET DATA
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = $_POST["password"];


//VALIDACION DE DATOS
if ($username == '' || $password == '') {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../../fronted/PHP/login.php';</script>";
} else {

    try {
        mysqli_begin_transaction($getconection);
        $usuario = selectUser_UserPass($getconection, $username, $password);
        mysqli_commit($getconection);
        if ($usuario[0]->getIdUserType() == 1) {
            header("Location: ../PHP/indexAdmin.php?data=".$usuario[0]->getIdUser());
            exit;
        }else{
            $profile = selectProfile_idUser($getconection, $usuario[0]->getIdUser());
            if($profile[0]->getOnline() == 1){
                header("Location: ../PHP/indexUser.php?data=".$usuario[0]->getIdUser());
                exit;
            }else {
                header("Location: ../PHP/indexExtra.php?data=".$profile[0]->getOnline());
                exit;
            }
        }

    } catch (Exception $e) {
        mysqli_rollback($getconection);
        echo "Error al traer datos o crear objetos" . $e->getMessage();
    }

}
//if (isset($_POST["username"]) && isset($_POST["password"])) {
?>