<?php
require_once('../clases/mascotaClass.php');
function generarArrayPerfilExterno($idMuro){
	$arrayPerfilExterno = Mascota::getPerfilMascotaByIdMuroMascota($idMuro);
	return $arrayPerfilExterno;
}
?>