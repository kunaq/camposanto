<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloMttoEspacio{

   static public function mdlListaMtto($ls_camposanto, $ls_plataforma, $ls_tipo_plataforma, $ls_area, $ls_eje_horizontal, $ls_eje_vertical, $ls_espacio){
      $db = new Conexion();
      $sql = $db->consulta("SELECT TOP (100) * FROM vtaca_espacio");
      $datos = array();
      while($key = $db->recorrer($sql)){
            $datos[] = arrayMapUtf8Encode($key);
         }
      return $datos;
      $db->liberar($sql);
      $db->cerrar();
   }//function mdlListaMtto

}//class ModeloMttoEspacio
?>