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
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <script src="../librerias/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <link href="../librerias/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../librerias/angular.min.js"></script>
    <script type="text/javascript" src="../js/ajaxCargaMascota.js"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()">

    <input type="button" name="" value="agregarMascota" onclick="agregarMascota(<?= $id_usuario ?>)">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar Mascota
    </button>
    <br>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agrega a tu Mascota</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="formulario" action="../controladores/crearMascotaController.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
              <div class="form-group">
                <label>Decinos cu&aacute;l es el nombre de tu mascota</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escrib&iacute; su nombre">
              </div>
              <div class="form-group">
                <label for="adjuntar archivo">Subi una imagen de tu mascota</label>
                <input type='file' name='fotoPerfil' id='foto' placeholder="Selecciona una foto" required>
              </div>
              <div class="form-group">
                <label>Selecciona qu&eacute; tipo de animal es y su raza</label>
                <div ng-app="traer" ng-controller="controlador" ng-init="cargar()">
                  <select name="tipoAnimal" ng-model="tipoAnimal" ng-change="cargarRaza()" class="form-control">
                    <option value="">Selecciona un tipo de animal de la lista</option>
                    <option ng-repeat="tipoAnimal in tipoAnimales" value="{{tipoAnimal.id_animal}}">{{tipoAnimal.descripcion}}</option>
                  </select>
                  <br>
                   <select name="tipoRaza" ng-model="tipoRaza" class="form-control">
                    <option value="">Eleg&iacute; una raza de la lista</option>
                    <option ng-repeat="tipoRaza in tipoRazas" value="{{tipoRaza.id_raza}}">{{tipoRaza.descripcion}}</option>
              </select>  
                </div>   
              </div>
              <div class="form-group">
              ¿De qu&eacute; sexo es?
                <div class="radio">
                  <label>
                    <input type="radio" name="opcionesSexo" id="sexoMacho" value="3">Macho
                  </label>
                </div>  
                <div class="radio">  
                  <label>
                    <input type="radio" name="opcionesSexo" id="sexoHembra" value="4">Hembra
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label>Y para terminar, ¿en qu&eacute; fecha naci&oacute;?</label>
                <input type="date" name="fechaNacimiento" class="form-control">
              </div>  
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Agregar Mascota">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
