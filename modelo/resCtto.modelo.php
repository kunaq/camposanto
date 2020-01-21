<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloResCtto{

	static public function mdlBuscaMotivo($tablaTipo,$tablaMotivo,$codTipo){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaTipo.cod_motivo_resolucion, $tablaMotivo.dsc_motivo_resolucion FROM $tablaTipo INNER JOIN $tablaMotivo ON $tablaMotivo.cod_motivo_resolucion = $tablaTipo.cod_motivo_resolucion WHERE $tablaTipo.cod_tipo_resolucion = '$codTipo'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//buscaMotivo

	static public function mdlBuscaNumServicio($tablaCtto,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_servicio, cod_contrato, flg_resuelto, flg_anulado, cod_tipo_ctt, cod_tipo_programa FROM vtade_contrato WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND flg_fondo_mantenimiento = 'NO'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio





	static public function mdlBuscaCliente(){
		$db = new Conexion();
		$sql = $db->consulta("select num_servicio,cod_contrato,flg_resuelto,flg_anulado,cod_tipo_ctt,cod_tipo_programa from vtade_contrato where cod_contrato LIKE (RIGHT('0000000000'+'444',10)) and flg_fondo_mantenimiento = 'NO'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCliente

}//class ModeloResCtto
?>