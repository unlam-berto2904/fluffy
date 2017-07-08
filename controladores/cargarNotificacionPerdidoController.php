<?php
  require ('../clases/mascotaClass.php');
  require ('../clases/NotificacionClass.php');
  require_once ('../clases/SolicitudHallazgoClass.php');


  $idMuroMascota = $_POST['muroMascota'];
  $idUsuarioEmisor = $_POST['idUsuario'];
  $mascota = Mascota::getPerfilMascotaByIdMuroMascota($idMuroMascota);
  $idUsuarioReceptor = $mascota['idDuenio'];
  date_default_timezone_set('America/Buenos_Aires');
  $fechaNotificacion = (new \DateTime())->format('y-m-d H:i:s');
  $descripcion = "Encontró a tu mascota ".$mascota['nombreMascota'].
                  "<img src='../".$mascota['fotoMascota']."' class='fotoComentario'/>" ;

  $notificacion =  new Notificacion($idUsuarioReceptor,$idUsuarioEmisor,$fechaNotificacion,$descripcion);
  $notificacion->persistirNotificacion();

  $solicitudAdopcion = new SolicitudHallazgo($idUsuarioEmisor,$idMuroMascota);
  $solicitudAdopcion->persistirSolicitudHallazgo();
 ?>
