<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scc/conexion.php";
?>
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
    <img class="img__fondo1" src="/scc/img/mascotatesh.svg" alt="">

    <img src="/scc/img/tesh.png" class="avatar" alt="Logo Tesh">
    <h1> SISTEMA DE CONTROL DE CREDITOS </h1>
    <form class="" action="" method="post">
      <p>Registrarse</p>
      <!-- USERNAME INPUT -->
      <label id="username"></label>
      <input type=text name="username" id="matricula" placeholder="Ingresa tu Matricula" required>
      <label id="password"></label>
      <input type=password name="password" id="password" placeholder="Ingresa tu Contraseña" minlength="8" required>
      <label id="password1"></label>
      <input type=password name="password1" id="password1" placeholder="Repite tu Contraseña" minlength="8" required>
      <label id="password1"></label>
      <select type=password class="select-registro" name="selectad" id="selectad" placeholder="Repite tu Contraseña" required>
        <option value="Alumno">Alumno</option>
        <option value="Docente">Docente</option>
      </select>
      <br>
      <br>
      <input type="submit" value="Registrarse">
      <p><a class="olvidosupass" href="/scc/olvide-mi-contraseña/">Olvide mi contraseña</a></p>
    </form>
</body>

</html>


<?php

if (isset($_POST['username'])) {
  $mat = $_POST['username'];
  $result = mysqli_query($link, "SELECT * FROM alumno 
INNER JOIN usuarios WHERE matricula = username AND matricula = '$mat';");
  while ($mostrar = mysqli_fetch_array($result)) {
?>
    <?php
    $cnueva = $_POST['password'];
    $crnueva = $_POST['password1'];

    if ($mat != $mostrar["matricula"]) {
      echo "La contraseña Actual es incorrecta";
    ?>
    <?php
    } else {
      if ($cnueva != $crnueva) {
        echo " Las 2 contraseñas no coinciden";
      } else {
        if ($mat != $mostrar["username"]) {
          echo "opcion a";
        } else {
          echo "opcion b";
        }
        echo '
        <script>
			  alert("Ya te encuentras Registrado");
			  location.href="index.php";
		    </script>
        ';
        #$result1 = mysqli_query($link, "UPDATE usuarios SET password = '$cnueva' WHERE username = '$user';");
      }
    ?>
  <?php }
  }
  ?>

<?php
}
?>