<?php
  require ('../clases/mascotaClass.php');
  $idMuroMascota = $_POST['idMuroMascota'];
  echo json_encode((Mascota::getPerfilMascotaByIdMuroMascota($idMuroMascota)),true);
 ?>
