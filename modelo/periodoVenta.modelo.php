<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloPeriodoVenta{
	static public function mdlListaPeriodo($tabla,$tipoPeriodo,$anio){
		$db = new Conexion();
		if($tipoPeriodo == '' && $anio != ''){
			$where = "WHERE num_anno = '$anio'";
		}else if($tipoPeriodo != '' && $anio == ''){
			$where = "WHERE cod_tipo_periodo = '$tipoPeriodo'";
		}else if($tipoPeriodo != '' && $anio != ''){
			$where = "WHERE cod_tipo_periodo = '$tipoPeriodo' AND num_anno = '$anio'";
		}else{
			$where = "";
		}
		$sql = $db->consulta("SELECT num_anno, cod_periodo, flg_estado, num_mes  FROM $tabla $where ORDER BY num_anno DESC");
		// echo "SELECT num_anno, cod_periodo, flg_estado, num_mes  FROM $tabla $where ORDER BY num_anno DESC";
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlListaPeriodo

	static public function mdlVerDetPeriodo($tabla,$tipoPeriodo,$anio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin, flg_estado, cod_usuario, fch_cierre, flg_cierre_manual, num_anno_ant, cod_tipo_periodo_ant, cod_periodo_ant, dsc_periodo, num_mes FROM $tabla WHERE num_anno = $anio AND cod_tipo_periodo = $tipoPeriodo");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetPeriodo

}//class ModeloPeriodoVenta
?>