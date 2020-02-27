<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloModifCtto{

	static public function mdlBuscaCttos($tabla,$tabla2,$tabla3,$tabla4,$tabla5,$tabla6,$tabla7,$tabla8,$tablaViServ,$codCtto){
		$db = new Conexion();
		$sql = $db->consulta("SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio, $tabla8.dsc_tipo_servicio, $tabla8.flg_afecto_igv, $tabla8.flg_prevencion, $tablaViServ.flg_principal FROM $tabla LEFT JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente LEFT JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato LEFT JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla.cod_empresa LEFT JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual LEFT JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual LEFT JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual LEFT JOIN $tabla8 ON $tabla8.cod_tipo_servicio = $tabla.cod_tipo_servicio LEFT JOIN $tablaViServ ON ($tablaViServ.cod_contrato = $tabla.cod_contrato AND $tablaViServ.num_servicio = $tabla.num_servicio AND $tablaViServ.cod_localidad = $tabla.cod_localidad) WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tabla.flg_fondo_mantenimiento = 'NO'");
		echo "SELECT $tabla.*, $tabla2.dsc_cliente, $tabla3.*, $tabla4.dsc_camposanto, $tabla5.dsc_area, $tabla6.dsc_plataforma, $tabla7.dsc_tipo_espacio, $tabla8.dsc_tipo_servicio, $tabla8.flg_afecto_igv, $tabla8.flg_prevencion, $tablaViServ.flg_principal FROM $tabla LEFT JOIN $tabla2 ON $tabla.cod_cliente = $tabla2.cod_cliente LEFT JOIN $tabla3 ON $tabla.cod_contrato = $tabla3.cod_contrato LEFT JOIN $tabla4 ON $tabla4.cod_camposanto = $tabla.cod_empresa LEFT JOIN $tabla5 ON $tabla5.cod_area_plataforma = $tabla3.cod_areaplataforma_actual LEFT JOIN  $tabla6 ON $tabla6.cod_plataforma = $tabla3.cod_plataforma_actual LEFT JOIN $tabla7 ON $tabla7.cod_tipo_espacio = $tabla3.cod_tipoespacio_actual LEFT JOIN $tabla8 ON $tabla8.cod_tipo_servicio = $tabla.cod_tipo_servicio LEFT JOIN $tablaViServ ON ($tablaViServ.cod_contrato = $tabla.cod_contrato AND $tablaViServ.num_servicio = $tabla.num_servicio AND $tablaViServ.cod_localidad = $tabla.cod_localidad) WHERE $tabla.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tabla.flg_fondo_mantenimiento = 'NO'";
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
		$sql = $db->consulta("SELECT $tablaCtto.*, $tablaEnt.dsc_entidad, $tablaTipoSvcio.dsc_tipo_servicio, $tablaTipoSvcio.cod_tipo_servicio,$tablaTipoSvcio.flg_prevencion, $tablaViServ.flg_principal FROM $tablaCtto LEFT JOIN $tablaEnt ON $tablaEnt.cod_entidad = $tablaCtto.cod_convenio INNER JOIN $tablaTipoSvcio ON $tablaTipoSvcio.cod_tipo_servicio = $tablaCtto.cod_tipo_servicio LEFT JOIN $tablaViServ ON ($tablaViServ.cod_contrato = $tablaCtto.cod_contrato AND $tablaViServ.num_servicio = $tablaCtto.num_servicio) WHERE $tablaCtto.cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND $tablaCtto.num_servicio = $num_servicio");
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
		$sql = $db->consulta("SELECT $tablaCliente.*, $tablaDireccion.*, $tablaPais.dsc_pais, $tablaDpto.dsc_departamento, $tablaProvi.dsc_provincia,$tablaDtto.dsc_distrito, $tablaZona.dsc_tipo_zona FROM $tablaCliente LEFT JOIN $tablaDireccion ON $tablaDireccion.cod_cliente = $tablaCliente.cod_cliente LEFT JOIN $tablaPais ON $tablaPais.cod_pais = $tablaDireccion.cod_pais LEFT JOIN $tablaDpto ON $tablaDpto.cod_departamento = $tablaDireccion.cod_departamento LEFT JOIN $tablaProvi ON $tablaProvi.cod_provincia = $tablaDireccion.cod_provincia LEFT JOIN $tablaDtto ON $tablaDtto.cod_distrito = $tablaDireccion.cod_distrito LEFT JOIN $tablaZona ON $tablaZona.cod_tipo_zona = $tablaDireccion.cod_tipo_zona WHERE $tablaCliente.cod_cliente = '$codCliente'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//mdlBuscaCliente

	static public function mdlBuscaCronograma($tablaCronograma,$codCtto,$num_refinanciamiento){
		$db = new Conexion();
		$sql = $db->consulta("SELECT num_cuota, cod_estadocuota, fch_vencimiento, imp_principal, imp_interes, imp_igv, imp_saldo, imp_total, cod_tipo_cuota FROM $tablaCronograma WHERE cod_contrato LIKE (RIGHT('0000000000'+'$codCtto',10)) AND num_refinanciamiento = $num_refinanciamiento AND num_cuota != 0 AND cod_tipo_cuota != 'FMA' ORDER BY num_cuota ASC");
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

	static public function mdlBuscaCodCuotas($tablaCuo,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT cod_cuota FROM $tablaCuo WHERE num_cuotas = $datos");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaCodCuotas

	static public function mdlBuscaCodInteres($tablaInt,$datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT cod_interes FROM $tablaInt WHERE num_valor = $datos");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaCodInteres

	static public function mdlBuscaCtdBenef($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg){
		$db = new Conexion();
		$sql = $db->consulta("SELECT * FROM $tabla WHERE cod_localidad = '$localidad' AND cod_tipo_ctt = '$tipoCtto' AND cod_tipo_programa = '$tipoProg' AND cod_contrato LIKE (RIGHT('0000000000'+'".$codCtto."',10))");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaCtdBenef

	static public function mdlBuscaMaxCuotas($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$refi){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  MAX(num_cuota) AS max FROM $tabla WHERE cod_localidad = '$localidad' AND cod_tipo_programa = '$tipoProg' AND cod_contrato = '$codCtto' AND num_refinanciamiento = $refi AND cod_contrato LIKE (RIGHT('0000000000'+'".$codCtto."',10))");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaMaxCuotas

	static public function mdlBuscaMaxValorCuotas($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$refi){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  MAX(imp_total) AS max FROM $tabla WHERE cod_localidad = '$localidad' AND cod_tipo_ctt = '$tipoCtto' AND cod_tipo_programa = '$tipoProg' AND num_refinanciamiento = $refi AND cod_tipo_cuota = 'ARM' AND cod_contrato LIKE (RIGHT('0000000000'+'".$codCtto."',10))");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaMaxValorCuotas

	static public function mdlBuscaCostoCarencia($tabla,$localidad,$codCtto,$tipoCtto,$tipoProg,$tipoServ){
		$db = new Conexion();
		$sql = $db->consulta("SELECT imp_costo_carencia FROM $tabla WHERE cod_localidad = '$localidad' AND cod_tipo_ctt = '$tipoCtto' AND cod_tipo_programa = '$tipoProg' AND num_servicio = '$tipoServ' AND flg_servicio_principal = 'SI' AND cod_contrato LIKE (RIGHT('0000000000'+'".$codCtto."',10))");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlBuscaCostoCarencia

	static public function mdlRpDatosMod($tablaCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tablaCtto SET cod_vendedor = '".$datos['ls_vendedor']."', cod_supervisor = '".$datos['ls_supervisor']."', cod_jefeventas = '".$datos['ls_jefe']."', cod_grupo = '".$datos['ls_grupo']."', cod_canal_venta = '".$datos['ls_canal']."', cod_tipo_comisionista = '".$datos['ls_tipo_comisionista']."', cod_cuota = '".$datos['ls_cuota']."', num_cuotas = ".$datos['li_cuotas'].", cod_interes = '".$datos['ls_interes']."', fch_primer_vencimiento = '".$datos['ldt_fch_venc']."', imp_tasa_interes = ".$datos['lde_tasa'].", fch_emision = ( CASE WHEN fch_emision IS NULL THEN '".$datos['ldt_fch_actual']."' ELSE fch_emision END ), flg_emitido = 'SI', cod_usuario_emision = '".$datos['gs_usuario']."', flg_agencia = '".$datos['ls_flg_agencia']."', cod_agencia = '".$datos['ls_agencia']."', cod_convenio = '".$datos['ls_convenio']."', cod_titular_alterno = '".$datos['ls_cliente_alterno']."', cod_aval = '".$datos['ls_aval']."', cod_empresa = '".$datos['gs_empresa']."', cod_cobrador = '".$datos['ls_cod_cobrador']."', imp_valor_cuota = ".$datos['lde_valor_cuota'].", imp_interes = ".$datos['lde_tot_interes'].", cod_zona = '".$datos['ls_zona']."', imp_costo_carencia = ".$datos['lde_costo_carencia']." WHERE cod_localidad = '".$datos['ls_localidad']."' AND cod_tipo_ctt = '".$datos['ls_tipo_ctt']."' AND cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND num_servicio = '".$datos['ls_servicio']."' AND cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10))");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlRpDatosMod

	static public function mdlActFOMAMod($tablaCtto,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tablaCtto SET cod_vendedor = '".$datos['ls_vendedor']."', cod_supervisor = '".$datos['ls_supervisor']."', cod_jefeventas = '".$datos['ls_jefe']."', cod_grupo = '".$datos['ls_grupo']."', cod_canal_venta = '".$datos['ls_canal']."', cod_tipo_comisionista = '".$datos['ls_tipo_comisionista']."', cod_cuota = '".$datos['ls_cuota_foma']."', num_cuotas = ".$datos['li_cuotas_foma'].", fch_primer_vencimiento = '".$datos['ldt_fch_venc_foma']."', fch_emision = ( CASE WHEN fch_emision IS NULL THEN '".$datos['ldt_fch_actual']."' ELSE fch_emision END ), flg_emitido = 'SI', cod_usuario_emision = '".$datos['gs_usuario']."', cod_titular_alterno = '".$datos['ls_cliente_alterno']."', cod_aval = '".$datos['ls_aval']."', cod_cobrador = '".$datos['ls_cod_cobrador']."', imp_valor_cuota = ".$datos['lde_valor_cuota'].", cod_zona = '".$datos['ls_zona']."' WHERE cod_localidad = '".$datos['ls_localidad']."' AND cod_tipo_ctt = '".$datos['ls_tipo_ctt']."' AND cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND num_servicio = '".$datos['ls_servicio_foma']."' AND cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10))");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActFOMAMod

	static public function mdlGuardaBeneficiarios($tablabenef,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tablabenef  SET dsc_apellidopaterno = '".$datos['dsc_apellidopaterno']."', dsc_apellidomaterno = '".$datos['dsc_apellidopaterno']."', dsc_nombre = '".$datos['dsc_nombre']."', cod_tipo_documento = '".$datos['cod_tipo_documento']."', dsc_documento = '".$datos['dsc_documento']."', fch_nacimiento = '".$datos['fch_nacimiento']."', fch_entierro = '".$datos['fch_entierro']."', num_nivel = ".$datos['num_nivel'].", fch_deceso = '".$datos['fch_deceso']."', cod_religion = '".$datos['cod_religion']."', cod_lugar_deceso = '".$datos['cod_lugar_deceso']."', cod_motivo_deceso = '".$datos['cod_motivo_deceso']."', flg_autopsia = '".$datos['flg_autopsia']."', num_peso = ".$datos['num_peso'].", num_talla = ".$datos['num_talla'].", cod_estado_civil = '".$datos['cod_estado_civil']."', cod_sexo = '".$datos['cod_sexo']."', cod_parentesco = '".$datos['cod_parentesco']."' WHERE cod_localidad = '".$datos['ls_localidad']."' AND num_item = ".$datos['num_item']."  AND num_servicio = '".$datos['num_servicio']."' AND cod_contrato LIKE (RIGHT('0000000000'+'".$datos['cod_contrato']."',10))");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaBeneficiarios

	static public function mdlActResCronoMod($tabla,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tabla SET num_cuotas = ".$datos['li_total_cuotas'].", cod_interes = '".$datos['ls_interes']."', imp_tasainteres = ".$datos['lde_tasa'].", imp_interes = ".$datos['lde_tot_interes']." WHERE cod_localidad = '".$datos['ls_localidad']."' AND cod_tipo_ctt = '".$datos['ls_tipo_ctt']."' AND cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND num_refinanciamiento = ".$datos['li_ref']." AND cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10))");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActResCronoMod

	static public function mdlActCabeceraMod($tabla,$datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE $tabla SET cod_tipo_contrato = '".$datos['ls_tipo_contrato']."'  WHERE cod_localidad = '".$datos['ls_localidad']."' AND cod_tipo_ctt = '".$datos['ls_tipo_ctt']."' AND cod_tipo_programa = '".$datos['ls_tipo_programa']."' AND cod_contrato LIKE (RIGHT('0000000000'+'".$datos['ls_contrato']."',10))");
		if($sql){
			return true;
		}else{
			return false;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActCabeceraMod

	static public function mdllineaMaxObsrv($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT Max(num_linea) AS num_linea FROM vtade_observacion_x_contrato WHERE vtade_observacion_x_contrato.cod_localidad = '".$datos['cod_localidad']."' AND	vtade_observacion_x_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."' AND		vtade_observacion_x_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."' AND	vtade_observacion_x_contrato.cod_contrato LIKE (RIGHT('0000000000'+'".$datos['cod_contrato']."',10)) AND vtade_observacion_x_contrato.num_servicio = '".$datos['num_servicio']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_linea'])) {
				$num_linea = 0;
			}else{
				$num_linea = $key['num_linea'];
			}
		}
		$num_linea = $num_linea + 1;

		$sql2 = $db->consulta("INSERT INTO vtade_observacion_x_contrato ( cod_localidad, cod_contrato, num_servicio, num_linea, cod_area, dsc_observacion,cod_usuario, fch_registro, flg_automatico, cod_tipo_ctt, cod_tipo_programa ) 
			VALUES ( '".$datos['cod_localidad']."', (RIGHT('0000000000'+'".$datos['cod_contrato']."',10)), '".$datos['num_servicio']."', '$num_linea', '".$datos['cod_area']."', '".$datos['dsc_observacion']."', '".$datos['usuario']."', '".$datos['fch_actual']."', 'NO','".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."' )");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaObservacion

	static public function ctrGuardaCronograma($tabla,$datos){
		$db = new Conexion();
		$sql = $db->consulta("DELETE FROM  AND cod_contrato c");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function ctrGuardaCronograma

	static public function mdlTotalFinanciar($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  SUM(vtade_contrato_servicio.imp_total - vtade_contrato_servicio.imp_cuoi) AS lde_saldo_total FROM vtade_contrato INNER JOIN vtavi_cronograma_x_servicio ON vtavi_cronograma_x_servicio.cod_localidad = vtade_contrato.cod_localidad AND vtavi_cronograma_x_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt AND vtavi_cronograma_x_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa AND vtavi_cronograma_x_servicio.cod_contrato = vtade_contrato.cod_contrato AND vtavi_cronograma_x_servicio.num_servicio = vtade_contrato.num_servicio INNER JOIN vtade_contrato_servicio ON vtade_contrato_servicio.cod_localidad = vtade_contrato.cod_localidad AND vtade_contrato_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt AND vtade_contrato_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa AND vtade_contrato_servicio.cod_contrato = vtade_contrato.cod_contrato AND vtade_contrato_servicio.num_servicio = vtade_contrato.num_servicio INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio WHERE vtavi_cronograma_x_servicio.cod_localidad = '".$datos['ls_localidad_det']."'' AND vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['ls_tipo_ctt_det']."'' AND vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['ls_tipo_programa_det']."'' AND vtavi_cronograma_x_servicio.cod_contrato LIKE (RIGHT('0000000000'+'".$datso['ls_contrato_det']."',10)) AND vtavi_cronograma_x_servicio.num_refinanciamiento = ".$datos['li_ref']." AND vtavi_cronograma_x_servicio.flg_activo = 'SI' AND vtade_contrato_servicio.flg_servicio_principal = 'SI' AND vtade_contrato_servicio.flg_contado = 'NO' AND vtade_contrato.flg_resuelto = 'NO' AND vtade_contrato.flg_anulado = 'NO'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlTotalFinanciar

	static public function mdlTotalPagado($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  SUM(vtaca_comprobante.imp_total - ISNULL(vtaca_comprobante.imp_saldo, 0)) AS lde_total_pagado FROM vtaca_comprobante WHERE EXISTS(SELECT  1 FROM  vtavi_cuotas_x_comprobante, vtavi_cronograma_x_servicio WHERE vtavi_cuotas_x_comprobante.cod_localidad_ctt = vtavi_cronograma_x_servicio.cod_localidad AND vtavi_cuotas_x_comprobante.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_tipo_ctt AND vtavi_cuotas_x_comprobante.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa AND  vtavi_cuotas_x_comprobante.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato AND  vtavi_cuotas_x_comprobante.num_refinanciamiento = vtavi_cronograma_x_servicio.num_refinanciamiento AND vtavi_cuotas_x_comprobante.cod_localidad = vtaca_comprobante.cod_localidad AND vtavi_cuotas_x_comprobante.num_correlativo = vtaca_comprobante.num_correlativo AND vtavi_cuotas_x_comprobante.num_cuota > 0 AND vtavi_cronograma_x_servicio.cod_localidad = '".$datos['ls_localidad_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['ls_tipo_ctt_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['ls_tipo_programa_det']."' AND vtavi_cronograma_x_servicio.cod_contrato LIKE (RIGHT('0000000000'+'".$datso['ls_contrato_det']."',10)) AND vtavi_cronograma_x_servicio.num_servicio = ".$datos['ls_num_servicio_det']);
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlTotalPagado

	static public function mdlCrServicio($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  (vtade_contrato_servicio.imp_total - vtade_contrato_servicio.imp_cuoi) AS lde_saldo_det, vtama_tipo_servicio.flg_afecto_igv, vtade_contrato_servicio.cod_servicio FROM vtade_contrato INNER JOIN vtavi_cronograma_x_servicio ON vtavi_cronograma_x_servicio.cod_localidad = vtade_contrato.cod_localidad AND vtavi_cronograma_x_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt AND vtavi_cronograma_x_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa AND vtavi_cronograma_x_servicio.cod_contrato = vtade_contrato.cod_contrato AND vtavi_cronograma_x_servicio.num_servicio = vtade_contrato.num_servicio INNER JOIN vtade_contrato_servicio ON vtade_contrato_servicio.cod_localidad = vtade_contrato.cod_localidad AND vtade_contrato_servicio.cod_tipo_ctt = vtade_contrato.cod_tipo_ctt AND vtade_contrato_servicio.cod_tipo_programa = vtade_contrato.cod_tipo_programa AND vtade_contrato_servicio.cod_contrato = vtade_contrato.cod_contrato AND vtade_contrato_servicio.num_servicio = vtade_contrato.num_servicio INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio WHERE vtavi_cronograma_x_servicio.cod_localidad = '".$datos['ls_localidad_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['ls_tipo_ctt_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['ls_tipo_programa_det']."' AND vtavi_cronograma_x_servicio.cod_contrato LIKE (RIGHT('0000000000'+'".$datso['ls_contrato_det']."',10)) AND vtavi_cronograma_x_servicio.num_refinanciamiento = ".$datos['li_ref']." AND vtavi_cronograma_x_servicio.flg_activo = 'SI' AND vtade_contrato_servicio.flg_servicio_principal = 'SI' AND vtade_contrato_servicio.flg_contado = 'NO' AND vtade_contrato.flg_resuelto = 'NO' AND vtade_contrato.flg_anulado = 'NO'");
		$datos = array();
    	while($key = $db->recorrer($sql)){
	    		$datos[] = arrayMapUtf8Encode($key);
			}
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlCrServicio

	static public function mdlPagoXservicio($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT (SUM(vtade_comprobante.imp_total - ISNULL(vtade_comprobante.imp_saldo, 0))) AS lde_total_pagado_x_servicio FROM vtade_comprobante WHERE EXISTS( SELECT 1 FROM  vtavi_cuotas_x_comprobante, vtavi_cronograma_x_servicio WHERE vtavi_cuotas_x_comprobante.cod_localidad_ctt = vtavi_cronograma_x_servicio.cod_localidad AND vtavi_cuotas_x_comprobante.cod_tipo_ctt = vtavi_cronograma_x_servicio.cod_contrato AND vtavi_cuotas_x_comprobante.cod_tipo_programa = vtavi_cronograma_x_servicio.cod_tipo_programa AND vtavi_cuotas_x_comprobante.cod_contrato = vtavi_cronograma_x_servicio.cod_contrato AND vtavi_cuotas_x_comprobante.num_refinanciamiento = vtavi_cronograma_x_servicio.num_refinanciamiento AND vtavi_cuotas_x_comprobante.cod_localidad = vtade_comprobante.cod_localidad AND vtavi_cuotas_x_comprobante.num_correlativo = vtade_comprobante.num_correlativo AND vtavi_cuotas_x_comprobante.num_cuota > 0 AND vtavi_cronograma_x_servicio.cod_localidad = '".$datos['ls_localidad_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_ctt = '".$datos['ls_tipo_ctt_det']."' AND vtavi_cronograma_x_servicio.cod_tipo_programa = '".$datos['ls_tipo_programa_det']."' AND vtavi_cronograma_x_servicio.cod_contrato = '".$datos['ls_contrato_det']."' AND vtavi_cronograma_x_servicio.num_servicio = ".$datos['ls_num_servicio_det']." ) AND   vtade_comprobante.cod_servicio = '".$datos['cod_servicio']."'");
		$datos = arrayMapUtf8Encode($db->recorrer($sql));
		return $datos;
		$db->liberar($sql);
        $db->cerrar();
	}//function mdlPagoXservicio

}//class ModeloModifCtto
?>