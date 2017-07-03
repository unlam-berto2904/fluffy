<?php
  require ('../clases/mascotaClass.php');

  $animales = array();
  $perros = consultarTipoAnimal("perro");
  $gatos = consultarTipoAnimal("gato");

  $animales[] = $perros;
  $animales[] = $gatos;

  function consultarTipoAnimal($tipoAnimal){
    $cq = new connQuery();
    $sqlPerro = "select       m.nombre                    nombre_mascota,
                              sum(e.valoracion)           valoraciones
    from mascota m
    left join experiencia e on m.id_muro_mascota = e.id_muro_mascota
    where m.id_animal = (select id_animal from animal where descripcion = '".$tipoAnimal."')
    group by m.id_muro_mascota
    order by e.valoracion desc
    limit 10";

    $filas = $cq->ejecutarConsulta($sqlPerro);
    $mascotas = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $mascota = array(   'nombreMascota' => $fila['nombre_mascota'],
                          'valoraciones'	=> $fila['valoraciones']
                        );
    $mascotas[] = $mascota;
  }
  return $mascotas;

  }


  echo json_encode($animales,true);
 ?>
