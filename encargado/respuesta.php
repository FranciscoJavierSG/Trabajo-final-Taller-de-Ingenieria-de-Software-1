<?php
    require('..\conexion.php');
    session_start();
    

    $rut_usuario=$_SESSION['rut_usuario'];
    $respuesta=$_POST['respuesta'];
    $id_solicitud= $_POST['id_solicitud'];

    $actualiza= "UPDATE solicitud SET estado = 'terminado' WHERE id_solicitud= '$id_solicitud'";
                
    $result = mysqli_query($conexion, $actualiza);


    $ingresa="INSERT INTO responde(rut_usuario, id_solicitud, hora, fecha, respuesta)
             VALUES('$rut_usuario','$id_solicitud',CURTIME(),CURRENT_DATE(),'$respuesta')";
    
    $result = mysqli_query($conexion, $ingresa);

    $asunto = "Solicitud enviada";
    
    $headers = "From: municipalidad.pelotillehue@gmail.com";
    
    $query="SELECT * FROM solicitud WHERE id_solicitud=' $id_solicitud'";
    $result2=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result2);
    $email_ciudadano=$row['email_ciudadano'];
    $nombre_ciudadano=$row['nombre_ciudadano'];
    $apellido_ciudadano=$row['apellido_ciudadano'];
    $codigo=$row['codigo'];
    $informacion_consulta=$row['informacion_consulta'];
    $hora_solicitud=$row['hora'];
    $fecha_solicitud=$row['fecha'];

    $query="SELECT * FROM solicita WHERE id_solicitud=' $id_solicitud'";
    $result3=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result3);
    $id_departamento=$row['id_departamento'];

    $query="SELECT * FROM usuario WHERE rut_usuario='$rut_usuario'";
    $result4=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result4);
    $nombre_usuario=$row['nombre_usuario'];
    $apellido_usuario=$row['apellido_usuario'];

    $query="SELECT * FROM departamento WHERE id_departamento='$id_departamento'";
    $result5=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result5);
    $nombre_departamento=$row['nombre_departamento'];

    $query="SELECT * FROM respuesta WHERE id_solicitud='$id_solicitud'";
    $result5=mysqli_query($conexion,$query);
    $row2=mysqli_fetch_assoc($result5);
    $hora_respuesta=$row2['hora'];
    $fecha_respuesta=$row2['fecha'];



    $txt = "
    <html>
    <head>
    <title>HTML email</title>
    <link rel='stylesheet' href='../tablas.css'>
    </head>
        <body>
            <p>Hola esta es la respuesta de la solicitud que envio el dia ".$fecha_solicitud.". En la hora ".$hora_solicitud."</p>
            <table>
                <tr>
                    <th>Nombre Encargado</th>
                    <th>Apellido Encargado</th>
                    <th>Departamento</th>
                </tr>
                <tr>
                    <td>".$nombre_usuario."</td>
                    <td>".$apellido_usuario."</td>
                    <td>".$nombre_departamento."</td>
                </tr>
            </table>
            <p>Esta respuesta fue emitida el dia ".$fecha_respuesta." en la hora ".$hora_respuesta.":</p>
            <p>La respuesta es la siguiente:</p>
            <p>".$respuesta."</p>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Codigo</th>
                    <th>Departamento</th>
                </tr>
                <tr>
                    <td>".$nombre_ciudadano."</td>
                    <td>".$apellido_ciudadano."</td>
                    <td>".$codigo."</td>
                    <td>".$id_departamento."</td>
                </tr>
            </table>
            <p>La consulta es la siguiente:</p>
            <p>".$informacion_consulta."</p>
        </body>
    </html>";
    $asunto = "Solicitud enviada";

    $headers = "From: municipalidad.pelotillehue@gmail.com";
    $headers .= "CC: municipalidad.pelotillehue@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($email_ciudadano,$asunto,$txt,$headers);

    header('Location: revisa_solicitud.php');
?>
