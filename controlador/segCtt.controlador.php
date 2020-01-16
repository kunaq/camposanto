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
	}//function ctrGetServiciosCtt

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
	
	static public function ctrGetBeneficiariosServ(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetBeneficiariosServ($datos);
		return $respuesta;
	}//function ctrGetBeneficiariosServ
	
	static public function ctrGetServPrincipal(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGtServPrincipal($datos);
		return $respuesta;
	}//function ctrGetServPrincipal

	static public function ctrGetGetDsctoServicio(){

		$datos = array('localidad' => $_POST['localidad'],
					   'cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGtServPrincipal($datos);
		return $respuesta;
	}//function ctrGetGetDsctoServicio

	static public function ctrGetDatosEspacio(){

		$datos = array('cod_contrato' => $_POST['cod_contrato'],
					   'cod_servicio' => $_POST['cod_servicio']);

		$respuesta = ModeloSegContrato::mdlGetDatosEspacio($datos);
		return $respuesta;
	}//function ctrGetDatosEspacio

}//class ControladorWizard
?>