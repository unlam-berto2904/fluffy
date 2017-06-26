<?php
  require ('../clases/mascotaClass.php');
  $usuario = $_POST['usuario'];
  echo json_encode((Mascota::getMascotasListByIdUsuario($usuario)),true);
 ?>
