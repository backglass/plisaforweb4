
<?php

if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['descripcion']) && isset($_POST['mensaje'])){

  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $descripcion = $_POST['descripcion'];
  $mensaje = $_POST['mensaje'];

  $recaptcha_secret = "";
  $recaptcha_response = isset($_POST['recaptcha_response']) ? $_POST['recaptcha_response'] : '';

  if(empty($recaptcha_response)){
    echo json_encode(array('success' => false, 'error_message' => 'reCAPTCHA no se ha completado'));
    exit;
  }

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret . "&response=" . $recaptcha_response;

  $recaptcha = file_get_contents( $url );
  $recaptcha = json_decode( $recaptcha );

  if($recaptcha != null && $recaptcha->success == true){

    $file = fopen("data.txt","a");
    if($file){
      fwrite($file, "Nombre: " . $nombre . "\r
");
      fwrite($file, "Email: " . $email . "\r
");
      fwrite($file, "Asunto: " . $descripcion . "\r
");
      fwrite($file, "Mensaje: " . $mensaje . "\r
");
      fwrite($file, "recaptcha: " . $recaptcha_response . "\r
");
      fwrite($file, "re: " . json_encode($recaptcha) . "\r
");
      fclose($file);
    }

    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $descripcion = $_POST['descripcion'];
    $mensaje = $_POST['mensaje'];
    
    $to = "juan@plisafor.com";
    $subject = "Nuevo mensaje desde la web Plisafor";
    $message = "<html><body>";
    $message .= "<h2>Nuevo mensaje desde la página web</h2>";
    $message .= "<p><b>Nombre:</b> " . $nombre . "</p>";
    $message .= "<p><b>Email:</b> " . $email . "</p>";
    $message .= "<p><b>Asunto:</b> " . $descripcion . "</p>";
    $message .= "<p><b>Mensaje:</b> " . $mensaje . "</p>";
    $message .= "</body></html>";
    
    header('Content-Type: text/html; charset=UTF-8');
    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=UTF-8\r\n";
    $header .= "From: " . $email . "\r\n";
    
    if (mail($to, $subject, $message, $header)) {
      echo 'Mensaje enviado';
    } else {
      echo 'Error al enviar mensaje';
    }
    
  
 
  }

}


?>
