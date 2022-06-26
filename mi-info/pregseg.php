<?php
include $_SERVER['DOCUMENT_ROOT'] . "/scc/conexion.php";

session_start();
if (!isset($_SESSION['rol'])) {
    header('location: /scc/index.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: /scc/index.php');
    }
    $user = $_SESSION['intento'];
}
?><?php
//obtenemos los valores del formulario

$pregseg = $_POST['pregseg'];
$resp = $_POST['resp'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "UPDATE usuarios SET preguntaseguridad='$pregseg', respseg='$resp' WHERE username='$user'") or die("<h2>error de envio</h2>");
echo'
		<script>
            alert("Se ha Modificado con Exito");
            location.href="index.php";
            </script>
	'
/*----------------------------------------------Tabla Productos y Servicios----------------------------------------------*/
        ?>
