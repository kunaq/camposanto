<?php
require_once "../funciones.php";
require_once "../controlador/wizard.controlador.php";
require_once "../modelo/wizard.modelo.php";
class AjaxWizard{
	public function ajaxEdoEspacio(){
		$respuesta = ControladorWizard::ctrEdoEspacio();
		echo json_encode($respuesta);
	}//function ajaxEdoEspacio
	public function ajaxIdentificador(){
		$respuesta = ControladorWizard::ctrIdentificador();
		echo json_encode($respuesta);
	}//function ajaxIdentificador
	public function ajaxGuardaDetalle(){
		$respuesta = ControladorWizard::ctrGuardaDetalle();
		echo json_encode($respuesta);
	}//function ajaxGuardaDetalle
	public function ajaxEjecutaProcedureGeneraCtto(){
		$respuesta = ControladorWizard::ctrEjecutaProcedureGeneraCtto();
		echo json_encode($respuesta);
	}//function ajaxEjecutaProcedureGeneraCtto
	public function ajaxGuardaDscto(){
		$respuesta = ControladorWizard::ctrGuardaDscto();
		echo json_encode($respuesta);
	}//function ajaxGuardaDscto
	public function ajaxGuardaEndoso(){
		$respuesta = ControladorWizard::ctrGuardaEndoso();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGuardaEndoso
	public function ajaxGuardaBeneficiario(){
		$respuesta = ControladorWizard::ctrGuardaBeneficiario();
		echo json_encode($respuesta);
	}//function ajaxGuardaBeneficiario
}//class AjaxWizard
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["edoEspacio"]) && $_POST["edoEspacio"] == 'mostrar'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxEdoEspacio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'identificador'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxIdentificador();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardarfila'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxGuardaDetalle();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'ejecutaProcedure'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxEjecutaProcedureGeneraCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaDscto'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxGuardaDscto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaEndoso'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxGuardaEndoso();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaBeneficiario'){
	$cliente = new AjaxWizard();
	$cliente -> ajaxGuardaBeneficiario();
}