
$(document).ready(function(){
    $('.modal-trigger').leanModal();
});

var notaID;

function borrarNota(url) {
   notaID=url;
    window.alert(" eliminar a " + url);
    $.ajax({
        url: 'php/borrarNota.php',
        data: {
            notaID: url
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
        $("#"+($("notaID", responseXML).text())).remove();
    } else {
        window.alert("Error: no se pudo eliminar a " + notaID);
    }
}
