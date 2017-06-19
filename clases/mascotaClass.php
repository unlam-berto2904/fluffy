<?php
require_once('ConnQuery.php');

Class Mascota{

	private $id;
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
	// function persistirMascota(){
	// 	$cq = new ConnQuery();
	// 	$sql = "insert into mascota (id_usuario, id_sexo, fecha_nacimiento, url_lite, nombre, id_muro_mascota, id_raza, id_animal) VALUE (?, ?, ?, ?, ?, ?, ?, ?)";
	// 	$ps = $cq->prepare($sql);
	// 	mysqli_stmt_bind_param($ps,
	// 	"iisssiii",
	//  	$this->id_usuario,
	// 	$this->id_sexo,
	// 	$this->fecha_nacimiento,
	// 	$this->url_lite,
	// 	$this->nombre,
	// 	$this->id_muro_mascota,
	// 	$this->id_raza,
	// 	$this->id_animal);
	// 	mysqli_stmt_execute($ps);
	// 	var_dump($persistenciaMascota);
	// 	die();
	// }
	function persistirMascota(){
		$cq = new ConnQuery();
		$sql = "insert into mascota (id_usuario, nombre, id_muro_mascota, id_raza, id_animal) VALUE (?, ?, ?, ?, ?, ?, ?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"issiii",
	 	$this->id_usuario,
		$this->nombre,
		$this->id_muro_mascota,
		$this->id_raza,
		$this->id_animal);
		mysqli_stmt_execute($ps);
		var_dump($persistenciaMascota);
		die();
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

}

?>
