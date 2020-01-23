<?php

session_start();

class ControladorSegContrato{

	static public function ctrGetDatosCtt(){
		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$cod_servicio = $_POST['cod_servicio'];
	    
		$respuesta = ModeloSegContrato::mdlGetDatosCtt($localidad,$cod_contrato,$cod_servicio);
		return $respuesta;
	}//function ctrGetDatosCtt

	static public function ctrGetServiciosCtt(){

		$cod_contrato = $_POST['cod_contrato'];

		$respuesta = ModeloSegContrato::mdlgetServiciosCtt($cod_contrato);
		return $respuesta;
	}//function ctrGetServiciosCtt

	static public function ctrGetRefinServ(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$cod_servicio = $_POST['cod_servicio'];

		$respuesta = ModeloSegContrato::mdlGetRefinServ($localidad,$cod_contrato,$cod_servicio);
		return $respuesta;
	}//function ctrGetRefinServ

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
	}//function ctrGetCuotas

	static public function ctrEjecutaProcedureResumenCtt(){

		$datos = array("as_localidad" => $_POST['as_localidad'],
						"as_tipo_ctt" => $_POST['as_tipo_ctt'],
						"as_contrato" => $_POST['as_contrato'],
						"as_servicio" => $_POST['as_servicio'],
						"ai_ref" => $_POST['ai_ref'],
						"as_total" => "NO",
						"as_tipo_programa" => $_POST['as_tipo_programa'],
					);
		$respuesta = ModeloSegContrato::mdlEjecutaProcedureResumenCtt($datos);
		return $respuesta;
	}//function ctrEjecutaProcedureResumenCtt

	static public function ctrGetDatosEspacio(){

		$datos = array('cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetDatosEspacio($datos);
		return $respuesta;
	}//function ctrGetDatosEspacio
	
	static public function ctrGetServPrincipal(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetServPrincipal($datos);
		return $respuesta;
	}//function ctrGetServPrincipal

	static public function ctrGetDsctoServicio(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetDsctoServicio($datos);
		return $respuesta;
	}//function ctrGetDsctoServicio

	static public function ctrGetEndoServicio(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetEndoServicio($datos);
		return $respuesta;
	}//function ctrGetEndoServicio

	static public function ctrGetCuotasCron(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'num_refinanciamiento' => $_POST['num_refinanciamiento']);

		$respuesta = ModeloSegContrato::mdlGetCuotasCron($datos);
		return $respuesta;
	}//function ctrGetCuotasCron

	static public function ctrGetBeneficiariosServ(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetBeneficiariosServ($datos);
		return $respuesta;
	}//function ctrGetBeneficiariosServ

	static public function ctrGetDetFinanciamiento(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'num_refinanciamiento' => $_POST['num_refinanciamiento']);

		$respuesta = ModeloSegContrato::mdlGetDetFinanciamiento($datos);
		return $respuesta;
	}//function ctrGetDetFinanciamiento
	
	static public function ctrGetComprobantes(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'num_cuota' => $_POST['num_cuota'],
					   'num_refinanciamiento' => $_POST['num_refinanciamiento']);

		$respuesta = ModeloSegContrato::mdlGetComprobantes($datos);
		return $respuesta;
	}//function ctrGetComprobantes
	
	static public function ctrGetCancelaciones(){

		$datos = array('localidad' => $_POST['localidad'],
					   'num_correlativo' => $_POST['num_correlativo']);

		$respuesta = ModeloSegContrato::mdlGetCancelaciones($datos);
		return $respuesta;
	}//function ctrGetCancelaciones
	
	static public function ctrGetDatosCliente(){
		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloSegContrato::mdlGetDatosCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetDatosCliente
	
	static public function ctrFiltroComprobantes(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'num_refinanciamiento' => $_POST['num_refinanciamiento'],
					   'cod_tipo_comprobante' => $_POST['cod_tipo_comprobante'],
					   'num_comprobante' => $_POST['num_comprobante'],);

		$respuesta = ModeloSegContrato::mdlFiltroComprobantes($datos);
		return $respuesta;
	}//function ctrFiltroComprobantes
	
	static public function ctrGetAutorizacion(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetAutorizacion($datos);
		return $respuesta;
	}//function ctrGetAutorizacion
	
	static public function ctrGetDeudasCliente(){

		$cod_cliente = $_POST['cod_cliente'];

		$respuesta = ModeloSegContrato::mdlGetDeudasCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetDeudasCliente
	
	static public function ctrGetObservacionesCliente(){

		$cod_cliente = $_POST['cod_cliente'];

		$respuesta = ModeloSegContrato::mdlGetObservacionesCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetObservacionesCliente

}//class ControladorWizard
?>