<?php
$nombreMascota = $_GET["nombreMascota"];
$fotoMascota = $_GET["fotoMascota"];
$tipoAnimal = $_GET["tipoAnimal"];
$raza = $_GET["tipoRaza"];
$fechaNacimientoMascota = $_GET["fechaNacimiento"];
$sexo = $_GET["sexo"];

$nombreDueño = $_GET["nombreUsuario"];
$apellidoDueño = $_GET["apellidoUsuario"];
$fotoDueño = $_GET["fotoUsuario"];
$sexoDueño = $_GET["sexoUsuario"];
$ultimaConexionDue = $_GET["ultimaConexion"];


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
    <link href="../css/estiloPerfilMascotaExterno.css" rel="stylesheet">
  </head>

  <body>
  	<div class="text-center">

  		<a class="logo" href="../index.php"><i class="fa fa-paw fa-3x"></i></a>
      <a href="../controladores/crearPDFController.php?nombreMascota=<?= $nombreMascota ?>">Imrpimir PDF</a>

  	</div>


    <div class="col-lg-12 col-sm-12">
  	  <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="../resources/fotosDePerfiles/mascotas/mascota_1_2.jpg">
        </div>
        <div class="useravatar">
            <img alt="" src="../<?= $fotoMascota ?>">
        </div>
        <div class="card-info"> <span class="card-title"><?= $nombreMascota ?></span>

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
          <h3>Nombre: <?= $nombreMascota ?></h3>
        </br><h3>Tipo de animal: <?= $tipoAnimal ?></h3>
          </br><h3>Raza: <?= $raza ?></h3>
          </br><h3>Sexo: <?= $sexo ?></h3>
          </br><h3>Fecha de nacimiento: <?= $fechaNacimientoMascota ?></h3>
        </div>

        <div class="tab-pane fade in" id="tab2">
         <div class="col-sm-6">
         	<img alt="" class="img-rounded thumbnail" src="../<?php echo $fotoDueño ?>">
         </div>

         <div class="col-sm-6">
          </br><h3>Nombre: <?= $nombreDueño ?></h3>
          </br><h3>Apellido: <?= $apellidoDueño ?></h3>
          </br><h3>Sexo: <?= $sexoDueño ?></h3>
          </br><h3>Ultima conexion <?= $ultimaConexionDue ?></h3>
         </div>


        </div>

      </div>
    </div>




    <script src="../librerias/jquery/jquery.min.js"></script>
    <script src="../js/perfilExterno.js"></script>
    <script src="../librerias/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
