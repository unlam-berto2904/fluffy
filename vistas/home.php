<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fluffy</title>

    <!-- Bootstrap -->
    <link href="../librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="../librerias/fuentes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Estilo css -->
    <link href="../css/estiloHome.css" rel="stylesheet">
  </head>

  <body class="nav-md">
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
                    <li>
                        <a><div class=" img-caption img-thumbnail"><img class="perfil_mascota" src="../resources/fotoPerfil/default_user.png"></div></a>
                    </li>
                    <li>
                        <a><div class=" img-caption img-thumbnail"><img class="perfil_mascota" src="../resources/fotoPerfil/default_user.png"></div></a>
                    </li>
                    <li>
                        <a><div class=" img-caption img-thumbnail"><img class="perfil_mascota" src="../resources/fotoPerfil/default_user.png"></div></a>
                    </li>
                    <li>
                        <a><div class=" img-caption img-thumbnail"><img class="perfil_mascota" src="../resources/fotoPerfil/default_user.png"></div></a>
                    </li>
                    <!-- cada mascota -->
                    
                    
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
                  
                <a id="menu_toggle"><i class="fa fa-4x fa-chevron-right"></i></a>
                  
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

      </div>
    </div>

    <!-- jQuery -->
    <script src="../librerias/jquery/jquery.min.js"></script>
    <!-- Js del Bootstrap -->
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
    <!-- Scripts JS -->
    <script src="../js/estilo_home.js"></script>

  </body>
</html>
