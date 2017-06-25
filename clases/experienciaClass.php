<?php
require('ConnQuery.php');
require ('comentarioExternoClass.php');

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
    $sql = "select  e.id_experiencia            id_experiencia,
                    e.comentario_experiencia    comentario_experiencia,
                    m.nombre                    nombre_mascota,
                    m.foto_mascota              foto_perfil_Mascota,
                    e.foto_experiencia          foto_experiencia,
                    a.tipo_valoracion           tipo_valoracion,
                    e.valoracion                numero_valoracion
                    from experiencia e
                    join mascota m on m.id_muro_mascota = e.id_muro_mascota
                    join animal a on m.id_animal = a.id_animal;";
    $filas = $cq->ejecutarConsulta($sql);

    $experiencias = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $experiencia = array( 'id' => $fila['id_experiencia'],
                            'comentario' => $fila['comentario_experiencia'],
                            'nombreMascota' => $fila['nombre_mascota'],
                            'fotoPerfilMascota' => $fila['foto_perfil_Mascota'],
                            'fotoExperiencia' => $fila['foto_experiencia'],
                            'tipoValoracion' => $fila['tipo_valoracion'],
                            'numeroValoracion' => $fila['numero_valoracion']
                            );
      $comentarios_externos = ComentarioExterno::getComentariosExternosByIdExperiencia($fila['id_experiencia']);
      $experiencia[] = $comentarios_externos;
      $experiencias[] = $experiencia;
    }
    return $experiencias;
  }
  public static function valorarExperiencia($id_experiencia){

  }
}
?>
