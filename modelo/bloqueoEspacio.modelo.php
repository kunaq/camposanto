<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloBloqueoEspacio{

   static public function mdlListaBloqueo($as_camposanto, $as_plataforma, $as_area, $as_eje_horizontal, $as_eje_vertical, $as_espacio, $tabla1, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  $tabla1.cod_camposanto,  $tabla1.cod_plataforma, $tabla1.cod_area_plataforma,  $tabla1.cod_eje_horizontal,  $tabla1.cod_eje_vertical,  $tabla1.cod_espacio,  $tabla1.cod_tipo_espacio,  $tabla1.num_linea,  $tabla1.cod_tipo_bloqueo,  $tabla1.fch_evento,  $tabla1.cod_usuario,  $tabla1.dsc_observacion,  $tabla1.flg_activo,  $tabla1.cod_trabajador, $tabla2.flg_desbloqueo, $tabla2.flg_bloqueo FROM  $tabla1, $tabla2 WHERE (  $tabla1.cod_tipo_bloqueo = $tabla2.cod_tipo_bloqueo ) and  ( (  $tabla1.cod_camposanto = '$as_camposanto' ) AND  (  $tabla1.cod_plataforma = '$as_plataforma' ) AND (  $tabla1.cod_area_plataforma = '$as_area' ) AND  (  $tabla1.cod_eje_horizontal = '$as_eje_horizontal' ) AND  (  $tabla1.cod_eje_vertical = '$as_eje_vertical' ) AND (  $tabla1.cod_espacio = '$as_espacio' ) )");
      $datos = array();
      while($key = $db->recorrer($sql)){
            $key["fch_evento"] = ($key["fch_evento"] != '') ? date_format($key['fch_evento'], 'd-m-Y') : '';
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
        $db->cerrar();
   }//function mdlListaBloqueo

   static public function mdlDscBloqueo($codigo, $tabla){
      $db = new Conexion();
      $sql = $db->consulta("SELECT dsc_tipo_bloqueo FROM  $tabla WHERE cod_tipo_bloqueo = '$codigo'");
      while($key = $db->recorrer($sql)){
         $dscBloqueo = Utf8Encode($key['dsc_tipo_bloqueo']);          
      }
      return $dscBloqueo;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlDscBloqueo

   static public function mdlFlgNicho($plataforma, $camposanto, $tabla, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  $tabla.flg_nicho FROM $tabla2, $tabla WHERE $tabla2.cod_tipo_plataforma = $tabla.cod_tipo_plataforma AND $tabla2.cod_camposanto = '$camposanto' AND $tabla2.cod_plataforma = '$plataforma'");
      while($key = $db->recorrer($sql)){
         $flg_nicho = Utf8Encode($key['flg_nicho']);  
         echo $flg_nicho;     
      }
      // return $flg_nicho;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlFlgNicho

   static public function mdlFlgBloqueo($codigo, $tabla){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  $tabla.flg_bloqueo, $tabla.flg_desbloqueo FROM $tabla WHERE $tabla.cod_tipo_bloqueo = '$codigo'");
      while($key = $db->recorrer($sql)){
         $flg_bloqueo = Utf8Encode($key['flg_bloqueo']);
         $flg_desbloqueo = Utf8Encode($key['flg_desbloqueo']);      
      }
      $arrData = array('flg_bloqueo'=> $flg_bloqueo, 'flg_desbloqueo' => $flg_desbloqueo);
      return $arrData;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlFlgBloqueo

   static public function mdlFlgLibre($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $tabla, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  $tabla2.cod_tipo_espacio, $tabla.flg_libre, $tabla2.cod_estado FROM $tabla2, $tabla WHERE $tabla2.cod_camposanto = '$ls_camposanto' AND $tabla2.cod_plataforma = '$ls_plataforma' AND $tabla2.cod_area_plataforma = '$ls_area' AND $tabla2.cod_eje_horizontal = '$ls_eje_horizontal' AND $tabla2.cod_eje_vertical = '$ls_eje_vertical' AND $tabla2.cod_espacio = '$ls_espacio' AND $tabla2.cod_estado = $tabla.cod_estado");
      while($key = $db->recorrer($sql)){
         $flg_libre = Utf8Encode($key['flg_libre']);
         $cod_tipo_espacio = Utf8Encode($key['cod_tipo_espacio']);
         $cod_estado = Utf8Encode($key['cod_estado']);    
      }
      $arrData = array('flg_libre'=> $flg_libre, 'cod_tipo_espacio' => $cod_tipo_espacio, 'cod_estado' => $cod_estado);
      return $arrData;
      $db->liberar($sql);
      $db->cerrar();
   }//function function ctrFlgLibre

   static public function mdlCdtBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_solicitante, $li_anno, $li_mes, $tabla, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  COUNT(1) FROM vtade_bloqueo_x_espacio, vtama_tipo_bloqueo WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio' AND vtade_bloqueo_x_espacio.cod_trabajador = '$ls_solicitante' AND vtade_bloqueo_x_espacio.cod_tipo_bloqueo = vtama_tipo_bloqueo.cod_tipo_bloqueo AND DATEPART(YY, vtade_bloqueo_x_espacio.fch_evento) = '$li_anno' AND DATEPART(MM, vtade_bloqueo_x_espacio.fch_evento) = '$li_mes' AND vtama_tipo_bloqueo.flg_bloqueo = 'SI'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));
      if(is_null($datos[0]) || $datos[0] == ''){
       $datos = 0;
      }
      $datos = floatval($datos);

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function ctrFlgLibre

   static public function mdlCdtEspacio($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_solicitante, $li_anno, $li_mes, $tabla, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  COUNT(DISTINCT cod_camposanto + '-' + cod_plataforma + '-' + cod_area_plataforma + '-' + cod_eje_horizontal + '-' + cod_eje_vertical + '-' + cod_espacio) FROM vtade_bloqueo_x_espacio, vtama_tipo_bloqueo WHERE vtade_bloqueo_x_espacio.cod_trabajador = '$ls_solicitante' AND vtade_bloqueo_x_espacio.cod_tipo_bloqueo = vtama_tipo_bloqueo.cod_tipo_bloqueo AND vtade_bloqueo_x_espacio.cod_camposanto + '-' + vtade_bloqueo_x_espacio.cod_plataforma + '-' + vtade_bloqueo_x_espacio.cod_area_plataforma + '-' + vtade_bloqueo_x_espacio.cod_eje_horizontal + '-' + vtade_bloqueo_x_espacio.cod_eje_vertical + '-' + vtade_bloqueo_x_espacio.cod_espacio <> '$ls_camposanto' + '-' + '$ls_plataforma' + '-' + '$ls_area' + '-' + '$ls_eje_horizontal' + '-' + '$ls_eje_vertical' + '-' + '$ls_espacio' AND DATEPART(YY, vtade_bloqueo_x_espacio.fch_evento) = '$li_anno' AND DATEPART(MM, vtade_bloqueo_x_espacio.fch_evento) = '$li_mes' AND vtama_tipo_bloqueo.flg_bloqueo = 'SI' AND vtade_bloqueo_x_espacio.flg_activo = 'SI'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));
      if(is_null($datos[0]) || $datos[0] == ''){
       $datos = 0;
      }
      $datos = floatval($datos);

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function ctrCdtEspacio

   static public function mdlExisteBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_bloqueo, $ls_desbloqueo, $tabla, $tabla2){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  COUNT(1) FROM vtade_bloqueo_x_espacio, vtama_tipo_bloqueo WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio' AND vtade_bloqueo_x_espacio.cod_tipo_bloqueo = vtama_tipo_bloqueo.cod_tipo_bloqueo AND (CASE  WHEN '$ls_bloqueo' = 'SI' THEN vtama_tipo_bloqueo.flg_bloqueo WHEN '$ls_desbloqueo' = 'SI' THEN vtama_tipo_bloqueo.flg_desbloqueo END ) = 'SI' AND       vtade_bloqueo_x_espacio.flg_activo = 'SI'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));

      if(is_null($datos[0]) || $datos[0] == ''){
       $datos = 0;
      }
      $datos = floatval($datos);

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlExisteBloqueo

   static public function mdlExisteEventoBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio){
      $db = new Conexion();
      $sql = $db->consulta("SELECT COUNT(1) FROM vtade_bloqueo_x_espacio, vtama_tipo_bloqueo WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio' AND vtade_bloqueo_x_espacio.cod_tipo_bloqueo = vtama_tipo_bloqueo.cod_tipo_bloqueo AND vtama_tipo_bloqueo.flg_bloqueo = 'SI' AND vtade_bloqueo_x_espacio.flg_activo = 'SI'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));
      if(is_null($datos[0]) || $datos[0] == ''){
       $datos = 0;
      }
      $datos = floatval($datos);

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlExisteEventoBloqueo

   static public function mdlFlgBloqueoResolucion($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio){
      $db = new Conexion();
      $sql = $db->consulta("SELECT vtama_tipo_bloqueo.flg_resolucion FROM vtade_bloqueo_x_espacio, vtama_tipo_bloqueo WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio' AND vtade_bloqueo_x_espacio.cod_tipo_bloqueo = vtama_tipo_bloqueo.cod_tipo_bloqueo AND vtama_tipo_bloqueo.flg_bloqueo = 'SI' AND vtade_bloqueo_x_espacio.flg_activo = 'SI'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlFlgBloqueoResolucion

   static public function mdlFlgBloqueado($ls_estado_espacio){
      $db = new Conexion();
      $sql = $db->consulta("SELECT  vtama_estadoespacio.flg_bloqueado FROM vtama_estadoespacio WHERE vtama_estadoespacio.cod_estado = '$ls_estado_espacio'");
     
      $datos = arrayMapUtf8Encode($db->recorrer($sql));

      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlFlgBloqueado

   static public function mdlEjecutaBloqueo($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio, $ls_tipo_bloqueo, $ls_tipo_espacio, $ls_dsc_observacion,  $ls_solicitante, $ls_bloqueo, $ls_desbloqueo, $ldt_fch_evento, $gs_usuario){
      $db = new Conexion();

      // -- Obtiene el maximo correlativo -- //

      $sql = $db->consulta("SELECT MAX(vtade_bloqueo_x_espacio.num_linea) FROM vtade_bloqueo_x_espacio WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio'");
      $ll_max_reg = arrayMapUtf8Encode($db->recorrer($sql));

      if(is_null($ll_max_reg[0]) || $ll_max_reg[0] == ''){
       $ll_max_reg = 0;
      }
      $ll_max_reg = floatval($ll_max_reg);

      $ll_reg_new = $ll_max_reg + 1;

      // -- Recupera el estado del espacio -- //

      $sql1 = $db->consulta("SELECT  vtama_estadoespacio.cod_estado FROM vtama_estadoespacio WHERE ( CASE   WHEN '$ls_bloqueo' = 'SI' THEN vtama_estadoespacio.flg_bloqueado WHEN '$ls_desbloqueo' = 'SI' THEN vtama_estadoespacio.flg_libre END) = 'SI'");
      $ls_estado = arrayMapUtf8Encode($db->recorrer($sql1)); 

      // -- Inserta en la tabla -- //

      $sql2 = $db->consulta("INSERT INTO vtade_bloqueo_x_espacio ( cod_camposanto, cod_plataforma, cod_area_plataforma, cod_eje_horizontal, cod_eje_vertical, cod_espacio,   cod_tipo_espacio, num_linea, cod_tipo_bloqueo, fch_evento, cod_usuario, cod_trabajador, dsc_observacion, flg_activo ) VALUES ( '$ls_camposanto', '$ls_plataforma', '$ls_area', '$ls_eje_horizontal', '$ls_eje_vertical', '$ls_espacio', '$ls_tipo_espacio', '$ll_reg_new', '$ls_tipo_bloqueo', '$ldt_fch_evento', '$gs_usuario', '$ls_solicitante', '$ls_dsc_observacion', 'SI')");

      // -- Inactiva el registro anterior -- //

      if( $ll_max_reg > 0) {

          $sql3 = $db->consulta("UPDATE vtade_bloqueo_x_espacio SET vtade_bloqueo_x_espacio.flg_activo = 'NO' WHERE vtade_bloqueo_x_espacio.cod_camposanto = '$ls_camposanto' AND vtade_bloqueo_x_espacio.cod_plataforma = '$ls_plataforma' AND vtade_bloqueo_x_espacio.cod_area_plataforma = '$ls_area' AND vtade_bloqueo_x_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtade_bloqueo_x_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtade_bloqueo_x_espacio.cod_espacio = '$ls_espacio' AND vtade_bloqueo_x_espacio.num_linea = $ll_max_reg ");

      }

      // -- Bloquea el espacio -- //

      $sql4 = $db->consulta("UPDATE vtaca_espacio SET vtaca_espacio.cod_estado = '$ls_estado' WHERE vtaca_espacio.cod_camposanto = '$ls_camposanto' AND vtaca_espacio.cod_plataforma = '$ls_plataforma' AND vtaca_espacio.cod_area_plataforma = '$ls_area' AND vtaca_espacio.cod_eje_horizontal = '$ls_eje_horizontal' AND vtaca_espacio.cod_eje_vertical = '$ls_eje_vertical' AND vtaca_espacio.cod_espacio = '$ls_espacio' AND vtaca_espacio.cod_tipo_espacio = '$ls_tipo_espacio'");
      
      if ($sql2 && $sql3 && $sql4) {
         return 1;
      }else{
         return 0;
      }

      $db->liberar($sql);
      $db->cerrar();
   }//function function mdlEjecutaBloqueo

}//class ModeloBloqueoEspacio
?>