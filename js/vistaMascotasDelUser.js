var base_url = window.location.origin;

$(document).ready(function() {
var idUsuario = $("#idUsuario").val();
mostrarMascotasDelUser(idUsuario);

});



function mostrarMascotasDelUser(idUsuario) {
  $.ajax({
    url:base_url+"/fluffy/controladores/cargarMascotasDelUserController.php",
    type:"POST",
    data:{usuario:idUsuario},
    success: function (result) {
      var parsed = JSON.parse(result);
      var jsonString = JSON.stringify(parsed);
      enviarMascotasAVistaMascotasDelUser(jsonString);
      }
  });
}

function enviarMascotasAVistaMascotasDelUser(mascotasDelUser){
    $.ajax({
      url:base_url+"/fluffy/vistas/vistaMascotasDelUser.php",
      type:"POST",
      data:{mascotas:mascotasDelUser},
      success: function(data){
        var result = $('<div />').append(data).find('#mascotasUserSection').html();
            $('#mascotasUserSection').html(result);
        }
    });
}
