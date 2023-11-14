<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="migas-de-pan.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<header>
  <h1 class="logo">
    <a href="index.php"><img src="logo_gob.png" alt="gobierno de chile logo"></a>
  </h1>
  <input type="checkbox" id="nav-toggle" class="nav-toggle">

  <nav>
    <ul>
      <li><a href="ciudadano/ciudadano.php">Formulario</a></li>
      <li><a href="">Login</a></li>
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
      <li class="migas-de-pan-item"><a href="index.php" class="migas-de-pan-link">Inicio</a></li>
      <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Iniciar Sesión</a></li>
    </ul>
  </div>

  <?php
  require('conexion.php');
  session_start();
  if (isset($_POST['rut_usuario'])) {
    $rut_usuario = stripslashes($_REQUEST['rut_usuario']); // removes backslashes
    $rut_usuario = mysqli_real_escape_string($conexion, $rut_usuario); //escapes special characters in a string
    $contrasena_usuario = stripslashes($_REQUEST['contrasena_usuario']);
    $contrasena_usuario = mysqli_real_escape_string($conexion, $contrasena_usuario);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `usuario` WHERE rut_usuario='$rut_usuario' AND contrasena_usuario='" . md5($contrasena_usuario) . "'";
    $result = mysqli_query($conexion, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
      $query2 = "SELECT * FROM `usuario` WHERE rut_usuario='$rut_usuario' ";
      $result2 = mysqli_query($conexion, $query2);
      $tipo = mysqli_fetch_assoc($result2);
      $tipo_usuario = $tipo['tipo_usuario'];

      if ($tipo_usuario == 'administrador') {
        $_SESSION['rut_usuario'] = $rut_usuario;
        header("Location: administrador/bienvenido_administrador.php"); // Redirect user to index.php
      } else if ($tipo_usuario == 'encargado') {
        $_SESSION['rut_usuario'] = $rut_usuario;
        header("Location: encargado/bienvenido_encargado.php"); // Redirect user to index.php
      }
    } else {
      echo "<div style=text-align:center>
              <h3>Usuario/Contraseña Incorrecto</h3>
              <span>Haz click </span>
              <a href='login.php' style='font-weight:700; color: #5995fd';>aquí</a>
              <span> para iniciar sesión.</span>
            </div>";
    }
  } else {
  ?>
    <div class="login-box">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" name="login" class="sign-in-form">
            <h2 class="titulo">Inicia Sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="rut_usuario" placeholder="Rut" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="contrasena_usuario" placeholder="Contraseña" required />
            </div>
            <input name="submit" type="submit" value="Iniciar Sesión" class="btn solid" />
            <p class="text-registro">¿No estas registrado aún? <a href='usuario/registro_usuario.php'>Registrate Aquí</a></p>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>

</body>

</html>