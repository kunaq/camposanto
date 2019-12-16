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
        return $trabajador;
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
