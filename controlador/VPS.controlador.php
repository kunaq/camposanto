<?php
@session_start();
class ControladorVPS{

	static public function ctrBuscaBenef(){
		$tabla1 = "vtama_tipo_autorizacion";
		$tabla2 = "vtaca_autorizacion";
		$tabla3 = "vtama_estado_autorizacion";
		$datos = array(	"cod_localidad" => $_POST['cod_localidad'],
						"fecha" => $_POST['fecha']
					);
		$respuesta = ModeloVPS::mdlBuscaBenef($tabla1,$tabla2,$tabla3,$datos);
		return $respuesta;
	}//ctrBuscaBenef

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
		$respuesta = ModeloVPS::mdlActivaContrato($datos);
		return $respuesta;
	}//function ctrActivaContrato

}//class ControladorVSP
?>