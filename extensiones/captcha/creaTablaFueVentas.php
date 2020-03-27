<?php
@session_start();
require_once "../../core.php";
require_once "../../modelo/conexion.php";
require_once "../../funciones.php";

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT ( a.cod_trabajador ) AS codigo, ( a.dsc_apellido_paterno + ' ' + a.dsc_apellido_materno + ', ' + a.dsc_nombres ) AS dsc_trabajador FROM rhuma_trabajador a, rhuma_area_empresa b, rhuvi_cargo_trabajador c WHERE a.cod_trabajador = c.cod_trabajador AND c.cod_empresa = b.cod_empresa AND c.cod_centroresp = b.cod_centroresp AND c.cod_area = b.cod_area AND b.flg_fuerza_ventas = 'SI'");

                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
                <div class="table-responsive">
                    <table id="myTableComisionista" class="table-responsive-m" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th align="left">Codigo</th>
                          <th align="left">Trabajador</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>';
                while($key = $db->recorrer($sql))
                {
                   $cod = "'".$key['codigo']."'";
                   $nombre = "'".$key['dsc_trabajador']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['codigo'].'
                        </td>
                        <td>
                            '.Utf8Encode($key['dsc_trabajador']).'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick="anadeFueTra('.$cod.');"  class="m-btn btn btn-danger btn-sm" data-dismiss="modal">
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