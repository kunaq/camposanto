<?php
@session_start();
class ControladorCliente{

	static public function ctrInsertaCliente(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		if ($_POST['flg_juridico'] == 'SI') {
			$razon = $_POST['dsc_razon_social'];
			$apePaterno = NULL;
			$apeMaterno = NULL;
			$nombre = NULL;
			$sexo = NULL;
			$edoCivil = NULL;
			$fechNac = NULL;
		}else{
			$apePaterno = $_POST['dsc_apellido_paterno'];
			$apeMaterno = $_POST['dsc_apellido_materno'];
			$nombre = $_POST['dsc_nombre'];
			$sexo = $_POST['cod_sexo'];
			$edoCivil = $_POST['cod_estadocivil'];
			$fechNac = $_POST['fch_nacimiento'];
			$razon = NULL;
		}
		$datos = array("dsc_razon_social" => $razon,
						"dsc_apellido_paterno" => $apePaterno,
						"dsc_apellido_materno" => $apeMaterno,
						"dsc_nombre" => $nombre,
						"flg_juridico" => $_POST['flg_juridico'],
						"cod_tipo_documento" => $_POST['cod_tipo_documento'],
						"dsc_documento" => $_POST['dsc_documento'],
						"cod_calificacion" => $_POST['cod_calificacion'],
						"dsc_telefono_1" => $_POST['dsc_telefono_1'],
						"dsc_telefono_2" => $_POST['dsc_telefono_2'],
						"cod_tipo_contacto" => $_POST['cod_tipo_contacto'],
						"cod_usuario" => $_SESSION["user"],
						"fch_registro" => $fechaActual,
						"cod_sexo" => $sexo,
						"cod_estadocivil" => $edoCivil,
						"cod_categoria" => $_POST['cod_categoria'],
						"fch_nacimiento" => $fechNac,
						"dsc_email_trabajo" => $_POST['dsc_email_trabajo'],
						"cod_tipo_cliente" => $_POST['cod_tipo_cliente'],
						"cod_tarjeta_cliente" => $_POST['cod_tarjeta_cliente'],
						"dsc_mail_fe" => $_POST['dsc_mail_fe']
					);
		$respuesta = ModeloCliente::mdlInsertaCliente($datos);
		return $respuesta;
	}//ctrInsertaCliente

	static public function ctrInsertaDireccionCliente(){

		$datos = array("cod_cliente" => $_POST['cod_cliente'],
						"cod_pais" => $_POST['cod_pais'],
						"cod_departamento" => $_POST['cod_departamento'],
						"cod_provincia" => $_POST['cod_provincia'],
						"dsc_direccion" => $_POST['dsc_direccion'],
						"cod_distrito" => $_POST['cod_distrito'],
						"dsc_referencia" => $_POST['dsc_referencia'],
						"dsc_telefono_1" => $_POST['dsc_telefono_1'],
						"dsc_telefono_2" => $_POST['dsc_telefono_2'],
						"cod_numero" => $_POST['cod_numero'],
						"cod_interior" => $_POST['cod_interior'],
						"cod_manzana" => $_POST['cod_manzana'],
						"cod_lote" => $_POST['cod_lote'],
						"dsc_urbanizacion" => $_POST['dsc_urbanizacion'],
						"dsc_cadena_direccion" => $_POST['dsc_cadena_direccion']
					);
		$respuesta = ModeloCliente::mdlInsertaDireccionCliente($datos);
		return $respuesta;
	}//function ctrInsertaDireccionCliente

}//class ControladorResCtto
?>