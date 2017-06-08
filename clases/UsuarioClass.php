<?php
require("ConnQuery.php");
$conn = new ConnQuery();


Class Usuario{
		private $id;
		private $nombre;
		private $nombreUsuario;
		private $apellido;
		//private $ubicación;
		private $id_sexo;
		private $telefono;
		private $id_domicilio;
		private $e_mail;
		private $fechaNacimiento;
		private $ultimaConexion;
		private $pass;
		private $conexion;

	function __construct($id, $nombre, $nombreUsuario, $apellido, $id_sexo, $telefono, $id_domicilio, $e_mail, $fechaNacimiento, $ultimaConexion, $pass){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->nombreUsuario = $nombreUsuario;
		$this->id_sexo = $id_sexo;
		$this->apellido = $apellido;
		//$this->ubicacion = $ubicacion;
		$this->telefono = $telefono;
		$this->id_domicilio = $id_domicilio;
		$this->e_mail = $e_mail;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->ultimaConexion = $ultimaConexion;
		$this->pass = $pass;
		$this->conexion = mysqli_connect("localHost", "root", "abrh++++", "fluffy");
	}

	function persistirse( ){
		if ($stmt = mysqli_prepare($this->conexion, "INSERT INTO usuario (nombre, id_sexo, e_mail, contrasenia, nombre_usuario, apellido) VALUE (?, ?, ?, ?, ?, ?)")){
			mysqli_stmt_bind_param($stmt, "sissss", $this->nombre, $this->id_sexo, $this->e_mail, $this->pass, $this->nombreUsuario, $this->apellido);
			mysqli_stmt_execute($stmt);
			$persistido = mysqli_stmt_fetch($stmt);
			return $persistido;
		}
	}
}
?>
