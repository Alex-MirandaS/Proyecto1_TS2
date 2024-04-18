<?php
include ("querys.php");

    function update($stmt, $conection)
    {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
    function updateProfile($conection, $online, $idUser)
    {
        $query = updateQ("profile", "online/idUser");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $online, $idUser);
        update($stmt, $conection);
    }
    function updateCatalogues($conection, $available, $idProductService)
    {
        $query = updateQ("catalogues", "available/idProductService");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $available, $idProductService);
        update($stmt, $conection);
    }

    function updateProfile_chelines($conection, $chelines, $idUser)
    {
        $query = updateQ("profile", "chelines/idUser");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $chelines, $idUser);
        update($stmt, $conection);
    }

    function updateProfile_chelines_restar($conection, $chelines, $idUser)
    {
        $query = updateQ("profile", "chelines/idUser/restar");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $chelines, $idUser);
        update($stmt, $conection);
    }

    function updatePayMethod_total($conection, $total, $idPayMethod)
    {
        $query = updateQ("paymethod", "total/idPayMethod");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $total, $idPayMethod);
        update($stmt, $conection);
    }
    function updateProductService_stock($conection, $stock, $idProductService)
    {
        $query = updateQ("productservice", "stock/idProductService");
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $stock, $idProductService);
        update($stmt, $conection);
    }
?>