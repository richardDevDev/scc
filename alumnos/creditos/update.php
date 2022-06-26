<?php
	//conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");;
	$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");

/*----------------------------------------------agregar producto----------------------------------------------*/	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
//obtenemos los valores del formulario
$nombreproducto = $_POST['nmod'];
$cantidadproducto = $_POST['cmod'];
$idproducto = $_POST['idmod'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "UPDATE actividades SET nombreactividad='$nombreproducto',categoriaactividad='$cantidadproducto' WHERE idactividad='$idproducto'") or die("<h2>error de envio</h2>");
echo'
		<script>
			alert("Se ha Modificado con Exito");
			location.href="index.php";
		</script>
	'
?>