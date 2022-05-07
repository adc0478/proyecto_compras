<?php 
function agregarOpcionesdeTipo($tabla, $campo){
  $tipos = new Conexion();
  $query = "select * from $tabla";
  $respuesta = $tipos->sentencia_sql($query);
  if (isset($respuesta[0])){
    foreach ($respuesta as $valor) {
      echo "<option value='".$valor[$campo] . "'>".$valor[$campo]."</option>"; 
    } 
  }

}  
function agregar_opciones_agrupadas ($tabla, $campo){
  $con = new Conexion();
  $query = "select from $tabla group by $campo";
  $respuesta = $con->sentencia_sql($query);
  if (isset ($respuesta[0])){
    foreach ($respuesta as $fila) {
     echo "<option value=". $fila[$campo] .">".$fila[$campo] ."</option>"; 
    } 
  }


}
?>
