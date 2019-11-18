<?php
require_once "../../modelo/conexion.php";
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_anno FROM vtama_annos ORDER BY cod_anno DESC");

        $datos = array();
        echo "<option value='todos' selected='selected'>TODOS</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_anno'].">".$key['cod_anno']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  
?>