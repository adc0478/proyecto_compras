<?php 
$tabla = "pedidos";
if (isset ($_GET['id']) and $_GET['id']>0){
  $id = $_GET['id']; 
  $query ="delete  from $tabla where id=$id";
  include ('../clases/coneccion.php');
  $con = new Conexion();
  $respuesta = $con->sentencia_sql($query);
}
  header("Location:/compras/index.php?destino=".$_GET['origen']);
?>
