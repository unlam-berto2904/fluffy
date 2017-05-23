<!DOCTYPE html>
<?php
require ('usuarioClase.php');
session_start();

if (isset($_SESSION["usuario"])) {
    echo $_SESSION["usuario"];
}
else {
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
