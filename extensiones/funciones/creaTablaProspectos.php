<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$fechaInicio = $_POST['fechaInicio'];
$fechaFin =  $_POST['fechaFin'];
$estado = $_POST['estado'];
$calificacion = $_POST['calificacion'];
$tipoDoc = $_POST['tipoDoc'];
$numDoc = $_POST['numDoc'];
$supervisor = $_POST['supervisor'];
$consejero = $_POST['consejero'];
$flg_jf_ventas = "NO";
$flg_supervisor = "NO";
$flg_admin = "SI";
$cod_usuario = "TR0005";
$num_dias = "60";

$tabla = "";

$db = new Conexion();

$sql = $db->consulta("
    SELECT  vtaca_prospecto_venta.cod_prospecto,   
            vtaca_prospecto_venta.dsc_prospecto,   

            (
                SELECT  vtama_tipo_documento.dsc_tipo_documento
                FROM        vtama_tipo_documento
                WHERE   vtama_tipo_documento.cod_tipo_documento = vtaca_prospecto_venta.cod_tipo_documento
            )
            AS dsc_tipo_documento,

            vtaca_prospecto_venta.dsc_documento,   
            vtaca_prospecto_venta.dsc_telefono_1,   

            (
                SELECT  vtama_canal_venta.dsc_canal_venta
                FROM        vtama_canal_venta
                WHERE   vtama_canal_venta.cod_canal_venta = vtaca_prospecto_venta.cod_origen
            )
            AS dsc_canal_venta,

            (
                SELECT  vtama_calificacion_prospecto.dsc_calificacion
                FROM        vtama_calificacion_prospecto
                WHERE   vtama_calificacion_prospecto.cod_calificacion = vtaca_prospecto_venta.cod_calificacion
            )
            AS dsc_calificacion,
            
            (
                SELECT  LEFT(rhuma_trabajador.dsc_nombres, 1) + '.' + rhuma_trabajador.dsc_apellido_paterno
                FROM        rhuma_trabajador
                WHERE   rhuma_trabajador.cod_trabajador = vtaca_prospecto_venta.cod_consejero
            )
            AS dsc_trabajador,

            ( CASE vtaca_prospecto_venta.cod_estado     WHEN 'ACT' THEN 'ACTIVO'
                                                        WHEN 'VTA' THEN 'CIERRE'
                                                        WHEN 'TRU' THEN 'TRUNCO'
                                                        WHEN 'CAD' THEN 'CADUCO' END ) AS dsc_estado,

            vtaca_prospecto_venta.fch_registro,

            '$num_dias' - DATEDIFF(DD, vtaca_prospecto_venta.fch_registro, CONVERT(DATE, GETDATE())) AS num_dias,
            
            (
                SELECT  MAX(vtade_prospecto_venta.fch_contacto)
                FROM        vtade_prospecto_venta
                WHERE   vtade_prospecto_venta.cod_prospecto = vtaca_prospecto_venta.cod_prospecto
            )
            AS fch_ultimo_contacto,

            (
                SELECT  TOP 1 vtade_prospecto_venta.dsc_observaciones
                FROM        vtade_prospecto_venta
                WHERE   vtade_prospecto_venta.cod_prospecto = vtaca_prospecto_venta.cod_prospecto
                ORDER BY vtade_prospecto_venta.fch_contacto DESC 
            )
            AS dsc_ultima_observacion,

            vtaca_prospecto_venta.imp_monto

FROM    vtaca_prospecto_venta 

-- // filtros de ventana 
  
WHERE   vtaca_prospecto_venta.cod_tipo_documento LIKE '%' + '$tipoDoc' + '%'
AND     vtaca_prospecto_venta.dsc_documento LIKE '%' + '$numDoc' + '%'
AND     vtaca_prospecto_venta.cod_calificacion LIKE '%' + '$calificacion' + '%'
AND     vtaca_prospecto_venta.cod_consejero LIKE '%' + '$consejero' + '%'
AND     ISNULL(vtaca_prospecto_venta.cod_supervisor, '') LIKE '%' + '$supervisor' + '%'
AND     vtaca_prospecto_venta.cod_estado LIKE '%' + '$estado' + '%'
AND     CONVERT(DATE, vtaca_prospecto_venta.fch_registro) >= CONVERT(DATE,'$fechaInicio',105)
AND     CONVERT(DATE, vtaca_prospecto_venta.fch_registro) <= CONVERT(DATE,'$fechaFin',105)

-- // filtros de instancia

AND     ( CASE WHEN '$flg_jf_ventas' = 'SI' THEN

                (
                    SELECT  COUNT(1)
                    FROM        vtama_periodo,
                                vtama_historico_vendedor
                    WHERE   vtama_historico_vendedor.num_anno = vtama_periodo.num_anno
                    AND     vtama_historico_vendedor.cod_tipo_periodo = vtama_periodo.cod_tipo_periodo
                    AND     vtama_historico_vendedor.cod_periodo = vtama_periodo.cod_periodo
                    AND     vtama_historico_vendedor.cod_trabajador = vtaca_prospecto_venta.cod_consejero
                    AND     vtama_historico_vendedor.cod_jefeventas = '$cod_usuario'
                    AND     vtama_periodo.fch_inicio <= CONVERT(DATE, GETDATE())
                    AND     vtama_periodo.fch_fin >= CONVERT(DATE, GETDATE())
                )

            WHEN '$flg_supervisor' = 'SI' THEN

                (
                    SELECT  COUNT(1)
                    FROM        vtama_periodo,
                                vtama_historico_vendedor
                    WHERE   vtama_historico_vendedor.num_anno = vtama_periodo.num_anno
                    AND     vtama_historico_vendedor.cod_tipo_periodo = vtama_periodo.cod_tipo_periodo
                    AND     vtama_historico_vendedor.cod_periodo = vtama_periodo.cod_periodo
                    AND     vtama_historico_vendedor.cod_trabajador = vtaca_prospecto_venta.cod_consejero
                    AND     vtama_historico_vendedor.cod_supervisor = '$cod_usuario'
                    AND     vtama_periodo.fch_inicio <= CONVERT(DATE, GETDATE())
                    AND     vtama_periodo.fch_fin >= CONVERT(DATE, GETDATE())
                )

            WHEN '$flg_admin' = 'SI' THEN 1

            WHEN '$cod_usuario' <> 'XX' THEN

                (
                    SELECT  COUNT(1)
                    FROM        vtama_periodo,
                                vtama_historico_vendedor
                    WHERE   vtama_historico_vendedor.num_anno = vtama_periodo.num_anno
                    AND     vtama_historico_vendedor.cod_tipo_periodo = vtama_periodo.cod_tipo_periodo
                    AND     vtama_historico_vendedor.cod_periodo = vtama_periodo.cod_periodo
                    AND     vtama_historico_vendedor.cod_trabajador = vtaca_prospecto_venta.cod_consejero
                    AND     vtama_historico_vendedor.cod_trabajador = '$cod_usuario'
                    AND     vtama_periodo.fch_inicio <= CONVERT(DATE, GETDATE())
                    AND     vtama_periodo.fch_fin >= CONVERT(DATE, GETDATE())
                )

            ELSE 1 END ) > 0");


	$tabla.='<div class="table-responsive">
    <table id="tablaProspectos" class="table table-responsive-m table-bordered mytableContrato" cellpadding="0" cellspacing="0" border="0" display="block" >
	                    	<thead class="m-datatable__head">
	                    		<th>Fecha Registro</th>
                                <th>Días</th>
	                    		<th>Codigo</th>
	                    		<th>Prospecto</th>
	                    		<th>Tipo Doc.</th>
	                    		<th>Núm. Doc.</th>
	                    		<th>Télefono</th>
	                    		<th>Canal Venta</th>
	                    		<th>Calif.</th>
	                    		<th>Consejero</th>
                                <th>Estado</th>
                                <th>Ultimo Contacto</th>
                                <th>Observación</th>
                                <th>Importe</th>
	                    	</thead>
	                    	<tbody>';

	 while($key = $db->recorrer($sql)){
        // -------- Condicional para campos NULL de fch_registro -------- //
        if ($key['fch_registro'] == NULL) {
            $fchRegistro = "-";
        }else{
            $fchRegistro = dateFormat($key['fch_registro']);
        }
        // -------- Condicional para campos NULL de fch_ultimo_contacto -------- //
        if ($key['fch_ultimo_contacto'] == NULL) {
            $fchUltimoContacto = "-";
        }else{
            $fchUltimoContacto = dateFormat($key['fch_ultimo_contacto']);
        }

        if ($key['imp_monto'] == NULL) {
            $imp_venta = "S/ 0,00";
        }else{
            $imp_venta = "S/ ".number_format(round($key['imp_monto'], 2),2,',','.');
        }

        $codPro = "'".$key['cod_prospecto']."'";
        $dscPro = "'".utf8_encode($key['dsc_prospecto'])."'";
        $tDoc = "'".$key['dsc_tipo_documento']."'";
        $nDoc = "'".$key['dsc_documento']."'";
        $tel = "'".$key['dsc_telefono_1']."'";
        $cven = "'".$key['dsc_canal_venta']."'";
        $cons = "'".utf8_encode($key['dsc_trabajador'])."'";
        $etd = "'".$key['dsc_estado']."'";
        $ultCon = "'".$fchUltimoContacto."'";
        $imp = "'".$imp_venta."'";
        $fchReg = "'".$fchRegistro."'";
        $dias = "'".$key['num_dias']."'";
        $obsr = "'".$key['dsc_ultima_observacion']."'";
        
        $tabla.= 
                   '<tr>
                        <td>
                            '.$fchRegistro.'
                        </td>
                        <td>
                            '.$key['num_dias'].'
                        </td>
                        <td>
                            <div id="m_quick_sidebar-contrato_toggle" class="m-nav__item">
                                <a href="#" class="m-nav__link m-dropdown__toggle" onclick="mostrarSidebar('.$codPro.','.$dscPro.','.$tDoc.','.$nDoc.','.$tel.','.$cven.','.$cons.','.$etd.','.$ultCon.','.$imp.','.$fchReg.','.$dias.','.$obsr.');">
                                   <span class="m-nav__link-icon">'.$key['cod_prospecto'].'</span>
                                </a>
                            </div>
                        </td>
                        <td>
                            '.utf8_encode($key['dsc_prospecto']).'
                        </td>
                        <td>
                            '.$key['dsc_tipo_documento'].'
                        </td>
                        <td>
                            '.$key['dsc_documento'].'
                        </td>
                        <td>
                            '.$key['dsc_telefono_1'].'
                        </td>
                        <td>
                            '.$key['dsc_canal_venta'].'
                        </td>
                        <td>
                            '.$key['dsc_calificacion'].'
                        </td>
                        <td>
                            '.utf8_encode($key['dsc_trabajador']).'
                        </td>
                        <td>
                            '.$key['dsc_estado'].'
                        </td>
                        <td>
                            '.$fchUltimoContacto.'
                        </td>
                        <td>
                            '.$key['dsc_ultima_observacion'].'
                        </td>
                        <td>
                            '.$imp_venta.'
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