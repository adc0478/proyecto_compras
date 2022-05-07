<link rel="stylesheet" href="css/componentes.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/login.css" type="text/css" media="screen" title="no title" charset="utf-8">
<div class="contenido">
<h2>Ingreso de usuario</h2>
<form action="index.php?destino=ingreso" method="POST" accept-charset="utf-8">
   <div>
      <label >Correo</label>
      <input type="email" value="" name="correo" id="" placeholder="Ingresar su correo"> 
  </div>
  <div>
      <label >Clave</label>
      <input type="text" value="" name="clave" id="" placeholder="Clave usuario"> 
  </div> 
  <div>
  <button type="submit" class="btn"><img src="icons/login.svg"></button>
  <a class="registro" href="index.php?destino=registro">Registrar nuevo usuario</a>
  </div>
</form>
  
</div>
<script>
 document.querySelector('.musuario').setAttribute('class','mseleccion');
</script>
