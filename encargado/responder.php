<?php
require('..\conexion.php');

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Responder</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="encargado.css">
    <link rel="stylesheet" href="../tablas.css">
    <link rel="stylesheet" href="../migas-de-pan.css">S
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="bienvenido_encargado.php">Volver</a></li>
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
            <li class="migas-de-pan-item"><a href="bienvenido_encargado.php" class="migas-de-pan-link">Encargado</a></li>
            <li class="migas-de-pan-item"><a href="revisa_solicitud.php" class="migas-de-pan-link">Revisar Solicitudes</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Responder Solicitud</a></li>
        </ul>
    </div>

    <div style="padding-left:30px; padding-right:30px">
        <table>
            <thread>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>

                    <th>Solicitud</th>
                    <th>ID departamento</th>

                </tr>
            </thread>

            <?php

            $id_solicitud = $_POST['id_solicitud'];

            $consulta = "SELECT * FROM solicitud WHERE id_solicitud = '$id_solicitud'";
            $resultado = mysqli_query($conexion, $consulta);



            $row = mysqli_fetch_assoc($resultado);

            $nombre_ciudadano = $row['nombre_ciudadano'];
            $apellido_ciudadano = $row['apellido_ciudadano'];
            $rut = $row['rut'];
            $email_ciudadano = $row['email_ciudadano'];
            $solicitud = $row['solicitud'];
            $id_solicitud = $row['id_solicitud'];
            $informacion_consulta = $row['informacion_consulta'];


            echo "<tr>";
            echo "<td>" . $nombre_ciudadano . "</td>";
            echo "<td>" . $apellido_ciudadano . "</td>";
            echo "<td>" . $rut . "</td>";
            echo "<td>" . $solicitud . "</td>";
            echo "<td>" . $id_solicitud . "</td>";

            ?>

    </div>

    <?php

    echo "</tr>";

    ?>

    </table>
    <div class="cuadro_consulta">
        <?php
        echo "<h3> La solicitud dice lo siguiente: </h3><p>" . $informacion_consulta . "</p>";
        ?>
    </div>
    <h1>Escriba su respuesta por favor:</h1>

    <form action='respuesta.php' method='post'>
        <textarea name='respuesta' id='respuesta' cols='100' rows='40'>
        </textarea>
        <?php
        echo "<td>
            <input type='hidden' name='id_solicitud' value='" . $id_solicitud . "'> 

            </td>";

        ?>

        <input type='submit' value='Responder' class="btn solid">
    </form>


</body>

</html>