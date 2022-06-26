<?php
	//conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");;
	$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");

/*----------------------------------------------agregar producto----------------------------------------------*/	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
//obtenemos los valores del formulario
$matricula = $_POST['semestrebef'];
$nombre = $_POST['semestreaft'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "UPDATE alumno SET semestre='$nombre' WHERE semestre='$matricula'") or die("<h2>error de envio</h2>");
echo'
		<script>
			alert("Se ha Modificado con Exito");
			location.href="index.php";
		</script>
	'
?> 