<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.cod_contrato,$tabla.num_servicio,$tabla.cod_tipo_programa,$tabla.flg_ctt_modif, $tabla.cod_tipo_ctt, $tabla.fch_generacion,$tabla.fch_emision, $tabla.fch_activacion, $tabla.fch_anulacion, $tabla.fch_resolucion, $tabla.fch_transferencia, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio, $tabla8.dsc_tipo_servicio, $tabla.cod_empresa FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato INNER JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla3.cod_camposanto_actual INNER JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual INNER JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual INNER JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual INNER JOIN $tabla8 ON $tabla8.cod_tipo_servicio = $tabla.cod_tipo_servicio WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCttos

	static public function mdlBuscaDatosServicio($tablaCtto,$tablaEnt,$tablaTipoSvcio,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.*, $tablaEnt.dsc_entidad, $tablaTipoSvcio.dsc_tipo_servicio FROM $tablaCtto LEFT JOIN $tablaEnt ON $tablaEnt.cod_entidad = $tablaCtto.cod_convenio INNER JOIN $tablaTipoSvcio ON $tablaTipoSvcio.cod_tipo_servicio = $tablaCtto.cod_tipo_servicio WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $num_servicio");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaDatosServicio

	static public function mdlBuscaServPpal($tablaCttoSvcio,$tablaMaSvcio,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCttoSvcio.cod_servicio_principal, $tablaCttoSvcio.num_ctd, $tablaCttoSvcio.imp_precio_venta, $tablaCttoSvcio.imp_min_inhumar, $tablaCttoSvcio.imp_subtotal, $tablaCttoSvcio.imp_igv, $tablaCttoSvcio.imp_total,$tablaMaSvcio.dsc_servicio FROM $tablaCttoSvcio INNER JOIN $tablaMaSvcio ON $tablaCttoSvcio.cod_servicio_principal = $tablaMaSvcio.cod_tipo_servicio WHERE $tablaCttoSvcio.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCttoSvcio.num_servicio = $num_servicio");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaServPpal

}//class ModeloModifCtto
?>