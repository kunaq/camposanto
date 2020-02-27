<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$numContrato = $_POST['numContrato'];
$codServicio = $_POST['codServicio'];

$arrData = "";


$db = new Conexion();

$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.cod_tipo_necesidad,vtade_contrato.num_servicio, vtade_contrato.cod_contrato,(SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.fch_emision, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_anulacion,
(SELECT rhuma_trabajador.dsc_nombres + ' ' + rhuma_trabajador.dsc_apellido_paterno FROM rhuma_trabajador WHERE rhuma_trabajador.cod_trabajador = vtade_contrato.cod_vendedor) AS dsc_vendedor, vtade_contrato.cod_tipo_servicio,
(SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio) AS dsc_tipo_servicio,
vtade_contrato.num_cuotas, vtade_contrato.imp_tasa_interes, vtade_contrato.fch_primer_vencimiento, vtade_contrato.imp_totalneto, vtade_contrato.cod_localidad,vtade_contrato.flg_activado,
vtade_contrato.flg_resuelto, vtade_contrato.flg_anulado, vtade_contrato.cod_tipo_ctt, ( CASE WHEN vtade_contrato.cod_tipo_programa = 'TR000' THEN 'CONTRATO DE SERVICIOS' ELSE
(SELECT vtama_tipo_recaudacion.dsc_tipo_recaudacion FROM vtama_tipo_recaudacion WHERE vtama_tipo_recaudacion.cod_tipo_recaudacion = vtade_contrato.cod_tipo_programa)
END) AS dsc_tipo_programa
FROM vtade_contrato
WHERE vtade_contrato.cod_contrato = '$numContrato'
AND vtade_contrato.num_servicio = '$codServicio'
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
                AND     vtama_tipo_servicio.flg_sadicional= 'NO')");

$buttons = "";
$actions = "";

while($key = $db->recorrer($sql)){
        $ttipoNec = $key['cod_tipo_necesidad'];
        // $ttipoPro = $key['dsc_tipo_programa'];
        $numContrato = $key['cod_contrato'];
        $codServicio= $key['num_servicio'];
        $cliente = utf8_encode($key['dsc_cliente']);
        // -------- Condicional para campos NULL de fch_generacion -------- //
        // if ($key['fch_generacion'] == NULL) {
        //     $tfechGen = "-";
        // }else{
        //     $tfechGen = date('d-m-Y', $key['fch_generacion']->getTimestamp());
        // }
        // -------- Condicional para campos NULL de fch_emision -------- //
        if ($key['fch_emision'] == NULL) {
            $fechEmi = "-";
        }else{
            $fechEmi = dateFormat($key['fch_emision']);
        }
        // -------- Condicional para campos NULL de fch_activacion -------- //
        if ($key['fch_activacion'] == NULL) {
            $fechAct = "-";
        }else{
            $fechAct = dateFormat($key['fch_activacion']);
        }
        // -------- Condicional para campos NULL de fch_resolución -------- //
        if ($key['fch_resolucion'] == NULL) {
            $fechRes = "-";
        }else{
            $fechRes = dateFormat($key['fch_resolucion']);
        }
        // -------- Condicional para campos NULL de fch_anulacion -------- //
        if ($key['fch_anulacion'] == NULL) {
            $fechAnu = "-";
        }else{
            $fechAnu = dateFormat($key['fch_anulacion']);
        }

        $vendedor = utf8_encode($key['dsc_vendedor']);
        $tipoServ = utf8_encode($key['dsc_tipo_servicio']);
        $numCuotas = $key['num_cuotas'];
        $tasainteres = $key['imp_tasa_interes'];
        $actLoc = "'".$key['cod_localidad']."'";
        $actCtt = "'".$key['cod_contrato']."'";
        $actSrv = "'".$key['num_servicio']."'";

        // -------- Condicional para campos NULL de fch_primer_vencimiento -------- //
        if ($key['fch_primer_vencimiento'] == NULL) {
            $tprimerVen = "no tiene";
        }else{
            $tprimerVen = dateFormat($key['fch_primer_vencimiento']);
        }

        $total = number_format(round($key['imp_totalneto'], 2),2,',','.');

        if ($key["flg_activado"] == "SI") {
            $buttons .= '<a href="seguimientoContrato?localidad='.$key['cod_localidad'].'&contrato='.$numContrato.'" target="_blank"><button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Seguimiento" onclick="">
                            <i class="la la-eye"></i>
                        </button></a>';
        }else{
            $buttons .= '<a href="modificacionContrato?localidad='.$key['cod_localidad'].'&contrato='.$numContrato.'" target="_blank"><button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Modificar" onclick="">
                            <i class="la la-edit"></i>
                        </button></a>';
        }

        if ($key["flg_resuelto"] == "SI") {
            $buttons .= '<button type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Resuelto" data-original-title="Resuelto" style="border: 1px solid #FF0000;" disabled="" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                            <i style="color: #FF0000;" class="fa fa-file-excel-o"></i>
                        </button>';
        }else{
            $buttons .= '<a href="resolucionContrato?localidad='.$key['cod_localidad'].'&contrato='.$numContrato.'" target="_blank"><button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-container="body" data-placement="top" title="Resolver" data-original-title="Resolver" onclick="">
                            <i class="fa fa-file-excel-o"></i>
                        </button></a>';
        }

        $buttons .= '<span data-toggle="modal" data-target="#m_modal_print_contrato">
                            <button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Imprimir" onclick="">
                                <i class="fa fa-print"></i>
                            </button>
                        </span>';

        if ($key['cod_tipo_servicio'] == 'TS001' || $key['cod_tipo_servicio'] == 'TS007' || $key['cod_tipo_servicio'] == 'TS008') {
            if ($key["flg_activado"] == "SI") {
                $buttons .= '<button type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Activado" data-original-title="Activado" style="border: 1px solid #3db231;" disabled="" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill">
                                <i style="color: #3DB231;" class="fa fa-check"></i>
                            </button>';
            }else if ($key["flg_resuelto"] == "SI" || $key["flg_anulado"] == "SI") {
                $buttons .= '';
            }else{
                $buttons .= '<button type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Activar" data-original-title="Activar" onclick="validarContrato('.$actLoc.','.$actCtt.','.$actSrv.')">
                                <i class="fa fa-check"></i>
                            </button>';
            }
        }else{
            $buttons .= '';
        }


        $actions .= '<a href="refinanciamiento?localidad='.$key['cod_localidad'].'&contrato='.$numContrato.'" target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Refinanciamiento" onclick="">
                        <i class="fa fa-balance-scale"></i>
                     </a>
                    <a href="cambioTitular?localidad='.$key['cod_localidad'].'&contrato='.$numContrato.'" target="_blank" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="m-tooltip" data-container="body" data-placement="top" title="Cambio Titular" onclick="">
                        <i class="fa fa-users"></i>
                    </a>';

        $arrData = array('num_contrato'=> $numContrato, 'cod_servicio'=> $codServicio, 'dsc_cliente'=> $cliente, 'tipo_necesidad'=> $ttipoNec, 'fch_emision'=> $fechEmi, 'fch_activacion'=> $fechAct, 'fch_resolucion'=> $fechRes, 'fch_anulacion'=> $fechAnu, 'dsc_vendedor'=> $vendedor, 'tipo_servicio'=>$tipoServ, 'num_cuotas'=> $numCuotas, 'tasa_interes'=> $tasainteres, 'total'=>$total, 'buttons'=> $buttons, 'actions' => $actions);
    }

    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    $db->liberar($sql);
    $db->cerrar(); 