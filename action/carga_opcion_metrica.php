<?php
$tabla = "pedidos"; 
$con = new Conexion();
$query ="select fecha from $tabla GROUP BY fecha";
$respuesta = $con->sentencia_sql($query);
if (isset($respuesta[0])){
  foreach ($respuesta as $fila) {
    echo "<option value= ".$fila['fecha']."> ". $fila['fecha'] ." </option>";
  }
}

?>
