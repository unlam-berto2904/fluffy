<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Angular -->
    <script type="text/javascript" src="../librerias/angular.min.js" ></script>
    <!-- Modulo angular -->
    <script type="text/javascript" src="../js/moduloAngularFluffy.js"></script>
    <!-- Controladores angular -->
    <script type="text/javascript" src="../js/ajaxVerMascotaEnAdopcion.js"></script> 
    <script type="text/javascript" src="../js/ajaxVerMascotasPerdidas.js"></script> 
    <script type="text/javascript" src="../js/ajaxVerMascotaEnCita.js"></script> 

    <title>Fluffy</title>

    <!-- Bootstrap -->
    <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="../librerias/fuentes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Estilo css -->
    <link href="../css/estiloHome.css" rel="stylesheet">
  </head>


  <body class="nav-sm" ng-app="miModulo">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i><span>Fluffy</span></a>
            </div>


            <br/>

            <!-- Listado lateral para seleccionar mascota-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                	<!-- cada mascota -->
                    <li>
                        <a><div class=" img-caption img-thumbnail"><img class="perfil_mascota" src="../resources/fotoPerfil/default_user.png"></div></a>
                    </li>
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
                    <img src="../resources/fotoPerfil/default_user.png" alt="">Nombre de usuario
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Configuraci&oacute;n</a></li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
              </ul>
            </nav>
          </div>
        </div>
        <!-- Fin de la barra superior -->

		<!-- Contenedor donde estará todo el contenido  -->
        <div ng-controller="controladorEnCita">
            <div ng-controller="controladorEnAdopcion">
              <div ng-controller="controlador">  

                <div class="tabscontent row col-md-offset-1"  >
          	      	<!-- Navegador de los tabs -->
          		    <ul class="contenido nav nav-tabs">
          	          <li class="active col-md-3"><a href="#experiencias">Experiencias</a></li>
          		      <li class="col-md-3"><a href="#citas"  >Citas</a></li>
          		      <li class="col-md-3"><a href="#perdidos" >Perdidos</a></li>
          		      <li class="col-md-3"><a href="#adopcion" >En Adopci&oacute;n</a></li>
          		    </ul>

          		      <!-- Cada contenido de cada tab -->	    

          		    <div id="contenido">
                    <div id="experiencias" class="cont">Aca van las Experiencias</div>
          		      <div id="citas" class="cont">
                      <div >
                        <div ng-init="traerCitas()">       
                          <ul ng-model="mascota" class="list-group">
                            <li ng-repeat="mascota in mascotas" class="list-group-item">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3>{{mascota.nombreMascota}}</h3>
                                </div>
                                <div class="panel-body">
                                  <h6>{{mascota.nombreUsuario}} </h6>
                                </div>
                              </div>
                            </li>
                          </ul>
                          <br />
                          <input type="button" name="verCitaConcatenado" ng-click="traerCitas()" class="btn btn-info" value="Ver m&aacute;s">
                        </div> 
                      </div>
                    </div>
          		      <div id="perdidos" class="cont">
                      <div ng-init="verMascotasPerdidas()">       
                        <ul ng-model="perdido" class="list-group">
                          <li ng-repeat="perdido in perdidos" class="list-group-item">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3>{{perdido.nombreMascota}}</h3>
                              </div>
                              <div class="panel-body">
                                <h6>{{perdido.nombreUsuario}} </h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <br />
                        <input type="button" name="verPerdidosConcatenado" ng-click="verMascotasPerdidas()" class="btn btn-info" value="Ver m&aacute;s">
                      </div>
                    </div>
                    <div id="adopcion" class="cont">
                      <div  ng-init="verMascotasEnAdopcion()">       
                        <ul ng-model="adopcion" class="list-group">
                          <li ng-repeat="adopcion in enAdopcion" class="list-group-item">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3>{{adopcion.nombreMascota}}</h3>
                              </div>
                              <div class="panel-body">
                                <h6>{{adopcion.nombreUsuario}} </h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <br />
                        <input type="button" name="verAdopcionConcatenado" ng-click="verMascotasEnAdopcion()" class="btn btn-info" value="Ver m&aacute;s">
                      </div>
                    </div>
          		    </div>
              	</div>
            </div>
          </div>
        </div> 
      </div>
    </div>	

    <!-- jQuery -->
    <script src="../librerias/jquery/jquery.min.js"></script>
    <!-- Js del Bootstrap -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
    <!-- Scripts JS -->
    <script src="../js/menu_home.js"></script>


  </body>
</html>
