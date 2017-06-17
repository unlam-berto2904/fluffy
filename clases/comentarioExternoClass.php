<?php
require('ConnQuery.php');
Class ComentarioExterno{

  private $id_comentario_externo;
  private $id_usuario;
  private $id_experiencia;
  private $comentario;

  public static function getComentariosExternosByIdExperiencia($id_experiencia){
    $cq = new connQuery();
    $sql = "select * from comentario_externo where id_experiencia = '".$id_experiencia."'";
    $filas = $cq->ejecutarConsulta($sql);

    $comentariosExternos = array();

    while ($fila =  mysqli_fetch_assoc($filas)) {
      $comentario = array( 'id' => $fila['id_experiencia'],
                            'comentario' => $fila['comentario_experiencia'],
                            );
      $comentariosExternos[] = $comentario;
    }
  }




}
 ?>
