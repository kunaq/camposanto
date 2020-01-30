<?php

require_once "conexion.php";
require_once "../funciones.php";

class ModeloCambioTitular{

	static public function mdlgetServiciosCtt($cod_localidad,$cod_contrato){
		$db = new Conexion();
		$sql = $db->consulta("SELECT vtade_contrato.cod_localidad, vtade_contrato.cod_tipo_ctt, vtade_contrato.cod_tipo_programa, vtade_contrato.cod_contrato, vtade_contrato.num_servicio, (SELECT vtama_tipo_servicio.dsc_tipo_servicio FROM vtama_tipo_servicio WHERE vtama_tipo_servicio.cod_tipo_servicio = vtade_contrato.cod_tipo_servicio)AS dsc_tipo_servicio, vtade_contrato.fch_generacion, vtade_contrato.fch_emision, vtade_contrato.fch_anulacion, vtade_contrato.fch_activacion, vtade_contrato.fch_resolucion, vtade_contrato.fch_transferencia, vtade_contrato.num_refinanciamiento, vtade_contrato.cod_cliente, (SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente) AS dsc_cliente, vtade_contrato.cod_cliente_anterior, (SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente = vtade_contrato.cod_cliente_anterior) AS dsc_cliente_anterior FROM vtade_contrato WHERE vtade_contrato.cod_localidad = '$cod_localidad' AND vtade_contrato.cod_contrato LIKE (RIGHT('0000000000'+'$cod_contrato',10)) AND vtade_contrato.flg_fondo_mantenimiento = 'NO' ORDER BY num_servicio ASC");

		$datos = array();
    	while($key = $db->recorrer($sql)){

			$key["fch_generacion"] = ($key["fch_generacion"] != '') ? dateTimeFormat($key["fch_generacion"]) : '';
			$key["fch_emision"] = ($key["fch_emision"] != '') ? dateTimeFormat($key["fch_emision"]) : '';
			$key["fch_activacion"] = ($key["fch_activacion"] != '') ? dateTimeFormat($key["fch_activacion"]) : '';
			$key["fch_resolucion"] = ($key["fch_resolucion"] != '') ? dateTimeFormat($key["fch_resolucion"]) : '';
			$key["fch_anulacion"] = ($key["fch_anulacion"] != '') ? dateTimeFormat($key["fch_anulacion"]) : '';
			$key["fch_transferencia"] = ($key["fch_transferencia"] != '') ? dateTimeFormat($key["fch_transferencia"]) : '';

	    	$datos[] = arrayMapUtf8Encode($key);

		}
	    return $datos;

	    $db->liberar($sql);
	    $db->cerrar();
	}//function mdlgetServiciosCtt
	
	static public function mdlGetDatosCliente($cod_cliente){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtama_cliente.dsc_razon_social, vtama_cliente.dsc_apellido_paterno, vtama_cliente.dsc_apellido_materno, vtama_cliente.dsc_nombre, vtama_cliente.flg_juridico, vtama_cliente.cod_tipo_documento, vtama_cliente.dsc_documento, vtama_cliente.fch_nacimiento, vtama_cliente.dsc_telefono_1, vtama_cliente.dsc_telefono_2, vtama_cliente.dsc_cliente, vtama_cliente.cod_estadocivil, vtama_cliente.cod_sexo, vtama_cliente.dsc_email, (SELECT vtama_pais.dsc_pais FROM vtama_pais WHERE vtama_pais.cod_pais = vtade_cliente_direccion.cod_pais) AS dsc_pais, (SELECT vtama_departamento.dsc_departamento FROM vtama_departamento WHERE vtama_departamento.cod_pais = vtade_cliente_direccion.cod_pais AND vtama_departamento.cod_departamento = vtade_cliente_direccion.cod_departamento) AS dsc_departamento, (SELECT vtama_provincia.dsc_provincia FROM vtama_provincia WHERE vtama_provincia.cod_pais = vtade_cliente_direccion.cod_pais AND vtama_provincia.cod_departamento = vtade_cliente_direccion.cod_departamento AND vtama_provincia.cod_provincia = vtade_cliente_direccion.cod_provincia) AS dsc_provincia, (SELECT vtama_distrito.dsc_distrito FROM vtama_distrito WHERE vtama_distrito.cod_pais = vtade_cliente_direccion.cod_pais AND vtama_distrito.cod_departamento = vtade_cliente_direccion.cod_departamento AND vtama_distrito.cod_provincia = vtade_cliente_direccion.cod_provincia AND vtama_distrito.cod_distrito = vtade_cliente_direccion.cod_distrito) AS dsc_distrito, vtade_cliente_direccion.dsc_direccion, vtade_cliente_direccion.dsc_referencia FROM vtama_cliente INNER JOIN vtade_cliente_direccion ON vtade_cliente_direccion.cod_cliente = vtama_cliente.cod_cliente WHERE vtama_cliente.cod_cliente = '$cod_cliente'");

		$datos = array();
    	while($key = $db->recorrer($sql)){

			$key["fch_nacimiento"] = ($key["fch_nacimiento"] != '') ? dateTimeFormat($key["fch_nacimiento"]) : '';

	    	$datos[] = arrayMapUtf8Encode($key);

		}
	    return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetDatosCliente
	
	static public function mdlGetNombreCliente($cod_cliente){

		$db = new Conexion();

		$sql = $db->consulta("SELECT vtama_cliente.dsc_cliente FROM vtama_cliente WHERE vtama_cliente.cod_cliente= '$cod_cliente'");

    	while($key = $db->recorrer($sql)){
    		$dsc_cliente = Utf8Encode($key['dsc_cliente']);
		}

		$arrData = array('dsc_cliente'=> $dsc_cliente);
	    
	    return $arrData;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetNombreCliente

	static public function mdlGetRefinServ($localidad,$cod_contrato,$cod_servicio){

		$db = new Conexion();

		$sql = $db->consulta("SELECT num_refinanciamiento, flg_activo FROM vtavi_cronograma_x_servicio WHERE cod_localidad = '$localidad' AND cod_contrato = '$cod_contrato' AND num_servicio = '$cod_servicio'"); 

		$datos = array();
    	while($key = $db->recorrer($sql)){

	    	$datos[] = arrayMapUtf8Encode($key);

		}
	    return $datos;

		$db->liberar($sql);
        $db->cerrar();

	}//function mdlGetEndoServicio
	
}//class ModeloWizard
?>
