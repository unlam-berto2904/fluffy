<?php
require_once('connQuery.php');

Class Notificacion{

	private $id_usuario_receptor;
	private $id_usuario_emisor;
	private $fecha_hora_notificacion;
	private $descripcion;

	function __construct($id_usuario_receptor, $id_usuario_emisor, $fecha_hora_notificacion,$descripcion){
		$this->id_usuario_receptor = $id_usuario_receptor;
		$this->id_usuario_emisor = $id_usuario_emisor;
		$this->fecha_hora_notificacion = $fecha_hora_notificacion;
		$this->descripcion = $descripcion;
	}

	function persistirNotificacion(){
		$cq = new ConnQuery();
		$sql = "insert into notifiacion (id_usuario_receptor, id_usuario_emisor, fecha_hora_notificacion,descripcion) VALUE (?, ?, ?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"iiss",
		$this->id_usuario_receptor,
		$this->id_usuario_emisor,
		$this->fecha_hora_notificacion,
		$this->descripcion);
		mysqli_stmt_execute($ps);
	}
}
?>
