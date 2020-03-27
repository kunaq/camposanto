<?php
@session_start();
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT dsc_grupo, cod_grupo, cod_jefe_ventas, cod_supervisor FROM vtama_grupo WHERE flg_activo = 'SI'");

                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
                <div class="table-responsive">
                    <table id="myTableGrupo" class="table-responsive-m" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th align="left">Codigo</th>
                          <th align="left">Agencia</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>';
                while($key = $db->recorrer($sql))
                {
                   $cod = "'".$key['cod_grupo']."'";
                   $nombre = "'".$key['dsc_grupo']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_grupo'].'
                        </td>
                        <td>
                            '.Utf8Encode($key['dsc_grupo']).'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick="anadeGrupo('.$cod.');" codJefe="'.$key['cod_jefe_ventas'].'" codSup="'.$key['cod_supervisor'].'" class="m-btn btn btn-danger" data-dismiss="modal">
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