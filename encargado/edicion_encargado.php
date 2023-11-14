<?php

    require('..\conexion.php');

    $nombre_usuario=$_POST['nombre_usuario'];
    $apellido_usuario =$_POST ['apellido_usuario'];
    $rut_usuario=$_POST['rut_usuario'];

   
    $update= "UPDATE usuario SET nombre_usuario='$nombre_usuario'  apellido_usuario='$apellido_usuario' rut_usuario='$rut_usuario'WHERE tipo_usuario='encargado";
    $result = mysqli_query($conexion , $update);

    header('Location: encargado.php');              
?>