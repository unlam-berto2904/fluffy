<?php
	require("../clases/UsuarioClass.php");
	// require("../clases/ConnQuery.php");

	 $id = Null;
	 $nombre = $_POST["nombre"];
	 $apellido = $_POST["apellido"];
	 $id_sexo = $_POST["sexo"];
	 $fechaNacimiento = Null;
	 $e_mail = $_POST["e_mail"];
	 $nombreUsuario = $_POST["nombreUsuario"];
	 $pass = $_POST["contrasenia"];
	 $ubicación = Null;
	 $telefono = Null;
	 $id_domicilio = Null;
	 $ultimaConexion = Null;
	$usuario = new Usuario($id, $nombre, $nombreUsuario, $apellido, $id_sexo, $telefono, $id_domicilio, $e_mail, $fechaNacimiento, $ultimaConexion, $pass);
	$resultado = $usuario->persistirse2();

	if(!$resultado){
		header("location:../index.php");
	}else{
		echo "<h1>El Registro fall&oacute;</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}



?>
