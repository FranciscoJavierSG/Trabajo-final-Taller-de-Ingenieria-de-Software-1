<?php
require('..\conexion.php');
include("..\autorizacion.php");

if (!isset($_POST['buscar'])) {

    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
    $consulta = "SELECT * FROM usuario WHERE tipo_usuario='administrador' ";

    if (isset($_POST['ord_nombre']) && $_POST['ord_nombre'] == 1) {
        $consulta = "SELECT * 
                FROM usuario
                WHERE tipo_usuario='administrador'
                ORDER BY nombre_usuario ASC";
    } elseif (isset($_POST['ord_nombre'])  && $_POST['ord_nombre'] == 2) {
        $consulta = "SELECT * 
        FROM usuario
        WHERE tipo_usuario='administrador'
         ORDER BY nombre_usuario DESC";
    }

    if (isset($_POST['ord_apellido']) && $_POST['ord_apellido'] == 1) {
        $consulta = "SELECT * 
                FROM usuario
                WHERE tipo_usuario='administrador'
                ORDER BY apellido_usuario ASC";
    } elseif (isset($_POST['ord_apellido'])  && $_POST['ord_apellido'] == 2) {
        $consulta = "SELECT * 
        FROM usuario
        WHERE tipo_usuario='administrador'
         ORDER BY apellido_usuario DESC";
    }



    $resultado = mysqli_query($conexion, $consulta);

}elseif($_POST['buscar'] == ""){
    $consulta = "SELECT * FROM usuario WHERE tipo_usuario='administrador' ";
    $resultado = mysqli_query($conexion, $consulta);
}

else{

    $buscar = $_POST['buscar'];

    $consulta = "SELECT * 
                FROM usuario 
                WHERE (tipo_usuario='administrador' AND apellido_usuario LIKE '%" . $buscar . "%') 
                OR  (tipo_usuario='administrador' AND nombre_usuario LIKE '%" . $buscar . "%') 
                OR (tipo_usuario='administrador' AND rut_usuario LIKE '%" . $buscar . "%') ";
    
    $resultado = mysqli_query($conexion, $consulta);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisar administrador</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="administrador.css">
    <link rel="stylesheet" href="../tablas.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="funciones_administrador.js"></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="bienvenido_administrador.php">Volver</a></li>
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

<div style="padding-left:30px; padding-right:30px">

    <div>
        <ul class="migas-de-pan">
            <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
            <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
            <li class="migas-de-pan-item"><a href="bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Gestionar Admins</a></li>
        </ul>
    </div>

   
        <h3>Lista de administradores</h3>
        <hr>
        <br>
        <form action="revisar_administrador.php" method="POST" style=>
            <input type="text" name="buscar">
            <input type="submit" value="Buscar" class="btn solid">
        </form>

        <br>

        <table>
            <thread>
                <tr>
                    <th>Nombre:
                        <form action="revisar_administrador.php" method="post">
                            <select name="ord_nombre" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Apellido:
                        <form action="revisar_administrador.php" method="post">
                            <select name="ord_apellido" id="" style="max-width:8%;" onchange="this.form.submit();">
                                <option value="--vacio--"></option>
                                <option value="1">Ordenar de forma Ascendente</option>
                                <option value="2">Ordenar de forma Descendente</option>

                            </select>
                        </form>
                    </th>
                    <th>Rut</th>
                    <th>Contrasena</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
            </thread>

            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {

                $rut_usuario = $row['rut_usuario'];
                $contrasena_usuario = $row['contrasena_usuario'];
                $nombre_usuario = $row['nombre_usuario'];
                $apellido_usuario = $row['apellido_usuario'];
                $tipo_usuario = $row['tipo_usuario'];


                echo "<tr>";
                echo "<td>" . $nombre_usuario . "</td>";
                echo "<td>" . $apellido_usuario . "</td>";
                echo "<td>" . $rut_usuario . "</td>";
                echo "<td>" . $contrasena_usuario . "</td>";
                echo "<td>" . $tipo_usuario . "</td>";


                echo "<td>
                    <form action='eliminar_administrador.php' method='post'>
                      <input type='hidden' name='rut_usuario' value='" . $rut_usuario . "'>
                      <button type='submit' style='float:left;margin-right:5px;' >Eliminar</button>
                    
                    </form >
                     <a href='editar_administrador.php?rut_usuario=" . $rut_usuario . "'>
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