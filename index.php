<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <title>Iniciar Sesion</title>
  <link rel="stylesheet" href="/scc/login.css">
  <link rel="shortcut icon" href="/img/imagen.ico" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background: linear-gradient(45deg, green 50%, white 50%, darkblue 50%);">
  <p class="texto">Desarrollado por Alumnos del Tecnologico de Estudios Superiores de Huixquilucan, Estado de México, México.</p>
  <div class="login-box">
    <img class="img__fondo" src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" alt="">
    <img class="img__fondo1" src="img/mascotatesh.svg" alt="">

    <img src="img/tesh.png" class="avatar" alt="Logo Tesh">
    <h1> SISTEMA DE CONTROL DE CREDITOS </h1>
    <form class="contenedor" action="" method="post">
      <p>Iniciar Sesion</p>
      <!-- USERNAME INPUT -->
      <label id="username"></label>
      <input type=text name="username" id="username" placeholder="Ingresa tu Usuario" required>
      <label id="password"></label>
      <input type=password name=password id="password" placeholder="Ingresa tu Contraseña" required>
      <br>
      <br>
      <input type="submit" value="Iniciar sesion">
      <p><a class="olvidosupass" href="/scc/olvide-mi-contraseña/">Olvide mi contraseña</a></p>


    </form>
</body>
</html>

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
        header('location: /scc/actividades/todas/');
        break;
      case 2:
        header('location: /scc/estudiantes/');
        break;
      default:
    }
  }

  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $GLOBALS['matricula'] = "username";
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
          header('location: /scc/actividades/todas/');
          break;
        case 2:
          header('location: /scc/estudiantes/ ');
          break;
        default:
      }
    } else {
      //no existe el user
      echo "El usuario o contraseña son incorrectos";
    }
  }
  ?>

  <?php
  if (isset($_POST['username'])) {
    session_start();
    ob_start();
    $_SESSION['intento'] = $_POST['username'];
  }

  ?></p>