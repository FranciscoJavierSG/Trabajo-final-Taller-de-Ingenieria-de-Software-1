<?php
    require('..\conexion.php');

    $rut_usuario=$_POST['rut_usuario'];

    $eliminar= "DELETE FROM usuario WHERE rut_usuario='$rut_usuario'";
    $result = mysqli_query($conexion, $eliminar);

    header('Location: encargado.php');

?>