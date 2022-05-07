<?php 
$tabla ='pedidos';
$id ="";
if (isset($_POST['cantidad'])){
  $cantidad = $_POST['cantidad'];
  if (isset($_POST['identificacion'])){
    $id = $_POST['identificacion'];
  }
  $codigo = $_POST['codigo'];
  include ('../clases/coneccion.php');
  $con = new Conexion();
  $query = "select * from $tabla where id=$id";
  $respuesta = $con-> sentencia_sql($query);
  if (!isset($respuesta[0])){ 
    //inserto el nuevo registro
    $query = "insert into $tabla values (default,'$codigo',null,$cantidad,0,0)";
    $con->sentencia_sql($query);
    $salida = json_encode(array('ingreso'=>'si'));
  }else{
    $cantidad += $respuesta[0]['cantidad'];
    $valor = $cantidad * $respuesta[0]['valor_unidad'];
    $query ="update $tabla set cantidad=$cantidad, valor_total=$valor where id=$id";   
    $con->sentencia_sql($query);
    $salida = 'si';
  } 
}else{
  $salida = 'No se a recibido parametros'; 
}
echo $salida;
?>
