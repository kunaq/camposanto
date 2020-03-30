<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloArbolVen{
	static public function mdlMostrarTraArbolVen($tabla){
		$db = new Conexion();
		$sql = $db->consulta("SELECT cod_trabajador, dsc_apellido_paterno, dsc_apellido_materno, dsc_nombres, flg_activo FROM $tabla");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlMostrarTraArbolVen

	static public function mdlVerDetTrabajador($tabla,$tabla2,$tabla3,$tabla4,$codTrabajador){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_tipo_comisionista, $tabla3.dsc_grupo, $tabla4.flg_estado, $tabla4.flg_modificacion_grupo  FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_tipo_comisionista = $tabla2.cod_tipo_comisionista INNER JOIN $tabla3 ON $tabla.cod_grupo = $tabla3.cod_grupo INNER JOIN $tabla4 ON  $tabla4.num_anno = $tabla.num_anno AND  $tabla4.cod_tipo_periodo = $tabla.cod_tipo_periodo AND $tabla4.cod_periodo = $tabla.cod_periodo WHERE cod_trabajador = '$codTrabajador'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetTrabajador

	static public function mdlNombreTrabajador($tabla,$codigo){
		$db = new Conexion();
		$sql = $db->consulta("SELECT dsc_nombres, dsc_apellido_paterno, dsc_apellido_materno  FROM $tabla WHERE cod_trabajador = '$codigo'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetTrabajador

	static public function mdlBuscarCtto($tabla,$tabla2,$codTrabajador,$periodo,$tipoPeriodo,$annio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.cod_contrato, $tabla.cod_vendedor, $tabla.cod_periodo_recep, $tabla.cod_tipo_periodo_recep, $tabla.num_anno_recep, $tabla.flg_activado, $tabla.flg_anulado, $tabla.flg_emitido, $tabla.flg_resuelto, $tabla.cod_localidad, $tabla.cod_tipo_necesidad, $tabla.fch_activacion, $tabla.fch_emision, $tabla.fch_resolucion, $tabla2.dsc_localidad from $tabla inner join $tabla2 on $tabla.cod_localidad = $tabla2.cod_localidad where cod_vendedor = '$codTrabajador' AND $tabla.cod_periodo_recep='$periodo' AND $tabla.cod_tipo_periodo_recep ='$tipoPeriodo' AND $tabla.num_anno_recep = '$annio'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$key["fch_activacion"] = ($key["fch_activacion"] != null) ? dateFormat($key["fch_activacion"]) : $key["fch_activacion"];
			$key["fch_emision"] = ($key["fch_emision"] != null) ? dateFormat($key["fch_emision"]) : $key["fch_emision"];
			$key["fch_resolucion"] = ($key["fch_resolucion"] != null) ? dateFormat($key["fch_resolucion"]) : $key["fch_resolucion"];
			$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlBuscarCtto

	static public function mdlBuscarGrupoVen($tabla,$tabla2){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, (SELECT dsc_nombres FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_jefe_ventas) as nom_jefe_ventas, (SELECT dsc_apellido_materno FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_jefe_ventas) as apelM_jefe_ventas, (SELECT dsc_apellido_paterno FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_jefe_ventas) as apelP_jefe_ventas, (SELECT dsc_nombres FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_supervisor) as nom_supervisor, (SELECT dsc_apellido_materno FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_supervisor) as apelM_supervisor, (SELECT dsc_apellido_paterno FROM $tabla2 WHERE $tabla2.cod_trabajador = $tabla.cod_supervisor) as apelP_supervisor FROM $tabla WHERE flg_activo = 'SI'");
		$datos = array();
    	 while($key = $db->recorrer($sql)){
                    $datos[] =  $key;
                    echo '<option value="'.$key['cod_grupo'].'" dsc_jefe="'.$key['apelP_jefe_ventas'].' '.$key['apelM_jefe_ventas'].', '.$key['nom_jefe_ventas'].'" cod_jefe="'.$key['cod_jefe_ventas'].'" dsc_supervisor="'.$key['apelP_supervisor'].' '.$key['apelM_supervisor'].', '.$key['nom_supervisor'].'" cod_supervisor="'.$key['cod_supervisor'].'">'.$key['dsc_grupo'].'</option>';
                }
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlBuscarGrupoVen

	static public function mdlBuscarFueVen($tabla,$codigo,$periodo,$tipoPeriodo,$anno){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.cod_tipo_comisionista, $tabla.cod_grupo, $tabla.cod_supervisor,
				$tabla.cod_jefeventas FROM 	$tabla 	WHERE $tabla.cod_trabajador = '$codigo' AND $tabla.num_anno = '$anno' AND 		$tabla.cod_tipo_periodo = '$tipoPeriodo' AND $tabla.cod_periodo = '$periodo'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlBuscarFueVen

	static public function mdlBuscarNomComi($tabla,$codigo){
		$db = new Conexion();
		$sql = $db->consulta("SELECT dsc_tipo_comisionista, flg_supervisor, flg_jefeventas FROM $tabla WHERE cod_tipo_comisionista = '$codigo' AND flg_activo = 'SI'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlBuscarNomComi

	static public function mdlExisteConsejero($tabla,$codigo,$periodo,$tipoPeriodo,$anno){
		$db = new Conexion();
		$sql = $db->consulta("SELECT COUNT(1) FROM $tabla WHERE $tabla.cod_trabajador = '$codigo' AND $tabla.num_anno = '$anno' AND $tabla.cod_tipo_periodo = '$tipo' AND $tabla.cod_periodo = '$periodo' ");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlExisteConsejero

	static public function mdlModificarArbVen($tabla,$codigo,$grupo,$periodo,$tipoPeriodo,$annio,$comisionista,$jefe,$supervisor,$flg_jefe,$flg_sup){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tabla SET num_anno ='$annio', cod_tipo_periodo = '$tipoPeriodo', cod_periodo = '$periodo',cod_tipo_comisionista = '$comisionista', cod_grupo = '$grupo', cod_supervisor = '$supervisor', cod_jefeventas = '$jefe', flg_supervisor = '$flg_sup', flg_jefeventas = ',$flg_jefe' WHERE cod_trabajador = '$codigo' AND num_anno ='$annio' AND cod_tipo_periodo = '$tipoPeriodo' AND cod_periodo = '$periodo'");
		"UPDATE $tabla SET num_anno ='$annio', cod_tipo_periodo = '$tipoPeriodo', cod_periodo = '$periodo',cod_tipo_comisionista = '$comisionista', cod_grupo = '$grupo', cod_supervisor = '$supervisor', cod_jefeventas = '$jefe', flg_supervisor = '$flg_sup', flg_jefeventas = ',$flg_jefe' WHERE cod_trabajador = '$codigo' AND num_anno ='$annio' AND cod_tipo_periodo = '$tipoPeriodo' AND cod_periodo = '$periodo'"
		if($sql){
			return 1;
		}else{
			return "error";
		}
	} //function mdlGuardaEndoso



}//class ModeloArbolVen
?>