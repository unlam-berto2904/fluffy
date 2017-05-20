<?php
require ('connQuery.php');

$usuarioIngreso = $_POST["user"];
$passIngre = $_POST["pass"];

$usuarioRegistro = $_POST['userReg'];

$queryIngreso = "select * from usuario";
$connQuery = new connQuery();

$queryIngreso = $connQuery->ejecutarConsulta($queryIngreso);
$resultado = mysqli_num_rows($queryIngreso);
if ($resultado) {
  session_start();
  header("location:pantallaLogueada.php");

}else {
  header("location:index.php");
}


?>
