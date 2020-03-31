<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloRefinanciamiento{

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

	static public function mdlBuscaDetCttoRes($tablaCtto,$tablaResolucion,$tablaMaTipSer,$codCtto,$numServicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_tipo_programa, $tablaCtto.fch_resolucion, $tablaCtto.cod_jefeventas, $tablaCtto.cod_supervisor, $tablaCtto.cod_vendedor, $tablaCtto.cod_grupo, $tablaCtto.cod_tipo_servicio, $tablaCtto.cod_tipo_necesidad, $tablaCtto.cod_tipo_ctt, $tablaCtto.cod_cliente, $tablaCtto.imp_saldofinanciar, $tablaResolucion.num_anno_afecto, $tablaResolucion.cod_tipo_periodo_afecto, $tablaResolucion.cod_periodo_afecto, $tablaResolucion.cod_jefe_ventas AS codJventasRes, $tablaResolucion.cod_supervisor AS codSupRes, $tablaResolucion.cod_vendedor AS codVenRes, $tablaResolucion.cod_grupo AS codGruRes, $tablaResolucion.imp_porc_afecto, $tablaResolucion.imp_afecto, $tablaResolucion.cod_tipo_resolucion, $tablaResolucion.cod_motivo_resolucion, $tablaResolucion.dsc_motivo_usuario, $tablaResolucion.flg_afecta_comision, $tablaMaTipSer.dsc_tipo_servicio, $tablaCtto.num_refinanciamiento,$tablaCtto.cod_localidad FROM $tablaCtto LEFT JOIN $tablaResolucion ON ($tablaResolucion.cod_contrato = $tablaCtto.cod_contrato AND $tablaCtto.num_servicio = $tablaResolucion.num_servicio) LEFT JOIN $tablaMaTipSer ON $tablaCtto.cod_tipo_servicio = $tablaMaTipSer.cod_tipo_servicio WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $numServicio");	
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio

	static public function mdlBuscaDatosCtt($tablaCtto,$codLoc,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT TOP 1 num_servicio, cod_contrato, num_refinanciamiento, flg_resuelto, flg_anulado, cod_tipo_ctt, cod_tipo_programa, cod_tipo_necesidad, num_cuotas, flg_ctt_integral FROM $tablaCtto WHERE cod_localidad = '$codLoc' AND cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND flg_fondo_mantenimiento = 'NO' AND flg_cambio_titular = 'NO' ORDER BY num_servicio ASC");
		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaNumServicio
	
	static public function mdlGetCuotas($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT cod_localidad, cod_contrato, num_refinanciamiento, num_cuota, cod_tipo_cuota, cod_estadocuota, fch_vencimiento, fch_cancelacion, imp_principal, imp_interes, imp_igv, imp_total, imp_saldo, imp_totalemitido, imp_totalpagado FROM vtade_cronograma WHERE cod_localidad = '".$datos['localidad']."' AND cod_contrato = '".$datos['cod_contrato']."' AND num_refinanciamiento = '".$datos['num_refinanciamiento']."'");

		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["fch_vencimiento"] = ($key["fch_vencimiento"] != '') ? dateFormat($key["fch_vencimiento"]) : '-';
    		$key["fch_cancelacion"] = ($key["fch_cancelacion"] != '') ? dateFormat($key["fch_cancelacion"]) : '-';
    		$key["imp_igv"] = ($key["imp_igv"] != null) ? $key["imp_igv"] : '0.00';
    		$key["imp_interes"] = ($key["imp_interes"] != null) ? $key["imp_interes"] : '0.00';
	    	$datos[] = arrayMapUtf8Encode($key);
		}
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetCuotas

	static public function mdlGetComprobantes($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_cuotas_x_comprobante.cod_localidad, vtavi_cuotas_x_comprobante.cod_contrato, vtavi_cuotas_x_comprobante.num_refinanciamiento, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante, vtaca_comprobante.num_comprobante, vtaca_comprobante.flg_nc, vtaca_comprobante.fch_emision, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo, vtaca_comprobante.cod_estado, vtavi_cuotas_x_comprobante.num_correlativo, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtavi_cuotas_x_comprobante.cod_localidad) AS dsc_localidad, vtavi_cuotas_x_comprobante.cod_tipo_ctt, vtavi_cuotas_x_comprobante.cod_tipo_programa, vtavi_cuotas_x_comprobante.cod_contrato,  vtavi_cuotas_x_comprobante.num_cuota FROM vtavi_cuotas_x_comprobante INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_cuotas_x_comprobante.num_correlativo WHERE vtavi_cuotas_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_cuotas_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_cuotas_x_comprobante.num_cuota = '".$datos['num_cuota']."' AND vtavi_cuotas_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."' UNION SELECT vtavi_mora_x_comprobante.cod_localidad, vtavi_mora_x_comprobante.cod_contrato, vtavi_mora_x_comprobante.num_refinanciamiento, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante,vtaca_comprobante.num_comprobante, vtaca_comprobante.flg_nc, vtaca_comprobante.fch_emision, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo, vtaca_comprobante.cod_estado, vtavi_mora_x_comprobante.num_correlativo, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtavi_mora_x_comprobante.cod_localidad) AS dsc_localidad, vtavi_mora_x_comprobante.cod_tipo_ctt, vtavi_mora_x_comprobante.cod_tipo_programa, vtavi_mora_x_comprobante.cod_contrato, vtavi_mora_x_comprobante.num_cuota FROM vtavi_mora_x_comprobante INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_mora_x_comprobante.num_correlativo WHERE vtavi_mora_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_mora_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_mora_x_comprobante.num_cuota = '".$datos['num_cuota']."' AND vtavi_mora_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."'");

		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["fch_emision"] = ($key["fch_emision"] != '') ? dateFormat($key["fch_emision"]) : '-';
    		$key["cod_moneda"] = ($key["cod_moneda"] != 'SOL') ? $key["cod_moneda"] : 'S/.';
    		$key["imp_total"] = ($key["imp_total"] != null) ? $key["imp_total"] : '0.00';
    		$key["imp_saldo"] = ($key["imp_saldo"] != null) ? $key["imp_saldo"] : '0.00';
	    	$datos[] = arrayMapUtf8Encode($key);
		}

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetComprobantes

	static public function mdlGetCancelaciones($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_caja_x_comprobante.cod_caja, vtavi_caja_x_comprobante.num_transaccion, (SELECT vtama_forma_pago.dsc_forma_pago FROM vtama_forma_pago WHERE vtama_forma_pago.cod_forma_pago = vtade_caja.cod_forma_pago) AS dsc_forma_pago, (SELECT vtaca_caja.fch_transaccion FROM vtaca_caja WHERE vtaca_caja.cod_caja = vtade_caja.cod_caja AND vtaca_caja.num_transaccion = vtade_caja.num_transaccion) AS fch_registro, vtade_caja.cod_moneda, vtade_caja.imp_operacion, vtade_caja.imp_operacion_soles FROM vtavi_caja_x_comprobante INNER JOIN vtade_caja ON vtade_caja.num_transaccion = vtavi_caja_x_comprobante.num_transaccion
			AND vtade_caja.cod_caja = vtavi_caja_x_comprobante.cod_caja
			AND vtade_caja.num_linea = vtavi_caja_x_comprobante.num_linea
		 WHERE vtavi_caja_x_comprobante.cod_localidad = '".$datos['localidad']."' AND vtavi_caja_x_comprobante.num_correlativo = '".$datos['num_correlativo']."'");

		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["fch_registro"] = ($key["fch_registro"] != '') ? dateFormat($key["fch_registro"]) : '-';
    		$key["cod_moneda"] = ($key["cod_moneda"] != 'SOL') ? $key["cod_moneda"] : 'S/.';
    		$key["imp_operacion"] = ($key["imp_operacion"] != null) ? $key["imp_operacion"] : '0.00';
    		$key["imp_operacion_soles"] = ($key["imp_operacion_soles"] != null) ? $key["imp_operacion_soles"] : '0.00';
	    	$datos[] = arrayMapUtf8Encode($key);
		}

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function GetCancelaciones

	static public function mdlGetDetFinanciamiento($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtade_contrato.num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, vtade_contrato.imp_saldofinanciar, vtade_contrato_servicio.cod_servicio_principal, (SELECT vtama_tipo_servicio.flg_afecto_igv FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS flg_afecto_igv  FROM vtade_contrato INNER JOIN vtade_contrato_servicio ON vtade_contrato_servicio.cod_contrato = vtade_contrato.cod_contrato AND vtade_contrato_servicio.num_servicio = vtade_contrato.num_servicio WHERE vtade_contrato.cod_localidad = '".$datos['localidad']."' AND vtade_contrato.cod_contrato = '".$datos['cod_contrato']."' AND vtade_contrato.num_refinanciamiento = '".$datos['num_refinanciamiento']."' AND vtade_contrato.flg_fondo_mantenimiento = 'NO'");

		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["imp_saldofinanciar"] = ($key["imp_saldofinanciar"] != null) ? $key["imp_saldofinanciar"] : '0.00';
	    	$datos[] = arrayMapUtf8Encode($key);
		}

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDetFinanciamiento
	
	static public function mdlGetRefinanciamiento($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	vtade_contrato.num_refinanciamiento
							FROM		vtade_contrato
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetRefinanciamiento
	
	static public function mdlGetFlgIncrementoCapital($cod_motivo_refinanciamiento){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	vtama_motivo_refinanciamiento.flg_incremento_capital,
					vtama_motivo_refinanciamiento.flg_saldo_capital,
					vtama_motivo_refinanciamiento.flg_saldo_total
					FROM		vtama_motivo_refinanciamiento
					WHERE	vtama_motivo_refinanciamiento.cod_motivo_refinanciamiento = '$cod_motivo_refinanciamiento'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetFlgIncrementoCapital
	
	static public function mdlGetSaldoTotal($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(vtade_contrato.imp_totalneto) AS imp_saldo_ctt
							FROM		vtade_contrato
							INNER JOIN vtavi_cronograma_x_servicio ON vtade_contrato.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
							AND		vtade_contrato.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt
							AND		vtade_contrato.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa
							AND		vtade_contrato.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
							AND		vtade_contrato.num_servicio = vtavi_cronograma_x_servicio.num_servicio
							
							INNER JOIN vtade_contrato_servicio ON vtade_contrato.cod_localidad = vtade_contrato_servicio.cod_localidad
							AND		vtade_contrato.cod_tipo_ctt = vtade_contrato_servicio.cod_tipo_ctt
							AND		vtade_contrato.cod_tipo_programa = vtade_contrato_servicio.cod_tipo_programa
							AND		vtade_contrato.cod_contrato = vtade_contrato_servicio.cod_contrato
							AND		vtade_contrato.num_servicio = vtade_contrato_servicio.num_servicio
							
							WHERE	vtavi_cronograma_x_servicio.flg_activo = 'SI'
							AND		vtavi_cronograma_x_servicio.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtavi_cronograma_x_servicio.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtavi_cronograma_x_servicio.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
							AND		vtade_contrato_servicio.flg_servicio_principal = 'SI'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetSaldoTotal
	
	static public function mdlGetSaldoPagado($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(vtade_comprobante.imp_total) AS imp_saldo_pagado
				FROM		vtade_comprobante
				WHERE	EXISTS
								(
									SELECT	1
									FROM		vtavi_cronograma_x_servicio
									INNER JOIN vtavi_cuotas_x_comprobante ON vtavi_cuotas_x_comprobante.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
									AND		vtavi_cuotas_x_comprobante.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt
									AND		vtavi_cuotas_x_comprobante.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa
									AND		vtavi_cuotas_x_comprobante.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
									AND		vtavi_cuotas_x_comprobante.num_refinanciamiento = vtavi_cronograma_x_servicio.num_refinanciamiento
									
									INNER JOIN vtavi_cronograma_x_servicio x ON x.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
									AND		x.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt
									AND		x.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa
									AND		x.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
									AND		x.num_servicio = vtavi_cronograma_x_servicio.num_servicio
				
									INNER JOIN vtade_contrato_servicio ON x.cod_localidad = vtade_contrato_servicio.cod_localidad
									AND		x.cod_tipo_ctt = vtade_contrato_servicio.cod_tipo_ctt
									AND		x.cod_tipo_programa = vtade_contrato_servicio.cod_tipo_programa
									AND		x.cod_contrato = vtade_contrato_servicio.cod_contrato
									AND		x.num_servicio = vtade_contrato_servicio.num_servicio
				
									WHERE	vtavi_cuotas_x_comprobante.cod_localidad = vtade_comprobante.cod_localidad
									AND		vtavi_cuotas_x_comprobante.num_correlativo = vtade_comprobante.num_correlativo
									AND		vtade_comprobante.cod_servicio = vtade_contrato_servicio.cod_servicio
									AND		x.cod_localidad = '".$datos['cod_localidad']."'
									AND		x.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
									AND		x.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
									AND		x.cod_contrato = '".$datos['cod_contrato']."'
									AND		x.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
									AND		vtade_contrato_servicio.flg_servicio_principal = 'SI'
								)");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetSaldoTotal
	
	static public function mdlGetSaldoRestante($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(vtade_cronograma.imp_principal - ((vtade_cronograma.imp_principal / vtade_cronograma.imp_total) * 
							ISNULL(vtade_cronograma.imp_totalpagado, 0))) + 
							
							SUM((vtade_cronograma.imp_igv
							
							* ( vtade_cronograma.imp_principal / ( vtade_cronograma.imp_principal + vtade_cronograma.imp_interes ) ))
							
							- (((vtade_cronograma.imp_igv 
							
							* ( vtade_cronograma.imp_principal / ( vtade_cronograma.imp_principal + vtade_cronograma.imp_interes ) ))
							
							/ vtade_cronograma.imp_total) *
							ISNULL(vtade_cronograma.imp_totalpagado, 0))) AS imp_saldo_restante
				FROM		vtade_cronograma
				WHERE	vtade_cronograma.cod_localidad = '".$datos['cod_localidad']."'
				AND		vtade_cronograma.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
				AND		vtade_cronograma.cod_contrato = '".$datos['cod_contrato']."'
				AND		vtade_cronograma.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
				AND		vtade_cronograma.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
				AND		vtade_cronograma.cod_tipo_cuota <> 'FMA'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetSaldoRestante
	
	static public function mdlGetSaldoInteres($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(vtade_cronograma.imp_principal - ((vtade_cronograma.imp_principal / vtade_cronograma.imp_total) * 
							ISNULL(vtade_cronograma.imp_totalpagado, 0))) + 
							
							SUM(vtade_cronograma.imp_igv -((vtade_cronograma.imp_igv / vtade_cronograma.imp_total) *
							ISNULL(vtade_cronograma.imp_totalpagado, 0))) + 
							
							SUM(
							
							CASE WHEN CONVERT(DATE, vtade_cronograma.fch_vencimiento) < CONVERT(DATE, '".$datos['fch_actual']."') THEN
							
							vtade_cronograma.imp_interes - ((vtade_cronograma.imp_interes / vtade_cronograma.imp_total) * 
							ISNULL(vtade_cronograma.imp_totalpagado, 0))
							
							ELSE 0 END
							
							) AS imp_saldo_interes

				FROM		vtade_cronograma
				WHERE	vtade_cronograma.cod_localidad = '".$datos['cod_localidad']."'
				AND		vtade_cronograma.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
				AND		vtade_cronograma.cod_contrato = '".$datos['cod_contrato']."'
				AND		vtade_cronograma.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
				AND		vtade_cronograma.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
				AND		vtade_cronograma.cod_tipo_cuota <> 'FMA'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetSaldoInteres
	
	static public function mdlGetSaldoTotalFinanciar($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(vtade_contrato.imp_totalneto) AS imp_totalneto
							FROM		vtade_contrato
							INNER JOIN vtavi_cronograma_x_servicio ON vtade_contrato.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
							AND		vtade_contrato.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt
							AND		vtade_contrato.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa
							AND		vtade_contrato.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
							AND		vtade_contrato.num_servicio = vtavi_cronograma_x_servicio.num_servicio

							INNER JOIN vtade_contrato_servicio ON vtade_contrato.cod_localidad = vtade_contrato_servicio.cod_localidad
							AND		vtade_contrato.cod_tipo_ctt = vtade_contrato_servicio.cod_tipo_ctt
							AND		vtade_contrato.cod_tipo_programa = vtade_contrato_servicio.cod_tipo_programa
							AND		vtade_contrato.cod_contrato = vtade_contrato_servicio.cod_contrato
							AND		vtade_contrato.num_servicio = vtade_contrato_servicio.num_servicio

							WHERE	vtavi_cronograma_x_servicio.flg_activo = 'SI'
							AND		vtavi_cronograma_x_servicio.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtavi_cronograma_x_servicio.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtavi_cronograma_x_servicio.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
							AND		vtade_contrato_servicio.flg_servicio_principal = 'SI'
							AND		vtade_contrato.flg_resuelto = 'NO'
							AND		vtade_contrato.flg_anulado = 'NO'
							AND		vtade_contrato_servicio.flg_contado = 'NO'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetSaldoTotalFinanciar
	
	static public function mdlGetDistribucion($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(( CASE WHEN 'SI' = 'SI' THEN vtade_contrato_servicio.imp_total ELSE vtade_contrato_servicio.imp_total END)) AS imp_total,
									vtama_servicio.cod_servicio,
									vtama_servicio.dsc_servicio,
									vtade_contrato.num_servicio
						FROM		vtade_contrato
						INNER JOIN vtavi_cronograma_x_servicio ON vtavi_cronograma_x_servicio.cod_localidad = vtade_contrato.cod_localidad
						AND		vtavi_cronograma_x_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt
						AND		vtavi_cronograma_x_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa
						AND		vtavi_cronograma_x_servicio.cod_contrato = vtade_contrato.cod_contrato
						AND		vtavi_cronograma_x_servicio.num_servicio = vtade_contrato.num_servicio
						INNER JOIN vtade_contrato_servicio ON vtade_contrato_servicio.cod_localidad = vtade_contrato.cod_localidad
						AND		vtade_contrato_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt
						AND		vtade_contrato_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa
						AND		vtade_contrato_servicio.cod_contrato = vtade_contrato.cod_contrato
						AND		vtade_contrato_servicio.num_servicio = vtade_contrato.num_servicio
						INNER JOIN vtama_servicio ON vtama_servicio.cod_servicio = vtade_contrato_servicio.cod_servicio
						WHERE	vtavi_cronograma_x_servicio.cod_localidad = '".$datos['cod_localidad']."'
						AND		vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
						AND		vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
						AND		vtavi_cronograma_x_servicio.cod_contrato = '".$datos['cod_contrato']."'
						AND		vtavi_cronograma_x_servicio.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
						AND		vtavi_cronograma_x_servicio.flg_activo = 'SI'
						AND		vtade_contrato_servicio.flg_servicio_principal = 'SI'
						AND		vtade_contrato_servicio.flg_contado = 'NO'
						AND		vtade_contrato.flg_resuelto = 'NO'
						AND		vtade_contrato.flg_anulado = 'NO'
GROUP BY vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio, vtade_contrato.num_servicio");

		$datos = array();
    	while($key = $db->recorrer($sql)){
    		$key["imp_total"] = ($key["imp_total"] != null) ? $key["imp_total"] : '0.00';
	    	$datos[] = arrayMapUtf8Encode($key);
		}

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDistribucion
	
	static public function mdlGetPagadoServicio($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT	SUM(
						( CASE WHEN '".$datos['flg_saldo_capital']."' = 'SI' THEN vtade_comprobante.imp_total ELSE vtade_comprobante.imp_total END )
				) AS imp_pagado
	FROM		vtade_comprobante
	WHERE	EXISTS
							(
								SELECT	1
								FROM		vtavi_cuotas_x_comprobante,
											vtavi_cronograma_x_servicio
								WHERE	vtavi_cuotas_x_comprobante.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
								AND		vtavi_cuotas_x_comprobante.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt
								AND		vtavi_cuotas_x_comprobante.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa
								AND		vtavi_cuotas_x_comprobante.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
								AND		vtavi_cuotas_x_comprobante.num_refinanciamiento = vtavi_cronograma_x_servicio.num_refinanciamiento
								AND		vtavi_cuotas_x_comprobante.cod_localidad = vtade_comprobante.cod_localidad
								AND		vtavi_cuotas_x_comprobante.num_correlativo = vtade_comprobante.num_correlativo
								AND		vtavi_cronograma_x_servicio.cod_localidad = '".$datos['cod_localidad']."'
								AND		vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
								AND		vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
								AND		vtavi_cronograma_x_servicio.cod_contrato = '".$datos['cod_contrato']."'
								AND		vtavi_cronograma_x_servicio.num_servicio = '".$datos['num_servicio']."'
							)
							
	AND		vtade_comprobante.cod_servicio = '".$datos['cod_servicio']."'");

		$datos = array();

    	$datos = arrayMapUtf8Encode($db->recorrer($sql));
		
		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetPagadoServicio

}//class ModeloRefinanciamiento
?>