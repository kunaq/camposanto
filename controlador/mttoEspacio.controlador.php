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

}//class ControladorMttoEspacio
?>