<?php
require_once('connQuery.php');

Class SolicitudAdopcion{

	private $id_usuario;
	private $id_muro_mascota;

	function __construct($id_usuario, $id_muro_mascota){
		$this->id_usuario = $id_usuario;
		$this->id_muro_mascota = $id_muro_mascota;
	}

	function persistirSolicitudAdopcion(){
		$cq = new ConnQuery();
		$sql = "insert into solicitud_adopcion (id_usuario, id_muro_mascota ) VALUE (?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"ii",
		$this->id_usuario,
		$this->id_muro_mascota);
		mysqli_stmt_execute($ps);
	}

	public static function getSolicitudesByIdMuroMascota($idMuroMascota){
			$cq = new connQuery();
			$sql = "select          u.id_usuario    id_usuario,
															u.nombre        nombre_user_solicitante,
							                u.apellido      apellido_user_solicitante,
							                u.foto_usuario  foto_user_solicitante
						from solicitud_adopcion sa
						join usuario u on u.id_usuario =  sa.id_usuario
						where sa.id_muro_mascota = ".$idMuroMascota.";";

			$filas = $cq->ejecutarConsulta($sql);
			$usuariosSolicitantes = array();

			while ($fila =  mysqli_fetch_assoc($filas)) {
				$usuarioSolicitante = array( 'idUsuario' => $fila['id_usuario'],
															'nombreUserSolicitante' => $fila['nombre_user_solicitante'],
															'apellidoUserSolicitante'	=> $fila['apellido_user_solicitante'],
															'fotoUserSolicitante'	=> $fila['foto_user_solicitante']
																);
				$usuariosSolicitantes[] = $usuarioSolicitante;
				}
			return $usuariosSolicitantes;
	}
}
?>
