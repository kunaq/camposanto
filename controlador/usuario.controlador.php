<?php
class ControladorUsuario{
	/*=============================================
	INGRESO USUARIO
	=============================================*/
	static public function ctrIngresoUsuario(){
		if(isset($_POST["accionUsuario"]) && $_POST["accionUsuario"] == "ingreso"){
			$_SESSION["nameBd"] = $_POST["rYCvKq"];
			//$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$password = $_POST["password"];
			$usuario = $_POST["user"];

			$respuesta = ModeloUsuario::mdlMostrarUsuario($usuario,$password);
			$entradaLcd = 'sessionLocal';
			$respuesta2 = ControladorLocalidad::ctrMostrarLocalidad($entradaLcd);
			$entradaEmp = 'sessionEmpr';
			$respuesta3 = ControladorEmpresa::ctrMostrarEmpresa($entradaEmp);
			if(count($respuesta) > 0){
				if($respuesta["cod_usuario"] == $_POST["user"] && $respuesta["dsc_clave"] == $password){
					//if($respuesta["flg_activo"] == 'SI'){
						$_SESSION["user"] = $respuesta["cod_usuario"];
						$_SESSION["nombre"] = $respuesta["dsc_usuario"];
						$_SESSION["flg_administrador"] = $respuesta["flg_administrador"];
						$_SESSION["cod_trabajador"] = $respuesta["cod_trabajador"];
						$_SESSION["localidad"] = $respuesta2["cod_localidad"];
						$_SESSION["dsc_localidad"] = $respuesta2["dsc_localidad"];
						$_SESSION["codEmpresa"] = $respuesta3["cod_empresa"];
						$_SESSION["dsc_empresa"] = $respuesta3["dsc_empresa"];
						$_SESSION["dsc_ruc"] = $respuesta3["dsc_ruc"];
						return 'ok';
					/*}else{
						return 'inactivo';
					}*/
				}else{
					return 'error';
				}
			}else{
				return 'error';
			}
		}//if
	}//function ctrIngresoUsuario

	static public function ctrPermisoUsuario($item1,$valor1,$item2,$valor2,$entrada){
		$tabla1 = "pr02_tab0016";
		$tabla2 = "pr01_tab0006";
		$respuesta = ModeloUsuario::mdlPermisoUsuario($tabla1,$tabla2,$item1,$valor1,$item2,$valor2,$entrada);
		return $respuesta;
	}//function ctrPermisoUsuario
}//class UsuarioControlador