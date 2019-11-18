<?php
@session_start();
require_once "../../modelo/conexion.php";
   $usuario = $_GET['usuario'];
   $usuario = strtoupper($usuario);
   $pass = $_GET['pass'];
   $pass = strtoupper($pass);
   $db = new Conexion();                                             

    $sql = $db->consulta("SELECT * FROM pr04_tab0002 where cod_usuario = '$usuario' AND dsc_clave = '$pass' AND flg_activo = 'SI'");
    // echo "SELECT * FROM scfma_usuario where cod_usuario = '$usuario' AND dsc_clave = '$pass' AND flg_activo = 'SI'";
    $datos = array();
    echo count($db->recorrer($sql)).'ww';
    while($key = $db->recorrer($sql)){
            $datos[] =  $key;
            $_SESSION['user'] =  $key['cod_usuario']; 
            $bar = $key['dsc_usuario'];
            $_SESSION['nombre'] = ucwords(strtolower($bar));             
    }        

    if ($sql) {
       // $rows = rows( $sql );
       // if($rows == true){
       //  echo 'true';
       // }
       // else{
       //  echo 'false';
       // }
      echo 'true';
    }

    $db->liberar($sql);
 		$db->cerrar();  
?>