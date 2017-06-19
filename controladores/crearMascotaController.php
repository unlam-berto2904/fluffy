<?php
	require ("../clases/MuroMascotaClass.php");
	require ("../clases/mascotaClass.php");

	$usuario = $_GET["id_usuario"];
	$idUsuario = (int)$usuario;
	$sexo = 4;
	$fechaNacimiento = '2017-01-01';
	$urlLite = "urlSarasa";
	$nombre = "pancho";
	$idMuroMascota = 1;
	$idRaza = 1;
	$idAnimal = 1;


	$adopcion = 0;
	$cita = 0;
	$perdido = 0;

	$muroMascota = new MuroMascota($adopcion, $cita, $perdido);
	$idMuroMascota = $muroMascota->persistirMuroMascota();

	$mascota = new Mascota($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal);
	$resultado_ingreso = $mascota->persistirMascota();
	$resultado_consulta = Mascota::ingresarMascota($id,$nombre);

	if(!$consultaIsTrue){
		header("location:../vistas/pantallaLogueada.php");
	}else{
		// echo "<h1>Ha ocurrido un error</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>
