<?php
require_once('../clases/mascotaClass.php');
$perdido = $_GET['perdido'];
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

if($perdido == 1){
	$mascota->cambiarAPerdido($perdido, $idMuro);
}else{
	$mascota->sacarDePerdido($perdido, $idMuro);
}

header("location:../vistas/home.php");
?>