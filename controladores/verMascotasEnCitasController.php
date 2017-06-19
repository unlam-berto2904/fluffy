<?php
	//Se requiere la clase conexxión
	//require("../clases/connQuery.php");
	require('../clases/mascotaClass.php');

	//se toman los datos de la vista que llegan por POST
	//$desde = $_POST["desde"];
	//$cantidad = $_POST["cantidad"];
	$data = json_decode(file_get_contents("php://input"));
	//var_dump($data);
	//se crea el array para pasar los resultados de la query
	$mascotasConCita = array();
	
	//se inicializa una conexion
	//$conexion = new ConnQuery();


	//se realiza la consulta con statement prepare desde helper de Mascota
	$mascotasConCita = Mascota::traerCitas($data->desde, $data->cantidad);
	
	//prueba harcodeada
	//$mascotasConCita = ['id_mascota'=>1,'nombreMascota'=>'juan'];

	echo json_encode($mascotasConCita); 

?>