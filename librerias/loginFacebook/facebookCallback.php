<?php
/**
 * Created by PhpStorm.
 * User: fdaranno
 * Date: 29/5/17
 * Time: 21:13
 */
require_once ('../../clases/connQuery.php');
session_start();
require_once  ('helper/facebookLogin/FacebookLogin.php');
require_once ('../../clases/UsuarioClass.php');

$facebookLogin = new FacebookLogin();

if( !$facebookLogin->generateAccessToken() ){
    echo "Error al intentar login con facebook.";
    exit;
}

$_SESSION['fb_access_token'] = $facebookLogin->getFacebookAccessToken();
$_SESSION['login'] = true;
$_SESSION['userName'] = $facebookLogin->getUserName();
$_SESSION['email'] = $facebookLogin->getUserEmail();

// Persistencia sesion Facebook

	$nombreUsuario = $_SESSION['userName'];
	$email = $_SESSION['email'];

	$connQuery = new connQuery();
	$query = 'select * from usuario where nombre_usuario = "'.$nombreUsuario.'";';
	$queryStringUserExiste = $connQuery->ejecutarConsultaIsTrue($query);

	if ($queryStringUserExiste > 0) {
		$connQuery1 = new connQuery();
		$sql = 'select id_usuario from usuario where nombre_usuario = "'.$nombreUsuario.'";';
		$query1 = $connQuery1->getFila($sql)['id_usuario'];

		$idUsuario = $query1;
		$_SESSION["usuario"] = $idUsuario;
    $_SESSION["arrayUsuario"] = $connQuery->getFila($query);
  	Usuario::actualizarHoraDeConexion($idUsuario);
	}
	else {
    // $request = new FacebookRequest($session, 'GET','/{user-id}/picture');
    // $response = $request->execute();
    // $graphObject = $response->getGraphObject();

		$id = Null;
		$nombre = $_SESSION['userName'];
		$apellido = Null;
		$id_sexo = Null;
		$fechaNacimiento = Null;
		$e_mail = $_SESSION['email'];
		$nombreUsuario = $_SESSION['userName'];
		$pass = Null;
		$ubicación = Null;
		$telefono = Null;
		$id_domicilio = Null;
		$ultimaConexion = Null;

		$sql = "insert into usuario (nombre, id_sexo, e_mail, contrasenia, nombre_usuario, apellido) VALUE (?, ?, ?, ?, ?, ?)";
		$ps = $connQuery->prepare($sql);
		mysqli_stmt_bind_param($ps,
			"sissss",
		 	$nombre,
			$id_sexo,
			$e_mail,
			$pass,
			$nombreUsuario,
			$apellido);
		mysqli_stmt_execute($ps);
	}

header('Location: ../../../fluffy/vistas/home.php');
