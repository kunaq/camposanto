<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato INNER JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla3.cod_camposanto_actual INNER JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual INNER JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual INNER JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))");
		echo"SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato INNER JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla3.cod_camposanto_actual INNER JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual INNER JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual INNER JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10))";
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCttos

}//class ModeloModifCtto
?>