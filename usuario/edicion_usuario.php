<?php

    require('..\conexion.php');

    $rut_usuario=$_POST['rut_usuario'];
    $contrasena_usuario=$_POST['contrasena_usuario'];
    $nombre_usuario = $_POST ['nombre_usuario'];
    $apellido_usuario = $_POST ['apellido_usuario'];
    
//falta poner el tipo de usuario
    $update= "UPDATE usuario SET rut_usuario='$rut_usuario', contrasena_usuario='".md5($contrasena_usuario)."', 
                nombre_usuario = '$nombre_usuario', apellido_usuario = '$apellido_usuario'
                WHERE rut_usuario='$rut_usuario'";
    $result = mysqli_query($conexion , $update);

    header('Location: ..\administrador\revisar_administrador.php');
?>