<?php

require('..\conexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado</title>
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
            <li class="migas-de-pan-item"><a href="estado_solicitud.php" class="migas-de-pan-link">Estado Solicitud</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Respuesta</a></li>
        </ul>
    </div>

    <?php
    $codigo = $_POST['codigo'];
    $query = "SELECT * FROM solicitud WHERE codigo= '$codigo'  ";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
    $estado = $row['estado'];

    if ($estado == 'terminado') {

        echo "<div style=text-align:center>
                <h1>Su solicitud está terminada.</h1>
                </div>";

        echo "<div style=text-align:center>
                    <h3>Esta es su respuesta:</h3>
                  </div>";

        $id_solicitud = $row['id_solicitud'];
        $query2 = "SELECT * FROM responde WHERE id_solicitud='$id_solicitud' ";
        $result2 = mysqli_query($conexion, $query2);
        $row2 = mysqli_fetch_assoc($result2);
        $respuesta = $row2["respuesta"];

        echo " <div style=text-align:center>
                     <p>" . $respuesta . "</p>
                </div>";

        echo "<div style=text-align:center>
                <a href='../index.php'>
                    <input type='button' value='Volver al inicio' class='btn solid'>
                </a>
            </div>";

    } else {
        echo "<div style=text-align:center>
                  <h2>No se encuentra respuesta.</h2>
                  <span>Haz click </span>
                  <a href='ciudadano.php' style='font-weight:700; color: #5995fd'; >aquí</a>
                  <span> para enviar una solicitud.</span>
                  </div>";
    }
    ?>

</body>

</html>