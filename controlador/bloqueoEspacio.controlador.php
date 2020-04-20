<?php
session_start();
class ControladorBloqueoEspacio{
	
	static public function ctrListaBloqueo(){
		$as_camposanto = $_POST["as_camposanto"];
		$as_plataforma = $_POST['as_plataforma'];
	    $as_area = $_POST['as_area'];
	    $as_eje_horizontal = $_POST['as_eje_horizontal'];
	    $as_eje_vertical = $_POST['as_eje_vertical'];
	    $as_espacio = $_POST['as_espacio'];
	    $tabla1 = 'vtade_bloqueo_x_espacio';
	    $tabla2 = 'vtama_tipo_bloqueo'; 
		$respuesta = ModeloBloqueoEspacio::mdlListaBloqueo($as_camposanto, $as_plataforma, $as_area, $as_eje_horizontal, $as_eje_vertical, $as_espacio, $tabla1, $tabla2);
		return $respuesta;
	}//function ctrListaBloqueo

	static public function ctrDscBloqueo(){
		$codigo = $_GET["value"];
	    $tabla = 'vtama_tipo_bloqueo'; 
		$respuesta = ModeloBloqueoEspacio::mdlDscBloqueo($codigo, $tabla);
		return $respuesta;
	}//function ctrDscBloqueo

	static public function ctrFlgNicho(){
		$plataforma = $_POST["value"];
		$camposanto = $_POST["camposanto"];
	    $tabla = 'vtama_tipo_plataforma';
	    $tabla2 = 'vtama_plataforma';
		$respuesta = ModeloBloqueoEspacio::mdlFlgNicho($plataforma, $camposanto, $tabla, $tabla2);
		return $respuesta;
	}//function ctrFlgNicho

	static public function ctrFlgBloqueo(){
		$codigo = $_POST["codigo"];
	    $tabla = 'vtama_tipo_bloqueo';
		$respuesta = ModeloBloqueoEspacio::mdlFlgBloqueo($codigo, $tabla);
		return $respuesta;
	}//function ctrFlgBloqueo

	static public function ctrFlgLibre(){
		$ls_camposanto = $_POST['as_camposanto'];
		$ls_plataforma = $_POST['as_plataforma'];
		$ls_area = $_POST['as_area'];
		$ls_eje_horizontal = $_POST['as_eje_horizontal'];
		$ls_eje_vertical = $_POST['as_eje_vertical'];
		$ls_espacio = $_POST['as_espacio'];
	    $tabla = 'vtama_estadoespacio';
	    $tabla2 = 'vtaca_espacio';
		$respuesta = ModeloBloqueoEspacio::mdlFlgLibre($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $tabla, $tabla2);
		return $respuesta;
	}//function ctrFlgLibre

	static public function ctrCdtBloqueo(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_solicitante = $_POST['ls_solicitante'];
		$li_anno = date('YY');
		$li_mes = date('mm');
	    $tabla = 'vtade_bloqueo_x_espacio';
	    $tabla2 = 'vtama_tipo_bloqueo';
		$respuesta = ModeloBloqueoEspacio::mdlCdtBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_solicitante, $li_anno, $li_mes, $tabla, $tabla2);
		return $respuesta;
	}//function ctrCdtBloqueo

	static public function ctrCdtEspacio(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_solicitante = $_POST['ls_solicitante'];
		$li_anno = date('YY');
		$li_mes = date('mm');
	    $tabla = 'vtade_bloqueo_x_espacio';
	    $tabla2 = 'vtama_tipo_bloqueo';
		$respuesta = ModeloBloqueoEspacio::mdlCdtEspacio($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_solicitante, $li_anno, $li_mes, $tabla, $tabla2);
		return $respuesta;
	}//function ctrCdtEspacio

	static public function ctrExisteBloqueo(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_bloqueo = $_POST['ls_bloqueo'];
		$ls_desbloqueo = $_POST['ls_desbloqueo'];
	    $tabla = 'vtade_bloqueo_x_espacio';
	    $tabla2 = 'vtama_tipo_bloqueo';
		$respuesta = ModeloBloqueoEspacio::mdlExisteBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_bloqueo, $ls_desbloqueo, $tabla, $tabla2);
		return $respuesta;
	}//function ctrExisteBloqueo

	static public function ctrExisteEventoBloqueo(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$respuesta = ModeloBloqueoEspacio::mdlExisteEventoBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio);
		return $respuesta;
	}//function ctrExisteEventoBloqueo

	static public function ctrFlgBloqueoResolucion(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$respuesta = ModeloBloqueoEspacio::mdlFlgBloqueoResolucion($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio);
		return $respuesta;
	}//function ctrFlgBloqueoResolucion

	static public function ctrFlgBloqueado(){
		$ls_estado_espacio = $_POST['ls_estado_espacio'];
		$respuesta = ModeloBloqueoEspacio::mdlFlgBloqueado($ls_estado_espacio);
		return $respuesta;
	}//function ctrFlgBloqueado

	static public function ctrEjecutaBloqueo(){
		$ls_camposanto = $_POST['ls_camposanto'];
		$ls_plataforma = $_POST['ls_plataforma'];
		$ls_area = $_POST['ls_area'];
		$ls_eje_horizontal = $_POST['ls_eje_horizontal'];
		$ls_eje_vertical = $_POST['ls_eje_vertical'];
		$ls_espacio = $_POST['ls_espacio'];
		$ls_tipo_bloqueo = $_POST['ls_tipo_bloqueo'];
		$ls_solicitante = $_POST['ls_solicitante'];
		$ls_bloqueo = $_POST['ls_bloqueo'];
		$ls_desbloqueo = $_POST['ls_desbloqueo'];
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$ldt_fch_evento = $fecha.' '.$hora;
		$gs_usuario = $_SESSION["user"];
		$ls_tipo_espacio = $_POST['ls_tipo_espacio'];
		$ls_dsc_observacion = $_POST['ls_dsc_observacion'];
		$respuesta = ModeloBloqueoEspacio::mdlEjecutaBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_tipo_bloqueo,$ls_tipo_espacio, $ls_dsc_observacion, $ls_solicitante, $ls_bloqueo, $ls_desbloqueo, $ldt_fch_evento, $gs_usuario);
		return $respuesta;
	}//function ctrEjecutaBloqueo

}//class ControladorBloqueoEspacio
?>