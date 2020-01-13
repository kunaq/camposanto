<?php

session_start();

class ControladorSegContrato{

	static public function ctrGetDatosCtt(){
		$cod_contrato = $_POST['cod_contrato'];
	    
		$respuesta = ModeloSegContrato::mdlGetDatosCtt($cod_contrato);
		return $respuesta;
	}//function ctrGetDatosCtt

	static public function ctrGetServiciosCtt(){

		$cod_contrato = $_POST['cod_contrato'];

		$respuesta = ModeloSegContrato::mdlgetServiciosCtt($cod_contrato);
		return $respuesta;
	}//function ctrgetServiciosCtt

	static public function ctrGetCuotas(){

		$datos = array('localidad' => $_POST['localidad'],
					   'impTasa' => $_POST['impTasa'],
					   'tipoCtt' => $_POST['tipoCtt'],
					   'tipoPro' => $_POST['tipoPro'],
					   'codCtt' => $_POST['codCtt'],
					   'numRef' => $_POST['numRef'],
					   'numSer' => $_POST['numSer']);

		$respuesta = ModeloSegContrato::mdlGetCuotas($datos);
		return $respuesta;
	}//function ctrgetServiciosCtt


	static public function ctrEjecutaProcedureGeneraCtto(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("a_usuario" => $_SESSION["user"],
						"as_cliente" => $_POST['cod_cliente'],
						"as_contrato_base" => NULL,
						"as_num_comprobante" => NULL,
						"as_contrato_reg" => NULL,
						"as_tipo_comprobante" => NULL,
						"as_localidad" => $_SESSION['localidad'],
						"as_tipo_recaudacion" => $_POST['tipPro'],
						"as_localidad_base" => NULL,
						"as_servicio_base" => NULL,
						"as_tipo_ctt_base" => NULL,
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
						"as_flg_modif" => 'NO',
						"as_flg_regularizar" => $_POST['regularizacionCheck'],
						"as_flg_ctt_x_tn" => 'NO',
						"as_cod_empresa" => $_SESSION['codEmpresa'],
						"as_tipo_programa_base" => NULL,
						"ai_nivel" => NULL,
						"as_flg_emitir_saldo" => 'NO',
						"as_flg_integral" => $_POST['flagIntegral'],
						"as_flg_cronograma_cuoi" => 'NO'
					);
		$respuesta = ModeloWizard::ejecutaProcedureGeneraCtto($datos);
		return $respuesta;
	}//function ctrEjecutaProcedureGeneraCtto

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

}//class ControladorWizard
?>