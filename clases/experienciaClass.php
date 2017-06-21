<?php
require('ConnQuery.php');

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

    $experiencias = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $experiencia = array( 'id' => $fila['id_experiencia'],
                            'comentario' => $fila['comentario_experiencia'],
                            );
      $experiencias[] = $experiencia;
    }

    return $experiencias;
  }
  public static function valorarExperiencia($id_experiencia){

  }
}
?>
