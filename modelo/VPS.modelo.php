<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloVPS{

	static public function mdlBuscaBenef($tabla1,$tabla2,$tabla3,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla1.dsc_tipo_autorizacion, $tabla1.dsc_prefijo, $tabla2.cod_localidad, $tabla2.num_uso_servicio, $tabla2.dsc_apellido_paterno + ' ' +$tabla2.dsc_apellido_materno + ', ' + $tabla2.dsc_nombres AS dsc_nombres, $tabla3.dsc_autorizacion, $tabla2.fch_servicio, $tabla2.cod_tipo_autorizacion FROM $tabla2 INNER JOIN $tabla3 ON $tabla3.cod_estado_autorizacion = $tabla2.cod_estado_autorizacion INNER JOIN $tabla1 ON $tabla1.cod_tipo_autorizacion = $tabla2.cod_tipo_autorizacion WHERE $tabla3.flg_anulado = 'NO' AND CONVERT(DATE, $tabla2.fch_servicio,21) = CONVERT(DATE, '".$datos['fecha']."',21) AND $tabla2.cod_localidad = '".$datos['localidad']."'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaBenef

}//ModeloVPS