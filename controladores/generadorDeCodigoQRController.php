<?php
require_once('../clases/mascotaClass.php');
include('../librerias/phpqrcode/qrlib.php');
$idMuro = $_GET['idMuro'];


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

$urlMascota = $mascota->consultarUrl();



QRcode::png($urlMascota['url_lite']);

?>