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
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_tipo_comisionista $tabla3.dsc_grupo, $tabla3.cod_jefe_ventas, $tabla3.cod_supervisor FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_tipo_comisionista = $tabla2.cod_tipo_comisionista INNER JOIN $tabla3 ON $tabla.cod_grupo = $tabla3.cod_grupo WHERE cod_trabajador = '$codTrabajador'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();

	}//function mdlVerDetTrabajador

}//class ModeloArbolVen

// $datos = arrayMapUtf8Encode($db->recorrer($sql));
// 		return $datos;
// 		$db->liberar($sql);
//         $db->cerrar();
?>