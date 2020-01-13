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
		echo var_dump($respuesta);
	}//function ajaxGuardaDscto
	// public function ajaxEjecutaProcedureGeneraCtto(){
	// 	$respuesta = ControladorWizard::ctrEjecutaProcedureGeneraCtto();
	// 	echo json_encode($respuesta);
	// }//function ajaxEjecutaProcedureGeneraCtto
	// public function ajaxGuardaEndoso(){
	// 	$respuesta = ControladorWizard::ctrGuardaEndoso();
	// 	echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	// }//function ajaxGuardaEndoso
	// public function ajaxGuardaBeneficiario(){
	// 	$respuesta = ControladorWizard::ctrGuardaBeneficiario();
	// 	echo json_encode($respuesta);
	// }//function ajaxGuardaBeneficiario
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
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'ejecutaProcedure'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxEjecutaProcedureGeneraCtto();
// }
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaEndoso'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGuardaEndoso();
// }
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaBeneficiario'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGuardaBeneficiario();
// }
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaCronograma'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGuardaCronograma();
// }
// else if(isset($_POST["accion"]) && $_POST["accion"] == 'generaEspacio'){
// 	$cliente = new AjaxWizard();
// 	$cliente -> ajaxGeneraEspacio();
// }