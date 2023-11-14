<?php
require('..\conexion.php');
session_start();

$id_solicitud = $_SESSION['id_solicitud'];

$query = "SELECT * FROM solicitud WHERE id_solicitud = '$id_solicitud'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$informacion_consulta = $row['informacion_consulta'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="ciudadano.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Solicitud ciudadano</title>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">


    <nav>
        <ul>
            <li><a href="../ciudadano/ciudadano.php">Formulario</a></li>
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
            <li class="migas-de-pan-item"><a href="../departamento/departamento_delegacion.php" class="migas-de-pan-link">Solicitud Enviada</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Ver Solicitud</a></li>
        </ul>
    </div>

    <h1 style=text-align:center>Su solicitud dice lo siguiente:</h1>
    <?php
    echo " <div style=text-align:center>
                    <h3>" . $informacion_consulta . "</h3>
              </div>";
    ?>

    <div style=text-align:center>
        <a href="../index.php">
            <input type="button" value="Volver" class="btn solid">
        </a>
    </div>

</body>

</html>