<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Envio_mail
{
  private $destino;
  private $origen;
  private $nombre_origen;
  private $encabezado;
  private $mensaje;
  private $host="smtp.mail.yahoo.com";
  private $seguridad = 'tls';
  private $puerto=587;
  private $usuario_mail="arielcismondi@yahoo.com";
  private $clave_mail="ulwd lbfo npzg xgii";
  private $tiempo_espera =30;

  function __construct($destino,$origen,$nombre,$encabezado,$mensaje)
  {
    $this->destino = $destino;
    $this->origen = $origen;
    $this->nombre_origen = $nombre;
    $this->encabezado = $encabezado;
    $this->mensaje = $mensaje;
  }
  public function enviar(){


    require 'clases/Exception.php';
    require 'clases/PHPMailer.php';
    require 'clases/SMTP.php';
    $mail = New PHPMailer(); 
    try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $this->host;                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = $this->usuario_mail;                     //SMTP username
      $mail->Password   = $this->clave_mail;                               //SMTP password
      $mail->SMTPSecure = $this->seguridad;       //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = $this->puerto;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      //Recipients
      $mail->setFrom($this->usuario_mail, $this->nombre_origen);
      $mail->addAddress($this->destino, $this->destino);     //Add a recipient

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $this->encabezado;
      $mail->Body    =$this->mensaje;

      $salida = $mail->send();
    } catch (Exception $e) {
      $salida =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    return $salida;
  }
}


?>
