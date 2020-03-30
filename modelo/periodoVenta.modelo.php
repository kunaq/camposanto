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
		$sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin, flg_estado, cod_usuario, fch_cierre, flg_cierre_manual, num_anno_ant, cod_tipo_periodo_ant, cod_periodo_ant, dsc_periodo, num_mes FROM $tabla WHERE num_anno = '$anio' AND cod_periodo = '$tipoPeriodo'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetPeriodo

	static public function mdlExstConf($tabla,$tipoPeriodo,$anio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT COUNT(1) FROM $tabla WHERE num_anno = '$anio' AND cod_tipo_periodo = '$tipoPeriodo'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlExstConf

	static public function mdlCopiaAnnio($tabla,$tipoPeriodo,$anio){
		$db = new Conexion();
		$sql = $db->consulta("INSERT INTO vtama_periodo (num_anno, cod_tipo_periodo, cod_periodo, fch_inicio, fch_fin, flg_estado, cod_usuario, fch_cierre, flg_cierre_manual, num_anno_ant, cod_tipo_periodo_ant, cod_periodo_ant, dsc_periodo, num_mes, flg_modificacion_grupo, flg_parametros_comision, flg_cierre_proceso, fch_modificacion_grupo, fch_parametros_comision, fch_cierre_proceso)
                SELECT  vtama_periodo.num_anno + 1,
                        vtama_periodo.cod_tipo_periodo,
                        vtama_periodo.cod_periodo,
                        DATEADD(YY, 1, vtama_periodo.fch_inicio),
                        ( CASE WHEN
                            (( DATEPART(MM, vtama_periodo.fch_fin) * 100 ) +
                            DATEPART(DD, vtama_periodo.fch_fin)) IN (228, 229) THEN
                            DATEADD(DD, -1, CONVERT(DATETIME, CONVERT(VARCHAR(4), $anio + 1) + '/03/01', 101))                                                                    
                            ELSE                                  
                                DATEADD(YY, 1, vtama_periodo.fch_fin)                
                            END ),
                            'AB', NULL, NULL,
                            'NO', vtama_periodo.num_anno_ant + 1,
                            vtama_periodo.cod_tipo_periodo_ant,
                            vtama_periodo.cod_periodo_ant,
                            vtama_periodo.dsc_periodo,
                            vtama_periodo.num_mes,
                            'NO', 'NO', 'NO', NULL, NULL, NULL
                FROM  vtama_periodo
                WHERE vtama_periodo.num_anno = '$anio'
                AND  vtama_periodo.cod_tipo_periodo = '$tipoPeriodo'");
		$sql2 = $db->consulta("UPDATE vtama_periodo SET vtama_periodo.num_anno_ant =                     
                            ( SELECT x.num_anno FROM vtama_periodo x WHERE x.fch_fin = DATEADD(DD, -1, vtama_periodo.fch_inicio)), vtama_periodo.cod_tipo_periodo_ant =
                            ( SELECT x.cod_tipo_periodo FROM vtama_periodo x WHERE x.fch_fin = DATEADD(DD, -1, vtama_periodo.fch_inicio)), vtama_periodo.cod_periodo_ant =
                            ( SELECT x.cod_periodo FROM vtama_periodo x WHERE x.fch_fin = DATEADD(DD, -1, vtama_periodo.fch_inicio)) 
                        WHERE vtama_periodo.num_anno = '$anio' + 1;");
		if($sql && $sql2){
			return 1;
		}else{
			return "error";
		}
		$db->liberar($sql);
        $db->cerrar();
	} //function mdlGuardaEndoso

	static public function mdlCierraProc($tabla,$tipoPeriodo,$anio,$periodo,$flgCierre){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tabla SET cod_estado = ( CASE WHEN '$flgCierre' = 'SI' THEN 'CAN' ELSE 'REG' END )     WHERE num_anno = '$anio'AND cod_tipo_periodo = '$tipoPeriodo'  AND cod_periodo = '$periodo'");
		if($sql){
			return 1;
		}else{
			return "error";
		}
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlCierraProc

}//class ModeloPeriodoVenta
?>