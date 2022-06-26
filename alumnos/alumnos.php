<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/icon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Culturales | SCC</title>
    <meta name="description" content="Los accesorios para moto proporcionan la protección principal a los motoristas en caso de que tengas un accidente 
    asi que elige entre los mejores accesorios del año">
    <meta name="keywords" content="cascos para moto, accesorios cascos ls2, cascos integrales, cascos modulares, cascos abiertos, tienda de accesorios para motos, guantes para moto, guantes fox, guantes Alpinestars, mejores guantes para moto , accesorios para moto, accesorios para cascos, motocross">
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="website">
    <meta property="og:title" content="&#x1F3CD;&#xFE0F; Tienda Online de Accesorios Para Motos &#x1F3CD;&#xFE0F;">
    <meta property="og:description" content="Los accesorios para moto proporcionan la protección principal a los motoristas en caso de que tengas un accidente 
    asi que elige entre los mejores accesorios del 2019">
    <link rel="stylesheet" href="style.css">
    <link href="https://file.myfontastic.com/t5tNwfwUapz4yDzK3B6sfe/icons.css" rel="stylesheet">
</head>

<body>
    <!--Código HTML de la política de cookies -->

    <!--La URL incluida es la parte que se ha de modificar -->

    <div class="cookiesms" id="cookie1">
        Esta web utiliza cookies, puedes ver nuestra <a href="https://www.paramoto.website/politica-de.cookies.html">la
            política de
            cookies, aquí</a>
        Si continuas navegando estás aceptándola
        <button onclick="controlcookies()">Aceptar</button>
        <div class="cookies2" onmouseover="document.getElementById('cookie1').style.bottom = '0px';">Política de cookies
            +
        </div>
    </div>
    <script type="text/javascript">
        if (localStorage.controlcookie > 0) {
            document.getElementById('cookie1').style.bottom = '-50px';
        }
    </script>

    <!-- Fin del código de cookies -->
    <div>
        <amp-auto-ads type="adsense" data-ad-client="ca-pub-3364948016060737"></amp-auto-ads>
        <header class="header">
            <div class="contenedor1">
                <p class="logo"></p>
                <span class="icon-menu" id="btn-menu"></span>
                <nav class="nav" id="nav">
                    <ul class="menu">
                        <lo class="menu__item"><a class="menu__link select" href="">Alumnos</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="">Actividades Culturales</a></lo>
                        <lo class="menu__item"><a class="menu__link select" href="">Actividades deportivos</a></lo>
                        <!--
                    <lo class="menu__item"><a class="menu__link select" href="https://www.paramoto.website/accesorios-para-moto.html">Accesorios</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="https://www.paramoto.website/llantas-para-moto.html">Llantas</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="https://www.paramoto.website/remolques-para-moto.html">Remolque</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="https://www.paramoto.website/alforjas-para-moto.html">Alforjas</a></lo> 
                -->
                    </ul>
                </nav>
            </div>

        </header>
        <div class="banner">
            <img itemprop="image" src="img/porta.jpg" alt="menu" class="banner__img">
            <div class="contenedor1">
                <h2 itemprop="name" class="banner__titulo"></h2>
                <div class="banner__txt"></div>
            </div>
        </div>
        <main class="main">
            <div class="" style="background: green; margin-right: auto; margin-left: auto;">
                <ul class="menu">

                   <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/productos.php">Ing. en Sistemas</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/servicios.php">Biologia</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/ticket.php">Administracion</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/agprod.php">Gastronomia</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/agserv.php">Mecatronica</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/agserv.php">Buscar Alumno</a></lo>
                    <lo class="menu__item"><a class="menu__link select" href="http://localhost/scc/agserv.php">Añadir Alumno</a></lo>
      
                    </ul>
                    </div>
                    <section class="info">
            
                    <table style="border:1px white; background: white;" id="alumnos">
      <caption>Alumnos Registrados</caption>
      <thead style="color: white; background: green;">
        <tr>
          <th>Matricula</th>
          <th>Nombre</th>
          <th>Sexo</th>
          <th>Carrera</th>
          <th>Semestre</th>
        </tr>
      </thead>
      <tfoot style="color: black; background: white;">
        <tr>
          <td colspan="1">Total</td>
          
        </tr>
      </tfoot>
      <tbody>
      <?php
                            $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                            $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                            $sql = "SELECT * FROM alumno WHERE 1;";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
    
      <tr><td><?php echo $mostrar["matricula"] ?></td><td><?php echo $mostrar["nombrealumno"] ?></td><td><?php echo $mostrar["sexo"] ?></td><td><?php echo $mostrar["carrera"] ?></td><td><?php echo $mostrar["semestre"] ?></td></tr>
      <?php
                            }
                            ?>  
        </tbody>
    </table>
    </section>
                </main>
        <footer class="footer" style="background: black; color: white">
            <p class="copy" style="background: darkgreen; color: white">&copy; Sistema de Control de Creditos 2020 - Todos los derechos Reservados </p>
        </footer>
        <script src=" menu.js">
        </script>
        <script type="text/JavaScript">
            $("#alumnos").Datatable();

        </script>
    </div>
</body>

</html>