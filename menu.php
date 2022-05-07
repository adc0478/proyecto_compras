<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" title="no title" charset="utf-8">
<div class="menu">
<a class="btn_menu" href="#" onclick="abrir_menu()"><img src="icons/menu_white.png"></a>
<ul>
 <li class="cierre_menu" ><a href="#" onclick='cerrar_menu()'> <img src="icons/cerrar_white.png">cerrar</a></li> 
 <li class="mcompras"><a href='index.php?destino=compras'>Compras</a></li>
 <li class="mproducto"><a href='index.php?destino=agregar'>Lista compras</a></li>
 <li class= "magregar"><a href='index.php?destino=nuevoproducto'>Agregar prod</a></li>
 <li class= "metricas"><a href='index.php?destino=metrica'>Metricas </a></li>
  <?php 
        if (isset($_SESSION['usuario'])){
          
          echo "<li class='musuario'><a href='index.php?destino=cerrar'>Cerrar sesion " .$_SESSION['usuario'] . "</a></li>";
        }else{

          echo "<li class='musuario'><a href='index.php?destino=login'>Login</a></li>";
        }

  ?>

 
</ul>
</div>
<script>
        function abrir_menu(){
          document.querySelector('.menu ul').removeAttribute('class','cerrar');
          document.querySelector('.menu ul').setAttribute('class','abrir');
        }
        
        function cerrar_menu(){
          document.querySelector('.menu ul').classList.add('cerrar');
          setTimeout(function(){
            document.querySelector('.menu ul').removeAttribute('class','abrir');
          },900);

        }

</script>

