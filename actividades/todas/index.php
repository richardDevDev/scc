<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scc/conexion.php";

session_start();
if (!isset($_SESSION['rol'])) {
    header('location: /scc/index.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: /scc/index.php');
    }
    $user = $_SESSION['intento'];
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <link rel="icon" href="/scc/img/icon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Control de Creditos</title>
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="/scc/style.css">
    <link rel="stylesheet" href="/scc/tab.css">
    <html lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://file.myfontastic.com/Ka6YciZfassYCY3n29KQzD/icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <div>
        <header class="header">
            <div class="contenedor1">
                <p class="logo"><img class="logo" src="/scc/img/mascotatesh.svg" alt=""></p>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <lo class="menu__item"><a class="menu__link select" href="/scc/actividades/todas">Actividades</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/alumnos">Alumnos</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/registrar/alumnosentalleres/">Registrar en Talleres</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/alumnos/creditos">Creditos</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/alumnos/licenciaturas">Licenciaturas</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/responsables/">Responsables</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/periodos">Periodos Academicos</a></lo>
                        <lo class="menu__item"><a class="btn btn-secondary dropdown-toggle menu__link select" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Informacion Personal</a>
                                <a class="dropdown-item" href="#">Cambiar Contraseña</a>
                                <a class="dropdown-item" href="/scc/index.php?cerrar_sesion=1">Salir</a>
                            </div>
                        </lo>
                    </ul>
                </nav>
            </div>
        </header>


        <main class="main">
            <div>
                <button onclick="ShowHideElement11();" id="readactbtn11" class="btn-onclick">Ver Actividades</button>

                <form id="readactdiv11" style="display: none;">
                    <h2>Actividades Registradas</h2>

                    <div class="contenid">
                        <br>
                        <table class="big-table" id="table">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Actividad</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                                    $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                                    $sql = "SELECT * FROM actividades WHERE 1";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <tr>
                                    <td><?php echo $mostrar["idactividad"] ?></td>
                                    <td><?php echo $mostrar["nombreactividad"] ?></td>
                                    <td><?php echo $mostrar["categoriaactividad"] ?></td>
                                </tr>
                            <?php
                                    }
                            ?>

                            </tbody>
                        </table>
                </form>

            </div>



            <button onclick="ShowHideElement1();" id="readactbtn1" class="btn-onclick">Eliminar Actividades</button>
            <form id="readactdiv1" style="display: none;" action="delete.php" method="POST">
                <div class="contenidobtn">
                    <h2>Ingresa ID de la Actividad a Eliminar</h2>
                    <select name="id">
                        <option value="">Responsable de la Actividad</option>
                        <?php
                        $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                        $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                        $sql = "SELECT * FROM actividades WHERE 1";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["idactividad"] ?>"><?php echo $mostrar["nombreactividad"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Borrar">


            </form>
    </div>

    <button onclick="ShowHideElement2();" id="readactbtn2" class="btn-onclick">Añadir Actividades</button>
    <form id="readactdiv2" style="display: none;" action="/scc/actividades/add.php" method="POST">
        <div id="productos">
            <h2>Ingresa los Datos de la Nueva Actividad</h2>
            <input type="text" name="name" placeholder="Nombre de la Actividad">
            <select name="act">
                <option value="">Selecciona el tipo de Actividad</option>
                <option value="ACTIVIDAD CULTURAL">ACTIVIDAD CULTURAL</option>
                <option value="ACTIVIDAD DEPORTIVA">ACTIVIDAD DEPORTIVA</option>
            </select>
            <select name="resp">
                <option value="">Responsable de la Actividad</option>
                <?php
                $idregact = '';
                $sql = "SELECT * FROM responsables WHERE 1";
                $result = mysqli_query($link, $sql);

                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $mostrar["nombreresp"] ?>"><?php echo $mostrar["nombreresp"] ?></option>
                <?php
                }
                ?>
            </select>

            <p>
                <input type="hidden" name="directorio">
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </div>
    </form>

    <button onclick="ShowHideElement3();" id="readactbtn3" class="btn-onclick">Modificar Actividades</button>



    <form action="update.php" method="POST" id="readactdiv3" style="display: none;">
        <div id="productos" class="centrado">
            <h2>ingresa los nuevos valores, evita dejar los campos vacios</h2>
            <select name="mod">
                <option value="">Selecciona Actividad a Modificar</option>
                <?php
                $idregact = '';
                $sql = "SELECT * FROM actividades WHERE 1";
                $result = mysqli_query($link, $sql);

                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $mostrar["idactividad"] ?>"><?php echo $mostrar["nombreactividad"] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="text" name="newname" placeholder="Nuevo Nombre de la Actividad" size="40">
            <select name="act">
                <option value="">Selecciona el tipo de Actividad</option>
                <option value="ACTIVIDAD CULTURAL">ACTIVIDAD CULTURAL</option>
                <option value="ACTIVIDAD DEPORTIVA">ACTIVIDAD DEPORTIVA</option>
            </select>
            <select name="resp">
                <option value="">Responsable de la Actividad</option>
                <?php
                $idregact = '';
                $sql = "SELECT * FROM responsables WHERE 1";
                $result = mysqli_query($link, $sql);

                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $mostrar["nombreresp"] ?>"><?php echo $mostrar["nombreresp"] ?></option>
                <?php
                }
                ?>
            </select>

            <p>
                <input type="hidden" name="directorio">
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </div>
    </form>
    </div>


    <section class="info">


        <form action="" method="POST">

            <h1>Estadisticas</h1>
            <p class="nota">NOTA: Los datos presentados en estas tablas unicamente son del periodo actual, puedes ver y cambiar el periodo actual en la pestaña Periodos Academicos</p>

            <div class="contenido">
                <div>
                    <h2>Alumnos Registrados en alguna actividad por Genero</h2>
                </div>
                <!--------------------------- Inicio de la Tabla Alumnos Registrados por Genero-------------------->
                <table class="statics-table">
                    <tbody>
                        <tr>
                            <td>Hombres</td>
                            <?php
                            $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = 'M';";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>

                                <td class="campo-pequeño"><?php echo $mostrar["COUNT('sexo')"] ?></td>
                            <?php
                            }
                            ?>

                        </tr>
                        <tr>
                            <td>Mujeres</td><?php
                                            $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = 'F';";
                                            $result = mysqli_query($link, $sql);
                                            while ($mostrar = mysqli_fetch_array($result)) {
                                            ?>

                                <td><?php echo $mostrar["COUNT('sexo')"] ?></td>
                            <?php
                                            }
                            ?>
                        </tr>
                        <tr>
                            <td>No Definido</td>
                            <?php
                            $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = '';";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>

                                <td><?php echo $mostrar["COUNT('sexo')"] ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                    <tfoot">
                        <tr>
                            <td colspan="1">Total</td>
                            <?php
                            $sql = "SELECT COUNT('matriculaalumno') FROM countalumnosentalleres";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>

                                <td><?php echo $mostrar["COUNT('matriculaalumno')"] ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                        </tfoot>
                </table>
                <!--------------------------- Fin de la Tabla-------------------->

                <!--------------------------- Inicio Grafica Hig Charts Alumnos en Actividades Culturales y Deportivas -------------------->

                <script src="../../code/highcharts.js"></script>
                <script src="../../code/modules/exporting.js"></script>
                <script src="../../code/modules/export-data.js"></script>
                <script src="../../code/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="containercd"></div>
                    <p class="highcharts-description">
                    </p>
                </figure>
                <script type="text/javascript">
                    Highcharts.chart('containercd', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: ''
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: [{
                                name: 'Hombres',
                                y: <?php
                                    $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = 'M';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('sexo')"] ?>
                            <?php
                                    }
                            ?>,
                            sliced: true,
                            selected: true
                            }, {
                                name: 'Mujeres',
                                y: <?php
                                    $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = 'F';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('sexo')"] ?>
                            <?php
                                    }
                            ?>,
                            }, {
                                name: 'No definido',
                                y: <?php
                                    $sql = "SELECT COUNT('sexo') FROM `countalumnosentalleres` WHERE sexo = '';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('sexo')"] ?>
                            <?php
                                    }
                            ?>,
                            }]
                        }]
                    });
                </script>



            </div>

            <div class="contenido">
                <h2>Alumnos en Actividades Culturales y Deportivas</h2>
                <!--------------------------- Inicio Tabla Alumnos en Actividades Culturales y Deportivas -------------------->

                <table>
                    <tfoot>
                        <tr>
                            <td colspan="1">Total</td>
                            <?php
                            $sql = "SELECT COUNT('matriculaalumno') FROM alumnosencadaact;";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                <td><?php echo $mostrar["COUNT('matriculaalumno')"] ?></td>
                            <?php
                            }
                            ?>

                            <?php
                            $sql = "select categoriaactividad, count('categoriaactividad') from alumnosencadaact WHERE categoriaactividad = 'ACTIVIDAD CULTURAL';                            ";
                            $sql1 = "select categoriaactividad, count('categoriaactividad') from alumnosencadaact WHERE categoriaactividad = 'ACTIVIDAD DEPORTIVA';                            ";
                            $result = mysqli_query($link, $sql);
                            $result1 = mysqli_query($link, $sql1);
                            $mostrar1 = mysqli_fetch_array($result1);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td><?php echo $mostrar["categoriaactividad"] ?></td>
                            <td class="campo-pequeño"><?php echo $countcatactcult = $mostrar["count('categoriaactividad')"] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $mostrar1["categoriaactividad"] ?></td>
                            <td class="campo-pequeño"><?php echo $countcatactdep = $mostrar1["count('categoriaactividad')"] ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tr>
                    </tbody>
                </table>

                <!--------------------------- Fin Tabla Alumnos en Actividades Culturales y Deportivas -------------------->
                <!--------------------------- Inicio de la Grafica de high Charts-------------------->

                <script src="../../code/highcharts.js"></script>
                <script src="../../code/modules/exporting.js"></script>
                <script src="../../code/modules/export-data.js"></script>
                <script src="../../code/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="containera"></div>
                    <p class="highcharts-description">

                    </p>
                </figure>



                <article class="statics-table">

                    <script type="text/javascript">
                        Highcharts.chart('containera', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: 'Alumnos Registrados por Genero'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            accessibility: {
                                point: {
                                    valueSuffix: '%'
                                }
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                    }
                                }
                            },
                            series: [{
                                name: 'Act',
                                colorByPoint: true,
                                data:

                                    [{

                                        name: 'Culturales',
                                        y: <?php echo $countcatactcult ?>,
                                        sliced: true,
                                        selected: true
                                    }, {
                                        name: 'Deportivas',
                                        y: <?php echo $countcatactdep ?>,
                                        sliced: true,
                                        selected: true
                                    }]
                            }]
                        });
                    </script>

                    <!--------------------------- Fin de la Grafica de high Charts-------------------->

            </div>


            <div class="contenido1">
                <h2>Alumnos Registrados en talleres por Carrera</h2>
                <table>
                    <tfoot>
                        <tr>
                            <td colspan="1">Total</td>
                            <?php
                            $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE 1;";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                            }
                            ?>

                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>GASTRONOMIA</td><?php
                                                $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'GT';";
                                                $result = mysqli_query($link, $sql);
                                                while ($mostrar = mysqli_fetch_array($result)) {
                                                ?>

                                <td class="campo-pequeño"><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td>INGENIERIA CIVIL</td><?php
                                                        $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'IC';";
                                                        $result = mysqli_query($link, $sql);
                                                        while ($mostrar = mysqli_fetch_array($result)) {
                                                        ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                        }
                            ?></td>
                        </tr>

                        <tr>
                            <td>INGENIERIA INDUSTRIAL</td><?php
                                                            $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'II';";
                                                            $result = mysqli_query($link, $sql);
                                                            while ($mostrar = mysqli_fetch_array($result)) {
                                                            ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td>INGENIERIA MECATRONICA</td><?php
                                                            $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'IM';";
                                                            $result = mysqli_query($link, $sql);
                                                            while ($mostrar = mysqli_fetch_array($result)) {
                                                            ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td>INGENIERIA EN SISTEMAS COMPUTACIONALES</td><?php
                                                                            $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'ISC';";
                                                                            $result = mysqli_query($link, $sql);
                                                                            while ($mostrar = mysqli_fetch_array($result)) {
                                                                            ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td>LICENCIATURA EN ADMINISTRACION</td><?php
                                                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'LA';";
                                                                    $result = mysqli_query($link, $sql);
                                                                    while ($mostrar = mysqli_fetch_array($result)) {
                                                                    ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                                    }
                            ?></td>
                        </tr>
                        <tr>
                            <td>LICENCIATURA EN BIOLOGIA</td><?php
                                                                $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'LB';";
                                                                $result = mysqli_query($link, $sql);
                                                                while ($mostrar = mysqli_fetch_array($result)) {
                                                                ?>

                                <td><?php echo $mostrar["COUNT('carrera')"] ?></td>
                            <?php
                                                                }
                            ?></td>
                        </tr>
                    </tbody>
                </table>


                <script src="../../code/highcharts.js"></script>
                <script src="../../code/modules/exporting.js"></script>
                <script src="../../code/modules/export-data.js"></script>
                <script src="../../code/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container1"></div>
                    <p class="highcharts-description">
                        Los datos de la grafica son actualizados automaticamente con
                        la informacion que se le proporciona al Sistema de Control de
                        Creditos.
                    </p>
                </figure>



                <script type="text/javascript">
                    Highcharts.chart('container1', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Alumnos Registrados por Carrera'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                            name: 'LA',
                            colorByPoint: true,
                            data: [{
                                name: 'Administracion',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'LA';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>,
                            sliced: true,
                            selected: true
                            }, {
                                name: 'Sistemas',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'ISC';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }, {
                                name: 'Industrial',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'II';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }, {
                                name: 'Civil',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'IC';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }, {
                                name: 'Gastronomia',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'GT';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }, {
                                name: 'Biologia',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'LB';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }, {
                                name: 'Mecatronica',
                                y: <?php
                                    $sql = "SELECT COUNT('carrera') FROM countalumnosentalleres WHERE carrera = 'IM';";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <?php echo $mostrar["COUNT('carrera')"] ?>
                            <?php
                                    }
                            ?>
                            }]
                        }]
                    });
                </script>
            </div>

            <p>&nbsp;</p>
            <div class="contenido1">
                <table>
                    <h2 class="info__titulo">Alumnos Registrados por Actividad</h2>
                    <tfoot>
                        <tr>

                            <td colspan="1">Total</td>
                            <?php
                            $sql = "select count('nombreactividad')
                            from alumnosencadaact;";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>

                                <td><?php echo $mostrar["count('nombreactividad')"] ?></td>
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "select nombreactividad, categoriaactividad, count('nombreactividad')
                            from alumnosencadaact
                            group by nombreactividad
                            having count('nombreactividad')>0;";
                        $result = mysqli_query($link, $sql);
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>

                            <tr>
                                <td><?php echo $nomact =  $mostrar["nombreactividad"] ?></td>
                                <td><?php echo $cnomact = $mostrar["count('nombreactividad')"] ?></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <script src="../../code/highcharts.js"></script>
                <script src="../../code/modules/exporting.js"></script>
                <script src="../../code/modules/export-data.js"></script>
                <script src="../../code/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="containerara"></div>
                    <p class="highcharts-description">
                        Los datos de la grafica son actualizados automaticamente con
                        la informacion que se le proporciona al Sistema de Control de
                        Creditos.
                    </p>
                </figure>
                <script type="text/javascript">
                    // Radialize the colors
                    Highcharts.setOptions({
                        colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                            return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        })
                    });

                    // Build the chart
                    Highcharts.chart('containerara', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: 'Browser market shares in January, 2018'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    connectorColor: 'silver'
                                }
                            }
                        },
                        series: [{
                            name: 'Share',
                            data: [{

name: 'BAILE REGIONAL',
y: <?php echo 1 ?>,
sliced: true,
selected: true
},{

name: 'DRAGON FIGHT	',
y: <?php echo 3 ?>,
sliced: true,
selected: true
},{

name: 'GUITARRA	',
y: <?php echo 2?>,
sliced: true,
selected: true
},{

name: 'LIMA LAMA	',
y: <?php echo 2?>,
sliced: true,
selected: true
},{

name: 'RITMOS	',
y: <?php echo 2?>,
sliced: true,
selected: true
},

                            ]
                        }]
                    });
                </script>

            </div>

        </form>
    </section>

    <p>&nbsp;</p>
    </main>
    <footer class="footer">
        <?php
        $Object = new DateTime();
        $Year = $Object->format("Y");
        ?>
        <p class="copy">&copy; Sistema de Control de Creditos <?php echo  "$Year."; ?> - Todos los derechos Reservados </p>
    </footer>
    <script src=" mostrarocultar.js">
    </script>
    </div>
</body>

</html>