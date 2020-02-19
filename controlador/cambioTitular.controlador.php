<?php

session_start();

class ControladorCambioTitular{

	static public function ctrGetServiciosCtt(){
		$cod_localidad = $_POST['cod_localidad'];
		$cod_contrato = $_POST['cod_contrato'];
	    
		$respuesta = ModeloCambioTitular::mdlgetServiciosCtt($cod_localidad,$cod_contrato);
		return $respuesta;
	}//function ctrGetServiciosCtt
	
	static public function ctrGetDatosCliente(){

		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloCambioTitular::mdlGetDatosCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetDatosCliente

	static public function ctrGetDireccionCliente(){

		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloCambioTitular::mdlGetDireccionCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetDireccionCliente
	
	static public function ctrGetNombreCliente(){

		$cod_cliente = $_POST['cod_cliente'];
	    
		$respuesta = ModeloCambioTitular::mdlGetNombreCliente($cod_cliente);
		return $respuesta;
	}//function ctrGetNombreCliente

	static public function ctrGetRefinServ(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$cod_servicio = $_POST['cod_servicio'];

		$respuesta = ModeloCambioTitular::mdlGetRefinServ($localidad,$cod_contrato,$cod_servicio);
		return $respuesta;
	}//function ctrGetRefinServ
	
	static public function ctrGetFlagsServicios(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$cod_servicio = $_POST['cod_servicio'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];

		$respuesta = ModeloCambioTitular::mdlGetFlagsServicios($localidad,$cod_contrato,$cod_servicio,$tipo_ctt,$tipo_programa);
		return $respuesta;
	}//function ctrGetFlagsServicios
	
	static public function ctrGetCambioTitular(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];

		$respuesta = ModeloCambioTitular::mdlGetCambioTitular($localidad,$cod_contrato,$tipo_ctt,$tipo_programa);
		return $respuesta;
	}//function ctrGetCambioTitular
	
	static public function ctrGetEstadoCambioTitular(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$num_servicio = $_POST['num_servicio'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];

		$respuesta = ModeloCambioTitular::mdlGetEstadoCambioTitular($localidad,$cod_contrato,$num_servicio,$tipo_ctt,$tipo_programa);
		return $respuesta;
	}//function ctrGetEstadoCambioTitular
	
	static public function ctrGetFoma(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$num_servicio = $_POST['num_servicio'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];

		$respuesta = ModeloCambioTitular::mdlGetFoma($localidad,$cod_contrato,$num_servicio,$tipo_ctt,$tipo_programa);
		return $respuesta;
	}//function ctrGetFoma
	
	static public function ctrUpdateServicio(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$num_servicio = $_POST['num_servicio'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];
		$cod_titular_nuevo = $_POST['cod_titular_nuevo'];
		$num_servicio_cambio = $_POST['num_servicio_cambio'];

		$respuesta = ModeloCambioTitular::mdlUpdateServicio($localidad,$cod_contrato,$num_servicio,$tipo_ctt,$tipo_programa,$cod_titular_nuevo,$num_servicio_cambio);
		return $respuesta;
	}//function ctrUpdateServicio
	
	static public function ctrUpdateCambioTitular(){

		$localidad = $_POST['localidad'];
		$cod_contrato = $_POST['cod_contrato'];
		$num_servicio = $_POST['num_servicio'];
		$tipo_ctt = $_POST['cod_tipo_ctt'];
		$tipo_programa = $_POST['cod_tipo_programa'];
		$cod_titular = $_POST['cod_titular'];
		$cod_usuario = $_SESSION['user'];

		$respuesta = ModeloCambioTitular::mdlUpdateCambioTitular($localidad,$cod_contrato,$num_servicio,$tipo_ctt,$tipo_programa,$cod_titular,$cod_usuario);
		return $respuesta;
	}//function ctrUpdateCambioTitular

}//class ControladorCambioTitular
?>