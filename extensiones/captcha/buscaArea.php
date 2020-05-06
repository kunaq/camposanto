<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";
   $cod = $_GET['value'];
   //var_dump($cod);
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT cod_area_plataforma, dsc_area  FROM vtama_area_plataforma WHERE cod_plataforma = '$cod' AND flg_activo = 'SI' ORDER BY dsc_area");

        $datos = array();
        echo "<option value = ''>Seleccione el área</option>";
		while($key = $db->recorrer($sql)){

            $datos[] =  $key;
            echo "<option value = ".$key['cod_area_plataforma'].">".$key['dsc_area']."</option>";    
             
		}        
		//echo $respuesta;
    $db->liberar($sql);
 		$db->cerrar();  



$x = "SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio, vtama_servicio.flg_contado, vtama_servicio.cod_moneda, (
        SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta 
        FROM   vtade_servicio_precio 
        WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio  
        AND   vtade_servicio_precio.cod_localidad = '0001'
        AND   vtade_servicio_precio.cod_tipo_necesidad = 'NF'
        AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '2013-01-01')
        AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '2013-12-01')) >= CONVERT(DATE, '2013-12-01'
        )
ORDER BY vtade_servicio_precio.fch_inicio DESC) 
AS imp_precio, vtama_servicio.flg_ds_compartido
FROM  vtama_servicio
INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
WHERE vtama_tipo_servicio.flg_prevencion = 'NO'
AND   vtama_servicio.flg_activo = 'SI'
AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = 'TR002'
AND   vtama_servicio.cod_subtipo_servicio = 'TS001'
AND   0 <( CASE WHEN ISNULL('01', '') <> '' 
        THEN   (
                SELECT  COUNT(1)
                FROM vtama_tipo_espacio
                INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio
                WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
                AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = 'CA001' 
                AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '01'
                )
          ELSE 1 END 
          )
AND   'SI' = 'NO'
UNION 
SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio,vtama_servicio.flg_contado, vtama_servicio.cod_moneda, (
          SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta
          FROM  vtade_servicio_precio
          WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio
          AND   vtade_servicio_precio.cod_tipo_necesidad = 'NF'
          AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '2013-01-01')
          AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '2013-12-01')) >= CONVERT(DATE, '2013-12-01')
          ORDER BY vtade_servicio_precio.fch_inicio DESC
          ) 
AS imp_precio,vtama_servicio.flg_ds_compartido
FROM vtama_servicio 
INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio 
INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
WHERE vtama_servicio.flg_activo = 'SI'
AND   vtama_tipo_servicio.flg_dsepultura = 'SI'
AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = 'TR002'
AND   0  <(
          SELECT  COUNT(1)
          FROM  vtama_tipo_espacio 
          INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio 
          WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
          AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = 'CA001'
          AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '01'
          )
AND 'SI' = 'SI'
UNION
SELECT  vtama_servicio.cod_servicio, vtama_servicio.dsc_servicio, vtama_servicio.flg_contado, vtama_servicio.cod_moneda, 
          (
           SELECT  TOP 1 vtade_servicio_precio.imp_precio_venta
           FROM  vtade_servicio_precio
           WHERE vtade_servicio_precio.cod_servicio = vtama_servicio.cod_servicio
           AND   vtade_servicio_precio.cod_tipo_necesidad = 'NF'
           AND   vtade_servicio_precio.fch_inicio <= CONVERT(DATE, '2013-01-01')
           AND   ISNULL(vtade_servicio_precio.fch_fin, CONVERT(DATE, '2013-12-01')) >= CONVERT(DATE, '2013-12-01')
           ORDER BY vtade_servicio_precio.fch_inicio DESC
           ) 
AS imp_precio, vtama_servicio.flg_ds_compartido
FROM  vtama_servicio  
INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
INNER JOIN vtavi_servicio_x_tiporecaudacion ON vtavi_servicio_x_tiporecaudacion.cod_servicio = vtama_servicio.cod_servicio
WHERE vtama_servicio.flg_activo = 'SI'
AND   vtama_tipo_servicio.flg_dsepultura = 'NO'
AND   vtavi_servicio_x_tiporecaudacion.cod_tipo_recaudacion = 'TR002'
AND   NOT EXISTS(
                  SELECT  1
                  FROM    vtama_tipo_espacio
                  INNER JOIN vtavi_tipo_espacio_x_plataforma ON vtavi_tipo_espacio_x_plataforma.cod_tipo_espacio = vtama_tipo_espacio.cod_tipo_espacio
                  WHERE vtama_tipo_espacio.cod_tipo_espacio = vtama_servicio.cod_tipo_espacio
                  AND   vtavi_tipo_espacio_x_plataforma.cod_camposanto = 'CA001'
                  AND   vtavi_tipo_espacio_x_plataforma.cod_plataforma = '01'
               )
AND 'SI' = 'SI'";






?>



