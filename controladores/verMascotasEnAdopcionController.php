<?php
require('../clases/mascotaClass.php');

//se toman datos enviados desde el front
$data = json_decode(file_get_contents("php://input"));

//se crea una variable array
$mascotasEnAdopcion = array();


//se invoca una funcion statica de la clase mascota
$mascotasEnAdopcion = Mascota::verEnAdopcion($data->desde, $data->cantidad);

//se genera el json para enviar al front
echo json_encode($mascotasEnAdopcion);

?>



