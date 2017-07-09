<?php
include("../librerias/pdf/dompdf-master/dompdf_config.inc.php");
require_once('../clases/mascotaClass.php');

$idMuro = $_GET['fluffy'];

$arrayPerfilExterno = Mascota::getPerfilMascotaByIdMuroMascota($idMuro);


$nombreMascota = $arrayPerfilExterno["nombreMascota"];
$fotoMascota = $arrayPerfilExterno["fotoMascota"];
$tipoAnimal = $arrayPerfilExterno["tipoAnimal"];
$raza = $arrayPerfilExterno["razaMascota"];
$fechaNacimientoMascota = $arrayPerfilExterno["fechNacMascota"];
$sexo = $arrayPerfilExterno["sexoAnimal"];

$nombreDueño = $arrayPerfilExterno["nombreDuenio"];
$apellidoDueño = $arrayPerfilExterno["apellidoDuenio"];
$fotoDueño = $arrayPerfilExterno["fotoDuenio"];
$sexoDueño = $arrayPerfilExterno["sexoUsuario"];
$ultimaConexionDue = $arrayPerfilExterno["ultimaConexUsuario"];
$emailUsuario = $arrayPerfilExterno["emailUsuario"];



$html = "<html><head><meta charset='utf-8'></head><body>";
$html .= '<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
		<div class="btn-group" role="group">
				<button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="fa fa-paw" aria-hidden="true"></span>
						<div class="hidden-xs">Informaci&oacute;n de la mascota</div>
				</button>
		</div>

</div>

 <div class="well col-sm-12">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="tab1">
			<img alt="" class="img-rounded thumbnail" src="../' . $fotoMascota . '">
			<h3>Nombre: ' . $nombreMascota . '</h3>
		</br><h3>Tipo de animal: ' . $tipoAnimal . '</h3>
			</br><h3>Raza: ' . $raza . '</h3>
			</br><h3>Sexo: ' . $sexo . '</h3>
			</br><h3>Fecha de nacimiento: ' . $fechaNacimientoMascota . '</h3>
		</div>
		<div class="btn-group" role="group">
				<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<div class="hidden-xs">Mi due&ntilde;o</div>
				</button>
		</div>
		<div class="tab-pane fade in" id="tab2">
		 <div class="col-sm-6">
			<img alt="" class="img-rounded thumbnail" src="../' . $fotoDueño . '">
		 </div>

		 <div class="col-sm-6">
			</br><h3>Nombre: ' . $nombreDueño . '</h3>
			</br><h3>Apellido: ' . $apellidoDueño . '</h3>
			</br><h3>Sexo: ' . $sexoDueño . '</h3>
			</br><h3>Ultima conexion : ' . $ultimaConexionDue . '</h3>
			</br><h3>E-mail : ' . $emailUsuario . '</h3>
		</div>';
$html .= "</body></html>";

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "portait");
$mipdf->load_html(utf8_decode($html));
$mipdf->render();
$mipdf->stream("Informacion de ".$nombreMascota." y ".$nombreDueño." ".$apellidoDueño.".pdf");

?>
