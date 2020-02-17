<?php
@session_start();
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT dsc_agencia, cod_agencia FROM vtama_agencia_funeraria WHERE flg_activo = 'SI' AND cod_localidad = '".$_SESSION['localidad']."'");

                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
                <div class="table-responsive">
                    <table id="myTableAgencias" class="table-responsive-m" cellpadding="0" cellspacing="0" border="0" display="block" >
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
                   $cod = "'".$key['cod_agencia']."'";
                   $nombre = "'".$key['dsc_agencia']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_agencia'].'
                        </td>
                        <td>
                            '.Utf8Encode($key['dsc_agencia']).'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick = "anadeAgencia('.$cod.');" class="m-btn btn btn-danger" data-dismiss="modal">
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