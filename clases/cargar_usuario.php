<?php 


/**
 * Class cargar_usuario
 * @author yourname
 */
class Cargar_usuario
{
  private $usuario;

  function __construct($user){
    $this->usuario = $user;

  }
  function set_secion(){
    session_start();
    $_SESSION['usuario'] = $this->usuario; 
  }
  function get_usuario (){
    session_start();
    return $_SESSION['usuario'];
  }
}

?>
