<?php
    require('..\conexion.php');

    $id_departamento=$_POST['id_departamento'];

    $eliminar= "DELETE FROM departamento WHERE id_departamento='$id_departamento'";
    $result = mysqli_query($conexion, $eliminar);

    header('Location: departamento.php');

?>
