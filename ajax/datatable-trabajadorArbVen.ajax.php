<?php
require_once "../core.php";
require_once "../funciones.php";
require_once "../controlador/arbolVen.controlador.php";
require_once "../modelo/arbolVen.modelo.php";
class TablaArbVen{
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE DESEMBOLSO
	=============================================*/
	public function mostrarTablaTrabArbVen(){
        $trabajador = ControladorArbolVen::ctrMostrarTraArbolVen();
        if(count($trabajador) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($trabajador) ; $i++) {
						$datosJson .= '[
							"'.escapeComillasJson($trabajador[$i]["cod_trabajador"]).'",
							"'.escapeComillasJson($trabajador[$i]["dsc_apellido_paterno"]).' '.escapeComillasJson($trabajador[$i]["dsc_apellido_materno"]).','.escapeComillasJson($trabajador[$i]["dsc_nombres"]).'"
						],';
					}//for
					$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}//function mostrarTablaCliente
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE EMISION DE
	CONTRATO, OPCION AVAL
	=============================================*/
	public function mostrarTablaCteAvalEmsCnt(){
		$item1 = ($_GET["flgAval"] == 'SI') ? "dsc_documento" : "dsc_cliente";
		$valor1 = $_GET["datos"];
		$item2 = $valor2 = null;
        $entrada = 'datatableClienteEmsCnt';;
        $cliente = ControladorArbVen::ctrMostrarArbVen($item1,$valor1,$item2,$valor2,$entrada);
        if(count($cliente) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($cliente) ; $i++) {
				 		$datosJson .= '[
				 			"'.($i+1).'",
							"'.escapeComillasJson($cliente[$i]["dsc_cliente"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_tipo_documento"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_documento"]).'",
							"'.$cliente[$i]["cod_cliente"].'|'.$cliente[$i]["contCntSpl"].'"
						],';
				 	}//for
				 	$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}//function mostrarTablaCteAvalEmsCnt
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE EMISION DE
	CONTRATO, OPCION AVAL
	=============================================*/
	public function mostrarTablaAvalEmsCnt(){
		$item1 = "dsc_documento";
		$valor1 = $_GET["datos"];
		$item2 = $valor2 = null;
        $entrada = 'datatableAvalEmsCnt';;
        $cliente = ControladorArbVen::ctrMostrarArbVen($item1,$valor1,$item2,$valor2,$entrada);
        if(count($cliente) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($cliente) ; $i++) {
				 		$datosJson .= '[
				 			"'.($i+1).'",
							"'.escapeComillasJson($cliente[$i]["dsc_cliente"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_tipo_documento"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_documento"]).'",
							"'.$cliente[$i]["cod_cliente"].'"
						],';
				 	}//for
				 	$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}//function mostrarTablaAvalEmsCnt
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE MODIFICACIÓN
	DE CONTRATO
	=============================================*/
	public function mostrarTablaCteMdfCto(){
		$item1 = 'dsc_documento';
		$valor1 = $_GET["datos"];
		$item2 = 'dsc_cliente';
		$valor2 = $_GET["datos"];
        $entrada = 'datatableMdfCto';
        $cliente = ControladorArbVen::ctrMostrarArbVen($item1,$valor1,$item2,$valor2,$entrada);
        if(count($cliente) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($cliente) ; $i++) {				 		
				 		$datosJson .= '[
							"'.($i+1).'",
							"'.escapeComillasJson($cliente[$i]["dsc_cliente"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_tipo_documento"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_documento"]).'",
							"'.$cliente[$i]["cod_cliente"].'|'.$cliente[$i]["contCntPst"].'"
						],';
					}//for
					$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}//function mostrarTablaCliente
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE PROVEEDOR
	=============================================*/
	public function mostrarTablaCteProv(){
		$item1 = 'dsc_cliente';
		$valor1 = $_GET["datos"];
		$item2 = $valor2 = null;
        $entrada = 'datatableProv';
        $cliente = ControladorArbVen::ctrMostrarArbVen($item1,$valor1,$item2,$valor2,$entrada);
        if(count($cliente) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($cliente) ; $i++) {				 		
				 		$datosJson .= '[
							"'.($i+1).'",
							"'.escapeComillasJson($cliente[$i]["dsc_cliente"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_tipo_documento"]).'",
							"'.escapeComillasJson($cliente[$i]["dsc_documento"]).'",
							"'.$cliente[$i]["cod_cliente"].'"
						],';
					}//for
					$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}
}//class TablaArbVen
/*=============================================
ACTIVAR TABLA CLIENTE
=============================================*/
$activarTablaCliente = new TablaArbVen();
if(isset($_GET["entrada"]) && $_GET["entrada"] == 'verTrabajadores'){	
	$activarTablaCliente -> mostrarTablaTrabArbVen();
}
// else if(isset($_GET["entrada"]) && $_GET["entrada"] == 'vntAvalEmsCnt'){	
// 	$activarTablaCliente -> mostrarTablaAvalEmsCnt();
// }
