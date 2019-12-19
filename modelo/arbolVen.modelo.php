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

	static public function mdlVerDetTrabajador($tabla,$tabla2,$tabla3,$codTrabajador){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_tipo_comisionista, $tabla3.dsc_grupo  FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_tipo_comisionista = $tabla2.cod_tipo_comisionista INNER JOIN $tabla3 ON $tabla.cod_grupo = $tabla3.cod_grupo WHERE cod_trabajador = '$codTrabajador'");
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

	static public function mdlBuscarCtto($tabla,$tabla2,$codTrabajador){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.cod_contrato, $tabla.cod_vendedor, $tabla.cod_periodo_recep, $tabla.cod_tipo_periodo_recep, $tabla.num_anno_recep, $tabla.flg_activado, $tabla.flg_anulado, $tabla.flg_emitido, $tabla.flg_resuelto, $tabla.cod_localidad, $tabla.cod_tipo_necesidad, $tabla.fch_activacion, $tabla.fch_emision, $tabla.fch_resolucion, $tabla2.dsc_localidad from $tabla inner join $tabla2 on $tabla.cod_localidad = $tabla2.cod_localidad where cod_vendedor = '$codTrabajador'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlBuscarCtto

}//class ModeloArbolVen
?>