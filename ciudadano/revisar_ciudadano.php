<?php
require('..\conexion.php');

if (!isset($_POST['buscar'])) {

    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$consulta = "SELECT * FROM solicitud WHERE nombre_ciudadano LIKE '%" . $buscar . "%' OR apellido_ciudadano LIKE '%" . $buscar . "%'
OR rut LIKE '%" . $buscar . "%' OR solicitud LIKE '%" . $buscar . "%' OR id_solicitud LIKE '%" . $buscar . "%'";

$resultado = mysqli_query($conexion, $consulta);

//header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Revision solicitud</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="ciudadano.css">
     <link rel="stylesheet" href="../tablas.css">
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
<div style="padding-left: 30px; padding-right:30px;">
    <div>
        <ul class="migas-de-pan">
            <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
            <li class="migas-de-pan-item"><a href="../administrador/bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Gestionar Solicitudes</a></li>
        </ul>
    </div>

        <h3>Lista y edicion de solicitudes</h3>
        <hr>
        <br>

        <form action="revisar_ciudadano.php" method="POST" style=>
            <input type="text" name="buscar">
            <input type="submit" value="Buscar" class="btn solid">
        </form>
        <br>

        <table >
            <thread>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Email</th>
                    <th>Solicitud</th>
                    <th>Informacion consulta</th>
                    <th>ID solicitud</th>
                    <th>Opciones</th>
                </tr>
            </thread>

            <?php

            while ($row = mysqli_fetch_assoc($resultado)) {

                $nombre_ciudadano = $row['nombre_ciudadano'];
                $apellido_ciudadano = $row['apellido_ciudadano'];
                $rut = $row['rut'];
                $email_ciudadano = $row['email_ciudadano'];
                $solicitud = $row['solicitud'];
                $informacion_consulta = $row['informacion_consulta'];
                $id_solicitud = $row['id_solicitud'];


                echo "<tr>";
                echo "<td>" . $nombre_ciudadano . "</td>";
                echo "<td>" . $apellido_ciudadano . "</td>";
                echo "<td>" . $rut . "</td>";
                echo "<td>" . $email_ciudadano . "</td>";
                echo "<td>" . $solicitud . "</td>";
                echo "<td>" . $informacion_consulta . "</td>";

                echo "<td>" . $id_solicitud . "</td>";

                echo "<td>
                    <form action='eliminar_ciudadano.php' method='post'>
                      <input type='hidden' name='id_solicitud' value='" . $id_solicitud . "'>
                      <button type='submit' style='float:left;margin-right:5px;' >Eliminar</button>
                    
                    </form >
                     <a href='editar_ciudadano.php?id_solicitud=" . $id_solicitud . "'>
                        <button >Editar</button>
                     </a>                       
                  </td>";

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>