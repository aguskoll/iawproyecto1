//utiliza la libreria jquery
//se utiliza para ordenar los elementos
var notaID;
var notaIDanterior;
var lista;
/*
 * se llama cuando se apreta el boton para bajar la nota
 * **/
function bajarNota(url, orden, siguienteID, listaID) {
   
    lista = listaID;

    notaID = url;
    if(siguienteID>=0){
        
        
        ordenViejo =parseInt(orden);
        ordenNuevo =parseInt(ordenViejo+1);
       
        $.ajax({
            url: 'php/notas.php',
            data: {
                notaID: notaID,
                funcion: "sorteable",    
                notaIDanterior: siguienteID,
                ordenNuevo: ordenNuevo,
                ordenViejo: ordenViejo
                
   
            },
            type: 'get',
            context: document.body,
            success: function (data) {
                actualizarLista(data);
        }
    });
    }
}

function subirNota(url, orden, anterior, listaID) {
    
    lista = listaID;
    if (orden > 0) { //;a de arriba del todo nno la puedo subir
        notaID = url;
        notaIDanterior = anterior;
        ordenViejo = parseInt(orden);
        ordenNuevo =parseInt( orden - 1);
        $.ajax({
            url: 'php/notas.php',
            data: {
                notaID: notaID,
                funcion: "sorteable",
                notaIDanterior: anterior,
                ordenNuevo: ordenNuevo,
                ordenViejo: ordenViejo
     
            },
            type: 'get',
            context: document.body,
            success: function (data) {
               
                actualizarLista(data);
            }
        });
    }
}

function actualizarLista(responseXML) {
    if ($("check", responseXML).text() === "1") {
        cargarTareas(lista);

    } else {
        window.alert("Error: no se pudo mover a " + notaID);
    }

}