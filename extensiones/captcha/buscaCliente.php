<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT c.cod_cliente, c.dsc_cliente, c.dsc_documento, c.cod_tipo_documento, c.flg_juridico, c.dsc_telefono_1, d.dsc_direccion, c.cod_cliente FROM vtama_cliente c INNER JOIN vtade_cliente_direccion d ON c.cod_cliente=d.cod_cliente where c.cod_cliente = '$cod' OR c.dsc_documento = '$cod' AND d.flg_comprobante='SI';");

        if ($sql) {
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
                $respuesta = $key['dsc_cliente'].'/'.$key['cod_tipo_documento'].'/'.$key['dsc_documento'].'/'.$key['flg_juridico'].'/'.$key['dsc_telefono_1'].'/'.$key['dsc_direccion'].'/'.$key['cod_cliente'];
          
          }
        }
       else{
           $sql = $db->consulta("SELECT cod_prospecto, dsc_prospecto, dsc_documento, cod_tipo_documento, flg_juridico  FROM vtaca_prospecto_venta where dsc_documento = '$cod'");

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
                $respuesta = $key['dsc_prospecto'].'/'.$key['cod_tipo_documento'].'/'.$key['dsc_documento'].'/'.$key['flg_juridico'];
            }
    		}    
    //var_dump($sql);
		//print_r($db);     
		echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();

    //return $respuesta;

    
?>