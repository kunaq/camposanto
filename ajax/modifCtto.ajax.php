<?php
require_once "../funciones.php";
require_once "../controlador/modifCtto.controlador.php";
require_once "../modelo/modifCtto.modelo.php";
class AjaxModifCtto{
	public function ajaxBuscaCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_generacion"] = dateFormat($respuesta[$key]["fch_generacion"]);
			$respuesta[$key]["fch_anulacion"] = ($respuesta[$key]["fch_anulacion"] != '') ? dateFormat($respuesta[$key]["fch_anulacion"]) : '';
			$respuesta[$key]["fch_emision"] = ($respuesta[$key]["fch_emision"] != '') ? dateFormat($respuesta[$key]["fch_emision"]) : '';
			$respuesta[$key]["fch_activacion"] = ($respuesta[$key]["fch_activacion"] != '') ? dateFormat($respuesta[$key]["fch_activacion"]) : '';
			$respuesta[$key]["fch_resolucion"] = ($respuesta[$key]["fch_resolucion"] != '') ? dateFormat($respuesta[$key]["fch_resolucion"]) : '';
			$respuesta[$key]["fch_primer_vencimiento"] = ($respuesta[$key]["fch_primer_vencimiento"] != '') ? dateFormat($respuesta[$key]["fch_primer_vencimiento"]) : '';
			$respuesta[$key]["fch_termino_carencia"] = ($respuesta[$key]["fch_termino_carencia"] != '') ? dateFormat($respuesta[$key]["fch_termino_carencia"]) : '';
			$respuesta[$key]["fch_transferencia"] = ($respuesta[$key]["fch_transferencia"] != '') ? dateFormat($respuesta[$key]["fch_transferencia"]) : '';
			$respuesta[$key]["fch_real_generacion"] = ($respuesta[$key]["fch_real_generacion"] != '') ? dateFormat($respuesta[$key]["fch_real_generacion"]) : '';
		}
		echo json_encode($respuesta);
	}//function ajaxBuscaCtto
	public function ajaxBuscaDatosServicio(){
		$respuesta = ControladorModifCtto::ctrBuscaDatosServicio();
		$respuesta["fch_primer_vencimiento"] = ($respuesta["fch_primer_vencimiento"] != '') ? dateFormat($respuesta["fch_primer_vencimiento"]) : '';
		echo json_encode($respuesta);
	}//ajaxBuscaDatosServicio
	public function ajaxBuscaServPpal(){
		$respuesta = ControladorModifCtto::ctrBuscaServPpal();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_generacion"] = ($respuesta[$key]["fch_generacion"] != '') ? dateFormat($respuesta[$key]["fch_generacion"]) : '';
			$respuesta[$key]["fch_anulacion"] = ($respuesta[$key]["fch_anulacion"] != '') ? dateFormat($respuesta[$key]["fch_anulacion"]) : '';
			$respuesta[$key]["fch_emision"]= ($respuesta[$key]["fch_emision"] != '') ? dateFormat($respuesta[$key]["fch_emision"]) : '';
			$respuesta[$key]["fch_activacion"] = ($respuesta[$key]["fch_activacion"] != '') ? dateFormat($respuesta[$key]["fch_activacion"]) : '';
			$respuesta[$key]["fch_resolucion"] = ($respuesta[$key]["fch_resolucion"] != '') ? dateFormat($respuesta[$key]["fch_resolucion"]) : '';
		}	
	echo json_encode($respuesta);
	}//ajaxBuscaServPpal
	public function ajaxBuscaDsctoXCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaDsctoXCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_registro"] = ($respuesta[$key]["fch_registro"] != '') ? dateTimeFormat($respuesta[$key]["fch_registro"]) : '';
		}	
	echo json_encode($respuesta);
	}//ajaxBuscaDsctoXCtto
	public function ajaxBuscaEndXCtto(){
		$respuesta = ControladorModifCtto::ctrBuscaEndXCtto();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_registro"] = ($respuesta[$key]["fch_registro"] != '') ? dateTimeFormat($respuesta[$key]["fch_registro"]) : '';
			$respuesta[$key]["fch_vencimiento"] = ($respuesta[$key]["fch_vencimiento"] != '') ? dateFormat($respuesta[$key]["fch_vencimiento"]) : '';
			$respuesta[$key]["fch_cancelacion"] = ($respuesta[$key]["fch_cancelacion"] != '') ? dateFormat($respuesta[$key]["fch_cancelacion"]) : '';
		}	
	echo json_encode($respuesta);
	}//ajaxBuscaEndXCtto
	public function ajaxBuscaCliente(){
		$respuesta = ControladorModifCtto::ctrBuscaCliente();
		if($respuesta["fch_nacimiento"] != ''){
			$respuesta["fch_nacimiento"] = dateFormat($respuesta["fch_nacimiento"]);
		}else{
			$respuesta["fch_nacimiento"] = '';
		}
		echo json_encode($respuesta);
	}//ajaxBuscaCliente
	public function ajaxBuscaCronograma(){
		$respuesta = ControladorModifCtto::ctrBuscaCronograma();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_vencimiento"] = ($respuesta[$key]["fch_vencimiento"] != '') ? dateFormat($respuesta[$key]["fch_vencimiento"]) : '';
		}
		echo json_encode($respuesta);
	}//ajaxBuscaCronograma
	public function ajaxBuscaCronogramaFOMA(){
		$respuesta = ControladorModifCtto::ctrBuscaCronogramaFOMA();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_vencimiento"] = ($respuesta[$key]["fch_vencimiento"] != '') ? dateFormat($respuesta[$key]["fch_vencimiento"]) : '';
		}
		echo json_encode($respuesta);
	}//ajaxBuscaCronogramaFOMA
	public function ajaxBuscaObservaciones(){
		$respuesta = ControladorModifCtto::ctrBuscaObservaciones();
		foreach ($respuesta as $key => $value) {
			$respuesta[$key]["fch_registro"] = ($respuesta[$key]["fch_registro"] != '') ? dateTimeFormat($respuesta[$key]["fch_registro"]) : '';
		}
		echo json_encode($respuesta);
	}//ajaxBuscaObservaciones
	public function ajaxValUsoServ(){
		$respuesta = ControladorModifCtto::ctrValUsoServ();
		echo json_encode($respuesta);
	}//ajaxValUsoServ
	public function ajaxVerificaTrans(){
		$respuesta = ControladorModifCtto::ctrVerificaTrans();
		echo json_encode($respuesta);
	}//ajaxVerificaTrans
	public function ajaxReplicaDatos(){
		$respuesta = ControladorModifCtto::ctrReplicaDatos();
		echo json_encode($respuesta);
	}//ajaxReplicaDatos
	public function ajaxActualizaFoma(){
		$respuesta = ControladorModifCtto::ctrActualizaFoma();
		echo json_encode($respuesta);
	}//ajaxActualizaFoma
	public function ajaxActualizaCronograma(){
		$respuesta = ControladorModifCtto::ctrActualizaCronograma();
		echo json_encode($respuesta);
	}//ajaxActualizaCronograma
	public function ajaxModificado(){
		$respuesta = ControladorModifCtto::ctrModificado();
		echo json_encode($respuesta);
	}//ajaxModificado
	public function ajaxGeneraEspacio(){
		$respuesta = ControladorModifCtto::ctrGeneraEspacio();
		echo json_encode($respuesta);
	}//ajaxGeneraEspacio
	public function ajaxValidaPagos(){
		$respuesta = ControladorModifCtto::ctrValidaPagos();
		echo json_encode($respuesta);
	}//ajaxValidaPagos
	public function ajaxBuscaGrupo(){
		$respuesta = ControladorModifCtto::ctrBuscaGrupo();
		echo json_encode($respuesta);
	}//ajaxBuscaGrupo
	public function ajaxBuscaBeneficiario(){
		$respuesta = ControladorModifCtto::ctrBuscaBeneficiario();
		echo json_encode($respuesta);
	}//ajaxBuscaBeneficiario
	public function ajaxBuscaCodCuotas(){
		$respuesta = ControladorModifCtto::ctrBuscaCodCuotas();
		echo json_encode($respuesta);
	}//ajaxBuscaCodCuotas
	public function ajaxBuscaCodInteres(){
		$respuesta = ControladorModifCtto::ctrBuscaCodInteres();
		echo json_encode($respuesta);
	}//ajaxBuscaCodInteres
	public function ajaxBuscaCtdBenef(){
		$respuesta = ControladorModifCtto::ctrBuscaCtdBenef();
		echo json_encode($respuesta);
	}//ajaxBuscaCtdBenef
	public function ajaxBuscaMaxCuotas(){
		$respuesta = ControladorModifCtto::ctrBuscaMaxCuotas();
		echo $respuesta;
	}//ajaxBuscaMaxCuotas
	public function ajaxBuscaMaxValorCuotas(){
		$respuesta = ControladorModifCtto::ctrBuscaMaxValorCuotas();
		echo $respuesta;
	}//ajaxBuscaMaxValorCuotas
	public function ajaxBuscaCostoCarencia(){
		$respuesta = ControladorModifCtto::ctrBuscaCostoCarencia();
		echo $respuesta;
	}//ajaxBuscaCostoCarencia
	public function ajaxRpDatosMod(){
		$respuesta = ControladorModifCtto::ctrRpDatosMod();
		echo json_encode($respuesta);
	}//ajaxRpDatosMod
	public function ajaxActFOMAMod(){
		$respuesta = ControladorModifCtto::ctrActFOMAMod();
		echo json_encode($respuesta);
	}//ajaxActFOMAMod
	public function ajaxGuardaBeneficiarios(){
		$respuesta = ControladorModifCtto::ctrGuardaBeneficiarios();
		echo json_encode($respuesta);
	}//ajaxGuardaBeneficiarios
	public function ajaxajaxActResCronoMod(){
		$respuesta = ControladorModifCtto::ctrActResCronoMod();
		echo json_encode($respuesta);
	}//ajaxajaxActResCronoMod
	public function ajaxajaxActCabeceraMod(){
		$respuesta = ControladorModifCtto::ctrActCabeceraMod();
		echo json_encode($respuesta);
	}//ajaxajaxActCabeceraMod
	public function ajaxlineaMaxObsrv(){
		$respuesta = ControladorModifCtto::ctrlineaMaxObsrv();
		echo json_encode($respuesta);
	}//ajaxajaxlineaMaxObsrv
	public function ajaxGuardaCronograma(){
		$respuesta = ControladorModifCtto::ctrGuardaCronograma();
		echo json_encode($respuesta);
	}//ajaxGuardaCronograma
}//class AjaxModifCtto
/*=============================================
ACCIONES
=============================================*/
if(isset($_POST["accion"]) && $_POST["accion"] == 'tabla'){
	$cliente = new AjaxModifCtto();
	// $cliente -> ajaxBuscaCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'conCodigo'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'DetServ'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaDatosServicio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'servPpal'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaServPpal();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'DsctoXCtto'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaDsctoXCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'EndXCtto'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaEndXCtto();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaCli'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCliente();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'cronograma'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCronograma();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'FOMA'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCronogramaFOMA();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'observaciones'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaObservaciones();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'valUsoServ'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxValUsoServ();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'verificaTrans'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxVerificaTrans();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'replicaDatos'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxReplicaDatos();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actualizaFoma'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxActualizaFoma();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actualizaCronograma'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxActualizaCronograma();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'modificado'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxModificado();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'generaEspacio'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxGeneraEspacio();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'cuotasPagadas'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxValidaPagos();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'buscaGrupo'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaGrupo();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'beneficiarios'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaBeneficiario();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'codCuotas'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCodCuotas();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'codInteres'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCodInteres();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'ctdBenef'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCtdBenef();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'maxCuotas'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaMaxCuotas();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'maxValorCuotas'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaMaxValorCuotas();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'costoCarencia'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxBuscaCostoCarencia();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'RpDatosMod'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxRpDatosMod();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'ActFOMAMod'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxActFOMAMod();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaBeneficiarios'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxGuardaBeneficiarios();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actResCronoMod'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxActResCronoMod();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'actCabeceraMod'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxActCabeceraMod();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'lineaMaxObsrv'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxLineaMaxObsrv();
}
else if(isset($_POST["accion"]) && $_POST["accion"] == 'guardaCronograma'){
	$cliente = new AjaxModifCtto();
	$cliente -> ajaxGuardaCronograma();
}