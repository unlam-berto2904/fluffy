<?php
require_once('ConnQuery.php');

Class Mascota{

	private $idUsuario;
	private $sexo;
	private $fechaNacimiento;
	private $urlLite;
	private $nombre;
	private $idMuroMascota;
	private $idRaza;
	private $idAnimal;
	private $fotoPerfil;

	function __construct($idUsuario, $sexo, $fechaNacimiento, $urlLite, $nombre, $idMuroMascota, $idRaza, $idAnimal, $fotoPerfil){
		$this->idUsuario = $idUsuario;
		$this->sexo = $sexo;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->urlLite = $urlLite;
		$this->nombre = $nombre;
		$this->idMuroMascota = $idMuroMascota;
		$this->idRaza = $idRaza;
		$this->idAnimal = $idAnimal;
		$this->fotoPerfil = $fotoPerfil;
	}

	function persistirMascota(){
		$cq = new ConnQuery();
		$sql = "insert into mascota (	id_usuario,
																	id_sexo,
																	fecha_nacimiento,
																	url_lite,
																	nombre,
																	id_muro_mascota,
																	id_raza,
																	id_animal,
																	foto_mascota) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"iisssiiis",
		$this->idUsuario,
		$this->sexo,
		$this->fechaNacimiento,
		$this->urlLite,
		$this->nombre,
		$this->idMuroMascota,
		$this->idRaza,
		$this->idAnimal,
		$this->fotoPerfil);
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

	public static function getPerfilMascotaByIdMuroMascota($idMuroMascota){
		$cq = new connQuery();
		$sql = "select          m.nombre                nombre_mascota,
						                m.foto_mascota          foto_mascota,
						                m.fecha_nacimiento      fecha_nacimiento_mascota,
						                s.descripcion           sexo_animal,
						                r.descripcion           raza_mascota,
						                a.descripcion           tipo_animal,
						                u.nombre                nombre_duenio_mascota,
						                u.apellido              apellido_duenio_mascota,
						                u.foto_usuario          foto_usuario,
						                u.e_mail                email_usuario,
						                u.ultima_conexion       ultima_conexion_usuario
						from mascota m
						join muro_mascota mm on mm.id_muro_mascota = m.id_muro_mascota
						join usuario u on u.id_usuario = m.id_usuario
						join raza r on r.id_raza = m.id_raza
						join animal a on a.id_animal = r.id_animal
						join sexo s on s.id_sexo = m.id_sexo
						where m.id_muro_mascota = ".$idMuroMascota;

		$fila = $cq->getFila($sql);
		$perfilMascota = array( 'nombreMascota' => $fila['nombre_mascota'],
														'fotoMascota' => $fila['foto_mascota'],
														'fechNacMascota'	=> $fila['fecha_nacimiento_mascota'],
														'sexoAnimal'	=> $fila['sexo_animal'],
														'razaMascota'	=> $fila['raza_mascota'],
														'tipoAnimal'	=> $fila['tipo_animal'],
														'nombreDuenio'	=> $fila['nombre_duenio_mascota'],
														'apellidoDuenio'	=> $fila['apellido_duenio_mascota'],
														'fotoDuenio'	=> $fila['foto_usuario'],
														'emailDuenio'	=> $fila['email_usuario'],
														'ultimaConexUsuario'	=> $fila['ultima_conexion_usuario']
															);
		return $perfilMascota;
	}
}

?>
