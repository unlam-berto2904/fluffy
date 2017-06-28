<?php
require('ConnQuery.php');
require ('comentarioExternoClass.php');

Class Experiencia{

  private $id_muro_mascota;
  private $comentario_experiencia;
  private $fecha_experiencia;
  private $foto_experiencia;
  private $video_experiencia;
  private $valoracion;

  function __construct($id_muro_mascota,$comentario_experiencia,$fecha_experiencia){
    $this->id_muro_mascota = $id_muro_mascota;
    $this->comentario_experiencia = $comentario_experiencia ;
    $this->fecha_experiencia = $fecha_experiencia;
  }

  function persistirExperiencias(){
		$cq = new ConnQuery();
		$sql = "insert into experiencia(id_muro_mascota,
                                    fecha_experiencia,
                                    comentario_experiencia,
                                    valoracion)
                values(?,?,?,0)";
		$ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
		"iss",
		$this->id_muro_mascota,
    $this->fecha_experiencia,
		$this->comentario_experiencia);
		mysqli_stmt_execute($ps);
    $ultimoId = $cq->getUltimoId();
    return $ultimoId;

	}
  public static function actualizarFotoExperiencia($id, $foto){
    $cq = new ConnQuery();
    $sql = "update experiencia set foto_experiencia = ? where id_experiencia = ? ;";
    $ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
    "si",
    $foto,
    $id);
    mysqli_stmt_execute($ps);
  }
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
                    join animal a on m.id_animal = a.id_animal
                    order by e.fecha_experiencia desc";
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
  public static function valorarExperiencia($idUsuario,$idExperiencia){
    $cq = new ConnQuery();
    $sql = "insert into valoracion_experiencia_usuario(id_usuario,id_experiencia) values(?,?)";
    $ps = $cq->prepare($sql);
		mysqli_stmt_bind_param($ps,
    "ii",
    $idUsuario,
    $idExperiencia);
    mysqli_stmt_execute($ps);
// ---------------------------------------------------------------
    $sql2 = "select  e.id_experiencia, count(*) numeroValoracion
                from valoracion_experiencia_usuario veu
                join experiencia e on e.id_experiencia = veu.id_experiencia
                group by id_experiencia having e.id_experiencia = ".$idExperiencia.";";
    $numeroDeValoracion = (int)$cq->getFila($sql2)['numeroValoracion'];
//------------------------------------------------------------------
    $sql3 = "update experiencia set valoracion = ? where id_experiencia = ? ;";
    $ps2 = $cq->prepare($sql3);
    mysqli_stmt_bind_param($ps2,
    "ii",
    $numeroDeValoracion,
    $idExperiencia);
    mysqli_stmt_execute($ps2);
// --------------------------------------------------------------------
  }
}
?>
