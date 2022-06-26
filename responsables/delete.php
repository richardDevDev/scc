<?php
$usuario = 'root';
$contraseña = '';
$host = 'localhost';
$base = 'cce';

$con=mysqli_connect($host, $usuario, $contraseña) or die("problemas de conexion");
mysqli_select_db($con,"cce") or die("problemas en bd");
$reg = mysqli_query($con, "SELECT * FROM responsables WHERE user = '$_POST[delperiodo]'");
if ($re=mysqli_fetch_array($reg)) {
    mysqli_query($con, "DELETE FROM responsables WHERE user = '$_POST[delperiodo]'");
    
}else {
    echo '
    <script>
        alert("Datos No Eliminados");
        location.href="index.php";
    </script>
';
}
?>