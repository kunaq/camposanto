<?php
require_once "../core.php";
require_once "../funciones.php";
require_once "../controlador/cobranzas.controlador.php";
require_once "../modelo/cobranzas.modelo.php";
class TablaGesCob{
	/*=============================================
	MOSTRAR CONTRATOS POR COBRADOR
	=============================================*/
	public function mostrarTablaGesCob(){
        $contratos = ControladorArbolVen::ctrMostrarTrabajadores();
        if(count($contratos) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($contratos) ; $i++) {
						// $fchGeneracion = ($contratos[$i]["fch_generacion"] != '') ? dateFormat($contratos[$i]["fch_generacion"]) : '';
				 		$datosJson .= '[
							"'.escapeComillasJson($contratos[$i]["cod_contrato"]).'",
							"'.escapeComillasJson($contratos[$i]["dsc_cliente"]).'",
							"'.$contratos[$i]["num_refinanciamiento"].'|'.$contratos[$i]['cod_contrato'].'|'.$contratos[$i]['cod_trabajador'].'|'.$contratos[$i]['cod_periodo'].'|'.$contratos[$i]['cod_tipo_cartera'].'|'.$contratos[$i]['cod_anno'].'"
						],';
					}			 	
					$datosJson = substr($datosJson, 0, -1);
				$datosJson .= ']
			}';
        }else{
        	$datosJson = '{
				"data": []
			}';
        }
        echo $datosJson;
	}//function mostrarTablaGesCob
}//class TablaGesCob
/*=============================================
ACTIVAR TABLA CONTRATOS
=============================================*/
$activarTablaGesCob = new TablaGesCob();
$activarTablaGesCob -> mostrarTablaGesCob();