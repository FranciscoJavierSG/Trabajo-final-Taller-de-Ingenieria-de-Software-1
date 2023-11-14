<?php
    require('..\conexion.php');

    $nombre_encargado=$_POST['nombre_encargado'];
    $apellido_encargado = $_POST ['apellido_encargado'];
    $rut_encargado=$_POST['rut_encargado'];
    
    
    $ingresar= "INSERT INTO encargado (nombre_encargado,rut_encargado ,apellido_encargado ) 
                VALUES ('$nombre_encargado', '$rut_encargado', '$apellido_encargado')";
    $result = mysqli_query($conexion, $ingresar);

    header('Location: encargado.php');

?>