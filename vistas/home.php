<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  $nombreUsuario = $_SESSION["arrayUsuario"]['nombre'];
  $apellidoUsuario = $_SESSION["arrayUsuario"]['apellido'];
  $fotoUsuario = $_SESSION["arrayUsuario"]['foto_usuario'];
}
else {
  session_destroy();
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fluffy</title>
    <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../librerias/fuentes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/estiloHome.css" rel="stylesheet">
    <script type="text/javascript" src="../librerias/angular.min.js"></script>
  </head>
  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col mascotasUser" >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href = "#" class="site_title" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-paw" ></i>
                <span>Fluffy</span></a>
            </div>
            <br/>
            <!-- Listado lateral para seleccionar mascota-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu side-menu-mascota" id="mascotasUserSection">
                  <input type="hidden" name="usuario" value="<?php echo $id_usuario; ?>" id="idUsuario">
                  <?php $mascotas = json_decode($_POST["mascotas"],true);
                  foreach ($mascotas as $mascotaUser => $mascota){

                    ?>
                    <li>
                      <div class="dropdown mascotaPerfiles ">
                        <a class="dropdown-toggle aMuroMascota" data-toggle="dropdown" data-id="<?php echo $mascota['muroMascota']?>">
                          <div class="mascotaPerfiles">
                            <img class="perfil_mascota img-caption img-thumbnail" src="../<?php echo $mascota['fotoMascota'] ?>">
                            <p><?php echo $mascota['nombreMascota'] ?></p>
                          </div>
                        </a>
                        <ul class="dropdown-menu funcionesMascota">
                          <li><a href = "#" class="" data-toggle="modal" data-target="#modalExperiencias">Publicar Experiencia</a></li>
                          <li><a href="#">CSS</a></li>
                          <li><a href="#">JavaScript</a></li>
                        </ul>
                      </div>
                    </li>
                    <?php } ?>

                </ul>

              </div>

            </div>
          </div>
        </div>

        <!-- Barra superior -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i id="arrow" class="fa fa-4x fa-chevron-right" ></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../<?php echo $fotoUsuario ?>" alt=""><?php echo $nombreUsuario." ".$apellidoUsuario ?>
                    <span class=" fa fa-angle-down"></span>

                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Configuraci&oacute;n</a></li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="../controladores/cerrarSesionController.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
              </ul>
            </nav>
          </div>
        </div>
        <!-- Fin de la barra superior -->

		<!-- Contenedor donde estará todo el contenido  -->
        <div class="tabscontent row col-md-offset-1">
	      	<!-- Navegador de los tabs -->
		    <ul class="contenido nav nav-tabs">
	          <li class="active col-md-3">
              <a href="#experienciasSection" id="aExperienciaSection">
                Experiencias
              </a>
            </li>
		      <li class="col-md-3"><a href="#citas">Citas</a></li>
		      <li class="col-md-3"><a href="#perdidos">Perdidos</a></li>
		      <li class="col-md-3"><a href="#adopcion">En Adopci&oacute;n</a></li>
		    </ul>

		      <!-- Cada contenido de cada tab -->
		    <div id="contenido " class="contenidoDiv">
          <div class="col-sm-10">
            <div class="cont col-sm-11 col-sm-push-2 experienciasDiv" id="experienciasSection">
                <?php $experiencias = json_decode($_POST["experiencias"],true);
                foreach ($experiencias as $experiencia => $exp) { ?>
                  <div class="panel panel-default" id="experiencia_<?php echo $exp['id']?>">
                    <div class="panel-heading panel-heading-experiencias">
                      <a href="#" class="pull-right">View all</a>
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
                        <ul class="list-group list_comentariosExternos" id="comentariosExternosUl">
                          <?php
                          foreach ($exp as $exp2 => $comentariosExternos) {
                            if (!empty($comentariosExternos[$exp2])) {
                              foreach ($comentariosExternos as $ce => $comentario) {?>
                                  <li class="list-group-item" id="id_comentarioExterno_<?php echo $comentario['idComentarioExterno'] ?>">
                                    <div class="perfilComentario">
                                      <img src="../<?php echo $comentario['fotoUsuario'] ?> " class="fotoComentario" onerror="this.style.display='none'"/>
                                      <label><?php echo $comentario['nombreUsuario'] ?>  <?php echo $comentario['apellidoUsuario'] ?></label>
                                    </div>
                                    <p class="comentarioUsuario"><em><?php echo $comentario['comentarioExterno'] ?></em></p>
                                  </li>
                              <?php
                              }
                            }
                          }?>
                          <?php  ?>
                        </ul>
                          <div class="input-group">
                            <div class="input-group-btn">
                              <form class="" action="../controladores/valorarExperienciaController.php" method="post">
                                <input type="hidden" name="idUsuario" value="<?php echo $id_usuario ?>">
                                <input type="hidden" name="idExperiencia" value="<?php echo $exp['id'] ?>">
                                <button type="submit" class="btn btn-default"><?php echo $exp['numeroValoracion'];?> <?php echo $exp['tipoValoracion'];?></button>
                              </form>
                              <form class="" action="index.html" method="post">
                                <button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                            </div>
                              <input type="text" class="form-control" placeholder="Add a comment..">
                            </form>
                          </div>
                    </div>
                  </div>
                <?php }?>
            </div>
          </div>
		      <div id="citas" class="cont">Aca van las citas</div>
		      <div id="perdidos" class="cont">Aca va tu vieja</div>
		      <div id="adopcion" class="cont">Aca van los adoptados</div>
		    </div>
      	</div>
      </div>
    </div>
    <!-- Modal de regitrar mascota -->
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
              <div class="form-group col-md-12">
                <label>Decinos cu&aacute;l es el nombre de tu mascota</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escrib&iacute; su nombre">
              </div>
              <div class="form-group col-md-12">
                <label for="adjuntar archivo">Subi una imagen de tu mascota</label>
                <input type='file' name='fotoPerfil' id='foto' placeholder="Selecciona una foto" required>
              </div>
              <div class="form-group col-md-12">
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
              <div class="form-group col-md-12">
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
              <div class="form-group col-md-12">
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

    <!-- Modal de Crear Experiencias -->
    <div class="modal fade bs-example-modal-lg" id="modalExperiencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Publicar Experiencias</h4>
          </div>
          <div class="modal-body">
            <form class="formEjemplo" action="../controladores/crearExperienciaController.php" method="post"  enctype="multipart/form-data">
              <div class="form-group">
                <label for="usr">Foto: </label>
                <input type="file" name="archivoExperiencia" value="">
              </div>
              <div class="form-group">
                <label for="usr">Comentario: </label>
                <textarea name="comentarioExperiencia"></textarea>
              </div>
                <input id="hiddenMuro" type="hidden" name="muroMascota" value="">
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Publicar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal de mascota -->
    <script src="../librerias/jquery/jquery.min.js"></script>
    <script src="../js/vistaMascotasDelUser.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/vistaExperiencia.js" charset="utf-8" types="text/javascript"></script>
    <script src="../js/menu_home.js" type="text/javascript"></script>
    <script src="../js/ajaxCargaMascota.js" type="text/javascript" ></script>
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
