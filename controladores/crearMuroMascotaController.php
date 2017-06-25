<?php 
	require ("../clases/MuroMascotaClass.php");

	$id = Null;
	$adopcion = 0;
	$cita = 0;
	$perdido = 0;

	$muroMascota = new MuroMascota($adopcion, $cita, $perdido);
	$resultado_ingreso_muro = $muroMascota->persistirMuroMascota();
	
	if(!$consultaIsTrue){
		header("location:../index.php");
	}else{
		echo "<h1>Ha ocurrido un error</h1><h3>Debera volver a intentarlo</h3><a href='index.php'>Volver a Fluffy</a>";
	}
?>