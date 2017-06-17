$(document).ready(function() {
});

var dir = window.location;

function mostrarUltimasHistorias() {
  dir.href = "../controladores/experienciasController.php";
}

function agregarMascota(id_usuario) {
	dir.href = "../controladores/crearMascotaController.php?id_usuario="+id_usuario;
}