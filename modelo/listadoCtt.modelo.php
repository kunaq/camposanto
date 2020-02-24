<?php
require_once "conexion.php";
require_once "../funciones.php";

class ModeloListadoCtt{

	static public function mdlValidaContrato($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.cod_contrato, vtade_contrato.num_servicio, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_cliente, vtade_contrato.cod_vendedor, vtade_contrato.flg_agencia, vtade_contrato.cod_agencia, vtade_contrato.num_refinanciamiento, vtade_contrato.flg_anulado, vtade_contrato.flg_resuelto
FROM vtade_contrato WHERE vtade_contrato.cod_localidad = '".$datos['cod_localidad']."' AND vtade_contrato.cod_contrato = '".$datos['cod_contrato']."' AND vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		$sql2 = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo FROM vtama_periodo WHERE fch_inicio<GETDATE() AND fch_fin>GETDATE()");

		while($key = $db->recorrer($sql)){
		    $localidad = $key['cod_localidad'];
		    $contrato = $key['cod_contrato'];
		    $servicio = $key['num_servicio'];
		    $refinanciamiento = $key['num_refinanciamiento'];
		    $programa = $key['cod_tipo_programa'];
		    $tipo_ctt = $key['cod_tipo_ctt'];
		    $cliente = $key['cod_cliente'];
		    $vendedor = $key['cod_vendedor'];
		    $flg_agencia = $key['flg_agencia'];
		    $agencia = $key['cod_agencia'];
		    $flg_resuelto = $key['flg_resuelto'];
		    $flg_anulado = $key['flg_anulado'];
		}

		while($key2 = $db->recorrer($sql2)){
		    $num_anno = $key2['num_anno'];
		    $cod_tipo_periodo = $key2['cod_tipo_periodo'];
		    $cod_periodo = $key2['cod_periodo'];
		}

		if ($vendedor == NULL || $vendedor == '') {
			$respuesta = array('error' => 1);
			return $respuesta;
		}elseif ($flg_agencia == 'SI') {
			if ($agencia == NULL || $agencia == '') {
				$respuesta = array('error' => 2);
				return $respuesta;
			}
		}elseif ($flg_resuelto == 'SI') {
			$respuesta = array('error' => 3);
			return $respuesta;
		}elseif ($flg_anulado == 'SI') {
			$respuesta = array('error' => 4);
			return $respuesta;
		}else{
			$sql3 = $db->consulta("SELECT  COUNT(1) AS estado_periodo
								FROM                   vtama_periodo
								WHERE vtama_periodo.num_anno = '$num_anno'
								AND                      vtama_periodo.cod_tipo_periodo = '$cod_tipo_periodo'
								AND                      vtama_periodo.cod_periodo = '$cod_periodo'
								AND                      vtama_periodo.flg_estado = 'CE'");
			while($key3 = $db->recorrer($sql3)){
			    $estado_periodo = $key3['estado_periodo'];
			    if (is_null($estado_periodo)) {
			    	$estado_periodo = 0;
			    }
			}

			if ($estado_periodo > 0 ) {
				$respuesta = array('error' => 5, 'num_anno' => $num_anno, 'cod_tipo_periodo' => $cod_tipo_periodo, 'cod_periodo' => $cod_periodo);
				return $respuesta;
			}else{
				$sql4 = $db->consulta("SELECT  COUNT(1) AS estado_vendedor_periodo
									FROM                   vtama_historico_vendedor
									WHERE vtama_historico_vendedor.cod_trabajador = '$vendedor'
									AND                      vtama_historico_vendedor.num_anno = '$num_anno'
									AND                      vtama_historico_vendedor.cod_tipo_periodo = '$cod_tipo_periodo'
									AND                      vtama_historico_vendedor.cod_periodo = '$cod_periodo'");
				while($key4 = $db->recorrer($sql4)){
				    $estado_vendedor_periodo = $key4['estado_vendedor_periodo'];
				    if (is_null($estado_vendedor_periodo)) {
				    	$estado_vendedor_periodo = 0;
				    }
				}
				if ($estado_vendedor_periodo < 1 ) {
					$respuesta = array('error' => 6, 'cod_vendedor' => $vendedor, 'num_anno' => $num_anno, 'cod_tipo_periodo' => $cod_tipo_periodo, 'cod_periodo' => $cod_periodo);
					return $respuesta;
				}else{

					// $sql5 = $db->consulta("SELECT  COUNT(1) AS cuota_cancelada
					// 					FROM                   vtade_cronograma
					// 					WHERE vtade_cronograma.cod_localidad = '$localidad'
					// 					AND                      vtade_cronograma.cod_tipo_ctt = '$tipo_ctt'
					// 					AND                      vtade_cronograma.cod_tipo_programa = '$programa'
					// 					AND                      vtade_cronograma.cod_contrato = '$contrato'
					// 					AND                      vtade_cronograma.num_refinanciamiento = '$refinanciamiento'
					// 					AND                      vtade_cronograma.cod_tipo_cuota = 'CUI'
					// 					AND                      vtade_cronograma.cod_estadocuota IN ('EMI', 'REG')
					// 					AND                      ISNULL(vtade_cronograma.imp_saldo, 0.00) > 0.01");

					// while($key5 = $db->recorrer($sql5)){
					//     $cuota_cancelada = $key5['cuota_cancelada'];
					//     if (is_null($cuota_cancelada)) {
					//     	$cuota_cancelada = 0;
					//     }
					// }
					// if ($cuota_cancelada > 0) {
					// 	$respuesta = array('error' => 7);
					// 	return $respuesta;
					// }
					// else{
						$respuesta = array('error' => 0, 'cod_localidad' => $localidad, 'cod_contrato' => $contrato, 'num_servicio' => $servicio, 'cod_tipo_ctt' => $tipo_ctt, 'cod_tipo_programa' => $programa, 'num_anno' =>$num_anno, 'cod_tipo_periodo' => $cod_tipo_periodo, 'cod_periodo' => $cod_periodo);
						return $respuesta;
					// }
				}
			}
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaProspecto
	
	static public function mdlActivaContrato($datos){
		$db = new Conexion();

		$sql = $db->consulta("UPDATE               vtade_contrato
                SET                        vtade_contrato.fch_activacion = ( CASE WHEN vtade_contrato.fch_activacion IS NULL THEN '".$datos['fch_actual']."' ELSE vtade_contrato.fch_activacion END ),
                                                               vtade_contrato.flg_activado = 'SI',
                                                               vtade_contrato.cod_usuario_activacion = '".$datos['usuario']."',
                                                               vtade_contrato.num_anno_recep = '".$datos['num_anno']."',
                                                               vtade_contrato.cod_tipo_periodo_recep = '".$datos['cod_tipo_periodo']."',
                                                               vtade_contrato.cod_periodo_recep = '".$datos['cod_periodo']."',
                                                               vtade_contrato.cod_empresa = '".$datos['empresa']."'
                WHERE vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
                AND                      vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
                AND                      vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
                AND                      vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
                AND                      vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		if ($sql) {
			$sql2 = $db->consulta("SELECT  vtade_contrato.num_servicio_foma
                FROM                   vtade_contrato
                WHERE vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
                AND                      vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
                AND                      vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
                AND                      vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
                AND                      vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

			while($key2 = $db->recorrer($sql2)){
				$num_servicio_foma = $key2['num_servicio_foma'];
			}
			if (!is_null($num_servicio_foma) && trim($num_servicio_foma) != "") {
				$sql3 = $db->consulta("UPDATE 	vtade_contrato
                               SET    vtade_contrato.fch_activacion = ( CASE WHEN vtade_contrato.fch_activacion IS NULL THEN '".$datos['fch_actual']."' ELSE vtade_contrato.fch_activacion END ),
                                      vtade_contrato.flg_activado = 'SI',
                                       vtade_contrato.cod_usuario_activacion = '".$datos['usuario']."',
                                       vtade_contrato.num_anno_recep = '".$datos['num_anno']."',
                                       vtade_contrato.cod_tipo_periodo_recep = '".$datos['cod_tipo_periodo']."',
                                       vtade_contrato.cod_periodo_recep = '".$datos['cod_periodo']."',
                                       vtade_contrato.cod_empresa = '".$datos['empresa']."'
                               WHERE vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
                               AND                      vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
                               AND                      vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
                               AND                      vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
                               AND                      vtade_contrato.num_servicio = '$num_servicio_foma'");
				if ($sql3) {
					return 1;
				}else{
					return 0;
				}
			}else{
				return 1;
			}
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaContactoProspecto

}//class ModeloListadoCtt
?>