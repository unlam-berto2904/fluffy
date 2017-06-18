<?php
	//Se requiere la clase conexxión
	require("../clases/connQuery.php");

	//se toman los datos de la vista que llegan por POST
	//$desde = $_POST["desde"];
	//$cantidad = $_POST["cantidad"];
	$data = json_decode(file_get_contents("php://input"));

	//se crea el array para pasar los resultados de la query
	$mascotasConCita = array();
	
	//se inicializa una conexion
	$conexion = new ConnQuery();


	//se realiza la consulta con statement prepare desde helper de Mascota
	$mascotasConCita = Mascota::traerCitas($conexion, $data->desde, $data->cantidad);
	var_dump($mascotasConCita);

	echo json_encode($mascotasConCita); 

?>