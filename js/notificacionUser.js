var base_url = window.location.origin;
var idUsuario = $('#idUsuario').val();

$(document).ready(function() {

});


$(document).on("click", "#cajonNotificacion", function () {
  // var idUsuario = $(this).data('id');
  mostrarNotificaciones(idUsuario);
});

$(document).on("click", "#notificaCita", function () {
  var idMuroMascota = $(this).data('pers-id');
  enviarNotifCita(idUsuario,idMuroMascota);
});

$(document).on("click", "#notificaEncuentro", function () {
  var idMuroMascota = $(this).data('pers-id');
  enviarNotifEncuentro(idUsuario,idMuroMascota);
});

$(document).on("click", "#notificaAdopcion", function () {
  var idMuroMascota = $(this).data('pers-id');
  enviarNotifAdopcion(idUsuario,idMuroMascota);
});

// funciones de notificacion para el usuario
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
// ------------------------------------------------------

function enviarNotifCita(idUsuario,idMuroMascota){
  $.ajax({
    url:base_url+"/fluffy/controladores/cargarNotificacionCitaController.php",
    type:"POST",
    data:{idUsuario:idUsuario,
          muroMascota:idMuroMascota},
    success: function (result) {
      alert("Mensaje enviado");
      }
  });
}

function enviarNotifEncuentro(idUsuario,idMuroMascota){
  $.ajax({
    url:base_url+"/fluffy/controladores/cargarNotificacionPerdidoController.php",
    type:"POST",
    data:{idUsuario:idUsuario,
          muroMascota:idMuroMascota},
    success: function (result) {
      alert("Mensaje enviado");
      }
  });
}

function enviarNotifAdopcion(idUsuario,idMuroMascota){
  $.ajax({
    url:base_url+"/fluffy/controladores/cargarNotificacionAdopcionController.php",
    type:"POST",
    data:{idUsuario:idUsuario,
          muroMascota:idMuroMascota},
    success: function (result) {
      alert("Mensaje enviado");
      }
  });
}
