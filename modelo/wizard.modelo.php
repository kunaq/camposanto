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
		$sql = $db->consulta("SELECT @@spid FROM scfma_parametros_sistema");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
	    if ($datos == null || $datos == ''){
       	    $datos = 0;
     	}
		$sqlDel = $db->consulta("DELETE  FROM vtama_temp_recaudacion WHERE vtama_temp_recaudacion.num_id = $datos");
		return $datos;
	}

	static public function mdlGuardaDetalle($tabla,$ll_id,$li_i,$ls_codigo,$li_ctd,$lde_precio_venta,$lde_det_total,$lde_cuoi,$lde_foma,$lde_cuoi_st,$lde_min_inh,$lde_precio_lista,$lde_valor_endoso,$ls_flg_ds_compartido,$lde_imp_carencia,$ls_flg_cremacion,$ls_flg_ds_temporal,$ls_flg_ssff,$lde_saldo_detalle){
		$db = new Conexion();
		$sql = $db->consulta("INSERT INTO $tabla ( num_id, num_linea, cod_servicio, num_ctd, imp_precio_venta, imp_total, imp_cuoi, imp_foma, imp_cuoi_standar, imp_min_inhumar, imp_precio_lista, imp_endoso, cod_servicio_main, flg_servicio, cod_servicio_secundario, flg_ds_compartido, imp_costo_carencia, flg_cremacion, flg_ds_temporal, flg_ssff, imp_saldo ) VALUES ( $ll_id, $li_i, $ls_codigo, $li_ctd, $lde_precio_venta, $lde_det_total, $lde_cuoi, $lde_foma, $lde_cuoi_st, $lde_min_inh, $lde_precio_lista, $lde_valor_endoso, $ls_codigo, 'SI', $ls_codigo, $ls_flg_ds_compartido, $lde_imp_carencia, $ls_flg_cremacion, $ls_flg_ds_temporal, $ls_flg_ssff, $lde_saldo_detalle)");
		if($sql){
			return "ok";
		}else{
			return "error";
		}
	}

}//class ModeloWizard
?>


<!-- EXECUTE @RC = [dbo].[usp_vta_prc_genera_contrato] @as_usuario  ,@as_cliente  ,@as_contrato_base  ,@as_num_comprobante  ,@as_contrato_reg  ,@as_tipo_comprobante  ,@as_localidad  ,@as_tipo_recaudacion  ,@as_localidad_base  ,@as_servicio_base  ,@as_tipo_ctt_base  ,@as_camposanto  ,@as_plataforma  ,@as_area  ,@as_eje_horizontal  ,@as_eje_vertical  ,@as_tipo_espacio  ,@as_convenio  ,@as_moneda  ,@as_moneda_comprob  ,@as_espacio  ,@as_tipo_necesidad  ,@adt_fch_emision  ,@ade_imp_cuoi  ,@ade_valor_igv  ,@as_flg_nuevo  ,@as_flg_comprobante  ,@as_flg_modif  ,@as_flg_regularizar  ,@as_flg_ctt_x_tn  ,@as_cod_empresa  ,@as_tipo_programa_base  ,@ai_nivel  ,@as_flg_emitir_saldo  ,@as_flg_integral  ,@as_flg_cronograma_cuoi GO -->

