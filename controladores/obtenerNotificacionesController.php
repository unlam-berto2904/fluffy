<?php
  require ('../clases/UsuarioClass.php');
  $idUsuario = $_POST['idUsuario'];
  echo json_encode((Usuario::getNotificacionesUsuarioById($idUsuario)),true);
 ?>
