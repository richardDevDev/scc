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




    <main class="main">

        <div>
            <button onclick="ShowHideElement();" id="readactbtn" class="btn-onclick">Buscar Alumno por Matricula</button>
            <button onclick="ShowHideElement1();" id="readactbtn1" class="btn-onclick">Filtrar Alumnos por Carrera</button>
            <button onclick="ShowHideElement2();" id="readactbtn2" class="btn-onclick">Modificar Semestre General</button><br>
            <button onclick="ShowHideElement3();" id="readactbtn3" class="btn-onclick">Añadir Alumno</button>
            <button onclick="ShowHideElement5();" id="readactbtn5" class="btn-onclick">Modificar Alumno</button>
            <button onclick="ShowHideElement6();" id="readactbtn6" class="btn-onclick">Eliminar Alumno</button>
            <form id="readactdiv" method="post" style="display: none;" action="matricula.php">
                <h2>Ingresa Matricula</h2>
                <input type="text" placeholder="Matricula del Alumno" name="matricula">
                <input value="Buscar" type="submit" style="background: darkgreen; color: white; width: 100px;">
            </form>



            <form id="readactdiv1" style="display; none;" action="carrera.php" method="POST">
                <h2>Selecciona Carrera</h2>
                <select name="carrera">
                    <option value="">Selecciona Carrera</option>
                    <?php
                    $idregact = '';
                    $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                    $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                    $sql = "SELECT * FROM carrera WHERE 1";
                    $result = mysqli_query($link, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $mostrar["idcarrera"] ?>"><?php echo $mostrar["nombrecarrera"] ?></option>
                    <?php
                    }
                    ?>
                </select> <input type="submit" value="Seleccionar" type="submit" style="background: darkgreen; color: white; width: 100px;">


            </form>
            <form id="readactdiv2" style="display: none;" action="semestre.php" method="POST">
                <h2>Actualizar Semestre</h2>
                <select name="semestrebef">
                    <option value="">Semestre Actual</option>
                    <option value="1">1°</option>
                    <option value="2">2°</option>
                    <option value="3">3°</option>
                    <option value="4">4°</option>
                    <option value="5">5°</option>
                    <option value="6">6°</option>
                    <option value="7">7°</option>
                    <option value="8">8°</option>
                    <option value="9">9°</option>
                    <option value="10">10°</option>
                    <option value="11">11°</option>
                    <option value="12">12°</option>
                </select>
                <select name="semestreaft">
                    <option value="">Nuevo Semestre</option>
                    <option value="1">1°</option>
                    <option value="2">2°</option>
                    <option value="3">3°</option>
                    <option value="4">4°</option>
                    <option value="5">5°</option>
                    <option value="6">6°</option>
                    <option value="7">7°</option>
                    <option value="8">8°</option>
                    <option value="9">9°</option>
                    <option value="10">10°</option>
                    <option value="11">11°</option>
                    <option value="12">12°</option>
                </select> <input type="submit" value="Actualizar" type="submit" style="background: darkgreen; color: white; width: 100px;">


            </form>
            <form id="readactdiv3" method="post" style="display: none;" action="add.php">
                <h2>Añadir Alumno</h2>
                <div id="productos">
                    <P>Ingresa los Datos del Alumno</P>
                    <input type="number" name="matricula" placeholder="MATRICULA" size="40" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <input type="text" name="namealumno" placeholder="NOMBRE DEL ALUMNO" min="0" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <select name="sexo" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">SEXO</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                    <p></p>
                    <select name="carrera" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">CARRERA</option>
                        <?php
                        $idregact = '';
                        $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                        $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                        $sql = "SELECT * FROM carrera WHERE 1";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["idcarrera"] ?>"><?php echo $mostrar["nombrecarrera"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select name="semestre" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">SEMESTRE</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                        <option value="7">7°</option>
                        <option value="8">8°</option>
                        <option value="9">9°</option>
                        <option value="10">10°</option>
                        <option value="11">11°</option>
                        <option value="12">12°</option>
                    </select>

                    <input type="submit" value="Registrar" style="background: darkgreen; color: white; width: 72px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <input type="reset" value="Borrar" style="background: darkgreen; color: white; width: 72px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">

                </div>
            </form>
            <form id="readactdiv5" method="post" style="display: none;" action="update.php">
                <h2>Modificar Alumno</h2>
                <div id="productos">
                    <P>Ingresa los Datos del Alumno</P>
                    <input type="number" name="matricula" placeholder="MATRICULA" size="40" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <input type="text" name="namealumno" placeholder="NOMBRE DEL ALUMNO" min="0" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <select name="sexo" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">SEXO</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                    <p></p>
                    <select name="carrera" style="width: 300px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">CARRERA</option>
                        <?php
                        $idregact = '';
                        $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                        $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                        $sql = "SELECT * FROM carrera WHERE 1";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["idcarrera"] ?>"><?php echo $mostrar["nombrecarrera"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select name="semestre" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                        <option value="">SEMESTRE</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <option value="4">4°</option>
                        <option value="5">5°</option>
                        <option value="6">6°</option>
                        <option value="7">7°</option>
                        <option value="8">8°</option>
                        <option value="9">9°</option>
                        <option value="10">10°</option>
                        <option value="11">11°</option>
                        <option value="12">12°</option>
                    </select>

                    <input type="submit" value="Modificar" style="background: darkgreen; color: white; width: 72px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
                    <input type="reset" value="Borrar" style="background: darkgreen; color: white; width: 72px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">

                </div>
            </form>
            <form id="readactdiv6" method="post" style="display: none;" action="delete.php">
                <h2>Eliminar Alumno</h2>
                <input type="text" placeholder="Matricula del Alumno" name="matricula" style="width: 150px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">

                <input value="Eliminar" type="submit" style="background: darkgreen; color: white; width: 100px; height: 30px; margin-left: auto; margin-right: auto; font-size: 15px;">
            </form>

            <h1>Alumnos Registrados</h1>
                <div class="contenid">
                    <br>
                    <table class="big-table">
                        <thead>
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
                                $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                                $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                                $sql = "SELECT * FROM alumno 
                            INNER JOIN carrera WHERE idcarrera = carrera ORDER BY `alumno`.`matricula` DESC";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["matricula"] ?></td>
                                <td><?php echo $mostrar["nombrealumno"] ?></td>
                                <td><?php echo $mostrar["sexo"] ?></td>
                                <td><?php echo $mostrar["nombrecarrera"] ?></td>
                                <td><?php echo $mostrar["semestre"] ?></td>
                            </tr>
                        <?php
                                }
                        ?>

                        </tbody>
                    </table>
                    <br>
                </div>
        </div>


    </main>
    <footer class="footer">
        <?php
        $Object = new DateTime();
        $Year = $Object->format("Y");
        ?>
        <p class="copy">&copy; Sistema de Control de Creditos <?php echo  "$Year."; ?> - Todos los derechos Reservados </p>
    </footer>
    <script src="menu.js">
    </script>
    <script src=" mostrarocultar.js">
    </script>
</body>

</html>