<?php
    require('..\conexion.php');

    $nombre_departamento = $_POST['nombre_departamento'];
    $rut_encargado = $_POST['rut_encargado'];
    $rut_administrador = $_POST ['rut_administrador'];
    

    $ingresar= "INSERT INTO departamento (nombre_departamento, rut_encargado, rut_administrador)
                VALUES ('$nombre_departamento','$rut_encargado', '$rut_administrador')";
    $result = mysqli_query($conexion, $ingresar);

    header('Location: departamento.php');

?>