<link rel="stylesheet" href="css/productos.css" type="text/css" media="screen" title="no title" charset="utf-8">
<?php 
if (isset($_SESSION['usuario'])){
  include ("clases/coneccion.php");
}else{
header('Location:index.php?destino=login');
}
?>
<h2>Listado de productos disponible</h2>

<div class="filtro">
   <select>
   <option value="todos">todos</option>
   <?php 
     include ("clases/opciones.php");
     agregarOpcionesdeTipo("tipos","tipo");     
   ?> 
   </select>
   <button onclick="filtrar()">Filtrar</button>
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
 
<script>
 document.querySelector('.mproducto').setAttribute('class','mseleccion');
</script>

<?php 
function cargar_tabla(){
  $prod="productos";
  $pedidos ="pedidos";
  $con = new Conexion();
  $query = "SELECT *, count($pedidos.cantidad) as pedido FROM $pedidos right join $prod on $prod.cod_prod = $pedidos.cod and $pedidos.fecha is null GROUP by $prod.cod_prod" ;
  $respuesta =$con->sentencia_sql($query);
  if (isset($respuesta[0]['detalle'])){
    $i=0;
    foreach ($respuesta as $fila) { 
      echo "<tr class='".$fila['tipo'] ."' id='".$fila['tipo'] .$i. "'>";
      echo "<td>". $fila['cod_prod']."</td>"; 
      echo "<td>". $fila['detalle']."</td>"; 
      echo "<td>". $fila['cantidad']."</td>"; 

      $cadena_acciones= "<td class='accion'>";
      $cadena_acciones .="<input type='number' id='inp" . $fila['cod_prod']."' placeholder='cantidad' min=1>";
      $cadena_acciones .="<div>";
      $cadena_acciones .= "<a href='#' class='btn_lista btn' id='btn". $fila['cod_prod']."' onclick='accion_prod(".$fila['cod_prod'].",".$fila['id'] .")'>";
      $cadena_acciones .= "<img src='icons/cart-plus-solid.svg' >" ; 
      $cadena_acciones .= "</a>";
      $cadena_acciones .= "<a href='action/quitar_carro.php?id=".$fila['id'] ."&origen=agregar'><img src='icons/delete_black_24dp.svg'></a>";
      $cadena_acciones .="</div>";
      $cadena_acciones .="</td>"; 
      echo $cadena_acciones. "</tr>"; 
      $i +=1;
    }
  } 
}

?>
