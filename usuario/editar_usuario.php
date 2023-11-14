<?php
require('..\conexion.php');

$rut_usuario = $_GET["rut_usuario"];

$consulta = "SELECT * FROM usuario WHERE rut_usuario='$rut_usuario'";
$resultado = mysqli_query($conexion, $consulta);

//header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href="../estilos.css">
    <script src="funciones_administrador.js"> </script>
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
    <form action="edicion_usuario.php" method="post">

        <?php
        while ($row = mysqli_fetch_array($resultado)) {
            $rut_usuario = $row['rut_usuario'];
            $contrasena_usuario = $row['contrasena_usuario'];
            $nombre_usuario = $row['nombre_usuario'];
            $apellido_usuario = $row['apellido_usuario'];

            echo "</tr>";
            echo
                "<label>Nombre:</label>
            <input type='text' name='rut_usuario' value='" . $rut_usuario . "' />
            <label>Apellido:</label>
            <input type='text' name='contrasena_usuario' value='" . $contrasena_usuario . "'  />
            <label>Rut:</label>
            <input type='text' name='nombre_usuario' value='" . $nombre_usuario . "'  />
            <label>Email:</label>
            <input type='text' name='apellido_usuario' value='" . $apellido_usuario . "'  />    
            ";
        }
        ?>

        <button type="submit">Guardar cambios</button>

    </form>

</body>

</html>