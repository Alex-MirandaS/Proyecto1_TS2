<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrate</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="../CSS/registerStyles.css" rel="stylesheet" />
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="../Controlers/controlAddUser.php" method="POST">
        <h3>Registrate</h3>
        <label for="username">Nombre</label>
        <input type="text" placeholder="Ingresa tu Nombre" id="name" name="name">

        <label for="username">Apellido</label>
        <input type="text" placeholder="Ingresa tu Apellido" id="lastname" name="lastname">

        <label for="username">Usuario</label>
        <input type="text" placeholder="Ingresa un Nombre de Usuario" id="username" name="username">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingresa una Contraseña" id="password" name="password">

        <label for="password">Confirmar Contraseña</label>
        <input type="password" placeholder="Confirma la Contraseña" name="confpassword" name="confpassword">

        <button id="button" value="register" type="submit">Registrarse</button>

    </form>
</body>

</html>