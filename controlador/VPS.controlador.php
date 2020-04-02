<?php
@session_start();
class ControladorVPS{

	static public function ctrBuscaBenef(){
		$tabla1 = "vtama_tipo_autorizacion";
		$tabla2 = "vtaca_autorizacion";
		$tabla3 = "vtama_estado_autorizacion";
		$datos = array(	"localidad" => $_POST['localidad'],
						"fecha" => $_POST['fecha']
					);
		$respuesta = ModeloVPS::mdlBuscaBenef($tabla1,$tabla2,$tabla3,$datos);
		return $respuesta;
	}//ctrBuscaBenef

	static public function ctrBuscaDetBenefctrBuscaDetBenef(){
		$tabla1 = "vtama_tipo_autorizacion";
		$tabla2 = "vtaca_autorizacion";
		$tabla3 = "vtama_estado_autorizacion";
		$tabla4 = "vtama_servicio";
		$tabla5 = "vtade_contrato_servicio";
		$tabla6 = "vtade_contrato";
		$tabla7 = "vtama_cliente";
		$datos = array(	"localidad" => $_POST['localidad'],
						"autorizacion" => $_POST['autorizacion'],
						"num_servicio" => $_POST['num_servicio']
					);
		$respuesta = ModeloVPS::mdlBuscaDetBenef($tabla1,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$datos);
		return $respuesta;
	}//function ctrBuscaDetBenef

}//class ControladorVSP
?>