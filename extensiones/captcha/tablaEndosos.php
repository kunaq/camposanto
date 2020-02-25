<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
  $fecha = date("Y-m-d");//var_dump($fecha);

 $db = new Conexion();                                             

   $sql = $db->consulta("SELECT cod_entidad, dsc_entidad, dsc_direccion, flg_activo FROM vtama_entidad WHERE flg_activo = 'SI'");

      $datos = array();

          echo'
          <div class="m-scrollable table-responsive" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
            <div clas="table-responsive">
              <table id="myTableEndosos" cellpadding="0" cellspacing="0" border="0" display="block" >
                <thead>
                  <tr>
                    <th width="58" align="left">Codigo</th>
                    <th width="474" align="left">Entidad</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>';

                while($key = $db->recorrer($sql))
                {
                   $cod = "'".$key['cod_entidad']."'";
                   $nombre = "'".$key['dsc_entidad']."'";
                   $direccion = "'".$key['dsc_direccion']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_entidad'].'
                        </td>
                        <td>
                            '.$key['dsc_entidad'].'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick = "anadeEndoso('.$cod.','.$nombre.');" class="m-btn btn btn-danger" data-dismiss="modal">
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