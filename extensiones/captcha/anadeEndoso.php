<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['cod_dscto'];
   $nombre = $_GET['nombre'];
   //var_dump($cod);
    $cod1='"'.$cod.'"';
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_entidad, dsc_entidad, dsc_direccion, flg_activo FROM vtama_entidad WHERE cod_entidad = '$cod'");
       // var_dump($db->recorrer($sql));
        $datos = array();
        $fch_actual = date("d-m-Y");
        while($key = $db->recorrer($sql)){
          $datos[] =  $key; 
          echo "<tr height='50' name='".$cod."' id='".$cod."' >
                  <td class='tdEndDsc'>
                    ".$nombre."
                  </td>
                  <td class='tdEndFchVen'>
                    <input type='text' class='form-control form-control-sm m-input'  id='m_datepicker_4_".$cod."' data-date-format='dd/mm/yyyy' value='".date("d-m-Y",strtotime($fch_actual."+ 1 month"))."'/>

                  </td>
                  <td class='tdEndMon'>
                    <select class='form-control m-input' name='mon_".$cod."' id='mon_".$cod."' disabled style='padding-right:1rem;'>
                      <option value='SOL' selected>S/.</option>
                      <option value='DOLAR'>$</option>
                    </select>
                  </td>
                  <td class='tdEndVal'>                  
                      <input type='text'  id='vEndoso_".$cod."' name='vEndoso_".$cod."' class='form-control m-input' placeholder='0,00' onchange='cambiaTodo();' style='text-align: right; padding-right:15px;'>
                  </td>
                  <td class='tdEndAcc'>
                     <button class='btn btn-danger m-btn m_sweetalert_elimina_servicio' type='button' data-toggle='m-tooltip' data-container='body' data-placement='top' title='' data-original-title='Eliminar servicio' onclick='eliminaFilaEndoso(this.id);' id='eliminaEndoso_".$cod."'>
                          <i class='fa fa-trash'></i>
                        </button>
                  </td>
                </tr>";  
        }
             
    $db->liberar($sql);
 		$db->cerrar();  
?>