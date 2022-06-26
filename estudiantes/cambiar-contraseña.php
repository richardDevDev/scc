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
        <main>
            <h1>Cambiar Contraseña</h1>
            <div class="contenid">
                <br><b>
                    <label>
                        <?php
                        $result = mysqli_query($link, "SELECT * FROM usuarios WHERE username = '$user'");
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <?php echo $mostrar["username"] . " | " . $mostrar["nombreuser"] ?>
                        <?php
                        }
                        ?>
                        <form action="index.php" method="POST">

                    </label></b><br><br>
                <label id="cactual"></label>
                Ingresa la contraseña Actual: <input type="password" name="cactual" id="cactual" placeholder="Ingresa la contraseña Actual" required><br><br>
                <label id="cnueva"></label>
                Ingresa la Nueva Contraseña: <input type="password" name="cnueva" id="crnueva" placeholder="Ingresa la Nueva Contraseña" minlength="8" required><br><br>
                <label id="crnueva"></label>
                Repite la Nueva Contraseña: <input type="password" name="crnueva" id="crnueva" placeholder="Repite la Nueva Contraseña" minlength="8" required><br><br><br>
                <input type="submit" value="Cambiar Contraseña">
                </form>

                <br> <br>
                <?php
                $result = mysqli_query($link, "SELECT * FROM usuarios WHERE username = '$user'");
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>

                    <?php
                    if (isset($_POST['cactual'])) {

                        $cactual = $_POST['cactual'];
                        $cnueva = $_POST['cnueva'];
                        $crnueva = $_POST['crnueva'];

                        if ($cactual != $mostrar["password"]) {
                            echo "La contraseña Actual es incorrecta";

                    ?>
                        <?php
                        } else {
                            if ($cnueva != $crnueva) {
                                echo "La contraseña nueva no coincide";
                            }else{
                                $result1 = mysqli_query($link, "UPDATE usuarios SET password = '$cnueva' WHERE username = '$user';");
                            }                         
                        ?>
                    <?php }
                    }
                    ?>

                <?php
                }
                ?>
                <br> <br>
                <br> <br>
                
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
    <script src="mostrarocultar.js">
    </script>
</body>

</html>