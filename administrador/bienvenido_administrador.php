<?php
session_start();
if (!isset($_SESSION['rut_usuario'])) {
    header("Location: login.php");
    exit();
}
require("..\conexion.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Bienvenido dios supremo</title>
</head>

<body>

    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars"></i>
            </div>
            <div class="navbar__left">
                <!--<a href="#">Alcaldía</a>
                <a href="#">Tabla</a>-->
                <a class="active_link" href="#">Administrador</a>
            </div>
            <div class="navbar__right">
                <a href="#">
                    <i class="fa fa-search"></i>
                </a>
                <a href="#">
                    <i class="fa fa-clock-o"></i>
                </a>
                <a href="#">
                    <img width="30" src="avatar.svg" alt="">
                </a>
            </div>
        </nav>

        <main>
            <div class="main__container">

                <div class="main__title">
                    <img src="hello.svg" alt="">
                    <div class="main__greeting">
                        <?php
                        $rut_usuario = $_SESSION['rut_usuario'];
                        $query = "SELECT * FROM usuario WHERE rut_usuario = '$rut_usuario'";
                        $result = mysqli_query($conexion, $query);
                        $row = mysqli_fetch_assoc($result);
                        $nombre_usuario = $row['nombre_usuario'];
                        $apellido_usuario = $row['apellido_usuario'];

                        echo "<h1>Bienvenid@, " . $nombre_usuario . " " . $apellido_usuario . ".</h1>";

                        ?></b></p>

                        <p>Bienvenid@ a la Dashboard del administrador.</p>
                    </div>
                </div>

                <div class="main__cards">

                    <div class="card">
                        <i class="fa fa-user-o fa-2x text-lightblue"></i>
                        <div class="card__inner">
                            <p class="text-primary-p">Total de consultas enviadas</p>
                            <span class="font-bold text-title">
                                <?php
                                $query = "SELECT count(id_solicitud) AS cantidad_solicitudes FROM solicitud";
                                $result2 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result2);
                                $cantidad_solicitudes = $row['cantidad_solicitudes'];
                                echo $cantidad_solicitudes;
                                ?>
                            </span>
                        </div>
                    </div>
                    <!--
                    <div class="card">
                        <i class="fa fa-calendar fa-2x text-red"></i>
                        <div class="card__inner">
                            <p class="text-primary-p">Visitas totales de la página</p>
                            <span class="font-bold text-title">24679</span>
                        </div>
                    </div>

                    <div class="card">
                        <i class="fa fa-eye fa-2x text-yellow"></i>
                        <div class="card__inner">
                            <p class="text-primary-p">Visitas a nuestras redes sociales</p>
                            <span class="font-bold text-title">7142</span>
                        </div>
                    </div>
-->
                    <div class="card">
                        <i class="fa fa-thumbs-up fa-2x text-green"></i>
                        <div class="card__inner">
                            <p class="text-primary-p">Consultas contestadas</p>
                            <span class="font-bold text-title">
                                <?php
                                $query = "SELECT count(id_solicitud) AS solicitudes_contestadas FROM solicitud WHERE estado='terminado'";
                                $result3 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result3);
                                $solicitudes_contestadas = $row['solicitudes_contestadas'];
                                echo $solicitudes_contestadas;
                                ?>
                                <?php
                                $query = "SELECT count(id_solicitud) AS solicitudes_en_proceso FROM solicitud WHERE estado='en proceso'";
                                $result4 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result4);
                                $solicitudes_en_proceso = $row['solicitudes_en_proceso'];

                                ?>
                                <?php
                                $query = "SELECT count(id_solicitud) AS solicitudes_felicitacion FROM solicitud WHERE solicitud='felicitacion'";
                                $result5 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result5);
                                $solicitudes_felicitacion = $row['solicitudes_felicitacion'];

                                ?>
                                <?php
                                $query = "SELECT count(id_solicitud) AS solicitudes_reclamos FROM solicitud WHERE solicitud='reclamo'";
                                $result5 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result5);
                                $solicitudes_reclamos = $row['solicitudes_reclamos'];

                                ?>
                                <?php
                                $query = "SELECT count(id_solicitud) AS solicitudes_sugerencia FROM solicitud WHERE solicitud='sugerencia'";
                                $result5 = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result5);
                                $solicitudes_sugerencia = $row['solicitudes_sugerencia'];

                                ?>

                            </span>
                        </div>
                    </div>
                </div>

                <div class="charts">
                    <div class="charts__left">
                        <div class="charts__left__title">
                            <div>
                                <h1>Grafico de solicitudes</h1>
                            </div>

                        </div>
                        <div id="apex1">

                        </div>

                    </div>

                    <div class="charts__right">
                        <div class="charts__right__title">
                            <div>
                                <h1>Reporte de estadisticas</h1>
                            </div>
                        </div>

                        <div class="charts__right__cards">
                            <div class="card1">
                                <h1>Felicitaciones totales</h1>
                                <?php
                                echo $solicitudes_felicitacion;
                                ?>
                            </div>

                            <div class="card2">
                                <h1>Reclamos totales</h1>
                                <?php
                                echo $solicitudes_reclamos;
                                ?>
                            </div>

                            <div class="card3">
                                <h1>Sugerencias totales</h1>
                                <?php
                                echo $solicitudes_sugerencia;
                                ?>
                            </div>

                            <div class="card4">
                                <h1>Solicitudes no contestadas</h1>
                                <?php
                                echo $solicitudes_en_proceso;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div id="sidebar">
            <div class="sidebar__title">
                <div class="sidebar__img">
                    <img src="..\logo_gob.png" alt="" width="5%">
                    <h1>Municipalidad de Pelotillehue</h1>
                </div>
                <i class="fa fa-times" id="sidebarIcon" onclick="closeSidebar()"></i>
            </div>

            <div class="sidebar__menu">
                <div class="sidebar__link active_menu_link">
                    <i class="fa fa-home"></i>
                    <a href="#">Dashboard</a>
                </div>
                <h2>ADM</h2>
                <div class="sidebar__link">
                    <i class="fa fa-user-secret"></i>
                    <a href="revisar_administrador.php">Gestionar administradores</a>
                </div>

                <div class="sidebar__link">
                    <i class="fa fa-user"></i>
                    <a href="..\encargado/encargado.php">Gestionar encargados</a>
                </div>


                <div class="sidebar__link">
                    <i class="fa fa-building-o"></i>
                    <a href="..\departamento/departamento.php">Gestionar departamentos</a>
                </div>

                <!--<div class="sidebar__link">
                    <i class="fa fa-question"></i>
                    <a href="..\ciudadano/revisar_ciudadano.php">Gestionar solicitudes</a>
                </div>-->
                <div class="sidebar__link">
                    <i class="fa fa-question"></i>
                    <a href="visualizar_grafico.php">Visualizar grafico</a>
                </div>

                <div class="sidebar__link">
                    <i class="fa fa-user"></i>
                    <a href="..\usuario/editar_perfil_administrador.php">Editar Perfil</a>
                </div>

                <div class="sidebar__logout">
                    <i class="fa fa-power-off"></i>
                    <a href="..\logout.php">Cerrar Sesión</a>
                </div>

            </div>

        </div>
        <script>
            var solicitudes_contestadas = <?php echo json_encode($solicitudes_contestadas); ?>;
            var solicitudes_felicitacion = <?php echo json_encode($solicitudes_felicitacion); ?>;
            var solicitudes_reclamos = <?php echo json_encode($solicitudes_reclamos); ?>;
            var solicitudes_sugerencia = <?php echo json_encode($solicitudes_sugerencia); ?>;

            var cantidad_solicitudes = <?php echo json_encode($cantidad_solicitudes); ?>;
            var solicitudes_en_proceso = <?php echo json_encode($solicitudes_en_proceso); ?>;
            var options = {
                series: [{
                        name: "Felicitaciones",
                        data: [solicitudes_felicitacion],
                    },
                    {
                        name: "Reclamos",
                        data: [solicitudes_reclamos],
                    },
                    {
                        name: "Sugerencias",
                        data: [solicitudes_sugerencia],
                    },
                    {
                        name: "Terminada",
                        data: [solicitudes_contestadas],
                    },
                    {
                        name: "En proceso",
                        data: [solicitudes_en_proceso],
                    },
                    {
                        name: "Total de solicitudes",
                        data: [cantidad_solicitudes],
                    },
                ],
                chart: {
                    type: "bar",
                    height: 250,
                    sparkline: {
                        enabled: true,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "80%",
                        endingShape: "flat",
                    },
                },
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    show: true,
                    width: 3,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: ["Solicitudes"],
                },
                yaxis: {
                    title: {
                        text: "",
                    },
                },
                fill: {
                    opacity: 1,
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return " " + val + " solicitudes";
                        },
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#apex1"), options);
            chart.render();

            //Sidebar Toggle Codes:

            var sidebarOpen = false;
            var sidebar = document.getElementById("sidebar");
            var sidebarCloseIcon = document.getElementById("sidebarIcon");

            function toggleSidebar() {
                if (!sidebarOpen) {
                    sidebar.classList.add("sidebar_responsive");
                    sidebarOpen = true;
                }
            }

            function closeSidebar() {
                if (sidebarOpen) {
                    sidebar.classList.remove("sidebar_responsive");
                    sidebarOpen = false;
                }
            }
        </script>
        <!--<script src="admin-functions-css.js"></script>-->
</body>

</html>