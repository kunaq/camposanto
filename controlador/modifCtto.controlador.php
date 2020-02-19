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

}//class ControladorModifCtto
?>