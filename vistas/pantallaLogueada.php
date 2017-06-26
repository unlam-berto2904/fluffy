<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  $experiencias_usuario = $_SESSION['experiencias'];
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
    <title></title>
  </head>
  <body ng-app="miModulo">
    HOLAAAA SOY UNA PANTALLA LOGUEADA

    <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()">
    
    <br>
    <br/>
    <a href="vistaMascotasEnAdopcion.php">Ir a Adopcion</a>
    <a href="vistaMascotasEnCita.php">Ir a Cita</a>
    <a href="vistaMascotasPerdidas.php">Ir a Perdidas</a>
    
    

    <!-- <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()"> -->
    <?php
    foreach ($experiencias_usuario as $experiencia => $exp) {
      echo $exp['id'];
      echo $exp['comentario'].'<br />';
    }
    ?>

  </body>
</html>
