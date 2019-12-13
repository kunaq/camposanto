<?php
@session_start();
require_once "../../modelo/conexion.php";
   $usuario = $_POST['user'];
   $usuario = strtoupper($usuario);
   $pass = $_POST['password'];
   $pass = strtoupper($pass);
   $db = new Conexion();                                             

    $sql = $db->consulta("SELECT * FROM scfma_usuario where cod_usuario = '$usuario' AND dsc_clave = '$pass' AND flg_activo = 'SI'");
    // echo "SELECT * FROM scfma_usuario where cod_usuario = '$usuario' AND dsc_clave = '$pass' AND flg_activo = 'SI'";
    $datos = array();
    // echo count($db->recorrer($sql)).'ww';
    $cont = 0;
    while($key2 = $db->recorrer($sql)){
      $cont++;  
      $datos[] =  $key2;
        $_SESSION['user'] =  $key2['cod_usuario']; 
        $bar = $key2['dsc_usuario'];
        $_SESSION['nombre'] = ucwords(strtolower($bar));
    }
    if($cont > 0){
        echo json_encode('true');   
    }else{
      echo json_encode('false');   
    }
    

    // if ($sql) {
    //    // $rows = rows( $sql );
    //    // if($rows == true){
    //    //  echo 'true';
    //    // }
    //    // else{
    //    //  echo 'false';
    //    // }
    //   echo 'true';
    // }

    $db->liberar($sql);
 		$db->cerrar();  
?>
