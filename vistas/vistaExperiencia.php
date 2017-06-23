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
    <script src="../js/home.js" charset="utf-8" type="text/javascript"></script>
    <title></title>
  </head>
  <body>
    <div class="col-sm-7" id="experienciasSection">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <?php $experiencias = json_decode($_POST["experiencias"],true);
      foreach ($experiencias as $experiencia => $exp) { ?>
        <div class="panel panel-default" id="experiencia_<?php echo $exp['id']?>">
          <div class="panel-heading">
            <!-- <a href="#" class="pull-right">View all</a> -->
            <img src="../<?php echo $exp['fotoPerfilMascota']; ?>" class="fotoComentario"/>
            <label for=""> <h4><?php echo $exp['nombreMascota']; ?></h4></label>
          </div>
            <div class="panel-body">
              <p class="text-center ">
                <img class="img-responsive img-thumbnail" onerror="this.style.display='none'" src="../<?php echo $exp['fotoExperiencia']; ?>" class="img">
              </p>
              <div class="clearfix"></div>
              <hr>
                <p><?php echo $exp['comentario']; ?></p>
              <hr>
              <ul class="list-group" id="comentariosExternosUl">
                <?php
                foreach ($exp as $exp2 => $comentariosExternos) {
                  if (!empty($comentariosExternos[$exp2])) {
                    foreach ($comentariosExternos as $ce => $comentario) {?>
                        <li class="list-group-item" id="id_comentarioExterno_<?php echo $comentario['idComentarioExterno'] ?>">
                          <img src="../<?php echo $comentario['fotoUsuario'] ?> " class="fotoComentario" onerror="this.style.display='none'"/>
                          <label><?php echo $comentario['nombreUsuario'] ?>  <?php echo $comentario['apellidoUsuario'] ?></label>
                          <p class="comentarioUsuario"><em><?php echo $comentario['comentarioExterno'] ?></em></p>
                        </li>
                    <?php
                    }
                  }
                }?>
                <?php  ?>
              </ul>
              <form>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button class="btn btn-default"><?php echo $exp['numeroValoracion'];?> <?php echo $exp['tipoValoracion'];?></button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
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
