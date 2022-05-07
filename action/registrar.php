<?php 
include ('../clases/login.php');
$login = new Login($_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['clave'],'usuarios');
$respuesta = $login->registrar();
if ($respuesta == 1){
 header('Location:/compras/index.php?destino=login');
}else{
header('Location:/compras/index.php?destino=registro&error=ok');
}
?>
