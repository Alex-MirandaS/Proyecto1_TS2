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

?>