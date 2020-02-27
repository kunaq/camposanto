<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$codProspecto = $_POST['cod'];


$tabla = "";

$db = new Conexion();


function listarCalificacion($cal){
    $db = new Conexion();
    $optionC = "";
    $sql2 = $db->consulta("SELECT cod_calificacion, dsc_calificacion FROM vtama_calificacion_prospecto");

    while($key2 = $db->recorrer($sql2)){
        if ($key2['cod_calificacion'] == $cal) {
            $optionC .= '<option value="'.$key2['cod_calificacion'].'" selected>'.$key2['dsc_calificacion'].'</option>';
        }else{
            $optionC .= '<option value="'.$key2['cod_calificacion'].'">'.$key2['dsc_calificacion'].'</option>';
        }
    }
    return $optionC;
}

function listarTrabajadores($cod){
    $db = new Conexion();
    $optionT = "";
    $sql3 = $db->consulta("SELECT cod_trabajador, LEFT(rhuma_trabajador.dsc_nombres, 1) + '.  ' + rhuma_trabajador.dsc_apellido_paterno AS dsc_trabajador FROM rhuma_trabajador ORDER BY dsc_nombres ASC");

    while($key3 = $db->recorrer($sql3)){
        if ($key3['cod_trabajador'] == $cod) {
            $optionT .= '<option value="'.$key3['cod_trabajador'].'" selected>'.utf8_encode($key3['dsc_trabajador']).'</option>';
        }else{
            $optionT .= '<option value="'.$key3['cod_trabajador'].'">'.utf8_encode($key3['dsc_trabajador']).'</option>';
        }
    }
    return $optionT;
}

$sql = $db->consulta("SELECT cod_prospecto, num_linea, fch_contacto, cod_calificacion, flg_presentacion, cod_consejero, flg_indicador, dsc_observaciones FROM vtade_prospecto_venta WHERE cod_prospecto = '$codProspecto';");


	 while($key = $db->recorrer($sql)){
        $codPro = $key['cod_prospecto'];
        $linea = $key['num_linea'];
        // -------- Condicional para campos NULL de fch_contacto -------- //
        if ($key['fch_contacto'] == NULL) {
            $fchContacto = "-";
        }else{
            // $fchContacto = "-";
            $fchContacto = dateFormat($key['fch_contacto']);
        }
        $calificacion = $key['cod_calificacion'];
        $presentacion = $key['flg_presentacion'];
        $consejero = utf8_encode($key['cod_consejero']);
        $indicador = $key['flg_indicador'];
        $observaciones = $key['dsc_observaciones'];
        
        $tabla.='<tr id="'.$linea.'" onclick="verDetalles(event)" class="'.$linea.'">
                    <td class="'.$linea.'">
                        '.$linea.'
                    </td>
                    <td class="'.$linea.'">
                        '.$fchContacto.'
                    </td>
                    <td class="'.$linea.'">
                        <input type="hidden" value="update" id="tipo-'.$linea.'"/>
                        <select class="form-control form-control-sm" id="calificacion-'.$linea.'">
                        '.listarCalificacion($calificacion).'
                        </select>
                    </td>
                    <td class="'.$linea.'">';

                    if ($presentacion == "SI") {
                        $tabla .= '<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
                            <label>
                                <input type="checkbox" checked="checked" id="cierre-'.$linea.'">
                                <span></span>
                            </label>
                        </span>';
                    }elseif ($presentacion == "NO") {
                        $tabla .= '<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
                            <label>
                                <input type="checkbox" id="cierre-'.$linea.'">
                                <span></span>
                            </label>
                        </span>';
                    }

        $tabla .=  '</td>
                    <td class="'.$linea.'">
                        <select class="form-control form-control-sm" id="consejero-'.$linea.'">
                        '.listarTrabajadores($consejero).'
                        </select>
                    </td>
                    <td class="'.$linea.'">';

                    if ($indicador == "1") {
                        $tabla .= '<select class="form-control form-control-sm" style="width: 200px;" id="indicador-'.$linea.'">
                            <option value="1" selected>Primera</option>
                            <option value="2">Segunda</option>
                        </select>';
                    }elseif ($indicador == "2") {
                        $tabla .= '<select class="form-control form-control-sm" style="width: 200px;" id="indicador-'.$linea.'">
                            <option value="1">Primera</option>
                            <option value="2" selected>Segunda</option>
                        </select>';
                    }
                        
        $tabla .='</td>
                    <td class="'.$linea.'">
                        <textarea class="form-control form-control-sm m-input" rows="1" style="width: 400px;" id="observacion-'.$linea.'" onkeyup="mayus(this);">'.$observaciones.'</textarea>
                    </td>
                </tr>';              
	 }
    	
    	$db->liberar($sql);
		$db->cerrar();
		echo $tabla;

 ?>