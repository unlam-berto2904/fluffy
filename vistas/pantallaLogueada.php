<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  $nombre = $_SESSION["arrayUsuario"]['nombre'];
  $apellido = $_SESSION['arrayUsuario']['apellido'];
  $nombreUsuario = $_SESSION['arrayUsuario']['nombre_usuario'];
  $sexo = $_SESSION['arrayUsuario']['id_sexo'];
  $fechaNacimiento = $_SESSION['arrayUsuario']['fecha_nacimiento'];
  $email = $_SESSION['arrayUsuario']['e_mail'];
  $pass = $_SESSION['arrayUsuario']['contrasenia'];
}
else {
  session_destroy();
  header("location: ../index.php");
}
?>
<html>
  <head ng-app="fluffy">
    <meta charset="utf-8">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/estiloHome.css">
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/css/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <!-- <script src="../js/home.js" charset="utf-8" type="text/javascript"></script> -->
    <title></title>
  </head>
  <body>

    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalEditarUsuario">Editar Usuario</button>
    <!-- MODAL PARA EDITAR DATOS DEL USUARIO -->
    <div id="myModalEditarUsuario" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar perfil de usuario</h4>
          </div>
          <div class="modal-body">
            <form ng-modal="usuario">
              <input type="hidden" name="idUsuarioEditarUsuario" id="idUsuarioEditarUsuario" value="<?= $id_usuario?>">
              <div class="form-group">
                <label>Nuevo nombre</label>
                <input type="text" class="form-control" name="nuevoNombre" value="<?= $nombre ?>">
              </div>
              <div class="form-group">
                <label>Nuevo apellido</label>
                <input type="text" class="form-control" name="nuevoApellido" value="<?= $apellido ?>">
              </div>
              <div class="form-group">
                <label>Cambiar el sexo</label>
                <select class="form-control" name="nuevoSexo" >
                  <option value="<?= $sexo ?>">- Seleccione un sexo -</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                </select>
              </div>
              <div class="form-group">
                <label>Cambiar fecha de nacimiento</label>
                <input type="date" class="form-control" name="nuevaFechaNacimiento" value="<?= $fechaNacimiento ?>">
              </div>
              <div class="form-group">
                <label>Cambiar E-mail</label>
                <input type="text" class="form-control" name="nuevoE_mail" value="<?=$email ?>">
              </div> 
              <div class="form-group">
                <label>Cambiar Telefono</label>
                <input type="phone" class="form-control" name="nuevoTelefono" value="<?=$telefono ?>">
              </div>                    
              <div class="form-group">
                <label>Modificar el nombre de usuario</label>
                <input type="text" class="form-control" name="nuevoNombreUsuario" value="<?= $nombreUsuario ?>">
              </div>
              <div class="form-group">
                <label>Modificar contraseña</label>
                <input type="password" class="form-control" name="nuevaContrasenia" value="<?= $pass ?>">
              </div>
              <div class="form-group">
                <label>Repita la contraseña modificada</label>
                <input type="password" class="form-control" name="contrasenia2" value="<?= $pass ?>">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-default btn-xl sr-button" name="submit">Aplicar cambios</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    


    <div class="col-sm-7" id="">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <a href="vistaMascotasDelUser.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">mostrar animales</a>
      <a href="vistaExperiencia.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Mostrar Experiencias</a>
      <a href="vistaCrearMascota.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Mascotas</a>
    </div>
  </body>
</html>
