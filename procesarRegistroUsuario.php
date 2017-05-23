<?php
require("connQuery.php");
$conexion = new connQuery();

	 $nombre = $_POST["nombre"];
	 $apellido = $_POST["apellido"];
	 $id_sexo = $_POST["sexo"];
	 $fechaNacimiento = $_POST["fechaNacimiento"];
	 $e_mail = $_POST["e_mail"];
	 $nombreUsuario = $_POST["nombreUsuario"];
	 $pass = $_POST["contrasenia"];
	 $ubicación = null;
	 $telefono = null;
	 $id_domicilio = null;
	 $ultimaConexion = null;

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
