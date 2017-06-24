<?php
require ('../clases/connQuery.php');
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

	function __construct($id, $idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal){
		$this->id = $id;
		$this->idUsuario = $idUsuario;
		$this->sexo = $sexo;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->urlLite = $urlLite;
		$this->nombre = $nombre;
		$this->idMuroMascota = $idMuroMascota;
		$this->idRaza = $idRaza;
		$this->idAnimal = $idAnimal;
	}
	public static function getMascotasListByIdUsuario($idUsuario){
	    $cq = new connQuery();
	    $sql = "select  mm.id_muro_mascota          muro_mascota,
							        m.nombre                    nombre_mascota,
							        m.foto_mascota              foto_mascota
											from mascota m
											join usuario u on u.id_usuario = m.id_usuario
											join muro_mascota mm on m.id_muro_mascota = mm.id_muro_mascota
											where u.id_usuario =".$idUsuario.";";

	    $filas = $cq->ejecutarConsulta($sql);
	    $mascotasUser = array();

	    while ($fila =  mysqli_fetch_assoc($filas)) {
	      $mascotaUser = array( 'muroMascota' => $fila['muro_mascota'],
	      											'nombreMascota' => $fila['nombre_mascota'],
															'fotoMascota'	=> $fila['foto_mascota']
	           										);
				$mascotasUser[] = $mascotaUser;
				}
			return $mascotasUser;
	}
}

?>
