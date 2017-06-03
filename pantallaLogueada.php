<!DOCTYPE html>
<?php
require ('usuarioClase.php');
require ('connQuery.php');
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
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
  </body>
</html>
