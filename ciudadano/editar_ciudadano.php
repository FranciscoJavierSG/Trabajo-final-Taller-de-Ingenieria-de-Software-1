<?php
require('..\conexion.php');

$id_solicitud = $_GET["id_solicitud"];

$consulta = "SELECT * FROM solicitud WHERE id_solicitud='$id_solicitud'";
$resultado = mysqli_query($conexion, $consulta);

//header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar ciudadano</title>
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
            <li><a href="revisar_ciudadano.php">Volver</a></li>
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

    <div style="padding-left:30px; padding-right:30px;">
    <div>
        <ul class="migas-de-pan">
            <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
            <li class="migas-de-pan-item"><a href="../administrador/bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="revisar_ciudadano.php" class="migas-de-pan-link">Gestionar Solicitudes</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Editar ciudadano</a></li>
        </ul>
    </div>

        <h3>Edicion de solicitudes</h3>
        <form action="edicion_ciudadano.php" method="post">

            <?php
            while ($row = mysqli_fetch_array($resultado)) {
                $nombre_ciudadano = $row["nombre_ciudadano"];
                $apellido_ciudadano =  $row["apellido_ciudadano"];
                $rut =  $row["rut"];
                $email_ciudadano =  $row["email_ciudadano"];
                $solicitud =  $row["solicitud"];
                $id_solicitud =  $row["id_solicitud"];
                $informacion_consulta = $row['informacion_consulta'];

                echo
                    "<label>Nombre:</label>
            <input type='text' name='nombre_ciudadano' value='" . $nombre_ciudadano . "' />
            <label>Apellido:</label>
            <input type='text' name='apellido_ciudadano' value='" . $apellido_ciudadano . "'  />
            <label>Rut:</label>
            <input type='text' name='rut' value='" . $rut . "'  />
            <label>Email:</label>
            <input type='text' name='email_ciudadano' value='" . $email_ciudadano . "'  />
            <label> Tipo:</label>
            <input type='text' name='solicitud' value='" . $solicitud . "'  />
            <label> ID:</label>
            <input type='text' name='id_solicitud' value='" . $id_solicitud . "'  />
            <label> Consulta:</label>
            <input type='text' name='informacion_consulta' value='" . $informacion_consulta . "'  />
            
            ";
            }
            ?>

            <a>
                <input type="submit" value="Guardar cambios" class="btn solid">
            </a>
    </div>

    </form>
    </div>
</body>

</html>