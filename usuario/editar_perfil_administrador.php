<?php
require("..\conexion.php");
include("..\autorizacion.php");
$rut_usuario = $_SESSION['rut_usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../login.css">
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="funciones_usuario.js"> </script>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="../administrador/bienvenido_administrador.php">Volver</a></li>
            <li><a href="https://www.facebook.com/gobiernodechile/"><i class="fab fa-facebook-square" style="color: #3b5998;"></i></a></li>
            <li><a href="https://twitter.com/gobiernodechile"><i class="fab fa-twitter-square" style="color: #00acee;"></i></a></li>
            <li><a href="https://www.instagram.com/gobiernodechile/"><i class="fab fa-instagram-square" style="color: #8a3ab9;"></i></a></li>
        </ul>
    </nav>

    <label for="nav-toggle" class="nav-toggle-label">
        <span></span>
    </label>
</header>

<br><br><br><br><br><br>

<body>

    <div>
        <ul class="migas-de-pan">
            <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
            <li class="migas-de-pan-item"><a href="../administrador/bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Editar Perfil</a></li>
        </ul>
    </div>

    <div class="login-box">
        <form action="edicion_perfil.php" name="editar_perfil" method="post" onsubmit="return validar_perfil();">
            <label>Nombre:</label>

            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type='text' name='nombre_usuario' value='' placeholder="Nombre" pattern="[A-Za-z]{2,30}" onclick="return validar_nombre_usuario();" required />
            </div>

            <label>Apellido:</label>

            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type='text' name='apellido_usuario' value='' placeholder="Apellido" pattern="[A-Za-z]{2,30}" onclick="return validar_apellido_usuario();" required />
            </div>

            <label>Contrasena:</label>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type='password' name='contrasena_usuario' value='' placeholder="Contrasena" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" onclick="return validar_contrasena_usuario();" required />
            </div>

            <button type="submit" class="btn solid">Guardar cambios</button>
    </div>

    </form>

</body>

</html>