<?php
Class Usuario{

	private $id;
	private $nombre;
	private $nombreUsuario;
	private $apellido;
	private $ubicación;
	private $id_sexo;
	private $telefono;
	private $id_domicilio;
	private $e_mail;
	private $fechaNacimiento;


	
	function _construct_($id, $nombre, $nombreUsuario, $apellido, $ubicación, $id_sexo, $telefono, $id_domicilio, $e_mail, $fechaNacimiento){

		$this->id = $id;
		$this->nombre = $nombre;
		$this->nombreUsuario = $nombreUsuario;
		$this->id_sexo = $id_sexo;
		$this->apellido = $apellido;
		$this->ubicacion = $ubicacion;
		$this->telefono = $telefono;
		$this->id_domicilio = $id_domicilio;
		$this->e_mail = $e_mail;
		$this->fechaNacimiento = $fechaNacimiento;
	}

	function agregarMascota(){

	}
}
?>
