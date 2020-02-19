<?php

class ControladorEmpresa{

	static public function ctrMostrarEmpresa($entrada){
		$tabla1 = 'scfma_empresa';
		$respuesta = ModeloEmpresa::mdlMostrarEmpresa($entrada,$tabla1);
		return $respuesta;
	}//function ctrMostrarEmpresa

	static public function ctrPais(){
		$respuesta = ModeloEmpresa::mdlPais();
		return $respuesta;
	}

	static public function ctrestadocivil(){
		$respuesta = ModeloEmpresa::mdlestadocivil();
		return $respuesta;
	}

	static public function ctrSelects($tabla,$item1,$item2){
		$respuesta = ModeloEmpresa::mdlSelects($tabla,$item1,$item2);
		return $respuesta;
	}

	static public function ctrtipoPrograma(){
		$respuesta = ModeloEmpresa::mdltipoPrograma();
		return $respuesta;
	}

	static public function ctrtipoDoc(){
		$respuesta = ModeloEmpresa::mdltipoDoc();
		return $respuesta;
	}

	static public function ctrCamposanto(){
		$respuesta = ModeloEmpresa::mdlCamposanto();
		return $respuesta;
	}

	static public function ctrtipoCambio(){
		$respuesta = ModeloEmpresa::mdltipoCambio();
		return $respuesta;
	}

	static public function ctrcodVendedor(){
		$respuesta = ModeloEmpresa::mdlcodVendedor();
		return $respuesta;
	}

	static public function ctrdocCliente(){
		$respuesta = ModeloEmpresa::mdldocCliente();
		return $respuesta;
	}

	static public function ctrnomVendedor($cod){
		$respuesta = ModeloEmpresa::mdlnomVendedor($cod);
		return $respuesta;
	}

	static public function ctrtabVendedor(){
		$respuesta = ModeloEmpresa::mdltabVendedor();
		return $respuesta;
	}
	static public function ctrtabCliente(){
		$respuesta = ModeloEmpresa::mdltabCliente();
		return $respuesta;
	}
	static public function ctrtabProspecto(){
		$respuesta = ModeloEmpresa::mdltabProspecto();
		return $respuesta;
	}

	static public function ctrtipoCom(){
		$respuesta = ModeloEmpresa::mdltipoCom();
		return $respuesta;
	}

	static public function ctrAnnoPeriodo(){
		$respuesta = ModeloEmpresa::mdlAnnoPeriodo();
		return $respuesta;
	}

	static public function ctrTrabajador(){
		$respuesta = ModeloEmpresa::mdlTrabajador();
		return $respuesta;
	}

	static public function ctrnumCuotas(){
		$respuesta = ModeloEmpresa::mdlnumCuotas();
		return $respuesta;
	}

}//class ControladorPlantilla