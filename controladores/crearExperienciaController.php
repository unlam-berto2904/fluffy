<?php
	require ("../clases/experienciaClass.php");

  $archivoExperiencia = $_FILES["archivoExperiencia"];
  $comentario = $_POST["comentarioExperiencia"];
  $idMuroMascota = (int)$_POST["muroMascota"];


  date_default_timezone_set('America/Buenos_Aires');
  $fechaExperiencia = (new \DateTime())->format('y-m-d H:i:s');


	$experiencia = new Experiencia($idMuroMascota,$comentario,$fechaExperiencia);
	$idExperiencia = $experiencia->persistirExperiencias();
  // Ingreso de la foto de perfil de la mascota a carpeta resources
  //Obtengo nombre del archivo original y obtengo la extension
  $nombreFoto = $archivoExperiencia['name'];
  $ext = pathinfo($nombreFoto, PATHINFO_EXTENSION);
  //creo el path para almacenar la foto donde quiero
  $pathFotoMascota = "resources/fotosDeExperiencias/experiencia_".$idExperiencia.".".$ext;
  move_uploaded_file($archivoExperiencia['tmp_name'], "../".$pathFotoMascota);
  //Fin de ingreso de foto de perfil a la carpeta resources
	$resultado_consulta = Experiencia::actualizarFotoExperiencia($idExperiencia,$pathFotoMascota);

	if(!$consultaIsTrue){
		header("location:../vistas/home.php");
	}else{
		// echo "<h1>Ha ocurrido un error</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>
