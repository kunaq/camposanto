<?php
@session_start();
class ControladorProspecto{

	static public function ctrGuardaProspecto(){
		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;
		$datos = array(	(float)"importe" => $_POST['importe'],
						"tipoDoc" => $_POST['tipoDoc'],
						"numDoc" => $_POST['numDoc'],
						"juridico" => $_POST['jur'],
						"apePaterno" => $_POST['apePaterno'],
						"apeMaterno" => $_POST['apeMaterno'],
						"nombre" => $_POST['nombre'],
						"razonSocial" => $_POST['razonSocial'],
						"direccion" => $_POST['direccion'],
						"pais" => $_POST['pais'],
						"departamento" => $_POST['departamento'],
						"provincia" => $_POST['provincia'],
						"distrito" => $_POST['distrito'],
						"telefono1" => $_POST['telefono1'],
						"telefono2" => $_POST['telefono2'],
						"fchRegistro" => $_POST['fchRegistro'],
						"usuario" => $_SESSION['user'],
						"origen" => $_POST['origen'],
						"calificacion" => $_POST['calificacion'],
						"vendedor" => $_POST['vendedor'],
						"grupo" => $_POST['grupo'],
						"supervisor" => $_POST['supervisor'],
						"jefeVentas" => $_POST['jefeVentas'],
						"observacion" => $_POST['observacion'],
						"estado" => $_POST['estado']
					);
		$respuesta = ModeloProspecto::mdlGuardaProspecto($datos);
		return $respuesta;
	}//ctrGuardaProspecto

	static public function ctrGuardaContactoProspecto(){

		$datos = array(	"codPro" => $_POST['codPro'],
						"linea" => $_POST['num_linea'],
						"fchContacto" => $_POST['fchContacto'],
						"calificacion" => $_POST['calificacion'],
						"presentacion" => $_POST['presentacion'],
						"consejero" => $_POST['consejero'],
						"observacion" => $_POST['observacion'],
						"indicador" => $_POST['indicador'],
						"usuarioC" => $_POST['usuarioC']
					);
		$respuesta = ModeloProspecto::mdlGuardaContactoProspecto($datos);
		return $respuesta;
	}//function ctrGuardaContactoProspecto

}//class ControladorResCtto
?>