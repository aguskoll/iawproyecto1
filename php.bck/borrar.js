
$(document).ready(function(){
    $('.modal-trigger').leanModal();
});

var notaID;


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
