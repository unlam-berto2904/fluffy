<?php
	require_once('../clases/UsuarioClass.php');
	
	$id = $_POST["idUsuarioEditarUsuario"];
	$nombre = $_POST["nuevoNombre"];
	$apellido = $_POST["nuevoApellido"];
	$id_sexo = $_POST["nuevoSexo"];
	$fechaNacimiento = $_POST["nuevaFechaNacimiento"];
	$e_mail = $_POST["nuevoE_mail"];
	$nombreUsuario = $_POST["nuevoNombreUsuario"];
	$pass = $_POST["nuevaContrasenia"];
	//$ubicación = Null;
	$telefono = $_POST["nuevoTelefono"];
	//$id_domicilio = Null;
	$ultimaConexion = Null;
	$fotoPerfil = $_FILES["nuevaFoto"];

// Ingreso de la foto de perfil de la mascota a carpeta resources
	//Obtengo nombre del archivo original y obtengo la extension
	$nombreFoto = $fotoPerfil['name'];
	$ext = pathinfo($nombreFoto, PATHINFO_EXTENSION);
	//creo el path para almacenar la foto donde quiero
	$pathFotoUsuario = "resources/fotosDePerfiles/usuario/usuario_".$id.".".$ext;
	move_uploaded_file($fotoPerfil['tmp_name'], "../".$pathFotoUsuario);
//Fin de ingreso de foto de perfil a la carpeta resources

	$usuario = new Usuario($id, $nombre, $nombreUsuario, $apellido, $id_sexo, $telefono, $e_mail, $fechaNacimiento, $ultimaConexion, $pass, $pathFotoUsuario);
	
	$resultado = $usuario->editarse();

	if(!$resultado){
		header("location:../vistas/home.php");
	}else{
		echo "<h1>La Edición fall&oacute;</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>