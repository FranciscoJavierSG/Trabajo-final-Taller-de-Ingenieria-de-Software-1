<?php
    $conexion = mysqli_connect("localhost","root","","proyecto-tis");

        if ($conexion->connect_error){
            die("Conexion fallida: " . $conn->connect_error);
        }
?>