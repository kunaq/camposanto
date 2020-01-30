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
		$codCtto = $_POST['codCtto'];
		$respuesta = ModeloModifCtto::mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$codCtto);
		return $respuesta;
	}//function ctrBuscaCtto

	static public function ctrBuscaDatosServicio(){
		$tablaCtto = 'vtade_contrato';
		$tablaEnt = 'vtama_entidad';
		$tablaTipoSvcio = 'vtama_tipo_servicio';
		$codCtto = $_POST['codCtto'];
		$num_servicio = $_POST['num_servicio'];
		$respuesta = ModeloModifCtto::mdlBuscaDatosServicio($tablaCtto,$tablaEnt,$tablaTipoSvcio,$codCtto,$num_servicio);
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
						"ls_tipo_ctt" => $_POST['ls_tipo_ctt'],
						"as_total" => "NO",
					);
		$respuesta = ModeloModifCtto::mdlValUsoServ($tablaAut,$tablaEdo,$datos);
		return $respuesta;
	}//ctrValUsoServ


}//class ControladorModifCtto
?>