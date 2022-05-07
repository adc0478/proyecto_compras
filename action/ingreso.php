<?php 
include ('clases/login.php');
$login = new Login("","",$_POST['correo'],$_POST['clave'],"usuarios");
$respuesta = $login->ingresar();

if ($respuesta==1){
  header('Location:index.php?destino=agregar');
}else{
  header('Location:index.php?destino=login');
}

?>
