<?php
require ('connQuery.php');

$usuarioIngreso = $_POST["user"];
$passIngreso = $_POST["pass"];

$queryIngreso = 'select * from usuario where e_mail = "'.$usuarioIngreso.'" and contrasenia ="'.$passIngreso.'"';
$connQuery = new connQuery();

$consulta = $connQuery->ejecutarConsulta($queryIngreso);
$resultado = mysqli_num_rows($consulta);
echo $resultado;

 if ($resultado) {
  session_start();
  header("location:pantallaLogueada.php");

}else {
  header("location:index.php");
  echo $resultado;
}


?>
