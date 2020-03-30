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

	static public function mdlVerificaContado($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT	TOP 1 vtade_contrato_servicio.flg_contado
								FROM		vtade_contrato_servicio
								WHERE	vtade_contrato_servicio.cod_localidad = '".$datos['cod_localidad']."'
								AND		vtade_contrato_servicio.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
								AND		vtade_contrato_servicio.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
								AND		vtade_contrato_servicio.cod_contrato = '".$datos['cod_contrato']."'
								AND		vtade_contrato_servicio.num_servicio = '".$datos['num_servicio']."'
								AND		vtade_contrato_servicio.flg_servicio_principal = 'SI'");

		$datos = arrayMapUtf8Encode($db->recorrer($sql));

		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlGetHisTrabajador
	
	static public function mdlActualizaVtadeCtt($datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE	vtade_contrato
							SET		vtade_contrato.fch_resolucion = CONVERT(DATE,'".$datos['fch_actual']."'),
									vtade_contrato.flg_resuelto = 'SI',
									vtade_contrato.cod_usuario_resolucion = '".$datos['usuario']."'
							
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaVtadeCtt
	
	static public function mdlInsertaResolucion($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT	MAX(vtavi_resolucion_contrato.num_item) AS num_item
								FROM		vtavi_resolucion_contrato
								WHERE	vtavi_resolucion_contrato.cod_localidad = '".$datos['cod_localidad']."'
								AND		vtavi_resolucion_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
								AND		vtavi_resolucion_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
								AND		vtavi_resolucion_contrato.cod_contrato = '".$datos['cod_contrato']."'
								AND		vtavi_resolucion_contrato.num_servicio = '".$datos['num_servicio']."'");
		while($key = $db->recorrer($sql)){
			if (is_null($key['num_item'])) {
				$num_item = 0;
			}else{
				$num_item = $key['num_item'];
			}
		}
		$num_item = $num_item + 1;

		$sql2 = $db->consulta("INSERT INTO vtavi_resolucion_contrato ( cod_localidad, cod_contrato, num_servicio, cod_localidad_nuevo,cod_contrato_nuevo, num_servicio_nuevo, num_item, cod_tipo_movimiento, num_anno_afecto, cod_tipo_periodo_afecto, cod_periodo_afecto, cod_jefe_ventas, cod_supervisor, cod_vendedor, cod_grupo, imp_porc_afecto, imp_afecto, cod_tipo_resolucion, cod_motivo_resolucion, dsc_motivo_usuario, cod_usuario, fch_registro, imp_tc, flg_afecta_comision, imp_pagado, cod_tipo_ctt, cod_tipo_programa, cod_tipo_ctt_nuevo, cod_tipo_programa_nuevo ) 
		VALUES ( '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '$num_item', '".$datos['cod_tipo_movimiento']."', '".$datos['num_anno']."', '".$datos['cod_tipo_periodo']."', '".$datos['cod_periodo']."', '".$datos['cod_jefe_ventas']."', '".$datos['cod_supervisor']."', '".$datos['cod_vendedor']."', '".$datos['cod_grupo']."', ".$datos['imp_porc_afecto'].", ".$datos['imp_afecto'].", '".$datos['cod_tipo_resolucion']."', '".$datos['cod_motivo_resolucion']."', '".$datos['dsc_motivo_usuario']."', '".$datos['usuario']."', CONVERT(DATE,'".$datos['fch_actual']."'), ".$datos['imp_tc'].", '".$datos['flg_afecta_comision']."', ".$datos['imp_pagado'].", '".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."', '".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."')");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlInsertaResolucion
	
	static public function mdlVerificaFoma($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT	vtade_contrato.num_servicio_foma
							FROM		vtade_contrato
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_servicio_foma'])) {
				$servicio_foma = 'XX';
			}else{
				$servicio_foma = $key['num_servicio_foma'];
			}
		}

		if ($servicio_foma != 'XX') {
			$sql2 = $db->consulta("UPDATE	vtade_contrato
							SET		vtade_contrato.fch_resolucion = CONVERT(DATE,'".$datos['fch_actual']."'),
									vtade_contrato.flg_resuelto = 'SI',
									vtade_contrato.cod_usuario_resolucion = '".$datos['usuario']."'
							
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '$servicio_foma'");

			if ($sql2) {
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlVerificaFoma
	
	static public function mdlGuardaObservacion($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  	Max(num_linea) AS num_linea
							FROM    	vtade_observacion_x_contrato
							WHERE 		vtade_observacion_x_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_observacion_x_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_observacion_x_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND	   	vtade_observacion_x_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND     	vtade_observacion_x_contrato.num_servicio = '".$datos['num_servicio']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_linea'])) {
				$num_linea = 0;
			}else{
				$num_linea = $key['num_linea'];
			}
		}
		$num_linea = $num_linea + 1;

		$dsc_observacion = 'SE RESUELVE EL CONTRATO. USUARIO: "'.$datos['usuario'].'". FECHA: "'.dateFormat($datos['fch_format']).'". MOTIVO: '.$datos['cod_motivo_resolucion'].' - '.$datos['dsc_motivo_resolucion'].'.';

		$sql2 = $db->consulta("INSERT INTO vtade_observacion_x_contrato ( cod_localidad, cod_contrato, num_servicio, num_linea, cod_area, dsc_observacion,cod_usuario, fch_registro, flg_automatico, cod_tipo_ctt, cod_tipo_programa ) 
			VALUES ( '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '$num_linea', '".$datos['cod_area']."', '$dsc_observacion', '".$datos['usuario']."', CONVERT(DATE,'".$datos['fch_actual']."'), 'SI','".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."' )");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaObservacion
	
	static public function mdlActualizaConograma($datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE  vtade_cronograma
							SET     vtade_cronograma.cod_estadocuota_ant	= vtade_cronograma.cod_estadocuota,
									vtade_cronograma.cod_estadocuota = 'RES'
							WHERE   vtade_cronograma.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_cronograma.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_cronograma.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND     vtade_cronograma.cod_contrato = '".$datos['cod_contrato']."'
							AND     vtade_cronograma.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
							AND     vtade_cronograma.cod_estadocuota IN ( 'REG', 'EMI' )");

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaConograma

}//class ModeloResCtto
?>