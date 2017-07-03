<?php
require_once('../clases/mascotaClass.php');
$cita = $_GET['cita'];
$idMuro = $_GET['mascota'];

$perfilMascota = array();
$perfilMascota = Mascota::getPerfilMascotaByIdMuroMascota($idMuro);
//($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal, $fotoPerfil)
$mascota = new Mascota($perfilMascota['idDuenio'], 
						$perfilMascota['sexoAnimal'], 
						$perfilMascota['fechNacMascota'],
						$perfilMascota['urlLite'],
						$perfilMascota['nombreMascota'],
						$idMuro,
						$perfilMascota['razaMascota'],
						$perfilMascota['idAnimal'],
						$perfilMascota['fotoMascota']);

if($cita == 1){
	$mascota->cambiarACita($cita, $idMuro);
}else{
	$mascota->sacarDeCita($cita, $idMuro);
}

header("location:../vistas/home.php");
?>