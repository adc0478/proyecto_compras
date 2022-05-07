<link rel="stylesheet" href="css/agregar.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php include ('clases/opciones.php');
  if (isset($_SESSION['usuario'])){
    include ("clases/coneccion.php");
  }else{
   header('Location:index.php?destino=login');
  }
?>
<h2>Ingresar nuevo productos</h2>
  <form action="action/nuevoproducto.php" method="POST" accept-charset="utf-8">
    <div>
      <label>Codigo</label>
      <input type="number" value="" name="codigo" id=""/>
    </div> 
    <div>
      <label>Descripcion</label>
      <input type="text" value="" name="detalle" id=""/>
    </div>
    <div>
      <label>Tipo</label> 
      <select name="tipo">
      <?php
        agregarOpcionesdeTipo("tipos","tipo");
       ?>
      </select>
    </div>
    <div>
       <label>Unidad</label>
       <select name="unidad">
        <?php
        agregarOpcionesdeTipo("unidades","unidad");
       ?>
       </select>
    </div>
    <input type="submit" class="btn" value="Cargar">
  </form>

<div class="separador"></div>
<h2>Lista de productos</h2>
<table>
  <tr>
   <th>Codigo</th>
   <th>Detalle</th>
   <th>Tipo</th>
   <th>Unidad</th>
   <th>Accion</th> 
  </tr>
     <?php cargar_datos()?>
  </table>
<script>
 document.querySelector('.magregar').setAttribute('class','mseleccion');
</script>
<?php 
function cargar_datos(){
  $tabla="productos";
  //include ('clases/coneccion.php');
  $con = new Conexion();
  $query="select * from $tabla";
  $respuesta = $con->sentencia_sql($query); 
  if (isset($respuesta[0]['detalle'])){
    foreach ($respuesta as $fila){
    echo "<tr>"; 
        echo "<td>". $fila['cod_prod'] ."</td>";
        echo "<td>". $fila['detalle'] ."</td>";
        echo "<td>". $fila['tipo'] ."</td>";
        echo "<td>". $fila['unidad'] ."</td>";
        echo "<td><a href='action/quitarprod.php?codigo=".$fila['cod_prod'] ."'>Quitar</a></td>";
    echo "</tr>";
    }
  }
} 
?>
