<link rel="stylesheet" href="css/compras.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php 
if (isset($_SESSION['usuario'])){
include ("clases/coneccion.php");
}else{
  header('Location:index.php?destino=login');
}
?>
<h2>Compras</h2>
<div class="filtro">
  <select>
     <option value="todos">Todos</option>
      <?php
        include ("clases/opciones.php");
        agregarOpcionesdeTipo("tipos","tipo");
      ?>    
  </select>
  <button onclick="filtrar()" >Filtrar</button>
</div>
<table>
  <tr>
     <th>Codigo</th>
     <th>Descripcion</th>
     <th>cantidad</th>
     <th class="accion"></th>
  </tr>
   <?php cargar_tabla() ?>
</table>

<script src="../js/accion_pagina.js"></script>
<script>
	document.querySelector('.mcompras').setAttribute('class','mseleccion');
</script>

<?php 

function cargar_tabla(){
  $tabla = "pedidos";
  $prod ="productos";
  //include ('clases/coneccion.php');
  $con = new Conexion ();
  $query = "select * from $tabla left join $prod on $tabla.cod = $prod.cod_prod where $tabla.fecha is null";
  $respuesta = $con->sentencia_sql($query);
  $fecha = date('Y-m-d');

  if (isset($respuesta[0])){
    $i=0;
    foreach ($respuesta as $fila) {
      $cadena_accion="<td class='accion'>";
      $cadena_accion .='<input type="number" id="precio'.$fila['id'].'" placeholder="precio unitario">';
      $cadena_accion .= '<input type="date" id="fecha'.$fila['id'] .'" value="'.$fecha .'">';
      $cadena_accion .='<div><a class="btn" id="btn'.$fila['id'] .'" onclick="accion('.$fila['id']. ')"><img src="icons/check_black_24dp.svg"></a>';
      $cadena_accion .= "<a href='action/quitar_carro.php?id=".$fila['id'] ."&origen=compras'><img src='icons/delete_black_24dp.svg'></a>";
      $cadena_accion .= '<input type="text" class="invisible" id="cantidad'. $fila['id'].'" value="'.$fila['cantidad'].'">';      
      $cadena_accion .='</div></td>';
      echo "<tr class='".$fila['tipo'] . "' id='".$fila['tipo'] . $i . "'>";
      echo '<td>'. $fila['cod_prod']. '</td>'; 
      echo '<td>'. $fila['detalle']. '</td>'; 
      echo '<td>'. $fila['cantidad']. '</td>'; 
      echo $cadena_accion;
      $i +=1;
      echo '</tr>';
    } 
  }
}

?>
