<?php
	//conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");;
	$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");

/*----------------------------------------------agregar producto----------------------------------------------*/	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
//obtenemos los valores del formulario
$matricula = $_POST['matricula'];
$nombre = $_POST['namealumno'];
$sexo = $_POST['sexo'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "INSERT INTO `alumno` (`matricula`, `nombrealumno`, `sexo`, `carrera`, `semestre`) VALUES ('$matricula', '$nombre', '$sexo', '$carrera', '$semestre');") or die("<h2>error de envio</h2>");
echo'
		<script>
			alert("Registro Exitoso");
			location.href="index.php";
		</script>
	'
/*----------------------------------------------Tabla Productos y Servicios----------------------------------------------*/
        ?>
