<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scc/conexion.php";

    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: /scc/index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: /scc/index.php');
        }
        $user = $_SESSION['intento'];

    }
?><!DOCTYPE html>
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




    </div>
    <main class="main">

        <div>
            <button onclick="ShowHideElement();" id="readactbtn" class="btn-onclick">Agregar Periodos</button>
            <button onclick="ShowHideElement1();" id="readactbtn1" class="btn-onclick">Eliminar Periodos</button>
            <button onclick="ShowHideElement2();" id="readactbtn2" class="btn-onclick">Modificar Periodos</button>
            <button onclick="ShowHideElement3();" id="readactbtn3" class="btn-onclick">Cambiar el Periodo Actual</button>
            <form id="readactdiv" method="post">
                <p>&nbsp;</p>
                <h2>Ingresa Nuevo Periodo</h2>
                <input type="text" placeholder="Periodo" name="matricula">
                <input type="submit" value="Registrar">
            </form>



            <form id="readactdiv1" style="display: none;" action="delete.php" method="POST">
                <p>&nbsp;</p>
                <h2>Ingresa Periodo a Eliminar</h2>
                <select name="delperiodo">
                    <option value="">Selecciona Periodo a Eliminar</option>
                    <?php
                    $idregact = '';
                    $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                    $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                    $sql = "SELECT * FROM periodo WHERE 1";
                    $result = mysqli_query($link, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $mostrar["añoperiodo"] ?>"><?php echo $mostrar["añoperiodo"] ?></option>
                    <?php
                    }
                    ?>
                </select> <input type="submit" value="Eliminar" name="registrar" type="submit">


            </form>
            <form id="readactdiv2" style="display: none;" action="update.php" method="POST">
                <p>&nbsp;</p>
                <h2>Modificar Periodo</h2>
                <input type="text" placeholder="Ingresa Nuevo Valor" name="modperiodoaft">
                <select name="modperiodobef">
                    <option value="">Selecciona valor a modificar</option>
                    <?php
                    $idregact = '';
                    $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                    $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                    $sql = "SELECT * FROM periodo WHERE 1";
                    $result = mysqli_query($link, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $mostrar["añoperiodo"] ?>"><?php echo $mostrar["añoperiodo"] ?></option>
                    <?php
                    }
                    ?>
                </select> <input type="submit" value="Modificar" type="submit">


            </form>
            <form id="readactdiv3" style="display: none;" action="periodoactual.php" method="POST">
                <p>&nbsp;</p>
                <h2>Selecciona Nuevo Periodo Actual</h2>
                <select name="newper">
                    <option value="">Selecciona el Periodo Actual</option>
                    <?php
                    $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                    $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                    $sql = "SELECT * FROM periodo ORDER BY añoperiodo DESC";
                    $result = mysqli_query($link, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $mostrar["añoperiodo"] ?>"><?php echo $mostrar["añoperiodo"] ?></option>
                    <?php
                    }
                    ?>
                </select> <input type="submit" value="Modificar" type="submit">


            </form>


            <form id="">
                <h1>Periodos Registrados</h1>
                <div class="contenid">

                    <table class="big-table">
                        <p>&nbsp;</p>
                        <thead>
                            <tr>
                                <th>Periodos</th>
                                <th>Periodo En Curso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                                $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                                $sql = "SELECT * FROM periodo ORDER BY `periodo`.`añoperiodo` DESC";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["añoperiodo"] ?></td>
                                <td><?php $peract = $mostrar["periodoActual"];
                                    if ($peract != 1) {
                                        echo 'No';
                                    } else {
                                        echo 'Si';
                                    }
                                    ?></td>
                            </tr>
                        <?php
                                }
                        ?>

                        </tbody>
                    </table>
            </form>
            <br>
        </div>
        </div>

    </main>
    <footer class="footer">
        <p class="copy">&copy; Sistema de Control de Creditos 2020 - Todos los derechos Reservados </p>
    </footer>
    <script src="menu.js">
    </script>
    <script src=" mostrarocultar.js">
    </script>
    </div>
</body>

</html>