<?php 
	require ("../clases/connQuery.php");
	require ("../clases/mascotaClass.php");
	$data = json_decode(file_get_contents("php://input"));
	$output = array();
	$output = Mascota::consultarTipoRaza($data->id_animal);
	
	echo json_encode($output);

?>