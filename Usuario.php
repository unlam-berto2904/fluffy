<?php
Class Usuario{

	//private $id;
	private $nombre;
	//private $nombreUsuario;
	private $apellido;
	/*private $ubicación;
	private $id_sexo;
	private $telefono;
	private $id_domicilio;*/
	private $e_mail;
	/*private $fechaNacimiento;
	private $ultimaConexion;
	private $pass;*/


	
	function _construct_(/*$id, */$nombre, /*$nombreUsuario, */$apellido/*, $ubicación, $id_sexo, $telefono, $id_domicilio, $e_mail, $fechaNacimiento, $ultimaConexion, $pass*/){

		//$this->id = $id;
		$this->nombre = $nombre;
		//$this->nombreUsuario = $nombreUsuario;
		//$this->id_sexo = $id_sexo;
		$this->apellido = $apellido;
		/*$this->ubicacion = $ubicacion;
		$this->telefono = $telefono;
		$this->id_domicilio = $id_domicilio;*/
		$this->e_mail = $e_mail;
		/*$this->fechaNacimiento = $fechaNacimiento;
		$this->ultimaConexion = $ultimaConexion;
		$this->pass = $pass;*/
	}

	function persistirse($conexion){
		$sql = "INSERT INTO usuario (nombre, /*id_sexo, */e_mail, /*contrasenia, nombre_usuario, */apellido) VALUE (
	 																	?, ?, ?);"; //statement prepared
		$resultado = mysqli_query($this->nombre, /*$this->id_sexo, */$this->e_mail, /*$this->pass, $this->nombreUsuario, */$this->apellido);  // bind para ejecutar consulta y despues un ejecute
		return $resultado;	 																	

	}
}
?>
