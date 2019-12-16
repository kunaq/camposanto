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
        if(count($trabajador) > 0){
        	for ($i=0; $i < count($trabajador) ; $i++) {
        		echo 
                   '<tr style="height: 60px;">
                        <td style="text-align: center;">
                            '.$trabajador[$i]["cod_trabajador"].'
                        </td>
                        <td>
                            '.escapeComillasJson($trabajador[$i]["dsc_apellido_paterno"]).' '.escapeComillasJson($trabajador[$i]["dsc_apellido_materno"]).','.escapeComillasJson($trabajador[$i]["dsc_nombres"]).'
                        </td>                       
                    </tr>';
            }
        }else{
        	echo '';
        }
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
