<?php
    require('..\conexion.php');

    $rut_usuario=$_POST ['rut_usuario'];
    $contrasena_usuario=$_POST ['contrasena_usuario'];
    $nombre_usuario = $_POST ['nombre_usuario'];
    $apellido_usuario = $_POST ['apellido_usuario'];
    $tipo_usuario = $_POST ['tipo_usuario'];
    
    $ingresar= "INSERT INTO `usuario` (rut_usuario, contrasena_usuario, nombre_usuario, apellido_usuario ,tipo_usuario)
                 VALUES ('$rut_usuario', '".md5($contrasena_usuario)."', '$nombre_usuario', '$apellido_usuario','$tipo_usuario')";
    $result = mysqli_query($conexion, $ingresar);

    header('Location: ..\login.php');

?>