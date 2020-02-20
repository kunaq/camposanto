<?php
require_once "conexion.php";
require_once "../funciones.php";

class ModeloProspecto{

	static public function mdlGuardaProspecto($datos){
		$db = new Conexion();
		$sql = $db->consulta("SELECT TOP 1 CONVERT(INT,SUBSTRING(
					        cod_prospecto, 
					        CHARINDEX('T', cod_prospecto)+1, 
					        LEN(cod_prospecto)-CHARINDEX('T', cod_prospecto))) AS ultimo_registro
					        FROM vtaca_prospecto_venta ORDER BY cod_prospecto DESC;");

		while($key = $db->recorrer($sql)){
		    $ultimoPros = $key['ultimo_registro'];
		}
		$nuevoPros = (int)$ultimoPros + 1;

		$cod_prospecto = "PVT".str_pad($nuevoPros, 7, "0", STR_PAD_LEFT);

		$dsc_prospecto = $datos['apePaterno']." ".$datos['apeMaterno'].", ".$datos['nombre'];

		if ($datos['juridico'] == "NO") {
		    $sql2 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_apellido_paterno, dsc_apellido_materno, dsc_nombre, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, flg_cambio_activo) VALUES('$cod_prospecto', '".$datos['apePaterno']."', '".$datos['apeMaterno']."', '".$datos['nombre']."', '".$datos['juridico']."', '".$datos['tipoDoc']."', '".$datos['numDoc']."', '$dsc_prospecto', '".$datos['pais']."', '".$datos['departamento']."', '".$datos['provincia']."', '".$datos['distrito']."', '".$datos['direccion']."', '".$datos['telefono1']."', '".$datos['telefono2']."', '".$datos['origen']."', '".$datos['calificacion']."', '".$datos['observacion']."', CONVERT(DATE,'".$datos['fchRegistro']."',105), '".$datos['usuario']."', '".$datos['vendedor']."', '".$datos['grupo']."', '".$datos['supervisor']."', '".$datos['jefeVentas']."', '".$datos['estado']."', 'NO')");

		    if ($sql2) {
		    	$respuesta = array('cod' => '1', 'codProspecto'=> $cod_prospecto);
				return $respuesta;
		    }else{
		        $arrData = array('cod'=> '0', 'msg'=>'Ocurrio un error al registrar el prospecto');
		        return $respuesta;
		    }

		    $db->liberar($sql2);

		}elseif ($datos['juridico'] == "SI") {
		    $sql3 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_razon_social, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, flg_cambio_activo) 
		VALUES('$cod_prospecto', '".$datos['razonSocial']."', '".$datos['juridico']."', '".$datos['tipoDoc']."', '".$datos['numDoc']."', '".$datos['razonSocial']."', '".$datos['pais']."', '".$datos['departamento']."', '".$datos['provincia']."', '".$datos['distrito']."', '".$datos['direccion']."', '".$datos['telefono1']."', '".$datos['telefono2']."', '".$datos['origen']."', '".$datos['calificacion']."', '".$datos['observacion']."', CONVERT(DATE,'".$datos['fchRegistro']."',105), '".$datos['usuario']."', '".$datos['vendedor']."', '".$datos['grupo']."', '".$datos['supervisor']."', '".$datos['jefeVentas']."', '".$datos['estado']."', 'NO')");

		    if ($sql3) {
		    	$respuesta = array('cod' => '1', 'codProspecto'=> $cod_prospecto);
				return $respuesta;
		    }else{
		        $arrData = array('cod'=> '0', 'msg'=>'Ocurrio un error al registrar el prospecto');
		        return $respuesta;
		    }
		    $db->liberar($sql3);
		}


		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaProspecto
	
	static public function mdlGuardaContactoProspecto($datos){
		$db = new Conexion();

		$sql = $db->consulta("INSERT INTO vtade_prospecto_venta(cod_prospecto, num_linea, fch_contacto, cod_calificacion, flg_presentacion, cod_consejero, dsc_observaciones, fch_registro, cod_usuario_registro, flg_indicador)
		VALUES ('".$datos['codPro']."', '".$datos['linea']."', GETDATE(), '".$datos['calificacion']."','".$datos['presentacion']."', '".$datos['consejero']."', '".$datos['observacion']."', GETDATE(), '".$datos['usuarioC']."', '".$datos['indicador']."');");

		if ($sql) {
			$respuesta = array('cod'=> '1', 'msg'=>'El prospecto se registro con exito!');
			return $respuesta;
		}else{
			$arespuesta = array('cod'=> '0', 'msg'=>'Error al ingresar contacto');
			return $respuesta;
		}

		$db->liberar($sql);
        $db->cerrar();
	}//mdlGuardaContactoProspecto
	
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