<?php

require_once "conexion.php";
require_once "../funciones.php";

class ModeloSegContrato{

	static public function mdlGetDatosCtt($cod_contrato){

		$db = new Conexion();

		$sql = $db->consulta("SELECT (SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.cod_localidad, (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtade_contrato.cod_localidad)AS dsc_localidad, vtade_contrato.cod_contrato, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.flg_ctt_modif FROM vtade_contrato WHERE vtade_contrato.cod_contrato LIKE '%' + '$cod_contrato' + '%' AND vtade_contrato.flg_cambio_titular = 'NO'");

		while($key = $db->recorrer($sql)){

	      $cliente = $key['dsc_cliente'];
	      $cod_localidad = $key['cod_localidad'];
	      $dsc_localidad = $key['dsc_localidad'];
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
		$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.imp_tasa_interes, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_contrato, vtade_contrato.num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, vtade_contrato.fch_generacion, vtade_contrato.fch_emision, vtade_contrato.fch_anulacion, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_transferencia, vtade_contrato.num_refinanciamiento FROM vtade_contrato WHERE vtade_contrato.cod_contrato LIKE '%' + '$cod_contrato' + '%'");

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
		$fecha = date('Y-m-d');
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

	        // $fchEntrada = new DateTime($key['fch_vencimiento']);

	        if ($fchVencimiento < $fecha) {
	        	$cronogramaCtt.='<tr style="color: red;">
	        						<td>'.$key['cod_tipo_cuota'].'</td>
		                            <td>'.$key["num_cuota"].'</td>
		                            <td>'.$key["cod_estadocuota"].'</td>
		                            <td>'.$fchVencimiento.'</td>
		                            <td>'.$fecha.'</td>
		                            <td>'.number_format(round($key["imp_principal"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_interes"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_igv"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_total"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_saldo"], 2),2,',','.').'</td>
		                            <td>'.number_format(round($key["imp_mora"], 2),2,',','.').'</td>
		                        </tr>'; 
	        }else{
	        	$cronogramaCtt.='<tr style="color: #0050CC;">
	        						<td>'.$key['cod_tipo_cuota'].'</td>
		                            <td>'.$key["num_cuota"].'</td>
		                            <td>'.$key["cod_estadocuota"].'</td>
		                            <td>'.$fchVencimiento.'</td>
		                            <td>'.$fecha.'</td>
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

	}//function mdlGetDatosCtt

	static public function ejecutaProcedureGeneraCtto($datos){
		$db = new Conexion();
		$sql = $db->consulta("EXEC usp_vta_prc_genera_contrato '".$datos['a_usuario']."', '".$datos['as_cliente']."', '".$datos['as_contrato_base']."', '".$datos['as_num_comprobante']."', '".$datos['as_contrato_reg']."', '".$datos['as_tipo_comprobante']."', '".$datos['as_localidad']."', '".$datos['as_tipo_recaudacion']."', '".$datos['as_localidad_base']."', '".$datos['as_servicio_base']."', '".$datos['as_tipo_ctt_base']."', '".$datos['as_camposanto']."', '".$datos['as_plataforma']."', '".$datos['as_area']."', '".$datos['as_eje_horizontal']."', '".$datos['as_eje_vertical']."', '".$datos['as_tipo_espacio']."', '".$datos['as_convenio']."', '".$datos['as_moneda']."', '".$datos['as_moneda_comprob']."', '".$datos['as_espacio']."', '".$datos['as_tipo_necesidad']."', '".$datos['adt_fch_emision']."', ".$datos['ade_imp_cuoi'].", ".$datos['ade_valor_igv'].", '".$datos['as_flg_nuevo']."', '".$datos['as_flg_comprobante']."', '".$datos['as_flg_modif']."', '".$datos['as_flg_regularizar']."', '".$datos['as_flg_ctt_x_tn']."', '".$datos['as_cod_empresa']."', '".$datos['as_tipo_programa_base']."', '".$datos['ai_nivel']."', '".$datos['as_flg_emitir_saldo']."', '".$datos['as_flg_integral']."', '".$datos['as_flg_cronograma_cuoi']."'");
		
		if($sql){
			while($key = $db->recorrer($sql)){
	    		$num_contrato = $key['num_contrato'];
	    		$num_servicio = $key['num_servicio'];
	    		$cod_tipo_ctt = $key['cod_tipo_ctt'];
	    		$cod_tipo_programa = $key['cod_tipo_programa'];
	    		$num_refinanciamiento = $key['num_refinanciamiento'];
	    		$cod_localidad = $key['cod_localidad'];

	    		$arrData = array('cod' => '1', 'num_contrato'=> $num_contrato, 'num_servicio'=>$num_servicio, 'cod_tipo_ctt'=>$cod_tipo_ctt, 'cod_tipo_programa'=> $cod_tipo_programa, 'num_refinanciamiento'=>$num_refinanciamiento, 'cod_localidad'=>$cod_localidad);
			}
			return $arrData;
		}else{
			$arrData = array('cod' => '0', 'msg'=> 'error al registrar contrato');
			return $arrData;
		}
		return $datos;
	}//function ejecutaProcedureGeneraCtto


	

}//class ModeloWizard
?>
