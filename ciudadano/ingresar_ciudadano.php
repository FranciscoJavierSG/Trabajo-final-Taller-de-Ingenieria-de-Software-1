<?php 

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}

?>

<?php
    require('..\conexion.php');
    session_start();
    $nombre_ciudadano=$_POST['nombre_ciudadano'];
    $apellido_ciudadano=$_POST['apellido_ciudadano'];
    $rut=$_POST['rut'];
    $email_ciudadano=$_POST['email_ciudadano'];
    $solicitud=$_POST['solicitud'];
    $informacion_consulta=$_POST['informacion_consulta'];
    $id_departamento = $_POST['id_departamento'];
    $codigo= generarCodigo(10);


    $ingresar= "INSERT INTO solicitud (nombre_ciudadano, apellido_ciudadano, rut, email_ciudadano, solicitud, fecha, hora, informacion_consulta , estado, codigo) 
                VALUES ('$nombre_ciudadano', '$apellido_ciudadano', '$rut','$email_ciudadano','$solicitud', CURRENT_DATE(), CURTIME() ,'$informacion_consulta','en proceso', '$codigo')";

    $result = mysqli_query($conexion, $ingresar);

    $query="SELECT MAX(id_solicitud) AS id_solicitud FROM solicitud";
    $result=mysqli_query($conexion, $query);;
    $row= mysqli_fetch_assoc($result);

    $id_solicitud=$row['id_solicitud'];
    
    $_SESSION['POST'] = $_POST;
    
    $_SESSION['id_solicitud'] = $id_solicitud;
    
    $_SESSION['id_departamento'] = $id_departamento;

    $query="SELECT * FROM solicitud WHERE id_solicitud='$id_solicitud'";
    $result=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result);
    $fecha_solicitud=$row['fecha'];
    $hora_solicitud=$row['hora'];
    $codigo=$row['codigo'];


    $query="SELECT * FROM departamento WHERE id_departamento='$id_departamento'";
    $result=mysqli_query($conexion,$query);
    $row=mysqli_fetch_assoc($result);
    $nombre_departamento=$row['nombre_departamento'];

    $txt = "
        <html>
        <head>
        <title>HTML email</title>
        <link rel='stylesheet' href='../tablas.css'>
        </head>
        <body>
        <p>Hola esta es la solicitud que envio el dia ".$fecha_solicitud.". En la hora ".$hora_solicitud."</p>
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
        <td>".$nombre_departamento."</td>
        </tr>
        </table>
        <p>La consulta es la siguiente:</p>
        <p>".$informacion_consulta."</p>
        </body>
        </html>
        ";
    $asunto = "Solicitud enviada";
    
    $headers = "From: municipalidad.pelotillehue@gmail.com";
    $headers .= "CC: municipalidad.pelotillehue@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    mail($email_ciudadano,$asunto,$txt,$headers);


    $ingresar2= "INSERT INTO solicita(id_solicitud, id_departamento) VALUES(LAST_INSERT_ID(),'$id_departamento')";
    $result2 = mysqli_query($conexion, $ingresar2);



    header("location:  ..\departamento\departamento_delegacion.php");
    

?>