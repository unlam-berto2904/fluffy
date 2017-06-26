<?php
// require('ConnQuery.php');

Class ComentarioExterno{

  private $id_comentario_externo;
  private $id_usuario;
  private $id_experiencia;
  private $comentario;

  public static function getComentariosExternosByIdExperiencia($id_experiencia){
    $cq = new connQuery();
    $sql = "select  ce.id_comentario_externo    id_comentario_externo,
                    ce.comentario               comentario_externo,
                    u.nombre                    nombre,
                    u.apellido                  apellido,
                    u.foto_usuario              foto_usuario,
                    ce.fecha_hora_comentario    fecha_hora_comentario
                      from experiencia e
                      join comentario_externo ce on e.id_experiencia = ce.id_experiencia
                      join usuario u on u.id_usuario = ce.id_usuario
                      where e.id_experiencia = ".$id_experiencia."
                      order by ce.fecha_hora_comentario asc";

    $filas = $cq->ejecutarConsulta($sql);

    $comentariosExternos = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $comentario = array( 'idComentarioExterno' => $fila['id_comentario_externo'],
                            'comentarioExterno' => $fila['comentario_externo'],
                            'nombreUsuario' => $fila['nombre'],
                            'apellidoUsuario' => $fila['apellido'],
                            'fotoUsuario' => $fila['foto_usuario'],
                            'fechaHoraComentario' => $fila['fecha_hora_comentario']
                            );

      $comentariosExternos[] = $comentario;
    }
    return $comentariosExternos;
  }




}
 ?>
