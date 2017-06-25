<?php 
	require ("../clases/connQuery.php");
	require ("../clases/mascotaClass.php");
	$output = array();
	$output = Mascota::consultarTipoAnimal();
	
	echo json_encode($output);

?>