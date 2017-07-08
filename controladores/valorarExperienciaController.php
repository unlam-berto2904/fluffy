<?php
  require ('../clases/experienciaClass.php');

  $idUsuario = (int)$_POST['idUsuario'];
  $idExperiencia = (int)$_POST['idExperiencia'];
  Experiencia::valorarExperiencia($idUsuario,$idExperiencia);
  header("location:../vistas/home.php");
 ?>
