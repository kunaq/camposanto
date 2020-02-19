<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$tablaViServ,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio, $tabla8.dsc_tipo_servicio, $tabla3.cod_camposanto_actual, $tabla3.cod_plataforma_actual, $tabla3.cod_areaplataforma_actual, $tabla3.cod_tipoespacio_actual, $tablaViServ.flg_principal FROM $tabla INNER JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente INNER JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato LEFT JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla.cod_empresa INNER JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual INNER JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual INNER JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual INNER JOIN $tabla8 ON $tabla8.cod_tipo_servicio = $tabla.cod_tipo_servicio LEFT JOIN $tablaViServ ON ($tablaViServ.cod_contrato = $tabla.cod_contrato AND $tablaViServ.num_servicio = $tabla.num_servicio AND $tablaViServ.cod_localidad = $tabla.cod_localidad) WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tabla.flg_fondo_mantenimiento = 'NO'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCttos

	static public function mdlBuscaDatosServicio($tablaCtto,$tablaEnt,$tablaTipoSvcio,$tablaViServ,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.*, $tablaEnt.dsc_entidad, $tablaTipoSvcio.dsc_tipo_servicio, $tablaTipoSvcio.cod_tipo_servicio, $tablaViServ.flg_principal FROM $tablaCtto LEFT JOIN $tablaEnt ON $tablaEnt.cod_entidad = $tablaCtto.cod_convenio INNER JOIN $tablaTipoSvcio ON $tablaTipoSvcio.cod_tipo_servicio = $tablaCtto.cod_tipo_servicio LEFT JOIN $tablaViServ ON ($tablaViServ.cod_contrato = $tablaCtto.cod_contrato AND $tablaViServ.num_servicio = $tablaCtto.num_servicio) WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $num_servicio");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaDatosServicio

	static public function mdlBuscaServPpal($tablaCttoSvcio,$tablaMaSvcio,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCttoSvcio.cod_servicio_principal, $tablaCttoSvcio.num_ctd, $tablaCttoSvcio.imp_precio_venta, $tablaCttoSvcio.imp_min_inhumar, $tablaCttoSvcio.imp_subtotal, $tablaCttoSvcio.imp_igv, $tablaCttoSvcio.imp_total,$tablaMaSvcio.dsc_servicio FROM $tablaCttoSvcio INNER JOIN $tablaMaSvcio ON $tablaCttoSvcio.cod_servicio_principal = $tablaMaSvcio.cod_servicio WHERE $tablaCttoSvcio.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCttoSvcio.num_servicio = $num_servicio");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaServPpal

	static public function mdlBuscaDsctoXCtto($tablaDscto,$tablaMaDcsto,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaDscto.flg_tasa, $tablaMaDcsto.dsc_tipo_descuento, $tablaDscto.flg_libre, $tablaDscto.cod_usuario, $tablaDscto.fch_registro, $tablaDscto.imp_valor, $tablaDscto.imp_dscto FROM $tablaDscto LEFT JOIN $tablaMaDcsto ON $tablaMaDcsto.cod_tipo_descuento = $tablaDscto.cod_tipo_descuento WHERE $tablaDscto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaDscto.num_servicio = $num_servicio");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaDsctoXCtto

	static public function mdlBuscaEndXCtto($tablaEndoso,$tablaMaEnd,$codCtto,$num_servicio){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaMaEnd.dsc_entidad, $tablaEndoso.imp_valor, $tablaEndoso.imp_saldo, $tablaEndoso.imp_total_emitido, $tablaEndoso.cod_usuario, $tablaEndoso.fch_registro, $tablaEndoso.cod_estado, $tablaEndoso.fch_vencimiento, $tablaEndoso.fch_cancelacion FROM $tablaEndoso INNER JOIN $tablaMaEnd ON $tablaMaEnd.cod_entidad = $tablaEndoso.cod_entidad WHERE $tablaEndoso.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaEndoso.num_servicio = $num_servicio");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaEndXCtto

	static public function mdlBuscaCliente($tablaCliente,$tablaDireccion,$tablaPais,$tablaDpto,$tablaProvi,$tablaDtto,$tablaZona,$codCliente){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCliente.*, $tablaDireccion.*, $tablaPais.dsc_pais, $tablaDpto.dsc_departamento, $tablaProvi.dsc_provincia,$tablaDtto.dsc_distrito, $tablaZona.dsc_tipo_zona FROM $tablaCliente LEFT JOIN $tablaDireccion ON $tablaDireccion.cod_cliente = $tablaCliente.cod_cliente INNER JOIN $tablaPais ON $tablaPais.cod_pais = $tablaDireccion.cod_pais INNER JOIN $tablaDpto ON $tablaDpto.cod_departamento = $tablaDireccion.cod_departamento INNER JOIN $tablaProvi ON $tablaProvi.cod_provincia = $tablaDireccion.cod_provincia INNER JOIN $tablaDtto ON $tablaDtto.cod_distrito = $tablaDireccion.cod_distrito LEFT JOIN $tablaZona ON $tablaZona.cod_tipo_zona = $tablaDireccion.cod_tipo_zona WHERE $tablaCliente.cod_cliente = '$codCliente'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCliente

	static public function mdlBuscaCronograma($tablaCronograma,$codCtto,$num_refinanciamiento){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_cuota, cod_estadocuota, fch_vencimiento, imp_principal, imp_interes, imp_igv, imp_saldo, imp_total FROM $tablaCronograma WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND num_refinanciamiento = $num_refinanciamiento AND num_cuota != 0 AND cod_tipo_cuota != 'FMA' ORDER BY num_cuota ASC");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCronograma

	static public function mdlBuscaCronogramaFOMA($tablaCronograma,$codCtto,$num_refinanciamiento){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_cuota, cod_estadocuota, fch_vencimiento, imp_saldo, imp_total FROM $tablaCronograma WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND num_refinanciamiento = $num_refinanciamiento AND num_cuota != 0 AND cod_tipo_cuota = 'FMA' ORDER BY num_cuota ASC");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCronogramaFOMA

	static public function mdlBuscaObservaciones($tablaObservacion,$codCtto,$num_servicio){
		$db = new Conexion();
		 $sql = $db->consulta("SELECT $tablaObservacion.num_linea, $tablaObservacion.dsc_observacion, $tablaObservacion.cod_usuario, $tablaObservacion.fch_registro, $tablaObservacion.flg_automatico FROM $tablaObservacion WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND num_servicio = $num_servicio");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaObservaciones

	static public function mdlValUsoServ($tablaAut,$tablaEdo,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT COUNT(1) FROM $tablaAut INNER JOIN $tablaEdo ON $tablaEdo.cod_estado_autorizacion = $tablaAut.cod_estado_autorizacion WHERE $tablaEdo.flg_anulado = 'NO' AND $tablaAut.cod_localidad_ctt = '".$datos['ls_localidad']."' AND $tablaAut.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaAut.num_servicio = ".$datos['ls_servicio']." AND $tablaAut.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaAut.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlValUsoServ

	static public function mdlVerificaComprobante($tablaCtto,$tablaComp,$tablaCuotas,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tablaCtto.cod_contrato, $tablaCtto.num_servicio, $tablaCtto.num_cuotas, $tablaCtto.cod_cuota, vtavi_cuotas_x_comprobante.*, vtavi_cronograma_x_servicio.* FROM $tablaCtto INNER JOIN vtavi_cuotas_x_comprobante ON ($tablaCtto.cod_contrato = vtavi_cuotas_x_comprobante.cod_contrato AND $tablaCtto.num_refinanciamiento = vtavi_cuotas_x_comprobante.num_refinanciamiento) INNER JOIN vtavi_cronograma_x_servicio ON ($tablaCtto.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato AND $tablaCtto.num_servicio = vtavi_cronograma_x_servicio.num_servicio) WHERE $tablaCtto.cod_contrato = LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCtto.num_servicio = ".$datos['ls_servicio']);
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlVerificaTrans

	static public function mdlVerificaTrans($tablaCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  $tablaCtto.flg_derecho_sepultura, $tablaCtto.num_servicio_foma FROM        $tablaCtto WHERE $tablaCtto.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCtto.num_servicio = ".$datos['ls_servicio']." AND $tablaCtto.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCtto.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlVerificaTrans

	static public function mdlReplicaDatos($tablaCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tablaCtto SET $tablaCtto.fch_anulacion = '".$datos['ldt_fch_actual']."', $tablaCtto.flg_anulado = 'SI', $tablaCtto.cod_usuario_anulacion = '".$datos['gs_usuario']."' WHERE $tablaCtto.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCtto.num_servicio = ".$datos['ls_servicio']." AND $tablaCtto.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCtto.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlReplicaDatos

	static public function mdlActualizaFoma($tablaCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE  $tablaCtto SET $tablaCtto.fch_anulacion = '".$datos['ldt_fch_actual']."', $tablaCtto.flg_anulado = 'SI', $tablaCtto.cod_usuario_anulacion = '".$datos['gs_usuario']."' WHERE $tablaCtto.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCtto.num_servicio = ".$datos['ls_servicio_foma']." AND $tablaCtto.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCtto.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'");
			echo "UPDATE  $tablaCtto SET $tablaCtto.fch_anulacion = '".$datos['ldt_fch_actual']."', $tablaCtto.flg_anulado = 'SI', $tablaCtto.cod_usuario_anulacion = '".$datos['gs_usuario']."' WHERE $tablaCtto.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCtto.num_servicio = ".$datos['ls_servicio_foma']." AND $tablaCtto.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCtto.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'";
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaFoma

	static public function mdlActualizaCronograma($tablaCrono,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE  $tablaCrono SET $tablaCrono.cod_estadocuota_ant = $tablaCrono.cod_estadocuota WHERE $tablaCrono.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCrono.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCrono.num_refinanciamiento = ".$datos['li_ref']." AND $tablaCrono.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCrono.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."'");
		$sql1 = $db->consulta("UPDATE $tablaCrono SET $tablaCrono.cod_estadocuota = 'ANU' WHERE $tablaCrono.cod_localidad = '".$datos['ls_localidad']."' AND $tablaCrono.cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND $tablaCrono.cod_tipo_ctt = '".$datos['ls_tipo_ctt']."' AND $tablaCrono.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaCrono.num_refinanciamiento = ".$datos['li_ref']." AND $tablaCrono.cod_estadocuota IN ('REG', 'EMI')");
		if($sql && $sql1){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaCronograma

	static public function mdlModificado($tablaResCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tablaResCtto SET $tablaResCtto.cod_localidad_nuevo = $tablaResCtto.cod_localidad, $tablaResCtto.cod_contrato_nuevo = $tablaResCtto.cod_contrato, $tablaResCtto.num_servicio_nuevo = $tablaResCtto.num_servicio, $tablaResCtto.cod_tipo_programa_nuevo = $tablaResCtto.cod_tipo_programa, $tablaResCtto.cod_tipo_ctt_nuevo = $tablaResCtto.cod_tipo_ctt WHERE $tablaResCtto.cod_localidad_nuevo = '".$datos['ls_localidad']."' AND $tablaResCtto.cod_tipo_programa_nuevo = '".$datos['ls_tipo_programa']."' AND $tablaResCtto.cod_tipo_ctt_nuevo = '".$datos['ls_tipo_ctt']."' AND $tablaResCtto.cod_contrato_nuevo LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND $tablaResCtto.num_servicio_nuevo = ".$datos['ls_item_servicio_getrow']);
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlModificado

	static public function mdlGeneraEspacio($datos){
		$db = new Conexion();
		$sql = $db->consulta("EXEC usp_vta_prc_genera_espacio '".$datos['as_camposanto']."', '".$datos['as_plataforma']."', '".$datos['as_area']."', '".$datos['as_eje_horizontal']."', '".$datos['as_eje_vertical']."', '".$datos['as_espacio']."', '".$datos['as_tipo_espacio']."'");
		if ($sql) {
			return true;
		}else{
			return false;
		}
	}//function mdlGeneraEspacio

	static public function mdlValidaPagos($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  vtavi_cuotas_x_comprobante.* FROM vtavi_cuotas_x_comprobante INNER JOIN vtade_comprobante ON vtade_comprobante.num_correlativo = vtavi_cuotas_x_comprobante.num_correlativo INNER JOIN vtade_contrato ON (vtade_contrato.cod_contrato = vtavi_cuotas_x_comprobante.cod_contrato AND vtade_contrato.num_refinanciamiento = vtavi_cuotas_x_comprobante.num_refinanciamiento) WHERE (vtade_contrato.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10)) AND vtade_contrato.num_refinanciamiento = ".$datos['li_ref'].")");
		if ($sql) {
			return true;
		}else{
			return false;
		}
	}//function mdlValidaPagos

	static public function mdlBuscaBeneficiario($tablaBen,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT * FROM $tablaBen WHERE (cod_contrato LIKE (RIGHT('0000000000'+'".$datos['codCtto']."',10)) AND cod_localidad = ".$datos['localidad'].")");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaBeneficiario

}//class ModeloModifCtto
?>