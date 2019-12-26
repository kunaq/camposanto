<?php 
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

$numfila = $_POST['fila'];
$codVendedor = $_POST['vendedor'];


$tabla = "";

// $db = new Conexion();


function listarCalificacion(){
    $db = new Conexion();
    $optionC = "";
    $sql2 = $db->consulta("SELECT cod_calificacion, dsc_calificacion FROM vtama_calificacion_prospecto");

    while($key2 = $db->recorrer($sql2)){
            $optionC .= '<option value="'.$key2['cod_calificacion'].'">'.$key2['dsc_calificacion'].'</option>';
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

        
        $tabla.='<tr id="'.$numfila.'" onclick="verDetalles(event)" class="'.$numfila.'">
                    <td class="'.$numfila.'">
                        '.$numfila.'
                    </td>
                    <td class="'.$numfila.'">
                        '.date('d/m/Y',strtotime(date('m/d/Y'))).'
                    </td>
                    <td class="'.$numfila.'">
                        <input type="hidden" value="insert" id="tipo-'.$numfila.'"/>
                        <select class="form-control form-control-sm" id="calificacion-'.$numfila.'">
                        '.listarCalificacion().'
                        </select>
                    </td>
                    <td class="'.$numfila.'">
                        <span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
                            <label>
                                <input type="checkbox" name="" id="cierre-'.$numfila.'">
                                <span></span>
                            </label>
                        </span>
                    </td>
                    <td class="'.$numfila.'">
                        <select class="form-control form-control-sm" id="consejero-'.$numfila.'">
                        '.listarTrabajadores($codVendedor).'
                        </select>
                    </td>
                    <td class="'.$numfila.'">
                        <select class="form-control form-control-sm" style="width: 200px;" id="indicador-'.$numfila.'">
                            <option value="1">Primera</option>
                            <option value="2">Segunda</option>
                        </select>
                    </td>
                    <td class="'.$numfila.'">
                        <textarea class="form-control form-control-sm m-input" rows="1" style="width: 400px;" id="observacion-'.$numfila.'"></textarea>
                    </td>
                </tr>';              
    	
    	// $db->liberar($sql);
		// $db->cerrar();
		echo $tabla;

 ?>