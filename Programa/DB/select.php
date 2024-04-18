<?php
include ("querys.php");
include ("../Objects/User.php");
include ("../Objects/Profile.php");
include ("../Objects/Category.php");
include ("../Objects/ProductServiceVol.php");
include ("../Objects/PayMethod.php");

function select($stmt)
{
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function selectUser_UserPass($conection, $username, $password)
{
    $query = selectQ('user', 'username/password');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    return makeObjects(select($stmt), 'user');
}

function selectUser_idUser($conection, $idUser)
{
    $query = selectQ('user', 'idUser');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUser);
    return makeObjects(select($stmt), 'user');
}

function selectUser_profileOnline($conection, $online)
{
    $query = selectQ('user', 'profileOnline');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $online);
    return makeObjects(select($stmt), 'user');
}

function selectProfile_idUser($conection, $idUser)
{
    $query = selectQ('profile', 'idUser');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUser);
    return makeObjects(select($stmt), 'profile');
}

function selectCategories($conection)
{
    $query = selectQ('category', 'all');
    $stmt = mysqli_prepare($conection, $query);
    return makeObjects(select($stmt), 'category');
}

function selectCategory_idCategory($conection, $idCategory)
{
    $query = selectQ('category', 'idCategory');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idCategory);
    return makeObjects(select($stmt), 'category');
}

function selectProductService_idOwnerLast($conection, $idOwner)
{
    $query = selectQ('productservice', 'idOwner');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idOwner);
    return makeObjects(select($stmt), 'productservice');
}

function selectProductService_idOwnerStatus($conection, $idOwner, $status)
{
    $query = selectQ('productservice', 'idOwner/available');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "ii", $idOwner, $status);
    return makeObjects(select($stmt), 'productservice');
}

function selectProductService_noIdOwnerStatus($conection, $idOwner, $status)
{
    $query = selectQ('productservice', '!idOwner/available');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "ii", $idOwner, $status);
    return makeObjects(select($stmt), 'productservice');
}
function selectProductService_status($conection, $status)
{
    $query = selectQ('productservice', 'available');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $status);
    return makeObjects(select($stmt), 'productservice');
}

function selectProductService_idProductService($conection, $idProductServiceVol)
{
    $query = selectQ('productservice', 'idProductService');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idProductServiceVol);
    return makeObjects(select($stmt), 'productservice');
}

function selectPayMethod_idUser($conection, $idUser)
{
    $query = selectQ('paymethod', 'idUser');
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "i", $idUser);
    return makeObjects(select($stmt), 'paymethod');
}
//Result, resultado de la query, Type, tipo de objeto a convertir
function makeObjects($result, $type)
{
    $objects = array();

    if (mysqli_num_rows($result) > 0) {

        switch ($type) {
            case 'user':
                while ($row = mysqli_fetch_assoc($result)) {
                    $objects[] = new User($row["idUser"], $row["username"], $row["password"], $row["firstName"], $row["lastName"], $row["idUserType"]);
                }
                break;
            case 'profile':
                while ($row = mysqli_fetch_assoc($result)) {
                    $objects[] = new Profile($row["idProfile"], $row["chelines"], $row["online"], $row["idUser"]);
                }
                break;
            case 'category':
                while ($row = mysqli_fetch_assoc($result)) {
                    $objects[] = new Category($row["idCategory"], $row["name"]);
                }
                break;
            case 'productservice':
                while ($row = mysqli_fetch_assoc($result)) {
                    $objects[] = new ProductServiceVol($row["idProductService"], $row["idOwner"], $row["name"], $row["price"], $row["description"], $row["idCategory"], $row["stock"]);
                }
                break;
            case 'paymethod':
                while ($row = mysqli_fetch_assoc($result)) {
                    $objects[] = new PayMethod($row["idPayMethod"],$row["cardNumber"], $row["cvv"], $row["expiredDate"], $row["total"], $row["idUser"]);
                }
                break;

        }
    } else {
        echo "No hay datos";
    }
    return $objects;
}

function verifyConection()
{
    echo "La referencia esta bien en select";
}

?>