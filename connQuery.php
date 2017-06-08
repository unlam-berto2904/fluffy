<?php
class ConnQuery
{
  private $servidor ="localhost";
  private $usuario = "root";

  private $pass = "abrh++++";

  private $bd="fluffy";
  private $conn;


  function __construct(){
    $this->conn = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->bd);
    return $this->conn;
  }

  function ejecutarConsultaIsTrue($sql){
    $query = mysqli_query($this->conn,$sql);
    $resultado = mysqli_num_rows($query);
    return $resultado;
  }
  function ejecutarConsulta($sql){
    $query = mysqli_query($this->conn,$sql);
    return $query;
  }
  function getFila($sql){
    $query = mysqli_query($this->conn,$sql);
    $fila =  mysqli_fetch_assoc($query);
    return $fila;
  }

}

?>
