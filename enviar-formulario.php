<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$descripcion = $_POST['descripcion'];
$mensaje = $_POST['mensaje'];

$to = "plisafor@plisafor.com";
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

?>
