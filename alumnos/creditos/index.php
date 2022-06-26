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
                                <a class="dropdown-item" href="/scc/mi-info/">Informacion Personal</a>
                                <a class="dropdown-item" href="/scc/cambiar-contraseña">Cambiar Contraseña</a>
                                <a class="dropdown-item" href="/scc/index.php?cerrar_sesion=1">Salir</a>
                            </div>
                        </lo>
                    </ul>
                </nav>
            </div>
        </header>




        <main class="main">
            <div class="" style="background: darkgreen;">


            </div>

            <div>
                <button onclick="ShowHideElement1();" width="400px" id="readactbtn1" class="btn-onclick">Imprimir Constancia de cumplimiento individual</button>
                <button onclick="ShowHideElement2();" id="readactbtn2" class="btn-onclick">Imprimir Varias Constancias de cumplimiento</button>
                <form id="readactdiv" method="post" style="display: none;">
                    <h2>Ingresa Matricula</h2>
                    <input type="text" placeholder="Matricula del Alumno" name="matricula">
                    <input value="Buscar" name="matricula" type="submit" style="background: darkgreen; color: white; width: 100px;">
                </form>



                <form id="readactdiv1" style="display: none;" action="/scc/constancia-de-creditos/" method="POST">
                    <h2>Selecciona la clave de la constancia</h2>
                    <select name="clave">
                        <option value="">Clave</option>
                        <?php
                        $sql = "SELECT * FROM `registroactividad` WHERE finalizoact = '1' ORDER BY `registroactividad`.`idregistroactividad` DESC
                ";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["idregistroactividad"] ?>"><?php echo $mostrar["idregistroactividad"] ?></option>
                        <?php
                        }
                        ?>
                    </select> <input type="submit" value="Imprimir" name="registrar" type="submit" style="background: darkgreen; color: white; width: 100px;">


                </form>
                <form id="readactdiv2" style="display: none;" action="add.php" method="POST">
                    <h2>Selecciona una o mas claves de las constancias</h2>
                    <?php
                    $idregact = '';
                    $sql = "SELECT * FROM `registroactividad` ORDER BY `registroactividad`.`idregistroactividad` DESC
                ";
                    $result = mysqli_query($link, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>

                        <input type="checkbox" id="<?php echo $mostrar["idregistroactividad"] ?>" value="<?php echo $mostrar["idregistroactividad"] ?>"> <label for="<?php echo $mostrar["idregistroactividad"] ?>"><?php echo $mostrar["idregistroactividad"] ?></label>

                        <option value="<?php echo $mostrar["idregistroactividad"] ?>"></option>
                    <?php
                    }
                    ?>
                    <input type="submit" value="Filtrar" name="registrar" type="submit" style="background: darkgreen; color: white; width: 100px;">


                </form>
                <form id="readactdiv3" method="post" style="display: none;" action="">
                    <h2>Añadir Alumno</h2>
                    <div id="productos">
                        <caption>Ingresa los Datos del Alumno</caption>
                        <p>Matricula: <input type="number" name="nact" placeholder="Ejemplo: 17090000" size="40" style="width: 500px; margin-left: auto; margin-right: auto;"></p>
                        <p>Nombre del Alumno: <input type="text" name="cact" placeholder="Ejemplo: LOPEZ BAUTISTA LUIS DANIEL" min="0" style="width: 425px; margin-left: auto; margin-right: auto;"></p>
                        <p>Sexo: <input type="text" name="cact" placeholder="Ejemplo: F" min="0" style="width: 535px; margin-left: auto; margin-right: auto;"></p>
                        <p>Carrera: <input type="text" name="cact" placeholder="Ejemplo: ISC" min="0" style="width: 515px; margin-left: auto; margin-right: auto;"></p>
                        <p>Semestre: <input type="text" name="cact" placeholder="Ejemplo: 6" min="0" style="width: 500px; margin-left: auto; margin-right: auto;"></p>

                        <p>
                            <input type="submit" value="Enviar">
                            <input type="reset" value="Borrar">
                        </p>
                    </div>
                </form>
                <form id="readactdiv5" method="post" style="display: none;">
                    <h2>Modificar Alumno</h2>
                    <div id="productos">
                        <caption>Ingresa los Datos del Alumno</caption>
                        <p>Matricula: <input type="number" name="nact" placeholder="Ejemplo: 17090000" size="40" style="width: 500px; margin-left: auto; margin-right: auto;"></p>
                        <p>Nombre del Alumno: <input type="text" name="cact" placeholder="Ejemplo: LOPEZ BAUTISTA LUIS DANIEL" min="0" style="width: 425px; margin-left: auto; margin-right: auto;"></p>
                        <p>Sexo: <input type="text" name="cact" placeholder="Ejemplo: F" min="0" style="width: 535px; margin-left: auto; margin-right: auto;"></p>
                        <p>Carrera: <input type="text" name="cact" placeholder="Ejemplo: ISC" min="0" style="width: 515px; margin-left: auto; margin-right: auto;"></p>
                        <p>Semestre: <input type="text" name="cact" placeholder="Ejemplo: 6" min="0" style="width: 500px; margin-left: auto; margin-right: auto;"></p>

                        <p>
                            <input type="submit" value="Enviar">
                            <input type="reset" value="Borrar">
                        </p>
                    </div>
                </form>
                <form id="readactdiv6" method="post" style="display: none;">
                    <h2>Eliminar Alumno</h2>
                    <input type="text" placeholder="Matricula del Alumno" name="matricula">

                    <input value="Eliminar" name="matricula" type="submit" style="background: darkgreen; color: white; width: 100px;">
                </form>


                <h1> Información de Alumnos con Creditos</h1>

                    <div class="contenid">
                        <br>
                        <table id="big-table" class="big-table">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Matricula</th>
                                    <th style="width: 350px;">Nombre del Alumno</th>
                                    <th>Periodo</th>
                                    <th>Carrera</th>
                                    <th style="width: 250px;">Actividad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `alumcred` 
                            INNER JOIN actividades WHERE idactividadr = idactividad ";
                                    $result = mysqli_query($link, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                <tr>
                                    <td>
                                    <a class="btn btn-secondary dropdown-toggle menu__link select" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                     <a class="dropdown-item" href="/scc/mi-info/">Informacion Personal</a>
                                     <a class="dropdown-item" href="/scc/cambiar-contraseña">Cambiar Contraseña</a>
                                     <a class="dropdown-item" href="/scc/index.php?cerrar_sesion=1">Salir</a>
                                     </div>
                                    
                                    
                                    <a href=""><?php echo $mostrar["idregistroactividad"] ?></a>
                                    </td>
                                    <td><?php echo $mostrar["matricula"] ?></td>
                                    <td><?php echo $mostrar["nombrealumno"] ?></td>
                                    <td><?php echo $mostrar["periodo"] ?></td>
                                    <td><?php echo $mostrar["carrera"] ?></td>
                                    <td><?php echo $mostrar["nombreactividad"] ?></td>
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
        <footer class="footer" style="background: darkgreen; color: white">
            <p class="copy" style="background: darkgreen; color: white">&copy; Sistema de Control de Creditos 2021 - Todos los derechos Reservados </p>
        </footer>
        <script src=" menu.js">
        </script>
        <script src=" mostrarocultar.js">
        </script>
    </div>
</body>

</html>