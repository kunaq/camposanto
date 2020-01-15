<?php
require_once "../funciones.php";
require_once "../controlador/segCtt.controlador.php";
require_once "../modelo/segCtt.modelo.php";

class AjaxSegCtt{

	public function ajaxGetDatosCtt(){
		$respuesta = ControladorSegContrato::ctrGetDatosCtt();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDatosCtt
	public function ajaxGetServiciosCtt(){
		$respuesta = ControladorSegContrato::ctrGetServiciosCtt();
		echo $respuesta;
	}//function ajaxGetServiciosCtt
	public function ajaxGetCuotas(){
		$respuesta = ControladorSegContrato::ctrGetCuotas();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGuardaDscto
	public function ajaxEjecutaProcedureResumenCtt(){
		$respuesta = ControladorSegContrato::ctrEjecutaProcedureResumenCtt();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxEjecutaProcedureResumenCtt
	public function ajaxGetBeneficiariosServ(){
		$respuesta = ControladorSegContrato::ctrGetBeneficiariosServ();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetBeneficiariosServ
	public function ajaxGetDatosEspacio(){
		$respuesta = ControladorSegContrato::ctrGetDatosEspacio();
		echo json_encode($respuesta);
	}//function ajaxGetDatosEspacio
	// public function ajaxGuardaCronograma(){
	// 	$respuesta = ControladorWizard::ctrGuardaCronograma();
	// 	echo json_encode($respuesta);
	// }//function ajaxGuardaCronograma
	// public function ajaxGeneraEspacio(){
	// 	$respuesta = ControladorWizard::ctrGeneraEspacio();
	// 	echo json_encode($respuesta);
	// }//function ajaxGenerarEspacio

}//class AjaxWizard


/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'getDatosCtt'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDatosCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getServicioCtt'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetServiciosCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getCuotas'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetCuotas();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getResumenCtt'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxEjecutaProcedureResumenCtt();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getBeneficiarios'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetBeneficiariosServ();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDatosEspacio'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDatosEspacio();
}
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaCronograma'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGuardaCronograma();
// }
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'generaEspacio'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGeneraEspacio();
// }