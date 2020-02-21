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
		    $sql2 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_apellido_paterno, dsc_apellido_materno, dsc_nombre, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, imp_monto, flg_cambio_activo) VALUES('$cod_prospecto', '".$datos['apePaterno']."', '".$datos['apeMaterno']."', '".$datos['nombre']."', '".$datos['juridico']."', '".$datos['tipoDoc']."', '".$datos['numDoc']."', '$dsc_prospecto', '".$datos['pais']."', '".$datos['departamento']."', '".$datos['provincia']."', '".$datos['distrito']."', '".$datos['direccion']."', '".$datos['telefono1']."', '".$datos['telefono2']."', '".$datos['origen']."', '".$datos['calificacion']."', '".$datos['observacion']."', '".$datos['fchRegistro']."', '".$datos['usuario']."', '".$datos['vendedor']."', '".$datos['grupo']."', '".$datos['supervisor']."', '".$datos['jefeVentas']."', '".$datos['estado']."', ".$datos['importe'].", 'NO')");

		    if ($sql2) {
		    	$respuesta = array('cod' => '1', 'codProspecto'=> $cod_prospecto);
				return $respuesta;
		    }else{
		        $respuesta = array('cod'=> '0', 'msg'=>'Ocurrio un error al registrar el prospecto');
		        return $respuesta;
		    }

		    $db->liberar($sql2);

		}elseif ($datos['juridico'] == "SI") {
		    $sql3 = $db->consulta("INSERT INTO vtaca_prospecto_venta(cod_prospecto, dsc_razon_social, flg_juridico, cod_tipo_documento, dsc_documento, dsc_prospecto, cod_pais, cod_departamento, cod_provincia, cod_distrito, dsc_direccion, dsc_telefono_1, dsc_telefono_2, cod_origen, cod_calificacion, dsc_observaciones, fch_registro, cod_usuario, cod_consejero, cod_grupo, cod_supervisor, cod_jefeventas, cod_estado, imp_monto, flg_cambio_activo) 
		VALUES('$cod_prospecto', '".$datos['razonSocial']."', '".$datos['juridico']."', '".$datos['tipoDoc']."', '".$datos['numDoc']."', '".$datos['razonSocial']."', '".$datos['pais']."', '".$datos['departamento']."', '".$datos['provincia']."', '".$datos['distrito']."', '".$datos['direccion']."', '".$datos['telefono1']."', '".$datos['telefono2']."', '".$datos['origen']."', '".$datos['calificacion']."', '".$datos['observacion']."', '".$datos['fchRegistro']."', '".$datos['usuario']."', '".$datos['vendedor']."', '".$datos['grupo']."', '".$datos['supervisor']."', '".$datos['jefeVentas']."', '".$datos['estado']."', ".$datos['importe'].", 'NO')");

		    if ($sql3) {
		    	$respuesta = array('cod' => '1', 'codProspecto'=> $cod_prospecto);
				return $respuesta;
		    }else{
		        $respuesta = array('cod'=> '0', 'msg'=>'Ocurrio un error al registrar el prospecto');
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

}//class ModeloResCtto
?>