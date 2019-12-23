<?php
require_once "../../modelo/conexion.php";
  $fecha = date("Y-m-d");//var_dump($fecha);

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT vtama_tipo_descuento.cod_tipo_descuento, vtama_tipo_descuento.dsc_tipo_descuento, vtama_tipo_descuento.flg_precio_libre, vtama_tipo_descuento.flg_periodo_carencia FROM vtama_tipo_descuento INNER JOIN vtade_tipo_descuento ON vtama_tipo_descuento.cod_tipo_descuento = vtade_tipo_descuento.cod_tipo_descuento WHERE flg_activo = 'SI' AND vtade_tipo_descuento.fch_inicio <= CONVERT(DATETIME,'13/10/2019 00:00:00.000') AND  vtade_tipo_descuento.fch_fin >= CONVERT(DATETIME,'13/06/2019 00:00:00.000')");
                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
                <div class="table-responsive">
                    <table id="myTableDscto" class="table-responsive-m" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th width="58" align="left">Codigo</th>
                          <th width="474" align="left">Descuento</th>
                          <th width="60" style="text-align: center;">Libre</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>';
                while($key = $db->recorrer($sql))
                {
                   $datos[] =  $key;
                   $cod = "'".$key['cod_tipo_descuento']."'";
                   $carencia = "'".$key['flg_periodo_carencia']."'";
                   $nombre = "'".$key['dsc_tipo_descuento']."'";
                   $libre = "'".$key['flg_precio_libre']."'";
                   if($key['flg_precio_libre'] == 'NO'){
                      $flg = 'NO';
                   }
                   else {
                      $flg = 'SI';
                   }
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_tipo_descuento'].'
                        </td>
                        <td>
                            '.$key['dsc_tipo_descuento'].'
                        </td>
                        <td style="text-align: center;">
                            '.$flg.'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick = "anadeDscto('.$cod.','.$nombre.','.$libre.','.$carencia.');" class="m-btn btn btn-danger" data-dismiss="modal">
                                <i class="la la-plus"></i>
                            </button>
                        </td>
                    </tr>';
                }      
                echo "
                      </tbody>
                </table>
                </div>
              </div>";


        $db->liberar($sql);
        $db->cerrar();

        return $datos;
?>