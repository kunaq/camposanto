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

	}//function mdlGuardaDetalle

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
			return $arrData;
		}else{
			$arrData = array('cod' => '0', 'msg'=> 'error al registrar contrato');
			return $arrData;
		}
		return $datos;
	}//function ejecutaProcedureGeneraCtto

	static public function mdlguardaDscto($datos, $tabla){
		$db = new Conexion();
		$sql = $db->consulta("INSERT INTO $tabla (cod_localidad, cod_contrato, num_servicio, cod_tipo_descuento, flg_tasa, flg_libre, imp_valor, imp_dscto, fch_registro, cod_usuario, flg_periodo_carencia, cod_tipo_ctt, cod_tipo_programa ) VALUES ('".$datos["ls_localidad"]."', '".$datos["ls_num_contrato_new"]."', '".$datos["ls_num_servicio_new"]."', '".$datos["ls_tipo_dscto"]."', '".$datos["ls_flg_tasa"]."', '".$datos["ls_flg_libre"]."', ".$datos["lde_valor_dscto"].", ".$datos["lde_imp_dscto"].", '".$datos["ldt_fch_actual"]."', '".$datos["gs_usuario"]."', '".$datos["ls_flg_periodo"]."', '".$datos["ls_tipo_ctt_new"]."', '".$datos["ls_tipo_programa_new"]."' )");
		if($sql){
			return 1;
		}else{
			return "error";
		}

	}//function mdlguardaDscto

	static public function mdlGuardaEndoso($datos, $tabla){
		$db = new Conexion();
		$sql = $db->consulta("INSERT INTO $tabla ( cod_localidad, cod_contrato, num_servicio, cod_entidad, imp_valor, cod_usuario, fch_registro, fch_vencimiento, cod_estado, imp_saldo, imp_total_emitido, cod_tipo_ctt, cod_tipo_programa ) VALUES ( '".$datos['ls_localidad']."', '".$datos['ls_num_contrato_new']."', '".$datos['ls_num_servicio_new']."', '".$datos['ls_endoso']."', ".$datos['lde_valor_endoso'].", '".$datos['gs_usuario']."', '".$datos['ldt_fch_actual']."', CONVERT(DATE,'".$datos['ldt_fecha_venc']."',105), 'REG', ".$datos['lde_valor_endoso'].", 0.00, '".$datos['ls_tipo_ctt_new']."', '".$datos['ls_tipo_programa_new']."' )");
		if($sql){
			return 1;
		}else{
			return "error";
		}
	} //function mdlGuardaEndoso

	static public function mdlGuardaBeneficiario($datos, $tabla){
		$db = new Conexion();

		// -- Maxima linea de beneficiario -- //

		$sql = $db->consulta("SELECT MAX($tabla.num_item) FROM $tabla WHERE	$tabla.cod_localidad = '".$datos['ls_localidad']."' AND	$tabla.cod_tipo_ctt = '".$datos['ls_tipo_ctt_new']."' AND $tabla.cod_tipo_programa = '".$datos['ls_tipo_programa_new']."' AND $tabla.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_num_contrato_new']."',10))");
		echo "SELECT MAX($tabla.num_item) FROM $tabla WHERE	$tabla.cod_localidad = '".$datos['ls_localidad']."' AND	$tabla.cod_tipo_ctt = '".$datos['ls_tipo_ctt_new']."' AND $tabla.cod_tipo_programa = '".$datos['ls_tipo_programa_new']."' AND $tabla.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_num_contrato_new']."',10))";
		$li_max_item = arrayMapUtf8Encode($db->recorrer($sql));
		// var_dump($li_max_item);

		if(is_null($li_max_item[0]) || $li_max_item[0] == ''){
		 $li_max_item = 0;
		}
		
		// -- Beneficiario -- //

		// -- Linea -- //
	
		$li_linea_benef = $datos['li_i'] + $li_max_item;
		
		// -- Insertar -- //
		
		$sql1 = $db->consulta("INSERT INTO $tabla ( cod_localidad, cod_contrato, num_item, num_servicio, dsc_apellidopaterno, dsc_apellidomaterno, dsc_nombre, cod_tipo_documento, dsc_documento, fch_nacimiento, fch_entierro, num_nivel, fch_deceso, cod_religion, cod_lugar_deceso, cod_motivo_deceso, flg_autopsia, num_peso, num_talla, cod_parentesco, cod_estado_civil, cod_sexo, cod_tipo_ctt, cod_estado, fch_alta, cod_tipo_programa ) VALUES ( '".$datos['ls_localidad']."', '(RIGHT('0000000000'+'".$datos['ls_num_contrato_new']."',10))', ".$li_linea_benef.", '".$datos['ls_num_servicio_new']."', '".$datos['ls_ape_paterno_benef']."', '".$datos['ls_ape_materno_benef']."', '".$datos['ls_nombre_benef']."', '".$datos['ls_tipo_doc_benef']."', '".$datos['ls_num_doc_benef']."', CONVERT(DATE,'".$datos['ldt_nacimiento']."',105), NULL, NULL, CONVERT(DATE,'".$datos['ldt_deceso']."',105), '".$datos['ls_religion']."', '".$datos['ls_lugar_deceso']."', '".$datos['ls_motivo_deceso']."', '".$datos['ls_flg_autopsia']."', '".$datos['lde_peso']."', '".$datos['lde_talla']."', '".$datos['ls_parentesco']."', '".$datos['ls_estado_civil']."', '".$datos['ls_sexo']."', '".$datos['ls_tipo_ctt_new']."', 'VIG', '".$datos['ldt_fch_actual']."', '".$datos['ls_tipo_programa_new']."')");
		echo "INSERT INTO $tabla ( cod_localidad, cod_contrato, num_item, num_servicio, dsc_apellidopaterno, dsc_apellidomaterno, dsc_nombre, cod_tipo_documento, dsc_documento, fch_nacimiento, fch_entierro, num_nivel, fch_deceso, cod_religion, cod_lugar_deceso, cod_motivo_deceso, flg_autopsia, num_peso, num_talla, cod_parentesco, cod_estado_civil, cod_sexo, cod_tipo_ctt, cod_estado, fch_alta, cod_tipo_programa ) VALUES ( '".$datos['ls_localidad']."', '(RIGHT('0000000000'+'".$datos['ls_num_contrato_new']."',10))', ".$li_linea_benef.", '".$datos['ls_num_servicio_new']."', '".$datos['ls_ape_paterno_benef']."', '".$datos['ls_ape_materno_benef']."', '".$datos['ls_nombre_benef']."', '".$datos['ls_tipo_doc_benef']."', '".$datos['ls_num_doc_benef']."', CONVERT(DATE,'".$datos['ldt_nacimiento']."',105), NULL, NULL, CONVERT(DATE,'".$datos['ldt_deceso']."',105), '".$datos['ls_religion']."', '".$datos['ls_lugar_deceso']."', '".$datos['ls_motivo_deceso']."', '".$datos['ls_flg_autopsia']."', '".$datos['lde_peso']."', '".$datos['lde_talla']."', '".$datos['ls_parentesco']."', '".$datos['ls_estado_civil']."', '".$datos['ls_sexo']."', '".$datos['ls_tipo_ctt_new']."', 'VIG', '".$datos['ldt_fch_actual']."', '".$datos['ls_tipo_programa_new']."')";
		if($sql){
			return 1;
		}else{
			return "error";
		}

	}//function mdlGuardaBeneficiario

	static public function mdlGuardaCronograma($datos,$tabla){
		$db = new Conexion();
		$sql = $db->consulta("INSERT INTO $tabla (cod_localidad, cod_contrato, num_refinanciamiento, num_cuota, cod_tipo_cuota, fch_vencimiento, cod_estadocuota, cod_estadocuota_ant, imp_principal, imp_interes, imp_igv, imp_total, imp_totalpagado, imp_totalemitido, imp_saldo, imp_valor_igv, cod_tipo_ctt, cod_tipo_programa, flg_generar_mora ) VALUES ( '".$datos['ls_localidad']."', '".$datos['ls_num_contrato_new']."', ".$datos['li_refinanciamiento'].", ".$datos['li_cuota'].", '".$datos['ls_tipo_cuota']."', CONVERT(DATE,'".$datos['ldt_vencimiento']."',105), 'REG', NULL, ".$datos['lde_principal'].", ".$datos['lde_interes'].", ".$datos['lde_igv'].", ".$datos['lde_total'].", 0, 0, ".$datos['lde_total'].", ".$datos['gde_igv'].", '".$datos['ls_tipo_ctt_new']."', '".$datos['ls_tipo_programa_new']."', ( CASE WHEN '".$datos['ls_tipo_cuota']."' = 'FMA' THEN 'NO' ELSE '".$datos['is_flg_generar_moras']."' END ))");
		if($sql){
			return 1;
		}else{
			return "error";
		}

	}//function mdlGuardaCronograma

	static public function mdlGeneraEspacio($datos){
		$db = new Conexion();
		$tipo_recaudacion = $datos['ls_tipo_recaudacion'];
		$sql = $db->consulta("SELECT flg_valida_espacio FROM vtama_tipo_recaudacion WHERE cod_tipo_recaudacion = '$tipo_recaudacion'");

		while($key = $db->recorrer($sql)){
			$flg_valida_espacio = $key['flg_valida_espacio'];
		}
		
		if($flg_valida_espacio == "SI"){
			$sql2 = $db->consulta("EXEC usp_vta_prc_genera_espacio '".$datos['as_camposanto']."', '".$datos['as_plataforma']."', '".$datos['as_area']."', '".$datos['as_eje_horizontal']."', '".$datos['as_eje_vertical']."', '".$datos['as_espacio']."', '".$datos['as_tipo_espacio']."'");
			
			if ($sql2) {
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}//function mdlGeneraEspacio
	
	static public function mdlGetDatosContrato($cod_localidad,$cod_contrato){
		$db = new Conexion();
		$sql = $db->consulta("SELECT DISTINCT vtade_contrato.cod_contrato, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_tipo_ctt, (SELECT vtama_cliente.dsc_documento FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_documento, vtaca_contrato.cod_camposanto_actual, (SELECT vtama_plataforma.cod_tipo_plataforma FROM vtama_plataforma WHERE vtama_plataforma.cod_camposanto = vtaca_contrato.cod_camposanto_actual AND vtama_plataforma.cod_plataforma = vtaca_contrato.cod_plataforma_actual) AS cod_tipo_plataforma, vtaca_contrato.cod_plataforma_actual, vtaca_contrato.cod_areaplataforma_actual, vtaca_contrato.cod_ejehorizontal_actual, vtaca_contrato.cod_ejevertical_actual, vtaca_contrato.cod_espacio_actual,(SELECT DISTINCT vtaca_espacio.cod_tipo_espacio FROM vtaca_espacio WHERE vtaca_espacio.cod_camposanto = vtaca_contrato.cod_camposanto_actual AND vtaca_espacio.cod_plataforma = vtaca_contrato.cod_plataforma_actual AND cod_area_plataforma = vtaca_contrato.cod_areaplataforma_actual AND cod_eje_horizontal = vtaca_contrato.cod_ejehorizontal_actual AND cod_eje_vertical = vtaca_contrato.cod_ejevertical_actual) AS cod_tipo_espacio_actual,(SELECT DISTINCT vtaca_espacio.cod_estado FROM vtaca_espacio WHERE vtaca_espacio.cod_camposanto = vtaca_contrato.cod_camposanto_actual AND vtaca_espacio.cod_plataforma = vtaca_contrato.cod_plataforma_actual AND cod_area_plataforma = vtaca_contrato.cod_areaplataforma_actual AND cod_eje_horizontal = vtaca_contrato.cod_ejehorizontal_actual AND cod_eje_vertical = vtaca_contrato.cod_ejevertical_actual) AS cod_estado_actual FROM vtade_contrato INNER JOIN vtaca_contrato ON vtaca_contrato.cod_contrato = vtade_contrato.cod_contrato WHERE vtade_contrato.cod_localidad = '$cod_localidad' AND vtade_contrato.cod_contrato  LIKE (RIGHT('0000000000'+'$cod_contrato',10))");

		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlGetDatosContrato

}//class ModeloWizard
?>