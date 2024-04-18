<?php
include ("../DB/conection.php");
include ("../DB/select.php");
$getmysql = new mysqlconection();
$conection = $getmysql->conection();
$idUser = $_GET['data'];
mysqli_begin_transaction($conection);
$user = selectUser_idUser($conection, $idUser);
$profile = selectProfile_idUser($conection, $idUser);
$payMethods = selectPayMethod_idUser($conection, $idUser);
$user = $user[0];
$profile = $profile[0];
mysqli_commit($conection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perfil</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../CSS/homeStyles.css" rel="stylesheet" />
    <link href="../../CSS/addProduct.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../CSS/productStyles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../CSS/profile.css" rel="stylesheet" type="text/css" media="all" />
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
                            href= <?php echo "purchasesUser.php?data=".$user->getIdUser();?>>Compras</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "../index.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Perfil</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" placeholder=<?php echo $user->getUsername()?>></div>
                </div>
                <div class="row mt-3"><!-- agrega una nueva fila-->
                <div class="col-md-6"><label class="labels">Nombre</label><input type="text" class="form-control" placeholder=<?php echo $user->getFirstName()?> readonly></div>
                <div class="col-md-6"><label class="labels">Apellido</label><input type="text" class="form-control" placeholder=<?php echo $user->getLastName()?> readonly></div>
                <div class="col-md-6"><label class="labels">Chelines</label><input type="text" class="form-control" placeholder=<?php echo $profile->getChelines()?> readonly></div>
                <div class="col-md-6"><label class="labels"></label><br><span class="col-md-6"><i class="fa fa-plus"></i>&nbsp;<a style="text-decoration: none; color: black; display: inline-block;" href=<?php echo "addChelinesUser.php?data=".$idUser;?>>Recargar Chelines</a></span></div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Metodos de Pago</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;<a style="text-decoration: none; color: black; display: inline-block;" href=<?php echo "payMethodUser.php?data=".$idUser;?>>Agregar+</a></span></div><br>
                <?php
                $numTarjeta = 1;
                foreach ($payMethods as $pm) {

                    echo"<div class=\"col-md-12\">
                        <label class=\"labels\">Tarjeta ".$numTarjeta."</label>
                        <input type=\"text\" class=\"form-control\" placeholder=************".substr($pm->getCardNumber(),-4)." readonly>
                        </div> 
                        <br>";
                        $numTarjeta++;
                }
                ?>
                </div>
        </div>
    </div>
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