<?php
require_once "../funciones.php";
require_once "../controlador/arbolVen.controlador.php";
require_once "../modelo/arbolVen.modelo.php";
class TablaArbVen{
	/*=============================================
	MOSTRAR CLIENTE DE LA VENTANA DE DESEMBOLSO
	=============================================*/
	public function mostrarTablaTrabArbVen(){
        $trabajador = ControladorArbolVen::ctrMostrarTraArbolVen();
        var_dump($trabajador);
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
	
}//class TablaArbVen
/*=============================================
ACTIVAR TABLA CLIENTE
=============================================*/
$activarTablaCliente = new TablaArbVen();
if(isset($_POST["entrada"]) && $_POST["entrada"] == 'verTrabajadores'){	
	$activarTablaCliente -> mostrarTablaTrabArbVen();
}
// else if(isset($_GET["entrada"]) && $_GET["entrada"] == 'vntAvalEmsCnt'){	
// 	$activarTablaCliente -> mostrarTablaAvalEmsCnt();
// }
