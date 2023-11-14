<?php

    require('..\conexion.php');

    $rut_usuario=$_POST['rut_usuario'];
    $contrasena_usuario=$_POST['contrasena_usuario'];
    $nombre_usuario = $_POST ['nombre_usuario'];
    $apellido_usuario = $_POST ['apellido_usuario'];
    

    $update= "UPDATE usuario SET rut_usuario='$rut_usuario', contrasena_usuario='$contrasena_usuario', 
                nombre_usuario = '$nombre_usuario', apellido_usuario = '$apellido_usuario'
                WHERE rut_usuario='$rut_usuario'";
    $result = mysqli_query($conexion , $update);

    header('Location: revisar_administrador.php');
?>