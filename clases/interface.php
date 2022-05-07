<?php 
class Driver{
  private $query;
  private $selector;

  function __construct()
  {
    include ('coneccion.php'); 
    $this->selector = new Conexion();
  }

  function insertar ($valores,$tabla,$condicion){
    $datos = implode(',',$valores);
    if ($condicion === ""){
      $this->query = "insert into $tabla values ($datos)";    
    }else{
      $this->query = "insert into $tabla values ($datos) where $condicion";
    } 
    $respuesta = $this->selector->sentencia_sql($this->query);
    return $respuesta;
  }

  function borrar($tabla,$condicion){
    if (!$condicion === "" ){
      $this->query = "delete from $tabla where $condicion";
      $this->selector->sentencia_sql($this->query);      
    }else{
     $respuesta = "No es posible borrar el registro";
    }
    return $respuesta;
  }
  
  function consulta ($tabla,$condicion,$campos){
    if ($condicion === ""){
      $this->query = "select $campos from $tabla";
    }else{
      $this->query = "select $campos from $tabla where $condicion";
    }
    $respuesta = $this->selector->sentencia_sql ($this->query); 
    return $respuesta;
  }
  function modificar ($tabla,$condicion,$pares){
    $this->query = "update $tabla set $pares where $condicion";
    $respuesta = $this->selector->sentencia_sql($this->query);
    return $respuesta;
  }

}

?>
