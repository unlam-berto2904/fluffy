<!DOCTYPE html>
<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  // $experiencias_usuario = $_SESSION['experiencias'];
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
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    HOLAAAA SOY UNA PANTALLA LOGUEADA
    <div class="" id="holaMundo">
      <!-- <input type="button" name="" value="mostrarHistorias" onclick="mostrarUltimasHistorias()"> -->

      <?php $experiencias = json_decode($_POST["experiencias"],true);
      foreach ($experiencias as $experiencia => $value) { ?>
      <fieldset class="experienciaDiv" id="experiencia_<?php echo $value['id']?>">
        <?php echo $value['id'];
        ?>
      </fieldset>
      <?php }?>

    </div>

  </body>
</html>
