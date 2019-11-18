<?php
require_once "../../modelo/conexion.php";

$cod = $_GET['value'];
$plat = $_GET['plat'];
$camps = $_GET['campo'];

$mapa = "";

$db = new Conexion();                                             

$sql1 = $db->consulta("SELECT distinct cod_eje_vertical  FROM vtaca_espacio where cod_camposanto = '$camps' and cod_plataforma = '$plat' and cod_area_plataforma = '$cod'");

$sql2 = $db->consulta("SELECT distinct cod_eje_horizontal FROM vtaca_espacio where cod_camposanto = '$camps' and cod_plataforma = '$plat' and cod_area_plataforma = '$cod'");

$mapa.= '<div class="table-responsive">
    <table id="tablaEspacios" class="tablaEspacios" cellpadding="0" cellspacing="0" border="1" display="block">
                        <thead class="m-datatable__head">
                        <th style="width: 20px;"></th>';

// $datos = array();

while($key = $db->recorrer($sql1)){
  $mapa .= '<th>'. $key['cod_eje_vertical'] .'</th>';
  $datos[] =  $key['cod_eje_vertical'];
}
$mapa.= '</thead>
         <tbody>';

 // print_r($datos);
 // var_dump($dat);

while($key2 = $db->recorrer($sql2)){
  $mapa .= '<tr>
              <th scope="row">'. $key2['cod_eje_horizontal'] .'</th>';
      foreach ($datos as $cod_eje_vertical => $valor) {
        $mapa.='<td style="background-color: #3DB231;" onclick="mostrarDetallesEspacio();"><p>'.$key2['cod_eje_horizontal'].'-'. $valor .'</p></td>';
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