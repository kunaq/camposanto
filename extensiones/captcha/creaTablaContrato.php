<?php 
require_once "../../modelo/conexion.php";

$tipoFecha = $_GET['tipoFecha'];
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];
$codCliente = $_GET['codCliente'];
$localidad = $_GET['localidad'];
$saldo = $_GET['saldo'];
$numCom = $_GET['numCom'];
$tipoNec = $_GET['tipoNec'];
$tipoServ = $_GET['tipoServ'];
$table = "";

$db = new Conexion();

$sql = $db->consulta("SELECT (SELECT vtama_localidad.dsc_localidad FROM vtama_localidad WHERE vtama_localidad.cod_localidad = vtade_contrato.cod_localidad) AS dsc_localidad,
vtade_contrato.cod_tipo_necesidad, vtade_contrato.cod_contrato,(SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente,
vtade_contrato.fch_generacion, vtade_contrato.fch_emision, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_anulacion,
(SELECT rhuma_trabajador.dsc_apellido_paterno + ' ' + SUBSTRING(rhuma_trabajador.dsc_apellido_materno, 1, 1) + '. ' + rhuma_trabajador.dsc_nombres FROM rhuma_trabajador WHERE rhuma_trabajador.cod_trabajador = vtade_contrato.cod_vendedor) AS dsc_vendedor,
(SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio) AS dsc_tipo_servicio,
vtade_contrato.num_cuotas, vtade_contrato.imp_tasa_interes, vtade_contrato.fch_primer_vencimiento, vtade_contrato.imp_totalneto, vtade_contrato.cod_localidad,
vtade_contrato.flg_resuelto, vtade_contrato.flg_anulado, vtade_contrato.cod_tipo_ctt, ( CASE WHEN vtade_contrato.cod_tipo_programa = 'TR000' THEN 'CONTRATO DE SERVICIOS' ELSE
(SELECT vtama_tipo_recaudacion.dsc_tipo_recaudacion FROM vtama_tipo_recaudacion WHERE vtama_tipo_recaudacion.cod_tipo_recaudacion = vtade_contrato.cod_tipo_programa)
END) AS dsc_tipo_programa
FROM vtade_contrato
WHERE vtade_contrato.cod_localidad LIKE '$localidad'
AND vtade_contrato.cod_contrato LIKE '%' + '$numCon' + '%'
AND vtade_contrato.cod_cliente LIKE $codCliente
AND vtade_contrato.cod_tipo_necesidad LIKE '$tipoNec'
AND vtade_contrato.cod_tipo_servicio LIKE '$tipoServ'
AND vtade_contrato.flg_fondo_mantenimiento = 'NO'
AND ( CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion) END ) >= '$fechaInicio'
AND (CASE '$tipoFecha' WHEN 'GEN' THEN CONVERT(DATE, vtade_contrato.fch_generacion)
WHEN 'EMI' THEN CONVERT(DATE, vtade_contrato.fch_emision)
WHEN 'ACT' THEN CONVERT(DATE, vtade_contrato.fch_activacion) END ) <= '$fechaFin'");

if ($db->row($sql) > 0) {
	$table.='<table id="tablaContrato" class="table table-responsive-m table-bordered" cellpadding="0" cellspacing="0" border="0" display="block" >
	                    	<thead>
	                    		<th>Localidad</th>
	                    		<th>TipoNec</th>
	                    		<th>Tipo de Programa</th>
	                    		<th>Contrato</th>
	                    		<th>Cliente</th>
	                    		<th>Fecha Generación</th>
	                    		<th>Fecha Emisión</th>
	                    		<th>Fecha Activación</th>
	                    		<th>Fecha Resolución</th>
	                    		<th>Fecha Anulación</th>
	                    		<th>Vendedor</th>
	                    		<th>Tipo Servicio</th>
	                    		<th>N° Cuotas</th>
	                    		<th>Tasa Interes</th>
	                    		<th>Fecha de Primer Vencimiento</th>
	                    		<th>Total</th>
	                    		<th>Con Saldo</th>
	                    		<th>R</th>
	                    	</thead>
	                    	<tbody>';
	 while($key = $db->recorrer($sql)){
	 	$tlocalidad = $key['dsc_localidad'];
        $ttipoNec = $key['cod_tipo_necesidad'];
        $ttipoPro = $key['dsc_tipo_programa'];
        $tnumCon = $key['cod_contrato'];
        $tcliente = $key['dsc_cliente'];
        $tfechGen = date('d-m-Y', $key['fch_generacion']->getTimestamp());
        $tfechEmi = date('d-m-Y', $key['fch_emision']->getTimestamp());
        $tfechAct = date('d-m-Y', $key['fch_activacions']->getTimestamp());
        $tfechRes = date('d-m-Y', $key['fch_resolucion']->getTimestamp());
        $tfechAnu = date('d-m-Y', $key['fch_anulacion']->getTimestamp());
        $tvendedor = $key['dsc_vendedor'];
        $ttipoServ = $key['dsc_tipo_servicio'];
        $tnumCuotas = $key['num_cuotas'];
        $ttasainteres = $key['imp_tasa_interes'];
        $tprimerVen = $key['fch_primer_vencimiento'];
        $ttotal = $key['imp_totalneto'];
        $tR = $key['flg_resuelto'];


        $tabla.= 
                   '<tr>
                        <td>
                            '.$tlocalidad.'
                        </td>
                        <td>
                            '.$ttipoNec.'
                        </td>
                        <td>
                            '.$ttipoPro.'
                        </td>
                        <td>
                            '.$tnumCon.'
                        </td>
                        <td>
                            '.$tcliente.'
                        </td>
                        <td>
                            '.$tfechGen.'
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
                            '.$ttasainteres.'
                        </td>
                        <td>
                            '.$tprimerVen.'
                        </td>
                        <td>
                            '.$ttotal.'
                        </td>
                        <td>
                            '.$tR.'
                        </td>
                        <td>
                            '.$tR.'
                        </td>
                    </tr>';
                    
	 }

		$tabla.= ' 	</tbody>
            	</table>
          	</div>
       	</div>';
    	
    	$db->liberar($sql);
		$db->cerrar();
		echo $tabla;
}
 ?>