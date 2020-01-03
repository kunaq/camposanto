<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloWizard{
	static public function mdlEdoEspacio($tabla,$camps,$plat,$area,$x,$y){
		$db = new Conexion();
		$sql = $db->consulta("SELECT distinct cod_espacio, cod_tipo_espacio, cod_estado  FROM vtaca_espacio where cod_camposanto = '$camps' and cod_plataforma = '$plat' and cod_area_plataforma = '$area' and cod_eje_horizontal = '$x' and cod_eje_vertical = '$y'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}

	static public function mdlIdentificador(){
		$db = new Conexion();

		$sql = $db->consulta("SELECT @@spid as id FROM scfma_parametros_sistema");

		$id = "";

		while($key = $db->recorrer($sql)){

			if ($key['id'] == null || $key['id'] == ''){

       	    	$id = 0;

     		}else{
     			$id = $key['id'];
     		}
		}
		$sqlDel = $db->consulta("DELETE  FROM vtama_temp_recaudacion WHERE vtama_temp_recaudacion.num_id = $id");

		return $id;
	}

	static public function mdlGuardaDetalle($tabla,$num_id,$num_linea,$cod_servicio,$num_ctd,$imp_precio_venta,$imp_total,$imp_cuoi,$imp_foma,$imp_cuoi_standar,$imp_min_inhumar,$imp_precio_lista,$imp_endoso,$flg_ds_compartido,$imp_costo_carencia,$flg_cremacion,$flg_ds_temporal,$flg_ssff,$imp_saldo){

		$db = new Conexion();

		$sql = $db->consulta("INSERT INTO $tabla ( num_id, num_linea, cod_servicio, num_ctd, imp_precio_venta, imp_total, imp_cuoi,	imp_foma, imp_cuoi_standar, imp_min_inhumar, imp_precio_lista, imp_endoso, cod_servicio_main, flg_servicio, cod_servicio_secundario, flg_ds_compartido, imp_costo_carencia, flg_cremacion, flg_ds_temporal, flg_ssff, imp_saldo) VALUES ('$num_id', '$num_linea', '$cod_servicio', '$num_ctd', $imp_precio_venta, $imp_total, $imp_cuoi, $imp_foma, $imp_cuoi_standar, $imp_min_inhumar, $imp_precio_lista, $imp_endoso, '$cod_servicio', 'SI', '$cod_servicio', '$flg_ds_compartido', $imp_costo_carencia, '$flg_cremacion', '$flg_ds_temporal', '$flg_ssff', $imp_saldo)");

		if($sql){
			return 1;
		}else{
			return "error";
		}

	}

	static public function ejecutaProcedureGeneraCtto($datos){
		$db = new Conexion();
		$sql = $db->consulta("EXEC usp_vta_prc_genera_contrato '".$datos['a_usuario']."', '".$datos['as_cliente']."', '".$datos['as_contrato_base']."', '".$datos['as_num_comprobante']."', '".$datos['as_contrato_reg']."', '".$datos['as_tipo_comprobante']."', '".$datos['as_localidad']."', '".$datos['as_tipo_recaudacion']."', '".$datos['as_localidad_base']."', '".$datos['as_servicio_base']."', '".$datos['as_tipo_ctt_base']."', '".$datos['as_camposanto']."', '".$datos['as_plataforma']."', '".$datos['as_area']."', '".$datos['as_eje_horizontal']."', '".$datos['as_eje_vertical']."', '".$datos['as_tipo_espacio']."', '".$datos['as_convenio']."', '".$datos['as_moneda']."', '".$datos['as_moneda_comprob']."', '".$datos['as_espacio']."', '".$datos['as_tipo_necesidad']."', '".$datos['adt_fch_emision']."', ".$datos['ade_imp_cuoi'].", ".$datos['ade_valor_igv'].", '".$datos['as_flg_nuevo']."', '".$datos['as_flg_comprobante']."', '".$datos['as_flg_modif']."', '".$datos['as_flg_regularizar']."', '".$datos['as_flg_ctt_x_tn']."', '".$datos['as_cod_empresa']."', '".$datos['as_tipo_programa_base']."', '".$datos['ai_nivel']."', '".$datos['as_flg_emitir_saldo']."', '".$datos['as_flg_integral']."', '".$datos['as_flg_cronograma_cuoi']."'");
		
		if($sql){
			while($key = $db->recorrer($sql)){
	    		$num_contrato = $key['num_contrato'];
	    		$num_servicio = $key['num_servicio'];
	    		$cod_tipo_ctt = $key['cod_tipo_ctt'];
	    		$cod_tipo_programa = $key['cod_tipo_programa'];
	    		$num_refinanciamiento = $key['num_refinanciamiento'];
	    		$cod_localidad = $key['cod_localidad'];

	    		$arrData = array('cod' => '1', 'num_contrato'=> $num_contrato, 'num_servicio'=>$num_servicio, 'cod_tipo_ctt'=>$cod_tipo_ctt, 'cod_tipo_programa'=> $cod_tipo_programa, 'num_refinanciamiento'=>$num_refinanciamiento, 'cod_localidad'=>$cod_localidad);
			}

			return json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}else{
			$arrData = array('cod' => '0', 'msg'=> 'error al registrar contrato');
			return json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}

		

	}

}//class ModeloWizard
?>