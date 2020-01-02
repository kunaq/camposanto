<?php
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
		$borrar = ModeloWizard::mdlBorrarTemporal($respuesta);
		return $respuesta;
	}//function ctrIdentificador

	static public function ctrGuardaDetalle(){
		$tabla = "vtama_temp_recaudacion";
		$ll_id = $_POST['ll_id'];
	    $li_i = $_POST['li_i'];
	    $ls_codigo = $_POST['ls_codigo'];
	    $li_ctd = $_POST['li_ctd'];
	    $lde_precio_venta = $_POST['lde_precio_venta'];
	    $lde_det_total = $_POST['lde_det_total'];
	    $lde_cuoi = $_POST['lde_cuoi'];
	    $lde_foma = $_POST['lde_foma'];
	    $lde_cuoi_st = $_POST['lde_cuoi_st'];
	    $lde_min_inh = $_POST['lde_min_inh'];
	    $lde_precio_lista = $_POST['lde_precio_lista'];
	    $lde_valor_endoso = $_POST['lde_valor_endoso'];
	    $ls_flg_ds_compartido = $_POST['ls_flg_ds_compartido'];
	    $lde_imp_carencia = $_POST['lde_imp_carencia'];
	    $ls_flg_cremacion = $_POST['ls_flg_cremacion'];
	    $ls_flg_ds_temporal = $_POST['ls_flg_ds_temporal'];
	    $ls_flg_ssff = $_POST['ls_flg_ssff'];
	    $lde_saldo_detalle = $_POST['lde_saldo_detalle'];
		$respuesta = ModeloWizard::mdlGuardaDetalle($tabla,$ll_id,$li_i,$ls_codigo,$li_ctd,$lde_precio_venta,$lde_det_total,$lde_cuoi,$lde_foma,$lde_cuoi_st,$lde_min_inh,$lde_precio_lista,$lde_valor_endoso,$ls_flg_ds_compartido,$lde_imp_carencia,$ls_flg_cremacion,$ls_flg_ds_temporal,$ls_flg_ssff,$lde_saldo_detalle);
		return $respuesta;
	}//function ctrGuardaDetalle

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
						"as_tipo_recaudacion", => $_POST['tipPro'],
						"as_localidad_base" => NULL,
						"as_servicio_base" => NULL,
						"as_tipo_ctt_base" => NULL,
						"as_camposanto" => $_POST['camposanto'],
						"as_plataforma" => $_POST['plataforma'],
						"as_area" => $_POST['area'],
						"as_eje_horizontal" => $_POST['ejex'],
						"as_eje_vertical" => $_POST['ejey'],
						"as_tipo_espacio" => $_POST['espacio'],
						"as_convenio" => $_POST['endoso'],
						"as_moneda" => 'SOL',
						"as_moneda_comprob" => NULL,
						"as_espacio" => $_POST['espacio'],
						"as_tipo_necesidad" => $_POST['tipoNec'],
						"adt_fch_emision" => $fechaActual,
						"ade_imp_cuoi" => $_POST['impCuoi'] ,
						"ade_valor_igv" => 0.18,
						"as_flg_nuevo" => $_POST['nvoCtto'],
						"as_flg_comprobante" => 'NO',
						"as_flg_modif" => 'NO',
						"as_flg_regularizar" => $_POST['regularizacionCheck'],
						"as_flg_ctt_x_tn" => 'NO',
						"as_cod_empresa" => $_POST['codEmpresa'],
						"as_tipo_programa_base" => NULL,
						"ai_nivel" => $_POST['nivel'],
						"as_flg_emitir_saldo" => 'NO',
						"as_flg_integral" => $_POST['flg_integral'],
						"as_flg_cronograma_cuoi" => 'NO'
					);
		$respuesta = ModeloWizard::ejecutaProcedureGeneraCtto($datos);
		return $respuesta;
	}

}//class ControladorWizard
?>