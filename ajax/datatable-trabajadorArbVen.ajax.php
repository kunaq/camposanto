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
        $contratos = ControladorArbolVen::ctrMostrarTrabajadores($anno,$periodo,$cobrador);
        if(count($contratos) > 0){
        	$datosJson = '{
			 	"data": [';
				 	for ($i=0; $i < count($contratos) ; $i++) {
						$fchGeneracion = ($contratos[$i]["fch_generacion"] != '') ? dateFormat($contratos[$i]["fch_generacion"]) : '';
						$fchVencimiento = ($contratos[$i]["fch_vencimiento"] != '') ? dateFormat($contratos[$i]["fch_vencimiento"]) : '';
						if($contratos[$i]['cod_estado'] == 'EMI'){
							$edo = 'EMITIDO';
						}else if($contratos[$i]['cod_estado'] == 'DES'){
							$edo = 'DESEMBOLSADO';
						}else if($contratos[$i]['cod_estado'] == 'APR'){
							$edo = 'APROBADO';
						}else if($contratos[$i]['cod_estado'] == 'ANU'){
							$edo = "<p style='color:red'>ANULADO</p>";
						}
				 		$datosJson .= '[
							"'.escapeComillasJson($contratos[$i]["cod_contrato"]).'",
							"'.escapeComillasJson($contratos[$i]["dsc_cliente"]).'",
							"'.$fchGeneracion.'",
							"'.escapeComillasJson($contratos[$i]["dsc_producto"]).'",
							"'.number_format($contratos[$i]["imp_prestamo"],2).'",
							"'.escapeComillasJson($contratos[$i]["num_cuota"]).'",
							"'.$fchVencimiento.'",
							"'.$edo.'",
							"'.escapeComillasJson($contratos[$i]["num_dias_atraso"]).'", 
							"'.number_format($contratos[$i]["imp_cobrado_total"],2).'",
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