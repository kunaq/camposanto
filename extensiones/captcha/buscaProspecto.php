<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_prospecto, dsc_prospecto, dsc_documento, cod_tipo_documento, flg_juridico  FROM vtaca_prospecto_venta where dsc_documento = '$cod' AND flg_cambio_activo = 'SI'");

        $datos = array();

		while($key = $db->recorrer($sql)){
          if($key['cod_tipo_documento'] == 'DI001'){
              $tipoDoc = 'DNI';
          }
          elseif ($key['cod_tipo_documento'] == 'DI002') {
              $tipoDoc = 'CARNET EXTRANJERIA';
          }
          elseif ($key['cod_tipo_documento'] == 'DI003') {
              $tipoDoc = 'PASAPORTE';
          }
          elseif ($key['cod_tipo_documento'] == 'DI004') {
              $tipoDoc = 'RUC';
          }
          elseif ($key['cod_tipo_documento'] == 'DI005') {
              $tipoDoc = 'OTROS';
          }
          else{
              $tipoDoc = 'LIBERTA ELECTORAL';
          }

            $datos[] =  $key;
            $respuesta = $key['dsc_prospecto'].'/'.$key['cod_tipo_documento'].'/'.$key['dsc_documento'].'/'.$key['flg_juridico'].'/'.$key['cod_prospecto'];    
             
		}    
		//print_r($db);     
		echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();

    //return $respuesta;

    
?>