<?php
class ConnQuery{

  private $servidor ="localhost";
  private $usuario = "root";
  private $pass = "1286";
  private $bd="fluffy";
  private $conn;


  function __construct(){
    $this->conn = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->bd);

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
  function prepare($sql){
    $stmt = mysqli_prepare($this->conn, $sql);
    return $stmt;
  }
  function getUltimoId(){
    return mysqli_insert_id($this->conn);
  }

}

?>
