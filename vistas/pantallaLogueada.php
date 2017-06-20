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
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <script type="text/javascript" src="../librerias/angular.min.js"></script>
    <script type="text/javascript" src="../js/ajaxVerMascotasPerdidas.js"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <!-- <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()"> -->
    <?php
    foreach ($experiencias_usuario as $experiencia => $exp) {
      echo $exp['id'];
      echo $exp['comentario'].'<br />';
    }
    ?>


    <!-- Comienzo de prueba ver Mascotas Perdidas -->
    <div ng-app="verPerdidos" ng-controller="controlador">
      <input type="button" name="verPerdidos" value="ver mascotas perdidas" ng-click="verMascotasPerdidas()">
      <ul ng-model="perdido">
        <li ng-repeat="perdido in perdidos">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>{{perdido.nombreMascota}}</h3>
            </div>
            <div class="panel-body">
              <h6>{{perdido.nombreUsuario}} </h6>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- fin de prueba -->
  </body>
</html>
