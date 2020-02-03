<?php
session_start();
class ControladorWizard{
	static public function ctrEdoEspacio(){
		$tabla = "vtaca_espacio";
		$y = $_POST['value'];
	    $x = $_POST['ejex'];
	    $area = $_POST['area'];
	    $plat = $_POST['plat'];
	    $camps = $_POST['campo'];
		$respuesta = ModeloWizard::mdlEdoEspacio($tabla,$camps,$plat,$area,$x,$y);
		return $respuesta;
	}//function ctrEdoEspacio

	static public function ctrIdentificador(){
		$respuesta = ModeloWizard::mdlIdentificador();
		// $borrar = ModeloWizard::mdlBorrarTemporal($respuesta);
		return $respuesta;
	}//function ctrIdentificador

	static public function ctrGuardaDetalle(){
		$tabla = "vtama_temp_recaudacion";
		$num_id = $_POST['num_id'];
	    $num_linea = $_POST['num_linea'];
	    $cod_servicio = $_POST['cod_servicio'];
	    $num_ctd = $_POST['num_ctd'];
	    $imp_precio_venta = (float)$_POST['imp_precio_venta'];
	    $imp_total = (float)$_POST['imp_total'];
	    $imp_cuoi = (float)$_POST['imp_cuoi'];
	    $imp_foma = (float)$_POST['imp_foma'];
	    $imp_cuoi_standar = (float)$_POST['imp_cuoi_standar'];
	    $imp_min_inhumar = (float)$_POST['imp_min_inhumar'];
	    $imp_precio_lista = (float)$_POST['imp_precio_lista'];
	    $imp_endoso = (float)$_POST['imp_endoso'];
	    $flg_ds_compartido = $_POST['flg_ds_compartido'];
	    $imp_costo_carencia = (float)$_POST['imp_costo_carencia'];
	    $flg_cremacion = $_POST['flg_cremacion'];
	    $flg_ds_temporal = $_POST['flg_ds_temporal'];
	    $flg_ssff = $_POST['flg_ssff'];
	    $imp_saldo = (float)$_POST['imp_saldo'];
	    
		$respuesta = ModeloWizard::mdlGuardaDetalle($tabla,$num_id,$num_linea,$cod_servicio,$num_ctd,$imp_precio_venta,$imp_total,$imp_cuoi,$imp_foma,$imp_cuoi_standar,$imp_min_inhumar,$imp_precio_lista,$imp_endoso,$flg_ds_compartido,$imp_costo_carencia,$flg_cremacion,$flg_ds_temporal,$flg_ssff,$imp_saldo);
		return $respuesta;
	}//function ctrGuardaDetalle

	static public function ctrEjecutaProcedureGeneraCtto(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		if ($_POST['contrato_base'] == '') {
			$as_contrato_base = NULL;
			$as_localidad_base = NULL;
			$as_tipo_ctt_base = NULL;
			$as_tipo_programa_base = NULL;
		}else{
			$as_contrato_base = $_POST['contrato_base'];
			$as_localidad_base = $_POST['localidad_base'];
			$as_tipo_ctt_base = $_POST['tipo_ctt_base'];
			$as_tipo_programa_base = $_POST['tipo_programa_base'];
		}

		$datos = array("a_usuario" => $_SESSION["user"],
						"as_cliente" => $_POST['cod_cliente'],
						"as_contrato_base" => $as_contrato_base,
						"as_num_comprobante" => NULL,
						"as_contrato_reg" => NULL,
						"as_tipo_comprobante" => NULL,
						"as_localidad" => $_SESSION['localidad'],
						"as_tipo_recaudacion" => $_POST['tipPro'],
						"as_localidad_base" => $as_localidad_base,
						"as_servicio_base" => NULL,
						"as_tipo_ctt_base" => $as_tipo_ctt_base,
						"as_camposanto" => $_POST['camposanto'],
						"as_plataforma" => $_POST['plataforma'],
						"as_area" => $_POST['area'],
						"as_eje_horizontal" => $_POST['ejex'],
						"as_eje_vertical" => $_POST['ejey'],
						"as_tipo_espacio" => $_POST['tipoEspacio'],
						"as_convenio" => $_POST['endoso'],
						"as_moneda" => 'SOL',
						"as_moneda_comprob" => NULL,
						"as_espacio" => $_POST['espacio'],
						"as_tipo_necesidad" => $_POST['tipoNec'],
						"adt_fch_emision" => $fechaActual,
						"ade_imp_cuoi" => $_POST['importeCUI'] ,
						"ade_valor_igv" => 0.18,
						"as_flg_nuevo" => $_POST['flagNvoCtto'],
						"as_flg_comprobante" => 'NO',
						"as_flg_modif" => $_POST['flg_modificacion'],
						"as_flg_regularizar" => $_POST['regularizacionCheck'],
						"as_flg_ctt_x_tn" => 'NO',
						"as_cod_empresa" => $_SESSION['codEmpresa'],
						"as_tipo_programa_base" => $as_tipo_programa_base,
						"ai_nivel" => NULL,
						"as_flg_emitir_saldo" => 'NO',
						"as_flg_integral" => $_POST['flagIntegral'],
						"as_flg_cronograma_cuoi" => 'NO'
					);
		$respuesta = ModeloWizard::ejecutaProcedureGeneraCtto($datos);
		return $respuesta;
	}//function ctrEjecutaProcedureGeneraCtto

	static public function ctrGuardaDscto(){
		$tabla = 'vtavi_descuento_x_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos =  array('ls_localidad' => $_SESSION['localidad'],
						'ls_num_contrato_new' => $_POST['ls_num_contrato_new'],
						'ls_num_servicio_new' => $_POST['ls_num_servicio_new'],
						'ls_tipo_dscto' => $_POST['ls_tipo_dscto'],
						'ls_flg_tasa' => $_POST['ls_flg_tasa'],
						'ls_flg_libre' => $_POST['ls_flg_libre'],
						'lde_valor_dscto' => (float)$_POST['lde_valor_dscto'],
						'lde_imp_dscto' => (float)$_POST['lde_imp_dscto'],
						'ldt_fch_actual' => $fechaActual,
						'gs_usuario' => $_SESSION["user"],
						'ls_flg_periodo' => $_POST['ls_flg_periodo'],
						'ls_tipo_ctt_new' => $_POST['ls_tipo_ctt_new'],
						'ls_tipo_programa_new' => $_POST['ls_tipo_programa_new']
					 );
		$respuesta = ModeloWizard::mdlguardaDscto($datos, $tabla);
		return $respuesta;
	}//function ctrGuardaDscto

	static public function ctrGuardaEndoso(){
		$tabla = 'vtavi_endoso_x_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos =  array('ls_localidad' => $_POST['localidad'],
						'ls_num_contrato_new' => $_POST['ls_num_contrato_new'],
						'ls_num_servicio_new' => $_POST['ls_num_servicio_new'],
						'ls_endoso' => $_POST['ls_endoso'],
						'lde_valor_endoso' => $_POST['lde_valor_endoso'],
						'gs_usuario' => $_SESSION["user"],
						'ldt_fch_actual' => $fechaActual,
						'ldt_fecha_venc' => $_POST['ldt_fecha_venc'],
						'ls_tipo_ctt_new' => $_POST['ls_tipo_ctt_new'],
						'ls_tipo_programa_new' => $_POST['ls_tipo_programa_new']
						);
		$respuesta = ModeloWizard::mdlGuardaEndoso($datos, $tabla);
		return $respuesta;
	}//function ctrGuardaEndoso

	static public function ctrGuardaBeneficiario(){
		$tabla = 'vtade_beneficiario_x_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array('ls_localidad' => $_POST['localidad'],
					   'li_i' => $_POST['li_linea_benef'],
					   'ls_num_contrato_new' => $_POST['ls_num_contrato_new'],
					   'ls_num_servicio_new' => $_POST['ls_num_servicio_new'],
					   'ls_ape_paterno_benef' => $_POST['ls_ape_paterno_benef'],
					   'ls_ape_materno_benef' => $_POST['ls_ape_materno_benef'],
					   'ls_nombre_benef' => $_POST['ls_nombre_benef'],
					   'ls_tipo_doc_benef' => $_POST['ls_tipo_doc_benef'],
					   'ls_num_doc_benef' => $_POST['ls_num_doc_benef'],
					   'ldt_nacimiento' => $_POST['ldt_nacimiento'],
					   'ldt_deceso' => $_POST['ldt_deceso'],
					   'ls_religion' => $_POST['ls_religion'],
					   'ls_lugar_deceso' => $_POST['ls_lugar_deceso'],
					   'ls_motivo_deceso' => $_POST['ls_motivo_deceso'],
					   'ls_flg_autopsia' => $_POST['ls_flg_autopsia'],
					   'lde_peso' => (float)$_POST['lde_peso'],
					   'lde_talla' => (float)$_POST['lde_talla'],
					   'ls_parentesco' => $_POST['ls_parentesco'],
					   'ls_estado_civil' => $_POST['ls_estado_civil'],
					   'ls_sexo' => $_POST['ls_sexo'],
					   'ls_tipo_ctt_new' => $_POST['ls_tipo_ctt_new'],
					   'ldt_fch_actual' => $fechaActual,
					   'ls_tipo_programa_new' => $_POST['ls_tipo_programa_new']
					  );
		$respuesta = ModeloWizard::mdlGuardaBeneficiario($datos, $tabla);
		return $respuesta;
	}//function ctrGuardaBeneficiario

	static public function ctrGuardaCronograma(){
		$tabla = 'vtade_cronograma';
		if ($_POST['ls_tipo_cuota'] == "FMA") {
			$flg_generar_mora = "NO";
		}else{
			$flg_generar_mora = "SI";
		}
		$datos = array('ls_localidad' => $_POST['localidad'], 
					   'ls_num_contrato_new' => $_POST['ls_num_contrato_new'],
					   'li_refinanciamiento' => $_POST['li_refinanciamiento'],
					   'li_cuota' => $_POST['li_cuota'],
					   'ls_tipo_cuota' => $_POST['ls_tipo_cuota'],
					   'ldt_vencimiento' => $_POST['ldt_vencimiento'],
					   'lde_principal' => $_POST['lde_principal'],
					   'lde_interes' => $_POST['lde_interes'],
					   'lde_igv' => $_POST['lde_igv'],
					   'lde_total' => $_POST['lde_total'],
					   'gde_igv' => 0.18,
					   'ls_tipo_ctt_new' => $_POST['ls_tipo_ctt_new'],
					   'ls_tipo_programa_new' => $_POST['ls_tipo_programa_new'],
					   'is_flg_generar_moras' => $flg_generar_mora
					  );
		$respuesta = ModeloWizard::mdlGuardaCronograma($datos,$tabla);
		return $respuesta;
	}// function ctrGuardaCronograma

	static public function ctrGeneraEspacio(){
		$datos = array('ls_tipo_recaudacion' => $_POST['ls_tipo_recaudacion'], 
					   'as_camposanto' => $_POST['as_camposanto'],
					   'as_plataforma' => $_POST['as_plataforma'],
					   'as_area' => $_POST['as_area'],
					   'as_eje_horizontal' => $_POST['as_eje_horizontal'],
					   'as_eje_vertical' => $_POST['as_eje_vertical'],
					   'as_espacio' => $_POST['as_espacio'],
					   'as_tipo_espacio' => $_POST['as_tipo_espacio']
					  );
		$respuesta = ModeloWizard::mdlGeneraEspacio($datos);
		return $respuesta;
	}// function ctrGuardaCronograma
	
	static public function ctrGetDatosContrato(){

		$cod_localidad = $_POST['cod_localidad'];
		$cod_contrato = $_POST['cod_contrato'];

		$respuesta = ModeloWizard::mdlGetDatosContrato($cod_localidad,$cod_contrato);
		return $respuesta;
	}//function ctrGetDatosContrato

}//class ControladorWizard
?>