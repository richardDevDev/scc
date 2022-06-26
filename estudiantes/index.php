<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scc/conexion.php";

session_start();
if (!isset($_SESSION['rol'])) {
    header('location: /scc/index.php');
} else {
    if ($_SESSION['rol'] != 2) {
        header('location: /scc/index.php');
    }
    $user = $_SESSION['intento'];
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <link rel="icon" href="img/icon.png">
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
                        <lo class="menu__item"><a class="menu__link select" href="/scc/estudiantes/">Inicio</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/talleres/">Talleres de Actividades</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="/scc/registrar/alumnosentalleres/">Registrarme en un Taller</a></lo>
                        <lo class="menu__item"><a class="btn btn-secondary dropdown-toggle menu__link select" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/scc/estudiantes/mi-info.php">Informacion Personal</a>
                                <a class="dropdown-item" href="/scc/estudiantes/cambiar-contraseña.php">Cambiar Contraseña</a>
                                <a class="dropdown-item" href="/scc/index.php?cerrar_sesion=1">Salir</a>
                            </div>
                        </lo>
                    </ul>
                </nav>
            </div>
        </header>



        <main class="main">

            <h1>Informacion General</h1>
            <div class="contenid">
<br>
                <form>
                    <table class="big-table">
                        <thead style="color: white; background: green;">
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre Alumno</th>
                                <th>Sexo</th>
                                <th>Carrera</th>
                                <th>Semestre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $matricula = $user;
                                $sql = "SELECT * FROM alumno WHERE matricula = '$matricula'";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["matricula"] ?></td>
                                <td><?php echo $mostrar["nombrealumno"] ?></td>
                                <td><?php echo $mostrar["sexo"] ?></td>
                                <td><?php echo $mostrar["carrera"] ?></td>
                                <td><?php echo $mostrar["semestre"] ?></td>
                            </tr>
                        <?php
                                }
                        ?>
                        </tbody>
                    </table>
                </form>
                <br>
            </div>

            <h1>Actividades Registradas</h1>
            <div class="contenid">
            <br>
            <form>
                    <table class="big-table">
                        <thead style="color: white; background: green;">
                            <tr>
                                <th>No. de Control</th>
                                <th>Actividad</th>
                                <th>Categoria</th>
                                <th>Finalizo Actividad</th>
                                <th>Periodo de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                                $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                                $sql = "SELECT * FROM alumnosentaller WHERE matriculaalumno = '$user'";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["idregistroactividad"] ?></td>
                                <td><?php echo $mostrar["nombreactividad"] ?></td>
                                <td><?php echo $mostrar["categoriaactividad"] ?></td>
                                <td><?php echo $mostrar["finalizoact"] ?></td>
                                <td><?php echo $mostrar["periodo"] ?></td>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
                <br>
            </div>
            <h1>Creditos</h1>
            <div class="contenid">
                <br>
                <form>
                    <table class="big-table">
                        <thead style="color: white; background: green;">
                            <tr>
                                <th>No. de Control</th>
                                <th>Actividad</th>
                                <th>Categoria</th>
                                <th>Finalizo Actividad</th>
                                <th>Periodo de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $matricula = $user;
                                $sql = "SELECT * FROM creditosescolares WHERE matriculaalumno = '$user'";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["idregistroactividad"] ?></td>
                                <td><?php echo $mostrar["nombreactividad"] ?></td>
                                <td><?php echo $mostrar["categoriaactividad"] ?></td>
                                <td><?php echo $mostrar["finalizoact"] ?></td>
                                <td><?php echo $mostrar["periodo"] ?></td>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
                <br>
            </div>


            <section class="info">

            </section>
            <p>&nbsp;</p>
        </main>
        <footer class="footer" style="background: darkgreen; color: white">
            <p class="copy" style="background: darkgreen; color: white">&copy; Sistema de Control de Creditos 2020 - Todos los derechos Reservados </p>
        </footer>
        <script src=" menu.js">
        </script>
        <script src=" mostrarocultar.js">
        </script>
    </div>
</body>

</html>