 //Obtener el formulario
 const form = document.getElementById("formulario-contacto");
  
 //Agregar un evento al formulario para detectar cuando se envía
 form.addEventListener("submit", enviarFormulario);
 
 function enviarFormulario(event) {
     event.preventDefault(); //Evitar que la página se recargue al enviar el formulario
 
     //Crear una instancia del objeto XMLHttpRequest
     const xhr = new XMLHttpRequest();
 
     //Abrir una conexión con el archivo PHP
     xhr.open("POST", "enviar-formulario.php", true);
 
     //Establecer la cabecera para enviar los datos como un formulario
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 
     //Crear un objeto con los datos del formulario
     const data = {
         nombre: nombre.value,
         email: email.value,
         descripcion: descripcion.value,
         mensaje: mensaje.value
     };
 
     // Convertir el objeto en una cadena para enviarlo como una petición
     const dataString = JSON.stringify(data);
 
     //Enviar los datos al archivo PHP
     xhr.send(dataString);
 
     //Controlar cuando el archivo PHP ha terminado de procesar los datos
     xhr.onreadystatechange = function() {
         if (xhr.readyState === 4 && xhr.status === 200) {
             //Obtener la respuesta del archivo PHP
             const respuesta = xhr.responseText;
 
             //Hacer algo con la respuesta (como mostrar un mensaje al usuario)
             console.log(respuesta);
             console.log(dataString);
         }

         //Muestra mensaje de exito al enviar el formulario dyrante 3 segundos
         //Muestra el elemente con id mensaje1 y lo oculta despues de 3 segundos
         const pop_ip = () => {
           document.getElementById("mensaje1").style.display = "block";
           setTimeout(function(){ 
             document.getElementById("mensaje1").style.display = "none";
             console.log("hola");
           }, 3000);
       }
       pop_ip();

         const form = document.getElementById("formulario-contacto");
         const elements = form.elements;
         
         [...elements].forEach((elem) => {
           elem.value = "";
         });
        
     }
     //Execute next function during 3 seconds

 }