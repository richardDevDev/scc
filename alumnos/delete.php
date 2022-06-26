<?php
$usuario = 'root';
$contraseña = '';
$host = 'localhost';
$base = 'cce';

$con=mysqli_connect($host, $usuario, $contraseña) or die("problemas de conexion");
mysqli_select_db($con,"cce") or die("problemas en bd");
$reg = mysqli_query($con, "SELECT * FROM alumno WHERE matricula = '$_POST[matricula]'");
if ($re=mysqli_fetch_array($reg)) {
    mysqli_query($con, "DELETE FROM alumno WHERE matricula = '$_POST[matricula]'");
    echo '<script>
			alert("Datos Eliminados");
			location.href="index.php";
		</script>';
}else {
    echo '<script>
    alert("Datos No Eliminados");
    location.href="index.php";
    </script>';
}
?>