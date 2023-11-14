<?php
require("..\conexion.php");

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Revision solicitud</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="ciudadano.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>


<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="ciudadano.php">Formulario</a></li>
            <li><a href="../login.php">Login</a></li>
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
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="ciudadano.php" class="migas-de-pan-link">Formulario</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Estado Solicitud</a></li>
        </ul>
    </div>

    <div class="login-box">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="revisar_estado.php" method="post" name="revisar_estado" class="sign-up-form">
                    <h2 class="titulo">Ingrese su codigo de seguimiento:</h2>
                    <div class="input-field">
                        <i class="fas fa-code"></i>
                        <input type="text" name="codigo" size="20">
                    </div>
                    <p><input type="submit" value="Enviar" class="btn solid"></p>
                </form>
            </div>
        </div>
    </div>



</body>

</html>