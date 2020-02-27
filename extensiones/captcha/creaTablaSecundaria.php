<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";

$cod = 'A01';
$plat = '01';
$camps = 'CA001';
$ejeX = 'A';
$ejeY = '01';

$mapa = "";




$db = new Conexion();                                             

$sql1 = $db->consulta("SELECT DISTINCT num_columna FROM vtaca_espacio WHERE cod_camposanto = '$camps' AND cod_plataforma = '$plat' AND cod_area_plataforma = '$cod'");

$sql2 = $db->consulta("SELECT DISTINCT num_fila FROM vtaca_espacio WHERE cod_camposanto = '$camps' AND cod_plataforma = '$plat' AND cod_area_plataforma = '$cod'");

$mapa.= '<div class="table-responsive">
          <table cellpadding="0" cellspacing="0" border="1" display="block">';

// $datos = array();

while($key = $db->recorrer($sql1)){
  $datos[] =  $key['num_columna'];
}
$mapa.= '<tbody>';

 // print_r($datos);
 // var_dump($dat);

while($key2 = $db->recorrer($sql2)){
  $mapa .= '<tr>';
    foreach ($datos as $cod_eje_vertical => $valor) {
      $mapa.='<td style="background-color: #3DB231;" onclick="mostrarDetallesEspacio();"><p>'.$key2['num_fila'].'-'. $valor .'</p></td>';
    }
  $mapa .= '</tr>';
}

$mapa.= '</tbody>
        </table>
      </div>';

    $db->liberar($sql1);
    $db->liberar($sql2);
 		$db->cerrar();  

    echo $mapa;
?>