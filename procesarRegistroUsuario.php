<?php
require("connQuery.php");
$conexion = new connQuery();

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

<<<<<<< HEAD
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
?>
=======
	 $sql = "insert into usuario( nombre, apellido, id_sexo, e_mail, fecha_nacimiento, contrasenia, nombre_usuario)
	 					values  (	'".$nombre."',
											'".$apellido."',
											".$id_sexo.",
											'".$e_mail."',
											'".$fechaNacimiento."',
											'".$pass."',
											'".$nombreUsuario."')";

	$respuesta = $conexion->ejecutarConsulta($sql);
  header("location:index.php");
?>
>>>>>>> 93b4ffa434de938fe9e6bdf4c958252cbb7da5ac
