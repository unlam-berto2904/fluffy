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
    <link rel="stylesheet" type="text/css" href="../css/estiloHome.css">
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/css/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/vistaMascotasDelUser.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    <div class="col-sm-7" id="mascotasUserSection">
    <input type="hidden" name="usuario" value="<?php echo $id_usuario; ?>" id="idUsuario">
    <?php $mascotas = json_decode($_POST["mascotas"],true);
      var_dump($mascotas);
    ?>

    </div>
  </body>
</html>
