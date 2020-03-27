<?php
@session_start();
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT dsc_tipo_comisionista, cod_tipo_comisionista, flg_jefeventas, flg_supervisor, flg_activo FROM vtama_tipo_comisionista WHERE flg_activo = 'SI'");

                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
                <div class="table-responsive">
                    <table id="myTableComisionista" class="table-responsive-m" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th align="left">Codigo</th>
                          <th align="left">Tipo comsionista</th>
                          <th align="center">Activo</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>';
                while($key = $db->recorrer($sql))
                {
                   $cod = "'".$key['cod_tipo_comisionista']."'";
                   $flgJefe = "'".$key['flg_jefeventas']."'";
                   $flgSup = "'".$key['flg_supervisor']."'";
                   $nombre = "'".$key['dsc_tipo_comisionista']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_tipo_comisionista'].'
                        </td>
                        <td>
                            '.Utf8Encode($key['dsc_tipo_comisionista']).'
                        </td>
                        <td>
                            '.Utf8Encode($key['flg_activo']).'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick="anadeComisionista('.$cod.','.$flgJefe.','.$flgSup.');"  class="m-btn btn btn-danger btn-sm" data-dismiss="modal">
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