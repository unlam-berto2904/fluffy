<?php
require ('../clases/UsuarioClass.php');
// require ('../clases/ConnQuery.php');

session_start();
if (isset($_SESSION["usuario"])) {
  $id_usuario = $_SESSION["usuario"];
  $nombreUsuario = $_SESSION["arrayUsuario"]['nombre'];
  $apellidoUsuario = $_SESSION["arrayUsuario"]['apellido'];
  $fotoUsuario = $_SESSION["arrayUsuario"]['foto_usuario'];
  $sexo = $_SESSION['arrayUsuario']['id_sexo'];
  $fechaNacimiento = $_SESSION['arrayUsuario']['fecha_nacimiento'];
  $email = $_SESSION['arrayUsuario']['e_mail'];
  $pass = $_SESSION['arrayUsuario']['contrasenia'];
  $telefono = $_SESSION['arrayUsuario']['telefono'];
  $fotoPerfil = $_SESSION['arrayUsuario']['foto_usuario'];
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
    <link href="../librerias/bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="../librerias/fuentes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/estiloHome.css" rel="stylesheet">
    <link href="../css/estiloPerfilMascotaExterno.css" rel="stylesheet">

    <!-- Angular -->
    <script type="text/javascript" src="../librerias/angular.min.js" ></script>
    <!-- Modulo angular -->
    <script type="text/javascript" src="../js/moduloAngularFluffy.js"></script>
    <!-- Controladores angular -->
    <script type="text/javascript" src="../js/ajaxVerMascotaEnAdopcion.js"></script>
    <script type="text/javascript" src="../js/ajaxVerMascotasPerdidas.js"></script>
    <script type="text/javascript" src="../js/ajaxVerMascotaEnCita.js"></script>

  </head>


  <body class="nav-sm" ng-app="miModulo">
    <div id="wrapper">
      <div id="sidebar-wrapper" class="rankingDeMascotasTitulo">
        <i class="fa fa-paw"></i>
        <span>Fluffy</span></a>
          <h1>Ranking de Valoraciones</h1>
          <ul class="sidebar-nav" id="rankingDeMascotas" class="rankingMascotasDiv">
            <li id="Perros"></li>
            <li id="Gatos"></li>
          </ul>
      </div>
      <div class="container body" id="page-content-wrapper">
        <div class="main_container">
          <div class="col-md-3 left_col mascotasUser" >
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href = "#" class="site_title" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-paw" ></i>
                  <span>Fluffy</span>
                </a>
              </div>
              <br/>
              <!-- Listado lateral para seleccionar mascota-->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <ul class="nav side-menu side-menu-mascota" id="mascotasUserSection">
                    <input type="hidden" name="usuario" value="<?php echo $id_usuario; ?>" id="idUsuario">
                    <?php $mascotas = json_decode($_POST["mascotas"],true);
                    foreach ($mascotas as $mascotaUser => $mascota){ ?>

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
                            <li><a href="../controladores/cambiarMascotaACitaController.php?cita=1&mascota=<?= $mascota['muroMascota'] ?>">Poner en Cita</a></li>
                            <li><a href="../controladores/cambiarMascotaACitaController.php?cita=0&mascota=<?= $mascota['muroMascota'] ?>">Sacar de Cita</a></li>
                            <li><a href="../controladores/cambiarMascotaAPerdidoController.php?perdido=1&mascota=<?= $mascota['muroMascota'] ?>">Reportar como perdido</a></li>
                            <li><a href="../controladores/cambiarMascotaAPerdidoController.php?perdido=0&mascota=<?= $mascota['muroMascota'] ?>">Sacar de Perdido</a></li>
                            <li><a href="../controladores/cambiarMascotaAAdopcionController.php?adopcion=1&mascota=<?= $mascota['muroMascota'] ?>">Poner en Adopcion</a></li>
                            <li><a href="../controladores/cambiarMascotaAAdopcionController.php?adopcion=0&mascota=<?= $mascota['muroMascota'] ?>">Sacar de Adopcion</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modalGenerarQR">Genenerar código QR</a></li>

                          </ul>
                        </div>
                      </li>
                      <?php
                       } ?>
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
                      <li><a href="javascript:;" data-toggle="modal" data-target="#cajonDeNotificaciones" id="cajonNotificacion" data-id="<?php echo $id_usuario?>">Cajon de notificaciones</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#myModalEditarUsuario">Editar datos del Usuario</a></li>
                      <li><a href="#menu-toggle" id="menu-toggle">Ranking de Valoraciones</a></li>
                      <li><a href="../controladores/cerrarSesionController.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                    </ul>
                </ul>
              </nav>
            </div>
          </div>
          <!-- Fin de la barra superior -->

  		<!-- Contenedor donde estará todo el contenido  -->
      <div ng-controller="controladorEnCita">
        <div ng-controller="controladorEnAdopcion">
          <div ng-controller="controladorPerdidos">
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
                  <div class="cont col-sm-11 col-sm-push-2 " id="experienciasSection">
                      <?php $experiencias = json_decode($_POST["experiencias"],true);
                      foreach ($experiencias as $experiencia => $exp) { ?>
                        <div class="panel panel-default" id="experiencia_<?php echo $exp['id']?>">
                          <div class="panel-heading panel-heading-experiencias">
                            <a href="#" class="pull-right" id="verMascota" data-toggle="modal" data-target="#modalPerfilMascota" data-id="<?php echo $exp['muroMascota']?>">Ver mascota</a>
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
                                  </div>
                                    <form class="" action="../controladores/crearComentarioExternoController.php" method="post">
                                      <input type="hidden" name="idExperiencia" value="<?php echo $exp['id'] ?>">
                                      <input type="hidden" name="idUsuario" value="<?php echo $id_usuario ?>">
                                      <div class="input-group-btn">
                                        <input type="text" name="comentarioExterno"class="form-control" placeholder="Agrega un comentario..">
                                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
                                      </div>
                                  </form>
                                </div>
                          </div>
                        </div>
                      <?php }?>
                  </div>
                </div>
                <!-- SECCION DE CITA  -->
                <div  class="col-sm-10">
        		      <div id="citas" class="cont col-sm-11 col-sm-push-2 ">

                      <div ng-init="traerCitas()">

                        <div class="panel panel-default" ng-model="mascota" ng-repeat="mascota in mascotas">
                          <div class="panel-heading panel-heading-experiencias">
                            <img src="../{{mascota.fotoPerfil}}" class="fotoComentario"/>
                            <h2>{{mascota.nombreMascota}}</h2>

                          </div>
                          <div class="panel-body">
                            <h4>Sexo: {{mascota.sexo}}</h4>
                            <h4>Raza: {{mascota.raza}}</h4>
                            <h5>Fecha de nacimiento: {{mascota.fechaNacimiento}}</h5>
                            <h6>propietario: {{mascota.nombreUsuario}} </h6>
                            <a href="#" class="btn btn-default" value="" data-id="1" style=" float: right; ">Me interesa tener una cita</a>
                          </div>
                        </div>

                        <br />
                        <input type="button" name="verCitaConcatenado" ng-click="traerCitas()" class="btn btn-info" value="Ver m&aacute;s">
                      </div>

                  </div>
                </div>
                <!-- SECCION DE PERDIDOS  -->
      		      <div id="perdidos" class="cont">
                  <div ng-init="verMascotasPerdidas()">

                    <div class="panel panel-default" ng-model="perdido" ng-repeat="perdido in perdidos">
                      <div class="panel-heading panel-heading-experiencias">
                            <img src="../{{perdido.fotoPerfil}}" class="fotoComentario"/>
                            <h2>{{perdido.nombreMascota}}</h2>

                          </div>
                          <div class="panel-body">
                            <h4>Sexo: {{perdido.sexo}}</h4>
                            <h4>Raza: {{perdido.raza}}</h4>
                            <h5>Fecha de nacimiento: {{perdido.fechaNacimiento}}</h5>
                            <h6>propietario: {{perdido.nombreUsuario}} </h6>
                          </div>
                        </div>

                    <br />
                    <input type="button" name="verPerdidosConcatenado" ng-click="verMascotasPerdidas()" class="btn btn-info" value="Ver m&aacute;s">
                  </div>
                </div>
                <!-- SECCION DE ADOPCION  -->
      		      <div id="adopcion" class="cont">
                  <div  ng-init="verMascotasEnAdopcion()">

                    <div class="panel panel-default" ng-model="adopcion" ng-repeat="adopcion in enAdopcion">
                      <div class="panel-heading panel-heading-experiencias">
                            <img src="../{{adopcion.fotoPerfil}}" class="fotoComentario"/>
                            <h2>{{adopcion.nombreMascota}}</h2>

                          </div>
                          <div class="panel-body">
                            <h4>Sexo: {{adopcion.sexo}}</h4>
                            <h4>Raza: {{adopcion.raza}}</h4>
                            <h5>Fecha de nacimiento: {{adopcion.fechaNacimiento}}</h5>
                            <h6>propietario: {{adopcion.nombreUsuario}} </h6>
                          </div>
                        </div>

                    <br />
                    <input type="button" name="verAdopcionConcatenado" ng-click="verMascotasEnAdopcion()" class="btn btn-info" value="Ver m&aacute;s">
                  </div>
                </div>
                <!-- FIN SECCION DE CITA PERDIDO ADOPCION -->
      		    </div>
          	</div>
          </div>
        </div>
      </div>


    <!-- MODAL PARA EDITAR USUARIO-->
    <div id="myModalEditarUsuario" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar perfil de usuario</h4>
          </div>
          <div class="modal-body">
          <!-- FORMULARIO DE EDICION DE USUARIO -->
            <form action="../controladores/editarUsuarioController.php" method="post">
              <input type="hidden" name="idUsuarioEditarUsuario" id="idUsuarioEditarUsuario" value="<?= $id_usuario?>">
              <div class="form-group col-md-12">
                <label>Modificar el nombre de usuario</label>
                <input type="text" class="form-control" name="nuevoNombreUsuario" value="<?= $nombreUsuario ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Nuevo nombre</label>
                <input type="text" class="form-control" name="nuevoNombre" value="<?= $nombreUsuario ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Nuevo apellido</label>
                <input type="text" class="form-control" name="nuevoApellido" value="<?= $apellidoUsuario ?>">
              </div>

              <div class="form-group col-md-12">
                <label>Cambiar fecha de nacimiento</label>
                <input type="date" class="form-control" name="nuevaFechaNacimiento" value="<?= $fechaNacimiento ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Cambiar E-mail</label>
                <input type="text" class="form-control" name="nuevoE_mail" value="<?=$email ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Cambiar Telefono</label>
                <input type="text" class="form-control" name="nuevoTelefono" value="<?=$telefono ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Cambiar foto de perfil</label>
                <input type="file" class="form-control" name="nuevaFoto" value="<?=$fotoPerfil ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Cambiar el sexo</label>
                <select class="form-control" name="nuevoSexo" >
                  <option value="<?= $sexo ?>">- Seleccione un sexo -</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label>Modificar contraseña</label>
                <input type="password" class="form-control" name="nuevaContrasenia" value="<?= $pass ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Repita la contraseña modificada</label>
                <input type="password" class="form-control" name="contrasenia2" value="<?= $pass ?>">
              </div>
              <div class="text-center col-md-12">
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

<!-- MODAL PARA Mostrar QR-->
    <div id="modalGenerarQR" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Generación de código QR</h4>
            <p>Este código contiene un link a la vista pública de tu mascota. Puedes imprimirlo y colocarlo en el collar de ella, para que funcione como Documento de Identidad de tu mascota.</p>
          </div>
          <div class="modal-body">
            <img src="../controladores/generadorDeCodigoQRController.php?idMuro=14"> 
            <a href="#" class="btn btn-default">Imprimir</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                <div  ng-controller="controlador" ng-init="cargar()">
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
    <!-- Fin modal de mascota -->

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
              <div class="form-group col-md-12">
                <label for="usr">Foto: </label>
                <input type="file" name="archivoExperiencia" value="">
              </div>
              <div class="form-group col-md-12">
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


    <!-- Modal perfil de mascota-->
    <div class="modal fade bs-example-modal-lg" id="modalPerfilMascota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
          <div class="modal-body" id="perfilMascotaDiv">
            <?php $perfilMascota = json_decode($_POST["perfilMascota"],true);
            ?>
            <div class="col-lg-12 col-sm-12">
          	  <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" src="../<?php echo $perfilMascota['fotoMascota'] ?>">
                </div>
                <div class="useravatar">
                    <img alt="" src="../<?php echo $perfilMascota['fotoMascota'] ?>">
                </div>
                <div class="card-info"> <span class="card-title"><?php echo $perfilMascota['nombreMascota'] ?></span>

                </div>
            </div>

            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="fa fa-paw" aria-hidden="true"></span>
                        <div class="hidden-xs">Informaci&oacute;n de la mascota</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <div class="hidden-xs">Mi dueño</div>
                    </button>
                </div>
            </div>

             <div class="well col-sm-12">
              <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                  <h3>Nombre: <?php echo $perfilMascota['nombreMascota'] ?></h3>
                  </br><h3>Tipo de animal: <?php echo $perfilMascota['tipoAnimal'] ?></h3>
                  </br><h3>Raza: <?php echo $perfilMascota['razaMascota'] ?></h3>
                  </br><h3>Sexo: <?php echo $perfilMascota['sexoAnimal'] ?></h3>
                  </br><h3>Fecha de nacimiento: <?php echo $perfilMascota['fechNacMascota'] ?></h3>
                </div>

                <div class="tab-pane fade in" id="tab2">
                 <div class="col-sm-6">
                 	<img alt="" class="img-rounded thumbnail" src="../<?php echo $perfilMascota['fotoDuenio'] ?>">
                 </div>

                 <div class="col-sm-6">
                 </br><h3>Nombre y Apellido: </br><?php echo $perfilMascota['nombreDuenio'] ?> <?php echo $perfilMascota['apellidoDuenio'] ?> </h3>
                </br><h3>Ultima vez en linea: </br> <?php echo $perfilMascota['ultimaConexUsuario'] ?></h3>
                </br><h3>E-Mail: <?php echo $perfilMascota['emailDuenio'] ?></h3>
                 </div>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Fin modal perfil de mascota -->

    <!-- Modal de Notificaciones -->
    <div class="modal fade bs-example-modal-lg" id="cajonDeNotificaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
          <div class="modal-body" id="notificacionesDiv">
            <ul class="list-group">
              <?php $notificaciones = json_decode($_POST["notificacionesDeUser"],true);
              foreach ($notificaciones as $notificacion => $not){ ?>
                <li class="list-group-item list_notificaciones notificacionUser  list_comentariosExternos">
                    <img alt="" src="../<?php echo $not['fotoUsuarioEmisor'] ?>">
                    <label><?php echo $not['nombreUsuarioEmisor'] ?> <?php echo $not['apellidoUsuarioEmisor'] ?></label>
                    <p class="comentarioUsuario"><em><?php echo $not['descripcionNotificacion'] ?></em></p>
                    <span><?php echo $not['fechaNotificacion'] ?></span>
                </li>
                <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Modal de Notificaciones -->

    <script src="../librerias/jquery/jquery.min.js"></script>
    <script src="../js/vistaMascotasDelUser.js" charset="utf-8" type="text/javascript"></script>
    <script src="../js/vistaExperiencia.js" charset="utf-8" types="text/javascript"></script>
    <script src="../js/menu_home.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/rankingDeMascotas.js" charset="utf-8" type="text/javascript"> </script>
    <script src="../js/ajaxCargaMascota.js" type="text/javascript" ></script>
    <script src="../js/notificacionUser.js" type="text/javascript" ></script>
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>

    <!-- Scripts JS -->
    <script src="../js/menu_home.js"></script>
    <script src="../js/perfilExterno.js"></script>
  </body>
</html>
