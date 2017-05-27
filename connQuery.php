<?php
class ConnQuery
{
  private $servidor ="localhost";
  private $usuario = "root";
  private $pass = "digio";
  private $bd="fluffy";
  private $conn;


  function __construct(){
    $this->conn = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->bd);
  }
  
  function ejecutarConsulta($sql){
    $query = mysqli_query($this->conn,$sql);
    $resultado = mysqli_num_rows($query);
    return $resultado;
  }

  function getFila($sql){
    $query = mysqli_query($this->conn,$sql);
    $fila =  mysqli_fetch_assoc($query);
    return $fila;
  }

}

?>
