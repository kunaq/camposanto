<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloVPS{

	static public function mdlBuscaBenef($tabla1,$tabla2,$tabla3,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla1.dsc_tipo_autorizacion, $tabla1.dsc_prefijo, $tabla2.cod_localidad, $tabla2.num_uso_servicio, $tabla2.dsc_apellido_paterno + ' ' +$tabla2.dsc_apellido_materno + ', ' + $tabla2.dsc_nombres AS dsc_nombres, $tabla3.dsc_autorizacion, $tabla2.fch_servicio, $tabla2.cod_tipo_autorizacion FROM $tabla2 INNER JOIN $tabla3 ON $tabla3.cod_estado_autorizacion = $tabla2.cod_estado_autorizacion INNER JOIN $tabla1 ON $tabla1.cod_tipo_autorizacion = $tabla2.cod_tipo_autorizacion WHERE $tabla3.flg_anulado = 'NO' AND CONVERT(DATE, $tabla2.fch_servicio,105) = CONVERT(DATE, '".$datos['fecha']."',105) AND $tabla2.cod_localidad = '".$datos['localidad']."'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["fch_servicio"] = ($key["fch_servicio"] != '') ? dateTimeFormat($key["fch_servicio"]) : '-';
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaBenef

	static public function mdlBuscaDetBenef($tabla1,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$tabla9,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla1.dsc_tipo_autorizacion, $tabla2.cod_localidad, $tabla2.num_uso_servicio, $tabla2.cod_localidad_ctt, $tabla2.cod_tipo_ctt, $tabla2.cod_contrato, $tabla2.cod_tipo_programa, $tabla2.num_servicio, $tabla2.cod_plataforma_esp, $tabla2.cod_area_esp, $tabla2.cod_eje_horizontal_esp, $tabla2.cod_eje_vertical_esp, $tabla2.cod_espacio, $tabla8.dsc_area, $tabla9.dsc_plataforma, ( SELECT	LTRIM(RTRIM($tabla4.dsc_servicio)) FROM	$tabla5 INNER JOIN $tabla4 ON $tabla4.cod_servicio = $tabla5.cod_servicio WHERE	$tabla5.cod_localidad = $tabla2.cod_localidad_ctt AND $tabla5.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND $tabla5.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla5.cod_contrato = $tabla2.cod_contrato AND	$tabla5.num_servicio = $tabla2.num_servicio AND	$tabla5.flg_servicio_principal = 'SI') AS dsc_servicio, (SELECT	$tabla6.cod_tipo_necesidad FROM $tabla6 WHERE $tabla6.cod_localidad = $tabla2.cod_localidad_ctt AND	$tabla6.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND	$tabla6.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla6.cod_contrato = $tabla2.cod_contrato AND $tabla6.num_servicio = $tabla2.num_servicio ) AS cod_tipo_necesidad, $tabla2.dsc_apellido_paterno + ' ' +	$tabla2.dsc_apellido_materno + ', ' + $tabla2.dsc_nombres AS dsc_nombres, $tabla2.fch_deceso, $tabla2.fch_servicio, $tabla2.dsc_sacerdote, (SELECT	$tabla7.dsc_cliente FROM $tabla6 INNER JOIN $tabla7 ON $tabla7.cod_cliente = $tabla6.cod_cliente WHERE	$tabla6.cod_localidad = $tabla2.cod_localidad_ctt AND $tabla6.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND $tabla6.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla6.cod_contrato = $tabla2.cod_contrato AND $tabla6.num_servicio = $tabla2.num_servicio) AS dsc_titular FROM $tabla2 INNER JOIN $tabla3 ON $tabla3.cod_estado_autorizacion = $tabla2.cod_estado_autorizacion INNER JOIN $tabla1 ON $tabla1.cod_tipo_autorizacion = $tabla2.cod_tipo_autorizacion INNER JOIN $tabla8 ON $tabla2.cod_area_esp = $tabla8.cod_area_plataforma INNER JOIN $tabla9 ON $tabla9.cod_plataforma = $tabla2.cod_plataforma_esp WHERE $tabla3.flg_anulado = 'NO' AND $tabla2.cod_localidad = '".$datos['localidad']."' AND $tabla2.cod_tipo_autorizacion = '".$datos['autorizacion']."' AND $tabla2.num_uso_servicio = '".$datos['num_servicio']."'");
		echo "SELECT $tabla1.dsc_tipo_autorizacion, $tabla2.cod_localidad, $tabla2.num_uso_servicio, $tabla2.cod_localidad_ctt, $tabla2.cod_tipo_ctt, $tabla2.cod_contrato, $tabla2.cod_tipo_programa, $tabla2.num_servicio, $tabla2.cod_plataforma_esp, $tabla2.cod_area_esp, $tabla2.cod_eje_horizontal_esp, $tabla2.cod_eje_vertical_esp, $tabla2.cod_espacio, $tabla8.dsc_area, $tabla9.dsc_plataforma, ( SELECT	LTRIM(RTRIM($tabla4.dsc_servicio)) FROM	$tabla5 INNER JOIN $tabla4 ON $tabla4.cod_servicio = $tabla5.cod_servicio WHERE	$tabla5.cod_localidad = $tabla2.cod_localidad_ctt AND $tabla5.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND $tabla5.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla5.cod_contrato = $tabla2.cod_contrato AND	$tabla5.num_servicio = $tabla2.num_servicio AND	$tabla5.flg_servicio_principal = 'SI') AS dsc_servicio, (SELECT	$tabla6.cod_tipo_necesidad FROM $tabla6 WHERE $tabla6.cod_localidad = $tabla2.cod_localidad_ctt AND	$tabla6.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND	$tabla6.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla6.cod_contrato = $tabla2.cod_contrato AND $tabla6.num_servicio = $tabla2.num_servicio ) AS cod_tipo_necesidad, $tabla2.dsc_apellido_paterno + ' ' +	$tabla2.dsc_apellido_materno + ', ' + $tabla2.dsc_nombres AS dsc_nombres, $tabla2.fch_deceso, $tabla2.fch_servicio, $tabla2.dsc_sacerdote, (SELECT	$tabla7.dsc_cliente FROM $tabla6 INNER JOIN $tabla7 ON $tabla7.cod_cliente = $tabla6.cod_cliente WHERE	$tabla6.cod_localidad = $tabla2.cod_localidad_ctt AND $tabla6.cod_tipo_ctt = $tabla2.cod_tipo_ctt AND $tabla6.cod_tipo_programa = $tabla2.cod_tipo_programa AND $tabla6.cod_contrato = $tabla2.cod_contrato AND $tabla6.num_servicio = $tabla2.num_servicio) AS dsc_titular FROM $tabla2 INNER JOIN $tabla3 ON $tabla3.cod_estado_autorizacion = $tabla2.cod_estado_autorizacion INNER JOIN $tabla1 ON $tabla1.cod_tipo_autorizacion = $tabla2.cod_tipo_autorizacion INNER JOIN $tabla8 ON $tabla2.cod_area_esp = $tabla8.cod_area_plataforma INNER JOIN $tabla9 ON $tabla9.cod_plataforma = $tabla2.cod_plataforma_esp WHERE $tabla3.flg_anulado = 'NO' AND $tabla2.cod_localidad = '".$datos['localidad']."' AND $tabla2.cod_tipo_autorizacion = '".$datos['autorizacion']."' AND $tabla2.num_uso_servicio = '".$datos['num_servicio']."'";
		$datos = array();
    	while($key = $db->recorrer($sql)){
    			$key["fch_servicio"] = ($key["fch_servicio"] != '') ? dateTimeFormat($key["fch_servicio"]) : '-';
    			$key["fch_deceso"] = ($key["fch_deceso"] != '') ? dateTimeFormat($key["fch_deceso"]) : '-';
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaBenef	

}//ModeloVPS