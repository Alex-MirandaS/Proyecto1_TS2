<?php
include_once("conection.php");
include ("querys.php");
function insert($stmt, $conection)
{
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function insertUser($conection, $username, $password, $name, $lastname, $idTypeUser)
{
    $query = insertQ('user');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $username, $password, $name, $lastname, $idTypeUser);
    insert($stmt, $conection);
}
function insertProfile($conection, $online, $chelines, $idUser)
{
    $query = insertQ('profile');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "idi", $online, $chelines, $idUser);
    insert($stmt, $conection);
}
function insertProductService($conection, $name, $price, $description, $idCategory, $idOwner, $stock)
{
    $query = insertQ('productservice');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "sisiii", $name, $price, $description, $idCategory, $idOwner, $stock);
    insert($stmt, $conection);
}

function insertCatalogues($conection, $idProductServiceVol, $status)
{
    $query = insertQ('catalogues');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "ii", $status, $idProductServiceVol);
    insert($stmt, $conection);
}
function insertPayMethod($conection, $cardNumber, $cvv, $expiredDate, $total, $idUser)
{
    $query = insertQ('paymethod');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "iisdi", $cardNumber, $cvv, $expiredDate, $total, $idUser);
    insert($stmt, $conection);

}
?>