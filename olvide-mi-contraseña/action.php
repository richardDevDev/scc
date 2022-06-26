<?php

use LDAP\Result;

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
    <form class="" action="cambiar-contraseña.php" method="post">
      <p>Olvide mi Contraseña</p>
      <!-- USERNAME INPUT -->
      <label id="username"></label>
      <label id="password"></label>
      <p>
        <?php
        $matricula = $_POST['username'];
        echo'
        
        <label for="">Matricula: </label><br>
        <input type="text" name="matricula" value="'.$matricula.'"><br>
        <label for="">Pregunta de seguridad:</label> 
        '; 

        $result = mysqli_query($link, "SELECT * FROM usuarios WHERE username = '$matricula'");
        while ($mostrar = mysqli_fetch_array($result)) {
          ?>

      
          <?php echo $mostrar["preguntaseguridad"] ?>
    
  <?php
          }
  ?>     
      </p>
      <label id="respseg"></label>
      <input type=password name="respseg" id="respseg" placeholder="Respuesta" required>
      <label id="password1"></label>
      <br>
      <br>
      <input type="submit" value="Cambiar Contraseña">
    </form>
</body>

</html>


