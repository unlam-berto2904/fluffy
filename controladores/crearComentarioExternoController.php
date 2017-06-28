<?php
  require ('../clases/ExperienciaClass.php');

  $idUsuario = (int)$_POST['idUsuario'];
  $idExperiencia = (int)$_POST['idExperiencia'];
  $comentarioExterno = $_POST['comentarioExterno'];

  date_default_timezone_set('America/Buenos_Aires');
  $fechaComentario = (new \DateTime())->format('y-m-d H:i:s');

  Experiencia::crearComentarioExterno($idUsuario,$idExperiencia,$comentarioExterno,$fechaComentario);
  header("location:../vistas/home.php");
 ?>
