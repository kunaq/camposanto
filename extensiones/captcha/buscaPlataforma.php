<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_plataforma, dsc_plataforma, cod_tipo_plataforma  FROM vtama_plataforma WHERE cod_tipo_plataforma = '$cod' AND flg_activo = 'SI' ORDER BY cod_tipo_plataforma");

        $datos = array();
        echo "<option value = 0>Seleccione la plataforma</option>";
		while($key = $db->recorrer($sql)){
            if($key['cod_tipo_plataforma'] == 'TP002'){
              $tipoPla = 'PLAT';
          }
          elseif ($key['cod_tipo_plataforma'] == 'TP001') {
              $tipoPla = 'NICH';
          }

            $datos[] =  $key;
            echo "<option value = ".$key['cod_plataforma'].">".$tipoPla." - ".$key['cod_plataforma']." - ".utf8_encode($key['dsc_plataforma'])."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>