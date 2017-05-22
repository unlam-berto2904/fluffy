<?php
	
	 $nombre = $_POST["nombre"];
	 $apellido = $_POST["apellido"];
	 $id_sexo = $_POST["sexo"];
	 $fechaNacimiento = $_POST["fechaNacimiento"];
	 $e_mail = $_POST["e_mail"];
	 $nombreUsuario = $_POST["nombreUsuario"];
	 $pass = $_POST["contrasenia"];
	 $ubicación;
	 $telefono;
	 $id_domicilio;
	 $ultimaConexion;

	 require("connQuery.php");

	 $conexion = new connQuery();

	 //INSERT INTO NombreTabla [(Campo1, …, CampoN)] VALUES (Valor1, …, ValorN)
	 $sql = "insert into 'usuario' ('nombre', 'id_ubicacion', 'id_sexo', 'telefono', 'id_domicilio', 'e_mail', 'fecha_nacimiento', 'ultima_conexion', 'contrasenia', 'nombre_usuario', 'apellido') values ('".$nombre."', ".$ubicación.", ".$id_sexo.", ".$telefono.", ".$id_domicilio.", '".$e_mail."', '".$fechaNacimiento."', ".$ultimaConexion.", ".$pass.", '".$nombreUsuario."', '".$apellido."');";

	 //$respuesta = $conexion->ejecutarConsulta($sql);
	 echo $sql;
	 //header("location:index.php");
?>