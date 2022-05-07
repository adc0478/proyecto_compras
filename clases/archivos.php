<?php 
class Archivos{
  private $archivo;
  public $registro=array(); 
  private $file;
  function __construct($archivo, $datos=array())
  {
    $this->archivo = $archivo; 
    $this->registro = $datos;
  }
  private function vectorizar($datos){
    $vector=array();
    $vector = explode ('#',$datos);
    for ($i = 0; $i < count($vector); $i++) {
      $vector[$i] = explode('/',$vector[$i]);
    }
    return $vector;
  }
  private function desvectorizar($vector,$separador){
    $dato="";
    for ($i=0 ;$i< count($vector);$i++) {
      if ($dato === ""){
        $dato .= implode ('/',$vector[$i]);  
      }else{
        $dato .= $separador . implode('/',$vector[$i]);  
      }
    }
    return $dato; 
  }
  function escribir (){
    $this->file = fopen($this->archivo,'w');
    fputs($this->file,$this->desvectorizar($this->registro,'#'));
    fclose($this->file);
  }
  function borrar(){
    $this->file = fopen($this->archivo,'w');
    fclose($this->file);
  }
  function levantar_registro(){
    $datos="";
    $salida = array();
    if (file_exists($this->archivo)){ 
      $this->file = fopen($this->archivo,'r');
      while (!feof($this->file)){
        $datos .= fgetc($this->file); 
      }
      fclose($this->file);
      if (!($datos==="")){ 
        $salida = $this->vectorizar($datos);
      }
    }
    return $salida; 
  }

}


?>
