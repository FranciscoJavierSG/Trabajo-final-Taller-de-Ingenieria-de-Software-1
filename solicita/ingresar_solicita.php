<?php
require('..\conexion.php');

$consulta = "SELECT MAX(id_solicitud) as id FROM ciudadano";
$resultado = mysqli_query($conexion, $consulta);

$consulta2 = "SELECT id_departamento FROM departamento, ciudadano WHERE departamento.id_departamento = ciudadano.id_departamento  ";
$resultado2 = mysqli_query($conexion, $consulta2);



$ingresar="INSERT INTO solicita( id_solicita, id_departamento) VALUES ('$consulta','$consulta2')";
$result = mysqli_query($conexion, $ingresar);

header('Location: ..\ciudadano\ciudadano.php');

?>
<!--
ingresarle id_solicitud e id_departamento
-->

  