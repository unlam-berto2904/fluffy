<?php
// require ('../clases/ConnQuery.php');
require_once ('../clases/UsuarioClass.php');

require_once ('../clases/experienciaClass.php');

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
  $_SESSION["arrayUsuario"] = $connQuery->getFila($queryStringIngresoEmail);
  Usuario::actualizarHoraDeConexion($idUsuario);
  header("location: ../vistas/pantallaLogueada.php");

}else if ($resultadoConUserName) {
  Usuario::actualizarHoraDeConexion($idUsuario);
  $queryStringIngresoUser = 'select * from usuario where nombre_usuario = "'.$usuarioIngreso.'" and contrasenia ="'.$passIngreso.'"';
  $idUsuario = $connQuery->getFila($queryStringIngresoUser)['id_usuario'];
  $_SESSION["usuario"] = $idUsuario;
  $_SESSION["arrayUsuario"] = $connQuery->getFila($queryStringIngresoUser);
  header("location:../vistas/pantallaLogueada.php");
}else {
    session_destroy();
    //header("location:../index.php");
    echo "fallo ingreso";
  }

?>
