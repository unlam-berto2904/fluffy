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

    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap.min.css">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>

    <script type="text/javascript" src="../librerias/bootstrap.min.js"></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>


    <script type="text/javascript" src="../librerias/angular.min.js" ></script>
    
    <script type="text/javascript" src="../js/moduloAngularFluffy.js"></script>
    <script type="text/javascript" src="../js/ajaxVerMascotaEnAdopcion.js"></script> 
    <script type="text/javascript" src="../js/ajaxVerMascotasPerdidas.js"></script> 
    <script type="text/javascript" src="../js/ajaxVerMascotaEnCita.js"></script> 
    
    <link rel="stylesheet" type="text/css" href="../css/estiloHome.css">
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/css/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <!-- <script src="../js/home.js" charset="utf-8" type="text/javascript"></script> -->

    <title></title>
  </head>
  <body ng-app="miModulo">
    HOLAAAA SOY UNA PANTALLA LOGUEADA

    <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()">
    
    <br>
    <br/>
    <div>
      <a href="vistaMascotasEnAdopcion.php" class="btn btn-primary btn-lg active">Ir a Adopcion</a>
      <a href="vistaMascotasEnCita.php" class="btn btn-primary btn-lg active">Ir a Cita</a>
      <a href="vistaMascotasPerdidas.php" class="btn btn-primary btn-lg active">Ir a Perdidas</a>
    </div>
    
    <div class="col-sm-7" id="">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <a href="vistaMascotasDelUser.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">mostrar animales</a>
      <a href="vistaExperiencia.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Mostrar Experiencias</a>
      <a href="vistaCrearMascota.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Mascotas</a>
    </div>
    

    <!-- <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()"> -->
    <?php
    foreach ($experiencias_usuario as $experiencia => $exp) {
      echo $exp['id'];
      echo $exp['comentario'].'<br />';
    }
    ?>

    

  </body>
</html>
