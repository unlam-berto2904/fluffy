<?php
require ('../clases/UsuarioClass.php');
require ('../clases/experienciaClass.php');
$connQuery = new ConnQuery();

$usuarioIngreso = $_POST["user"];
$passIngreso = $_POST["pass"];

$resultadoConUserName = Usuario::ingresarUsuarioUser($usuarioIngreso,$passIngreso);
$resultadoConEmail = Usuario::ingresarUsuarioEmail($usuarioIngreso,$passIngreso);

$idUsuario = null;
session_start();

if ($resultadoConEmail) {
  $queryStringIngresoEmail = 'select * from usuario where e_mail = "'.$usuarioIngreso.'" and contrasenia ="'.$passIngreso.'"';
  $idUsuario = $connQuery->getFila($queryStringIngresoEmail)['id_usuario'];
  $_SESSION["usuario"] = $idUsuario;
  Usuario::actualizarHoraDeConexion($idUsuario);
  Experiencia::inicioHistorias();
  header("location: ../vistas/pantallaLogueada.php");

}else if ($resultadoConUserName) {
  $queryStringIngresoUser = 'select * from usuario where nombre_usuario = "'.$usuarioIngreso.'" and contrasenia ="'.$passIngreso.'"';
  $idUsuario = $connQuery->getFila($queryStringIngresoUser)['id_usuario'];
  $_SESSION["usuario"] = $idUsuario;
  Usuario::actualizarHoraDeConexion($idUsuario);
  Experiencia::inicioHistorias();
  header("location:../vistas/pantallaLogueada.php");
}else {
    session_destroy();
    header("location:../index.php");
  }

?>
