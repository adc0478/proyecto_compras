<?php
function cargar_contenido_tabla(){
  $tabla = "pedidos";
  $productos ="productos";
  $total =0;
  if (isset($_GET['fecha'])){
    $query = "select * from $tabla left join $productos on $productos.cod_prod = $tabla.cod where fecha = '".$_GET['fecha'] ."'";
    $con = new Conexion();
    $resultado = $con->sentencia_sql($query);
    if (isset($resultado[0])){
      foreach ($resultado as $fila) {
        echo "<tr>";
          echo "<td>" .$fila['cod'] . "</td>"; 
          echo "<td>" .$fila['detalle'] . "</td>"; 
          echo "<td>" .$fila['cantidad'] . "</td>"; 
          echo "<td>" .$fila['valor_total'] . "</td>"; 
          $total += $fila['valor_total'];
       echo "</tr>"; 
      }
      return "Total gastado es $total";
    } 
  }
}

?>
