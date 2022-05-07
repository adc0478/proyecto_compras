  <form action="action/registrar.php" method="POST" accept-charset="utf-8">
     <div>
       <label>Nombre</label>
       <input type="text" value="" name="nombre" id="" required>
     </div>
     <div>
       <label>Apellido</label>
       <input type="text" value="" name="apellido" id="" required>
     </div>
     <div>
       <label>correo</label>
       <input type="email" value="" name="correo" id="" required>
     </div>
     <div>
       <label>Clave</label>
       <input type="password" value="" name="clave" id="" required>
     </div> 
    <input type="submit" class="btn" value="Cargar">
  </form>
<script>
 document.querySelector('.musuario').setAttribute('class','mseleccion');
</script>
<?php
if (isset($_GET['error'])){
  if ($_GET['error'] == 'ok'){
    echo "<p>Su registro no fue procesado, por favor verificar la informacion</p>";
  }

}
?>
