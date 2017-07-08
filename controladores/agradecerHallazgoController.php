<?php
require_once('../clases/mascotaClass.php');
require_once('../clases/NotificacionClass.php');

$idMuroMascota = $_GET['idMuroMascota'];
$idUsuarioReceptor = $_GET['idUsuario'];
$idUsuarioEmisor = $_GET['user'];
$mascota = Mascota::getPerfilMascotaByIdMuroMascota($idMuroMascota);

date_default_timezone_set('America/Buenos_Aires');
$fechaNotificacion = (new \DateTime())->format('y-m-d H:i:s');
$descripcion = " Te agredece por haber encontrado a ".$mascota['nombreMascota'].
								"<img src='../".$mascota['fotoMascota']."' class='fotoComentario'/>" ;

$notificacion =  new Notificacion($idUsuarioReceptor,$idUsuarioEmisor,$fechaNotificacion,$descripcion);
$notificacion->persistirNotificacion();
Mascota::limpiarDeSolicitudHallazgo($idMuroMascota);
header("location:cambiarMascotaAPerdidoController.php?perdido=0&mascota=".$idMuroMascota);
?>
