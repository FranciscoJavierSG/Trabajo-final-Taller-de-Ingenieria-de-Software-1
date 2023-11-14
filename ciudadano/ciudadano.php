<?php

require('..\conexion.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="ciudadano.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="funciones_ciudadano.js"> </script>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="#">Formulario</a></li>
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
            <li class="migas-de-pan-item"><a href="#" class="migas-de-pan-link" style="font-weight: 600;">Formulario</a></li>
        </ul>
    </div>

    <div class="login-box">
        <div class="forms-containers">
            <div class="signin-signup">
                <form action="ingresar_ciudadano.php" method="post" name="ingresar_ciudadano" onsubmit="return validar_ciudadano();">
                    <h2 class="titulo">Formulario</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre_ciudadano" pattern="[A-Za-z]{2,30}" placeholder="Nombre" onchange=" validar_nombre_ciudadano();" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="apellido_ciudadano" pattern="[A-Za-z]{2,30}" placeholder="Apellido" onchange="return validar_apellido_ciudadano();" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-address-card"></i>
                        <input type="text" name="rut" pattern="[0-9]{7,}" placeholder="Rut (Ej: 123456789)" onchange="return validar_rut_ciudadano();" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email_ciudadano" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z].{1,}$" placeholder="Email" onchange="return validar_solicitud_ciudadano();" />
                    </div>
                    
                    <div class="input-field">
                        <i class="fas fa-question-circle"></i>
                        <select name="solicitud">
                            <option value="felicitacion">Felicitacion</option>
                            <option value="reclamo">Reclamo</option>
                            <option value="sugerencia">Sugerencia</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-building"></i>
                        <select name="id_departamento">

                            <?php
                            $consulta2 = "SELECT id_departamento, nombre_departamento FROM departamento";
                            $resultado2 = mysqli_query($conexion, $consulta2);

                            while ($row = mysqli_fetch_assoc($resultado2)) {
                                echo "<option value='" . $row['id_departamento'] . "'>'" . $row['nombre_departamento'] . "'</option>";
                            }

                            ?>

                        </select>
                    </div>
                    <div class="input-field-especial">
                        <i class="fas fa-infoaaa"></i>
                        <textarea id="informacion_consulta" name="informacion_consulta"  placeholder="Agregue su consulta en ese cuadro"rows="4" cols="50"></textarea>
                        
                    </div>
                    <input type="submit" name="submit" value="Guardar" class="btn solid">
                    <a href="estado_solicitud.php">
                        <input type="button" value="Estado solicitud" class="btn solid">
                    </a>

            </div>
        </div>
    </div>

    </form>
   
</body>

</html>