var peticionHTTP = new XMLHttpRequest();


function realizarPeticion(url,metodo,funcion){
	
	peticionHTTP.onreadystatechange=funcion;
	peticionHTTP.open(metodo, url, true);
	peticionHTTP.send(null);
	
}

function procesarRequest () {
	
        if (peticionHTTP.readyState == 4) { // completo ! ! 
		if (peticionHTTP.status == 200) { // exito ! ! 
			//document.write(peticionHTTP.responseText);
                  //document.getElementById("cuerpo_principal").write(peticionHTTP.responseText);
	  document.getElementById("cuerpo_principal").innerHTML = peticionHTTP.responseText;	
        }
      }
    }
function cargarTareas(){
	
	
	realizarPeticion("html/tareas.html","GET",procesarRequest);
}

function crearTarea(){
	
	
	realizarPeticion("html/agregar_tarea.html","GET",procesarRequest);
}
  
  window.document.getElementById("cuerpo_principal").innerHTML=cargarTareas();