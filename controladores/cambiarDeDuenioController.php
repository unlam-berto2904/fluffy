<?php
require_once('../clases/mascotaClass.php');
$idUser = $_GET['idUsuario'];
$idMuroMascota = $_GET['idMuroMascota'];

Mascota::cambiarDeDuenio($idUser, $idMuroMascota);
header("location:../vistas/home.php");
?>
