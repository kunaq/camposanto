<?php
class Conexion{
  private $link;
  public function __construct(){
    /*$this->link = sqlsrv_connect("kunaqfactelec.cgjpxdkt8txc.sa-east-1.rds.amazonaws.com","sa_admin","asociados517");
    $this->nombreBD = $nombreBD;*/
    $connection = array("Database"=>"BDUS_CK000050_0001","UID"=>"userclient","PWD"=>"asociados517",'CharacterSet' => 'UTF-8');
    $this->link = sqlsrv_connect("KQ_ANALISTA\SQLSERVER",$connection);
    if (!$this->link) {
        echo "Error: No se pudo conectar a Sql." . PHP_EOL;
        //echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . sqlsrv_errors() . PHP_EOL;
        exit;
    }
  }//function  __construct
  public function consulta($query){
    return sqlsrv_query($this->link,$query);
  }
  public function recorrer($query){
    return sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC);
  }
  public function liberar($query){
    return sqlsrv_free_stmt($query);
  }
  public function cerrar(){
    return sqlsrv_close($this->link);
  }
}