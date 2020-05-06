<?php
session_start();
class ControladorMttoEspacio{

	static public function ctrListaMtto(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_tipo_plataforma = $_POST['ls_tipo_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$respuesta = ModeloMttoEspacio::mdlListaMtto($ls_camposanto, $ls_plataforma, $ls_tipo_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio);
		return $respuesta;
	}//function ctrListaMtto

	static public function ctrSelectTipoEsp(){
		$respuesta = ModeloMttoEspacio::mdlSelectTipoEsp();
		return $respuesta;
	}//function ctrSelectTipoEsp

	static public function ctrSelectEstado(){
		$respuesta = ModeloMttoEspacio::mdlSelectEstado();
		return $respuesta;
	}//function ctrSelectEstado

	static public function ctrBorrarAnterior(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_h = $_POST['ls_eje_h'];
		$ls_eje_v = $_POST['ls_eje_v'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_tipo_aux = $_POST['ls_tipo_aux'];
		$respuesta = ModeloMttoEspacio::mdlBorrarAnterior($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo_aux);
		return $respuesta;
	}//function ctrBorrarAnterior

	static public function ctrActualizaCabecera(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_h = $_POST['ls_eje_h'];
		$ls_eje_v = $_POST['ls_eje_v'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_tipo_aux = $_POST['ls_tipo_aux'];
		$ls_estado = $_POST['ls_estado'];
		$respuesta = ModeloMttoEspacio::mdlActualizaCabecera($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo_aux, $ls_estado);
		return $respuesta;
	}//function ctrActualizaCabecera

	static public function ctrInsertaDet(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_h = $_POST['ls_eje_h'];
		$ls_eje_v = $_POST['ls_eje_v'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_tipo = $_POST['ls_tipo'];
		$respuesta = ModeloMttoEspacio::mdlInsertaDet($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo);
		return $respuesta;
	}//function ctrInsertaDet

	static public function ctrFlgLibre(){
		$cod = $_POST['cod'];
		$respuesta = ModeloMttoEspacio::mdlFlgLibre($cod);
		return $respuesta;
	}//function ctrFlgLibre

	static public function ctrExeProcedure(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_h = $_POST['ls_eje_h'];
		$ls_eje_v = $_POST['ls_eje_v'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_tipo = $_POST['ls_tipo'];
		$ls_tipo_aux = $_POST['ls_tipo_aux'];
		$respuesta = ModeloMttoEspacio::mdlExeProcedure($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo, $ls_tipo_aux);
		return $respuesta;
	}//function ctrExeProcedure

}//class ControladorMttoEspacio
?>