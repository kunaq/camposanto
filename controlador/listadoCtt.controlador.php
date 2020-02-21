<?php
@session_start();
class ControladorListadoCtt{

	static public function ctrValidaContrato(){

		$datos = array(	"cod_localidad" => $_POST['cod_localidad'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloListadoCtt::mdlValidaContrato($datos);
		return $respuesta;
	}//ctrGuardaProspecto

	static public function ctrActivaContrato(){

		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array(	"cod_localidad" => $_POST['cod_localidad'],
						"cod_contrato" => $_POST['cod_contrato'],
						"num_servicio" => $_POST['num_servicio'],
						"cod_tipo_ctt" => $_POST['cod_tipo_ctt'],
						"cod_tipo_programa" => $_POST['cod_tipo_programa'],
						"num_anno" => $_POST['num_anno'],
						"cod_tipo_periodo" => $_POST['cod_tipo_periodo'],
						"cod_periodo" => $_POST['cod_periodo'],
						"fch_actual" => $fechaActual,
						"usuario" => $_SESSION['user'],
						"empresa" => $_SESSION['codEmpresa']
					);
		$respuesta = ModeloListadoCtt::mdlActivaContrato($datos);
		return $respuesta;
	}//function ctrActivaContrato

}//class ControladorListadoCtt
?>