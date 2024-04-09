<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="../CSS/loginStyles.css" rel="stylesheet" />
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="../Controlers/controlVerifyUser.php" method="POST">
        <h3>Login</h3>

        <label for="username">Usuario</label>
        <input type="text" placeholder="Escribe tu nombre de Usuario" id="username" name="username">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Escribe tu Contraseña" id="password" name="password">

        <button id="login" value="register" type="submit">Ingresar</button>

        <div class="social">
            <form action="registro.php" method="get">
                <label id="texto">¿No tienes Cuenta?</label>
                <button id="register" > Registrate </button>
            </form>
        </div>
    </form>

</body>

</html>