<?php
// require('ConnQuery.php');

Class Mascota{

	private $idUsuario;
	private $sexo;
	private $fechaNacimiento;
	private $urlLite;
	private $nombre;
	private $idMuroMascota;
	private $idRaza;
	private $idAnimal;

	function __construct($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal){
		$this->idUsuario = $idUsuario;
		$this->sexo = $sexo;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->urlLite = $urlLite;
		$this->nombre = $nombre;
		$this->idMuroMascota = $idMuroMascota;
		$this->idRaza = $idRaza;
		$this->idAnimal = $idAnimal;
	}

	function persistirMascota(){
		$cq = new ConnQuery();
		$sql = "insert into mascota (id_usuario, id_sexo, fecha_nacimiento, url_lite, nombre, id_muro_mascota, id_raza, id_animal) VALUE (?, ?, ?, ?, ?, ?, ?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"iisssiii",
		$this->idUsuario,
		$this->sexo,
		$this->fechaNacimiento,
		$this->urlLite,
		$this->nombre,
		$this->idMuroMascota,
		$this->idRaza,
		$this->idAnimal);
		$persistenciaMascota = mysqli_stmt_execute($ps);
	}

	public static function  ingresarMascota ($id,$nombre){
		$cq = new ConnQuery();
		$sql = "select * from mascota where id = ? and nombre = ? ";
		$ps = $cq->prepare($sql);

		mysqli_stmt_bind_param($ps,
		"is",
		$idMascota,
		$nombre);

		mysqli_stmt_execute($ps);
		$consultaIsTrue = mysqli_stmt_fetch($ps);

		return $consultaIsTrue;
	}

	public static function  consultarTipoAnimal (){
		$cq = new ConnQuery();
		$sql = "select id_animal, descripcion from animal";
		$ps = $cq->ejecutarConsulta($sql);

		$resultadoConsulta = array();
		while ($filaResultado = mysqli_fetch_assoc($ps)) {
			$resultadoConsulta[] =  $filaResultado;
		}

		return $resultadoConsulta;
	}

	public static function  consultarTipoRaza ($id_animal){
		$cq = new ConnQuery();
		$sql = "select id_raza, descripcion from raza where id_animal =".$id_animal;
		$ps = $cq->ejecutarConsulta($sql);

		$resultadoConsulta = array();
		while ($filaResultado = mysqli_fetch_assoc($ps)) {
			$resultadoConsulta[] =  $filaResultado;
		}

		return $resultadoConsulta;
	}	
}

?>