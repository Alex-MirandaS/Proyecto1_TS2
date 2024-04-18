<?php
include ("../DB/conection.php");
include ("../DB/select.php");
$getmysql = new mysqlconection();
$conection = $getmysql->conection();
$idUser = $_GET['data'];
mysqli_begin_transaction($conection);
$user = selectUser_idUser($conection, $idUser);
$user = $user[0];
$categories = selectCategories($conection);
mysqli_commit($conection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>G-SWAP</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../CSS/homeStyles.css" rel="stylesheet" />
    <link href="../../CSS/addProduct.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../CSS/productStyles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>

<body>
       <!-- Navigation-->
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
        <h8 class="navbar-brand"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "profileUser.php?data=".$user->getIdUser()?>>Perfil</a></h8>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "indexUser.php?data=".$user->getIdUser();?>>Home</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "selectTypePost.php?data=".$user->getIdUser();?>>Publicar</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "postPendingUser.php?data=".$user->getIdUser();?>>Publicaciones Pendientes</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "postAprovedUser.php?data=".$user->getIdUser();?>>Publicaciones Aprovadas</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "purchaesUser.php?data=".$user->getIdUser();?>>Compras</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "../index.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="py-5">
        <h1 class="display-4 fw-bolder">Agregar Método de Pago</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action=<?php echo "../Controlers/controlAddPayMethod.php?data=".$idUser?> method="POST">
                    <input id="cardNumber" name="cardNumber" placeholder="Número de Tarjeta" type="number" class="btn btn-outline-dark mt-auto" required="">
                    <input id="expiredDate" name="expiredDate" placeholder="Fecha de Expiración (mm/yy)" type="date" class="btn btn-outline-dark mt-auto" required="">
                    <input id="cvv" name="cvv" placeholder="Código de Seguridad (CVV)" type="number"  class="btn btn-outline-dark mt-auto" required="">
                    <input id="button" class="btn btn-outline-dark " type="submit" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Todos los derechos reservados</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>