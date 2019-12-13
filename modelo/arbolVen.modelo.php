<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloArbolVen{
	static public function mdlMostrarTraArbolVen($tabla){
		$db = new Conexion();
		$sql = $db->consulta("SELECT cod_trabajador, dsc_apelido_paterno, dsc_apellido_materno, dsc_nombres FROM $tabla");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlMostrarTraArbolVen

	static public function mdlVerDetPeriodo($tabla,$tipoPeriodo,$anio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin, flg_estado, cod_usuario, fch_cierre, flg_cierre_manual, num_anno_ant, cod_tipo_periodo_ant, cod_periodo_ant, dsc_periodo, num_mes FROM $tabla WHERE num_anno = '$anio' AND cod_periodo = '$tipoPeriodo'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetPeriodo

}//class ModeloArbolVen
?>