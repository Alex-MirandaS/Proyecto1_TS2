<?php

function insertQ($type)
{
    $query = "";
    switch ($type) {
        case 'user':
            $query = "INSERT INTO User (username, password, firstName, lastName, idUserType) VALUES (?,?,?,?,?)";
            break;
        case 'profile':
            $query = "INSERT INTO Profile (online, chelines, idUser) VALUES (?,?,?)";
            break;
        case 'productservice':
            $query = "INSERT INTO ProductService (name, price, description, idCategory, idOwner, stock) VALUES (?,?,?,?,?,?)";
            break;
        case 'catalogues':
            $query = "INSERT INTO Catalogues (available, idProductService) VALUES (?,?)";
            break;
        case 'category':
            $query = "INSERT INTO Category (name) VALUES (?)";
            break;
        case 'paymethod':
            $query = "INSERT INTO PayMethod (cardNumber, cvv, expiredDate, total, idUser) VALUES (?,?,?,?,?)";
            break;

    }
    return $query;
}

function selectQ($table, $type)
{
    $query = "";
    switch ($table) {
        case 'user':
            $query = userQuerySelect($type);
            break;
        case 'profile':
            $query = profileQuerySelect($type);
            break;
        case 'productservice':
            $query = productServiceSelect($type);
            break;
        case 'category':
            $query = categorySelect($type);
            break;
        case 'paymethod':
            $query = paymethodSelect($type);
            break;
    }
    return $query;
}
function paymethodSelect($type)
{
    $query = "";
    switch ($type) {
        case 'all':
            $query = "SELECT * FROM PayMethod";
            break;
        case 'idUser':
            $query = "SELECT * FROM PayMethod WHERE idUser = ?";
            break;

    }
    return $query;
}
function categorySelect($type)
{
    $query = "";
    switch ($type) {
        case 'all':
            $query = "SELECT * FROM Category";
            break;
        case 'idCategory':
            $query = "SELECT * FROM Category WHERE idCategory = ?";
            break;

    }
    return $query;
}
function productServiceSelect($type)
{
    $query = "";
    switch ($type) {
        case 'all':
            $query = "SELECT * FROM ProductService";
            break;
        case 'idOwner':
            $query = "SELECT *
            FROM ProductService ps
            WHERE idProductService = (
                SELECT MAX(idProductService)
                FROM ProductService
                WHERE idOwner = ?
            );";
            break;
        case 'idOwner/available':
            $query = "SELECT ps.*
            FROM ProductService ps
            INNER JOIN Catalogues c ON ps.idProductService = c.idProductService
            WHERE ps.idOwner = ?
            AND c.available = ?;
            ";
            break;
        case '!idOwner/available':
            $query = "SELECT ps.*
                FROM ProductService ps
                INNER JOIN Catalogues c ON ps.idProductService = c.idProductService
                WHERE ps.idOwner != ?
                AND c.available = ?;
                ";
            break;
        case 'available':
            $query = "SELECT ps.*
            FROM ProductService ps
            INNER JOIN Catalogues c ON ps.idProductService = c.idProductService
            WHERE c.available = ?;
                ";
            break;
        case 'idProductService':
            $query = "SELECT * FROM ProductService WHERE idProductService = ?";
            break;
    }
    return $query;
}
function userQuerySelect($type)
{
    $query = "";
    switch ($type) {
        case 'all':
            $query = "SELECT * FROM User";
            break;
        case 'username/password':
            $query = "SELECT * FROM User WHERE username = ? AND password = ? ";
            break;
        case 'idUser':
            $query = "SELECT * FROM User WHERE idUser = ? ";
            break;
        case 'profileOnline':
            $query = "SELECT u.* FROM User u INNER JOIN Profile p ON u.idUser = p.idUser WHERE p.online = ?;
                ";
            break;

    }
    return $query;
}

function profileQuerySelect($type)
{
    $query = "";
    switch ($type) {
        case 'all':
            $query = "SELECT * FROM User";
            break;
        case 'idUser':
            $query = "SELECT * FROM Profile WHERE idUser = ? ";
            break;
    }
    return $query;
}

function updateQ($table, $type)
{
    $query = "";
    switch ($table) {
        case 'profile':
            switch ($type) {
                case 'online/idUser':
                    $query = "UPDATE Profile SET online = ? WHERE idUser = ?";
                    break;
                case 'chelines/idUser':
                    $query = "UPDATE Profile SET chelines = chelines + ? WHERE idUser = ?";
                    break;
                case 'chelines/idUser/restar':
                    $query = "UPDATE Profile SET chelines = chelines - ? WHERE idUser = ?";
                    break;
            }
            break;
        case 'catalogues':
            switch ($type) {
                case 'available/idProductService':
                    $query = "UPDATE Catalogues SET available = ? WHERE idProductService = ?";
                    break;
            }
            break;
        case 'paymethod':
            switch ($type) {
                case 'total/idPayMethod':
                    $query = "UPDATE PayMethod SET total = total + ? WHERE idPayMethod = ?;
                    ";
                    break;
            }
            break;
        case 'productservice':
            switch ($type) {
                case 'stock/idProductService':
                    $query = "UPDATE ProductService SET stock = stock - ? WHERE idProductService = ?;
                        ";
                    break;
            }
            break;
    }
    return $query;
}



?>