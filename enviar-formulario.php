<?php
    // Obtener los datos enviados desde el formulario
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $email = $data['email'];
    $descripcion = $data['descripcion'];
    $mensaje = $data['mensaje'];
    
    //Destinatario 
    $to = "plisafor@plisafor.com";
    
    //Asunto
    $subject = "Mensaje desde el formulario de contacto";
    
    //Mensaje
    $message = "Nombre: ".$nombre."\r\n";
    $message .= "Email: ".$email."\r\n";
    $message .= "Descripcion: ".$descripcion."\r\n";
    $message .= "Mensaje: ".$mensaje."\r\n";
    
    //Cabeceras
    $headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion();
    
    //Enviar el email
    if(mail($to,$subject,$message,$headers)){
        echo "Mensaje enviado correctamente";
        
        
    } else {
        echo "Error al enviar el mensaje";
    }
?>
