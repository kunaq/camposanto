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
		$sql = $db->consulta("SELECT num_servicio, cod_contrato, flg_resuelto, flg_anulado, cod_tipo_ctt, cod_tipo_programa FROM $tablaCtto WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND flg_fondo_mantenimiento = 'NO' ORDER BY num_servicio ASC");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio

	static public function mdlBuscaDetCttoRes($tablaCtto,$tablaResolucion,$codCtto,$numServicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_tipo_programa, $tablaCtto.fch_resolucion, $tablaCtto.cod_jefeventas, $tablaCtto.cod_supervisor, $tablaCtto.cod_vendedor, $tablaCtto.cod_grupo, $tablaCtto.cod_tipo_servicio, $tablaCtto.cod_tipo_necesidad, $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_cliente, $tablaCtto.imp_saldofinanciar, $tablaResolucion.num_anno_afecto, $tablaResolucion.cod_tipo_periodo_afecto, $tablaResolucion.cod_periodo_afecto, $tablaResolucion.cod_jefe_ventas AS codJventasRes, $tablaResolucion.cod_supervisor AS codSupRes, $tablaResolucion.cod_vendedor AS codVenRes, $tablaResolucion.cod_grupo AS codGruRes, $tablaResolucion.imp_porc_afecto, $tablaResolucion.imp_afecto, $tablaResolucion.cod_tipo_resolucion, $tablaResolucion.cod_motivo_resolucion, $tablaResolucion.dsc_motivo_usuario, $tablaCtto.cod_moneda, $tablaResolucion.flg_afecta_comision FROM $tablaCtto LEFT JOIN $tablaResolucion ON ($tablaResolucion.cod_contrato = $tablaCtto.cod_contrato AND $tablaCtto.num_servicio = $tablaResolucion.num_servicio) WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $numServicio");
		
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio

}//class ModeloResCtto
?>