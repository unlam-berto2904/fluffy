<?php

require("../clases/mascotaClass.php");

$data = json_decode(file_get_contents("php://input"));

$mascotasPerdidas = array();

$mascotasPerdidas = Mascota::verPerdidos($data->desde, $data->cantidad);

echo json_encode($mascotasPerdidas);

?>