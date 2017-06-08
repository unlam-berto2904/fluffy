<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
require ('../clases/ConnQuery.php');
session_start();

if (isset($_SESSION["usuario"])) {
  $id_usuario = ($_SESSION["usuario"]);

  date_default_timezone_set('America/Buenos_Aires');
  $fechaUltimaConexion = (new \DateTime())->format('y-m-d H:i:s');
  $ultimaConexion= "update usuario set ultima_conexion = '".$fechaUltimaConexion."' where id_usuario = ".$id_usuario;
  $connQueryInsertDateConexion = new connQuery();
  $connQueryInsertDateConexion->ejecutarConsulta($ultimaConexion);

}
else {
  session_destroy();
  header("location:index.php");
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

  </body>
</html>
