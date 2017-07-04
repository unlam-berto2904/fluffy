var base_url = window.location.origin;

$(document).ready(function() {

});


$(document).on("click", "#cajonNotificacion", function () {
  var idUsuario = $(this).data('id');
  mostrarNotificaciones(idUsuario);
});

function mostrarNotificaciones(idUsuario){
  $.ajax({
    url:base_url+"/fluffy/controladores/obtenerNotificacionesController.php",
    type:"POST",
    data:{idUsuario:idUsuario},
    success: function (result) {
      var parsed = JSON.parse(result);
      var jsonString = JSON.stringify(parsed);
      enviarNotificacionesAModalCajon(jsonString);
      }
  });
}
function enviarNotificacionesAModalCajon(notificaciones){
    $.ajax({
      url:base_url+"/fluffy/vistas/home.php",
      type:"POST",
      data:{notificacionesDeUser:notificaciones},
      success: function(data){
        var result = $('<div />').append(data).find('#notificacionesDiv').html();
            $('#notificacionesDiv').html(result);
        }
    });
}
