<?php

require_once "conexion.php";
require_once "../funciones.php";

class ModeloSegContrato{

	static public function mdlGetDatosCtt($localidad, $cod_contrato, $cod_servicio){

		$db = new Conexion();

		$sql = $db->consulta("SELECT (SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.cod_localidad, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtade_contrato.cod_localidad)AS dsc_localidad, vtade_contrato.cod_contrato, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.flg_ctt_modif FROM vtade_contrato WHERE vtade_contrato.cod_localidad = '$localidad' AND vtade_contrato.cod_contrato = '$cod_contrato' AND vtade_contrato.num_servicio = '$cod_servicio'");

		while($key = $db->recorrer($sql)){

	      $cliente = Utf8Encode($key['dsc_cliente']);
	      $cod_localidad = $key['cod_localidad'];
	      $dsc_localidad = Utf8Encode($key['dsc_localidad']);
	      $contrato = $key['cod_contrato'];
	      $tipoCtt = $key['cod_tipo_ctt'];
	      $programa = $key['cod_tipo_programa'];
	      $modificado = $key['flg_ctt_modif'];           
		}
		$arrData = array('cliente'=> $cliente, 'cod_localidad' => $cod_localidad, 'dsc_localidad'=> $dsc_localidad, 'contrato'=> $contrato, 'tipoCtt'=> $tipoCtt, 'programa'=> $programa, 'modificado'=> $modificado); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDatosCtt

	static public function mdlgetServiciosCtt($cod_contrato){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.imp_tasa_interes, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_contrato, vtade_contrato.num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, vtade_contrato.fch_generacion, vtade_contrato.fch_emision, vtade_contrato.fch_anulacion, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_transferencia, vtade_contrato.num_refinanciamiento, vtade_contrato.cod_cliente, vtade_contrato.cod_titular_alterno, vtade_contrato.cod_aval, vtade_contrato.cod_canal_venta, vtade_contrato.flg_agencia, vtade_contrato.cod_cobrador, vtade_contrato.cod_vendedor, vtade_contrato.cod_grupo, vtade_contrato.cod_tipo_comisionista, vtade_contrato.cod_supervisor, vtade_contrato.cod_jefeventas, vtade_contrato.cod_agencia FROM vtade_contrato WHERE vtade_contrato.cod_contrato LIKE (RIGHT('0000000000'+'$cod_contrato',10)) ORDER BY num_servicio ASC");

		$tablaServicios = "";

		while ($key = $db->recorrer($sql)) {
	        // -------- Condicional para campos NULL de fch_generacion -------- //
	        if ($key['fch_generacion'] == NULL) {
	            $tfechGen = "-";
	        }else{
	            $tfechGen = dateFormat($key['fch_generacion']);
	        }
	        // -------- Condicional para campos NULL de fch_emision -------- //
	        if ($key['fch_emision'] == NULL) {
	            $tfechEmi = "-";
	        }else{
	            $tfechEmi = dateFormat($key['fch_emision']);
	        }
	        // -------- Condicional para campos NULL de fch_activacion -------- //
	        if ($key['fch_activacion'] == NULL) {
	            $tfechAct = "-";
	        }else{
	            $tfechAct = dateFormat($key['fch_activacion']);
	        }
	        // -------- Condicional para campos NULL de fch_resolución -------- //
	        if ($key['fch_resolucion'] == NULL) {
	            $tfechRes = "-";
	        }else{
	            $tfechRes = dateFormat($key['fch_resolucion']);
	        }
	        // -------- Condicional para campos NULL de fch_anulacion -------- //
	        if ($key['fch_anulacion'] == NULL) {
	            $tfechAnu = "-";
	        }else{
	            $tfechAnu = dateFormat($key['fch_anulacion']);
	        }
	        // -------- Condicional para campos NULL de fch_transferencia -------- //
	        if ($key['fch_transferencia'] == NULL) {
	            $tfechTrans = "-";
	        }else{
	            $tfechTrans = dateFormat($key['fch_transferencia']);
	        }

	        $numCtt = "'".$key['cod_contrato']."'";
	        $localidad = "'".$key['cod_localidad']."'";
	        $tasaInt = "'".$key['imp_tasa_interes']."'";
	        $tipoContrato = "'".$key['cod_tipo_ctt']."'";
	        $tipoPrograma = "'".$key['cod_tipo_programa']."'";
	        $numRef = "'".$key['num_refinanciamiento']."'";
	        $numServ = "'".$key['num_servicio']."'";
	        $titutal = "'".$key['cod_cliente']."'";
	        $titular_alterno = "'".$key['cod_titular_alterno']."'";
	        $aval = "'".$key['cod_aval']."'";
	        $canal_venta = "'".$key['cod_canal_venta']."'";
	        $flg_agencia = "'".$key['flg_agencia']."'";
	        $cobrador = "'".$key['cod_cobrador']."'";
	        $vendedor = "'".$key['cod_vendedor']."'";
	        $grupo = "'".$key['cod_grupo']."'";
	        $tipo_comisionista = "'".$key['cod_tipo_comisionista']."'";
	        $supervisor = "'".$key['cod_supervisor']."'";
	        $jefe_ventas = "'".$key['cod_jefeventas']."'";
	        $agencia = "'".$key['cod_agencia']."'";

	        $tablaServicios.= 
	                   '<tr onclick="getDatosServicioCtt(this,'.$localidad.','.$tasaInt.','.$tipoContrato.','.$tipoPrograma.','.$numCtt.','.$numRef.','.$numServ.','.$titutal.','.$titular_alterno.','.$aval.','.$canal_venta.','.$flg_agencia.','.$cobrador.','.$vendedor.','.$grupo.','.$tipo_comisionista.','.$supervisor.','.$jefe_ventas.','.$agencia.');">
	                        <td>'.$key['num_servicio'].'</td>
	                        <td>'.$key['dsc_tipo_servicio'].'</td>
	                        <td>'.$tfechGen.'</td>
	                        <td>'.$tfechEmi.'</td>
	                        <td>'.$tfechAct.'</td>
	                        <td>'.$tfechAnu.'</td>
	                        <td>'.$tfechRes.'</td>
	                        <td>'.$tfechTrans.'</td>
	                    </tr>';
   		}
	    return $tablaServicios;

	    $db->liberar($sql);
	    $db->cerrar();
	}//function mdlgetServiciosCtt

	static public function mdlGetRefinServ($localidad,$cod_contrato,$cod_servicio){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_cronograma_x_servicio.*, vtade_contrato.cod_cliente, vtade_contrato.cod_titular_alterno, vtade_contrato.cod_aval, vtade_contrato.cod_canal_venta, vtade_contrato.flg_agencia, vtade_contrato.cod_cobrador, vtade_contrato.cod_vendedor, vtade_contrato.cod_grupo, vtade_contrato.cod_tipo_comisionista, vtade_contrato.cod_supervisor, vtade_contrato.cod_jefeventas, vtade_contrato.cod_agencia FROM vtavi_cronograma_x_servicio INNER JOIN vtade_contrato ON vtade_contrato.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato WHERE vtavi_cronograma_x_servicio.cod_localidad = '$localidad' AND vtavi_cronograma_x_servicio.cod_contrato = '$cod_contrato' AND vtavi_cronograma_x_servicio.num_servicio = '$cod_servicio' AND vtade_contrato.num_servicio = '$cod_servicio' ORDER BY vtavi_cronograma_x_servicio.num_refinanciamiento ASC"); 

		$tbodyRefinanciamiento = "";

		while($key = $db->recorrer($sql)){

			$null = "''";
			$localidad = "'".$key['cod_localidad']."'";
			$cod_contrato = "'".$key['cod_contrato']."'";
			$num_serv = "'".$key['num_servicio']."'";
			$num_ref = "'".$key['num_refinanciamiento']."'";
	        $cod_tipo_ctt = "'".$key['cod_tipo_ctt']."'";
	        $cod_tipo_programa = "'".$key['cod_tipo_programa']."'";
	        $titutal = "'".$key['cod_cliente']."'";
	        $titular_alterno = "'".$key['cod_titular_alterno']."'";
	        $aval = "'".$key['cod_aval']."'";
	        $canal_venta = "'".$key['cod_canal_venta']."'";
	        $flg_agencia = $key['flg_agencia'];
	        $cobrador = "'".$key['cod_cobrador']."'";
	        $vendedor = "'".$key['cod_vendedor']."'";
	        $grupo = "'".$key['cod_grupo']."'";
	        $tipo_comisionista = "'".$key['cod_tipo_comisionista']."'";
	        $supervisor = "'".$key['cod_supervisor']."'";
	        $jefe_ventas = "'".$key['cod_jefeventas']."'";
	        $agencia = "'".$key['cod_agencia']."'";

			$tbodyRefinanciamiento .='<tr>
									<td onclick="getDatosServxRef(this,'.$localidad.','.$cod_tipo_ctt.','.$cod_tipo_programa.','.$cod_contrato.','.$num_ref.','.$num_serv.','.$titutal.','.$titular_alterno.','.$aval.','.$canal_venta.','.$flg_agencia.','.$cobrador.','.$vendedor.','.$grupo.','.$tipo_comisionista.','.$supervisor.','.$jefe_ventas.','.$agencia.')">'.$key['num_refinanciamiento'].'</td>
								</tr>';
		}
		$arrData = array('tbodyRefinanciamiento'=> $tbodyRefinanciamiento); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetEndoServicio

	static public function mdlGetCuotas($datos){

		$cronogramaCtt = "";
		$total = 0;
		$totalSaldo = 0;
		$totalMora = 0;
		$tasa = 0.12;
		$fechactual = strtotime(date('Y-m-d'));
		$num_dias=1;

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtade_cronograma.cod_localidad,
                                    vtade_cronograma.cod_contrato,
                                    vtade_cronograma.num_refinanciamiento,
                                    vtade_cronograma.num_cuota,
                                    vtade_cronograma.cod_estadocuota,
                                    vtade_cronograma.fch_vencimiento,
                                    vtade_cronograma.fch_cancelacion,
                                    vtade_cronograma.imp_principal,
                                    vtade_cronograma.imp_interes,
                                    vtade_cronograma.imp_igv,
                                    vtade_cronograma.imp_total,
                                    vtade_cronograma.imp_saldo,
                                    vtade_cronograma.imp_totalemitido,
                                    vtade_cronograma.imp_totalpagado,
                                    vtade_cronograma.cod_tipo_cuota,
                                    vtade_cronograma.cod_tipo_ctt,
                                    vtade_cronograma.cod_tipo_programa,

          ( CASE WHEN vtade_cronograma.cod_estadocuota = 'REG' AND vtade_cronograma.cod_tipo_cuota = 'ARM' AND vtade_cronograma.flg_generar_mora = 'SI' AND vtade_cronograma.flg_mora_cancelada = 'NO' AND vtade_cronograma.fch_vencimiento < GETDATE() THEN ( CASE WHEN '$num_dias' > 0 
          THEN ROUND((((vtade_cronograma.imp_total * '$tasa') / 100) * DATEDIFF(DD, vtade_cronograma.fch_vencimiento, GETDATE())), 4) ELSE 0 END ) 
          ELSE 0 END ) AS imp_mora

          FROM  vtade_cronograma
          WHERE vtade_cronograma.cod_localidad = '".$datos['localidad']."'
          AND   vtade_cronograma.cod_tipo_ctt = '".$datos['tipoCtt']."'
          AND   vtade_cronograma.cod_tipo_programa = '".$datos['tipoPro']."'
          AND   vtade_cronograma.cod_contrato = '".$datos['codCtt']."'
          AND   vtade_cronograma.num_refinanciamiento = '".$datos['numRef']."'
          AND   ( vtade_cronograma.fch_vencimiento < CONVERT(DATE, GETDATE()) OR
                ( DATEPART(YY, fch_vencimiento) * 100) + DATEPART(MM, fch_vencimiento) = ( DATEPART(YY, GETDATE()) * 100 ) + DATEPART(MM, GETDATE()))
          AND   vtade_cronograma.cod_estadocuota IN ('EMI', 'REG')");

		while($key = $db->recorrer($sql)){

			// -------- Condicional para campos NULL de fch_vencimiento -------- //
	        if ($key['fch_vencimiento'] == NULL) {
	            $fchVencimiento = "-";
	        }else{
	            $fchVencimiento = dateFormat($key['fch_vencimiento']);
	        }
	        // -------- Condicional para campos NULL de fch_cancelacion -------- //
	        if ($key['fch_cancelacion'] == NULL) {
	            $fchCancelacion = "-";
	        }else{
	            $fchCancelacion = dateFormat($key['fch_cancelacion']);
	        }

	        $fchEntrada = strtotime(dateFormat($key['fch_vencimiento']));

	        if ($fchEntrada < $fechactual) {
	        	$cronogramaCtt.='<tr class="cuoVencida">
	        						<td>'.$key['cod_tipo_cuota'].'</td>
		                            <td>'.$key["num_cuota"].'</td>
		                            <td>'.$key["cod_estadocuota"].'</td>
		                            <td>'.$fchVencimiento.'</td>
		                            <td>'.$fchCancelacion.'</td>
		                            <td>'.number_format(round($key["imp_principal"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_interes"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_igv"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_total"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_saldo"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_mora"], 2),2,',','.').'</td>
		                        </tr>'; 
	        }elseif ($fchEntrada >= $fechactual) {
	        	$cronogramaCtt.='<tr class="cuoPorVencer">
	        						<td>'.$key['cod_tipo_cuota'].'</td>
		                            <td>'.$key["num_cuota"].'</td>
		                            <td>'.$key["cod_estadocuota"].'</td>
		                            <td>'.$fchVencimiento.'</td>
		                            <td>'.$fchCancelacion.'</td>
		                            <td>'.number_format(round($key["imp_principal"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_interes"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_igv"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_total"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_saldo"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_mora"], 2),2,',','.').'</td>
		                        </tr>';
	        }

	        $total += $key["imp_total"];
		    $totalSaldo += $key["imp_saldo"];
		    $totalMora += $key["imp_mora"];
		}
		$arrData = array('cronograma'=> $cronogramaCtt, 'total' => number_format(round($total, 2),2,',','.'), 'totalSaldo'=> number_format(round($totalSaldo, 2),2,',','.'), 'totalMora'=> number_format(round($totalMora, 2),2,',','.')); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetCuotas

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

	static public function mdlGetDatosEspacio($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtaca_contrato.cod_camposanto_actual, vtaca_contrato.cod_plataforma_actual, vtaca_contrato.cod_areaplataforma_actual, vtaca_contrato.cod_ejehorizontal_actual, vtaca_contrato.cod_ejevertical_actual, vtaca_contrato.cod_espacio_actual, vtaca_contrato.cod_tipoespacio_actual, vtaca_contrato.num_nivel_actual, (SELECT dsc_camposanto FROM  vtama_camposanto WHERE vtaca_contrato.cod_camposanto_actual = vtama_camposanto.cod_camposanto)AS dsc_camposanto, vtama_area_plataforma.dsc_area, vtama_plataforma.dsc_plataforma,  vtama_tipo_espacio.dsc_tipo_espacio, vtama_tipo_servicio.dsc_tipo_servicio, vtade_contrato.cod_empresa, vtade_contrato.imp_interes, vtade_contrato.imp_cuoi, vtade_contrato.imp_subtotal, vtade_contrato.imp_saldofinanciar, vtade_contrato.imp_igv, vtade_contrato.imp_totalneto, vtade_contrato.cod_moneda, vtade_contrato.cod_tipo_necesidad FROM vtade_contrato INNER JOIN vtaca_contrato ON vtade_contrato.cod_contrato = vtaca_contrato.cod_contrato LEFT JOIN vtama_camposanto ON vtama_camposanto.cod_camposanto = vtade_contrato.cod_empresa INNER JOIN vtama_area_plataforma ON vtama_area_plataforma.cod_area_plataforma = vtaca_contrato.cod_areaplataforma_actual INNER JOIN  vtama_plataforma ON vtama_plataforma.cod_plataforma = vtaca_contrato.cod_plataforma_actual INNER JOIN vtama_tipo_espacio ON vtama_tipo_espacio.cod_tipo_espacio = vtaca_contrato.cod_tipoespacio_actual INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio WHERE vtade_contrato.cod_contrato = '".$datos['cod_contrato']."' AND num_servicio = '".$datos['cod_servicio']."' AND vtade_contrato.flg_fondo_mantenimiento = 'NO'");


		while($key = $db->recorrer($sql)){

	      $dsc_camposanto = Utf8Encode($key['dsc_camposanto']);
	      $dsc_plataforma = Utf8Encode($key['dsc_plataforma']);
	      $dsc_area = $key['dsc_area'];
	      $eje_hor = $key['cod_ejehorizontal_actual'];
	      $eje_ver = $key['cod_ejevertical_actual'];
	      $cod_espacio = $key['cod_espacio_actual'];
	      if ($key['num_nivel_actual'] == NULL) {
	      	$nivel = "";
	      }else{
	      	$nivel = $key['num_nivel_actual'];
	      }
	      $tipo_espacio = $key['dsc_tipo_espacio'];
	      $cod_empresa = $key['cod_empresa'];
	      $imp_interes =  number_format(round($key['imp_interes'], 2),2,',','.');
	      $imp_cuoi =  number_format(round($key['imp_cuoi'], 2),2,',','.');
	      $imp_subtotal =  number_format(round($key['imp_subtotal'], 2),2,',','.');
	      $imp_saldofinanciar =  number_format(round($key['imp_saldofinanciar'], 2),2,',','.');
	      $imp_igv =  number_format(round($key['imp_igv'], 2),2,',','.');
	      $imp_totalneto =  number_format(round($key['imp_totalneto'], 2),2,',','.');
	      $moneda = $key['cod_moneda'];
	      if ($key['cod_tipo_necesidad'] == "NI") {
	      	$tipo_nec = "NECESIDAD INMEDIATA";
	      }else{
	      	$tipo_nec = "NECESIDAD FUTURA";
	      }
		}

		$arrData = array('dsc_camposanto'=> $dsc_camposanto, 'dsc_plataforma' => $dsc_plataforma, 'dsc_area'=> $dsc_area, 'eje_hor' => $eje_hor, 'eje_ver'=> $eje_ver, 'cod_espacio' => $cod_espacio, 'nivel'=> $nivel, 'tipo_espacio' => $tipo_espacio, 'cod_empresa' => $cod_empresa, 'imp_interes'=> $imp_interes, 'imp_cuoi' => $imp_cuoi, 'imp_subtotal'=> $imp_subtotal, 'imp_saldofinanciar' => $imp_saldofinanciar, 'imp_igv'=> $imp_igv, 'imp_totalneto' => $imp_totalneto, 'moneda'=> $moneda, 'tipo_nec' => $tipo_nec); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDatosEspacio

	static public function mdlGetServPrincipal($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtade_contrato_servicio.cod_servicio_principal, vtama_servicio.dsc_servicio, vtade_contrato_servicio.num_ctd, vtade_contrato_servicio.num_ctd_usado, vtade_contrato_servicio.imp_precio_venta, vtade_contrato_servicio.imp_cuoi_servicio, vtade_contrato_servicio.imp_cuoi, vtade_contrato_servicio.imp_subtotal, vtade_contrato_servicio.imp_igv, vtade_contrato_servicio.imp_total FROM vtade_contrato_servicio INNER JOIN vtama_servicio ON vtade_contrato_servicio.cod_servicio_principal = vtama_servicio.cod_servicio WHERE cod_localidad = '".$datos['localidad']."' AND vtade_contrato_servicio.cod_contrato = '".$datos['cod_contrato']."' AND vtade_contrato_servicio.num_servicio = '".$datos['cod_servicio']."'"); 

		$tableServPrincipal = "";
		$i=0;

		while($key = $db->recorrer($sql)){

			$tableServPrincipal='<tr>
									<td>'.($i+1).'</td>
									<td>'.$key['cod_servicio_principal'].'</td>
									<td>'.Utf8Encode($key['dsc_servicio']).'</td>
									<td>'.$key['num_ctd'].'</td>
									<td>'.$key['num_ctd_usado'].'</td>
									<td>'.number_format(round($key['imp_precio_venta'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_cuoi_servicio'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_cuoi'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_subtotal'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_igv'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_total'], 2),2,',','.').'</td>
								</tr>';
		}
		$arrData = array('tableServPrincipal'=> $tableServPrincipal); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetServPrincipal

	static public function mdlGetDsctoServicio($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_descuento_x_contrato.flg_tasa, vtama_tipo_descuento.dsc_tipo_descuento, vtavi_descuento_x_contrato.flg_libre, vtavi_descuento_x_contrato.cod_usuario, vtavi_descuento_x_contrato.fch_registro, vtavi_descuento_x_contrato.imp_valor, vtavi_descuento_x_contrato.imp_dscto FROM vtavi_descuento_x_contrato LEFT JOIN vtama_tipo_descuento ON vtama_tipo_descuento.cod_tipo_descuento = vtavi_descuento_x_contrato.cod_tipo_descuento WHERE vtavi_descuento_x_contrato.cod_localidad = '".$datos['localidad']."' AND vtavi_descuento_x_contrato.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_descuento_x_contrato.num_servicio = '".$datos['cod_servicio']."'"); 

		$tableDsctoServicio = "";
		$dsctoTotal = 0;

		while($key = $db->recorrer($sql)){

			$tableDsctoServicio .='<tr>
									<td>'.Utf8Encode($key['cod_usuario']).'</td>
									<td>'.dateFormat($key['fch_registro']).'</td>
									<td>'.$key['dsc_tipo_descuento'].'</td>';
			if ($key['flg_tasa'] == "SI") {
				$tableDsctoServicio .='<td><input type="checkbox" name="" checked="" disabled></td>';
			}else{
				$tableDsctoServicio .='<td><input type="checkbox" name="" disabled></td>';
			}
			if ($key['flg_libre'] == "SI") {
				$tableDsctoServicio .='<td><input type="checkbox" name="" checked="" disabled></td>';
			}else{
				$tableDsctoServicio .='<td><input type="checkbox" name="" disabled></td>';
			}
			$tableDsctoServicio .='<td>'.number_format(round($key['imp_valor'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_dscto'], 2),2,',','.').'</td>
								</tr>';

			$dsctoTotal += $key["imp_dscto"];
		}
		$arrData = array('tableDsctoServicio'=> $tableDsctoServicio, 'dsctoTotal' => number_format(round($dsctoTotal, 2),2,',','.')); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDsctoServicio

	static public function mdlGetEndoServicio($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtama_entidad.dsc_entidad, vtavi_endoso_x_contrato.imp_valor, vtavi_endoso_x_contrato.imp_saldo, vtavi_endoso_x_contrato.imp_total_emitido, vtavi_endoso_x_contrato.cod_usuario, vtavi_endoso_x_contrato.fch_registro, vtavi_endoso_x_contrato.cod_estado, vtavi_endoso_x_contrato.fch_vencimiento, vtavi_endoso_x_contrato.fch_cancelacion FROM vtavi_endoso_x_contrato INNER JOIN vtama_entidad ON vtama_entidad.cod_entidad = vtavi_endoso_x_contrato.cod_entidad WHERE vtavi_endoso_x_contrato.cod_localidad = '".$datos['localidad']."' AND vtavi_endoso_x_contrato.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_endoso_x_contrato.num_servicio = '".$datos['cod_servicio']."'"); 

		$tableEndoServicio = "";

		while($key = $db->recorrer($sql)){

			$tableEndoServicio .='<tr>
									<td>'.Utf8Encode($key['cod_usuario']).'</td>
									<td>'.dateFormat($key['fch_registro']).'</td>
									<td>'.$key['cod_estado'].'</td>
									<td>'.dateFormat($key['fch_vencimiento']).'</td>
									<td>'.dateFormat($key['fch_cancelacion']).'</td>
									<td>'.$key['dsc_entidad'].'</td>
									<td>'.number_format(round($key['imp_valor'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_saldo'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_total_emitido'], 2),2,',','.').'</td>
								</tr>';

			$valor_total += $key["imp_valor"];
			$saldo_total += $key["imp_saldo"];
			$emitido_total += $key["imp_total_emitido"];
		}
		$arrData = array('tableEndoServicio'=> $tableEndoServicio, 'valor_total' => number_format(round($valor_total, 2),2,',','.'), 'saldo_total' => number_format(round($saldo_total, 2),2,',','.'), 'emitido_total' => number_format(round($emitido_total, 2),2,',','.')); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetEndoServicio

	static public function mdlGetCuotasCron($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT cod_localidad, cod_contrato, num_refinanciamiento, num_cuota, cod_tipo_cuota, cod_estadocuota, fch_vencimiento, fch_cancelacion, imp_principal, imp_interes, imp_igv, imp_total, imp_saldo, imp_totalemitido, imp_totalpagado,( CASE WHEN vtade_cronograma.cod_estadocuota = 'REG' AND vtade_cronograma.cod_tipo_cuota = 'ARM' AND vtade_cronograma.flg_generar_mora = 'SI' AND vtade_cronograma.flg_mora_cancelada = 'NO' AND vtade_cronograma.fch_vencimiento < GETDATE() THEN ( CASE WHEN 1 > 0 THEN ROUND((((vtade_cronograma.imp_total * 0.12) / 100) * DATEDIFF(DD, vtade_cronograma.fch_vencimiento, GETDATE())), 4) ELSE 0 END ) ELSE 0 END ) AS imp_mora FROM vtade_cronograma WHERE cod_localidad = '".$datos['localidad']."' AND cod_contrato = '".$datos['cod_contrato']."' AND num_refinanciamiento = '".$datos['num_refinanciamiento']."'");

		$num_cuotas = $db->rows($sql);
		$cuotas = "Cuotas(".$num_cuotas.")";

		$imp_principal_total = 0;
		$imp_interes_total = 0;
		$imp_igv_total = 0;
		$imp_total_total = 0;
		$imp_saldo_total = 0;
		$imp_totalemitido_total = 0;
		$imp_totalpagado_total = 0;
		$imp_mora_total = 0;
		$tbodyCronograma = "";

		while($key = $db->recorrer($sql)){

			$localidad = "'".$key['cod_localidad']."'";
			$cod_contrato = "'".$key['cod_contrato']."'";
			$num_ref = "'".$key['num_refinanciamiento']."'";
			$num_cuota = "'".$key['num_cuota']."'";

			$tbodyCronograma .= '<tr onclick="getComprobantesCuota(this,'.$localidad.','.$cod_contrato.','.$num_ref.','.$num_cuota.');">
									<td>'.$key['num_cuota'].'</td>
									<td>'.$key['cod_tipo_cuota'].'</td>
									<td>'.$key['cod_estadocuota'].'</td>
									<td>'.dateFormat($key['fch_vencimiento']).'</td>
									<td>'.dateFormat($key['fch_cancelacion']).'</td>
									<td>'.number_format(round($key['imp_principal'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_interes'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_igv'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_total'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_saldo'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_totalemitido'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_totalpagado'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_mora'], 2),2,',','.').'</td>
								</tr>';

			$imp_principal_total += $key["imp_principal"];
			$imp_interes_total += $key["imp_interes"];
			$imp_igv_total += $key["imp_igv"];
			$imp_total_total += $key["imp_total"];
			$imp_saldo_total += $key["imp_saldo"];
			$imp_totalemitido_total += $key["imp_totalemitido"];
			$imp_totalpagado_total += $key["imp_totalpagado"];
			$imp_mora_total += $key["imp_mora"];
		}

		$arrData = array('tbodyCronograma'=> $tbodyCronograma, 'imp_principal_total' => number_format(round($imp_principal_total, 2),2,',','.'), 'imp_interes_total' => number_format(round($imp_interes_total, 2),2,',','.'), 'imp_igv_total' => number_format(round($imp_igv_total, 2),2,',','.'), 'imp_total_total' => number_format(round($imp_total_total, 2),2,',','.'), 'imp_saldo_total' => number_format(round($imp_saldo_total, 2),2,',','.'), 'imp_totalemitido_total' => number_format(round($imp_totalemitido_total, 2),2,',','.'), 'imp_totalpagado_total' => number_format(round($imp_totalpagado_total, 2),2,',','.'), 'imp_mora_total' => number_format(round($imp_mora_total, 2),2,',','.'), 'cuotas' => $cuotas); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetCuotasCron

	static public function mdlGetBeneficiariosServ($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT num_item, num_servicio, cod_tipo_documento, dsc_documento, dsc_apellidopaterno, dsc_apellidomaterno, dsc_nombre, cod_sexo, cod_estado_civil, fch_nacimiento, cod_parentesco, num_peso, num_talla, cod_religion, dsc_observacion, fch_deceso, fch_entierro, cod_lugar_deceso, cod_motivo_deceso, num_nivel, flg_autopsia FROM vtade_beneficiario_x_contrato WHERE cod_localidad = '".$datos['localidad']."' AND cod_contrato = '".$datos['cod_contrato']."' AND num_servicio = '".$datos['cod_servicio']."'"); 

		$tablaBeneficiarios = "";

		while($key = $db->recorrer($sql)){

	      	$cod_servicio = "'".$key['num_servicio']."'";
	        $tipo_doc = "'".$key['cod_tipo_documento']."'";
	        $num_doc = "'".$key['dsc_documento']."'";
	        $ape_paterno = "'".Utf8Encode($key['dsc_apellidopaterno'])."'";
	        $ape_materno = "'".Utf8Encode($key['dsc_apellidomaterno'])."'";
	        $nombre = "'".Utf8Encode($key['dsc_nombre'])."'";
	        $sexo = "'".$key['cod_sexo']."'";
	        $edo_civil = "'".$key['cod_estado_civil']."'";
	        if ($key['fch_nacimiento'] == NULL) {
	            $fch_nacimiento = "''";
	        }else{
	            $fch_nacimiento = "'".dateFormat($key['fch_nacimiento'])."'";
	        }
	        $parentesco = "'".$key['cod_parentesco']."'";
	        $peso = "'".$key['num_peso']."'";
	        $talla = "'".$key['num_talla']."'";
	        $religion = "'".$key['cod_religion']."'";
	        $observacion = "'".Utf8Encode($key['dsc_observacion'])."'";
	        if ($key['fch_deceso'] == NULL) {
	            $fch_deceso = "''";
	        }else{
	            $fch_deceso = "'".dateFormat($key['fch_deceso'])."'";
	        }
	        if ($key['fch_entierro'] == NULL) {
	            $fch_entierro = "''";
	        }else{
	            $fch_entierro = "'".dateFormat($key['fch_entierro'])."'";
	        }
	        $lugar_deceso = "'".$key['cod_lugar_deceso']."'";
	        $motivo_deceso = "'".$key['cod_motivo_deceso']."'";
	        $nivel = "'".$key['num_nivel']."'";
	        $flg_autopsia = "'".$key['flg_autopsia']."'";

	        $tablaBeneficiarios .= '<tr onclick="mostrarBeneficiario(this,'.$cod_servicio.','.$tipo_doc.','.$num_doc.','.$ape_paterno.','.$ape_materno.','.$nombre.','.$sexo.','.$edo_civil.','.$fch_nacimiento.','.$parentesco.','.$peso.','.$talla.','.$religion.','.$observacion.','.$fch_deceso.','.$fch_entierro.','.$lugar_deceso.','.$motivo_deceso.','.$nivel.','.$flg_autopsia.');">
										<th scope="row">'.$key['num_item'].'</th>
										<td>'.Utf8Encode($key['dsc_nombre']).'</td>
										<td>'.Utf8Encode($key['dsc_apellidopaterno']).' '.Utf8Encode($key['dsc_apellidomaterno']).'</td>
									</tr>';
		}
		$arrData = array('tablaBeneficiarios'=> $tablaBeneficiarios); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetBeneficiariosServ
	
	static public function mdlGetDetFinanciamiento($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, imp_saldofinanciar FROM vtade_contrato WHERE cod_localidad = '".$datos['localidad']."' AND cod_contrato = '".$datos['cod_contrato']."' AND num_refinanciamiento = '".$datos['num_refinanciamiento']."' AND flg_fondo_mantenimiento = 'NO'");

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
	
	static public function mdlGetComprobantes($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_cuotas_x_comprobante.cod_localidad, vtavi_cuotas_x_comprobante.cod_contrato, vtavi_cuotas_x_comprobante.num_refinanciamiento, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante, vtaca_comprobante.num_comprobante, vtaca_comprobante.flg_nc, vtaca_comprobante.fch_emision, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo, vtaca_comprobante.cod_estado, vtavi_cuotas_x_comprobante.num_correlativo, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtavi_cuotas_x_comprobante.cod_localidad) AS dsc_localidad, vtavi_cuotas_x_comprobante.cod_tipo_ctt, vtavi_cuotas_x_comprobante.cod_tipo_programa, vtavi_cuotas_x_comprobante.cod_contrato,  vtavi_cuotas_x_comprobante.num_cuota FROM vtavi_cuotas_x_comprobante INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_cuotas_x_comprobante.num_correlativo WHERE vtavi_cuotas_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_cuotas_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_cuotas_x_comprobante.num_cuota = '".$datos['num_cuota']."' AND vtavi_cuotas_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."' UNION SELECT vtavi_mora_x_comprobante.cod_localidad, vtavi_mora_x_comprobante.cod_contrato, vtavi_mora_x_comprobante.num_refinanciamiento, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante,vtaca_comprobante.num_comprobante, vtaca_comprobante.flg_nc, vtaca_comprobante.fch_emision, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo, vtaca_comprobante.cod_estado, vtavi_mora_x_comprobante.num_correlativo, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtavi_mora_x_comprobante.cod_localidad) AS dsc_localidad, vtavi_mora_x_comprobante.cod_tipo_ctt, vtavi_mora_x_comprobante.cod_tipo_programa, vtavi_mora_x_comprobante.cod_contrato, vtavi_mora_x_comprobante.num_cuota FROM vtavi_mora_x_comprobante INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_mora_x_comprobante.num_correlativo WHERE vtavi_mora_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_mora_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_mora_x_comprobante.num_cuota = '".$datos['num_cuota']."' AND vtavi_mora_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."'");

		$tbodyComprobantes = "";

		while($key = $db->recorrer($sql)){

			$num_comprobante = "'".$key['num_comprobante']."'";
			$cod_localidad = "'".$key['cod_localidad']."'";
			$cod_contrato = "'".$key['cod_contrato']."'";
			$num_refinanciamiento = "'".$key['num_refinanciamiento']."'";
			$num_correlativo = "'".$key['num_correlativo']."'";
			$dsc_tipo_comprobante = "'".$key['dsc_tipo_comprobante']."'";
			$fch_emision = "'".dateFormat($key['fch_emision'])."'";
			$dsc_localidad = "'".$key['dsc_localidad']."'";
			$tipo_ctt = "'".$key['cod_tipo_ctt']."'";
			$tipo_programa = "'".$key['cod_tipo_programa']."'";
			$num_cuota = "'".$key['num_cuota']."'";
			$cod_moneda = "'".$key['cod_moneda']."'";
			$imp_total = "'".number_format(round($key['imp_total'], 2),2,',','.')."'";

			$tbodyComprobantes .= '<tr onclick="getCancelacionComprobante(this,'.$cod_localidad.','.$num_correlativo.');" ondblclick="getDatosComprobante()">
									<td>
										<button type="button" class="btn-comprobante btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" onclick="creaTablaComprobante('.$dsc_tipo_comprobante.','.$num_comprobante.','.$fch_emision.','.$dsc_localidad.','.$tipo_ctt.','.$tipo_programa.','.$cod_contrato.','.$num_refinanciamiento.','.$num_cuota.','.$cod_moneda.','.$imp_total.');">
											<i class="la la-plus"></i>
										</button>
									</td>
									<td>'.$key['dsc_tipo_comprobante'].'</td>
									<td>'.$key['num_comprobante'].'</td>';
			if ($key['flg_nc'] == "SI") {
				$tbodyComprobantes .= '<td>
										<label class="m-checkbox">
											<input type="checkbox" class="td-checkbox" checked="" disabled>
											<span></span>
										</label>
									</td>';
			}else{
				$tbodyComprobantes .= '<td>
										<label class="m-checkbox">
											<input type="checkbox" class="td-checkbox" disabled>
											<span></span>
										</label>
									</td>';
			}
			$tbodyComprobantes .= '<td>'.dateFormat($key['fch_emision']).'</td>
								<td>'.$key['cod_moneda'].'</td>
								<td>'.number_format(round($key['imp_total'], 2),2,',','.').'</td>
								<td>'.number_format(round($key['imp_saldo'], 2),2,',','.').'</td>
								<td>'.$key['cod_estado'].'</td>
							</tr>';

		}

		$arrData = array('tbodyComprobantes'=> $tbodyComprobantes); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetComprobantes

	static public function mdlGetCancelaciones($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_caja_x_comprobante.cod_caja, vtavi_caja_x_comprobante.num_transaccion, (SELECT vtama_forma_pago.dsc_forma_pago FROM vtama_forma_pago WHERE vtama_forma_pago.cod_forma_pago = vtade_caja.cod_forma_pago) AS dsc_forma_pago, (SELECT vtaca_caja.fch_transaccion FROM vtaca_caja WHERE vtaca_caja.cod_caja = vtade_caja.cod_caja AND vtaca_caja.num_transaccion = vtade_caja.num_transaccion) AS fch_registro, vtade_caja.cod_moneda, vtade_caja.imp_operacion, vtade_caja.imp_operacion_soles FROM vtavi_caja_x_comprobante INNER JOIN vtade_caja ON vtade_caja.num_transaccion = vtavi_caja_x_comprobante.num_transaccion
			AND vtade_caja.cod_caja = vtavi_caja_x_comprobante.cod_caja
			AND vtade_caja.num_linea = vtavi_caja_x_comprobante.num_linea
		 WHERE vtavi_caja_x_comprobante.cod_localidad = '".$datos['localidad']."' AND vtavi_caja_x_comprobante.num_correlativo = '".$datos['num_correlativo']."'");

		$tbodyCancelaciones = "";

		while($key = $db->recorrer($sql)){

			$tbodyCancelaciones .= '<tr onclick="">
									<td>'.$key['cod_caja'].'</td>
									<td>'.$key['num_transaccion'].'</td>
									<td>'.dateFormat($key['fch_registro']).'</td>
									<td>'.$key['dsc_forma_pago'].'</td>';
			if ($key['cod_moneda'] == "SOL") {
				$tbodyCancelaciones .= '<td>S/.</td>';
			}else{
				$tbodyCancelaciones .= '<td>'.$key['cod_moneda'].'</td>';
			}
			$tbodyCancelaciones .= '<td>'.number_format(round($key['imp_operacion'], 2),2,',','.').'</td>
									<td>'.number_format(round($key['imp_operacion_soles'], 2),2,',','.').'</td>
								</tr>';

		}

		$arrData = array('tbodyCancelaciones'=> $tbodyCancelaciones); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function GetCancelaciones
	
	static public function mdlGetDatosCliente($cod_cliente){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtama_cliente.cod_cliente, vtama_cliente.dsc_cliente, vtama_cliente.flg_juridico, vtama_tipo_documento.dsc_tipo_documento, vtama_cliente.dsc_documento, vtama_cliente.dsc_email, vtade_cliente_direccion.dsc_direccion, vtama_cliente.dsc_telefono_1, vtama_cliente.dsc_telefono_2 FROM vtama_cliente INNER JOIN vtade_cliente_direccion ON vtade_cliente_direccion.cod_cliente = vtama_cliente.cod_cliente INNER JOIN vtama_tipo_documento ON vtama_tipo_documento.cod_tipo_documento = vtama_cliente.cod_tipo_documento WHERE vtama_cliente.cod_cliente = '$cod_cliente'");

		while($key = $db->recorrer($sql)){

			$cod_cliente = $key['cod_cliente'];
		    $dsc_cliente = Utf8Encode($key['dsc_cliente']);
		    $flg_juridico = $key['flg_juridico'];
		    $dsc_tipo_doc = Utf8Encode($key['dsc_tipo_documento']);
		    $dsc_documento = $key['dsc_documento'];
		    $dsc_email = Utf8Encode($key['dsc_email']);
		    $dsc_direccion = Utf8Encode($key['dsc_direccion']);
		    $dsc_telefono_1 = $key['dsc_telefono_1'];
		    $dsc_telefono_2 = $key['dsc_telefono_2'];
		}
		$arrData = array('cod_cliente'=> $cod_cliente, 'dsc_cliente' => $dsc_cliente, 'flg_juridico'=> $flg_juridico, 'dsc_tipo_doc'=> $dsc_tipo_doc, 'dsc_documento'=> $dsc_documento, 'dsc_email'=> $dsc_email, 'dsc_direccion'=> $dsc_direccion, 'dsc_telefono_1'=> $dsc_telefono_1, 'dsc_telefono_2'=> $dsc_telefono_2); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDatosCliente

	static public function mdlFiltroComprobantes($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_cuotas_x_comprobante.cod_localidad, vtavi_cuotas_x_comprobante.num_correlativo, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante, vtaca_comprobante.num_comprobante, vtaca_comprobante.dsc_deudor, vtaca_comprobante.cod_estado, vtaca_comprobante.fch_emision, vtaca_comprobante.fch_cancelacion, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo 
			FROM vtavi_cuotas_x_comprobante
			INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_cuotas_x_comprobante.num_correlativo
			WHERE vtavi_cuotas_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_cuotas_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_cuotas_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."' AND vtaca_comprobante.cod_tipo_comprobante LIKE '%' + '".$datos['cod_tipo_comprobante']."' + '%' AND vtaca_comprobante.num_comprobante LIKE '%' + '".$datos['num_comprobante']."' + '%'
			UNION
			SELECT vtavi_mora_x_comprobante.cod_localidad, vtavi_mora_x_comprobante.num_correlativo, (SELECT vtama_tipo_comprobante.dsc_tipo_comprobante FROM vtama_tipo_comprobante WHERE vtama_tipo_comprobante.cod_tipo_comprobante = vtaca_comprobante.cod_tipo_comprobante) AS dsc_tipo_comprobante, vtaca_comprobante.num_comprobante, vtaca_comprobante.dsc_deudor, vtaca_comprobante.cod_estado, vtaca_comprobante.fch_emision, vtaca_comprobante.fch_cancelacion, vtaca_comprobante.cod_moneda, vtaca_comprobante.imp_total, vtaca_comprobante.imp_saldo 
			FROM vtavi_mora_x_comprobante
			INNER JOIN vtaca_comprobante ON vtaca_comprobante.num_correlativo = vtavi_mora_x_comprobante.num_correlativo
			WHERE vtavi_mora_x_comprobante.cod_localidad_ctt = '".$datos['localidad']."' AND vtavi_mora_x_comprobante.cod_contrato = '".$datos['cod_contrato']."' AND vtavi_mora_x_comprobante.num_refinanciamiento = '".$datos['num_refinanciamiento']."' AND vtaca_comprobante.cod_tipo_comprobante LIKE '%' + '".$datos['cod_tipo_comprobante']."' + '%' AND vtaca_comprobante.num_comprobante LIKE '%' + '".$datos['num_comprobante']."' + '%'");

		$tbodyComprobantesPrincipal = "";

		while($key = $db->recorrer($sql)){

			$cod_localidad = "'".$key['cod_localidad']."'";
			$num_correlativo = "'".$key['num_correlativo']."'";

			$tbodyComprobantesPrincipal .= '<tr onclick="getCancelacionPrincipal(this,'.$cod_localidad.','.$num_correlativo.');">
									<td>'.$key['dsc_tipo_comprobante'].'</td>
									<td>'.$key['num_comprobante'].'</td>
									<td>'.Utf8Encode($key['dsc_deudor']).'</td>
									<td>'.$key['cod_estado'].'</td>
									<td>'.dateFormat($key['fch_emision']).'</td>
									<td>'.dateFormat($key['fch_cancelacion']).'</td>';
			if ($key['cod_moneda'] == "SOL") {
				$tbodyComprobantesPrincipal .= '<td>S/.</td>';
			}else{
				$tbodyComprobantesPrincipal .= '<td>'.$key['cod_moneda'].'</td>';
			}
			$tbodyComprobantesPrincipal .= '<td>'.number_format(round($key['imp_total'], 2),2,',','.').'</td>
								<td>'.number_format(round($key['imp_saldo'], 2),2,',','.').'</td>
							</tr>';

		}

		$arrData = array('tbodyComprobantesPrincipal'=> $tbodyComprobantesPrincipal); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlFiltroComprobantes
	
	static public function mdlGetAutorizacion($datos){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtama_tipo_autorizacion.dsc_tipo_autorizacion, vtaca_autorizacion.num_uso_servicio, vtaca_autorizacion.cod_estado_autorizacion, vtaca_autorizacion.fch_servicio, vtaca_autorizacion.dsc_apellido_paterno, vtaca_autorizacion.dsc_apellido_materno, vtaca_autorizacion.dsc_nombres, vtama_tipo_documento.dsc_tipo_documento, vtaca_autorizacion.dsc_documento, vtaca_autorizacion.fch_nacimiento, vtaca_autorizacion.fch_deceso, 
			(SELECT vtama_lugar_deceso.dsc_lugar_deceso FROM vtama_lugar_deceso WHERE vtama_lugar_deceso.cod_lugar_deceso= vtaca_autorizacion.cod_lugar_deceso) AS dsc_lugar_deceso,
			(SELECT vtama_camposanto.dsc_camposanto FROM vtama_camposanto WHERE vtama_camposanto.cod_camposanto = vtaca_autorizacion.cod_camposanto_esp) AS dsc_camposanto,
			(SELECT vtama_plataforma.dsc_plataforma FROM vtama_plataforma WHERE vtama_plataforma.cod_camposanto = vtaca_autorizacion.cod_camposanto_esp AND vtama_plataforma.cod_plataforma = vtaca_autorizacion.cod_plataforma_esp) AS dsc_plataforma,
			(SELECT vtama_area_plataforma.dsc_area from vtama_area_plataforma WHERE vtama_area_plataforma.cod_camposanto = vtaca_autorizacion.cod_camposanto_esp AND vtama_area_plataforma.cod_plataforma = vtaca_autorizacion.cod_plataforma_esp AND vtama_area_plataforma.cod_area_plataforma = vtaca_autorizacion.cod_area_esp) AS dsc_area,
			vtaca_autorizacion.cod_eje_horizontal_esp, vtaca_autorizacion.cod_eje_vertical_esp, vtaca_autorizacion.cod_espacio,
			vtaca_autorizacion.cod_tipo_espacio, vtaca_autorizacion.num_nivel, vtaca_autorizacion.num_profundidad
			FROM vtaca_autorizacion 
			INNER JOIN vtama_tipo_autorizacion ON vtama_tipo_autorizacion.cod_tipo_autorizacion = vtaca_autorizacion.cod_tipo_autorizacion
			INNER JOIN vtama_tipo_documento ON vtama_tipo_documento.cod_tipo_documento = vtaca_autorizacion.cod_tipo_documento
			WHERE vtaca_autorizacion.cod_localidad = '".$datos['localidad']."' AND vtaca_autorizacion.cod_contrato = '".$datos['cod_contrato']."' AND vtaca_autorizacion.num_servicio = '".$datos['cod_servicio']."'"); 

		$tablaAutorizacion = "";
		$i=0;

		while($key = $db->recorrer($sql)){

	      	$dsc_tipo_autorizacion = "'".Utf8Encode($key['dsc_tipo_autorizacion'])."'";
	        $num_uso_servicio = "'".$key['num_uso_servicio']."'";
	        $cod_estado_autorizacion = "'".$key['cod_estado_autorizacion']."'";
	        if ($key['fch_servicio'] == NULL) {
	            $fch_servicio = "''";
	        }else{
	            $fch_servicio = "'".dateFormat($key['fch_servicio'])."'";
	        }
	        $dsc_apellido_paterno = "'".Utf8Encode($key['dsc_apellido_paterno'])."'";
	        $dsc_apellido_materno = "'".Utf8Encode($key['dsc_apellido_materno'])."'";
	        $dsc_nombres = "'".Utf8Encode($key['dsc_nombres'])."'";
	        $dsc_tipo_documento = "'".$key['dsc_tipo_documento']."'";
	        $dsc_documento = "'".$key['dsc_documento']."'";
	        if ($key['fch_nacimiento'] == NULL) {
	            $fch_nacimiento = "''";
	        }else{
	            $fch_nacimiento = "'".dateFormat($key['fch_nacimiento'])."'";
	        }
	        if ($key['fch_deceso'] == NULL) {
	            $fch_deceso = "''";
	        }else{
	            $fch_deceso = "'".dateFormat($key['fch_deceso'])."'";
	        }
	        $dsc_lugar_deceso = "'".Utf8Encode($key['dsc_lugar_deceso'])."'";
	        $dsc_camposanto = "'".Utf8Encode($key['dsc_camposanto'])."'";
	        $dsc_plataforma = "'".Utf8Encode($key['dsc_plataforma'])."'";
	        $dsc_area = "'".Utf8Encode($key['dsc_area'])."'";
	        $cod_eje_horizontal = "'".Utf8Encode($key['cod_eje_horizontal_esp'])."'";
	        $cod_eje_vertical = "'".$key['cod_eje_vertical_esp']."'";
	        $cod_espacio = "'".$key['cod_espacio']."'";
	        $cod_tipo_espacio = "'".$key['cod_tipo_espacio']."'";
	        $num_nivel = "'".$key['num_nivel']."'";
	        if ($key['num_profundidad'] == NULL) {
	            $num_profundidad = "''";
	        }else{
	            $num_profundidad = "'".number_format(round($key['num_profundidad'], 2),2,',','.')."'";
	        }
	        
	        $tablaAutorizacion .= '<tr onclick="mostrarAutorizacion(this,'.$dsc_tipo_autorizacion.','.$num_uso_servicio.','.$cod_estado_autorizacion.','.$fch_servicio.','.$dsc_apellido_paterno.','.$dsc_apellido_materno.','.$dsc_nombres.','.$dsc_tipo_documento.','.$dsc_documento.','.$fch_nacimiento.','.$fch_deceso.','.$dsc_lugar_deceso.','.$dsc_camposanto.','.$dsc_plataforma.','.$dsc_area.','.$cod_eje_horizontal.','.$cod_eje_vertical.','.$cod_espacio.','.$cod_tipo_espacio.','.$num_nivel.','.$num_profundidad.');">
										<td>'.($i+1).'</td>
										<td>'.dateFormat($key['fch_servicio']).'</td>
										<td>'.Utf8Encode($key['dsc_tipo_autorizacion']).'</td>
									</tr>';
		}
		$arrData = array('tablaAutorizacion'=> $tablaAutorizacion); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetBeneficiariosServ
	
	static public function mdlGetDeudasCliente($cod_cliente){

		$db = new Conexion();

		$sql = $db->consulta("SELECT DISTINCT vtade_contrato.cod_localidad, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad=vtade_contrato.cod_localidad) AS dsc_localidad, vtade_contrato.cod_contrato, vtade_contrato.fch_activacion, SUM(vtade_cronograma.imp_saldo) AS imp_deuda, COUNT(vtade_cronograma.num_cuota) AS ctd_cuota, vtade_contrato_servicio.cod_servicio_principal,(SELECT vtama_servicio.dsc_servicio FROM vtama_servicio WHERE vtama_servicio.cod_servicio=vtade_contrato_servicio.cod_servicio_principal) AS dsc_servicio_principal, vtade_contrato.num_servicio, SUM( CASE WHEN vtade_cronograma.fch_vencimiento <= GETDATE() THEN vtade_cronograma.imp_saldo ELSE 0.00 END ) AS imp_deuda_vencida, SUM( CASE WHEN vtade_cronograma.fch_vencimiento <= GETDATE() THEN 1 ELSE 0 END ) AS ctd_cuota_vencida

			FROM vtade_cronograma, vtade_contrato, vtavi_cronograma_x_servicio, vtade_contrato_servicio, vtama_localidad

			WHERE vtade_cronograma.cod_localidad = vtade_contrato.cod_localidad

			AND vtade_cronograma.cod_contrato = vtade_contrato.cod_contrato
			AND vtade_cronograma.num_refinanciamiento = vtavi_cronograma_x_servicio.num_refinanciamiento
			AND vtade_contrato.cod_localidad = vtavi_cronograma_x_servicio.cod_localidad
			AND vtade_contrato.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato
			AND vtade_contrato.num_servicio = vtavi_cronograma_x_servicio.num_servicio
			AND vtade_contrato.cod_localidad = vtade_contrato_servicio.cod_localidad
			AND vtade_contrato.cod_contrato = vtade_contrato_servicio.cod_contrato
			AND vtade_contrato.num_servicio = vtade_contrato_servicio.num_servicio
			AND vtade_contrato_servicio.flg_servicio_principal = 'SI'
			AND vtavi_cronograma_x_servicio.flg_activo = 'SI'
			AND vtavi_cronograma_x_servicio.flg_principal = 'SI'
			AND vtade_contrato.flg_fondo_mantenimiento = 'NO'
			AND vtade_contrato.flg_activado = 'SI'
			AND vtade_contrato.flg_emitido = 'SI'
			AND vtade_cronograma.cod_estadocuota IN ('REG', 'EMI')
			AND vtade_cronograma.imp_saldo >= 0.1
			AND vtade_contrato.cod_cliente = '$cod_cliente'

			GROUP BY vtade_contrato.cod_localidad, vtade_contrato.cod_contrato, vtade_contrato.fch_activacion, vtade_contrato_servicio.cod_servicio_principal,vtade_contrato.num_servicio

			ORDER BY vtade_contrato.cod_contrato"); 

		$tablaDeuda = "";
		$deuda_total_final = 0;
	    $deuda_vencida_final = 0;

		while($key = $db->recorrer($sql)){	      
	        
	        $localidad = Utf8Encode($key['dsc_localidad']);
	        $contrato = $key['cod_contrato'];
	        $nservicio = $key['num_servicio'];
	        $servicio = Utf8Encode($key['dsc_servicio_principal']);
	        $fec_act = dateFormat($key['fch_activacion']);
	        $deuda_total = $key['imp_deuda'];
	        $ctd_tot_cuotas = $key['ctd_cuota'];
	        $deuda_vencida = $key['imp_deuda_vencida'];
	        $ctd_cuotas_vencidas = $key['ctd_cuota_vencida'];
	        $deuda_total_final += $key['imp_deuda'];
	        $deuda_vencida_final += $deuda_vencida;

	        $tablaDeuda.= 
	                   '<tr>
	                        <td style="text-align: center;">
	                            '.$localidad.'
	                        </td>
	                        <td>
	                            '.$contrato.'
	                        </td>
	                        <td style="text-align: center;">
	                            '.$nservicio.'
	                        </td>
	                        <td style="text-align: center;">
	                            '.$servicio.'
	                        </td>
	                        <td style="text-align: center;">
	                            '.$fec_act.'
	                        </td>
	                        <td style="text-align: center;">
	                            '.number_format(round($deuda_total, 2),2,',','.').'
	                        </td>
	                        <td style="text-align: center;">
	                            '.$ctd_tot_cuotas.'
	                        </td>
	                        <td style="text-align: center;">
	                            '.number_format(round($deuda_vencida, 2),2,',','.').'
	                        </td>
	                        <td style="text-align: center;">
	                            '.$ctd_cuotas_vencidas.'
	                        </td>
	                  	</tr>';
		}
		$arrData = array('tablaDeuda' => $tablaDeuda, 'deuda_total' => number_format(round($deuda_total_final, 2),2,',','.'), 'deuda_vencida' => number_format(round($deuda_vencida_final, 2),2,',','.')); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDeudasCliente
	
	static public function mdlGetCancelacionPrincipal($localidad,$num_correlativo){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_caja_x_comprobante.cod_caja, vtavi_caja_x_comprobante.num_transaccion, (SELECT vtama_forma_pago.dsc_forma_pago FROM vtama_forma_pago WHERE vtama_forma_pago.cod_forma_pago = vtade_caja.cod_forma_pago) AS dsc_forma_pago, vtade_caja.num_documento, (SELECT vtaca_caja.fch_transaccion FROM vtaca_caja WHERE vtaca_caja.cod_caja = vtade_caja.cod_caja AND vtaca_caja.num_transaccion = vtade_caja.num_transaccion) AS fch_registro, (SELECT vtaca_caja.cod_usuario FROM vtaca_caja WHERE vtaca_caja.cod_caja = vtade_caja.cod_caja AND vtaca_caja.num_transaccion = vtade_caja.num_transaccion) AS cod_usuario, vtade_caja.cod_moneda, vtade_caja.imp_operacion, vtade_caja.imp_operacion_soles FROM vtavi_caja_x_comprobante INNER JOIN vtade_caja ON vtade_caja.num_transaccion = vtavi_caja_x_comprobante.num_transaccion AND vtade_caja.cod_caja = vtavi_caja_x_comprobante.cod_caja AND vtade_caja.num_linea = vtavi_caja_x_comprobante.num_linea WHERE vtavi_caja_x_comprobante.cod_localidad = '$localidad' AND vtavi_caja_x_comprobante.num_correlativo = '$num_correlativo'"); 

		$datos = array();
    	while($key = $db->recorrer($sql)){
			$key["fch_registro"] = ($key["fch_registro"] != '') ? dateTimeFormat($key["fch_registro"]) : '';
			$key["imp_operacion"] = number_format(round($key["imp_operacion"], 2),2,',','.');
			$key["imp_operacion_soles"] = number_format(round($key["imp_operacion_soles"], 2),2,',','.');
	    	$datos[] = arrayMapUtf8Encode($key);
		} 

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetBeneficiariosServ
	static public function mdlGetObservacionesCliente($cod_cliente){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtade_cliente_observacion.num_linea, vtade_cliente_observacion.fch_registro, vtade_cliente_observacion.cod_usuario, vtade_cliente_observacion.dsc_observacion, (SELECT vtama_tipo_calificacion.dsc_calificacion FROM vtama_tipo_calificacion WHERE vtama_tipo_calificacion.cod_calificacion = vtama_cliente.cod_calificacion) AS dsc_calificacion FROM vtade_cliente_observacion INNER JOIN vtama_cliente ON vtade_cliente_observacion.cod_cliente = vtama_cliente.cod_cliente WHERE vtade_cliente_observacion.cod_cliente = '$cod_cliente'"); 

		$tbodyObservaciones = "";

		while($key = $db->recorrer($sql)){
	        
	        $tbodyObservaciones .= '<tr>
										<td>'.$key['num_linea'].'</td>
										<td>'.dateFormat($key['fch_registro']).'</td>
										<td>'.Utf8Encode($key['cod_usuario']).'</td>
										<td>'.Utf8Encode($key['dsc_observacion']).'</td>
									</tr>';

			$calificacion = Utf8Encode($key['dsc_calificacion']);
		}
		$arrData = array('tbodyObservaciones'=> $tbodyObservaciones, 'calificacion' => $calificacion); 

		return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetBeneficiariosServ
	
	static public function mdlGetObservacionesContrato($localidad,$contrato,$servicio){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtade_observacion_x_contrato.num_linea, vtade_observacion_x_contrato.dsc_observacion, vtade_observacion_x_contrato.cod_usuario, vtade_observacion_x_contrato.fch_registro, vtade_observacion_x_contrato.flg_automatico FROM vtade_observacion_x_contrato WHERE vtade_observacion_x_contrato.cod_localidad = '$localidad' AND vtade_observacion_x_contrato.cod_contrato = '$contrato' AND vtade_observacion_x_contrato.num_servicio = '$servicio'"); 

		$datos = array();
    	while($key = $db->recorrer($sql)){
			$key["fch_registro"] = ($key["fch_registro"] != '') ? dateTimeFormat($key["fch_registro"]) : '';
	    	$datos[] = arrayMapUtf8Encode($key);
		} 

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetObservacionesContrato
	
	static public function mdlGetGestionCartera($localidad,$contrato,$num_servicio,$num_refinanciamiento){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtavi_contrato_x_cobrador.cod_anno , vtavi_contrato_x_cobrador.cod_periodo, vtama_tipo_cartera.dsc_tipo_cartera, (SELECT (SUBSTRING(rhuma_trabajador.dsc_nombres,1,1)+ '. ' + rhuma_trabajador.dsc_apellido_paterno) FROM rhuma_trabajador WHERE rhuma_trabajador.cod_trabajador = vtavi_contrato_x_cobrador.cod_trabajador) AS dsc_gestor, vtavi_contrato_x_cobrador.dsc_cuotas, vtavi_contrato_x_cobrador.imp_deuda, vtavi_contrato_x_cobrador.imp_cobrado FROM vtavi_contrato_x_cobrador INNER JOIN vtama_tipo_cartera ON vtama_tipo_cartera.cod_tipo_cartera = vtavi_contrato_x_cobrador.cod_tipo_cartera WHERE vtavi_contrato_x_cobrador.cod_localidad = '$localidad' AND vtavi_contrato_x_cobrador.cod_contrato = '$contrato' AND vtavi_contrato_x_cobrador.num_servicio = '$num_servicio' AND vtavi_contrato_x_cobrador.num_refinanciamiento = '$num_refinanciamiento'"); 

		$datos = array();
    	while($key = $db->recorrer($sql)){
	    	$datos[] = arrayMapUtf8Encode($key);
		} 

		return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetGestionCartera
}//class ModeloWizard
?>
