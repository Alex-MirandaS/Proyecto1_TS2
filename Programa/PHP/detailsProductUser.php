<?php
include ("../DB/conection.php");
include ("../DB/select.php");
$getmysql = new mysqlconection();
$conection = $getmysql->conection();
$idUser = $_GET['data1'];
$idProduct = $_GET['data2'];
mysqli_begin_transaction($conection);
$user = selectUser_idUser($conection, $idUser);
$product = selectProductService_idProductService($conection, $idProduct);
$profile = selectProfile_idUser($conection, $idUser);
$user = $user[0];
$product = $product[0];
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
    <title>Detalles</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../CSS/productStyles.css" rel="stylesheet" />
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
                            href= <?php echo "postPendingUser.php?data=".$user->getIdUser();?>>Compras</a></li>
                            <li class="nav-item"><a id="addProduct" class="nav-link active" aria-current="page"
                            href= "../index.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5 ">
        <div class="container px-4 px-lg-5 my-5 ">
            <div id="container" class="row gx-4 gx-lg-5 align-items-center ">

                <div class="col-md-6 "><img class="card-img-top mb-5 mb-md-0 " src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg " alt="... " /></div>
                <div class="col-md-6 ">
                    <div id="SKU" class="small mb-1 "><?php echo "SKU: ".$product->getIdProductServiceVol();?></div>
                    <h1 id="nameProduct" class="display-5 fw-bolder "><?php echo $product->getName();?></h1>
                    <div class="fs-5 mb-5 ">
                        <span id="price "><?php echo "C. ".$product->getPrice();?></span>
                        <br>
                        <?php
                            switch($product->getIdCategory()){
                                case 1:
                                    echo "<span id=\"price \">En Stock: ".$product->getStock()."</span>";
                                    break;
                                case 3:
                                    echo "<span id=\"price \">Cupo: ".$product->getStock()."</span>";
                                    break;
                            }
                        ?>
                    </div>
                    <p id="descriptionProduct " class="lead "><?php echo $product->getDescription();?></p>
                    <form action = <?php echo "../Controlers/controlPurchase.php?data1=".$idUser."&data2=".$idProduct?> method="post">
                    <div class="d-flex ">
                        <?php
                        if($product->getIdCategory()!=2){
                            echo "<input class=\"form-control text-center me-3 \" id=\"stock\" name=\"stock\" type=\"number\" value=1 style=\"max-width: 5rem\" min=\"1\" max=".$product->getStock()."required=\"\"/>";
                        }
                        ?>

                    <button id="comprar" class="btn btn-outline-dark flex-shrink-0 " type="submit" >

                    <?php
                            switch($product->getIdCategory()){
                                case 1:
                                    echo "<i class=\"bi-cart-fill me-1 \"></i>Comprar";
                                    break;
                                case 2:
                                    echo "Adquirir";
                                    break;
                                case 3:
                                    echo "Añadirme";
                                    break;
                            }
                        ?>           
                
                        </button>     
                    </div>
                    </form>
                    <br>
                    <button id="addToCar" class="btn btn-outline-dark flex-shrink-0 " type="button">
                                Reportar
                        </button>  
                    <div class="col-md-6 ">
                        <br>
                        <p id="chelines" class="lead"><?php echo "Tienes C.".$profile->getChelines()." en tu cuenta";?></p>
                        </div>   
                </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Related items section-->
    <!-- Footer-->
    <footer class="py-5 bg-dark ">
        <div class="container ">
            <p class="m-0 text-center text-white ">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js "></script>
    <!-- Core theme JS-->
</body>

</html>