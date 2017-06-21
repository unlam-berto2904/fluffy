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
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    <div class="col-sm-7" id="experienciasSection">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <?php $experiencias = json_decode($_POST["experiencias"],true);
      foreach ($experiencias as $experiencia => $value) { ?>
        <div class="panel panel-default" id="experiencia_<?php echo $value['id']?>">
          <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
            <div class="panel-body">
              <p>
                <img src="//placehold.it/150x150" class="img-circle pull-right">
                <p><?php echo $value['id']; ?></p>
              </p>
              <div class="clearfix"></div>
              <hr>
              <?php echo $value['comentario']; ?>
              <hr>
              <ul class="list-group">
                <li class="list-group-item"><img src="//placehold.it/150x150" class="fotoComentario"/><label>nombre Usuario</label> <p>Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.</p></li>
              </ul>
              <form>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                  </div>
                  <input type="text" class="form-control" placeholder="Add a comment..">
                </div>
              </form>
          </div>
        </div>
      <?php }?>
    </div>
  </body>
</html>
