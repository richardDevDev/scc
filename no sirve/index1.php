
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body background="img/portada.png">
      <header class="header">
        <div class="contenedor">
          <p class="logo"></p>
          <nav class="nav" id="nav">
            <ul class="menu">

            </ul>
          </nav>
        </div>
      </header>
      <div class="banner">
        <img itemprop="image" src="" alt="menu" class="banner__img">
        <div class="contenedor1">
            <h2 itemprop="name" class="banner__titulo"></h2>
            <div class="banner__txt"></div>
        </div>
    </div>
    

      <div class="contenedor"">
        <form class="contenedor" action="" method="post">
          <p>&nbsp;</p>
          <h1 style="font-size: 30px;">SISTEMA DE CONTROL DE CREDITOS</h1>
          <p>
            <?php
            include_once 'database.php';
            session_start();
            if (isset($_GET['cerrar_sesion'])) {
               session_unset();
               session_destroy();
              }
              if (isset($_SESSION['rol'])) {
                  switch ($_SESSION['rol']) {
                    case 1:
                      header('location: inicio.php');
                    break;
                    case 2:
                      header('location: inicio-alumno.php');
                    break;
                    default:
                  }
                }

                if (isset($_POST['username']) && isset($_POST['password'])) {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $GLOBALS['matricula']="username";
                  $db = new DB();
                  $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE username = :username AND password = :password');
                  $query->execute(['username' => $username, 'password' => $password]);
                  $row = $query->fetch(PDO::FETCH_NUM);
                  if ($row == true) {
                        //validar rol
    $rol = $row[3];
  
    $_SESSION['rol'] = $rol;
    switch ($_SESSION['rol']) {
      case 1:
        header('location: inicio.php');
        break;
      case 2:
        header('location: inicio-alumno.php');
        break;
      default:
    }
  } else {
    //no existe el user
    echo "El usuario o contraseña son incorrectos";
  }
}
?>        </p>
          <input type="text" name="username" placeholder="usuario">
          <input type="password" name="password" placeholder="contraseña">
          <p>&nbsp;</p>
          <input type="submit" value="Iniciar sesion">
         </form>
        <img itemprop="image" src="img/tesh.png" alt="menu" class="banner__img">
  

      </div>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </body>

    </html>