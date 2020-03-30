<?php
class ControladorArbolVen{
	static public function ctrMostrarTraArbolVen(){
		$tabla = "rhuma_trabajador";
		$respuesta = ModeloArbolVen::mdlMostrarTraArbolVen($tabla);
		return $respuesta;
	}//function ctrMostrarTraArbolVen

	static public function ctrVerDetTrabajador(){
		$codTrabajador = $_POST['codTrabajador'];
		$tabla = "vtama_historico_vendedor";
		$tabla2 = 'vtama_tipo_comisionista';
		$tabla3 = 'vtama_grupo';
		$tabla4 = 'vtama_periodo';
		$respuesta = ModeloArbolVen::mdlVerDetTrabajador($tabla,$tabla2,$tabla3,$tabla4,$codTrabajador);
		return $respuesta;
	}//function ctrVerDetTrabajador(

	static public function ctrNombreTrabajador(){
		$tabla = "rhuma_trabajador";
		$codigo = $_POST['codTrabajador'];
		$respuesta = ModeloArbolVen::mdlNombreTrabajador($tabla,$codigo);
		return $respuesta;
	}//function ctrNombreTrabajador
	
	static public function ctrBuscarCtto(){
		$tabla = "vtade_contrato";
		$tabla2 = "vtama_localidad";
		$codigo = $_POST['codTrabajador'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipoPeriodo'];
		$annio = $_POST['annio'];
		$respuesta = ModeloArbolVen::mdlBuscarCtto($tabla,$tabla2,$codigo,$periodo,$tipoPeriodo,$annio);
		return $respuesta;
	}//function ctrBuscarCtto
	
	static public function ctrNombreGrupoVen(){
		$tabla = "vtama_grupo";
		$tabla2 = "rhuma_trabajador";
		$respuesta = ModeloArbolVen::mdlBuscarGrupoVen($tabla,$tabla2);
		return $respuesta;
	}//function ctrNombreTrabajador
	
	static public function ctrBuscarFueVen(){
		$tabla = "vtama_historico_vendedor";
		$codigo = $_POST['codTrabajador'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipo_periodo'];
		$annio = $_POST['anno'];
		$respuesta = ModeloArbolVen::mdlBuscarFueVen($tabla,$codigo,$periodo,$tipoPeriodo,$annio);
		return $respuesta;
	}//function ctrBuscarFueVen

	static public function ctrBuscarNomComi(){
		$tabla = "vtama_tipo_comisionista";
		$codigo = $_POST['cod'];
		$respuesta = ModeloArbolVen::mdlBuscarNomComi($tabla,$codigo);
		return $respuesta;
	}//function ctrBuscarNomComi

	static public function ctrExisteConsejero(){
		$tabla = "vtama_historico_vendedor";
		$codigo = $_POST['codTrabajador'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipo_periodo'];
		$annio = $_POST['anno'];
		$respuesta = ModeloArbolVen::mdlExisteConsejero($tabla,$codigo,$periodo,$tipoPeriodo,$annio);
		return $respuesta;
	}//function ctrExisteConsejero

	static public function ctrModificarArbVen(){
		$tabla = "vtama_historico_vendedor";
		$codigo = $_POST['codTrabajador'];
		$grupo = $_POST['grupo'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipo_periodo'];
		$annio = $_POST['anno'];
		$comisionista = $_POST['tipo_comisionista'];
		$jefe = $_POST['jefe'];
		$supervisor = $_POST['supervisor'];
		$flg_jefe = $_POST['flg_jefe'];
		$flg_sup = $_POST¨['flg_supervisor'];
		$respuesta = ModeloArbolVen::mdlModificarArbVen($tabla,$codigo,$grupo,$periodo,$tipoPeriodo,$annio,$comisionista,$jefe,$supervisor,$flg_jefe,$flg_sup);
		return $respuesta;
	}//function ctrModificarArbVen

	static public function ctrEliminarArbVen(){
		$tabla = "vtama_historico_vendedor";
		$codigo = $_POST['codTrabajador'];
		$grupo = $_POST['grupo'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipo_periodo'];
		$annio = $_POST['anno'];
		$comisionista = $_POST['tipo_comisionista'];
		$jefe = $_POST['jefe'];
		$supervisor = $_POST['supervisor'];
		$flg_jefe = $_POST['flg_jefe'];
		$flg_sup = $_POST¨['flg_supervisor'];
		$respuesta = ModeloArbolVen::mdlEliminarArbVen($tabla,$codigo,$grupo,$periodo,$tipoPeriodo,$annio,$comisionista,$jefe,$supervisor,$flg_jefe,$flg_sup);
		return $respuesta;
	}//function ctrEliminarArbVen

	static public function ctrGuardarArbVen(){
		$tabla = "vtama_historico_vendedor";
		$codigo = $_POST['codTrabajador'];
		$grupo = $_POST['grupo'];
		$periodo = $_POST['periodo'];
		$tipoPeriodo = $_POST['tipo_periodo'];
		$annio = $_POST['anno'];
		$comisionista = $_POST['tipo_comisionista'];
		$jefe = $_POST['jefe'];
		$supervisor = $_POST['supervisor'];
		$flg_jefe = $_POST['flg_jefe'];
		$flg_sup = $_POST¨['flg_supervisor'];
		$respuesta = ModeloArbolVen::mdlGuardarArbVen($tabla,$codigo,$grupo,$periodo,$tipoPeriodo,$annio,$comisionista,$jefe,$supervisor,$flg_jefe,$flg_sup);
		return $respuesta;
	}//function ctrGuardarArbVen
}//class ControladorArbolVen
?>