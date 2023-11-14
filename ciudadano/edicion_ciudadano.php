<?php

    require('..\conexion.php');

    $nombre_ciudadano=$_POST['nombre_ciudadano'];
    $apellido_ciudadano=$_POST['apellido_ciudadano'];
    $rut=$_POST['rut'];
    $email_ciudadano=$_POST['email_ciudadano'];
    $solicitud=$_POST['solicitud'];
    $id_solicitud=$_POST['id_solicitud'];
    $informacion_consulta=$_POST['informacion_consulta'];
    $update= "UPDATE solicitud SET nombre_ciudadano='$nombre_ciudadano', apellido_ciudadano='$apellido_ciudadano' ,
                 rut='$rut', email_ciudadano='$email_ciudadano', solicitud='$solicitud', informacion_consulta= '$informacion_consulta' 
             WHERE id_solicitud='$id_solicitud'";
    $result = mysqli_query($conexion , $update);

    header('Location: ciudadano.php');
?>
