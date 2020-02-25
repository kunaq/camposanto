<?php
class Conexion{
  private $link;
  private $nombreBD;
    public function __construct($nombreBD=''){
    $nombreBD = ($nombreBD!='') ? $nombreBD : $_SESSION["nameBd"];
    $this->link = mssql_connect(DB_HOST,DB_USER,DB_PASS);
      if(!$this->link){
          echo 'No se pudo conectar';
          exit;
      }
      if(!mssql_select_db($nombreBD, $this->link)){
          echo 'No se pudo conectar';
          exit;
      }
  }//function  __construct
  public function consulta($query){
    return mssql_query($query);
  }
  public function recorrer($query){
    return mssql_fetch_array($query);
  }
  public function rows($query){
      return mssql_num_rows($query);
  }
  public function liberar($query){
    return mssql_free_result($query);
  }
  public function cerrar(){
    return mssql_close($this->link);
  }
  public function inicioTransaccion(){
    return true;
  }
  public function beginTransaction(){
    return true;
  }
  public function commit(){
    return true;
  }
  public function rollback(){
    return true;
  }
}//class Conexion