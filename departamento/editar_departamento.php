<?php
require('..\conexion.php');

$id_departamento = $_GET["id_departamento"];

$consulta = "SELECT * FROM departamento WHERE id_departamento='$id_departamento'";
$resultado = mysqli_query($conexion, $consulta);

//header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar depto</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="departamento.css">
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
            <li><a href="departamento.php">Volver</a></li>
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
            <li class="migas-de-pan-item"><a href="departamento.php" class="migas-de-pan-link">Gestionar Departamento</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Editar Departamento</a></li>
        </ul>
    </div>

    <div style="padding-left:30px; padding-right:30px;">
        <form action="edicion_departamento.php" method="post">

            <?php
            while ($row = mysqli_fetch_array($resultado)) {
                $nombre_departamento = $row['nombre_departamento'];
                $id_departamento = $row['id_departamento'];
                $rut_encargado = $row['rut_encargado'];


                echo
                    "<h2>Editar departamento:</h2>
            <label>Nombre depto:</label>
            <input type='text' name='nombre_departamento' value='" . $nombre_departamento . "' />
            <label>Id depto:</label>
            <input type='text' name='id_departamento' value='" . $id_departamento . "'  />     
            <label>Rut encargado:</label>
            <input type='text' name='rut_encargado' value='" . $rut_encargado . "'  />
            
            ";
            }
            ?>

            <a>
                <input type="submit" value="Guardar cambios" class="btn solid">
            </a>



        </form>
    </div>
</body>

</html>