<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['cod_dscto'];
   $nombre = $_GET['nombre'];
   $ls_flg_libre = $_GET['libre'];
   $ls_flg_periodo = $_GET['carencia'];
   $total = $_GET['total_servicio'];
   $fecha = date("Y-m-d");
   //var_dump($cod);
    $cod1='"'.$cod.'"';
    if($ls_flg_libre == 'SI'){
      $checkL = 'checked';
      $checkP = '';
      $dis = '';
    }
    else{
      $checkP = 'checked';
      $checkL = '';
      $dis = 'disabled';
    } 
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT  vtade_tipo_descuento.imp_valor, vtade_tipo_descuento.flg_tasa
         FROM vtade_tipo_descuento WHERE vtade_tipo_descuento.cod_tipo_descuento = '$cod' 
         AND  vtade_tipo_descuento.fch_inicio <= GETDATE()
         AND  vtade_tipo_descuento.fch_fin >= GETDATE()");
        echo "SELECT  vtade_tipo_descuento.imp_valor, vtade_tipo_descuento.flg_tasa
         FROM vtade_tipo_descuento WHERE vtade_tipo_descuento.cod_tipo_descuento = '$cod' 
         AND  vtade_tipo_descuento.fch_inicio <= GETDATE()
         AND  vtade_tipo_descuento.fch_fin >= GETDATE()";
       // var_dump($db->recorrer($sql));
        $datos = array();
        if(($key = $db->recorrer($sql)) != NULL){ 
                $datos[] =  $key; 
                if($key['imp_valor'] == '' || $key['imp_valor'] == NULL) {
                  $lde_importe  = 0;
                } 
                else{
                  $lde_importe = floatval($key['imp_valor']);
                }
                if ($key['flg_tasa'] == '' || $key['flg_tasa'] == NULL) {
                    $ls_flg_porcentaje = 'NO';
                }
                else{
                  $ls_flg_porcentaje = $key['flg_tasa']; 
                }                          
                if($ls_flg_porcentaje == 'SI'){
                  $dscto_final = ($total*$lde_importe)/100;
                  $vista = "<div class='input-group-append'>
                            <span class='input-group-text' id='basic-addon1'>
                              %
                            </span>
                          </div>";
                  $checkLib = '';
                  $checkPor = "<i class='fa fa-check'></i>";
                }
                else{
                  $dscto_final = $lde_importe;
                  $vista = '';
                  $checkLib = "<i class='fa fa-check'></i>";
                  $checkPor = "";
                }
              echo "<tr height='50' name='".$cod."' id='".$cod."' >
                      <td class='tdDsctoCod'>
                        ".$cod."
                        <input type='hidden' value=".$cod." id='cod_tipo_descuento_".$cod."'>
                        <input type='hidden' value='NO' id='flg_modif_contrato_".$cod."'>
                        <input type='hidden' value='NO' id='flg_convenio_".$cod."'>
                        <input type='hidden' value='".$ls_flg_periodo."' id='flg_periodo_carencia_".$cod."'>
                        <input type='hidden' value='".$ls_flg_porcentaje."' id='ls_flg_porcentaje_".$cod."'>
                      </td>
                      <td class='tdDsctoDsc'>
                        ".$nombre."
                      </td>
                      <td class='tdDsctoMon'>
                        <select class='form-control m-input' name='cod_moneda' id='cod_moneda' disabled style='padding-right:1rem;'>
                          <option value='SOL' selected>S/.</option>
                          <option value='DOLAR'>$</option>
                        </select>
                      </td>
                      <td class='tdDsctoVal'>
                        <div class='input-group'>                   
                          <input type='text'  id='imp_valor_".$cod."' ".$dis." name='imp_valor_".$cod."' class='form-control m-input' value='".$lde_importe."' onchange='sumaDscto();' style='text-align: right; padding-right:15px;'>
                          ".$vista."
                        </div
                      </td>
                      <td class='tdDsctoLib'>
                      ".$checkLib."
                      </td>
                      <td class='tdDsctoPor'>
                        ".$checkPor."
                      </td>
                      <td class='tdDsctoFin'>
                        <input type='text'  id='imp_monto_".$cod."' name='imp_monto_".$cod."' class='form-control m-input numDsctoA' value='".$dscto_final."' disabled style='text-align: right;'>
                      </td>
                      <td class='tdDsctoAcc'>
                        <button class='btn btn-danger m-btn m_sweetalert_elimina_servicio' type='button' data-toggle='m-tooltip' data-container='body' data-placement='top' title='' data-original-title='Eliminar servicio' onclick='eliminaFilaDscto(this.id);' id='eliminaDscto_".$cod."'>
                          <i class='fa fa-trash'></i>
                        </button>
                      </td>
                    </tr>";  
             
          }
          else{
            $lde_importe  = 0;
            $ls_flg_porcentaje = 'NO';
            echo "<tr height='50' name='".$cod."' id='".$cod."' >
                      <td width='100' style='text-align: center;'>
                        ".$cod."
                        <input type='hidden' value=".$cod." id='cod_tipo_descuento_".$cod."'>
                        <input type='hidden' value='NO' id='flg_modif_contrato_".$cod."'>
                        <input type='hidden' value='NO' id='flg_convenio_".$cod."'>
                        <input type='hidden' value='".$ls_flg_periodo."' id='flg_periodo_carencia'>
                        <input type='hidden' value='".$ls_flg_porcentaje."' id='ls_flg_porcentaje_".$cod."'>
                      </td>
                      <td width='200'>
                        ".$nombre."
                      </td>
                      <td style='text-align: center;' width='90'>
                        <select class='form-control m-input' name='cod_moneda' id='cod_moneda' disabled style='padding-right:1rem;'>
                          <option value='SOL' selected>S/.</option>
                          <option value='DOLAR'>$</option>
                        </select>
                      </td>
                      <td style='text-align: right;' width='180'>
                        <input type='text'  id='imp_valor_".$cod."' ".$dis." name='imp_valor_".$cod."' class='form-control m-input' value='".$lde_importe."' onchange='cambiaTodo();' style='text-align: right;'>
                      </td>
                      <td style='text-align: center; padding-top:20px;' width='100'>
                        <i class='fa fa-check'></i>
                      </td>
                      <td style='text-align: center; padding-top:20px;' width='100'>
                        
                      </td>
                      <td style='text-align: right;' width='180'>
                        <input type='text' disabled id='imp_monto_".$cod."' name='imp_monto_".$cod."' class='form-control m-input numDsctoA' value='0' style='text-align: right;'>
                      </td>
                      <td style='text-align: center; vertical-align: sub; padding-top:20px;' width='50'>
                        <input type='checkbox' class='m-checkbox eliminaDscto' id='eliminaDscto".$cod."'>
                      </td>
                    </tr>";

          }

//var_dump($datos1);
    $db->liberar($sql);
 		$db->cerrar();  
?>