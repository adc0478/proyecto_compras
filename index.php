  <?php 
    session_start();
  ?>
  <DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen" title="no title" charset="utf-8">
   </head>
   <body>
      <?php 
        include ('config/rutas.php');
        include ('menu.php');
        if (isset($_GET ['destino'])){
		  include ($ruta[$_GET['destino']]);
        }
       ?>
    
     </body>

<?php 
include ('paginas/footer.php'); 
?>
<script src="js/accion_pagina.js"></script>

</html>
