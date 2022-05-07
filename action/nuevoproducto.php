<?php 
$tabla = "productos";
$codigo = $_POST['codigo'];
$detalle = $_POST['detalle'];
$tipo = $_POST['tipo'];
$unidad = $_POST['unidad'];
include ('../clases/coneccion.php');
$con = new Conexion();
$query = "select * from $tabla where detalle='$detalle'";
$respuesta = $con->sentencia_sql($query); 
if (!isset($respuesta[0]['detalle'])){
  $query = "insert into $tabla values (default, '$detalle','$tipo','$unidad')";
  $con->sentencia_sql($query);
}
header ('Location:/compras/index.php?destino=nuevoproducto');
?>
