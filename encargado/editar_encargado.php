<?php
require('..\conexion.php');

$rut_usuario = $_GET["rut_usuario"];

$consulta = "SELECT * FROM usuario WHERE rut_usuario ='$rut_usuario' AND tipo_usuario='encargado'";
$resultado = mysqli_query($conexion, $consulta);

//header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar encargado</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="encargado.css">
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
            <li><a href="encargado.php">Volver</a></li>
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
            <li class="migas-de-pan-item"><a href="bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="encargado.php" class="migas-de-pan-link">Gestionar Encargado</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Editar Encargado</a></li>
        </ul>
    </div>

    <div style="padding-left:30px; padding-right:30px;">

        <h3>Editar encargado</h3>
        <form action="edicion_encargado.php" method="post">

            <?php
            $row = mysqli_fetch_array($resultado);
            $nombre_usuario = $row["nombre_usuario"];
            $apellido_usuario = $row["apellido_usuario"];
            $rut_usuario =  $row["rut_usuario"];

            echo
                "<label>Nombre:</label>
                    <input type='text' name='nombre_usuario' value='" . $nombre_usuario . "' />         
                    <label>Apellido:</label>
                    <input type='text' name='apellido_usuario' value='" . $apellido_usuario . "'  />
                    <label>Rut:</label>
                    <input type='text' name='rut_usuario' value='" . $rut_usuario . "'  />
                    ";

            ?>

            <a>
                <input type="submit" value="Guardar cambios" class="btn solid">
            </a>



        </form>
    </div>
</body>

</html>