<?php

/*
	 $nombre = $_POST["nombre"];
	 $apellido = $_POST["apellido"];
	 $id_sexo = $_POST["sexo"];
	 $fechaNacimiento = null;
	 $e_mail = $_POST["e_mail"];
	 $nombreUsuario = $_POST["nombreUsuario"];
	 $pass = $_POST["contrasenia"];
	 $ubicación = null;
	 $telefono = null;
	 $id_domicilio = null;
	 $ultimaConexion = null;


	 require("connQuery.php");

	 $conexion = new connQuery();

	 

	 $sql = "INSERT INTO usuario (nombre, id_sexo, e_mail, contrasenia, nombre_usuario, apellido) VALUE (
	 																	'".$nombre."',
	 																	".$id_sexo.",								  
	 																	'".$e_mail."', 
	 																	'".$pass."', 
	 																	'".$nombreUsuario."', 
	 																	'".$apellido."');";

	 $respuesta = $conexion->ejecutarConsulta($sql);
	 
	 header("location:index.php");
	 

	 */
	
	include("Usuario.php");
	require("connQuery.php");

	 $id = null;
	 $nombre = $_POST["nombre"];
	 $apellido = $_POST["apellido"];
	 $id_sexo = $_POST["sexo"];
	 $fechaNacimiento = null;
	 $e_mail = $_POST["e_mail"];
	 $nombreUsuario = $_POST["nombreUsuario"];
	 $pass = md5($_POST["contrasenia"]);
	 $ubicación = null;
	 $telefono = null;
	 $id_domicilio = null;
	 $ultimaConexion = null;
	

	

	/*$usuario = new $Usuario($id, $nombre, $nombreUsuario, $apellido, $ubicación, $id_sexo, $telefono, $id_domicilio, $e_mail, $fechaNacimiento, $ultimaConexion, $pass);*/

	$usuario = new Usuario($nombre,$apellido, $e_mail);

	$conexion = new ConnQuery();

	$resultado = $usuario->persistirse($conexion);
	
	echo $resultado;


	//header("location:index.php");



?>









