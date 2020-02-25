<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
  $localidad = $_GET['localidad'];
  $tiponecesidad = $_GET['tiponec'];
  $tiporecaudacion = $_GET['tipPro'];
  $camposanto = $_GET['campo'];
  $subtiposervicio = $_GET['planSS'];
  $plataforma = $_GET['plat'];
  $integral = $_GET['flagInt'];
  $fecha = date("Y-m-d");//var_dump($integral);

 $db = new Conexion();                                             

            $sql = $db->consulta("SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio, vtama_servicio.flg_contado, vtama_servicio.cod_moneda,
              (
                SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta
                FROM   vtade_servicio_precio
                WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio
                AND   vtade_servicio_precio.cod_localidad = '$localidad'
                AND   vtade_servicio_precio.cod_tipo_necesidad = '$tiponecesidad'
                AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '$fecha')
                AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '$fecha')) >= CONVERT(DATE, '$fecha')
                ORDER BY vtade_servicio_precio.fch_inicio DESC
              )
              AS imp_precio, vtama_servicio.flg_ds_compartido
              FROM  vtama_servicio
              INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
              INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
              WHERE vtama_tipo_servicio.flg_prevencion = 'NO'
              AND   vtama_servicio.flg_activo = 'SI'
              AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = '$tiporecaudacion'
              AND   vtama_servicio.cod_subtipo_servicio = '$subtiposervicio'
              AND   0
                    <
                    ( CASE WHEN ISNULL('$plataforma', '') <> '' THEN
                        (
                          SELECT  COUNT(1)
                          FROM    vtama_tipo_espacio
                          INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio
                          WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
                          AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = '$camposanto'
                          AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '$plataforma'
                        )
                    ELSE 1 END )
              AND  '$integral' = 'NO'
              AND EXISTS (
                        SELECT 1 
                        FROM   vtade_servicio_precio 
                        WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio  
                        AND   vtade_servicio_precio.cod_localidad = '$localidad'
                        AND   vtade_servicio_precio.cod_tipo_necesidad = '$tiponecesidad'
                        AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '$fecha')
                        AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '$fecha')) >= CONVERT(DATE, '$fecha')
                        )
              UNION
              SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio,             vtama_servicio.flg_contado, vtama_servicio.cod_moneda, 
                (
                    SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta
                    FROM  vtade_servicio_precio
                    WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio
                    AND   vtade_servicio_precio.cod_tipo_necesidad = '$tiponecesidad'
                    AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '$fecha')
                    AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '$fecha')) >= CONVERT(DATE, '$fecha')
                    ORDER BY vtade_servicio_precio.fch_inicio DESC
                )
              AS imp_precio,  vtama_servicio.flg_ds_compartido
              FROM vtama_servicio
              INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
              INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
              WHERE vtama_servicio.flg_activo = 'SI'
              AND   vtama_tipo_servicio.flg_dsepultura = 'SI'
              AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = '$tiporecaudacion'
              AND   0
                    <                                            
                    (
                      SELECT  COUNT(1)
                      FROM  vtama_tipo_espacio
                      INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio
                      WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
                      AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = '$camposanto'
                      AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '$plataforma'
                    )
              AND   '$integral' = 'SI'
              UNION
              SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio,  vtama_servicio.flg_contado, vtama_servicio.cod_moneda, 
                    (
                      SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta
                      FROM  vtade_servicio_precio
                      WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio
                      AND   vtade_servicio_precio.cod_tipo_necesidad = '$tiponecesidad'
                      AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '$fecha')
                      AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '$fecha')) >= CONVERT(DATE, '$fecha')
                      ORDER BY vtade_servicio_precio.fch_inicio DESC
                    )
              AS imp_precio, vtama_servicio.flg_ds_compartido
              FROM   vtama_servicio
              INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
              INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
              WHERE vtama_servicio.flg_activo = 'SI'
              AND   vtama_tipo_servicio.flg_dsepultura = 'NO'
              AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = '$tiporecaudacion'
              AND   NOT EXISTS
                  (
                    SELECT  1
                    FROM  vtama_tipo_espacio
                    INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio
                    WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
                    AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = '$camposanto'
                    AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '$plataforma'
                  )
              AND   '$integral' = 'SI'");

                $datos = array();
                //$datos = '';
                echo'
                <div class="m-scrollable table-responsive" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480" data-min-height="50">
                  <div class="table-responsive">
                    <table id="myTableServicios" cellpadding="0" cellspacing="0" border="0" display="block" >
                      <thead>
                        <tr>
                          <th class="tdCodigoAddServic" align="left">Codigo</th>
                          <th class="tdDscAddServic" align="left" style="width:520px;">Descripción del servicio</th>
                          <th class="tdMonAddServic" style="text-align: center;">Moneda</th>
                          <th class="tdPrcAddServic" style="text-align: center;">Precio de venta</th>
                          <th class="tdAccAddServic">Acción</th>
                        </tr>
                      </thead>
                      <tbody>';

                while($key = $db->recorrer($sql))
                {
                   $datos[] =  $key;
                   if ($key['cod_moneda'] == 'SOL') 
                   {
                       $mon = 'S/.';
                   }
                   else
                   {
                    $mon = '$';
                   }
                   if ($key['imp_precio'] == NULL) 
                   {
                       $precio = number_format(0, 2, '.', ',');
                   }
                   else
                   {
                        $precio = number_format($key['imp_precio'],2,'.',',');
                   }
                   $cod = "'".$key['cod_servicio']."'";
                   echo 
                   '<tr>
                        <td style="text-align: center;">
                            '.$key['cod_servicio'].'
                        </td>
                        <td>
                            '.$key['dsc_servicio'].'
                        </td>
                        <td style="text-align: center;">
                            '.$mon.'
                        </td>
                        <td style="text-align: right; padding-right: 30px;">
                            '.$precio.'
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick = "anadeServicio('.$cod.');" class="m-btn btn btn-danger" data-dismiss="modal">
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