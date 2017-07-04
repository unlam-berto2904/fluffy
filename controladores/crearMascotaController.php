<?php
	require_once("../clases/MuroMascotaClass.php");
	require_once("../clases/mascotaClass.php");
	require_once ("../clases/UsuarioClass.php");

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

//Llamado datos de Usuario por ID
	$usuarioArray = Usuario::consultarUsuarioPorID($idUsuario);
	$animal = Mascota::consultarTipoAnimalPorID($idAnimal);
	$raza = Mascota::consultarTipoRazaPorID($idRaza);
	$sexo = Mascota::consultarSexoPorID($sexo);

//Armado de String URLLite
	$urlBase = "/perfilesExternos/perfilExternoMascota.php?nombreMascota=" . $nombre . 
															"&fotoMascota=" . $pathFotoMascota . 
															"&tipoAnimal=" . $animal .
															"&tipoRaza=" . $raza .
															"&fechaNacimiento=" . $fechaNacimiento .
															"&sexo=" . $sexo .
															"&nombreUsuario=" . $usuarioArray['nombreUsuario'] .
															"&apellidoUsuario=" . $usuarioArray['apellidoUsuario'] .
															"&fotoUsuario=" . $usuarioArray['fotoPerfilUsuario'] .
															"&sexoUsuario=" . $usuarioArray['sexoUsuario'] .
															"&ultimaConexion='" . $usuarioArray['ultimaConexion'] . 
															"'" ;
	$urlLite = $urlBase;	
	var_dump($urlLite);
	var_dump($pathFotoMascota);
	var_dump($fechaNacimiento);
	var_dump($idUsuario);
	var_dump($sexo);
	var_dump($nombre);
	var_dump($idMuroMascota);
	var_dump($idRaza);
	var_dump($idAnimal);
	
	

//Fin armado URLLite

	$mascota = new Mascota($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal, $pathFotoMascota);
	$resultado_ingreso = $mascota->persistirMascota();
	
	header("location:../vistas/home.php");
	

?>
