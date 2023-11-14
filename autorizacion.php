<?php
    session_start();
    if(!isset($_SESSION['rut_usuario'])){
    header("Location: login.php");
    exit(); 
    }
?>