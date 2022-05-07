<?php
$tabla ="pedidos";
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$fecha = $_POST['fecha'];
	$total = $precio * $cantidad;
	echo $precio;
	$query = "update $tabla set cantidad=$cantidad, valor_unidad=$precio, fecha='$fecha', valor_total=$total where id=$id";
	include ('../clases/coneccion.php');
	$con = new Conexion();
	$respuesta=$con->sentencia_sql($query);
}
?>
