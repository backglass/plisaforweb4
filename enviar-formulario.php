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
    
    //Mensaje en formato HTML
    $message = '
    <html>
        <head>
            <title>Mensaje desde el formulario de contacto</title>
        </head>
        <body>
            <h1>Mensaje desde el formulario de contacto</h1>
            <p>Información enviada por el usuario:</p>
            <ul>
                <li><strong>Nombre:</strong> '.$nombre.'</li>
                <li><strong>Email:</strong> '.$email.'</li>
                <li><strong>Descripción:</strong> '.$descripcion.'</li>
                <li><strong>Mensaje:</strong> '.$mensaje.'</li>
            </ul>
        </body>
    </html>
    ';
    
    //Cabeceras
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
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