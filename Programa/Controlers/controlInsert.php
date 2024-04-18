<?php
//IMPORTS
include ("../DB/conection.php");
include ("../DB/insert.php");
//DATA1 = TIPO UPDATE, DATA2 = IDUSER, DATA3 = LO QUE SEA.....
//GET CONECTION
$getmysql = new mysqlconection();
$getconection = $getmysql->conection();

//GET DATA
$typeUpdate = $_GET['data1'];

start($typeUpdate, $getconection);

function start($typeUpdate, $getconection)
{
    //VALIDACION DE DATOS
    if (!validData($typeUpdate)) {
        echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/newUsersAdmin.php?data;</script>";
    } else {
        try {
            switch ($typeUpdate) {
                case 'addChelines':
                    $idUser = $_GET['data2'];
                    $idPayMethod = filter_input(INPUT_POST, "payMethod", FILTER_SANITIZE_NUMBER_INT);
                    $amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_INT);
                    mysqli_begin_transaction($getconection);
                    updateProfile_chelines($getconection, $amount, $idUser);
                    updatePayMethod_total($getconection, $amount, $idPayMethod);
                    echo "<script> alert('Se han agregado los chelines');  </script>"; //NO LO LEE XD
                    mysqli_commit($getconection);
                    header("Location: ../PHP/profileUser.php?data=" . $idUser);
                    exit;
                case 'removeChelines':
                    $idUser = $_GET['data2'];
                    $amount = $_GET['data3'];
                    mysqli_begin_transaction($getconection);
                    updateProfile_chelines($getconection, $amount, $idUser);
                    echo "<script> alert('Se han agregado los chelines');  </script>"; //NO LO LEE XD
                    mysqli_commit($getconection);
                    start('editProduct', $getconection);
                    //INSERT EXTRA XD AGREGAR
                    header("Location: ../PHP/profileUser.php?data=". $idUser);
                    exit;
                case 'editProduct':
                    $idProduct = $_GET['data4'];
                    $stockSelect = $_GET['data5'];
                    $stockProduct = $_GET['data6'];
                    mysqli_begin_transaction($getconection);
                    updateProductService_stock($getconection, $stockSelect, $idProduct);
                    echo "<script> alert('Se han agregado los chelines');  </script>"; //NO LO LEE XD
                    if($stockSelect == $stockProduct){
                        updateCatalogues($getconection, 4, $idProduct);       
                    }
                    mysqli_commit($getconection);
                default:
                    echo "<script> alert('Hubo un error');  </script>"; //NO LO LEE XD
                    break;
            }
        } catch (Exception $e) {
            mysqli_rollback($getconection);
            echo "Error al insertar datos: " . $e->getMessage();
        }

    }
}
function validData($data)
{
    return $data != '';
}
?>