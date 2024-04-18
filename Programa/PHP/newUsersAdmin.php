<?php
include ("../DB/conection.php");
include ("../DB/select.php");
$getmysql = new mysqlconection();
$conection = $getmysql->conection();
$idUser = $_GET['data'];
$refused = 3; 
mysqli_begin_transaction($conection);
$user = selectUser_idUser($conection, $idUser);
$verifyUsers = selectUser_profileOnline($conection, 0);
$user = $user[0];
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
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <h8 class="navbar-brand" >Administrador</h8>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "newUsersAdmin.php?data=".$user->getIdUser();?>>Nuevos Usuarios</a></li>
                            <li class="nav-item"><a id="perfil" class="nav-link" href=<?php echo "newPostAdmin.php?data=".$user->getIdUser();?>>Nuevas Publicaciones</a>
                            <li class="nav-item"><a id="perfil" class="nav-link" href=<?php echo "indexAdmin.php?data=".$user->getIdUser();?>>Publicaciones Reportadas</a>
                    <li class="nav-item"><a id="perfil" class="nav-link" href=<?php echo "indexAdmin.php?data=".$user->getIdUser();?>>Home</a>
                    <li class="nav-item"><a id="perfil" class="nav-link" href="../index.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder"> Nuevos Usuarios
                </h1>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div id="containerProducts"
                class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!-- INICIA MODELO -->
<?php 

foreach ($verifyUsers as $userV) {
    echo "<div class=\"col mb-5\">
    <div class=\"card h-100\">
    <div class=\"card-body p-4\">
    <div class=\"text-center\">
    <h5 id=\"username\" class=\"fw-bolder\"> Username: ".$userV->getUsername()."</h5>
    <span id=\"firstName\"> Nombre: ".$userV->getFirstName()."</span>
    <br>
    <span id=\"apellido\"> Apellido: ".$userV->getLastName()."</span>
    <br>
    </div>
    </div>
    <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
    <div class=\"text-center\">
    <a id=\"productPageButton\" class=\"btn btn-outline-dark mt-auto\" href=\"../Controlers/controlStatusProfile.php?data1=".$idUser."&data2=".$userV->getIdUser()."&data3=".true."\"> Aceptar 
    </a>
    </div>
    <div class=\"text-center\">
    <a id=\"productPageButton\" class=\"btn btn-outline-dark mt-auto\" href=\"../Controlers/controlStatusProfile.php?data1=".$idUser."&data2=".$userV->getIdUser()."&data3=".$refused."\"> Rechazar 
    </a>
    </div>
    </div>
    </div>
    </div>
    ";
}

?>
                <!-- TERMINA MODELO -->
            </div>
        </div>
    </section>
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