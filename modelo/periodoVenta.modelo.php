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
	}

}//class ModeloPeriodoVenta
?>