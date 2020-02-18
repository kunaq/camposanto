<?php
require_once "conexion.php";
require_once "../funciones.php";
class ModeloCliente{

	static public function mdlInsertaCliente($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT TOP 1 CONVERT(INT,SUBSTRING(
					        cod_cliente, 
					        CHARINDEX('I', cod_cliente)+1, 
					        LEN(cod_cliente)-CHARINDEX('I', cod_cliente))) AS ultimo_registro
					        FROM vtama_cliente ORDER BY cod_cliente DESC");

		while($key = $db->recorrer($sql)){
		    $lastClient = (int)$key['ultimo_registro'];
		}

		$newClient = $lastClient + 1;
		
		$cod_cliente = "CLI".str_pad($newClient, 7, "0", STR_PAD_LEFT);

		$dsc_cliente = $datos['dsc_apellido_paterno']." ".$datos['dsc_apellido_materno'].", ".$datos['dsc_nombre'];

		$sql2 = $db->consulta("INSERT INTO vtama_cliente (cod_cliente, dsc_razon_social, dsc_apellido_paterno, dsc_apellido_materno, dsc_nombre, flg_juridico, cod_tipo_documento, dsc_documento, cod_calificacion, dsc_telefono_1, dsc_telefono_2, dsc_cliente, cod_tipo_contacto, cod_usuario, fch_registro, cod_sexo, cod_estadocivil, cod_categoria, fch_nacimiento, dsc_mail_trabajo, cod_tipo_cliente, flg_domiciliado, cod_tarjeta_cliente, dsc_mail_fe, flg_padron_envio, flg_replicado, flg_prestamo, flg_public_expuesta, flg_partic_politica, flg_aval, flg_tiene_prestamo)
			VALUES ('".$cod_cliente."', '".$datos['dsc_razon_social']."', '".$datos['dsc_apellido_paterno']."', '".$datos['dsc_apellido_materno']."', '".$datos['dsc_nombre']."', '".$datos['flg_juridico']."', '".$datos['cod_tipo_documento']."', '".$datos['dsc_documento']."', '".$datos['cod_calificacion']."', '".$datos['dsc_telefono_1']."', '".$datos['dsc_telefono_2']."', '".$dsc_cliente."', '".$datos['cod_tipo_contacto']."', '".$datos['cod_usuario']."', '".$datos['fch_registro']."', '".$datos['cod_sexo']."', '".$datos['cod_estadocivil']."', '".$datos['cod_categoria']."', '".$datos['fch_nacimiento']."', '".$datos['dsc_email_trabajo']."', '".$datos['cod_tipo_cliente']."', 'SI', '".$datos['cod_tarjeta_cliente']."', '".$datos['dsc_mail_fe']."', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO' )");

		if ($sql2) {
			$respuesta = array('cod' => '1', 'cod_cliente'=> $cod_cliente);
			return $respuesta;
		}else{
			$respuesta = array('cod' => '0');
			return $respuesta;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGetHisTrabajador
	
	static public function mdlInsertaDireccionCliente($datos){
		$db = new Conexion();

		$sql = $db->consulta("SELECT  	Max(num_linea) AS num_linea
							FROM    	vtade_cliente_direccion
							WHERE 		vtade_cliente_direccion.cod_cliente= '".$datos['cod_cliente']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_linea'])) {
				$num_linea = 0;
			}else{
				$num_linea = $key['num_linea'];
			}
		}

		$num_linea = $num_linea + 1;

		$sql2 = $db->consulta("INSERT INTO vtade_cliente_direccion ( cod_cliente, num_linea, cod_pais, cod_departamento, cod_provincia, dsc_direccion, cod_distrito, cod_tipo_direccion, dsc_referencia, dsc_telefono_1, dsc_telefono_2, flg_comprobante, cod_numero, cod_interior, cod_manzana, cod_lote, dsc_urbanizacion, dsc_cadena_direccion, dsc_nombre_direccion, flg_direccion_cobranza)
			VALUES ('".$datos['cod_cliente']."', '$num_linea', '".$datos['cod_pais']."', '".$datos['cod_departamento']."', '".$datos['cod_provincia']."', '".$datos['dsc_direccion']."', '".$datos['cod_distrito']."', 'TD001', '".$datos['dsc_referencia']."', '".$datos['dsc_telefono_1']."', '".$datos['dsc_telefono_2']."', 'SI', '".$datos['cod_numero']."', '".$datos['cod_interior']."', '".$datos['cod_manzana']."', '".$datos['cod_lote']."', '".$datos['dsc_urbanizacion']."', '".$datos['dsc_cadena_direccion']."', 'DOMICILIO', 'SI')");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaVtadeCtt
	
	static public function mdlInsertaResolucion($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT	MAX(vtavi_resolucion_contrato.num_item) AS num_item
								FROM		vtavi_resolucion_contrato
								WHERE	vtavi_resolucion_contrato.cod_localidad = '".$datos['cod_localidad']."'
								AND		vtavi_resolucion_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
								AND		vtavi_resolucion_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
								AND		vtavi_resolucion_contrato.cod_contrato = '".$datos['cod_contrato']."'
								AND		vtavi_resolucion_contrato.num_servicio = '".$datos['num_servicio']."'");
		while($key = $db->recorrer($sql)){
			if (is_null($key['num_item'])) {
				$num_item = 0;
			}else{
				$num_item = $key['num_item'];
			}
		}
		$num_item = $num_item + 1;

		$sql2 = $db->consulta("INSERT INTO vtavi_resolucion_contrato ( cod_localidad, cod_contrato, num_servicio, cod_localidad_nuevo,cod_contrato_nuevo, num_servicio_nuevo, num_item, cod_tipo_movimiento, num_anno_afecto, cod_tipo_periodo_afecto, cod_periodo_afecto, cod_jefe_ventas, cod_supervisor, cod_vendedor, cod_grupo, imp_porc_afecto, imp_afecto, cod_tipo_resolucion, cod_motivo_resolucion, dsc_motivo_usuario, cod_usuario, fch_registro, imp_tc, flg_afecta_comision, imp_pagado, cod_tipo_ctt, cod_tipo_programa, cod_tipo_ctt_nuevo, cod_tipo_programa_nuevo ) 
		VALUES ( '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '$num_item', '".$datos['cod_tipo_movimiento']."', '".$datos['num_anno']."', '".$datos['cod_tipo_periodo']."', '".$datos['cod_periodo']."', '".$datos['cod_jefe_ventas']."', '".$datos['cod_supervisor']."', '".$datos['cod_vendedor']."', '".$datos['cod_grupo']."', ".$datos['imp_porc_afecto'].", ".$datos['imp_afecto'].", '".$datos['cod_tipo_resolucion']."', '".$datos['cod_motivo_resolucion']."', '".$datos['dsc_motivo_usuario']."', '".$datos['usuario']."', '".$datos['fch_actual']."', ".$datos['imp_tc'].", '".$datos['flg_afecta_comision']."', ".$datos['imp_pagado'].", '".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."', '".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."')");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlInsertaResolucion
	
	static public function mdlVerificaFoma($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT	vtade_contrato.num_servicio_foma
							FROM		vtade_contrato
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '".$datos['num_servicio']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_servicio_foma'])) {
				$servicio_foma = 'XX';
			}else{
				$servicio_foma = $key['num_servicio_foma'];
			}
		}

		if ($servicio_foma != 'XX') {
			$sql2 = $db->consulta("UPDATE	vtade_contrato
							SET		vtade_contrato.fch_resolucion = '".$datos['fch_actual']."',
									vtade_contrato.flg_resuelto = 'SI',
									vtade_contrato.cod_usuario_resolucion = '".$datos['usuario']."'
							
							WHERE	vtade_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND		vtade_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND		vtade_contrato.num_servicio = '$servicio_foma'");

			if ($sql2) {
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlVerificaFoma
	
	static public function mdlGuardaObservacion($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT  	Max(num_linea) AS num_linea
							FROM    	vtade_observacion_x_contrato
							WHERE 		vtade_observacion_x_contrato.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_observacion_x_contrato.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_observacion_x_contrato.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND	   	vtade_observacion_x_contrato.cod_contrato = '".$datos['cod_contrato']."'
							AND     	vtade_observacion_x_contrato.num_servicio = '".$datos['num_servicio']."'");

		while($key = $db->recorrer($sql)){
			if (is_null($key['num_linea'])) {
				$num_linea = 0;
			}else{
				$num_linea = $key['num_linea'];
			}
		}
		$num_linea = $num_linea + 1;

		$dsc_observacion = 'SE RESUELVE EL CONTRATO. USUARIO: "'.$datos['usuario'].'". FECHA: "'.dateFormat($datos['fch_format']).'". MOTIVO: '.$datos['cod_motivo_resolucion'].' - '.$datos['dsc_motivo_resolucion'].'.';

		$sql2 = $db->consulta("INSERT INTO vtade_observacion_x_contrato ( cod_localidad, cod_contrato, num_servicio, num_linea, cod_area, dsc_observacion,cod_usuario, fch_registro, flg_automatico, cod_tipo_ctt, cod_tipo_programa ) 
			VALUES ( '".$datos['cod_localidad']."', '".$datos['cod_contrato']."', '".$datos['num_servicio']."', '$num_linea', '".$datos['cod_area']."', '$dsc_observacion', '".$datos['usuario']."', '".$datos['fch_actual']."', 'SI','".$datos['cod_tipo_ctt']."', '".$datos['cod_tipo_programa']."' )");

		if ($sql2) {
			return 1;
		}else{
			return 0;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaObservacion
	
	static public function mdlActualizaConograma($datos){
		$db = new Conexion();
		$sql = $db->consulta("UPDATE  vtade_cronograma
							SET     vtade_cronograma.cod_estadocuota_ant	= vtade_cronograma.cod_estadocuota,
									vtade_cronograma.cod_estadocuota = 'RES'
							WHERE   vtade_cronograma.cod_localidad = '".$datos['cod_localidad']."'
							AND		vtade_cronograma.cod_tipo_ctt = '".$datos['cod_tipo_ctt']."'
							AND		vtade_cronograma.cod_tipo_programa = '".$datos['cod_tipo_programa']."'
							AND     vtade_cronograma.cod_contrato = '".$datos['cod_contrato']."'
							AND     vtade_cronograma.num_refinanciamiento = '".$datos['num_refinanciamiento']."'
							AND     vtade_cronograma.cod_estadocuota IN ( 'REG', 'EMI' )");

		if ($sql) {
			return 1;
		}else{
			return 0;
		}
		$db->liberar($sql);
        $db->cerrar();
	}//mdlActualizaConograma

}//class ModeloResCtto
?>