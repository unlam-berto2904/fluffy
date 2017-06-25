<?php
require_once('ConnQuery.php');

Class MuroMascota{

	private $id;
	private $adopcion;
	private $cita;
	private $perdido;

	function __construct($adopcion, $cita, $perdido){
		//$this->id = $id;
		$this->adopcion = $adopcion;
		$this->cita = $cita;
		$this->perdido = $perdido;
	}
		function persistirMuroMascota(){
		$cq = new ConnQuery();
		$sql = "insert into muro_mascota (adopcion, cita, perdido) VALUE (?, ?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"iii",
	 	$this->adopcion,
		$this->cita,
		$this->perdido);

		$persistenciaMascota = mysqli_stmt_execute($ps);
		$ultimoId = $cq->getUltimoId();
		return $ultimoId;
	}
}
?>
