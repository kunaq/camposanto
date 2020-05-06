<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloMttoEspacio{

   static public function mdlListaMtto($ls_camposanto, $ls_plataforma, $ls_tipo_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio){
      $db = new Conexion();
      $select = "SELECT vtaca_espacio.*, vtama_plataforma.dsc_plataforma, vtama_area_plataforma.dsc_area, vtama_estadoespacio.flg_libre, vtama_tipo_espacio.num_nivelesocupar  FROM vtaca_espacio INNER JOIN vtama_plataforma ON vtama_plataforma.cod_plataforma = vtaca_espacio.cod_plataforma INNER JOIN vtama_estadoespacio ON vtama_estadoespacio.cod_estado = vtaca_espacio.cod_estado INNER JOIN vtama_area_plataforma ON vtaca_espacio.cod_area_plataforma = vtama_area_plataforma.cod_area_plataforma LEFT JOIN vtama_tipo_espacio ON vtama_tipo_espacio.cod_tipo_espacio = vtaca_espacio.cod_tipo_espacio WHERE vtaca_espacio.cod_camposanto = '$ls_camposanto' ";
      if ($ls_plataforma != '') {
         $condicion = $condicion." AND vtaca_espacio.cod_plataforma = '$ls_plataforma'";
      }
      //  if ($ls_tipo_plataforma != '') {
      //    $condicion = $condicion." AND vtaca_espacio.cod_plataforma = '$ls_tipo_plataforma'";
      // }
      if ($ls_area != '' && $ls_area != 0) {
         $condicion = $condicion." AND vtaca_espacio.cod_area_plataforma = '$ls_area'";
      }
      if ($ls_eje_horizontal != '' && $ls_eje_horizontal != 0) {
         $condicion = $condicion." AND vtaca_espacio.cod_eje_horizontal = '$ls_eje_horizontal'";
      }
      if ($ls_eje_vertical != '' && $ls_eje_vertical != 0) {
         $condicion = $condicion." AND vtaca_espacio.cod_eje_vertical = '$ls_eje_vertical'";
      }
      if ($ls_espacio != '' && $ls_espacio != 0) {
         $condicion = $condicion." AND vtaca_espacio.cod_espacio = '$ls_espacio'";
      }
      $select .= $condicion;
      $sql = $db->consulta($select);
      $datos = array();
      while($key = $db->recorrer($sql)){
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlListaMtto

   static public function mdlSelectTipoEsp(){
      $db = new Conexion();
      $sql = $db->consulta("SELECT cod_tipo_espacio, dsc_tipo_espacio, num_nivelesocupar FROM vtama_tipo_espacio");
      $datos = array();
      while($key = $db->recorrer($sql)){
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlSelectTipoEsp

   static public function mdlFlgLibre($cod){
      $db = new Conexion();
      $sql = $db->consulta("SELECT flg_libre FROM vtama_estadoespacio WHERE cod_estado = '$cod'");
      $datos = array();
      while($key = $db->recorrer($sql)){
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlFlgLibre

   static public function mdlSelectEstado(){
      $db = new Conexion();
      $sql = $db->consulta("SELECT cod_estado, dsc_estado FROM vtama_estadoespacio");
      $datos = array();
      while($key = $db->recorrer($sql)){
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlSelectEstado

   static public function mdlBorrarAnterior($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo_aux){
      $db = new Conexion();
      $sql = $db->consulta("DELETE vtade_espacio WHERE vtade_espacio.cod_camposanto = '$ls_camposanto' AND vtade_espacio.cod_plataforma = '$ls_plataforma' AND vtade_espacio.cod_area_plataforma = '$ls_area' AND vtade_espacio.cod_eje_horizontal = '$ls_eje_h' AND vtade_espacio.cod_eje_vertical = '$ls_eje_v' AND vtade_espacio.cod_espacio = '$ls_espacio' AND vtade_espacio.cod_tipo_espacio = '$ls_tipo_aux'");
      if ($sql) {
         return true;
      }else{
         return false;
      }
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlBorrarAnterior

   static public function mdlActualizaCabecera($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo_aux, $ls_estado){
      $db = new Conexion();
      $sql = $db->consulta("UPDATE vtaca_espacio SET cod_tipo_espacio = '$ls_espacio', cod_estado = '$ls_estado' WHERE vtaca_espacio.cod_camposanto = '$ls_camposanto' AND vtaca_espacio.cod_plataforma = '$ls_plataforma' AND vtaca_espacio.cod_area_plataforma = '$ls_area' AND vtaca_espacio.cod_eje_horizontal = '$ls_eje_h' AND vtaca_espacio.cod_eje_vertical = '$ls_eje_v' AND vtaca_espacio.cod_espacio = '$ls_espacio' AND vtaca_espacio.cod_tipo_espacio = '$ls_tipo_aux'");
      if ($sql) {
         return true;
      }else{
         return false;
      }
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlActualizaCabecera

   static public function mdlInsertaDet($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo){
      $db = new Conexion();

      // -- Nivel Libre -- //

      $sql = $db->consulta("SELECT  vtama_estadonivel.cod_estadonivel FROM vtama_estadonivel WHERE vtama_estadonivel.flg_libre = 'SI'");
      $ls_estado_nivel = arrayMapUtf8Encode($db->recorrer($sql));
      
      // -- Niveles Libres x Tipo -- //
      
      $sql1 = $db->consulta("SELECT vtama_tipo_espacio.num_nivelesocupar FROM vtama_tipo_espacio WHERE vtama_tipo_espacio.cod_tipo_espacio = '$ls_tipo'");
      $li_niveles = arrayMapUtf8Encode($db->recorrer($sql1));
      var_dump($li_niveles);
      
      // -- Actualiza Cab -- //
      
      $sql2 = $db->consulta("UPDATE vtaca_espacio SET vtaca_espacio.num_niveles = '$li_niveles', vtaca_espacio.num_niveleslibres = '$li_niveles' WHERE vtaca_espacio.cod_camposanto = '$ls_camposanto' AND vtaca_espacio.cod_plataforma = '$ls_plataforma' AND      vtaca_espacio.cod_area_plataforma = '$ls_area' AND vtaca_espacio.cod_eje_horizontal = '$ls_eje_h' AND vtaca_espacio.cod_eje_vertical = '$ls_eje_v' AND vtaca_espacio.cod_espacio = '$ls_espacio' AND vtaca_espacio.cod_tipo_espacio = '$ls_tipo'");
      
      // -- Nuevo Detalle Espacio -- //
      
      for ($li_j = 1; $li_j = $li_niveles['num_nivelesocupar'] ; $li_j++){
      
         $sql3 = $db->consulta("INSERT INTO vtade_espacio (cod_camposanto, cod_plataforma, cod_area_plataforma, cod_eje_horizontal,
         cod_eje_vertical, cod_espacio, cod_tipo_espacio, num_nivel, cod_estadonivel) VALUES ('$ls_camposanto', '$ls_plataforma', '$ls_area', '$ls_eje_h', '$ls_eje_v', '$ls_espacio', '$ls_tipo', '$li_j', '$ls_estado_nivel')");
         
      } 

      if ($sql && $sql1 && $sql2) {
         return true;
      }else{
         return false;
      } 

      $db->liberar($sql);
      $db->liberar($sq1);
      $db->liberar($sql2);
      $db->liberar($sql3);
      $db->cerrar();
   }//function mdlListaMtto

   static public function mdlExeProcedure($ls_camposanto, $ls_plataforma, $ls_area, $ls_eje_h, $ls_eje_v, $ls_espacio, $ls_tipo, $ls_tipo_aux){
      $db = new Conexion();
      $sql = $db->consulta("EXECUTE usp_cambia_tipo_espacio '$ls_camposanto', '$ls_plataforma', '$ls_area', '$ls_eje_h', '$ls_eje_v', '$ls_espacio', '$ls_tipo', '$ls_tipo_aux'");
      if ($sql) {
         return true;
      }else{
         return false;
      }
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlExeProcedure

}//class ModeloMttoEspacio
?>