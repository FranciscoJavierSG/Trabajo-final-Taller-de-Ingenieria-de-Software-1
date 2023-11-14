<?php
require('..\conexion.php');
session_start();

$rut_usuario = $_SESSION['rut_usuario'];

if (!isset($_POST['buscar'])) {

    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];

    $consulta = "SELECT * 
    FROM departamento, solicita, solicitud
    WHERE rut_encargado='$rut_usuario' 
    AND departamento.id_departamento= solicita.id_departamento
    AND solicita.id_solicitud=solicitud.id_solicitud";

    if (isset($_POST['ord_nombre']) && $_POST['ord_nombre'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY nombre_ciudadano ASC";
    } elseif (isset($_POST['ord_nombre'])  && $_POST['ord_nombre'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY nombre_ciudadano DESC";
    }
    if (isset($_POST['ord_apellido']) && $_POST['ord_apellido'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY apellido_ciudadano ASC";
    } elseif (isset($_POST['ord_apellido'])  && $_POST['ord_apellido'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY apellido_ciudadano DESC";
    }
    if (isset($_POST['ord_rut']) && $_POST['ord_rut'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY rut ASC";
    } elseif (isset($_POST['ord_rut'])  && $_POST['ord_rut'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY rut DESC";
    }

    if (isset($_POST['ord_hora']) && $_POST['ord_hora'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY hora ASC";
    } elseif (isset($_POST['ord_hora'])  && $_POST['ord_hora'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY hora DESC";
    }

    if (isset($_POST['ord_fecha']) && $_POST['ord_fecha'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY fecha ASC";
    } elseif (isset($_POST['ord_fecha'])  && $_POST['ord_fecha'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY fecha DESC";
    }
    if (isset($_POST['ord_tipo']) && $_POST['ord_tipo'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY solicitud ASC";
    } elseif (isset($_POST['ord_tipo'])  && $_POST['ord_tipo'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY solicitud DESC";
    }
    if (isset($_POST['ord_estado']) && $_POST['ord_estado'] == 1) {
        $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY estado ASC";
    } elseif (isset($_POST['ord_estado'])  && $_POST['ord_estado'] == 2) {
        $consulta = "SELECT * 
        FROM departamento, solicita, solicitud
        WHERE rut_encargado='$rut_usuario' 
        AND departamento.id_departamento= solicita.id_departamento
        AND solicita.id_solicitud=solicitud.id_solicitud ORDER BY estado DESC";
    }



    $resultado = mysqli_query($conexion, $consulta);
} elseif ($_POST['buscar'] == "") {
    $consulta = "SELECT * 
                FROM departamento, solicita, solicitud
                WHERE rut_encargado='$rut_usuario' 
                AND departamento.id_departamento= solicita.id_departamento
                AND solicita.id_solicitud=solicitud.id_solicitud";


    $resultado = mysqli_query($conexion, $consulta);
} else {

    $buscar = $_POST['buscar'];

    $consulta = "SELECT * 
                FROM departamento , solicita  , solicitud
                WHERE (rut_encargado='$rut_usuario' 
                        AND departamento.id_departamento= solicita.id_departamento 
                        AND solicita.id_solicitud=solicitud.id_solicitud 
                        AND nombre_ciudadano LIKE '%" . $buscar . "%' )
                    OR (rut_encargado='$rut_usuario' 
                        AND departamento.id_departamento= solicita.id_departamento 
                        AND solicita.id_solicitud=solicitud.id_solicitud 
                        AND apellido_ciudadano LIKE '%" . $buscar . "%' )
                    OR (rut_encargado='$rut_usuario' 
                        AND departamento.id_departamento= solicita.id_departamento 
                        AND solicita.id_solicitud=solicitud.id_solicitud 
                        AND rut LIKE '%" . $buscar . "%' )
                    OR (rut_encargado='$rut_usuario' 
                        AND departamento.id_departamento= solicita.id_departamento 
                        AND solicita.id_solicitud=solicitud.id_solicitud 
                        AND solicitud LIKE '%" . $buscar . "%' )
                        OR (rut_encargado='$rut_usuario' 
                        AND departamento.id_departamento= solicita.id_departamento 
                        AND solicita.id_solicitud=solicitud.id_solicitud 
                        AND estado LIKE '%" . $buscar . "%' )
                ";



    $resultado = mysqli_query($conexion, $consulta);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Conexion a bd - Editar</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="encargado.css">
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
            <li><a href="bienvenido_encargado.php">Volver</a></li>
            <li><a href="..\logout.php">Cerrar Sesión</a></li>
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
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Revisar Solicitudes</a></li>
        </ul>
    </div>

    <div style="padding-left:30px; padding-right:30px">

        <table>
            <?php

            $consulta2 = "SELECT * FROM usuario WHERE rut_usuario = '$rut_usuario' ";
            $resultado2 = mysqli_query($conexion, $consulta2);
            $row2 = mysqli_fetch_assoc($resultado2);

            $nombre_usuario = $row2['nombre_usuario'];
            $apellido_usuario = $row2['apellido_usuario'];
            echo "<h1> Bienvenido: " . $nombre_usuario . " " . $apellido_usuario . "</h1>";
            ?>
            <form action="revisa_solicitud.php" method="POST" style=>
                <input type="text" name="buscar">
                <input type="submit" value="Buscar" class="btn solid">
            </form>
            <h3>Lista solicitudes</h3>
            <hr>
            <br>



            <br>
            <thread>
                <tr>
                    <th>Nombre ciudadano
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_nombre" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>

                    </th>
                    <th>Apellido ciudadano
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_apellido" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Rut ciudadano
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_rut" id="" style="max-width:10%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>&nbsp;Hora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_hora" id="" style="max-width:12%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Fecha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_fecha" id="" style="max-width:12%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Tipo consulta
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_tipo" id="" style="max-width:10%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Estado
                        <form action="revisa_solicitud.php" method="post">
                            <select name="ord_estado" id="" style="max-width:12%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Accion</th>
                </tr>
            </thread>
            <?php



            while ($row = mysqli_fetch_assoc($resultado)) {

                $id_solicitud = $row['id_solicitud'];
                $solicitud = $row['solicitud'];
                $informacion_consulta = $row['informacion_consulta'];
                $nombre_ciudadano = $row['nombre_ciudadano'];
                $apellido_ciudadano = $row['apellido_ciudadano'];
                $rut = $row['rut'];
                $hora = $row['hora'];
                $fecha = $row['fecha'];
                $solicitud = $row['solicitud'];
                $estado = $row['estado'];
                $id_solicitud = $row['id_solicitud'];
                $id_departamento = $row['id_departamento'];

                echo "<tr>";

                echo "<td>" . $nombre_ciudadano . "</td>";
                echo "<td>" . $apellido_ciudadano . "</td>";
                echo "<td>" . $rut . "</td>";
                echo "<td>" . $hora . "</td>";
                echo "<td>" . $fecha . "</td>";
                echo "<td>" . $solicitud . "</td>";
                echo "<td>" . $estado . "</td>";
                echo "<td>
                <form action='responder.php' method='post'>
                    <input type='hidden' name='id_solicitud' value='" . $id_solicitud . "'>
                    <button type='submit' style='float:left;margin-right:5px;' >Responde</button>         
                </form ></td>";

                echo "</tr>";
            }


            ?>
        </table>

    </div>




</body>

</html>