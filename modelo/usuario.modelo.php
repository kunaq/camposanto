<?php
require_once "conexion.php";
class ModeloUsuario{
	/*=============================================
	MOSTRAR USUARIO
	=============================================*/
	static public function mdlMostrarUsuario($usuario,$pass){
		$db = new Conexion();
		$sql = $db->consulta("SELECT * FROM scfma_usuario where cod_usuario = '$usuario' AND dsc_clave = '$pass' AND flg_activo = 'SI'");

		$datos = $db->recorrer($sql);		
		$db->liberar($sql);
        $db->cerrar();

		return $datos;
	}//function mdlMostrarUsuario
	/*=============================================
	AUTORIZAR CAMBIOS POR USUARIO
	=============================================*/
	static public function mdlPermisoUsuario($tabla1,$tabla2,$item1,$valor1,$item2,$valor2,$entrada){
		$db = new Conexion();
		if($entrada == 'autCmbTeaEmsCnt'){
			$sql = $db->consulta("SELECT count($tabla1.cod_proceso) as contPermiso FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.cod_proceso = $tabla1.cod_proceso WHERE $tabla1.$item1 = '$valor1' AND $tabla1.dsc_password = '$valor2' AND $tabla2.flg_tea = 'SI'");
			$datos = arrayMapUtf8Encode($db->recorrer($sql));	
		}		
		$db->liberar($sql);
        $db->cerrar();
		return $datos;
	}//function mdlPermisoUsuario
}//class ModeloUsuario