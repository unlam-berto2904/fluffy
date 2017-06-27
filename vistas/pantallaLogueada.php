<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../librerias/jquery-3.1.1.js" charset="utf-8" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/estiloHome.css">
    <link rel="stylesheet" type="text/css" href="../librerias/boostrapVistaExperiencias/css/bootstrap.min.css">
    <script src="../librerias/boostrapVistaExperiencias/js/bootstrap.min.js" charset="utf-8" type="text/javascript"></script>
    <!-- <script src="../js/home.js" charset="utf-8" type="text/javascript"></script> -->
    <?php
        require ('../clases/UsuarioClass.php');
        session_start();
        require_once  ('../librerias/loginFacebook/helper/facebookLogin/FacebookLogin.php');

        if (isset($_SESSION["usuario"])) {
            $id_usuario = $_SESSION["usuario"];
        }
        else if( isset($_SESSION['login']) && $_SESSION['login']){
            echo "<h3>Buenas " . $_SESSION['userName'] . "!</h3>";
        } 
        
       /*else {
            echo "<h3>Error: Usted no se encuentra logueado.</h3>";
            //header('Location: ./index.php');
        }*/
    ?>
    <title></title>
  </head>
  <body>
    <div class="col-sm-7" id="">
      HOLAAAA SOY UNA PANTALLA LOGUEADA
      <a href="vistaMascotasDelUser.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">mostrar animales</a>
      <a href="vistaExperiencia.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Mostrar Experiencias</a>
      <a href="vistaCrearMascota.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Crear Mascotas</a>
    </div>
  </body>
</html>
