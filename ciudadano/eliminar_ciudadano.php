<?php
    require('..\conexion.php');

    $id_solicitud=$_POST['id_solicitud'];

    $eliminar= "DELETE FROM solicitud WHERE id_solicitud='$id_solicitud'";
    $result = mysqli_query($conexion, $eliminar);

    header('Location: revisar_ciudadano.php');

?>