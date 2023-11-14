<?php
require('..\conexion.php');
include('..\autorizacion.php');
?>
<?php
$query = "SELECT count(id_solicitud) AS cantidad_solicitudes FROM solicitud";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$cantidad_solicitudes = $row['cantidad_solicitudes'];

$query = "SELECT count(id_solicitud) AS solicitudes_felicitacion FROM solicitud WHERE solicitud = 'felicitacion' ";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$solicitudes_felicitacion = $row['solicitudes_felicitacion'];

$query = "SELECT count(id_solicitud) AS solicitudes_reclamos FROM solicitud WHERE solicitud= 'reclamo'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$solicitudes_reclamos = $row['solicitudes_reclamos'];

$query = "SELECT count(id_solicitud) AS solicitudes_sugerencia FROM solicitud WHERE solicitud = 'sugerencia'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$solicitudes_sugerencia = $row['solicitudes_sugerencia'];

$query = "SELECT count(id_solicitud) AS solicitudes_en_proceso FROM solicitud WHERE estado = 'en proceso'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$solicitudes_en_proceso = $row['solicitudes_en_proceso'];



$query = "SELECT count(id_solicitud) AS solicitudes_terminada FROM solicitud WHERE estado = 'terminado'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);
$solicitudes_terminada = $row['solicitudes_terminada'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../migas-de-pan.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
</head>

<header>
    <h1 class="logo">
        <a href="../index.php"><img src="../logo_gob.png" alt="gobierno de chile logo"></a>
    </h1>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">

    <nav>
        <ul>
            <li><a href="visualizar_grafico.php">Volver</a></li>
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
            <li class="migas-de-pan-item"><a href="bienvenido_administrador.php" class="migas-de-pan-link">Admin Dashboard</a></li>
            <li class="migas-de-pan-item"><a href="visualizar_grafico.php" class="migas-de-pan-link">Visualizar gráfico</a></li>
            <li class="migas-de-pan-item"><a href="bienvenido_administrador.php" class="migas-de-pan-link" style="font-weight: 600;">Gráfico Específico por mes</a></li>
        </ul>
    </div>

    <div style="padding-left:30px; padding-right:30px">

        <h1>Grafico generado</h1>

        <script>
            var solicitudes_terminada = <?php echo json_encode($solicitudes_terminada); ?>;
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
                        data: [solicitudes_terminada],
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
                    height: 500,

                    sparkline: {
                        enabled: true,
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "60%",
                        endingShape: "flat",

                        distributed: false,

                    },
                },

                legend: {
                    show: true,
                    position: 'left',
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 3,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: ["Felicitaciones", "Reclamos", "Sugerencias", "Terminada", "En proceso", "Total de solicitudes"],
                    labels: {
                        show: true,

                        rotateAlways: false,
                        hideOverlappingLabels: true,
                        showDuplicates: false,
                        trim: false,
                        minHeight: undefined,
                        maxHeight: 120,
                        style: {
                            colors: [],
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                            cssClass: 'apexcharts-xaxis-label',
                        },
                        crosshairs: {
                            show: true,
                            width: 1,
                            position: 'back',
                            opacity: 0.9,
                            stroke: {
                                color: '#b6b6b6',
                                width: 0,
                                dashArray: 0,
                            },
                        },
                    },
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
        <?php
        $mes = $_POST['mes'];
        $query = "SELECT count(id_solicitud) AS cantidad_solicitudes_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' ";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_solicitudes_mes = $row['cantidad_solicitudes_mes'];

        $query = "SELECT count(id_solicitud) AS cantidad_felicitaciones_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' AND solicitud='felicitacion'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_felicitaciones_mes = $row['cantidad_felicitaciones_mes'];

        $query = "SELECT count(id_solicitud) AS cantidad_reclamos_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' AND solicitud='reclamo'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_reclamos_mes = $row['cantidad_reclamos_mes'];

        $query = "SELECT count(id_solicitud) AS cantidad_sugerencias_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' AND solicitud='sugerencia'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_sugerencias_mes = $row['cantidad_sugerencias_mes'];


        $query = "SELECT count(id_solicitud) AS cantidad_en_proceso_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' AND estado ='en proceso'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_en_proceso_mes = $row['cantidad_en_proceso_mes'];

        $query = "SELECT count(id_solicitud) AS cantidad_terminado_mes FROM solicitud WHERE fecha LIKE '%" . $mes . "%' AND estado ='terminado'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);
        $cantidad_terminado_mes = $row['cantidad_terminado_mes'];


        if ($cantidad_solicitudes_mes == 0 && $cantidad_felicitaciones_mes == 0 && $cantidad_reclamos_mes == 0 && $cantidad_sugerencias_mes == 0 && $cantidad_en_proceso_mes == 0 && $cantidad_terminado_mes == 0) {
            echo "<h1>En este mes lametablemente no se ingresaron solicitudes...</h1>";
        } else {
        }
        ?>
        <div id="apex2">
            <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
        </div>
        <script>
            var cantidad_solicitudes_mes = <?php echo json_encode($cantidad_solicitudes_mes); ?>;
            var cantidad_felicitaciones_mes = <?php echo json_encode($cantidad_felicitaciones_mes); ?>;
            var cantidad_reclamos_mes = <?php echo json_encode($cantidad_reclamos_mes); ?>;
            var cantidad_sugerencias_mes = <?php echo json_encode($cantidad_sugerencias_mes); ?>;

            var cantidad_en_proceso_mes = <?php echo json_encode($cantidad_en_proceso_mes); ?>;
            var cantidad_terminado_mes = <?php echo json_encode($cantidad_terminado_mes); ?>;

            var options = {
                series: [{
                        name: "Felicitaciones",
                        data: [cantidad_felicitaciones_mes],
                    },
                    {
                        name: "Reclamos",
                        data: [cantidad_reclamos_mes],
                    },
                    {
                        name: "Sugerencias",
                        data: [cantidad_sugerencias_mes],
                    },
                    {
                        name: "Terminada",
                        data: [cantidad_terminado_mes],
                    },
                    {
                        name: "En proceso",
                        data: [cantidad_en_proceso_mes],
                    },
                    {
                        name: "Total de solicitudes",
                        data: [cantidad_solicitudes_mes],
                    },
                ],
                chart: {
                    type: "bar",
                    height: 500,

                    sparkline: {
                        enabled: true,
                    },

                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "60%",
                        endingShape: "flat",

                        distributed: false,

                    },
                },

                legend: {
                    show: true,
                    position: 'left',
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: true,
                    width: 3,
                    colors: ["transparent"],
                },
                xaxis: {
                    categories: ["Felicitaciones", "Reclamos", "Sugerencias", "Terminada", "En proceso", "Total de solicitudes"],
                    labels: {
                        show: true,

                        rotateAlways: false,
                        hideOverlappingLabels: true,
                        showDuplicates: false,
                        trim: false,
                        minHeight: undefined,
                        maxHeight: 120,
                        style: {
                            colors: [],
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                            cssClass: 'apexcharts-xaxis-label',
                        },
                        crosshairs: {
                            show: true,
                            width: 1,
                            position: 'back',
                            opacity: 0.9,
                            stroke: {
                                color: '#b6b6b6',
                                width: 0,
                                dashArray: 0,
                            },
                        },
                    },
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

            var chart = new ApexCharts(document.querySelector("#apex2"), options);
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
    </div>
</body>

</html>