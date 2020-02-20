<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$tipoFecha = $_POST['tipoFecha'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin =  $_POST['fechaFin'];
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
AND ( CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion,105)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision,105)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion,105) END ) >= CONVERT(DATE,'$fechaInicio',105)
AND (CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion,105)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision,105)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion,105) END ) <= CONVERT(DATE,'$fechaFin',105)");


	$tabla.='
                <div class="table-responsive">
    <table id="mytableContrato" class="table table-responsive-m table-bordered mytableContrato" cellpadding="0" cellspacing="0" border="0" display="block" >
	                    	<thead class="m-datatable__head">
	                    		<th>Contrato</th>
                                <th>Cod. Ser</th>
	                    		<th class="tdlisCliCon">Cliente</th>
                                <th class="tdTipNecCon">T.N.</th>
	                    		<th>Fecha Emisión</th>
	                    		<th>Fecha Activación</th>
	                    		<th>Fecha Resolución</th>
	                    		<th>Fecha Anulación</th>
	                    		<th>Vendedor</th>
	                    		<th style="min-width: 80px;">Tipo Servicio</th>
	                    		<th>N° Cuotas</th>
	                    		<th>Total</th>
	                    	</thead>
	                    	<tbody>';

	 while($key = $db->recorrer($sql)){
	 	// $tlocalidad = $key['dsc_localidad'];
        $ttipoNec = $key['cod_tipo_necesidad'];
        // $ttipoPro = $key['dsc_tipo_programa'];
        $tnumContrato = $key['cod_contrato'];
        $auxNumCtt = "'".$tnumContrato."'";
        $tcodServicio= $key['num_servicio'];
        $tcliente = utf8_encode($key['dsc_cliente']);
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

        $tvendedor = utf8_encode($key['dsc_vendedor']);
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
                        <div id="m_quick_sidebar-contrato_toggle" class="m-nav__item">
                            <a href="#" class="m-nav__link m-dropdown__toggle" onclick="mostrarSidebar('.$auxNumCtt.','.$tcodServicio.');">
                                <span class="m-nav__link-icon">'.$tnumContrato.'</span>
                            </a>
                        </div>
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
                    </tr>';              
	 }

		$tabla.= '</tbody>
            	</table>
          	</div>';
    	
    	$db->liberar($sql);
		$db->cerrar();
		echo $tabla;

 ?>