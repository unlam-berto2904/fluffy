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
    <title>MASCOTAS EN ADOPCION</title>
  </head>
  <body ng-app="miModulo">
    <!-- Modal de Adopcion-->
    
    <div ng-controller="controladorEnAdopcion">
      <input type="button" name="verEnAdopcion"  ng-click="verMascotasEnAdopcion()" value="abrir el modal de mascotas Adoptadas" data-toggle="modal" data-target="#myModalAdopcion">

     
      <div id="myModalAdopcion" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

      
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Mascotas en Adopci&oacute;n</h4>
            </div>
            <div class="modal-body">
              <div   >
       
                <ul ng-model="adopcion" class="list-group">
                  <li ng-repeat="adopcion in enAdopcion" class="list-group-item">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3>{{adopcion.nombreMascota}}</h3>
                      </div>
                      <div class="panel-body">
                        <h6>{{adopcion.nombreUsuario}} </h6>
                      </div>
                    </div>
                  </li>
                </ul>
                <br />
                <input type="button" name="verAdopcionConcatenado" ng-click="verMascotasEnAdopcion()" class="btn btn-info" value="Ver m&aacute;s">
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="vaciarEnAdopcion()">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>