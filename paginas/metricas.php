<?php 
if (isset($_SESSION['usuario'])){
include ('clases/coneccion.php');
?>
<link rel="stylesheet" href="css/metricas.css" type="text/css" media="screen" title="no title" charset="utf-8">
<h1>Metrica de consumos</h1>

<div class="filtro">
  <h2>Filtro de fecha</h2>
   <form action="action/listar_metrica.php" method="POST">
      <select id="" class="filtro" name="fecha">
      <?php include ('action/carga_opcion_metrica.php')?>
      </select>
      <input type="submit" value="Consulta">
   </form>
  <table>
    <tr>
      <td>Codigo</td>
      <td>descripcion</td>
      <td>cantidad</td>
      <td>subtotal</td>
    </tr>
   <?php 
       include ('action/obtener_tabla_metricas.php');
       $respuesta = cargar_contenido_tabla();
    ?> 

  </table>
  <?php echo "<h3>$respuesta</h3>" ?>
  <div class="divicion"></div>
</div>
<script>
	document.querySelector('.metricas').setAttribute('class','mseleccion');
</script>

<?php 
  }else{ header('Location:index.php?destino=login');};
?>

