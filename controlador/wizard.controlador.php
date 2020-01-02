<?php
class ControladorWizard{
	static public function ctrEdoEspacio(){
		$tabla = "vtaca_espacio";
		$y = $_POST['value'];
	    $x = $_POST['ejex'];
	    $area = $_POST['area'];
	    $plat = $_POST['plat'];
	    $camps = $_POST['campo'];
		$respuesta = ModeloWizard::mdlEdoEspacio($tabla,$camps,$plat,$area,$x,$y);
		return $respuesta;
	}//function ctrEdoEspacio

	static public function ctrIdentificador(){
		$respuesta = ModeloWizard::mdlIdentificador();
		// $borrar = ModeloWizard::mdlBorrarTemporal($respuesta);
		return $respuesta;
	}//function ctrIdentificador

	static public function ctrGuardaDetalle(){
		$tabla = "vtama_temp_recaudacion";
		$ll_id = $_POST['ll_id'];
	    $li_i = $_POST['li_i'];
	    $ls_codigo = $_POST['ls_codigo'];
	    $li_ctd = $_POST['li_ctd'];
	    $lde_precio_venta = $_POST['lde_precio_venta'];
	    $lde_det_total = $_POST['lde_det_total'];
	    $lde_cuoi = $_POST['lde_cuoi'];
	    $lde_foma = $_POST['lde_foma'];
	    $lde_cuoi_st = $_POST['lde_cuoi_st'];
	    $lde_min_inh = $_POST['lde_min_inh'];
	    $lde_precio_lista = $_POST['lde_precio_lista'];
	    $lde_valor_endoso = $_POST['lde_valor_endoso'];
	    $ls_flg_ds_compartido = $_POST['ls_flg_ds_compartido'];
	    $lde_imp_carencia = $_POST['lde_imp_carencia'];
	    $ls_flg_cremacion = $_POST['ls_flg_cremacion'];
	    $ls_flg_ds_temporal = $_POST['ls_flg_ds_temporal'];
	    $ls_flg_ssff = $_POST['ls_flg_ssff'];
	    $lde_saldo_detalle = $_POST['lde_saldo_detalle'];
		$respuesta = ModeloWizard::mdlGuardaDetalle($tabla,$ll_id,$li_i,$ls_codigo,$li_ctd,$lde_precio_venta,$lde_det_total,$lde_cuoi,$lde_foma,$lde_cuoi_st,$lde_min_inh,$lde_precio_lista,$lde_valor_endoso,$ls_flg_ds_compartido,$lde_imp_carencia,$ls_flg_cremacion,$ls_flg_ds_temporal,$ls_flg_ssff,$lde_saldo_detalle);
		return $respuesta;
	}//function ctrGuardaDetalle

}//class ControladorWizard
?>