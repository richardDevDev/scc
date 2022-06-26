<?php
	//conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");;
	$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");

/*----------------------------------------------agregar producto----------------------------------------------*/	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
//obtenemos los valores del formulario
$new = $_POST['newper'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "UPDATE `periodo` SET `periodoActual`='0' WHERE periodoActual = '1';") or die("<h2>error de envio</h2>");
mysqli_query($link, "UPDATE `periodo` SET `periodoActual`='1' WHERE añoperiodo = '$new';") or die("<h2>error de envio</h2>");
echo'
		<script>
			alert("Se ha Modificado con Exito");
			location.href="index.php";
		</script>
	'
?>