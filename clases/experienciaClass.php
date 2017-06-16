<?php
// require('ConnQuery.php');

Class Experiencia{

  private $id_experiencia;
  private $fecha_experiencia;
  private $foto_experiencia;
  private $video_experiencia;
  private $comentario_experiencia;
  private $valoracion;
  private $id_muro_mascota;

  public static function inicioHistorias(){
    $cq = new connQuery();
    $sql = "select * from experiencia";
    $filas = $cq->ejecutarConsulta($sql);

<<<<<<< HEAD
    $types = array();

    while(($fila =  mysqli_fetch_assoc($filas))) {
      $types["id"] = $fila['id_experiencia'];
      $types["comentarios"] = $fila['comentario_experiencia'];
    }
    foreach ($types as $type) {
      echo $type;
    }
=======
    $experiencias = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $experiencia = array( 'id' => $fila['id_experiencia'],
                            'comentario' => $fila['comentario_experiencia'],
                            );
      $experiencias[] = $experiencia;
    }

    $_SESSION['experiencias'] = $experiencias;
  }
  public static function valorarExperiencia($id_experiencia){
    
>>>>>>> 6232dd70dcd9e7af3e67784fd3159a3935603a1e
  }
}
?>
