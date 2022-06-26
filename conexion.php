<?php
$link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
?>