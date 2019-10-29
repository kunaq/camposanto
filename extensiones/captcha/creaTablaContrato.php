<?php 
require_once "../../modelo/conexion.php";

$tipoFecha = $_POST['tipoFecha'];
$fechaInicio = date($_POST['fechaInicio']);
$fechaFin =  date($_POST['fechaFin']);
$codCliente = $_POST['codCliente'];
$localidad = $_POST['localidad'];
$saldo = $_POST['saldo'];
$numContrato = $_POST['numContrato'];
$tipoNec = $_POST['tipoNec'];
$tipoServ = $_POST['tipoServ'];
$tabla = "";

$db = new Conexion();

$sql = $db->consulta("SELECT vtade_contrato.cod_tipo_necesidad,vtade_contrato.num_servicio, vtade_contrato.cod_contrato,(SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.fch_emision, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_anulacion,
(SELECT SUBSTRING(rhuma_trabajador.dsc_nombres, 1, 1) + '. ' + rhuma_trabajador.dsc_apellido_paterno FROM rhuma_trabajador WHERE rhuma_trabajador.cod_trabajador = vtade_contrato.cod_vendedor) AS dsc_vendedor,
(SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio) AS dsc_tipo_servicio,
vtade_contrato.num_cuotas, vtade_contrato.imp_tasa_interes, vtade_contrato.fch_primer_vencimiento, vtade_contrato.imp_totalneto, vtade_contrato.cod_localidad,
vtade_contrato.flg_resuelto, vtade_contrato.flg_anulado, vtade_contrato.cod_tipo_ctt, ( CASE WHEN vtade_contrato.cod_tipo_programa = 'TR000' THEN 'CONTRATO DE SERVICIOS' ELSE
(SELECT vtama_tipo_recaudacion.dsc_tipo_recaudacion FROM vtama_tipo_recaudacion WHERE vtama_tipo_recaudacion.cod_tipo_recaudacion = vtade_contrato.cod_tipo_programa)
END) AS dsc_tipo_programa
FROM vtade_contrato
WHERE vtade_contrato.cod_localidad LIKE '%' + '$localidad' + '%'
AND vtade_contrato.cod_contrato LIKE '%' + '$numContrato' + '%'
AND vtade_contrato.cod_cliente LIKE '%' + '$codCliente' + '%'
AND vtade_contrato.cod_tipo_necesidad LIKE '%' + '$tipoNec' + '%'
AND vtade_contrato.cod_tipo_servicio LIKE '%' + '$tipoServ' + '%'
AND vtade_contrato.flg_fondo_mantenimiento = 'NO'
AND EXISTS
            (
                SELECT  1
                FROM    vtade_contrato_servicio
                INNER JOIN vtama_servicio ON vtama_servicio.cod_servicio = vtade_contrato_servicio.cod_servicio
                INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
                WHERE   vtade_contrato.cod_localidad = vtade_contrato_servicio.cod_localidad
                AND     vtade_contrato.cod_tipo_ctt = vtade_contrato_servicio.cod_tipo_ctt
                AND     vtade_contrato.cod_tipo_programa = vtade_contrato_servicio.cod_tipo_programa
                AND     vtade_contrato.cod_contrato = vtade_contrato_servicio.cod_contrato
                AND     vtade_contrato.num_servicio = vtade_contrato_servicio.num_servicio
                AND     vtama_tipo_servicio.flg_foma='NO'
                AND     vtama_tipo_servicio.flg_cambio_titular= 'NO'
                AND     vtama_tipo_servicio.flg_sadicional= 'NO'
            )
AND ( CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion) END ) >= '$fechaInicio'
AND (CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion) END ) <= '$fechaFin'");


	$tabla.='<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="600">
                <div class="table-responsive">
    <table id="mytableContrato" class="table table-responsive-m table-bordered mytableContrato" cellpadding="0" cellspacing="0" border="0" display="block" >
	                    	<thead>
	                    		<th>Contrato</th>
                                <th>Cod. Ser</th>
	                    		<th class="tdlisCliCon">Cliente</th>
                                <th class="tdTipNecCon">T.N.</th>
	                    		<th>Fch. Emisión</th>
	                    		<th>Fch. Activación</th>
	                    		<th>Fch. Resolución</th>
	                    		<th>Fch. Anulación</th>
	                    		<th>Vendedor</th>
	                    		<th>Tipo Servicio</th>
	                    		<th>N° Cuotas</th>
	                    		<th>Total</th>
                                <th>Acciones</th>
	                    	</thead>
	                    	<tbody>';

	 while($key = $db->recorrer($sql)){
	 	// $tlocalidad = $key['dsc_localidad'];
        $ttipoNec = $key['cod_tipo_necesidad'];
        // $ttipoPro = $key['dsc_tipo_programa'];
        $tnumContrato = $key['cod_contrato'];
        $tcodServicio= $key['num_servicio'];
        $tcliente = $key['dsc_cliente'];
        // -------- Condicional para campos NULL de fch_generacion -------- //
        // if ($key['fch_generacion'] == NULL) {
        //     $tfechGen = "-";
        // }else{
        //     $tfechGen = date('d-m-Y', $key['fch_generacion']->getTimestamp());
        // }
        // -------- Condicional para campos NULL de fch_emision -------- //
        if ($key['fch_emision'] == NULL) {
            $tfechEmi = "-";
        }else{
            $tfechEmi = date('d-m-Y', $key['fch_emision']->getTimestamp());
        }
        // -------- Condicional para campos NULL de fch_activacion -------- //
        if ($key['fch_activacion'] == NULL) {
            $tfechAct = "-";
        }else{
            $tfechAct = date('d-m-Y', $key['fch_activacion']->getTimestamp());
        }
        // -------- Condicional para campos NULL de fch_resolución -------- //
        if ($key['fch_resolucion'] == NULL) {
            $tfechRes = "-";
        }else{
            $tfechRes = date('d-m-Y', $key['fch_resolucion']->getTimestamp());
        }
        // -------- Condicional para campos NULL de fch_anulacion -------- //
        if ($key['fch_anulacion'] == NULL) {
            $tfechAnu = "-";
        }else{
            $tfechAnu = date('d-m-Y', $key['fch_anulacion']->getTimestamp());
        }

        $tvendedor = $key['dsc_vendedor'];
        $ttipoServ = $key['dsc_tipo_servicio'];
        $tnumCuotas = $key['num_cuotas'];
        // $ttasainteres = $key['imp_tasa_interes'];

        // -------- Condicional para campos NULL de fch_primer_vencimiento -------- //
        // if ($key['fch_primer_vencimiento'] == NULL) {
        //     $tprimerVen = "no tiene";
        // }else{
        //     $tprimerVen = date('d-m-Y', $key['fch_primer_vencimiento']->getTimestamp());
        // }
        
        $ttotal = $key['imp_totalneto'];
        // $tR = $key['flg_resuelto'];

        $tabla.= 
                   '<tr>
                        <td>
                            '.$tnumContrato.'
                        </td>
                        <td>
                            '.$tcodServicio.'
                        </td>
                        <td>
                            '.$tcliente.'
                        </td>
                        <td>
                            '.$ttipoNec.'
                        </td>
                        <td>
                            '.$tfechEmi.'
                        </td>
                        <td>
                            '.$tfechAct.'
                        </td>
                        <td>
                            '.$tfechRes.'
                        </td>
                        <td>
                            '.$tfechAnu.'
                        </td>
                        <td>
                            '.$tvendedor.'
                        </td>
                        <td>
                            '.$ttipoServ.'
                        </td>
                        <td>
                            '.$tnumCuotas.'
                        </td>
                        <td>
                            '.number_format(round($ttotal, 2),2,',','.').'
                        </td>
                        <td style="display: inline-flex;">
                            <span data-toggle="modal" data-target="#m_modal_contrato">
                                <button type="button" class="m-btn btn btn-warning" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Editar" onclick="">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </span>
                            <span data-toggle="modal" data-target="#m_modal_contrato">
                                <button type="button" class="m-btn btn btn-success" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Activación" onclick="">
                                    <i class="fa fa-check"></i>
                                </button>
                            </span>
                            <span data-toggle="modal" data-target="#m_modal_resolucion">
                                <button type="button" class="m-btn btn btn-danger" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Resolución" onclick="">
                                    <i class="fa fa-file-excel-o"></i>
                                </button>
                            </span>
                            <span data-toggle="modal" data-target="#m_modal_contrato">
                                <button type="button" class="m-btn btn btn-info" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Imprimir" onclick="">
                                    <i class="fa fa-print"></i>
                                </button>
                            </span>
                        </td>
                    </tr>';              
	 }

		$tabla.= '</tbody>
            	</table>
          	</div>
       	</div>';
    	
    	$db->liberar($sql);
		$db->cerrar();
		echo $tabla;

 ?>