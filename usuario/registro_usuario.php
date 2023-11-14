<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="funciones_administrador.js"></script>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="../ciudadano/ciudadano.php">Formulario</a></li>
            <li><a href="../login.php">Login</a></li>
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
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Registro</a></li>
        </ul>
    </div>

    <div class="login-box">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="ingresar_usuario.php" method="post" name="ingresar_usuario" class="sign-up-form" onsubmit="return validar_usuario();" required>
                    <h2 class="titulo">Registro</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre_usuario" pattern="[A-Za-z]{2,15}" placeholder="Nombre" onclick="return validar_nombre_usuario();" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="apellido_usuario" pattern="[A-Za-z]{2,15}" placeholder="Apellido" onclick="return validar_apellido_usuario();" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" name="rut_usuario" pattern="[0-9]{7,11}" placeholder="Rut" onclick="return validar_rut_usuario();" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="contrasena_usuario" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*{6,}" placeholder="Contraseña" onclick="return validar_contrasena_usuario();" required />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-briefcase"></i>
                        <select name="tipo_usuario" id="tipo_usuario">
                            <option value="encargado">Encargado</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                    <input name="submit" type="submit" value="Registrarse" class="btn solid" />
                </form>
            </div>
        </div>
    </div>

</body>

</html>