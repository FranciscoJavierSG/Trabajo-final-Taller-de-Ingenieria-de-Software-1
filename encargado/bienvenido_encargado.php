<?php
include("..\autorizacion.php");
require("..\conexion.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Bienvenida</title>
  <link rel="stylesheet" href="../estilos.css">
  <link rel="stylesheet" href="encargado.css">
  <link rel="stylesheet" href="../migas-de-pan.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<header>

  <h1 class="logo">
    <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
  </h1>
  <input type="checkbox" id="nav-toggle" class="nav-toggle">

  <nav>
    <ul>
      <li><a href="..\logout.php">Cerrar Sesión</a></li>
      <li><a href="https://www.facebook.com/gobiernodechile/"><i class="fab fa-facebook-square" style="color: #3b5998;"></i></a></li>
      <li><a href="https://twitter.com/gobiernodechile"><i class="fab fa-twitter-square" style="color: #00acee;"></i></a></li>
      <li><a href="https://www.instagram.com/gobiernodechile/"><i class="fab fa-instagram-square" style="color: #8a3ab9;"></i></a></li>
    </ul>
  </nav>

  <label for="nav-toggle" class="nav-toggle-label">
    <span></span>
  </label>
</header>

<br><br><br><br><br><br>

<body>

  <div>
    <ul class="migas-de-pan">
      <li class="migas-de-pan-item"><a href="../index.php" class="migas-de-pan-link">Inicio</a></li>
      <li class="migas-de-pan-item"><a href="../login.php" class="migas-de-pan-link">Iniciar Sesión</a></li>
      <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Encargado</a></li>
    </ul>
  </div>

  <div style=text-align:center>
    <p>Bienvenid@ <b>
        <?php
        $rut_usuario = $_SESSION['rut_usuario'];
        $query = "SELECT * FROM usuario WHERE rut_usuario = '$rut_usuario'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $nombre_usuario = $row['nombre_usuario'];
        $apellido_usuario = $row['apellido_usuario'];

        echo $nombre_usuario . " " . $apellido_usuario;

        ?></b>!</p>
    <p>Acabas de iniciar sesión</p>

    <a href="revisa_solicitud.php">
      <input type="button" value="Revisar solicitudes" class="btn solid">
    </a>
    <br>

    <a href="..\usuario\editar_perfil_encargado.php">
      <input type="button" value="Editar perfil" class="btn solid">
    </a>
    <br>

    <a href="..\logout.php">Cerrar Sesión</a>

  </div>
</body>

</html>