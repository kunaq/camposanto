<?php
require_once "../../modelo/conexion.php";
   $cod = $_GET['cod_servicio'];
   $nec = $_GET['tipo_necesidad'];
   //var_dump($cod);
   $cod1='"'.$cod.'"';
    $db = new Conexion();                                             

       	$sql = $db->consulta("SELECT vtade_servicio_precio.*, vtama_servicio.* , vtama_tipo_servicio.flg_dsepultura, vtama_tipo_servicio.flg_sfunerario,
          vtama_tipo_servicio.flg_tipo_plan, vtama_tipo_servicio.flg_cremacion, vtama_tipo_servicio.flg_sfunerario, vtama_tipo_servicio.flg_sadicional,vtama_tipo_servicio.flg_afecto_igv
          FROM  vtade_servicio_precio 
          INNER JOIN vtama_servicio ON vtama_servicio.cod_servicio = vtade_servicio_precio.cod_servicio 
          INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio
          WHERE vtade_servicio_precio.cod_servicio = '$cod' AND vtade_servicio_precio.cod_tipo_necesidad = '$nec'");


        $datos = array();
		while($key = $db->recorrer($sql)){
            $datos[] =  $key;
            $impTot = $key['imp_precio_venta']-$key['imp_precio_cuoi'];
            
            /*$ls_flg_libre = $key['flg_sin_precio'];
            $ls_flg_ds = $key['flg_dsepultura'];
            $ls_flg_sf = $key['flg_sfunerario'];
            $ls_flg_plan = $key['flg_tipo_plan'];
            $ls_flg_ds_compartido = $key['flg_ds_compartido'];
            $ls_flg_cremacion = $key['flg_cremacion'];
            $ls_flg_ds_temporal = $key['flg_ds_temporal'];
            $ls_flg_ssf = $key['flg_sfunerario'];*/
            
            echo "<tr height='60' name='".$cod."' id='".$cod."' >
                    <td class='tdDscServicioAdd'>
                      ".$key['dsc_servicio']."
                      <input type='hidden' value='".$key['flg_afecto_igv']."' id='flg_afecto_igv_".$cod."'>
                      <input type='hidden' value='".$key['flg_sadicional']."' id='flg_sadicional_".$cod."'>
                      <input type='hidden' value='".$key['flg_contado']."' id='ls_flg_contado_".$cod."'>
                      <input type='hidden' value='".$key['flg_sin_precio']."' id='ls_flg_libre_".$cod."'>
                      <input type='hidden' value='".$key['flg_dsepultura']."' id='ls_flg_ds_".$cod."'>
                      <input type='hidden' value='".$key['flg_sfunerario']."' id='ls_flg_sf_".$cod."'>
                      <input type='hidden' value='".$key['flg_tipo_plan']."' id='ls_flg_plan_".$cod."'>
                      <input type='hidden' value='".$key['flg_ds_compartido']."' id='ls_flg_ds_compartido_".$cod."'>
                      <input type='hidden' value=".$key['flg_cremacion']." id='ls_flg_cremacion_".$cod."'>
                      <input type='hidden' value=".$key['flg_ds_temporal']." id='ls_flg_ds_temporal_".$cod."'>
                      <input type='hidden' value=".$key['flg_sfunerario']." id='ls_flg_ssff_".$cod."'>
                      <input type='hidden' value=".$key['imp_min_inhumar']." id='imp_min_inhumar_".$cod."'>
                      <input type='hidden' value=".$cod." id='codServicio' class='codServicio'>
                    </td>
                    <td class='tdCtdServicioAdd ColumnaLetra'>
                    <div class='row'>
                      <div class='col-lg-12'>
                        <input class='form-control form-control-sm m-input' style='text-align: center; padding-right: 5px;' id='ctd_".$cod."' type='text' name='ctd_".$cod."' placeholder='1' value='1' onchange='multiplica(this.value,".$key['imp_precio_venta'].",this.id);'>
                      </div>
                    </div>
                    </td>
                    <td class='tdPrecioListaServicioAdd'>
                      ".number_format($key['imp_precio_lista'],2,'.',',')."<input type='hidden' value=".$key['imp_precio_lista']." class='form-control form-control-sm m-input'  id='lista_".$cod."'>
                    </td>
                    <td class='tdPrecioVentaServicioAdd ColumnaA' id='numA1_".$cod."'>
                      ".number_format($key['imp_precio_venta'],2,'.',',')."<input type='hidden' value=".$key['imp_precio_venta']." class='form-control form-control-sm m-input numA' id='numA_".$cod."'>
                    </td>
                    <td class='tdImpDsctoServicioAdd ColumnaB'>
                      <input class='form-control form-control-sm m-input numB' style='text-align: center; padding-right: 0px;' type='text' id='numB_".$cod."' value='0.00' onchange='totalizar(".$cod1.");'>
                    </td>
                    <td class='tdImpTotalServicioAdd ColumnaC' id='numC_".$cod."'>
                        ".number_format($key['imp_precio_venta'],2,'.',',')."
                        <input type='hidden' value='".$key['imp_precio_venta']."' class='numC' id='numC1_".$cod."'>
                    </td>
                    <td class='tdFomaServicioAdd ColumnaD'>
                      <input type='text' style='text-align:right; padding-right: 0px;' value=".number_format($key['imp_precio_foma'],2,'.',',')." class='form-control form-control-sm m-input numD' id='numD_".$cod."'>
                    </td>
                    <td class='tdImpCarenciaServicioAdd ColumnaE'>
                      <input type='text' style='text-align:right; padding-right: 0px;' value='0.00' class='form-control form-control-sm m-input numE' id='numE_".$cod."' onchange='totalizar(".$cod1.");'>
                    </td>
                    <td class='tdImpCuiServicioAdd ColumnaF'>
                      <input type='text' style='text-align:right; padding-right: 0px;' value=".number_format($key['imp_precio_cuoi'],2,'.',',')." class='form-control form-control-sm m-input numF' id='numF_".$cod."' onchange='totalizar(".$cod1.");'>
                        <input type='hidden' id='cui_std_".$cod."' value=".$key['imp_precio_cuoi'].">
                    </td>
                    <td class='tdImpEndosoServicioAdd ColumnaG'>
                      <input class='form-control form-control-sm m-input numG' style='text-align: center; padding-right: 0px;' type='text' id='numG_".$cod."' value='0.00' onchange='totalizar(".$cod1.");'>
                    </td>
                    <td class='tdImpSaldoServicioAdd ColumnaH' id='numH_".$cod."'>
                      ".number_format($impTot,2,'.',',')." 
                      <input type='hidden' value=".$impTot." class='form-control form-control-sm m-input numH' id='numH1_".$cod."'>
                    </td>
                    <td class='tdAccionServicioAdd'>
                      <button class='btn btn-danger m-btn m_sweetalert_elimina_servicio' type='button' data-toggle='m-tooltip' data-container='body' data-placement='top' title='' data-original-title='Eliminar servicio' onclick='eliminaFila(this.id);' id='elimina_".$cod."'>
                          <i class='fa fa-trash'></i>
                        </button>
                    </td>
                  </tr>"; 
                 // var_dump($key['flg_contado']);  
             
		}        

    $db->liberar($sql);
 		$db->cerrar();  
?>