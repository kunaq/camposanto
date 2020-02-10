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
		$sql = $db->consulta("SELECT num_servicio, cod_contrato, flg_resuelto, flg_anulado, cod_tipo_ctt, cod_tipo_programa, num_refinanciamiento FROM $tablaCtto WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND flg_fondo_mantenimiento = 'NO' AND flg_cambio_titular = 'NO' ORDER BY num_servicio ASC");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio

	static public function mdlBuscaDetCttoRes($tablaCtto,$tablaResolucion,$tablaMaTipSer,$codCtto,$numServicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_tipo_programa, $tablaCtto.fch_resolucion, $tablaCtto.cod_jefeventas, $tablaCtto.cod_supervisor, $tablaCtto.cod_vendedor, $tablaCtto.cod_grupo, $tablaCtto.cod_tipo_servicio, $tablaCtto.cod_tipo_necesidad, $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_cliente, $tablaCtto.imp_saldofinanciar, $tablaResolucion.num_anno_afecto, $tablaResolucion.cod_tipo_periodo_afecto, $tablaResolucion.cod_periodo_afecto, $tablaResolucion.cod_jefe_ventas AS codJventasRes, $tablaResolucion.cod_supervisor AS codSupRes, $tablaResolucion.cod_vendedor AS codVenRes, $tablaResolucion.cod_grupo AS codGruRes, $tablaResolucion.imp_porc_afecto, $tablaResolucion.imp_afecto, $tablaResolucion.cod_tipo_resolucion, $tablaResolucion.cod_motivo_resolucion, $tablaResolucion.dsc_motivo_usuario, $tablaResolucion.flg_afecta_comision, $tablaMaTipSer.dsc_tipo_servicio, $tablaCtto.num_refinanciamiento,$tablaCtto.cod_localidad FROM $tablaCtto LEFT JOIN $tablaResolucion ON ($tablaResolucion.cod_contrato = $tablaCtto.cod_contrato AND $tablaCtto.num_servicio = $tablaResolucion.num_servicio) LEFT JOIN $tablaMaTipSer ON $tablaCtto.cod_tipo_servicio = $tablaMaTipSer.cod_tipo_servicio WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $numServicio");

		$datos = arrayMapUtf8Encode($db->recorrer($sql));

		return $datos;

		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio

	static public function mdlEjecutaProcedureResumenCtt($datos){

		$db = new Conexion();

		$sql = $db->consulta("EXEC usp_vta_prc_resumen_contrato '".$datos['as_localidad']."', '".$datos['as_tipo_ctt']."', '".$datos['as_contrato']."', '".$datos['as_servicio']."', '".$datos['ai_ref']."', '".$datos['as_total']."', '".$datos['as_tipo_programa']."'");

		while($key = $db->recorrer($sql)){

	      $ctd_total = $key['ctd_total'];
	      $ctd_can = $key['ctd_can'];
	      $ctd_foma = $key['ctd_foma'];
	      $ctd_can_foma = $key['ctd_can_foma'];
	      $imp_total_reg = number_format(round($key['imp_total_reg'], 2),2,',','.');
	      $imp_int_reg = number_format(round($key['imp_int_reg'], 2),2,',','.');
	      $imp_igv_reg = number_format(round($key['imp_igv_reg'], 2),2,',','.');
	      $imp_sub_reg = number_format(round($key['imp_sub_reg'], 2),2,',','.');
	      $imp_tot_cui = number_format(round($key['imp_tot_cui'], 2),2,',','.');
	      $imp_int_cui = number_format(round($key['imp_int_cui'], 2),2,',','.');
	      $imp_igv_cui = number_format(round($key['imp_igv_cui'], 2),2,',','.');
	      $imp_sub_cui = number_format(round($key['imp_sub_cui'], 2),2,',','.');
	      $imp_can_cui = number_format(round($key['imp_can_cui'], 2),2,',','.');
	      $imp_can_reg = number_format(round($key['imp_can_reg'], 2),2,',','.');
	      $imp_can_fma = number_format(round($key['imp_can_fma'], 2),2,',','.');
	      $imp_emi_cui = number_format(round($key['imp_emi_cui'], 2),2,',','.');
	      $imp_emi_reg = number_format(round($key['imp_emi_reg'], 2),2,',','.');
	      $imp_emi_foma = number_format(round($key['imp_emi_foma'], 2),2,',','.');
	      $dsc_estado = $key['dsc_estado'];
	      $imp_tot_foma = number_format(round($key['imp_tot_foma'], 2),2,',','.');
	      $imp_int_foma = number_format(round($key['imp_int_foma'], 2),2,',','.');
	      $imp_igv_foma = number_format(round($key['imp_igv_foma'], 2),2,',','.');
	      $imp_sub_foma = number_format(round($key['imp_sub_foma'], 2),2,',','.');
	      $imp_sal_cui = number_format(round($key['imp_sal_cui'], 2),2,',','.');
	      $imp_sal_reg = number_format(round($key['imp_sal_reg'], 2),2,',','.');
	      $imp_sal_foma = number_format(round($key['imp_sal_foma'], 2),2,',','.');
	      $cod_moneda = $key['cod_moneda'];
		}
		$arrData = array('ctd_total'=> $ctd_total, 'ctd_can' => $ctd_can, 'ctd_foma'=> $ctd_foma, 'ctd_can_foma' => $ctd_can_foma, 'imp_total_reg'=> $imp_total_reg, 'imp_int_reg' => $imp_int_reg, 'imp_igv_reg'=> $imp_igv_reg, 'imp_sub_reg' => $imp_sub_reg, 'imp_tot_cui' => $imp_tot_cui, 'imp_int_cui' => $imp_int_cui, 'imp_igv_cui' => $imp_igv_cui, 'imp_sub_cui' => $imp_sub_cui, 'imp_can_cui' => $imp_can_cui, 'imp_can_reg' => $imp_can_reg, 'imp_can_fma' => $imp_can_fma, 'imp_emi_cui' => $imp_emi_cui, 'imp_emi_reg' => $imp_emi_reg, 'imp_emi_foma' => $imp_emi_foma, 'dsc_estado' => $dsc_estado, 'imp_tot_foma' => $imp_tot_foma, 'ctd_total' => $ctd_total, 'ctd_can' => $ctd_can, 'ctd_total'=> $ctd_total, 'ctd_can' => $ctd_can, 'imp_int_foma'=> $imp_int_foma, 'imp_igv_foma' => $imp_igv_foma, 'imp_sub_foma' => $imp_sub_foma, 'imp_sal_cui' => $imp_sal_cui, 'imp_sal_reg' => $imp_sal_reg, 'imp_sal_foma' => $imp_sal_foma, 'cod_moneda' => $cod_moneda); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlEjecutaProcedureResumenCtt
	
	static public function mdlGetHisTrabajador($cod_consejero,$num_anno,$cod_tipo_periodo,$cod_periodo){
		$db = new Conexion();
		$sql = $db->consulta("SELECT * FROM vtama_historico_vendedor WHERE cod_trabajador = '$cod_consejero' AND num_anno = '$num_anno' AND cod_tipo_periodo = '$cod_tipo_periodo' AND cod_periodo = '$cod_periodo'");

		$datos = array();
    	while($key = $db->recorrer($sql)){
	    	$datos[] = arrayMapUtf8Encode($key);
		} 

		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlGetHisTrabajador
	
	static public function mdlGetDatosCliente($cod_cliente){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtama_cliente.dsc_razon_social, vtama_cliente.dsc_apellido_paterno, vtama_cliente.dsc_apellido_materno, vtama_cliente.dsc_nombre, vtama_cliente.flg_juridico, vtama_cliente.cod_tipo_documento, vtama_cliente.dsc_documento, vtama_cliente.dsc_telefono_1, vtade_cliente_direccion.dsc_direccion FROM vtama_cliente INNER JOIN vtade_cliente_direccion ON vtade_cliente_direccion.cod_cliente = vtama_cliente.cod_cliente WHERE vtama_cliente.cod_cliente = '$cod_cliente'");

		$datos = arrayMapUtf8Encode($db->recorrer($sql));

		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlGetHisTrabajador

	static public function mdlGetConformacion($cod_localidad,$cod_contrato,$num_refinanciamiento){

		$db = new Conexion();

		$sql = $db->consulta("SELECT num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, imp_saldofinanciar FROM vtade_contrato WHERE cod_localidad = '$cod_localidad' AND cod_contrato = '$cod_contrato' AND num_refinanciamiento = '$num_refinanciamiento' AND flg_fondo_mantenimiento = 'NO'");

		$tableDetFinanciamiento = "";
		$saldoTotal = 0;

		while($key = $db->recorrer($sql)){

			$tableDetFinanciamiento .='<tr>
									<td>'.$key['num_servicio'].'</td>
									<td>'.$key['dsc_tipo_servicio'].'</td>
									<td>'.number_format(round($key['imp_saldofinanciar'], 2),2,',','.').'</td>';


			$saldoTotal += $key["imp_saldofinanciar"];
		}
		$arrData = array('tableDetFinanciamiento'=> $tableDetFinanciamiento, 'saldoTotal' => number_format(round($saldoTotal, 2),2,',','.')); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDetFinanciamiento

}//class ModeloResCtto
?>