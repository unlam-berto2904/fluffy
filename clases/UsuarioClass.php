<?php

require_once('connQuery.php');


class Usuario{
		private $id;
		private $nombre;
		private $nombreUsuario;
		private $apellido;
		//private $ubicación;
		private $id_sexo;
		private $telefono;
		//private $id_domicilio;
		private $e_mail;
		private $fechaNacimiento;
		private $ultimaConexion;
		private $pass;
		//private $conexion;
		private $fotoPerfil;

	function __construct($id, $nombre, $nombreUsuario, $apellido, $id_sexo, $telefono, $e_mail, $fechaNacimiento, $ultimaConexion, $pass, $fotoPerfil){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->nombreUsuario = $nombreUsuario;
		$this->id_sexo = $id_sexo;
		$this->apellido = $apellido;
		//$this->ubicacion = $ubicacion;
		$this->telefono = $telefono;
		//$this->id_domicilio = $id_domicilio;
		$this->e_mail = $e_mail;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->ultimaConexion = $ultimaConexion;
		$this->pass = $pass;
		$this->conexion = mysqli_connect("localhost", "root", "1286", "fluffy");
		$this->fotoPerfil = $fotoPerfil;
	}
	public static function  ingresarUsuarioUser ($usuarioUser,$usuarioPass){
		$cq = new connQuery();
		$sql = "select * from usuario where nombre_usuario = ? and contrasenia = ? ";
		$ps = $cq->prepare($sql);

		mysqli_stmt_bind_param($ps,
		"ss",
		$usuarioUser,
		$usuarioPass);

		mysqli_stmt_execute($ps);
		$consultaIsTrue = mysqli_stmt_fetch($ps);

		return $consultaIsTrue;
	}
	public static function  ingresarUsuarioEmail ($usuarioEmail,$usuarioPass){
		$cq = new connQuery();
		$sql = "select * from usuario where e_mail = ? and contrasenia = ? ";
		$ps = $cq->prepare($sql);

		mysqli_stmt_bind_param($ps,
		"ss",
		$usuarioEmail,
		$usuarioPass);

		mysqli_stmt_execute($ps);
		$consultaIsTrue = mysqli_stmt_fetch($ps);

		return $consultaIsTrue;
	}
	function persistirse(){

			if ($stmt = mysqli_prepare($this->$connQuery, "INSERT INTO usuario (nombre, id_sexo, e_mail, contrasenia, nombre_usuario, apellido) VALUE (?, ?, ?, ?, ?, ?)")){
				mysqli_stmt_bind_param($stmt, "sissss",
										$this->nombre,
										$this->id_sexo,
										$this->e_mail,
										$this->pass,
										$this->nombreUsuario,
										$this->apellido);


				mysqli_stmt_execute($stmt);
				$persistido = mysqli_stmt_fetch($stmt);
				return $persistido;
			}
		}
			function persistirse2(){
				$cq = new connQuery();
				$sql = "insert into usuario (nombre, id_sexo, e_mail, contrasenia, nombre_usuario, apellido) VALUE (?, ?, ?, ?, ?, ?)";
				$ps = $cq->prepare($sql);
				mysqli_stmt_bind_param($ps,
					"sissss",
				 	$this->nombre,
					$this->id_sexo,
					$this->e_mail,
					$this->pass,
					$this->nombreUsuario,
					$this->apellido);

				mysqli_stmt_execute($ps);
			}

		public static function actualizarHoraDeConexion($idUsuario){
			$connQuery =  new connQuery();
			date_default_timezone_set('America/Buenos_Aires');
		  $fechaUltimaConexion = (new \DateTime())->format('y-m-d H:i:s');
		  $ultimaConexion= "update usuario set ultima_conexion = '".$fechaUltimaConexion."' where id_usuario = ".$idUsuario;
			$connQuery->ejecutarConsulta($ultimaConexion);
		}

		function editarse(){
			$conexion = new ConnQuery();
			$sql = "UPDATE usuario
					SET nombre = ?,
					id_sexo = ?,
					e_mail = ?,
					contrasenia = ?,
					nombre_usuario = ?,
					apellido = ?,
					telefono = ?,
					ultima_conexion = ?,
					fecha_nacimiento = ?,
					foto_usuario = ?
					WHERE id_usuario = ?";

			$stmt =  $conexion->prepare($sql);

			mysqli_stmt_bind_param($stmt, "sissssssssi",
									$this->nombre,
									$this->id_sexo,
									$this->e_mail,
									$this->pass,
									$this->nombreUsuario,
									$this->apellido,
									$this->telefono,
									$this->ultimaConexion,
									$this->fechaNacimiento,
									$this->fotoPerfil,
									$this->id);
			mysqli_stmt_execute($stmt);
			$editado = mysqli_stmt_fetch($stmt);
			return $editado;

		}
		public static function getNotificacionesUsuarioById($idUsuario){
			$cq = new connQuery();
	    $sql = "select          ur.nombre                       usuario_receptor,
							                ue.foto_usuario                 foto_usuario_emisor,
							                ue.nombre                       nombre_usuario_emisor,
							                ue.apellido                     apellido_usuario_emisor,
							                n.fecha_hora_notificacion       fecha_notificacion,
							                n.descripcion                   descpricion_notificacion
								from notifiacion n
								join usuario ur on ur.id_usuario = n.id_usuario_receptor
								join usuario ue on ue.id_usuario =  n.id_usuario_emisor
								where ur.id_usuario =".$idUsuario;

	    $filas = $cq->ejecutarConsulta($sql);
	    $notifiaciones = array();

	    while ($fila =  mysqli_fetch_assoc($filas)) {
	      $notifiacion = array( 'usuarioReceptor' => $fila['usuario_receptor'],
															'fotoUsuarioEmisor' => $fila['foto_usuario_emisor'],
															'nombreUsuarioEmisor' => $fila['nombre_usuario_emisor'],
															'apellidoUsuarioEmisor' => $fila['apellido_usuario_emisor'],
															'fechaNotificacion' => $fila['fecha_notificacion'],
															'descripcionNotificacion' => $fila['descpricion_notificacion']
	           										);
				$notifiaciones[] = $notifiacion;
				}
			return $notifiaciones;
		}
}
?>
