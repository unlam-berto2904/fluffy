<?php			
	require ('../clases/UsuarioClass.php');
	require ("../clases/MuroMascotaClass.php");
	require ("../clases/MascotaClass.php");


	/*
	$id = Null;
	$idUsuario = $_GET["id_usuario"];
	$sexo = $_POST["sexoMascota"];
	$fechaNacimiento = $_POST["fechaNacimiento"];
	$urlLite = Null;
	$nombre = $_POST["nombre"];
	$idMuroMascota = Null;
	$idRaza = $_POST["raza"];
	$idAnimal = $_POST["animal"];
	*/
	//$id = Null;
	$Usuario = $_GET["id_usuario"];
	$idUsuario = (int)$Usuario;
	$sexo = 4;
	$fechaNacimiento = "2017-01-01";
	$urlLite = "URL";
	$nombre = "Firulais";
	$idMuroMascota = Null;
	$idRaza = 1;
	$idAnimal = 1;

	
	$adopcion = 0;
	$cita = 0;
	$perdido = 0;
	
	$muroMascota = new MuroMascota($adopcion, $cita, $perdido);
	$idMuroMascota = $muroMascota->persistirMuroMascota();
	
	$mascota = new Mascota($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal);
	var_dump($mascota);
	die();
	$resultado_ingreso = $mascota->persistirMascota();
	$resultado_consulta = Mascota::ingresarMascota($id,$nombre);

	if(!$consultaIsTrue){
		header("location:../index.php");
	}else{
		echo "<h1>Ha ocurrido un error</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>