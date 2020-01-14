<?php

require_once "conexion.php";
require_once "../funciones.php";

class ModeloSegContrato{

	static public function mdlGetDatosCtt($cod_contrato){

		$db = new Conexion();

		$sql = $db->consulta("SELECT TOP 1 (SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.cod_localidad, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtade_contrato.cod_localidad)AS dsc_localidad, vtade_contrato.cod_contrato, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.flg_ctt_modif FROM vtade_contrato WHERE vtade_contrato.cod_contrato LIKE '%' + '$cod_contrato' + '%' AND vtade_contrato.flg_cambio_titular = 'NO'");

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

	}//function mdlGetDatosCtt

	static public function mdlgetServiciosCtt($cod_contrato){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.imp_tasa_interes, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_contrato, vtade_contrato.num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, vtade_contrato.fch_generacion, vtade_contrato.fch_emision, vtade_contrato.fch_anulacion, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_transferencia, vtade_contrato.num_refinanciamiento FROM vtade_contrato WHERE vtade_contrato.cod_contrato LIKE '%' + '$cod_contrato' + '%' ORDER BY num_servicio ASC");

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
	        $codLocalidad = $key['cod_localidad'];
	        $localidad = "'".$key['cod_localidad']."'";
	        $tasaInt = "'".$key['imp_tasa_interes']."'";
	        $codTipoCtt = $key['cod_tipo_ctt'];
	        $tipoContrato = "'".$key['cod_tipo_ctt']."'";
	        $tipoPrograma = "'".$key['cod_tipo_programa']."'";
	        $numRef = "'".$key['num_refinanciamiento']."'";
	        $numServ = "'".$key['num_servicio']."'";

	        $tablaServicios.= 
	                   '<tr onclick="getDatosServicioCtt(this,'.$localidad.','.$tasaInt.','.$tipoContrato.','.$tipoPrograma.','.$numCtt.','.$numRef.','.$numServ.');">
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
	}//function mdlgetServiciosCtt

	static public function mdlGetCuotas($datos){

		$cronogramaCtt = "";
		$total = 0;
		$totalSaldo = 0;
		$totalMora = 0;
		$tasa = 0.12;
		$fechactual = new DateTime;
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

	        $fchEntrada = new DateTime($key['fch_vencimiento']);

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
	        }elseif ($fchEntrada > $fechactual) {
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

	}//function mdlEjecutaProcedureResumenCtt

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
	            $fch_nacimiento = "-";
	        }else{
	            $fch_nacimiento = "'".dateFormat($key['fch_nacimiento'])."'";
	        }
	        $parentesco = "'".$key['cod_parentesco']."'";
	        $peso = "'".$key['num_peso']."'";
	        $talla = "'".$key['num_talla']."'";
	        $religion = "'".$key['cod_religion']."'";
	        $observacion = "'".Utf8Encode($key['dsc_observacion'])."'";
	        if ($key['fch_deceso'] == NULL) {
	            $fch_deceso = "-";
	        }else{
	            $fch_deceso = "'".dateFormat($key['fch_deceso'])."'";
	        }
	        if ($key['fch_entierro'] == NULL) {
	            $fch_entierro = "-";
	        }else{
	            $fch_entierro = "'".dateFormat($key['fch_entierro'])."'";
	        }
	        $lugar_deceso = "'".$key['cod_lugar_deceso']."'";
	        $motivo_deceso = "'".$key['cod_motivo_deceso']."'";
	        $nivel = "'".$key['num_nivel']."'";
	        $flg_autopsia = "'".$key['flg_autopsia']."'";

	        $tablaBeneficiarios .= '<tr onclick="mostrarBeneficiario(this,'.$cod_servicio.','.$tipo_doc.','.$num_doc.','.$ape_paterno.','.$ape_materno.','.$nombre.','.$sexo.','.$edo_civil.','.$fch_nacimiento.','.$parentesco.','.$peso.','.$talla.','.$religion.','.$observacion.','.$fch_deceso.','.$fch_entierro.','.$lugar_deceso.','.$motivo_deceso.','.$nivel.','.$flg_autopsia.');">
										<th scope="row">
										'.$key['num_nivel'].'
										</th>
										<td>
										'.Utf8Encode($key['dsc_nombre']).'
										</td>
										<td>
										'.Utf8Encode($key['dsc_apellidopaterno']).' '.Utf8Encode($key['dsc_apellidomaterno']).'
										</td>
									</tr>';
		}
		$arrData = array('tablaBeneficiarios'=> $tablaBeneficiarios); 

		return $arrData;

	}//function mdlGetDatosCtt

}//class ModeloWizard
?>
