<?php
require_once "../../modelo/conexion.php";
$db = new Conexion();

//--------------Seleciona los servicios------------------------//

	$sql = $db->consulta('SELECT distinct TOP (800) vtaca_autorizacion.fch_servicio, vtaca_autorizacion.dsc_beneficiario_lapida, vtaca_autorizacion.dsc_nombres, vtaca_autorizacion.dsc_apellido_paterno,vtaca_autorizacion.dsc_apellido_materno, vtaca_autorizacion.cod_tipo_documento, vtaca_autorizacion.dsc_documento, vtaca_autorizacion.cod_plataforma_esp, vtaca_autorizacion.cod_eje_horizontal_esp, vtaca_autorizacion.cod_eje_vertical_esp, vtaca_autorizacion.cod_espacio, vtaca_autorizacion.num_nivel, vtaca_autorizacion.cod_contrato , vtama_tipo_autorizacion.dsc_tipo_autorizacion, vtama_tipo_autorizacion.num_color, vtama_tipo_autorizacion.dsc_prefijo, vtaca_autorizacion.dsc_sacerdote, vtaca_autorizacion.dsc_cantante, vtaca_autorizacion.dsc_motivo_conmemoracion, vtama_plataforma.dsc_plataforma, vtama_area_plataforma.dsc_area FROM vtaca_autorizacion INNER JOIN vtama_tipo_autorizacion ON vtaca_autorizacion.cod_tipo_autorizacion = vtama_tipo_autorizacion.cod_tipo_autorizacion LEFT JOIN vtama_plataforma ON vtama_plataforma.cod_plataforma = vtaca_autorizacion.cod_plataforma_esp LEFT JOIN vtama_area_plataforma ON vtama_area_plataforma.cod_area_plataforma = vtaca_autorizacion.cod_area_esp ORDER BY vtaca_autorizacion.fch_servicio desc');

  $eventos = array(); 
	$datos = array();
	while($key = $db->recorrer($sql)){
            $datos[] =  $key;

            $date = date('Y-m-d H:i:s',strtotime($key['fch_servicio']));//->format('Y-m-d H:i:s');
            $fecha = date('d-m-Y', strtotime($key['fch_servicio']));//->format('d-m-Y');
            $hora = date('H:i', strtotime($key['fch_servicio']));//->format('H:i');
            
            //--------------------tipo de documento----------------------------//

            if($key['cod_tipo_documento'] == 'DI001'){
                $tipoDoc = 'DNI';
            }
            elseif ($key['cod_tipo_documento'] == 'DI002') {
                $tipoDoc = 'CARNET EXTRANJERIA';
            }
            elseif ($key['cod_tipo_documento'] == 'DI003') {
                $tipoDoc = 'PASAPORTE';
            }
            elseif ($key['cod_tipo_documento'] == 'DI004') {
                $tipoDoc = 'RUC';
            }
            elseif ($key['cod_tipo_documento'] == 'DI005') {
                $tipoDoc = 'OTROS';
            }
            else{
                $tipoDoc = 'LIBERTA ELECTORAL';
            }

            //------------------validar vacio---------------------------------//

            if(!$key['cod_plataforma_esp'] || $key['cod_plataforma_esp'] == NULL){
              $plat = 'N/A';
              $area = 'N/A';
              $ejex = 'N/A';
              $ejey = 'N/A';
              $espc = 'N/A';
              $nivel = 'N/A';
            }
            else{
              $plat = $key['dsc_plataforma'];
              $area = $key['dsc_area'];
              $ejex = $key['cod_eje_horizontal_esp'];
              $ejey = $key['cod_eje_vertical_esp'];
              $espc = $key['cod_espacio'];
              $nivel = $key['num_nivel'];
            }

            if(!$key['dsc_beneficiario_lapida'] || $key['dsc_beneficiario_lapida'] == NULL){
              $nombres = $key['dsc_apellido_paterno'].' '.$key['dsc_apellido_materno'].', '.$key['dsc_nombres'];
            }
            else{
              $nombres = $key['dsc_beneficiario_lapida'];
            }

            //--------------------------------datos para modal-------------------------------//


            $ctto = $key['cod_contrato'];

            $titulo1 = $key['dsc_prefijo'].'-'.$key['dsc_nombres'].' '.$key['dsc_apellido_paterno'];
            $titulo1 = utf8_encode($titulo1);

            $titulo2 = '<b>'.$key['dsc_prefijo']." - ".$key['dsc_tipo_autorizacion'].'</b>';
            $titulo2 = utf8_encode($titulo2);

            if($key['dsc_prefijo'] == 'MI' || $key['dsc_prefijo'] == 'ME'){

              $description = '<table class="table">
                                  <tr>
                                    <td style="text-align: left;"><b>Fecha:</b></td>
                                    <td style="text-align: left;">'.$fecha.'</td>
                                    <td><b>Hora:</b></td>
                                    <td>'.$hora.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Nombre:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$nombres.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>DNI:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$tipoDoc."-".$key['dsc_documento'].'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Sacerdote:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$key['dsc_sacerdote'].'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Cantante:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$key['dsc_cantante'].'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Motivo:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$key['dsc_motivo_conmemoracion'].'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Contrato:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$ctto.'</td>
                                  </tr>
                                  </table>';
            }
            else{
                $description = '<table class="table">
                                  <tr>
                                    <td style="text-align: left;"><b>Fecha:</b></td>
                                    <td style="text-align: left;">'.$fecha.'</td>
                                    <td><b>Hora:</b></td>
                                    <td>'.$hora.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Nombre:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$nombres.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>DNI:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$tipoDoc."-".$key['dsc_documento'].'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Plataforma:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$plat.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Área de plataforma:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$area.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Eje horizontal:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$ejex.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Eje vertical:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$ejey.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Espacio:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$espc.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Nivel:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$nivel.'</td>
                                  </tr>
                                  <tr>
                                    <td style="text-align: left;"><b>Contrato:</b></td>
                                    <td style="text-align: left;" colspan = "3">'.$ctto.'</td>
                                  </tr>
                                  </table>';
              
            }
            $description = utf8_encode($description);
            //---------------------------arreglo para event fullcalendar-----------------//

             $eventos[] = array('id' => '', 'title' => $titulo1, 'titulo2' => $titulo2, 'description' => $description , 'start' => $date, 'allDay' => false, 'color' => $key['num_color'], 'textColor' => '#f8f9fa');
        }

       $arrayJson = json_encode($eventos, JSON_UNESCAPED_UNICODE);
       //var_dump($arrayJson);
       print_r($arrayJson);

?>