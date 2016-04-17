var notaID;

function compartir(url){
    
}

function marcarHecha(url) {
   notaID=url;
    $.ajax({
        url: 'php/notas.php',
        data: {
            notaID: url,
            funcion: "marcarHecha",
            accion: "marcar"
        },
        type: 'get',
        context: document.body,
        success: function (data) {
            actualizar(data);
        }
    });
}


function actualizar(responseXML) {
    if ($("check", responseXML).text() === "1") {
       cargarTareas($("lista", responseXML).text());
    } else {
        window.alert("Error: no se pudo marcar" + notaID);
    }
}


function reestablecer(url) {
   notaID=url;
    $.ajax({
        url: 'php/notas.php',
        data: {
            notaID: url,
            funcion: "marcarHecha",
            accion:'desmarcar' //queremos desmarcar una hecha
        },
        type: 'get',
        context: document.body,
        success: function (data) {
         actualizarHechas(data);
        }
    });
}

function actualizarHechas(responseXML) {
    if ($("check", responseXML).text() === "1") {
       cargarTareasHechas($("lista", responseXML).text());
    } else {
        window.alert("Error: no se pudo marcar" + notaID);
    }
}

function borrarNota(url) {
   notaID=url;
    $.ajax({
        url: 'php/notas.php',
        data: {
            notaID: url,
            funcion: "borrarNota"
        },
        type: 'get',
        context: document.body,
        success: function (data) {
            actualizarNotas(data);
        }
    });
}


function actualizarNotas(responseXML) {
    if ($("eliminado", responseXML).text() === "1") {
        var elem = document.getElementById(($("notaID", responseXML).text()));
        elem.parentNode.removeChild(elem);
    } else {
        window.alert("Error: no se pudo eliminar a " + notaID);
    }
}

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  
  function validar_nota_nueva(){
    	if (document.crearNota.nota.value.length===0){ 
             window.alert("Por favor ingrese texto en la tarea "); 
             document.crearNota.nota.focus(); 
             
   	}
        else{
            document.crearNota.submit();
        }
      
  }
  
  function validar_nota_editada(){
      if (document.editarNota.nota.value.length===0){ 
             window.alert("Por favor ingrese texto en la tarea "); 
             document.editarNota.nota.focus(); 
             
   	}
        else{
            document.editarNota.submit();
        }
      
      
  }