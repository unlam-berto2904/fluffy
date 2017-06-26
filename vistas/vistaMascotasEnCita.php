
<!DOCTYPE html>
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
    <title>MASCOTAS EN CITA</title>
  </head>
  <body ng-app="miModulo">
  	<div ng-controller="controladorEnCita" >
      <input type="button" name="verEnCita" value="abrir el modal de Citas" ng-click="traerCitas()" data-toggle="modal" data-target="#myModalEnCita">

      <!-- modal Perdidos-->
      <div id="myModalEnCita" class="modal fade" role="dialog">
        <div class="modal-dialog">      
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Mascotas En Citas</h4>
            </div>
            <div class="modal-body">
              <div>       
                <ul ng-model="mascota" class="list-group">
                  <li ng-repeat="mascota in mascotas" class="list-group-item">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3>{{mascota.nombreMascota}}</h3>
                      </div>
                      <div class="panel-body">
                        <h6>{{mascota.nombreUsuario}} </h6>
                      </div>
                    </div>
                  </li>
                </ul>
                <br />
                <input type="button" name="verCitaConcatenado" ng-click="traerCitas()" class="btn btn-info" value="Ver m&aacute;s">
              </div>              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="vaciarCita()">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div> 

  </body>
</html>
