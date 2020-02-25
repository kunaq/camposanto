<?php
require_once "../../core.php";
require_once "../../modelo/conexion.php";

$filaDetalle = $_GET[''];//cantidad de filas de servicions adicionales
$cod_servicio = $_GET[''];
$filaIncluido  = $_GET[''];//cantidad de filas de servicions incluidos
$cod_servicio_principal = $_GET[''];
$tipo_nec; = $_GET[''];


$ls_moneda_cab = 'SOL';

// -- Inicializa -- //

$lde_saldo_foma_total = 0;
$lde_derecho = 0;
$li_verifica = 0;
$ls_null = null;

// -- Añade incluidos a precio de servicio principal -- //

for( $li_i=1; $li_i = tab_1.tp_1.dw_detalle.RowCount(); $li_i++) 
{             
    $ls_servicio_main = $cod_servicio; //codigo de servicio
    $lde_derecho = 0;

    for ($li_j = 1; $li_j = $filaIncluido; $li_j++)
    {               
       $ls_servicio_in = tab_1.tp_1.dw_incluidos.GetItemString($li_j, "cod_servicio_principal");
       $ls_flg_derecho = tab_1.tp_1.dw_incluidos.GetItemString($li_j, "flg_derecho_incluido");
       $ls_flg_personalizado = tab_1.tp_1.dw_incluidos.GetItemString($li_j, "flg_personalizado");
       $ls_flg_descargado = tab_1.tp_1.dw_incluidos.GetItemString($li_j, "flg_descargado");


        // -- Personalizado -- //

        if( $ls_flg_personalizado == 'SI')
        {
            $lde_valor_derecho = variable ($li_j, "imp_precio_venta");
        }
        else
        {
            $lde_valor_derecho = variable ($li_j, "imp_total");
        }

        // -- Inicializa -- //

        if(is_null($lde_valor_derecho))
        {
          $lde_valor_derecho = 0;
        } 
        if(isset($ls_flg_derecho, "TEX") == 'False') //ISSET
        {
          $ls_flg_derecho = 'NO';
        } 
        if(isset($ls_flg_personalizado, "TEX") == 'False')
        {
          $ls_flg_personalizado = 'NO';
        }

        // -- Añade -- //

        if($ls_servicio_main == $ls_servicio_in && ($ls_flg_derecho == 'SI' || $ls_flg_personalizado == 'SI') && $ls_flg_descargado == 'NO')
        {
          $lde_derecho = $lde_derecho + $lde_valor_derecho;
          tab_1.tp_1.dw_incluidos.SetItem($li_j, "flg_descargado", "SI"); //SETITEM muestra en pantalla(fila, campo, valor)
        }
    }

  // -- Actualiza -- //

  $lde_precio_venta_aux = variable ($li_i,  "imp_precio_venta_aux");
  
  if(is_null($lde_precio_venta_aux))
  {
    $lde_precio_venta_aux = 0;
  }

  tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_precio_venta", $lde_precio_venta_aux + $lde_derecho);               
}

// -- Importes -- //

$lde_cuoi = Dec(tab_1.tp_1.em_cui.Text); //tranformar a num CUI
$lde_cuoi_m = Dec(tab_1.tp_1.em_base.Text);

if (is_null($lde_cuoi))
{
  $lde_cuoi = 0.00;
}

if (is_null($lde_cuoi_m))
{
  $lde_cuoi_m = 0.00;
}

// -- Inicializa -- //

$lde_afecto_dscto = 0.00; 
$lde_afecto = 0.00;

// -- Importe Afecto a Descuento -- //

if($tipo_nec == 'NI')
{
                
// -- Distribuye -- //

  for( $li_i = 1; $li_i = tab_1.tp_1.dw_detalle.Rowcount(); $li_i++)
  { 
     $ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_plan");
     $ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_ds");
     $ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_sf");
     
     // -- Inicializa -- //
     
     if(is_null($ls_flg_plan))
     {
        $ls_flg_plan = 'NO';
      }
     if(is_null($ls_flg_ds))
     {
        $ls_flg_ds = 'NO';
      }
     if(is_null($ls_flg_ssff))
     {
        $ls_flg_ssff = 'NO';
      }
     
     // -- Lógica -- //
     
     if($is_flg_generacion_ee == 'SI')          //<----------=SI
     {  
        if($ls_flg_ds == 'SI' && $ls_flg_ssff == 'SI')
        {
            $lde_afecto_dscto = $lde_afecto_dscto + tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta");
        }
      }              
     else
     {
                     
        $lde_afecto_dscto = $lde_afecto_dscto + tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta");
     }
  }                               
}
else
{
                
    for($li_i = 1; $li_i = tab_1.tp_1.dw_detalle.Rowcount(); $li_i++)
    {
                   
       $ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_plan");      
       $ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_ds");
       $ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_sf");
       
       // -- Inicializa -- //
       
       if(is_null($ls_flg_plan)) 
       { 
          $ls_flg_plan = 'NO';
       }
       if(is_null($ls_flg_ds)) 
       { 
          $ls_flg_ds = 'NO';
       }      
       if(is_null($ls_flg_ssff)) 
       { 
          $ls_flg_ssff = 'NO';
       }
       
       // -- Lógica -- //
       
       if($is_flg_generacion_ee == 'SI')              //<------------AQUI 
       {      
       
         if($ls_flg_ds == 'SI' && $ls_flg_ssff == 'SI')
         {
            $lde_afecto_dscto = $lde_afecto_dscto + (tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta") - tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_cuoi"));
         }
       }                
       else
       {              
         $lde_afecto_dscto = $lde_afecto_dscto + tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta");                
       }             
    }             
}

if(is_null($lde_afecto_dscto))
{
  $lde_afecto_dscto = 0.00;
}

// -- Prevensión -- //

$lde_prevension = 0.00;
$li_total = tab_1.tp_2.dw_ctt.RowCount();

for($li_i = 1; $li_i = $li_total;  $li_i++)
{
    $lde_valor_prevension = tab_1.tp_2.dw_ctt.GetItemDecimal($li_i, "imp_total");
    
    if(is_null($lde_valor_prevension))
    {
        $lde_valor_prevension = 0;
        $lde_prevension = $lde_prevension + $lde_valor_prevension;
    }
}

// -- Endosos (Cobertura) -- //

$lde_endoso = 0.00;
$li_total = tab_1.tp_2.dw_cobertura.rowcount();

for($li_i = 1; $li_i = $li_total; $li_i++)
{            
    $ls_moneda = tab_1.tp_2.dw_cobertura.GetItemString($li_i, "cod_moneda");
    $lde_valor_endoso = tab_1.tp_2.dw_cobertura.GetItemDecimal($li_i, "imp_valor");
    
    if(isset($ls_moneda, "TEX") == 'False')
    {
      $ls_moneda = 'SOL';
    }
    if(is_null($lde_valor_endoso))
    {
      $lde_valor_endoso = 0;
    }
    
    // -- Convierte -- //
    
    if($ls_moneda_cab != $ls_moneda)
    {
       if($ls_moneda == 'SOL') 
       {
           $lde_valor_endoso = Round($lde_valor_endoso / $ide_tc, 4); //redondeo a 4 decimales
       }
       else
       {
           $lde_valor_endoso = Round($lde_valor_endoso * $ide_tc, 4);
       }
    }
    
    // -- Totaliza -- //
    
    $lde_endoso = $lde_endoso + $lde_valor_endoso;
}

// -- Consolida -- //

$lde_endoso = $lde_endoso;

// -- Descuentos -- //

$lde_descuento = 0.00;
$li_total = tab_1.tp_7.dw_dscto.Rowcount();

for($li_i = 1; $li_i = $li_total; $li_i++)
{            
    $ls_flg_porcentaje = tab_1.tp_7.dw_dscto.GetItemString($li_i, "flg_porcentaje");
    $lde_valor = tab_1.tp_7.dw_dscto.GetItemDecimal($li_i, "imp_valor");
    
    if($ls_flg_porcentaje == 'SI')
    {
      $lde_valor = Round(( $lde_afecto_dscto * $lde_valor ) / 100, 4);
    }    
    // -- Seteo -- //
    
    tab_1.tp_7.dw_dscto.SetItem($li_i, "imp_monto", $lde_valor);
    
    // -- Totaliza -- //
    
    $lde_descuento = $lde_descuento + $lde_valor;              
}

// -- Cuoi -- //

if($is_endoso_cuoi == 'SI')
{
    $lde_cuoi_total = $lde_endoso + $lde_cuoi;
}
else
{
    $lde_cuoi_total = $lde_cuoi;
}

// -- Inicializa -- //

for($li_i = 1; $li_i = $li_total; $li_i++;)
{
    tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_dscto", 0.00);
    tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_endoso", 0.00);
}

// -- Diferentes servicios -- //

for($li_i = 1; $li_i = tab_1.tp_1.dw_detalle.Rowcount(); $li_i++)
{              
    $ls_flg_descargado = tab_1.tp_1.dw_detalle.GetItemString($li_i, "cod_servicio");
    
    // -- Inicializa -- //
    
    $ls_flg_ssaa = 'NO';
    
    // -- Servicio adicional -- //

     $sql = 'SELECT  vtama_tipo_servicio.flg_sadicional FROM vtama_servicio INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio  WHERE vtama_servicio.cod_servicio = '.$ls_cod_servicio;
     $ls_flg_ssaa = query($sql);
    
    if(is_null($ls_flg_ssaa))
    {
        $ls_flg_ssaa = 'NO';
    }
    if($ls_flg_ssaa == 'NO')
    {
        $li_verifica = $li_verifica + 1;
    }              
}

// -- Distribucion de Dsctos y CUOI -- //

$lde_saldo_dscto = $lde_descuento;
$lde_saldo_endoso = $lde_endoso;
$li_total = tab_1.tp_1.dw_detalle.Rowcount();

for($li_i = 1; $li_i = $li_total; $li_i++)
{           
    $lde_neto = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta");
    $ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_plan");
    $ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_ds");
    $ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_sf");
    
    // -- Inicializa -- //
    
    if(is_null($ls_flg_plan))
    {
       $ls_flg_plan = 'NO';
    } 
    if(is_null($ls_flg_ds))
    {
       $ls_flg_ds = 'NO';
    }   
    if(is_null($ls_flg_ssff))
    {
       $ls_flg_ssff = 'NO';
    }
    
    // -- Distribuye -- //
    
    if( ( $ls_flg_plan == 'SI' || $ls_flg_ds == 'SI' || $ls_flg_ssff == 'SI' ) && $li_verifica != $li_total )
    {          
         if($lde_saldo_dscto <= $lde_neto)
         { 
              $lde_saldo = $lde_saldo_dscto;
         }
         else
         {
              $lde_saldo = $lde_neto;
         }
         
         $lde_saldo_dscto = $lde_saldo_dscto - $lde_saldo;
         tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_dscto", Round($lde_saldo, 4));
    }               
    else
    {
                   
       if($lde_saldo_dscto <= $lde_neto)
       { 
            $lde_saldo = $lde_saldo_dscto;
       }
       else
       {
            $lde_saldo = $lde_neto;
       }
       
       $lde_saldo_dscto = $lde_saldo_dscto - $lde_saldo;
       tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_dscto", Round($lde_saldo, 4));
                   
    }
    
    // -- Endoso CUOI -- //
                   
    if($is_endoso_cuoi == 'NO') 
    {
                   
         if ($lde_saldo_endoso <= $lde_neto)
         {
             $lde_saldo = $lde_saldo_endoso;
         }
         else
         {
             $lde_saldo = $lde_neto;
         }
         
         $lde_saldo_endoso = $lde_saldo_endoso - $lde_saldo;    
         tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_endoso", Round($lde_saldo, 4));             
    }
}

// -- Datos del Detalle -- //

$lde_descuento = 0.00;
$lde_saldo_total = 0.00;

for( $li_i = 1; $li_i = $li_total; $li_i++)
{          
    $lde_valor = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_dscto");
    $lde_valor_saldo = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "compute_7");
    
    // -- Totaliza -- //
    
    $lde_descuento = $lde_descuento + $lde_valor;
    $lde_saldo_total = $lde_saldo_total + $lde_valor_saldo;  
}

// -- Afecto a igv -- //

for ($li_i = 1; $li_i = tab_1.tp_1.dw_detalle.RowCount(); $li_i++;)
{      
    $lde_valor_saldo = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "compute_7");
    $ls_servicio = tab_1.tp_1.dw_detalle.GetItemString($li_i, "cod_servicio");
    $lde_saldo_foma = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_foma");   
    $ls_flg_afecto_igv = 'NO';

    if(is_null($lde_saldo_foma))
    {
      $lde_saldo_foma = 0;
    }
    
     $sql1 = 'SELECT  vtama_tipo_servicio.flg_afecto_igv FROM vtama_servicio INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio WHERE vtama_servicio.cod_servicio = '.$ls_cod_servicio;
     $ls_flg_afecto_igv = query($sql1);
    
    if (is_null($ls_flg_afecto_igv) || Trim($ls_flg_afecto_igv) == '') // trim elimina espacios en blanco
    {
      $ls_flg_afecto_igv = 'NO';
    }
    if( $ls_flg_afecto_igv == 'SI')
    {
      $lde_afecto = $lde_afecto + $lde_valor_saldo;
    }
    
    // -- Acumula FOMA -- //
    
    $lde_saldo_foma_total = $lde_saldo_foma_total + $lde_saldo_foma;
                
}

// -- Carencia -- //

for( $li_i = 1; $li_i = tab_1.tp_1.dw_detalle.RowCount(); $li_i++)
{               
    $ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString($li_i, "flg_ds");

    if( is_null($ls_flg_ds))
    {
      $ls_flg_ds = 'NO';
    }
    
    // -- DS -- //
    
    if( $ls_flg_ds == 'SI')
    {
       $lde_precio_lista = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_lista");
       $lde_precio_venta = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_precio_venta");
       $lde_valor_descuento = tab_1.tp_1.dw_detalle.GetItemDecimal($li_i, "imp_dscto");
       
       // -- Inicializa -- //
       
       if( is_null($lde_precio_lista))
       {
         $lde_precio_lista = 0;
       }
       if( is_null($lde_precio_venta))
       {
         $lde_precio_venta = 0;
       }
       if( is_null($lde_valor_descuento))
       {
         $lde_valor_descuento = 0;
       }
       
       // -- Carencia -- //
       
       $lde_valor_neto = $lde_precio_venta - $lde_valor_descuento;
       $lde_carencia = $lde_precio_lista - $lde_valor_neto;
       
       // -- Seteo -- //
       
       tab_1.tp_1.dw_detalle.SetItem($li_i, "imp_carencia", $lde_carencia);            
    }  
}

// -- Subtotal -- //

$lde_igv = ( $lde_afecto - Round($lde_afecto / ( 1 + gde_igv ), 4));   // <---------AQUI!!!!
$lde_subtotal = $lde_saldo_total - $lde_igv;

// -- Total -- //

$lde_total = tab_1.tp_1.dw_detalle.GetItemDecimal(1, "compute_3");

// -- Seteo -- //

tab_1.tp_1.dw_resumen.SetItem(1, "imp_cobertura", $lde_endoso);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_dscto", $lde_descuento);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_saldo", $lde_saldo_total);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_cuoi", $lde_cuoi_total + $lde_cuoi_m);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_total", $lde_total);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_subtotal", $lde_subtotal);
tab_1.tp_1.dw_resumen.SetItem(1, "imp_igv", $lde_igv);

// -- Cronograma -- //

tab_1.tp_6.dw_det_interes.SetItem(1, "imp_saldo", $lde_saldo_total);
tab_1.tp_6.dw_foma.SetItem(1, "imp_saldo_foma", $lde_saldo_foma_total);

if( isset(String($lde_saldo_foma_total), "DEC"))
{             
    tab_1.tp_6.dw_foma.Object.cod_cuota.Protect = 0;
    tab_1.tp_6.dw_foma.Object.cod_cuota.BackGround.Color = RGB(255,255,255);
    
    tab_1.tp_6.dw_foma.Object.fch_primera_cuota.Protect = 0;
    tab_1.tp_6.dw_foma.Object.fch_primera_cuota.BackGround.Color = RGB(255,255,255);
    
    tab_1.tp_6.cb_generar_foma.Enabled = True;
    tab_1.tp_6.pb_20.Enabled = True;
}                
else
{             
    tab_1.tp_6.dw_foma.Object.cod_cuota.Protect = 1;
    tab_1.tp_6.dw_foma.Object.cod_cuota.BackGround.Color = RGB(236,236,236);
    
    tab_1.tp_6.dw_foma.Object.fch_primera_cuota.Protect = 1;
    tab_1.tp_6.dw_foma.Object.fch_primera_cuota.BackGround.Color = RGB(236,236,236);
    
    tab_1.tp_6.cb_generar_foma.Enabled = False;
    tab_1.tp_6.pb_20.Enabled = False;
}

// -- Saldo del cronograma -- //

if( $lde_saldo_total <= 0)
{             
    if( tab_1.tp_6.dw_det_cuotas.Rowcount() >= 1)
    {            
       f_sys_mensaje_usuario(Title, "MSGLIB", "EL SALDO A FINANCIAR ES CERO (0), SE ELIMINARÁ EL CRONOGRAMA DE PAGOS GENERADO.", "PRV");
       
       tab_1.tp_6.dw_det_interes.SetItem(1, "cod_cuota", $ls_null);
       tab_1.tp_6.dw_det_interes.SetItem(1, "cod_interes", $ls_null);
       
       for( $li_i = tab_1.tp_6.dw_det_cuotas.Rowcount(); $li_i = ; $li_i--)
       {
          tab_1.tp_6.dw_det_cuotas.DeleteRow($li_i);
       }             
    } 
}
?>