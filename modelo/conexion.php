<?php

class Conexion{

  private $link;

  public function __construct(){
//     define('DB_HOST','209.45.50.210');
//     define('DB_USER','userclient');
//     define('DB_PASS','asociados517');
//     define('DB_NAME','BDUS_CK000050_PRE00');

    /*$this->link = sqlsrv_connect("kunaqfactelec.cgjpxdkt8txc.sa-east-1.rds.amazonaws.com","sa_admin","asociados517");

    $this->nombreBD = $nombreBD;*/

    $connection = array("Database"=>"BDUS_CK000050_PRE00","UID"=>"userclient","PWD"=>"asociados517",'CharacterSet' => 'UTF-8');
    $this->link = sqlsrv_connect("209.45.50.210",$connection);
    if (!$this->link) {
        echo "Error: No se pudo conectar a Sql." . PHP_EOL;
        //echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo ("error de depuración: " . sqlsrv_errors() . PHP_EOL);
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

  public function row($query){

    return sqlsrv_has_rows($query);
  }

}
