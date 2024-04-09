<?php
include ("../DB/conection.php");
include ("../DB/select.php");
$getmysql = new mysqlconection();
$conection = $getmysql->conection();
$idUser = $_GET['data'];
mysqli_begin_transaction($conection);
$user = selectUser_idUser($conection, $idUser);
$products = selectProductService_idOwnerStatus($conection, $idUser, 0);
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
            <h8 class="navbar-brand"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "">Perfil</a></h8>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                    <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "">Home</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= <?php echo "addProduct.php?data=".$user->getIdUser();?>>Publicar</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "../index.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">¡Bienvenido
                    <?php echo $user->getFirstName() . " " . $user->getLastName() . "!" ?>
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
                foreach ($products as $post) {
                    $category = "";
                    switch ($post->getIdCategory()) {
                        case 1:
                            $category = "Producto";
                            break;
                        case 2:
                            $category = "Servicio";
                            break;
                        case 3:
                            $category = "Voluntariado";
                            break;
                    }
               echo "<div class=\"col mb-5\">
               <div class=\"card h-100\">
                   <!-- Sale badge-->
                   <div class=\"badge bg-dark text-white position-absolute\" style=\"top: 0.5rem; right: 0.5rem\">".$category."</div>
                   <!-- Product image-->
                   <img class=\"card-img-top\" src=\"https://dummyimage.com/450x300/dee2e6/6c757d.jpg\" alt=\"...\" />
                   <!-- Product details-->
                   <div class=\"card-body p-4\">
                       <div class=\"text-center\">
                           <!-- Product name-->
                           <h5 id=\"nameProduct\" class=\"fw-bolder\">".$post->getName()."</h5>
                           <!-- Product price-->
                           <span id=\"priceProduct\">C. ".$post->getPrice()."</span>
                       </div>
                   </div>
                   <!-- Product actions-->
                   <div class=\"card-footer p-4 pt-0 border-top-0 bg-transparent\">
                       <div class=\"text-center\"><a id=\"productPageButton\" class=\"btn btn-outline-dark mt-auto\" href=\"#\">Agregar</a></div>

                   </div>
               </div>
           </div>";
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