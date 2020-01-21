<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloResCtto{

	static public function mdlBuscaMotivo($tablaTipo,$tablaMotivo,$codTipo){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaTipo.cod_motivo_resolucion, $tablaMotivo.dsc_motivo_resolucion FROM $tablaTipo INNER JOIN $tablaMotivo ON $tablaMotivo.cod_motivo_resolucion = $tablaTipo.cod_motivo_resolucion WHERE $tablaTipo.cod_tipo_resolucion = '$codTipo'");
		echo "SELECT $tablaTipo.cod_motivo_resolucion, $tablaMotivo.dsc_motivo_resolucion FROM $tablaTipo INNER JOIN $tablaMotivo ON $tablaMotivo.cod_motivo_resolucion = $tablaTipo.cod_motivo_resolucion WHERE $tablaTipo.cod_tipo_resolucion = '$codTipo'";
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//buscaMotivo






	static public function mdlBuscaCliente(){
		$db = new Conexion();
		$sql = $db->consulta("");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCliente

}//class ModeloResCtto
?>