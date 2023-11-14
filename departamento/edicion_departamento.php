<?php

    require('..\conexion.php');

    $nombre_departamento=$_POST['nombre_departamento'];
    
    $id_departamento=$_POST['id_departamento'];
    $rut_encargado = $_POST['rut_encargado'];

    $update= "UPDATE departamento SET nombre_departamento='$nombre_departamento', rut_encargado='$rut_encargado' WHERE id_departamento='$id_departamento'";
    $result = mysqli_query($conexion , $update);

    header('Location: departamento.php');
?>