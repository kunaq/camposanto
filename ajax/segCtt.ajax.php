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
	public function ajaxGetRefinServ(){
		$respuesta = ControladorSegContrato::ctrGetRefinServ();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetRefinServ
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
	public function ajaxGetServPrincipal(){
		$respuesta = ControladorSegContrato::ctrGetServPrincipal();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetServPrincipal
	public function ajaxGetDsctoServicio(){
		$respuesta = ControladorSegContrato::ctrGetDsctoServicio();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDsctoServicio
	public function ajaxGetEndoServicio(){
		$respuesta = ControladorSegContrato::ctrGetEndoServicio();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetEndoServicio
	public function ajaxGetCuotasCron(){
		$respuesta = ControladorSegContrato::ctrGetCuotasCron();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetEndoServicio
	public function ajaxGetDatosEspacio(){
		$respuesta = ControladorSegContrato::ctrGetDatosEspacio();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDatosEspacio
	public function ajaxGetDetFinanciamiento(){
		$respuesta = ControladorSegContrato::ctrGetDetFinanciamiento();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDetFinanciamiento
	public function ajaxGetComprobantes(){
		$respuesta = ControladorSegContrato::ctrGetComprobantes();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDetFinanciamiento
	public function ajaxGetCancelaciones(){
		$respuesta = ControladorSegContrato::ctrGetCancelaciones();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDetFinanciamiento
	
	public function ajaxGetDatosCliente(){
		$respuesta = ControladorSegContrato::ctrGetDatosCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDatosCliente
	
	public function ajaxFiltroComprobantes(){
		$respuesta = ControladorSegContrato::ctrFiltroComprobantes();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDatosCliente

	public function ajaxGetAutorizacion(){
		$respuesta = ControladorSegContrato::ctrGetAutorizacion();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetBeneficiariosServ
	
	public function ajaxGetDeudasCliente(){
		$respuesta = ControladorSegContrato::ctrGetDeudasCliente();
		echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	}//function ajaxGetDeudasCliente


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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getRefinServ'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetRefinServ();
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
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getServPrincipal'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetServPrincipal();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDsctoServicio'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDsctoServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getEndoServicio'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetEndoServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getCuotasCron'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetCuotasCron();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDatosEspacio'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDatosEspacio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDetFinanciamiento'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDetFinanciamiento();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getComprobantes'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetComprobantes();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getCancelaciones'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetCancelaciones();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDatosCliente'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDatosCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'filtroComprobantes'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxFiltroComprobantes();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getAutorizacion'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetAutorizacion();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'getDeudasCliente'){
	$cliente = new AjaxSegCtt();
	$cliente -> ajaxGetDeudasCliente();
}
