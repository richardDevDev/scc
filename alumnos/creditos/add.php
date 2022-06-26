<?php
	//conexion con la base de datos y el servidor
	$link = mysqli_connect("localhost","root","") or die("<h2>No se encuentra el servidor</h2>");;
	$db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");

/*----------------------------------------------agregar producto----------------------------------------------*/	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
//obtenemos los valores del formulario
$nombreproducto = $_POST['nact'];
$cantidadproducto = $_POST['cact'];
//ingresamos la informacion a la base de datos
mysqli_query($link, "INSERT INTO actividades VALUES('','$nombreproducto','$cantidadproducto')") or die("<h2>error de envio</h2>");
echo'
		<script>
			alert("Registro Exitoso");
			location.href="index.php";
		</script>
	'
/*----------------------------------------------Tabla Productos y Servicios----------------------------------------------*/
        ?>
