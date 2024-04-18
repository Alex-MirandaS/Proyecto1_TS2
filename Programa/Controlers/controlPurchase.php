<?php
//IMPORTS

include_once ("../DB/conection.php");
include_once ("../DB/select.php");

//GET CONECTION
$getmysql = new mysqlconection();
$conection = $getmysql->conection();

//GET DATA
$idUser = $_GET['data1'];
$idProduct = $_GET['data2'];
$stock = NULL;

//VALIDACION DE DATOS


if (!validData($idUser) || !validData($idProduct)) {
    echo "<script> alert('Hey! Hay datos faltantes, por favor, llena todos los campos'); location.href='../PHP/indexUser.php?data='" . $idUser . ";</script>";
} else {

    try {
        mysqli_begin_transaction($conection);
        $product = selectProductService_idProductService($conection, $idProduct);
        $profile = selectProfile_idUser($conection, $idUser);
        $product = $product[0];
        $profile = $profile[0];
        mysqli_commit($conection);

        switch ($product->getIdCategory()) {
            case 1://PRODUCTO
                $stock = filter_input(INPUT_POST, "stock", FILTER_SANITIZE_NUMBER_INT);
                echo $stock;
                echo $product->getStock();
                if(validStockPrice($product->getStock(), $stock)){//valida si hay suficiente stock
                    if(validStockPrice(($product->getPrice()*$stock), $profile->getChelines())){
                        header("Location: controlUpdate.php?data1=removeChelines&data2=".$idUser."&data3=".($product->getPrice()*$stock)."&data4=".$idProduct."&data5=".$stock."&data6=".$product->getStock());
                        exit;
                    }else{
                        echo "<script> alert('No hay suficientes fondos'); location.href='../PHP/PHP/detailsProductUser.php?data1=".$idUser."&data2=".$idProduct;
                    }
                }else{
                    echo "<script> alert('No hay suficiente Stock'); location.href='../PHP/PHP/detailsProductUser.php?data1=".$idUser."&data2=".$idProduct;
                }
                break;
            
            default:
                # code...
                break;
        }
      
    } catch (Exception $e) {
        //mysqli_rollback($getconection);
        echo "Error al insertar datos: " . $e->getMessage();
    }

}

function validData($data)
{
    return $data != '';
}

function validStockPrice($stockProduct, $stockSelect)
{
    if($stockProduct!=NULL && $stockSelect!=NULL){
        return ($stockProduct<=$stockSelect);
    }
}
?>