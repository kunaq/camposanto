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