<?php
class ConnQuery
{
  private $servidor ="localhost";
  private $usuario = "root";
  private $pass = "abrh++++";
  private $bd="fluffy";
  private $conn;


  function __construct(){
    $this->conn = mysqli_connect( $this->servidor,
                            $this->usuario,
                            $this->pass,
                            $this->bd);
  }

  function ejecutarConsulta($sql){
    $resultado = mysqli_query($this->conn,$sql);
    return $resultado;
  }

}

?>
