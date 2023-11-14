<?php
require('..\conexion.php');

if (!isset($_POST['buscar'])) {

    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$consulta = "SELECT * FROM departamento WHERE nombre_departamento LIKE '%" . $buscar . "%' OR id_departamento LIKE '%" . $buscar . "%'";

if (isset($_POST['ord_nombre']) && $_POST['ord_nombre'] == 1) {
    $consulta = "SELECT * 
            FROM departamento
            ORDER BY nombre_departamento ASC";
} elseif (isset($_POST['ord_nombre'])  && $_POST['ord_nombre'] == 2) {
    $consulta = "SELECT * 
    FROM departamento
    ORDER BY nombre_departamento DESC";
}

if (isset($_POST['ord_id']) && $_POST['ord_id'] == 1) {
    $consulta = "SELECT * 
            FROM departamento
            ORDER BY id_departamento ASC";
} elseif (isset($_POST['ord_id'])  && $_POST['ord_id'] == 2) {
    $consulta = "SELECT * 
    FROM departamento
    ORDER BY id_departamento DESC";
}

$resultado = mysqli_query($conexion, $consulta);

$consulta2 = "SELECT * FROM usuario WHERE tipo_usuario='encargado'";
$resultado2 = mysqli_query($conexion, $consulta2);

$consulta3 = "SELECT * FROM usuario WHERE tipo_usuario='administrador'";
$resultado3 = mysqli_query($conexion, $consulta3);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="departamento.css">
    <link rel="stylesheet" href="../tablas.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="funciones_departamento.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>


<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
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

<div style="padding-left:30px; padding-right:30px;">
    <div>
        <ul class="migas-de-pan">
            <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
            <li class="migas-de-pan-item"><a href="../administrador/bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Gestionar Departamentos</a></li>
        </ul>
    </div>

        <h3>Lista e ingreso de departamentos</h3>
        <form action="ingresar_departamento.php" method="post" name="ingresar_departamento" onsubmit="return validar_departamento();">
            <label>Nombre del departamento:</label>
            <input type="text" name="nombre_departamento" />

            <select name="rut_encargado">

                <?php
                while ($row = mysqli_fetch_assoc($resultado2)) {
                    echo "<option value='" . $row['rut_usuario'] . "'>'" . $row['nombre_usuario'] . $row['apellido_usuario'] . "'</option>";
                }

                ?>

            </select>

            <select name="rut_administrador">

                <?php
                while ($row = mysqli_fetch_assoc($resultado3)) {
                    echo "<option value='" . $row['rut_usuario'] . "'>'" . $row['nombre_usuario'] . $row['apellido_usuario'] . "'</option>";
                }

                ?>

            </select>
            <a>
                <input type="submit" value="Guardar" class="btn solid">
            </a>

        </form>

        
        <hr>
        <br>
        <form action="departamento.php" method="POST" style=>
            <input type="text" name="buscar">
            <input type="submit" value="Buscar" class="btn solid">
        </form>
        <br>

        <table>
            <thread>
                <tr>
                    <th>Nombre
                        <form action="departamento.php" method="post">
                            <select name="ord_nombre" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>

                    <th>ID departamento
                        <form action="departamento.php" method="post">
                            <select name="ord_id" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>

                    <th>RUT encargado</th>

                    <th>RUT administrador</th>
                    <th>Opciones</th>
                </tr>
            </thread>



            <?php

            while ($row = mysqli_fetch_assoc($resultado)) {

                $nombre_departamento = $row['nombre_departamento'];
                $id_departamento = $row['id_departamento'];
                $rut_encargado = $row['rut_encargado'];
                $rut_administrador = $row['rut_administrador'];

                echo "<tr style=text-align:center>";
                echo "<td>" . $nombre_departamento . "</td>";
                echo "<td>" . $id_departamento . "</td>";
                echo "<td>" . $rut_encargado . "</td>";
                echo "<td>" . $rut_administrador . "</td>";

                echo "<td >
                    <form action='eliminar_departamento.php' method='post'>
                      <input type='hidden' name='id_departamento' value='" . $id_departamento . "'>
                      <button type='submit' style='float:left;margin-right:5px;' >Eliminar</button>
                    
                    </form >
                     <a href='editar_departamento.php?id_departamento=" . $id_departamento . "'>
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