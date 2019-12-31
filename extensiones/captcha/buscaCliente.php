<?php
require_once "../../modelo/conexion.php";

   $cod = $_GET['value'];
   
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT c.cod_cliente, c.dsc_cliente, c.dsc_documento, c.cod_tipo_documento, c.flg_juridico, c.dsc_telefono_1, d.dsc_direccion, c.cod_cliente FROM vtama_cliente c INNER JOIN vtade_cliente_direccion d ON c.cod_cliente=d.cod_cliente where c.cod_cliente = '$cod' OR c.dsc_documento = '$cod' AND d.flg_comprobante='SI';");


$respuesta = "";

      if ($rows = $db->rows($sql)) {
          
          while($key = $db->recorrer($sql)){

              $respuesta = utf8_encode($key['dsc_cliente']).'/'.$key['cod_tipo_documento'].'/'.utf8_encode($key['dsc_documento']).'/'.$key['flg_juridico'].'/'.$key['dsc_telefono_1'].'/'.utf8_encode($key['dsc_direccion']).'/'.$key['cod_cliente'];
          
          }

      }else{
           $sql = $db->consulta("SELECT cod_prospecto, dsc_prospecto, dsc_documento, cod_tipo_documento, flg_juridico  FROM vtaca_prospecto_venta where dsc_documento = '$cod'");

            while($key = $db->recorrer($sql)){

                $respuesta = utf8_encode($key['dsc_prospecto']).'/'.$key['cod_tipo_documento'].'/'.$key['dsc_documento'].'/'.$key['flg_juridico'];
            }
      }

  
		echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();
    
?>