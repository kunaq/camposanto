<?php
@session_start();
class ControladorModifCtto{

	static public function ctrBuscaCtto(){
		$tabla = "vtade_contrato";
		$tabla2 = 'vtama_cliente';
		$tabla3 = 'vtaca_contrato';
		$tabla4 = 'vtama_camposanto';
		$tabla5 = 'vtama_area_plataforma';
		$tabla6 = 'vtama_plataforma';
		$tabla7 = 'vtama_tipo_espacio';
		$tabla8 = 'vtama_tipo_servicio';
		$tablaViServ = 'vtavi_cronograma_x_servicio';
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloModifCtto::mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$tablaViServ,$codCtto);
		return $respuesta;
	}//function ctrBuscaCtto

	static public function ctrBuscaDatosServicio(){
		$tablaCtto = 'vtade_contrato';
		$tablaEnt = 'vtama_entidad';
		$tablaTipoSvcio = 'vtama_tipo_servicio';
		$tablaViServ = 'vtavi_cronograma_x_servicio';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaDatosServicio($tablaCtto,$tablaEnt,$tablaTipoSvcio,$tablaViServ,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaDatosServicio

	static public function ctrBuscaServPpal(){
		$tablaCttoSvcio = 'vtade_contrato_servicio';
		$tablaMaSvcio = 'vtama_servicio';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaServPpal($tablaCttoSvcio,$tablaMaSvcio,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaServPpal

	static public function ctrBuscaDsctoXCtto(){
		$tablaDscto = 'vtavi_descuento_x_contrato';
		$tablaMaDcsto = 'vtama_tipo_descuento';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaDsctoXCtto($tablaDscto,$tablaMaDcsto,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaDsctoXCtto

	static public function ctrBuscaEndXCtto(){
		$tablaEndoso = 'vtavi_endoso_x_contrato';
		$tablaMaEnd = 'vtama_entidad';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaEndXCtto($tablaEndoso,$tablaMaEnd,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaEndXCtto

	static public function ctrBuscaCliente(){
		$tablaCliente = 'vtama_cliente';
		$tablaDireccion = 'vtade_cliente_direccion';
		$tablaPais = 'vtama_pais';
		$tablaDpto = 'vtama_departamento';
		$tablaProvi = 'vtama_provincia';
		$tablaDtto = 'vtama_distrito';
		$tablaZona = 'gplma_tipo_zona';
		$codCliente = $_POST['codCliente'];
		$respuesta = ModeloModifCtto::mdlBuscaCliente($tablaCliente,$tablaDireccion,$tablaPais,$tablaDpto,$tablaProvi,$tablaDtto,$tablaZona,$codCliente);
		return $respuesta;
	}//ctrBuscaCliente

	static public function ctrBuscaCronograma(){
		$tablaCronograma = 'vtade_cronograma';
		$codCtto = $_POST['codCtto'];
		$num_refinanciamiento = $_POST['num_refinanciamiento'];
		$respuesta = ModeloModifCtto::mdlBuscaCronograma($tablaCronograma,$codCtto,$num_refinanciamiento);
		return $respuesta;
	}//ctrBuscaCronograma

	static public function ctrBuscaCronogramaFOMA(){
		$tablaCronograma = 'vtade_cronograma';
		$codCtto = $_POST['codCtto'];
		$num_refinanciamiento = $_POST['num_refinanciamiento'];
		$respuesta = ModeloModifCtto::mdlBuscaCronogramaFOMA($tablaCronograma,$codCtto,$num_refinanciamiento);
		return $respuesta;
	}//ctrBuscaCronogramaFOMA

	static public function ctrBuscaObservaciones(){
		$tablaObservacion = 'vtade_observacion_x_contrato';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaObservaciones($tablaObservacion,$codCtto,$num_servicio);
		return $respuesta;
	}//ctrBuscaObservaciones

	static public function ctrValUsoServ(){
		$tablaAut = 'vtaca_autorizacion';
		$tablaEdo = 'vtama_estado_autorizacion';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_servicio" => $_POST['ls_servicio'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt']
					);
		$respuesta = ModeloModifCtto::mdlValUsoServ($tablaAut,$tablaEdo,$datos);
		return $respuesta;
	}//ctrValUsoServ

	static public function ctrVerificaTrans(){
		$tablaCtto = 'vtade_contrato';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_servicio" => $_POST['ls_servicio'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt']
					);
		$respuesta = ModeloModifCtto::mdlVerificaTrans($tablaCtto,$datos);
		return $respuesta;
	}//ctrVerificaTrans

	static public function ctrReplicaDatos(){
		$tablaCtto = 'vtade_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_servicio" => $_POST['ls_servicio'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"gs_usuario" => $_SESSION['user'],
						"ldt_fch_actual" => $fechaActual
					);
		$respuesta = ModeloModifCtto::mdlReplicaDatos($tablaCtto,$datos);
		return $respuesta;
	}//ctrReplicaDatos

	static public function ctrActualizaFoma(){
		$tablaCtto = 'vtade_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"gs_usuario" => $_SESSION['user'],
						"ldt_fch_actual" => $fechaActual,
						"ls_servicio_foma" => $_POST['ls_servicio_foma']
					);
		$respuesta = ModeloModifCtto::mdlActualizaFoma($tablaCtto,$datos);
		return $respuesta;
	}//ctrActualizaFoma

	static public function ctrActualizaCronograma(){
		$tablaCrono = 'vtade_cronograma';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"li_ref" => $_POST['li_ref']
					);
		$respuesta = ModeloModifCtto::mdlActualizaCronograma($tablaCrono,$datos);
		return $respuesta;
	}//ctrActualizaCronograma

	static public function ctrModificado(){
		$tablaResCrono = 'vtavi_resolucion_contrato';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"ls_item_servicio_getrow" => $_POST['ls_item_servicio_getrow']
					);
		$respuesta = ModeloModifCtto::mdlModificado($tablaResCrono,$datos);
		return $respuesta;
	}//ctrModificado

	static public function ctrGeneraEspacio(){
		$datos = array('as_camposanto' => $_POST['ls_camposanto'],
					   'as_plataforma' => $_POST['ls_plataforma'],
					   'as_area' => $_POST['ls_area'],
					   'as_eje_horizontal' => $_POST['ls_eje_horizontal'],
					   'as_eje_vertical' => $_POST['ls_eje_vertical'],
					   'as_espacio' => $_POST['ls_espacio'],
					   'as_tipo_espacio' => $_POST['ls_tipo_espacio']
					  );
		$respuesta = ModeloModifCtto::mdlGeneraEspacio($datos);
		return $respuesta;
	}// function ctrGeneraEspacio

	static public function ctrValidaPagos(){
		$datos = array("ls_contrato" => $_POST['ls_contrato'],
						"li_ref" => $_POST['li_ref']
					  );
		$respuesta = ModeloModifCtto::mdlValidaPagos($datos);
		return $respuesta;
	}// function ctrValidaPagos

	static public function ctrBuscaGrupo(){
		$tablaHist = 'vtama_historico_vendedor';
		$datos = array("codVendedor" => $_POST['ls_contrato'],
						"li_ref" => $_POST['li_ref']
					  );
		$respuesta = ModeloModifCtto::mdlBuscaGrupo($datos);
		return $respuesta;
	}// function ctrBuscaGrupo

	static public function ctrBuscaBeneficiario(){
		$tablaBen = 'vtade_beneficiario_x_contrato';
		$datos = array("codCtto" => $_POST['codCtto'],
						"localidad" => $_SESSION['localidad']
					  );
		$respuesta = ModeloModifCtto::mdlBuscaBeneficiario($tablaBen,$datos);
		return $respuesta;
	}// function ctrBuscaBeneficiario

	static public function ctrBuscaObsrvXBeneficiario(){
		$tablaObsrv = 'vtade_observacion_x_beneficiario';
		$datos = array("codCtto" => $_POST['codCtto'],
						"localidad" => $_SESSION['localidad'],
						"num_item" => $_POST['num_item']
					  );
		$respuesta = ModeloModifCtto::mdlBuscaObsrvXBeneficiario($tablaObsrv,$datos);
		return $respuesta;
	}// function ctrBuscaObsrvXBeneficiario

	static public function ctrBuscaCodCuotas(){
		$tablaCuo = 'vtama_cuota';
		$datos =  $_POST['num_cuotas'];
		$respuesta = ModeloModifCtto::mdlBuscaCodCuotas($tablaCuo,$datos);
		return $respuesta;
	}// function ctrBuscaCodCuotas

	static public function ctrBuscaCodInteres(){
		$tablaInt = 'vtama_interes';
		$datos =  $_POST['num_valor'];
		$respuesta = ModeloModifCtto::mdlBuscaCodInteres($tablaInt,$datos);
		return $respuesta;
	}// function ctrBuscaCodInteres

	static public function ctrBuscaCtdBenef(){
		$tabla = 'vtade_beneficiario_x_contrato';
		$localidad = $_SESSION['localidad'];
		$codCtto =  $_POST['codCtto'];
		$tipoCtto = $_POST['ls_tipo_ctt'];
		$tipoProg = $_POST['ls_tipo_programa'];
		$respuesta = ModeloModifCtto::mdlBuscaCtdBenef($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg);
		return $respuesta;
	}// function ctrBuscaCtdBenef

	static public function ctrBuscaMaxCuotas(){
		$tabla = 'vtade_cronograma';
		$localidad = $_SESSION['localidad'];
		$codCtto =  $_POST['ls_contrato'];
		$tipoCtto = $_POST['ls_tipo_ctt'];
		$tipoProg = $_POST['ls_tipo_programa'];
		$refi = $_POST['li_ref'];
		$respuesta = ModeloModifCtto::mdlBuscaMaxCuotas($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$refi);
		return $respuesta;
	}// function ctrBuscaMaxCuotas

	static public function ctrBuscaMaxValorCuotas(){
		$tabla = 'vtade_cronograma';
		$localidad = $_SESSION['localidad'];
		$codCtto =  $_POST['ls_contrato'];
		$tipoCtto = $_POST['ls_tipo_ctt'];
		$tipoProg = $_POST['ls_tipo_programa'];
		$refi = $_POST['li_ref'];
		$respuesta = ModeloModifCtto::mdlBuscaMaxValorCuotas($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$refi);
		return $respuesta;
	}// function ctrBuscaMaxValorCuotas

	static public function ctrBuscaCostoCarencia(){
		$tabla = 'vtade_contrato_servicio';
		$localidad = $_SESSION['localidad'];
		$codCtto =  $_POST['ls_contrato'];
		$tipoCtto = $_POST['ls_tipo_ctt'];
		$tipoProg = $_POST['ls_tipo_programa'];
		$tipoServ = $_POST['ls_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaCostoCarencia($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$tipoServ);
		return $respuesta;
	}// function ctrBuscaCostoCarencia

	static public function ctrRpDatosMod(){
		$tablaCtto = 'vtade_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_servicio" => $_POST['ls_servicio'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"gs_usuario" => $_SESSION['user'],
						"ldt_fch_actual" => $fechaActual,
						"ls_vendedor" => $_POST['ls_vendedor'],
						"ls_supervisor" => $_POST['ls_supervisor'],
						"ls_jefe" => $_POST['ls_jefe'],
						"ls_grupo" => $_POST['ls_grupo'],
						"ls_canal" => $_POST['ls_canal'],
						"ls_tipo_comisionista" => $_POST['ls_tipo_comisionista'],
						"ls_cuota" => $_POST['ls_cuota'],
						"li_cuotas" => $_POST['li_cuotas'],
						"ls_interes" => $_POST['ls_interes'],
						"ldt_fch_venc" => $_POST['ldt_fch_venc'],
						"lde_tasa" => $_POST['lde_tasa'],
						"ls_flg_agencia" => $_POST['ls_flg_agencia'],
						"ls_agencia" => $_POST['ls_agencia'],
						"ls_convenio" => $_POST['ls_convenio'],
						"ls_cliente_alterno" => $_POST['ls_cliente_alterno'],
						"ls_aval" => $_POST['ls_aval'],
						"gs_empresa" => $_POST['gs_empresa'],
						"ls_cod_cobrador" => $_POST['ls_cod_cobrador'],
						"lde_valor_cuota" => $_POST['lde_valor_cuota'],
						"lde_tot_interes" => $_POST['lde_tot_interes'],
						"ls_zona" => $_POST['ls_zona'],
						"lde_costo_carencia" => $_POST['lde_costo_carencia']
					);
		$respuesta = ModeloModifCtto::mdlRpDatosMod($tablaCtto,$datos);
		return $respuesta;
	}//ctrRpDatosMod

	static public function ctrActFOMAMod(){
		$tablaCtto = 'vtade_contrato';
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"ls_servicio" => $_POST['ls_servicio_foma'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"gs_usuario" => $_SESSION['user'],
						"ldt_fch_actual" => $fechaActual,
						"ls_vendedor" => $_POST['ls_vendedor'],
						"ls_supervisor" => $_POST['ls_supervisor'],
						"ls_jefe" => $_POST['ls_jefe'],
						"ls_grupo" => $_POST['ls_grupo'],
						"ls_canal" => $_POST['ls_canal'],
						"ls_tipo_comisionista" => $_POST['ls_tipo_comisionista'],
						"ls_cuota_foma" => $_POST['ls_cuota_foma'],
						"li_cuotas_foma" => $_POST['li_cuotas_foma'],
						"ldt_fch_venc_foma" => $_POST['ldt_fch_venc_foma'],
						"ls_cliente_alterno" => $_POST['ls_cliente_alterno'],
						"ls_aval" => $_POST['ls_aval'],
						"ls_cod_cobrador" => $_POST['ls_cod_cobrador'],
						"ls_zona" => $_POST['ls_zona']
					);
		$respuesta = ModeloModifCtto::mdlActFOMAMod($tablaCtto,$datos);
		return $respuesta;
	}//ctrActFOMAMod

	static public function ctrGuardaBeneficiarios(){
		$tablabenef = 'vtade_beneficiario_x_contrato';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_item" => $_POST['num_item'],
						"num_servicio" => $_POST['num_servicio'],
						"dsc_apellidopaterno" => $_POST['dsc_apellidopaterno'],
						"dsc_apellidomaterno" => $_POST['dsc_apellidomaterno'],
						"dsc_nombre" => $_POST['dsc_nombre'],
						"cod_tipo_documento" => $_POST['cod_tipo_documento'],
						"dsc_documento" => $_POST['dsc_documento'],
						"fch_nacimiento" => $_POST['fch_nacimiento'],
						"fch_entierro" => $_POST['fch_entierro'],
						"num_nivel" => $_POST['num_nivel'],
						"fch_deceso" => $_POST['fch_deceso'],
						"cod_religion" => $_POST['cod_religion'],
						"cod_lugar_deceso" => $_POST['cod_lugar_deceso'],
						"cod_motivo_deceso" => $_POST['cod_motivo_deceso'],
						"flg_autopsia" => $_POST['flg_autopsia'],
						"num_peso" => $_POST['num_peso'],
						"num_talla" => $_POST['num_talla'],
						"cod_estado_civil" => $_POST['cod_estado_civil'],
						"cod_sexo" => $_POST['cod_sexo'],
						"cod_parentesco" => $_POST['cod_parentesco']
					);
		$respuesta = ModeloModifCtto::mdlGuardaBeneficiarios($tablabenef,$datos);
		return $respuesta;
	}//ctrGuardaBeneficiarios

	static public function ctrActResCronoMod(){
		$tabla = 'vtaca_cronograma';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"li_total_cuotas" => $_POST['li_total_cuotas'],
						"ls_interes" => $_POST['ls_interes'],
						"lde_tasa" => $_POST['lde_tasa'],
						"lde_tot_interes" => $_POST['lde_tot_interes'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_contrato" => $_POST['ls_contrato'],
						"li_ref" => $_POST['li_ref']
					);
		$respuesta = ModeloModifCtto::mdlActResCronoMod($tabla,$datos);
		return $respuesta;
	}//ctrActResCronoMod

	static public function ctrActCabeceraMod(){
		$tabla = 'vtaca_contrato';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_tipo_contrato" => $_POST['ls_tipo_contrato'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"ls_contrato" => $_POST['ls_contrato']
					);
		$respuesta = ModeloModifCtto::mdlActCabeceraMod($tabla,$datos);
		return $respuesta;
	}//ctrActCabeceraMod

	static public function ctrlineaMaxObsrv(){
		$fecha = date('Y-m-d');
		$fechaf = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array(	"fch_actual" => $fechaActual,
						"usuario" => $_SESSION["user"],
						"cod_area" => '',
						"cod_localidad" => $_SESSION['localidad'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio'],
						"dsc_observacion" => $_POST['dsc_observacion']
					);
		$respuesta = ModeloModifCtto::mdllineaMaxObsrv($datos);
		return $respuesta;
	}//ctrlineaMaxObsrv

	static public function ctrGuardaCronograma(){
		$tabla = 'vtade_cronograma';
		$datos = array("ls_localidad" => $_SESSION['localidad'],
						"ls_contrato" => $_POST['ls_contrato'],
						"li_ref" => $_POST['li_ref'],
						"li_cuota" => $_POST['li_cuota'],
						"cod_estadocuota" => $_POST['cod_estadocuota'],
						"ldt_vencimiento" => $_POST['ldt_vencimiento'],
						"lde_principal" => $_POST['lde_principal'],
						"lde_interes" => $_POST['lde_interes'],
						"lde_igv" => $_POST['lde_igv'],
						"lde_total" => $_POST['lde_total'],
						"imp_saldo" => $_POST['imp_saldo'],
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"ls_tipo_programa" => $_POST['ls_tipo_programa'],
						"cod_tipo_cuota" => $_POST['cod_tipo_cuota']
					);
		$respuesta = ModeloModifCtto::mdlGuardaCronograma($tabla,$datos);
		return $respuesta;
	}//ctrGuardaCronograma

}//class ControladorModifCtto
?>