<?php 
require_once "../../modelo/conexion.php";

$cod = $_GET['value'];

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
AND vtade_contrato.cod_cliente = '$cod'

GROUP BY vtade_contrato.cod_localidad, vtade_contrato.cod_contrato, vtade_contrato.fch_activacion, vtade_contrato_servicio.cod_servicio_principal,vtade_contrato.num_servicio

ORDER BY vtade_contrato.cod_contrato");
$code = "1";
$tabla="";
$deuda_total_final = 0;
$deuda_vencida_final = 0;

 if ($rows = $db->rows($sql)) {
	$tabla.='
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="600">
                <div class="table-responsive">
                    <table id="myTableDeuda" class="table-responsive-m myTableDeuda table-bordered" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th width="80" style="border-radius: 25px 0px 0px 0px;">Localidad</th>
                          <th width="90">Contrato</th>
                          <th width="30">N° Serv.</th>
                          <th width="200">Servicio</th>
                          <th width="150">Fecha de Activación</th>
                          <th width="70">Deuda Total</th>
                          <th width="30">Ctd. Total Cuotas</th>
                          <th width="60">Deuda Vencida</th>
                          <th width="30" style="border-radius: 0px 25px 0px 0px;"">Ctd. Cuota(s) Vencida(s)</th>
                        </tr>
                      </thead>
                      <tbody>';
     
    while($key = $db->recorrer($sql)){
    	$datos[] =  $key;
    	$localidad = $key['dsc_localidad'];
        $contrato = $key['cod_contrato'];
        $nservicio = $key['num_servicio'];
        $servicio = $key['dsc_servicio_principal'];
        $fec_act = dateFormat($key['fch_activacion']);
        $deuda_total = $key['imp_deuda'];
        $ctd_tot_cuotas = $key['ctd_cuota'];
        $deuda_vencida = $key['imp_deuda_vencida'];
        $ctd_cuotas_vencidas = $key['ctd_cuota_vencida'];
        $deuda_total_final += $key['imp_deuda'];
        $deuda_vencida_final += $deuda_vencida;

        $tabla.= 
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

    $deuda_total_soles = "S/. ".number_format($deuda_total_final,2,',','.');
    $tabla.= ' 		</tbody>
    				</tfoot>
    					<tr>
    						<td></td>
    						<td></td>
    						<td></td>
    						<td></td>
    						<td class="text-red">Deuda Total ---></td>
    						<td class="text-red">
    						'.number_format($deuda_total_final,2,',','.').'
    						</td>
    						<td></td>
    						<td class="text-red">
    						'.number_format(round($deuda_vencida_final, 2),2,',','.').'
    						</td>
    						<td></td>
    					</tr>
            </table>
          </div>
       </div>';

    $db->liberar($sql);
	$db->cerrar();
	$arrData = array('cod'=> $code, 'tabla'=>$tabla, 'deudaTotal'=>$deuda_total_soles);
	echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
}else{
	$code = "0";
	$msg = "";
	$arrData = array('cod'=> $code);
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
}


 ?>