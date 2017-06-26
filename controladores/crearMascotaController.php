<?php
	require ("../clases/MuroMascotaClass.php");
	require ("../clases/mascotaClass.php");

	// $usuario = $_GET["id_usuario"];
	// $idUsuario = (int)$usuario;
	// $sexo = 4;
	// $fechaNacimiento = '2017-01-01';
	// $urlLite = "urlSarasa";
	// $nombre = "pancho";
	// $idMuroMascota = 1;
	// $idRaza = 1;
	// $idAnimal = 1;

	$usuario = $_POST["id_usuario"];
	$idUsuario = (int)$usuario;
	$sexo = $_POST["opcionesSexo"];
	$fechaNacimiento = $_POST["fechaNacimiento"];
	$urlLite = "urlSarasa";
	$nombre = $_POST["nombre"];
	$idRaza = $_POST["tipoRaza"];
	$idAnimal = $_POST["tipoAnimal"];
	$fotoPerfil = $_FILES["fotoPerfil"];

	$adopcion = 0;
	$cita = 0;
	$perdido = 0;

	$muroMascota = new MuroMascota($adopcion, $cita, $perdido);
	$idMuroMascota = $muroMascota->persistirMuroMascota();

// Ingreso de la foto de perfil de la mascota a carpeta resources
	//Obtengo nombre del archivo original y obtengo la extension
	$nombreFoto = $fotoPerfil['name'];
	$ext = pathinfo($nombreFoto, PATHINFO_EXTENSION);
	//creo el path para almacenar la foto donde quiero
	$pathFotoMascota = "resources/fotosDePerfiles/mascotas/mascota_".$usuario."_".$idMuroMascota.".".$ext;
	move_uploaded_file($fotoPerfil['tmp_name'], "../".$pathFotoMascota);
//Fin de ingreso de foto de perfil a la carpeta resources

	$mascota = new Mascota($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal, $pathFotoMascota);
	$resultado_ingreso = $mascota->persistirMascota();
	$resultado_consulta = Mascota::ingresarMascota($id,$nombre);

	if(!$consultaIsTrue){
		header("location:../vistas/home.php");
	}else{
		// echo "<h1>Ha ocurrido un error</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>
