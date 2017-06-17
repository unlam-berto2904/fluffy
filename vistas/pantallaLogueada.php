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
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()">

    <input type="button" name="" value="agregarMascota" onclick="agregarMascota(<?= $id_usuario ?>)">

    <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">Abrir ventana modal</a>

    <div id="example" class="modal hide fade in" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Cabecera de la ventana</h3>
     </div>
     <div class="modal-body">
         <h4>Texto de la ventana</h4>
        <p>Mas texto en la ventana.</p>                
    </div>
    <div class="modal-footer">
        <a href="index.html" class="btn btn-success">Guardar</a>
        <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
    </div>
</div>

  <script src="jquery.js"></script>
  <script src="bootstrap-modal.js"></script>

  </body>
</html>
