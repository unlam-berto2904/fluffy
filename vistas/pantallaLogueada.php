<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
}
else {
  session_destroy();
  header("location: ../index.php");
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/estiloHome.css">
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/css/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <!-- <script src="../js/home.js" charset="utf-8" type="text/javascript"></script> -->
    <title></title>
  </head>
  <body>
    <div class="col-sm-7" id="">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <a href="vistaMascotasDelUser.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">mostrar animales</a>
      <a href="vistaExperiencia.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Mostrar Experiencias</a>
      <a href="vistaCrearMascota.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Mascotas</a>
    </div>
  </body>
</html>
