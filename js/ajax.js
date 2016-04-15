var peticionHTTP = new XMLHttpRequest();


function realizarPeticion(url,metodo,funcion){
	
	peticionHTTP.onreadystatechange=funcion;
	peticionHTTP.open(metodo, url, true);
	peticionHTTP.send(null);
	
}

function procesarRequest () {
	
        if (peticionHTTP.readyState === 4) { // completo ! ! 
		if (peticionHTTP.status === 200) { // exito ! ! 
	  document.getElementById("cuerpo_principal").innerHTML = peticionHTTP.responseText;	
        
        }
      }
    }

function cargarTareas(lista){
	
	
           
            var url="php/mostrarNotas.php?listaID="+lista;
            realizarPeticion(url,"GET",procesarRequest);
}

function crearTarea(lista){
	
	
	//realizarPeticion("html/agregar_tarea.html","GET",procesarRequest);
        var url="php/formularioAgregar.php?listaID="+lista;
        realizarPeticion(url,"GET",procesarRequest);
}

function cargarEditarNota(notaID,nota,link,fecha) {
    var url="php/formularioEditar.php?notaID="+notaID+"&nota="+nota+"&link="+link+"&fecha="+fecha;
    realizarPeticion(url,"GET",procesarRequest);
}