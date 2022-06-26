<?php
$usuario = 'root';
$contraseña = '';
$host = 'localhost';
$base = 'cce';

$con=mysqli_connect($host, $usuario, $contraseña) or die("problemas de conexion");
mysqli_select_db($con,"cce") or die("problemas en bd");
$reg = mysqli_query($con, "SELECT idactividad FROM actividades WHERE idactividad = '$_POST[id]'");
if ($re=mysqli_fetch_array($reg)) {
    mysqli_query($con, "DELETE FROM actividades WHERE idactividad = '$_POST[id]'");
    echo'
		<script>
			alert("Se ha eliminado Correctamente");
			location.href="/scc/actividades/todas/";
		</script>
	';
}else {
    echo "datos no eliminados";
}
?>