<?php
require_once('../clases/mascotaClass.php');
$adopcion = $_GET['adopcion'];
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

if($adopcion == 1){
	$mascota->cambiarAAdopcion($adopcion, $idMuro);
}else{
	$mascota->sacarDeAdopcion($adopcion, $idMuro);
}

header("location:../vistas/home.php");
?>