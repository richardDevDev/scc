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
            <div>
                <button onclick="ShowHideElement();" id="readactbtn" class="btn-onclick">Agregar Responsable</button>
                <button onclick="ShowHideElement1();" id="readactbtn1" class="btn-onclick">Eliminar Responsable</button>
                <button onclick="ShowHideElement2();" id="readactbtn2" class="btn-onclick">Modificar Responsable</button>
                <form id="readactdiv" method="post" style="display: none;" action="add.php">
                    <h2>Agregar Nuevo Responsable</h2>
                    <input type="text" placeholder="Nombre del Responsable" name="name">
                    <input type="text" placeholder="Cargo del Responsable" name="cargo">
                    <input type="submit" value="Registrar">
                </form>



                <form id="readactdiv1" style="display: none;" action="delete.php" method="POST">
                    <p>&nbsp;</p>
                    <h2>Eliminar Responsable</h2>
                    <select name="delperiodo" style="width: 300px; height: 30px; font-size: 15px">
                        <option value="">Selecciona Responsable a Eliminar</option>
                        <?php
                        $idregact = '';
                        $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                        $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                        $sql = "SELECT * FROM responsables WHERE 1";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["nombreresp"] ?>"><?php echo $mostrar["nombreresp"] ?></option>
                        <?php
                        }
                        ?>
                    </select> <input type="submit" value="Eliminar" name="registrar" type="submit" style="background: darkgreen; color: white; width: 100px; height: 30px; font-size: 15px">


                </form>
                <form id="readactdiv2" style="display: none;" action="update.php" method="POST">
                    <p>&nbsp;</p>
                    <h2>Modificar Responsable</h2>
                    <select name="delperiodo" style="width: 300px; height: 30px; font-size: 15px">
                        <option value="">Selecciona Responsable a Modificar</option>
                        <?php
                        $idregact = '';
                        $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                        $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                        $sql = "SELECT * FROM responsables WHERE 1";
                        $result = mysqli_query($link, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $mostrar["user"] ?>"><?php echo $mostrar["nombreresp"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="text" placeholder="Ingresa Nuevo Nombre" name="name" style="width: 300px; height: 30px; font-size: 15px">
                    <input type="text" placeholder="Ingresa Nuevo Cargo" name="name" style="width: 200px; height: 30px; font-size: 15px">

                    <input style="background: darkgreen; color: white; width: 150px; height: 30px; font-size: 15px" type="submit" value="Modificar" type="submit">
                </form>

                <h1>Responsables</h1>

                <div class="contenid">
                    <br>
                    <table class="big-table">
                        <thead>
                            <tr>
                                <th style="width: 300px;">Usuario</th>
                                <th style="width: 400px;">Nombre del Responsable</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                                $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                                $sql = "SELECT * FROM responsables 
                            inner join usuarios where usuarios.iduser = responsables.iduser";
                                $result = mysqli_query($link, $sql);
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>

                            <tr>
                                <td><?php echo $mostrar["username"] ?></td>
                                <td><?php echo $mostrar["nombreresponsable"] ?></td>
                                <td><?php echo $mostrar["cargo"] ?></td>
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
        <script src=" menu.js">
        </script>
        <script src=" mostrarocultar.js">
        </script>
    </div>
</body>

</html>