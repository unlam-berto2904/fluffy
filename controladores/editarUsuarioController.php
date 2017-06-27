<?php

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

	$usuario = new Usuario($id, $nombre, $nombreUsuario, $apellido, $id_sexo, $telefono, $e_mail, $fechaNacimiento, $ultimaConexion, $pass);

	$resultado = $usuario->editarse();

	if(!$resultado){
		header("location:../index.php");
	}else{
		echo "<h1>El Registro fall&oacute;</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}

?>