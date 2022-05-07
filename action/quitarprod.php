<?php 
$tabla="productos";
if (isset($_GET['codigo'])){
  include ('../clases/coneccion.php');
  $con = new Conexion();
  $cod = $_GET['codigo'];
  $query = "delete from $tabla where cod_prod=$cod";
  $con->sentencia_sql($query);
}
header ("Location:/compras/index.php?destino=nuevoproducto");
?>
