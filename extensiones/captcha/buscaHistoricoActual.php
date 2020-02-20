<?php
require_once "../../modelo/conexion.php";

   $codTrabajador = $_POST['cod'];

    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT num_anno, cod_tipo_periodo, cod_periodo FROM vtama_periodo WHERE fch_inicio<GETDATE() AND fch_fin>GETDATE();");

		while($key = $db->recorrer($sql)){   
             $num_anno = $key['num_anno'];
             $tipoPeriodo = $key['cod_tipo_periodo'];
             $periodo = $key['cod_periodo'];
		}
		

		$sql2 = $db->consulta("SELECT cod_trabajador, cod_grupo, cod_supervisor, cod_jefeventas FROM vtama_historico_vendedor WHERE cod_trabajador = '$codTrabajador' AND num_anno='$num_anno' AND cod_tipo_periodo = '$tipoPeriodo' AND cod_periodo='$periodo';");

		if ($rows = $db->rows($sql2)){

			$code = "1";

			while($key2 = $db->recorrer($sql2)){   
             $codVendedor = $key2['cod_trabajador'];
             $codGrupo = $key2['cod_grupo'];
             $codSupervisor = $key2['cod_supervisor'];
             $codJefeVentas = $key2['cod_jefeventas'];
			}

			$arrData = array('code'=> $code, 'codVendedor'=>$codVendedor, 'codGrupo'=>$codGrupo, 'codSupervisor'=> $codSupervisor, 'codJefeVentas'=> $codJefeVentas);
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

		}else{
			$code = "0";
			$msg = 'El consejero no se encuentra activo para el presente periodo ['.$num_anno.'-'.$tipoPeriodo.'-'.$periodo.'].';
			$arrData = array('code'=> $code, 'msg'=> $msg);
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		 

    $db->liberar($sql);
 	$db->cerrar();  
?>