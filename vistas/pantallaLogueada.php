<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = ($_SESSION["usuario"]);
}
else {
  session_destroy();
  header("location: ../index.php");
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../librerias/indexplugins/plugin/bootstrap/css/bootstrap.css">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <script type="text/javascript" src="../librerias/angular.min.js" ></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()">

    <div ng-app="traerCitas" ng-controller="controlador" >
      <button ng-click="traerCitas()">ver mascotas en cita</button>
      <ul>
        <li ng-repeat="mascota in mascotasEnCita track by $index">
          <div  class="panel panel-default">
            <div class="panel-heading">
              <h3>{{mascota.nombreMascota}}</h3>
            </div>
            <div class="panel-body"></div>
           
          </div>
        </li>
      </ul>
        <input type="button" class="btn btn-success" name="verMasMascotas" value="ver mas " ng-app="traerCitas" ng-controller="controlador">
      </div>
    </div>

  </body>
</html>
<!--Script de prueba para verificar funcionamiento de traerCitas    -->
<script>  
 var desde = 0;
 var app = angular.module("traerCitas",[]);  
 app.controller("controlador", function($scope, $http){  
      $scope.traerCitas = function(){  
           $http.get("../controladores/verMascotasEnCitasController.php", {'desde':desde, 'cantidad':20})  
           .success(function(data){  
                $scope.mascotasEnCita = data;  
                desde = desde + 20;
           })  
      }  
      /*$scope.loadLocalidad = function(){  
           $http.post("load_localidad.php", {'idProvincia':$scope.provincia})  
           .success(function(data){  
                $scope.localidades = data;  
           });  
      }*/  
 });  
 </script> 