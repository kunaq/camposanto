function cambiaTodo()   
{
  var ls_moneda_cab = 'SOL';
  var ls_moneda = 'SOL'
  // -- Inicializa -- //

  var lde_saldo_foma_total = 0;
  var lde_saldo = 0;
  var lde_derecho = 0;
  var li_verifica = 0;
  var lde_valor_derecho = 0;
  var lde_precio_venta_aux = 0;
  var ls_flg_derecho = 'NO';
  var ls_flg_personalizado = 'NO';
  var ls_flg_descargado = 'NO';
  var ls_flg_plan = 'NO';
  var ls_flg_ds = 'NO';
  var ls_flg_ssff = 'NO';
  var ls_flg_afecto_igv = 'NO';
  var lde_cuoi = document.getElementById('importeCUI').value; 
  lde_cuoi = pasaAnumero(lde_cuoi);
  var lde_cuoi_m = 0.00; 
  var lde_afecto_dscto = 0.00; 
  var lde_afecto = 0.00;
  var ide_tc = document.getElementById('tipoCamb').value;                    
  var is_flg_generacion_ee = 'SI';   
  var is_endoso_cuoi = 'NO';         
  var gde_igv = 0.18;    
  

  // -- Añade incluidos a precio de servicio principal -- //
 
  var container = document.querySelector('#bodyServicio');
  container.querySelectorAll('tr').forEach(function (li_i) 
  {            
      var ls_servicio_main = $(li_i).attr("name"); //codigo de servicio
      //console.log(container);
      lde_derecho = 0;
      /*var container2 = document.querySelector('#bodyIncluidos');    //----servicios incluidos (eliminado)
      if(!container2.querySelectorAll('tr'))
      {
        container2.querySelectorAll('tr').forEach(function (li_j)
        {  
           var auxiliar = $(li_j).attr("name");
           var ls_servicio_in = ls_servicio_main;   //cod_servicio_principal tabla   
           /*var ls_flg_derecho = auxiliar.split('_')[1];   //flg_derecho_incluido
           var ls_flg_personalizado = auxiliar.split('_')[2]; // flg_personalizado
           var ls_flg_descargado = auxiliar.split('_')[3]; // flg_descargado

            // -- Personalizado -- //

            if( ls_flg_personalizado == 'SI')
            {
                lde_valor_derecho = document.getElementById("filaB_"+ls_servicio_in).value;
            }
            else
            {
                lde_valor_derecho = document.getElementById("filaC_"+ls_servicio_in).value;
            }

            // -- Inicializa -- //

            if(lde_valor_derecho == null)
            {
              lde_valor_derecho = 0;
            } 
            if(ls_flg_derecho == "false")
            {
              ls_flg_derecho = 'NO';
            } 
            if(ls_flg_personalizado == 'false')
            {
              ls_flg_personalizado = 'NO';
            }

            // -- Añade -- //

            if((ls_servicio_main == ls_servicio_in) && (ls_flg_derecho == 'SI' || ls_flg_personalizado == 'SI') && ls_flg_descargado == 'NO')
            {
              lde_derecho = lde_derecho + lde_valor_derecho;
              //document.getElementById("flg_descargado_"+ls_servicio_in).value = 'SI';
            }
        });
      }*/

    // -- Actualiza -- //  
                                                                                 
      if(!document.getElementById("numA_"+ls_servicio_main))        
      {
        lde_precio_venta_aux = 0;
      }
      else{
        lde_precio_venta_aux = document.getElementById("numA_"+ls_servicio_main).value;
      }

      var suma = lde_precio_venta_aux + lde_derecho;
      document.getElementById("numA_"+ls_servicio_main).value = suma; //precio de venta 1era tabla 
      suma1 = Number(suma).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
      document.getElementById("numA1_"+ls_servicio_main).innerHTML = suma1+"<input type='hidden' value="+suma+" class='form-control form-control-sm m-input numA' id='numA_"+ls_servicio_main+"'>";           
  });
  // -- Importes -- //

  if (lde_cuoi == null || !lde_cuoi)
  {
    lde_cuoi = 0.00;
  }

  if (lde_cuoi_m == null)
  {
    lde_cuoi_m = 0.00;
  }

  // -- Importe Afecto a Descuento -- //

  if(document.getElementById("tiponec").value == 'NI')
  {
                  
  // -- Distribuye -- //

    container.querySelectorAll('tr').forEach(function (li_i)
    { 
       var ls_servicio_main = $(li_i).attr("name");
       //var ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_plan");
       var ls_flg_plan = document.getElementById("ls_flg_plan_"+ls_servicio_main).value;
       //var ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_ds");
       var ls_flg_ds = document.getElementById("ls_flg_ds_"+ls_servicio_main).value;
       //var ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_sf");
       var ls_flg_ssff = document.getElementById("ls_flg_ssff_"+ls_servicio_main).value;
       
       // -- Inicializa -- //
       
       if(ls_flg_plan == null)
       {
          ls_flg_plan = 'NO';
        }
       if(ls_flg_ds == null)
       {
          ls_flg_ds = 'NO';
        }
       if(ls_flg_ssff == null)
       {
          ls_flg_ssff = 'NO';
        }
       
       // -- Lógica -- //
      
       
       if(is_flg_generacion_ee == 'SI')          
       {  
          if(ls_flg_ds == 'SI' && ls_flg_ssff == 'SI')
          {
            lde_afecto_dscto = lde_afecto_dscto + document.getElementById("numA_"+ls_servicio_main).value;
          }
        }              
       else
       {               
          lde_afecto_dscto = lde_afecto_dscto + document.getElementById("numA_"+ls_servicio_main).value;
       }
    });                               
  }
  else
  {           
      container.querySelectorAll('tr').forEach(function (li_i)
      {   
          ls_servicio_main = $(li_i).attr("name"); //codigo de servicio        
         //ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_plan"); 
         var ls_flg_plan = document.getElementById("ls_flg_plan_"+ls_servicio_main).value;    
         //ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_ds");
         var ls_flg_ds = document.getElementById("ls_flg_ds_"+ls_servicio_main).value;
         //ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_sf");
         var ls_flg_ssff = document.getElementById("ls_flg_ssff_"+ls_servicio_main).value;

         // -- Inicializa -- //
         
         if(ls_flg_plan == null) 
         { 
            ls_flg_plan = 'NO';
         }
         if(ls_flg_ds == null) 
         { 
            ls_flg_ds = 'NO';
         }      
         if(ls_flg_ssff == null) 
         { 
            ls_flg_ssff = 'NO';
         }
         
         // -- Lógica -- //
                    
         if(is_flg_generacion_ee == 'SI')               
         {    
           if(ls_flg_ds == 'SI' && ls_flg_ssff == 'SI')
           {
              lde_afecto_dscto = lde_afecto_dscto + (document.getElementById("numA_"+ls_servicio_main).value - document.getElementById("numF_"+ls_servicio_main).value);
           }
         }                
         else
         {              
           lde_afecto_dscto = lde_afecto_dscto + document.getElementById("numA_"+ls_servicio_main).value;
         }            
      });             
  }



  if(lde_afecto_dscto == null)
  {
    lde_afecto_dscto = 0.00;
  }

  /* -- Prevensión (eliminado) -- //

  var lde_prevension = 0.00;
  var container3 = document.querySelectorAll('#bodyCtt');
  //var li_total = tab_1.tp_2.dw_ctt.RowCount();

  container3.querySelectorAll('tr').forEach(function (li_i)
  {
      lde_valor_prevension = tab_1.tp_2.dw_ctt.GetItemDecimal(li_i, "imp_total");
      
      if(lde_valor_prevension == null)
      {
          lde_valor_prevension = 0;
          lde_prevension = lde_prevension + lde_valor_prevension;
      }
  }*/

  // -- Endosos (Cobertura) -- //

  var lde_endoso = 0.00;
  var container4 = document.querySelector('#bodyCobertura');
  //li_total = tab_1.tp_2.dw_cobertura.rowcount();

  container4.querySelectorAll('tr').forEach(function (fila) 
  {
    li_i = $(fila).attr("name");
    ls_moneda = document.getElementById("mon_"+li_i).value;      
    //ls_moneda = tab_1.tp_2.dw_cobertura.GetItemString(li_i, "cod_moneda");
    var lde_valor_endoso = document.getElementById("vEndoso_"+li_i).value; 
    lde_valor_endoso = pasaAnumero(lde_valor_endoso); 
    //lde_valor_endoso = tab_1.tp_2.dw_cobertura.GetItemDecimal(li_i, "imp_valor");
    
    if(ls_moneda == 'false')
    {
      ls_moneda = 'SOL';
    }
    
    if(lde_valor_endoso == null || !lde_valor_endoso)
    {
      lde_valor_endoso = 0;
    }
    
    // -- Convierte -- //
    
    if(ls_moneda_cab != ls_moneda)
    {
       if(ls_moneda == 'SOL') 
       {
           lde_valor_endoso = (lde_valor_endoso / ide_tc); //   tipo de cambio
       }
       else
       {
           lde_valor_endoso = (lde_valor_endoso * ide_tc);
       }
    }

      // -- Totaliza -- //
      
      lde_endoso = lde_endoso + lde_valor_endoso;

      lde_endoso1 = Number(lde_endoso).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 }); 
      document.getElementsByClassName("totalEndoso")[0].innerHTML = lde_endoso1;          

  });

  // -- Consolida -- //

  lde_endoso = lde_endoso;

  // -- Descuentos -- //

  var lde_descuento = 0.00;
  var container5 = document.querySelector('#bodyDscto');
  //li_total = tab_1.tp_7.dw_dscto.Rowcount();

  container5.querySelectorAll('tr').forEach(function (li_i)
  {    
      var cod = $(li_i).attr("name");        
      //ls_flg_porcentaje = tab_1.tp_7.dw_dscto.GetItemString(li_i, "flg_porcentaje");
      var ls_flg_porcentaje = document.getElementById("ls_flg_porcentaje_"+cod).value;
      //lde_valor = tab_1.tp_7.dw_dscto.GetItemDecimal(li_i, "imp_valor");
      var lde_valor = document.getElementById("imp_valor_"+cod).value;
      lde_valor = lde_valor;
      if(ls_flg_porcentaje == 'SI')
      {
        //console.log(lde_afecto_dscto);
        lde_valor = (( lde_afecto_dscto * lde_valor ) / 100);   //-------Aqui lde_afecto_dscto es 0 siempre!!
      }    

      // -- Seteo -- //
      
      //tab_1.tp_7.dw_dscto.SetItem(li_i, "imp_monto", lde_valor);
      lde_valor1 = Number(lde_valor).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });  
     document.getElementById("imp_monto_"+cod).value = lde_valor1;
      // -- Totaliza -- //
      lde_descuento = pasaAnumero(lde_descuento) + pasaAnumero(lde_valor); 
                 
  });  
  // -- Cuoi -- //

  if(is_endoso_cuoi == 'SI')
  {
      lde_cuoi_total = lde_endoso + lde_cuoi;
  }
  else
  {
      lde_cuoi_total = lde_cuoi;
  }
  // -- Inicializa -- //                                         
  container.querySelectorAll('tr').forEach(function (li_i)
  {
      ls_servicio_main = $(li_i).attr("name"); //codigo de servicio
      document.getElementById("numB_"+ls_servicio_main).value = '0.00'; //imp dscto
      document.getElementById("numG_"+ls_servicio_main).value = '0.00'; //imp endoso
  });

  // -- Diferentes servicios -- //

  container.querySelectorAll('tr').forEach(function (li_i)
  {   
      ls_servicio_main = $(li_i).attr("name"); //codigo de servicio           
          
      // -- Inicializa -- //
      
      var ls_flg_ssaa = document.getElementById("flg_sadicional_"+ls_servicio_main).value;
      
      // -- Consulta Servicio adicional -- //

      if(ls_flg_ssaa == null)
      {
          ls_flg_ssaa = 'NO';
      }
      if(ls_flg_ssaa == 'NO')
      {
          li_verifica = (parseFloat(li_verifica)+1);
      }   
                  
  });

  // -- Distribucion de Dsctos y CUOI -- //

  var lde_saldo_dscto = lde_descuento;
  var lde_saldo_endoso = lde_endoso;

  container.querySelectorAll('tr').forEach(function (li_i)
  {   
      var li_total = $("#bodyServicio tr").length;
      ls_servicio_main = $(li_i).attr("name"); //codigo de servicio        
      lde_neto = document.getElementById("numA_"+ls_servicio_main).value;
      lde_neto = pasaAnumero(lde_neto);
      //ls_flg_plan = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_plan");
      ls_flg_plan = document.getElementById("ls_flg_plan_"+ls_servicio_main).value;
      // ls_flg_ds = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_ds");
      ls_flg_ds = document.getElementById("ls_flg_ds_"+ls_servicio_main).value;
      // ls_flg_ssff = tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_sf");*/ 
      ls_flg_ssff = document.getElementById("ls_flg_ssff_"+ls_servicio_main).value;

      // -- Inicializa -- //
      
      if(ls_flg_plan == null)
      {
         ls_flg_plan = 'NO';
      } 
      if(ls_flg_ds == null)
      {
         ls_flg_ds = 'NO';
      }   
      if(ls_flg_ssff == null)
      {
         ls_flg_ssff = 'NO';
      }
      
      // -- Distribuye -- //
      
      if( ( ls_flg_plan == 'SI' || ls_flg_ds == 'SI' || ls_flg_ssff == 'SI' ) && li_verifica != li_total )
      {          
           if(lde_saldo_dscto <= lde_neto)
           { 
                lde_saldo = pasaAnumero(lde_saldo_dscto);
           }
           else
           {
                lde_saldo = pasaAnumero(lde_neto);
           }
           
           lde_saldo_dscto = lde_saldo_dscto - lde_saldo;
           valor1 = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
           document.getElementById("numB_"+ls_servicio_main).value = valor1;
           document.getElementsByClassName("Total B")[0].innerHTML = valor1;
           totalizar(ls_servicio_main);

      }               
      else
      {
                     
         if(lde_saldo_dscto <= lde_neto)
         { 
              lde_saldo = pasaAnumero(lde_saldo_dscto);
         }
         else
         {
              lde_saldo = pasaAnumero(lde_neto);
         }
         lde_saldo_dscto = lde_saldo_dscto - lde_saldo;
         valor1 = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
          valor2 = Number(lde_saldo_dscto).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });         
         document.getElementById("numB_"+ls_servicio_main).value = valor1;
         document.getElementsByClassName("Total B")[0].innerHTML = valor1;
         totalizar(ls_servicio_main);
      }

      // -- Endoso CUOI -- // 
      
      if(is_endoso_cuoi == 'NO') 
      {          
           if (lde_saldo_endoso <= lde_neto)
           {
               lde_saldo = lde_saldo_endoso;
           }
           else
           {
               lde_saldo = lde_neto;
           }
             
           lde_saldo_endoso = lde_saldo_endoso - lde_saldo;
           valor2 = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
           document.getElementById("numG_"+ls_servicio_main).value = valor2;                
      }
  });

  // -- Datos del Detalle -- //

  lde_descuento = 0.00;
  lde_saldo_total = 0.00;

  container.querySelectorAll('tr').forEach(function (li_i)
  {
      ls_servicio_main = $(li_i).attr("name"); //codigo de servicio          
      lde_valor = document.getElementById("numB_"+ls_servicio_main).value; //imp_descto
      //lde_valor_saldo = tab_1.tp_1.dw_detalle.GetItemDecimal(li_i, "compute_7");     // AQUI <------
      lde_valor_saldo = document.getElementById("numH1_"+ls_servicio_main).value;
      lde_valor_saldo = pasaAnumero(lde_valor_saldo);
      
      // -- Totaliza -- //
      
      lde_descuento = lde_descuento + lde_valor;
      lde_saldo_total = lde_saldo_total + lde_valor_saldo;  
  });

  // -- Afecto a igv -- //

  container.querySelectorAll('tr').forEach(function (li_i)
  {      
      //lde_valor_saldo = tab_1.tp_1.dw_detalle.GetItemDecimal(li_i, "compute_7");     // importe saldo cada uno
      ls_servicio = $(li_i).attr("name"); //codigo de servicio
      lde_valor_saldo = document.getElementById("numH1_"+ls_servicio).value;
      lde_saldo_foma = document.getElementById("numD_"+ls_servicio).value;  //imp foma 
      lde_saldo_foma = pasaAnumero(lde_saldo_foma);
      //ls_flg_afecto_igv = 'NO';

      if(lde_saldo_foma == null)
      {
        lde_saldo_foma = 0;
      }
      
      //-----consulta flg igv-----//

      var ls_flg_afecto_igv = document.getElementById("flg_afecto_igv_"+ls_servicio).value;;

      
      if ((ls_flg_afecto_igv == null) || $.trim(ls_flg_afecto_igv) == '') // trim elimina espacios en blanco
      {
        ls_flg_afecto_igv = 'NO';
      }
      if( ls_flg_afecto_igv == 'SI')
      {
        lde_afecto = lde_afecto + lde_valor_saldo;
      }
      
      // -- Acumula FOMA -- //
      
      lde_saldo_foma_total = lde_saldo_foma_total + lde_saldo_foma;
                  
  });

  // -- Carencia -- //

  container.querySelectorAll('tr').forEach(function (li_i)
  {     
      ls_servicio_main = $(li_i).attr("name"); //codigo de servicio 
      ls_flg_ds = document.getElementById("ls_flg_ds_"+ls_servicio_main).value;         
      // tab_1.tp_1.dw_detalle.GetItemString(li_i, "flg_ds");

      if( ls_flg_ds == null)
      {
        ls_flg_ds = 'NO';
      }
      
      // -- DS -- //
      
      if( ls_flg_ds == 'SI')
      {
         lde_precio_lista = document.getElementById("lista_"+ls_servicio_main).value; //precio lista
         lde_precio_venta = document.getElementById("numA_"+ls_servicio_main).value; //imp imp venta
         lde_valor_descuento = document.getElementById("numB_"+ls_servicio_main).value; //imp dscto
         lde_valor_descuento = pasaAnumero(lde_valor_descuento);
         
         // -- Inicializa -- //
         
         if( lde_precio_lista == null)
         {
           lde_precio_lista = 0;
         }
         if( lde_precio_venta == null)
         {
           lde_precio_venta = 0;
         }
         if( lde_valor_descuento == null)
         {
           lde_valor_descuento = 0;
         }
         
         // -- Carencia -- //
         
         var lde_valor_neto = lde_precio_venta - lde_valor_descuento;
        
         var lde_carencia = lde_precio_lista - lde_valor_neto;

         var valor3 = Number(lde_carencia).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
         
         // -- Seteo -- //
         
         document.getElementById("numE_"+ls_servicio_main).value = valor3;// imp carencias   
         totalizar(ls_servicio_main);      
      }  
  });

  // -- Subtotal -- //

  lde_igv = lde_afecto - (lde_afecto / ( 1 + gde_igv) );   
  lde_subtotal = lde_saldo_total - lde_igv;

  // -- Total -- //

  //lde_total = tab_1.tp_1.dw_detalle.GetItemDecimal(1, "compute_3");       // AQUI importe total suma
  var lde_total = document.getElementsByClassName("Total C")[0].innerHTML;
  var lde_total_dscto = document.getElementsByClassName("Total B")[0].innerHTML;

  // -- Seteo -- //

  var aux1 = Number(lde_endoso).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
  document.getElementById("imp_cobertura").value = aux1;
  document.getElementById("endoso1").value = aux1;
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_cobertura", lde_endoso);
  document.getElementById("imp_dscto").value = lde_total_dscto;
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_dscto", lde_descuento);
  var aux3 = Number(lde_saldo_total).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
  document.getElementById("saldopagar").value = aux3;
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_saldo", lde_saldo_total);
  var aux4 = Number(pasaAnumero(lde_cuoi_total) + lde_cuoi_m).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
  document.getElementById("cuitotal").value = aux4;
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_cuoi", lde_cuoi_total + lde_cuoi_m);
  document.getElementById("total1").value = lde_total;
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_total", lde_total);
  document.getElementById("imp_subtotal").value = lde_subtotal;        //hiden
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_subtotal", lde_subtotal);
  document.getElementById("imp_igv").value = lde_igv;                  //hidden
  //tab_1.tp_1.dw_resumen.SetItem(1, "imp_igv", lde_igv);

  // -- Cronograma -- //

  //tab_1.tp_6.dw_det_interes.SetItem(1, "imp_saldo", lde_saldo_total);
  document.getElementById("saldoFinanciar").value = aux3;
  //tab_1.tp_6.dw_foma.SetItem(1, "imp_saldo_foma", lde_saldo_foma_total);
  var aux4 = Number(lde_saldo_foma_total).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
  document.getElementById("imp_saldo_foma").value = aux4;

  if(lde_saldo_foma_total != 0)
  {             
      /*tab_1.tp_6.dw_foma.Object.cod_cuota.Protect = 0;
      tab_1.tp_6.dw_foma.Object.cod_cuota.BackGround.Color = RGB(255,255,255);*/
      $('#cuota_FOMA').prop('disabled',false);
      
      /*tab_1.tp_6.dw_foma.Object.fch_primera_cuota.Protect = 0;
      tab_1.tp_6.dw_foma.Object.fch_primera_cuota.BackGround.Color = RGB(255,255,255);*/
      $('#m_datepicker_1_end').prop('disabled',false);
      
      //tab_1.tp_6.cb_generar_foma.Enabled = True;
      $('#cb_generar_foma').prop('disabled',false);
     
      //tab_1.tp_6.pb_20.Enabled = True;
  }                
  else
  {             
      /*tab_1.tp_6.dw_foma.Object.cod_cuota.Protect = 1;
      tab_1.tp_6.dw_foma.Object.cod_cuota.BackGround.Color = RGB(236,236,236);*/
      $('#cod_cuota').prop('disabled',true);

      /*tab_1.tp_6.dw_foma.Object.fch_primera_cuota.Protect = 1;
      tab_1.tp_6.dw_foma.Object.fch_primera_cuota.BackGround.Color = RGB(236,236,236);*/
      document.getElementById("m_datepicker_1_end").value = '';
      $('#m_datepicker_1_end').prop('disabled',true);
      
      //tab_1.tp_6.cb_generar_foma.Enabled = False;
      $('#cb_generar_foma').prop('disabled',true);

      //tab_1.tp_6.pb_20.Enabled = False;
  }

  // -- Saldo del cronograma -- //

  if( lde_saldo_total <= 0)
  {       
    var largo = $("#bodyCronograma tr").length;      
    if( largo >= 1)
      {            
        // f_sys_mensaje_usuario(Title, "MSGLIB", "EL SALDO A FINANCIAR ES CERO (0), SE ELIMINARÁ EL CRONOGRAMA DE PAGOS GENERADO.", "PRV");
         swal({
             title: "Aviso",
             text: "El saldo a financiar es cero (0), se eliminará el cronograma de pagos generado.",
             type: "warning",
             confirmButtonText: "Aceptar",
          });
         
         //tab_1.tp_6.dw_det_interes.SetItem(1, "cod_cuota", null);
         document.getElementById("numCuotas").value = 0;
         //tab_1.tp_6.dw_det_interes.SetItem(1, "cod_interes", null);
         document.getElementById("interes").value = 0;
         
         for( li_i = largo; li_i = 0; li_i--)
         {
            //tab_1.tp_6.dw_det_cuotas.DeleteRow(li_i);
            var container6 = document.querySelector('#bodyCronograma');
            container6.querySelectorAll('tr').forEach(function (li_i)
            {
              $(li_i).remove();
            });

         }          
      } 
  }
}

//----------------------------------------------------------------------------------------------//
//---------------------------------------FUNCIÓN CUI--------------------------------------------//
//----------------------------------------------------------------------------------------------//

function cambiaCUI(){

var ide_tc = document.getElementById('tipoCamb').value; 
var lde_cuoi = document.getElementById('importeCUI').value;
lde_cuoi = pasaAnumero(lde_cuoi);
var lde_cuoi_m = 0.00;
var lde_saldo = 0;

if (!lde_cuoi_m){
  lde_cuoi_m = 0.00;
}
var lde_saldo_cuoi = pasaAnumero(lde_cuoi) + lde_cuoi_m;
var li_eliminar = 0;

var nFilas = $("#bodyServicio tr").length;
var seleccionados = new Array(); 
  if(nFilas == 0){
     swal({
          title: "Error",
          text: "Debe haber al menos un elemento en la tabla.",
          type: "error",
          confirmButtonText: "aceptar",
      });
     document.getElementById("importeCUI").value='';
     document.getElementById("importeCUI").placeholder="0.00";
     document.getElementById("cuitotal").value = '';
     document.getElementById("cuitotal").placeholder="0.00";
  }
 else{
   var container = document.querySelector('#bodyServicio');
      container.querySelectorAll('tr').forEach(function (li_i) 
      {
        
        //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()     
        var ls_servicio = $(li_i).attr("name"); //codigo de servicio
        var li_ctd = document.getElementById("ctd_"+ls_servicio).value; //ctd_cantidad
        var lde_precio = document.getElementById("numA_"+ls_servicio).value; //imp_precio_venta
        if(li_ctd == 0){
          swal({
             title: "Error",
             text: "Debe ingresar la cantidad.",
             type: "error",
             confirmButtonText: "Aceptar",
          });
          //f_sys_mensaje_usuario(Title,"MSGLIB", "DETALLE DE SERVICIOS / LÍNEA [ " + String(li_i) + " ] : DEBE INGRESAR LA CANTIDAD.", "PRV")
          document.getElementById("importeCUI").value='';
          document.getElementById("importeCUI").placeholder="0.00";
          document.getElementById("cuitotal").value = '';
          document.getElementById("cuitotal").placeholder="0.00";
        }

     });         

    // -- Endoso -- //

  var lde_endoso = 0.00;
  //For li_i = 1 To tab_1.tp_2.dw_cobertura.Rowcount()
  var container1 = document.querySelector('#bodyCobertura');   
  container1.querySelectorAll('tr').forEach(function (fila) 
  {
    li_i = $(fila).attr("name");
    var lde_valor_endoso = document.getElementById("vEndoso_"+li_i).value; 
    lde_valor_endoso = pasaAnumero(lde_valor_endoso);
    var ls_moneda = document.getElementById('mon_'+li_i).value; 
    //tab_1.tp_2.dw_cobertura.GetItemString(li_i, "cod_moneda") 
    //If ls_moneda = 'DOL' Then lde_valor_endoso = Round(lde_valor_endoso * ide_tc, 4)
    if(ls_moneda == 'DOL'){
      lde_valor_endoso = parseFloat(lde_valor_endoso * ide_tc);
    }               
    lde_endoso = lde_endoso + lde_valor_endoso;
  });

  // -- Servicios al contado -- //

    //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
   container.querySelectorAll('tr').forEach(function (li_i) 
    {
      var ls_servicio = $(li_i).attr("name"); //codigo de servicio 
      document.getElementById("numF_"+ls_servicio).value = '';
      document.getElementById("numF_"+ls_servicio).placeholder = '0.00';
    });

    //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
    container.querySelectorAll('tr').forEach(function (li_i) 
    {
        ls_servicio = $(li_i).attr("name");          
        li_ctd = document.getElementById("ctd_"+ls_servicio).value;
        lde_cuoi_st = document.getElementById("cui_std_"+ls_servicio).value;
        ls_flg_contado = document.getElementById("ls_flg_contado_"+ls_servicio).value;
        
        //If IsNull(ls_flg_contado) Then ls_flg_contado = 'NO'
        if(!ls_flg_contado || ls_flg_contado == null){
          ls_flg_contado = 'NO';
        }
        //If IsNull(lde_cuoi_st) Then lde_cuoi_st = 0.00
        if(!lde_cuoi_st || lde_cuoi_st == null){
          lde_cuoi_st = 0;
        }
        
        // -- Asigna CUOI -- // 
        
        //If lde_saldo_cuoi >= lde_cuoi_st Then
        if(lde_saldo_cuoi >= lde_cuoi_st){
        
           //If ls_flg_contado = 'SI' Then
           if(ls_flg_contado == 'SI'){
                           
             lde_saldo_cuoi = lde_saldo_cuoi - ( lde_cuoi_st * li_ctd );
             //tab_1.tp_1.dw_detalle.SetItem(li_i, "imp_cuoi", ( lde_cuoi_st * li_ctd ))
             var valor = (lde_cuoi_st * li_ctd);
             var aux = Number(valor).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
             document.getElementById("numF_"+ls_servicio).value = aux;
            // totalizar(ls_servicio);
                           
           }
                       
        }
                    
    }); 

    //If IsNull(lde_saldo_cuoi) Or lde_saldo_cuoi = 0.00 Then lde_saldo_cuoi = 0.00
    if(!lde_saldo_cuoi || lde_saldo_cuoi == null){
        lde_saldo_cuoi = 0;
    }

    // -- Servicios al no contado -- //

    //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
    container.querySelectorAll('tr').forEach(function (li_i) 
    {   
        ls_servicio = $(li_i).attr("name");           
        //lde_cuoi_st = tab_1.tp_1.dw_detalle.GetItemDecimal(li_i, "compute_7")  
        lde_cuoi_st = document.getElementById("numH1_"+ls_servicio).value;
        ls_flg_contado = document.getElementById("ls_flg_contado_"+ls_servicio).value;
        //If f_sys_valida_ingreso_datos(ls_flg_contado, "TEX") = False Then ls_flg_contado = 'NO'
        if(!ls_flg_contado){
          ls_flg_contado = 'NO';  
        }
        
        // -- Asigna CUOI -- //
        
        //If ls_flg_contado = 'NO' Then
        if(ls_flg_contado == 'NO'){
           
           //If lde_saldo_cuoi > 0 Then
           if(lde_saldo_cuoi > 0){
                           
               //If lde_saldo_cuoi < lde_cuoi_st Then
               if(lde_saldo_cuoi < lde_cuoi_st){
                    lde_saldo = lde_saldo_cuoi;
                }
               else{
                    lde_saldo = lde_cuoi_st;
               }
               
               // -- Saldo -- //
               
               //tab_1.tp_1.dw_detalle.SetItem(li_i, "imp_cuoi", lde_saldo)
              var aux = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
              document.getElementById("numF_"+ls_servicio).value = aux;
              document.getElementById("importeCUI").value = aux;
              totalizar(ls_servicio);
              lde_saldo_cuoi = lde_saldo_cuoi - lde_saldo;
           
           }
        
        }
                    
    });

    // -- Suma CUOI -- // 

    is_endoso_cuoi = 'NO'; 

    if(is_endoso_cuoi == 'SI'){  
      lde_cuoi = lde_cuoi;
      lde_endoso = lde_endoso;                     
      lde_cuoi = lde_cuoi + lde_endoso;
    } 

    // -- Text -- //
    //tab_1.tp_1.dw_resumen.SetItem(1, "imp_cuoi", lde_cuoi)
    var aux1 = Number(lde_cuoi).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    document.getElementById("cuitotal").value = aux1;

    // -- Inicializa Endoso y Descuento -- //

  // For li_i = tab_1.tp_7.dw_dscto.RowCount() To 1 Step -1
    var container2 = document.querySelector('#bodyDscto');
    container2.querySelectorAll('tr').forEach(function (li_i)
    {
      ls_dscto = $(li_i).attr("name");                                          
      //ls_flg_modif = tab_1.tp_7.dw_dscto.GetItemString(li_i, "flg_modif_contrato")
      ls_flg_modif = document.getElementById("flg_modif_contrato_"+ls_dscto).value;
      //ls_flg_convenio = tab_1.tp_7.dw_dscto.GetItemString(li_i, "flg_convenio")
      ls_flg_convenio = document.getElementById("flg_convenio_"+ls_dscto).value;

      //If ls_flg_modif = 'NO' And ls_flg_convenio = 'NO' Then 
      if(ls_flg_modif == 'NO' && ls_flg_convenio == 'NO'){
         //tab_1.tp_7.dw_dscto.DeleteRow(li_i)
         $(li_i).remove();
         li_eliminar = li_eliminar + 1;
      }
                    
    }); 

      // -- Totales -- //

  cambiaTodo();
  }
}

//----------------------------------------------------------------------------------------------//
//---------------------------------------FUNCIÓN CRONOGRAMA-------------------------------------//
//----------------------------------------------------------------------------------------------//

function cronograma(){

  var   lde_cuota = 0;
  var   lde_total_saldo = 0;
  var   lde_interes = 0;
  var   lde_total = 0;
  var   lde_amortizacion = 0;
  var   lde_sumcapital = 0.00;
  var   lde_sumtotal = 0.00;
  var   lde_capital_cuota = 0;
  var   lde_igv_cuota = 0;
  var   lde_total_cuota = 0;
  var   lde_valor_cuota_x_mes = 0; 
  var   lde_valor_cuota_interes_x_mes = 0;
  var   lde_saldo_total = 0;
  var   lde_capital_cuota_2 = 0;
  var   lde_saldo_2 = 0;
  var   lde_saldo_3 = 0;
  var   lde_amortizacion_2 = 0;
  var   lde_amortizacion_afecta;
  var   gde_igv = 0.18;
  var   is_flg_integral = document.getElementById("flagIntegral").value;
  var lde_porc_total = 0;
  // -- Datos -- //

  //ls_cuota       = tab_1.tp_6.dw_det_interes.GetItemString(1, "cod_cuota") 
  var ls_cuota = document.getElementById("numCuotas").value; 
  //ls_interes     = tab_1.tp_6.dw_det_interes.GetItemString(1, "cod_interes")
  var ls_interes = document.getElementById("interes").value;
  //ldt_fch_ven    = tab_1.tp_6.dw_det_interes.GetItemDatetime(1, "fch_vencimiento")
  var ldt_fch_ven = $('#m_datepicker_1').datepicker("getDate"); 
  //lde_saldo      = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
  var lde_saldo = document.getElementById("saldoFinanciar").value;
  lde_saldo = pasaAnumero(lde_saldo);
  //lde_saldo_foma = tab_1.tp_6.dw_foma.GetItemDecimal(1, "imp_saldo_foma")
  var lde_saldo_foma = document.getElementById("imp_saldo_foma").value;
  lde_saldo_foma = pasaAnumero(lde_saldo_foma);
  //ldt_emision = dw_cab.GetItemDatetime(1, "fch_registro")         //fch_registro -> fecha del equipo
  var ldt_emision = new Date();
  //ldt_emision = Datetime(Date(ldt_emision))             //quia las horas
  var ldt_hoy = new Date();             //fecHA HOY

  // -- Valida -- //

  if ($("#bodyServicio tr").length==0) {
    swal({
        title: "Error",
        text: "Debe ingresar el detalle de los servicios que desea adquirir.",
        type: "error",
        confirmButtonText: "Aceptar",
      });
    /*f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR EL DETALLE DE LOS SERVICIOS QUE DESEA ADQUIRIR.", "PRV")
    tab_1.selectedtab = 1*/
  }

  if(lde_saldo == null || lde_saldo == ''){
    swal({
        title: "Error",
        text: "El contrato no tiene saldo a financiar.",
        type: "error",
        confirmButtonText: "Aceptar",
      });
  }

  if(ls_cuota == null || ls_cuota == '' || ls_cuota == 'Seleccione...'){
      swal({
        title: "Error",
        text: "Debe seleccionar el número de cuotas.",
        type: "error",
        confirmButtonText: "Aceptar",
        onBeforeOpen:document.getElementById("numCuotas").focus()
      });
      /*f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE SELECCIONAR EL NÚMERO DE CUOTAS.", "PRV")
      f_sys_dw_ubica_cursor(tab_1.tp_6.dw_det_interes, "cod_cuota", "FREE", 0)
      Return*/
      return;
  }

  if(ldt_fch_ven == null || ldt_fch_ven == ''){
      swal({
        title: "Error",
        text: "Debe ingresar la fecha del primer vencimiento.",
        type: "error",
        confirmButtonText: "Aceptar",
        onBeforeOpen: document.getElementById("m_datepicker_1").focus()
      });
      /*f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR LA FECHA DEL PRIMER VENCIMIENTO.", "PRV")
      f_sys_dw_ubica_cursor(tab_1.tp_6.dw_det_interes, "fch_vencimiento", "FREE", 0)
      Return*/
      return;
  }

  if(ldt_emision > ldt_fch_ven){
      swal({
        title: "Error",
        text: "La fecha del primer vencimiento debe ser mayor a la fecha de emisión del contrato.",
        type: "error",
        confirmButtonText: "Aceptar",
        onBeforeOpen: document.getElementById("m_datepicker_1").focus()
      });
      /*f_sys_mensaje_usuario(Title, "MSGLIB", "LA FECHA DE PRIMER VENCIMIENTO DEBE SER MAYOR A LA FECHA DE EMISIÓN DEL CONTRATO [" + String(Date(ldt_emision), "DD/MM/YYYY") + "].", "PRV")
      f_sys_dw_ubica_cursor(tab_1.tp_6.dw_det_interes, "fch_vencimiento", "FREE", 0)
      Return*/
      return;
  }

// -- Obtiene Igv -- //

  if(ldt_emision == null || ldt_emision == ''){
      lde_valor_igv = gde_igv; 
  }          //gde_igv->0.18
  else{
      lde_valor_igv =  1;  //f_sys_obtiene_igv(ldt_emision)   //igv segun fecha->otra funcion
  }

// -- Afecto a I.G.V. -- //

  if(is_flg_integral == 'SI'){

      //lde_saldo_total = tab_1.tp_1.dw_detalle.GetItemDecimal(1, "compute_8")      //compute 8 -> total h
      var lde_saldo_total = document.getElementsByClassName("Total H")[0].innerHTML;
      lde_saldo_total = pasaAnumero(lde_saldo_total);
      if(lde_saldo_total == null || lde_saldo_total == ''){
          lde_saldo_total = 0;
      }
      
      //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
      var container = document.querySelector('#bodyServicio');
      container.querySelectorAll('tr').forEach(function (li_i) 
      {  
         
        //ls_cod_servicio = tab_1.tp_1.dw_detalle.GetItemString(li_i, "cod_servicio")
        var  ls_cod_servicio = $(li_i).attr("name");          
        // lde_saldo_x_servicio = tab_1.tp_1.dw_detalle.GetItemDecimal(li_i, "compute_7") // saldo cada uno
        var lde_saldo_x_servicio = document.getElementById("numH1_"+ls_cod_servicio).value;      
         
         // -- I.G.V. -- //
         
         /*SELECT  vtama_tipo_servicio.flg_afecto_igv
         INTO                     :ls_flg_afecto_igv_det
         FROM                   vtama_servicio
         INNER JOIN vtama_tipo_servicio ON vtama_tipo_servicio.cod_tipo_servicio = vtama_servicio.cod_tipo_servicio
         WHERE vtama_servicio.cod_servicio = :ls_cod_servicio
         USING SQLCA;*/

         var ls_flg_afecto_igv_det = document.getElementById("flg_afecto_igv_"+ls_cod_servicio).value;
         
         if(ls_flg_afecto_igv_det == null || ls_flg_afecto_igv_det == ''){
             ls_flg_afecto_igv_det = 'NO';
         }
         
         if(ls_flg_afecto_igv_det == 'SI'){
                         
           var lde_porc = 0;
           lde_porc = lde_saldo_x_servicio / lde_saldo_total
           if(lde_porc == null || lde_porc == ''){
             lde_porc = 0;
            }
           
           lde_porc_total = lde_porc_total + lde_porc;
                         
         }
                     
      });
      
      // -- I.G.V. -- //
      
      //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
      var ls_cod_servicio = [];
      var row = $(".codServicio").length;
      var codServicio = $(".codServicio")
      for (var i = 0; i < row; i++) {
                     
         //ls_cod_servicio = tab_1.tp_1.dw_detalle.GetItemString(li_i, "cod_servicio")
         ls_cod_servicio = $(codServicio[i]).val(); 

         // -- Flag -- //
         
         /*SELECT  vtama_tipo_servicio.flg_afecto_igv
         INTO                     :ls_flg_afecto_igv
         FROM                   vtama_servicio
         INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio
         WHERE vtama_servicio.cod_servicio = :ls_cod_servicio
         USING SQLCA;*/
         var ls_flg_afecto_igv = document.getElementById("flg_afecto_igv_"+ls_cod_servicio).value;

         if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
            ls_flg_afecto_igv = 'NO';
          }
         
         // -- Si? -- //
         
         if(ls_flg_afecto_igv == 'SI'){
          //Then EXIT
          break;
         } 
                     
      }
  }              
  else{

      //For li_i = 1 To tab_1.tp_1.dw_detalle.Rowcount()
      var ls_cod_servicio = [];
      var row = $(".codServicio").length;
      var codServicio = $(".codServicio")
      for (var i = 0; i < row; i++) {
      //    //ls_cod_servicio = tab_1.tp_1.dw_detalle.GetItemString(li_i, "cod_servicio")
      ls_cod_servicio = $(codServicio[i]).val(); 
            //console.log('re',$(codServicio[i]).val());

      //    // -- Flag -- //
         
      //    SELECT  vtama_tipo_servicio.flg_afecto_igv
      //    INTO                     :ls_flg_afecto_igv
      //    FROM                   vtama_servicio
      //    INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio
      //    WHERE vtama_servicio.cod_servicio = :ls_cod_servicio
      //    USING SQLCA;
      var ls_flg_afecto_igv = document.getElementById("flg_afecto_igv_"+ls_cod_servicio).value;
         
         if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
            ls_flg_afecto_igv = 'NO';
          }
         
         // -- Si? -- //
         
         if(ls_flg_afecto_igv == 'SI'){
          //Then EXIT
          break;
         }
                     
      }

  }
  // -- I.G.V. -- //

  var lde_valor_igv_det = lde_valor_igv
  if(ls_flg_afecto_igv == 'NO'){
    lde_valor_igv = 0.00;
  }

  // -- Obtiene numero de cuotas -- //

  /*SELECT  vtama_cuota.num_cuotas
  INTO                     :li_cuotas
  FROM                   vtama_cuota
  WHERE vtama_cuota.cod_cuota = :ls_cuota
  USING SQLCA;*/

  var li_cuotas = document.getElementById("numCuotas").value;
  if(li_cuotas == null || li_cuotas == '' || li_cuotas == 'Seleccione...'){
    li_cuotas = 0;
  }

  // -- Interes -- //
                                 
  /*SELECT  vtama_interes.num_valor
  INTO                     :lde_valor
  FROM                   vtama_interes 
  WHERE vtama_interes.cod_interes = :ls_interes
  USING SQLCA;*/

  var lde_valor = document.getElementById("interes").value;

  if(lde_valor == null || lde_valor == '' || lde_valor == 'Seleccione...'){
    lde_valor = 0;
  }

  lde_valor = pasaAnumero(lde_valor);

  // ----- Forma de calculo según configuración ------ //

  var is_tipo_calculo_interes = 3;
  //Choose Case is_tipo_calculo_interes
  switch(is_tipo_calculo_interes){                            
      case 3:      //solo este case
           /*
           lde_valor = Round(((lde_valor / 100) / 12), 4)
           */

          lde_valor = ( 1 + (lde_valor / 100)) ** ( 1 / 12 ) - 1;
          //  lde_valor = lde_valor / 100; 

           if (lde_valor == null || lde_valor == '' || lde_valor == 'Seleccione...'){
              lde_valor = 0.00;
            }
           // ----- Total en caso no haber interes ----- //
           
           lde_total = lde_saldo;
           
           if(lde_porc_total > 0){
              lde_total_saldo = lde_saldo * lde_porc_total / ( 1 + lde_valor_igv_det ) + lde_saldo * ( 1 - lde_porc_total);
           }
           else{
              lde_total_saldo = lde_saldo / ( 1 + lde_valor_igv );
           }
           
           // -- Calculo de Cuota -- //
           
           if(lde_valor <= 0){
              lde_cuota = lde_saldo / li_cuotas;
           }
           else{        
              lde_cuota = lde_saldo * ((lde_valor * (1 + lde_valor) ** li_cuotas) / ((1 + lde_valor) ** li_cuotas - 1));

           }
           
           // -- Limpia Cronograma -- //

          var container1 = document.querySelector('#bodyCronograma');

          container1.querySelectorAll('tr').forEach(function (chek) {         
          //For li_i = tab_1.tp_6.dw_det_cuotas.Rowcount() to 1 Step -1    //det_cuotas ->cronograma
              $(chek).remove();
              //tab_1.tp_6.dw_det_cuotas.DeleteRow(li_i)
           });
           
           // -- Armar Cronograma -- //
           var cuotas = li_cuotas-1;

          for( li_i = 1;li_i <= cuotas;li_i++) 
          {
               // -- Calculo -- //
               
               lde_interes = lde_total_saldo * lde_valor;

               // -- Datos -- //
               
               if(lde_porc_total > 0){
                               
                   lde_capital_cuota = lde_cuota * lde_porc_total;
                   lde_capital_cuota = lde_capital_cuota / ( 1 + lde_valor_igv_det );
                   
                   lde_capital_cuota_2 = lde_cuota * ( 1 - lde_porc_total);
                   lde_capital_cuota = lde_capital_cuota + lde_capital_cuota_2;
               
               }                
               else{
                   lde_capital_cuota = lde_cuota / ( 1 + lde_valor_igv );
               }
                               
               lde_igv_cuota = lde_cuota - lde_capital_cuota;
               lde_amortizacion = ( lde_cuota - lde_igv_cuota ) - lde_interes;

               //lda_vencimiento = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_i - 1);
               var aux_dia = ldt_fch_ven.getDate();
               var aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
               var aux_mes = ldt_fch_ven.getMonth();
               var  aux_anio = ldt_fch_ven.getFullYear();
               if(aux_mes == '0'){
                  aux_mes = '12';
                  aux_anio = ldt_fch_ven.getFullYear()-1;
                }               
               var lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
               
               // -- Saldos -- //
               
               lde_total_saldo = lde_total_saldo - lde_amortizacion;

               var aux_lde_amortizacion = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
               var aux_lde_interes = Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
               var aux_lde_igv_cuota = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
               var aux_lde_cuota = Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

               // -- Seteo -- //
              
              /* tab_1.tp_6.dw_det_cuotas.InsertRow(0)
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", 'ARM')
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes, 2))
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total",  Round(lde_cuota, 2))
               tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo",  Round(lde_cuota, 2))*/
            fila = '<tr><input type="hidden" class="det_cuotas" value="'+li_i+'"><td style="width:7.2rem;text-align:center;">'+li_i+'</td><td style="width:9rem;text-align:center;">REG</td><td style="width:6rem;text-align:center;" class="ARM">ARM</td><td style="width:9.3rem;text-align:center;">'+lda_vencimiento+'</td><td style="width:6rem;text-align:right;" class ="sumcapital cuotaA">'+aux_lde_amortizacion+'</td><td style="width:6rem;text-align:right;" class="cuotaB">'+aux_lde_interes+'</td><td style="width:6rem;text-align:right;" >'+aux_lde_igv_cuota+'</td><td style="width:6rem;text-align:right;" class = "sumtotal" >'+aux_lde_cuota+'</td><td style="width:5.2rem;text-align:right;">'+aux_lde_cuota+'</td></tr>';
            document.getElementById("bodyCronograma").insertAdjacentHTML("beforeEnd" ,fila);

            lde_sumcapital += lde_amortizacion;
            lde_sumtotal += lde_cuota;
                           
          }
           
    // -- Cuota Final -- //
            
         //  lde_sumcapital = 0.00
         //  lde_sumtotal    = 0.00
           
         // For li_i = 1 to (li_cuotas - 1){
                           
         //   tab_1.tp_6.dw_det_cuotas.accepttext()
         //   lde_sumcapital = lde_sumcapital + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_principal")
         //   lde_sumtotal = lde_sumtotal + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_total")
           
         //  }
           
           if(lde_porc_total > 0){

             lde_saldo_2 = lde_saldo * lde_porc_total;
             lde_saldo_2 =  lde_saldo_2 / ( 1 + lde_valor_igv_det );
             
             lde_saldo_3 = lde_saldo * ( 1 - lde_porc_total);
             lde_saldo_2 = lde_saldo_2 + lde_saldo_3;
           
           }                
           else{
                           
             lde_saldo_2 =  lde_saldo / ( 1 + lde_valor_igv );
                           
           }
           
           lde_interes = (lde_saldo_2 - lde_sumcapital ) * lde_valor;
           
           if (lde_valor <= 0){

             if (lde_porc_total > 0){
                             
                 lde_amortizacion = (lde_total, 2) - lde_sumtotal;
                 lde_amortizacion_2 = lde_amortizacion;
                 
                 lde_amortizacion = lde_amortizacion * lde_porc_total;
                 lde_amortizacion_afecta = lde_amortizacion / ( 1 + lde_valor_igv_det );
                 lde_amortizacion = (lde_amortizacion / ( 1 + lde_valor_igv_det )) + lde_amortizacion_2 * ( 1 - lde_porc_total);
                             
             }
             else{
                lde_amortizacion = (lde_total - lde_sumtotal) / ( 1 + lde_valor_igv );
             }
           
           }                
           else{        
                lde_amortizacion = lde_saldo_2 - lde_sumcapital;
           } 
           
          //lda_vencimiento = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_cuotas - 1)
          aux_dia = ldt_fch_ven.getDate();
          aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
          var aux_mes = ldt_fch_ven.getMonth();
          aux_anio = ldt_fch_ven.getFullYear();
          if(aux_mes == '0'){
            aux_mes = '12';
            aux_anio = ldt_fch_ven.getFullYear()-1;
          }               
          lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
            
           // -- Datos -- //
           
           if(lde_porc_total > 0){
              lde_igv_cuota = ( lde_amortizacion_afecta + lde_interes ) * lde_valor_igv_det;
           }
           else{
              lde_igv_cuota   = ( lde_amortizacion + lde_interes ) * lde_valor_igv;
           }
           
           lde_cuota = ( lde_amortizacion + lde_interes ) + lde_igv_cuota;
           
           // -- Regenera -- //

           if (lde_porc_total > 0){
                           
               lde_capital_cuota = lde_cuota * lde_porc_total;
               lde_capital_cuota = lde_capital_cuota / ( 1 + lde_valor_igv_det );
               
               lde_capital_cuota_2 = lde_cuota * ( 1 - lde_porc_total);
               lde_capital_cuota = lde_capital_cuota + lde_capital_cuota_2;
                           
           }
           else{
              lde_capital_cuota = lde_cuota / ( 1 + lde_valor_igv )
           }
           
           lde_igv_cuota = lde_cuota - lde_capital_cuota;
           
           if (lde_valor > 0){
              lde_interes = lde_capital_cuota - lde_amortizacion;
           }
           else{
              lde_amortizacion = lde_capital_cuota;
           }

           // -- Inserta -- //
           
           /*tab_1.tp_6.dw_det_cuotas.InsertRow(0)  
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", "ARM")
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total",  Round(lde_cuota, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo",  Round(lde_cuota, 2))*/
           var aux_lde_amortizacion = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
           var aux_lde_interes = Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
           var aux_lde_igv_cuota = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
           var aux_lde_cuota = Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

            var fila1 = '<tr><input type="hidden" class="det_cuotas" value="'+li_i+'"><td style="width:7.2rem;text-align:center;">'+li_i+'</td><td style="width:9rem;text-align:center;">REG</td><td style="width:6rem;text-align:center;" class="ARM">ARM</td><td style="width:9.3rem;text-align:center;">'+lda_vencimiento+'</td><td style="width:6rem;text-align:right;" class = "imp_principal_'+li_i+'">'+aux_lde_amortizacion+'</td><td style="width:6rem;text-align:right;">'+aux_lde_interes+'</td><td style="width:6rem;text-align:right;">'+aux_lde_igv_cuota+'</td><td style="width:6rem;text-align:right;" class = "imp_total_'+li_i+'" >'+aux_lde_cuota+'</td><td style="width:5.2rem;text-align:right;">'+aux_lde_cuota+'</td></tr>';
          document.getElementById("bodyCronograma").insertAdjacentHTML("beforeEnd" ,fila1);
          
  /*case '1': // -- Remanso -- //
           
           lde_valor = Round(((lde_valor / 100) / 12), 4)
           If IsNull(lde_valor) Then lde_valor = 0.00
                           
           // -- Total en caso no haber interes -- //
           
           lde_total = lde_saldo
           lde_total_saldo = Round( lde_saldo / ( 1 + lde_valor_igv ), 2)
           
           // -- Calculo de Cuota -- //
           
           If lde_valor <= 0 Then
                           lde_cuota = lde_saldo / li_cuotas
           Else        
                           lde_cuota = lde_saldo * ((lde_valor * (1 + lde_valor) ^ li_cuotas) / ((1 + lde_valor) ^ li_cuotas - 1))
            End If
           
           // -- Redondeo -- //
           
           Choose Case is_tipo_redondeo
                                           
                           Case 'ARRIBA'
                                           lde_cuota = wf_redondeo_up(lde_cuota)         
                                           
                           Case 'CERO'
                                           lde_cuota = Round(lde_cuota, 0)
           
           End Choose
           
           // -- Limpia Cronograma -- //
           
           For li_i = tab_1.tp_6.dw_det_cuotas.Rowcount() to 1 Step -1
                           tab_1.tp_6.dw_det_cuotas.DeleteRow(li_i)
           Next
           
           // -- Armar Cronograma -- //
           
           For li_i = 1 To (li_cuotas - 1)
                           
                           // -- Calculo -- //
                           
                           lde_interes = lde_total_saldo * lde_valor
                           
                           // -- Datos -- //
                           
                           lde_capital_cuota           = lde_cuota / ( 1 + lde_valor_igv )
                           lde_igv_cuota                  = lde_cuota - lde_capital_cuota
                           lde_amortizacion            = ( lde_cuota - lde_igv_cuota ) - lde_interes
                           lda_vencimiento             = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_i - 1)
                           
                           // -- Saldos -- //
                           
                           lde_total_saldo               = lde_total_saldo - lde_amortizacion
           
                           // -- Seteo -- //
                           
                           tab_1.tp_6.dw_det_cuotas.InsertRow(0)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", 'ARM')
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total",  Round(lde_cuota, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo",  Round(lde_cuota, 2))
                           
           Next
           
           // -- Cuota Final -- //
           
           lde_sumcapital                = 0.00
           lde_sumtotal    = 0.00
           
           For li_i = 1 to (li_cuotas - 1)
                           lde_sumcapital = lde_sumcapital + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_principal")
                           lde_sumtotal = lde_sumtotal + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_total")
           Next
           
           lde_interes = (Round( lde_saldo / ( 1 + lde_valor_igv ), 2) - lde_sumcapital ) * lde_valor
           
           If lde_valor <= 0 then
                           lde_amortizacion = (Round (lde_total, 2) - lde_sumtotal) / ( 1 + lde_valor_igv )
           Else        
                           lde_amortizacion = Round( lde_saldo / ( 1 + lde_valor_igv ), 2) - lde_sumcapital
           End If 
           
           lda_vencimiento = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_cuotas - 1)
           
           // -- Datos -- //
           
           lde_igv_cuota   = ( lde_amortizacion + lde_interes ) * lde_valor_igv
           lde_cuota                           = ( lde_amortizacion + lde_interes ) + lde_igv_cuota
           
           // -- Redondeo -- //
           
           Choose Case is_tipo_redondeo
                                           
                           Case 'ARRIBA'
                                           lde_cuota = wf_redondeo_up(lde_cuota)         
                                           
                           Case 'CERO'
                                           lde_cuota = Round(lde_cuota, 0)
           
           End Choose
           
           // -- Regenera -- //
           
           lde_capital_cuota           = lde_cuota / ( 1 + lde_valor_igv )
           lde_igv_cuota                  = lde_cuota - lde_capital_cuota
           
           If lde_valor > 0 Then
                           lde_interes = lde_capital_cuota - lde_amortizacion
           Else
                           lde_amortizacion = lde_capital_cuota
           End If
           
           // -- Inserta -- //
           
           tab_1.tp_6.dw_det_cuotas.InsertRow(0)  
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", "ARM")
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total",  Round(lde_cuota, 2))
           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo",  Round(lde_cuota, 2))
           
    case '2': // -- JDE -- //
           
           // -- Limpia Cronograma -- //
           
           For li_i = tab_1.tp_6.dw_det_cuotas.Rowcount() to 1 Step -1
                           tab_1.tp_6.dw_det_cuotas.DeleteRow(li_i)
           Next
           
           lde_valor = lde_valor / 100
           lde_valor_cuota_x_mes = lde_saldo / li_cuotas
           lde_valor_cuota_interes_x_mes = (( lde_saldo * lde_valor ) +  ( lde_saldo / li_cuotas ))
           
           // -- Redondeo -- //
           
           Choose Case is_tipo_redondeo
                                           
                           Case 'ARRIBA'
                                           lde_valor_cuota_interes_x_mes = wf_redondeo_up(lde_valor_cuota_interes_x_mes)    
                                           
                           Case 'CERO'
                                           lde_valor_cuota_interes_x_mes = Round(lde_valor_cuota_interes_x_mes, 0)
           
           End Choose

           // -- Seteo de cuotas -- //
           
           For li_i = 1 To li_cuotas
                           
                           // -- Calculo -- //
                           
                           lde_interes                                       = lde_valor_cuota_interes_x_mes - lde_valor_cuota_x_mes
                           
                           // -- Datos -- //
                           
                           lde_capital_cuota           = lde_valor_cuota_interes_x_mes / ( 1 + lde_valor_igv )
                           lde_igv_cuota                  = lde_valor_cuota_interes_x_mes - lde_capital_cuota
                           lde_amortizacion            = ( lde_valor_cuota_interes_x_mes - lde_igv_cuota ) - lde_interes
                           lda_vencimiento             = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_i - 1)
           
                           // -- Seteo -- //
                           
                           tab_1.tp_6.dw_det_cuotas.InsertRow(0)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", 'ARM')
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total",  Round(lde_valor_cuota_interes_x_mes, 2))
                           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo",  Round(lde_valor_cuota_interes_x_mes, 2))
                           
           Next*/
                               
  }

// -- Si hay saldo de FOMA setea la fecha de primer vencimiento -- //

  if(lde_saldo_foma){
                  
     //lda_vencimiento = inv_datetime.of_RelativeMonth (lda_vencimiento, 1)
      aux_dia = ldt_fch_ven.getDate();
      aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
      var aux_mes = ldt_fch_ven.getMonth();
      aux_anio = ldt_fch_ven.getFullYear();
      if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = ldt_fch_ven.getFullYear()-1;
      }               
      lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
     //lde_saldo_foma = tab_1.tp_6.dw_foma.SetItem(1, "fch_primera_cuota", lda_vencimiento)

     $("#m_datepicker_2_validate").datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", lda_vencimiento);
                  
  }

  calcular();

}

//----------------------------------------------------------------------------------------------//
//--------------------------------------FUNCIÓN FOMA--------------------------------------------//
//----------------------------------------------------------------------------------------------//

function generaFOMA(){

  var lde_sumtotal = 0;
  var is_tipo_redondeo = 'CERO';

  //ls_cuota = dw_foma.GetItemString(1, "cod_cuota")
  var ls_cuota = document.getElementById("cuota_FOMA").value;
  //lde_saldo = dw_foma.GetItemDecimal(1, "imp_saldo_foma")
  var lde_saldo = document.getElementById("imp_saldo_foma").value;
  lde_saldo = pasaAnumero(lde_saldo);
  //ldt_fch_ven = dw_foma.GetItemDatetime(1, "fch_primera_cuota")
  var ldt_fch_ven = $('#m_datepicker_2_validate').datepicker("getDate");
  //lde_saldo_ctt = dw_det_interes.GetItemDecimal(1, "imp_saldo")
  var lde_saldo_ctt = document.getElementById("saldoFinanciar").value;
  lde_saldo_ctt = pasaAnumero(lde_saldo_ctt);

  // -- Inicializa -- //

  //If IsNull(lde_saldo) Then lde_saldo = 0
  if(lde_saldo == null || lde_saldo == ''){
    lde_saldo = 0;
  }
  //If IsNull(lde_saldo_ctt) Then lde_saldo_ctt = 0
  if(lde_saldo_ctt == null || lde_saldo_ctt == ''){
    lde_saldo_ctt = 0;
  }

  var li_existe = 0;

  // -- Valida -- //

  //If f_sys_valida_ingreso_datos(String(lde_saldo_ctt), "DEC") Then
  if(lde_saldo_ctt != 0){  

    var li_existe =  $(".ARM").length;
     //ls_tipo_cuota = dw_det_cuotas.GetItemString(li_i, "cod_tipo_cuota")
     // if( ls_tipo_cuota = 'ARM'){
     //   li_existe++;
     //  }
    
    //If li_existe <= 0 Then
    if(li_existe <= 0){
       //f_sys_mensaje_usuario(Title, "MSGLIB", 'ANTES DE GENERAR LAS CUOTAS DEL FOMA DEBE GENERAR EL CRONOGRAMA DE PAGOS DEL SERVICIO, POR FAVOR SELECCIONE LA OPCIÓN "GENERAR CRONOGRAMA DE PAGOS".', "PRV")
       swal({
          title: "Error",
          text: "Antes de generar las cuotas del FOMA debe generar el cronograma de pagos del servicio, por favor seleccione la opción 'GENERAR CRONOGRAMA DE PAGOS'.",
          type: "error",
          confirmButtonText: "Aceptar",
          onBeforeOpen:document.getElementById("botonCrono").focus()
        });
       return;
    }
                  
  }

  if (ls_cuota == null || ls_cuota == '' || ls_cuota == 'Seleccione...'){
    swal({
          title: "Error",
          text: "Debe seleccionar el numero de cuotas.",
          type: "error",
          confirmButtonText: "Aceptar",
          onBeforeOpen:document.getElementById("cuota_FOMA").focus()
        });
    return;
    // f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE SELECCIONAR EL NÚMERO DE CUOTAS.", "PRV")
    // f_sys_dw_ubica_cursor(dw_foma, "cod_cuota", "FREE", 0)
    // Return
  }

  if (ldt_fch_ven == null || ldt_fch_ven == ''){
      swal({
          title: "Error",
          text: "Debe ingresar la fecha de vencimiento de la primera cuota.",
          type: "error",
          confirmButtonText: "Aceptar",
          onBeforeOpen:document.getElementById("m_datepicker_2_validate").focus()
        });
      return;
      // f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR LA FECHA DE VENCIMIENTO DE LA PRIMERA CUOTA.", "PRV")
      // f_sys_dw_ubica_cursor(dw_foma, "fch_primera_cuota", "FREE", 0)
      // Return
  }

  // // -- Cuotas -- //

  var li_cuotas = ls_cuota;

  // // -- Total deuda -- //

  var lde_total = lde_saldo;

  // // -- Calculo de Cuota -- //

  var lde_cuota = lde_saldo / li_cuotas;

  // // -- Redondeo -- //
                                 
  // Choose Case is_tipo_redondeo
  switch(is_tipo_redondeo){
                                 
    case 'ARRIBA':
      //lde_cuota = wf_redondeo_up(lde_cuota)
      lde_cuota = Math.ceil(lde_cuota);
                   
    case 'CERO':
      //lde_cuota = Round(lde_cuota, 0)
      lde_cuota = Math.round(lde_cuota);
  }

  // // -- Guarda la Variable -- //

  var lde_total_saldo = lde_saldo;

  // // -------- Limpia Cronograma ------- //

  // For li_i = dw_det_cuotas.Rowcount() To 1 Step -1
  //                 ls_tipo_cuota = dw_det_cuotas.GetItemString(li_i, "cod_tipo_cuota")
  //                 If ls_tipo_cuota = 'FMA' Then dw_det_cuotas.DeleteRow(li_i)
  // Next
  var container1 = document.querySelector('#bodyCronograma');

  container1.querySelectorAll('.FMA').forEach(function (chek) {         
    $(chek).parents("tr").remove();
  });

  // ------ Total cuotas ------- //

  // li_total = dw_det_cuotas.Rowcount()
  var li_total = $("#bodyCronograma tr").length;

  // ------- Armar Cronograma ------- //

  for(li_i = 1; li_i <= li_cuotas - 1; li_i++){ 
                  
  // ------- Valores ------- //
                  
    var lde_amortizacion = lde_cuota;
    lde_total_saldo = lde_total_saldo - lde_amortizacion
    //lda_vencimiento = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_i - 1)
    aux_dia = ldt_fch_ven.getDate();
    aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
    var aux_mes = ldt_fch_ven.getMonth();
    aux_anio = ldt_fch_ven.getFullYear();
    if(aux_mes == '0'){
      aux_mes = '12';
      aux_anio = ldt_fch_ven.getFullYear()-1;
    }               
    lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
    var aux_lde_amortizacion = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    
    // // -- Seteo -- //
    
    // dw_det_cuotas.InsertRow(0)
    // dw_det_cuotas.SetItem(li_i + li_total, "num_cuota", li_i + li_total)
    // dw_det_cuotas.SetItem(li_i + li_total, "cod_estadocuota", "REG")
    // dw_det_cuotas.SetItem(li_i + li_total, "cod_tipo_cuota", 'FMA')
    // dw_det_cuotas.SetItem(li_i + li_total, "fch_vencimiento", lda_vencimiento)
    // dw_det_cuotas.SetItem(li_i + li_total, "imp_principal", Round(lde_amortizacion, 2))
    // dw_det_cuotas.SetItem(li_i + li_total, "imp_total",  Round(lde_amortizacion, 2))
    // dw_det_cuotas.SetItem(li_i + li_total, "imp_saldo",  Round(lde_amortizacion, 2))

    var fila = '<tr style="color:blue;"><input type="hidden" class="det_cuotas" value="'+(li_i+li_total)+'"><td style="width:7.2rem;text-align:center;">'+(li_i+li_total)+'</td><td style="width:9rem;text-align:center;">REG</td><td style="width:6rem;text-align:center;" class="FMA">FMA</td><td style="width:9.3rem;text-align:center;">'+lda_vencimiento+'</td><td style="width:6rem;text-align:right;" class = "imp_principal_'+(li_i+li_total)+'">'+aux_lde_amortizacion+'</td><td style="width:6rem;text-align:right;">0.00</td><td style="width:6rem;text-align:right;">0.00</td><td style="width:6rem;text-align:right;" class = "imp_total_'+(li_i+li_total)+'" >'+aux_lde_amortizacion+'</td><td style="width:5.2rem;text-align:right;">'+aux_lde_amortizacion+'</td></tr>';
    document.getElementById("bodyCronograma").insertAdjacentHTML("beforeEnd" ,fila);

     lde_sumtotal += lde_amortizacion;
                  
  }

  // // -- Cuota Final -- //

  // for(li_i = li_total + 1; li_i = (li_total + li_cuotas - 1); li_i++){
  //   lde_sumtotal = lde_sumtotal + dw_det_cuotas.GetItemDecimal(li_i, 'imp_total')
  // }

  lde_amortizacion = lde_total - lde_sumtotal; 

  // // -- Redondeo -- //
  
   switch(is_tipo_redondeo){
                                 
    case 'ARRIBA':

      lde_cuota = Math.ceil(lde_amortizacion);
                   
    case 'CERO':

      lde_cuota = Math.round(lde_amortizacion);
  }                               

  // lda_vencimiento = inv_datetime.of_RelativeMonth (Date(ldt_fch_ven), li_cuotas - 1)
  aux_dia = ldt_fch_ven.getDate();
  aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
  var aux_mes = ldt_fch_ven.getMonth();
  aux_anio = ldt_fch_ven.getFullYear();
  if(aux_mes == '0'){
    aux_mes = '12';
    aux_anio = ldt_fch_ven.getFullYear()-1;
  }               
  lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
  var aux_lde_amortizacion = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

  // // -- Insertar -- //

  // dw_det_cuotas.InsertRow(0)
  // dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
  // dw_det_cuotas.SetItem(li_i, "cod_tipo_cuota", 'FMA')
  // dw_det_cuotas.SetItem(li_i, "cod_estadocuota", "REG")
  // dw_det_cuotas.SetItem(li_i, "fch_vencimiento", lda_vencimiento)
  // dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_amortizacion, 2))
  // dw_det_cuotas.SetItem(li_i, "imp_total", Round(lde_amortizacion, 2))
  // dw_det_cuotas.SetItem(li_i, "imp_saldo", Round(lde_amortizacion, 2))

  var fila = '<tr style="color:blue;"><input type="hidden" id="is_flg_cronograma_foma" value="SI"><input type="hidden" class="det_cuotas" value="'+(li_i+li_total)+'"><td style="width:7.2rem;text-align:center;">'+(li_i+li_total)+'</td><td style="width:9rem;text-align:center;">REG</td><td style="width:6rem;text-align:center;" class="FMA">FMA</td><td style="width:9.3rem;text-align:center;">'+lda_vencimiento+'</td><td style="width:6rem;text-align:right;" class="imp_principal_'+(li_i+li_total)+'">'+aux_lde_amortizacion+'</td><td style="width:6rem;text-align:right;">0.00</td><td style="width:6rem;text-align:right;">0.00</td><td style="width:6rem;text-align:right;" class = "imp_total_'+(li_i+li_total)+'" >'+aux_lde_amortizacion+'</td><td style="width:5.2rem;text-align:right;">'+aux_lde_amortizacion+'</td></tr>';
  document.getElementById("bodyCronograma").insertAdjacentHTML("beforeEnd" ,fila);  


  calcular();
}

//----------------------------------------------------------------------------------------------//
//-----------------------------FUNCIÓN CUOTAS DEFINIDAS-----------------------------------------//
//----------------------------------------------------------------------------------------------//

function CuoDefinidas() {
 
var gde_igv = 0.18;
var lde_valor_igv = 0;
var is_tipo_calculo_interes = '3';
var is_tipo_redondeo = 'ARRIBA';

// li_ini = Integer(tab_1.tp_6.em_ini.Text)
var li_ini = document.getElementById("cuoIni").value;
// li_fin = Integer(tab_1.tp_6.em_fin.Text)
var li_fin = document.getElementById("cuoFin").value;
// lde_valor = Dec(tab_1.tp_6.em_cuota.Text)
var lde_valor = document.getElementById("valCuo").value;
// lde_valor_aux = Int(lde_valor)
var lde_valor_aux = parseInt(lde_valor);

// // -- Afecto a I.G.V. -- //

  var ls_cod_servicio = [];
  var row = $(".codServicio").length;
  var codServicio = $(".codServicio")
  for (var i = 0; i < row; i++) {
      //    //ls_cod_servicio = tab_1.tp_1.dw_detalle.GetItemString(li_i, "cod_servicio")
      ls_cod_servicio = $(codServicio[i]).val(); 

      //    // -- Flag -- //
         
      //    SELECT  vtama_tipo_servicio.flg_afecto_igv
      //    INTO                     :ls_flg_afecto_igv
      //    FROM                   vtama_servicio
      //    INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio
      //    WHERE vtama_servicio.cod_servicio = :ls_cod_servicio
      //    USING SQLCA;
      var ls_flg_afecto_igv = document.getElementById("flg_afecto_igv_"+ls_cod_servicio).value;
         
     if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
        ls_flg_afecto_igv = 'NO';
      }
     
     // -- Si? -- //
     
     if(ls_flg_afecto_igv == 'SI'){
      //Then EXIT
      break;
     }
                 
  }
                
if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
  ls_flg_afecto_igv = 'NO'
}

// // -- Datos -- //

// li_total = tab_1.tp_6.dw_det_cuotas.Rowcount()
var li_total = $("#bodyCronograma tr").length;
// ls_interes = tab_1.tp_6.dw_det_interes.GetItemString(1, "cod_interes")
var ls_interes = document.getElementById("interes").value;
if(ls_interes == 'Seleccione...'){
  ls_interes = 0;
}
else{
  ls_interes = pasaAnumero(ls_interes);
}
// lde_saldo = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
var lde_saldo = document.getElementById("saldoFinanciar").value;
lde_saldo = pasaAnumero(lde_saldo);
// ldt_emision = dw_cab.GetItemDatetime(1, "fch_registro")
var ldt_emision = new Date();
// ldt_emision = Datetime(Date(ldt_emision))

if( li_ini == null || li_ini == ''){
  swal({
      title: "Error",
      text: "Debe ingresar la cuota inicial.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("cuoIni").focus()
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR LA CUOTA INICIAL.", "PRV")
  // tab_1.tp_6.em_ini.SetFocus()
  // tab_1.tp_6.em_ini.SelectText(1, Len(tab_1.tp_6.em_ini.Text))
  // Return
}

if( li_fin == null || li_fin == ''){
  swal({
      title: "Error",
      text: "Debe ingresar la cuota final.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("cuoFin").focus()
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR LA CUOTA FINAL.", "PRV")
  // tab_1.tp_6.em_fin.SetFocus()
  // Return
}

if( lde_valor == null|| lde_valor == ''){
  swal({
      title: "Error",
      text: "Debe ingresar el valor de la cuota.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("valCuo").focus()
    });
    return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "DEBE INGRESAR EL VALOR DE LA CUOTA.", "PRV")
  // tab_1.tp_6.em_cuota.SetFocus()
  // Return
}

if(( lde_valor - lde_valor_aux ) > 0){
  swal({
      title: "Error",
      text: "El valor de la cuota debe ser entero.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("valCuo").focus()
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "EL VALOR DE LA CUOTA DEBE SER ENTERA.", "PRV")
  // tab_1.tp_6.em_cuota.SetFocus()
  // Return
}

if( li_ini > li_fin){
  swal({
      title: "Error",
      text: "La cuota inicial no puede ser mayor a la cuota final.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("cuoIni").focus()
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "LA CUOTA INICIAL NO PUEDE SER MAYOR A LA CUOTA FINAL.", "PRV")
  // tab_1.tp_6.em_ini.SetFocus()
  // Return
}

if ( li_total < li_fin){
  swal({
      title: "Error",
      text: "La cuota final no puede ser mayor al numero de cuotas generadas.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("cuoFin").focus()
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "LA CUOTA FINAL NO PUEDE SER MAYOR AL NÚMERO DE CUOTAS A GENERADAS.", "PRV")
  // tab_1.tp_6.em_fin.SetFocus()
  // Return
}

if(( lde_valor * li_fin ) > lde_saldo){
  swal({
      title: "Error",
      text: "El total a generar no puede ser mayor que el saldo a financiar.",
      type: "error",
      confirmButtonText: "Aceptar"
  });
  return;
  // f_sys_mensaje_usuario(Title, "MSGLIB", "EL TOTAL A GENERAR NO PUEDE SER MAYOR QUE EL SALDO A FINANCIAR.", "PRV")
  // Return
}

 // -- Igv -- //

if (ldt_emision == null || ldt_emision == ''){
    lde_valor_igv = gde_igv;
}
else{
    lde_valor_igv = ldt_emision;
}

    // -- Afecto I.G.V. -- //

if(ls_flg_afecto_igv = 'NO'){
  lde_valor_igv = 0;
}

    // -- Interes -- //

 var lde_interes = 0;

// SELECT  vtama_interes.num_valor
// INTO                     :lde_interes
// FROM                   vtama_interes
// WHERE vtama_interes.cod_interes = :ls_interes
// USING SQLCA;

lde_interes = document.getElementById("interes").value;
if(lde_interes == null || lde_interes == '' || lde_interes == 'Seleccione...'){
  lde_interes = 0;
}
else{
  lde_interes = pasaAnumero(lde_interes);
}

  // -- Tipo de calculo de interes según configuración -- //

switch(is_tipo_calculo_interes){
                               
     case '1':
     case '3':

        lde_interes = ( lde_interes / 100 ) / 12;
       
        // -- Inicializa -- //
       
        var lde_suma_capital = 0;
       
        // -- Genera -- //

         for (li_i = 1; li_i <= (li_ini - 1); li_i++){

        //    //lde_cuota = tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_principal")
              filas=document.querySelectorAll("#bodyCronograma tr");
              result = filas[li_i-1].querySelectorAll("td");
              lde_cuota = result[4].textContent;
              lde_cuota = pasaAnumero(lde_cuota);
              lde_suma_capital = lde_suma_capital + lde_cuota;
              
         }
       
          //lde_x_financiar = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
          var lde_x_financiar = document.getElementById("saldoFinanciar").value;
          lde_x_financiar = pasaAnumero(lde_x_financiar);
        //lde_x_financiar2 = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
          var lde_x_financiar2 = document.getElementById("saldoFinanciar").value;
          lde_x_financiar2 = pasaAnumero(lde_x_financiar2);
       
        //li_final = tab_1.tp_6.dw_det_cuotas.Rowcount()
          var li_final = $("#bodyCronograma tr").length;
       
        //lde_x_financiar = Round((lde_x_financiar / (lde_valor_igv + 1)), 2)
          lde_x_financiar = (lde_x_financiar / (lde_valor_igv + 1));
        //lde_saldo = lde_x_financiar - lde_suma_capital
          lde_saldo = lde_x_financiar - lde_suma_capital;
                 
          // -- Manuales -- //
       
        for(li_i = li_ini; li_i <= li_fin; li_i++){
         
            var lde_total_cuota = lde_valor;
         
            // -- Datos -- //
         
            var lde_interes_cuota = lde_saldo * lde_interes;
            var lde_capital_actual = (lde_total_cuota / ( 1 + lde_valor_igv )) - lde_interes_cuota;
            var lde_igv_cuota = (lde_capital_actual + lde_interes_cuota) * lde_valor_igv;
    
         
            // -- Saldo -- //
         
            lde_saldo = lde_saldo - lde_capital_actual;
         
//          // -- Seteo -- //

            var filas=document.querySelectorAll("#bodyCronograma tr");
            result = filas[li_i-1].querySelectorAll("td");
         
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "num_cuota", li_i)
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_principal", Round(lde_capital_actual;, 2))
            aux1 = Number(lde_capital_actual).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[4].innerHTML = aux1;
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_interes", Round(lde_interes_cuota, 2))
            if(lde_interes_cuota == 0){
              aux2 = '0.00'
            }else{
              aux2 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            }
            result[5].innerHTML = aux2;
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
            aux3 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[6].innerHTML = aux3;
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_total", lde_total_cuota)
            aux4 = Number(lde_total_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[7].innerHTML = aux4;
//          tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_saldo", lde_total_cuota)
            result[8].innerHTML = aux4;
       
        }

       if( li_fin < li_final){
           li_meses =  li_final - li_fin;
       }
       else{
           li_meses = 1;
       }
       
          // -- Con IGV -- //
       
        lde_saldo = lde_saldo + ( lde_saldo * lde_valor_igv );
       
          // -- El interes es mensual -- //
       
       if( lde_interes <= 0){
           lde_cuota = lde_saldo / li_meses;
       }
       else{        
           lde_cuota = lde_saldo * (( lde_interes * ( 1 + lde_interes ) ** li_meses )  /  ((1 + lde_interes ) ** li_meses - 1));
       }    
       
          // -- Redondeo -- //
       
       switch(is_tipo_redondeo){
                                 
          case 'ARRIBA':
            //lde_cuota = wf_redondeo_up(lde_cuota)
            lde_cuota = Math.ceil(lde_cuota);
                         
          case 'CERO':
            //lde_cuota = Round(lde_cuota, 0)
            lde_cuota = Math.round(lde_cuota);
        }
       
          // -- Sin Igv -- //
       
          lde_saldo = lde_saldo / ( 1 + lde_valor_igv );
       
          // -- Cronograma -- //
                                 
          for(li_i = (li_fin + 1); li_i <= li_final -1; li_++){
                       
            // -- Datos -- //
         
             lde_interes_cuota = lde_saldo * lde_interes;
             var lde_capital = lde_cuota / (1 + lde_valor_igv );
             lde_igv_cuota = lde_cuota - lde_capital;
             var lde_amortizacion = ( lde_cuota - lde_igv_cuota ) - lde_interes_cuota;
             // console.log('amortizacion '+lde_amortizacion+' inters cuo '+lde_interes_cuota);
             // -- Saldo -- //
         
             lde_saldo = lde_saldo - lde_amortizacion;
         
             // -- Seteo -- //

             var filas=document.querySelectorAll("#bodyCronograma tr");
             result = filas[li_i-1].querySelectorAll("td");
         
//           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
//           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", lde_amortizacion)
             aux1 = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
             result[4].innerHTML = aux1;
//           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", lde_interes_cuota)
             if(lde_interes_cuota == 0){
               aux2 = '0.00'
             }else{
               aux2 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
             }
             result[5].innerHTML = aux2;
//           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2 ))
             aux3 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
             result[6].innerHTML = aux3;
//          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total", Round(lde_cuota, 2 ))
             aux4 = Number(lde_total_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
             result[7].innerHTML = aux4;
//           tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo", Round (lde_cuota, 2 ))
             result[8].innerHTML = aux4;
                       
          }
                                 
          // -- Final -- //
       
          if( li_fin < li_final){
                       
            lde_suma_capital = 0;
            var lde_suma_total = 0;
         
             for(li_i = 1; li_i <= (li_final - 1); li_i++){

                filas=document.querySelectorAll("#bodyCronograma tr");
                result = filas[li_i-1].querySelectorAll("td");

           //  lde_suma_capital = lde_suma_capital + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i,'imp_principal')
               aux = pasaAnumero(result[4].innerHTML);
               var lde_suma_capital = lde_suma_capital + aux;
           //   lde_suma_total = lde_suma_total + tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, 'imp_total')
               aux2 = pasaAnumero(result[7].innerHTML);
               lde_suma_total = lde_suma_total + aux2;

             }
             
                // -- Interes -- //
            lde_interes_cuota = ( lde_x_financiar2 / ( lde_valor_igv + 1 ) - lde_suma_capital ) * lde_interes;

             if( lde_interes <= 0){
                lde_saldo = (lde_x_financiar2 - lde_suma_total) / (lde_valor_igv + 1);
             }
             else{        
                lde_saldo = lde_x_financiar - lde_suma_capital;
             }

                // -- Datos -- //
             
                lde_igv_cuota = ( lde_saldo + lde_interes_cuota ) * lde_valor_igv;
                lde_cuota = lde_saldo + lde_interes_cuota + lde_igv_cuota;
                           
                // -- Redondeo -- //

             switch(is_tipo_redondeo){
                                     
                case 'ARRIBA':
                  //lde_cuota = wf_redondeo_up(lde_cuota)
                  lde_cuota = Math.ceil(lde_cuota);
                               
                case 'CERO':
                  //lde_cuota = Round(lde_cuota, 0)
                  lde_cuota = Math.round(lde_cuota);
              }
                           
                // -- Regenera -- //

                lde_capital = lde_cuota / ( 1 + lde_valor_igv );
                lde_igv_cuota = lde_cuota - lde_capital;
             
               if(lde_interes > 0){
                  lde_interes_cuota = lde_capital - lde_saldo;
               }
               else{
                  lde_saldo = lde_capital;
               }

             
                // -- Seteo -- //

                filas=document.querySelectorAll("#bodyCronograma tr");
                result = filas[li_final-1].querySelectorAll("td");
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_final)
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", Round(lde_saldo, 2))
                aux2 = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                result[4].innerHTML = aux2;
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", Round(lde_interes_cuota, 2))
                if(lde_interes_cuota == 0){
                  aux3 = '0.00'
                }else{
                  aux3 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                }
                result[5].innerHTML = aux3;
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2 ))
                if(lde_igv_cuota == 0){
                  aux4 = '0.00'
                }else{
                  aux4 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                }
                result[6].innerHTML = aux4;
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total", Round(lde_cuota, 2 ))
                aux5 = Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                result[7].innerHTML = aux5;
    //          tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo", Round(lde_cuota, 2 ))
                result[8].innerHTML = aux5;

          }
                               
//   Case '2'
                 
//                  lde_interes = Round(lde_interes / 100, 4)
                 
//                  // -- Inicializa -- //
                 
//                  lde_suma_capital = 0.00
                               
//      // -- Genera -- //
     
//      For li_i = 1 To li_ini - 1
//                      lde_cuota = tab_1.tp_6.dw_det_cuotas.GetItemDecimal(li_i, "imp_principal")
//                      lde_suma_capital = lde_suma_capital + lde_cuota
//      Next
     
//      lde_x_financiar                = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
//      lde_x_financiar2             = tab_1.tp_6.dw_det_interes.GetItemDecimal(1, "imp_saldo")
     
//      li_final = tab_1.tp_6.dw_det_cuotas.Rowcount()
     
//      lde_x_financiar = Round((lde_x_financiar / (lde_valor_igv + 1)), 2)
//      lde_saldo = lde_x_financiar - lde_suma_capital
                               
//      // -- Manuales -- //
     
//      For li_i = li_ini To li_fin
                     
//        lde_total_cuota = lde_valor
       
//        // -- Datos -- //
       
//        lde_interes_cuota = Round(lde_saldo * lde_interes, 4)
//        lde_capital_actual = (lde_total_cuota / ( 1 + lde_valor_igv )) - lde_interes_cuota
//        lde_igv_cuota = (lde_capital_actual + lde_interes_cuota) * lde_valor_igv
       
//        // -- Saldo -- //
       
//        lde_saldo = lde_saldo - lde_capital_actual
       
//        // -- Seteo -- //
       
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "num_cuota", li_i)
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_principal", Round(lde_capital_actual, 2))
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_interes", Round(lde_interes_cuota, 2))
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_igv", Round(lde_igv_cuota, 2))
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_total", lde_total_cuota)
//        tab_1.tp_6.dw_det_cuotas.setItem(li_i, "imp_saldo", lde_total_cuota)

//      Next
                               
//      If li_fin < li_final Then
//                      li_meses =  li_final - li_fin
//      Else
//                      li_meses = 1
//      End If
     
//      // -- Con IGV -- //
     
//      lde_saldo = lde_saldo + ( lde_saldo * lde_valor_igv )
     
//      // -- El interes mensual -- //
     
//      lde_cuota = Round(lde_saldo / li_meses, 4)
     
//      // -- Redondeo -- //
     
//      Choose Case is_tipo_redondeo
//        Case 'ARRIBA'
//          lde_cuota = wf_redondeo_up(lde_cuota)
//        Case 'CERO'
//          lde_cuota = Round(lde_cuota, 0)
//      End Choose
     
//      // -- Sin Igv -- //
     
//      lde_saldo = lde_saldo / ( 1 + lde_valor_igv )
     
//       // -- Cronograma -- //
                               
//      For li_i = (li_fin + 1) To li_final
                     
//        // -- Datos -- //
       
//        lde_interes_cuota = lde_saldo * lde_interes
//        lde_capital = lde_cuota / (1 + lde_valor_igv )
//        lde_igv_cuota = lde_cuota - lde_capital
//        lde_amortizacion = ( lde_cuota - lde_igv_cuota ) - lde_interes_cuota
       
//        // -- Saldo -- //
       
//        lde_saldo = lde_saldo - lde_amortizacion
       
//        // -- Seteo -- //
       
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "num_cuota", li_i)
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_principal", lde_amortizacion)
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_interes", lde_interes_cuota)
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_igv", Round(lde_igv_cuota, 2 ))
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_total", Round(lde_cuota, 2 ))
//        tab_1.tp_6.dw_det_cuotas.SetItem(li_i, "imp_saldo", Round (lde_cuota, 2 ))
       
//      Next
                               
  }

  calcular();

}


function calcular() {
    // obtenemos todas las filas del tbody
    var filas=document.querySelectorAll("#bodyCronograma tr");
 
    var totalSub=0;
    var totalInt=0;
    var totalIgv=0;
    var totalTot=0;
    var totalSal=0;
 
    // recorremos cada una de las filas
    filas.forEach(function(e) {
 
        // obtenemos las columnas de cada fila
        var columnas=e.querySelectorAll("td");
 
        // obtenemos los valores de la cantidad y importe
        var subtotal=pasaAnumero(columnas[4].innerHTML);
        var interes=pasaAnumero(columnas[5].innerHTML);
        var igv=pasaAnumero(columnas[6].innerHTML);
        var total=pasaAnumero(columnas[7].innerHTML);
        var saldo=pasaAnumero(columnas[8].innerHTML);
 
        // mostramos el total por fila
        
        totalSub+=subtotal;
        totalInt+=interes;
        totalIgv+=igv;
        totalTot+=total;
        totalSal+=saldo;
    });
 
    // mostramos la suma total
    var filas=document.querySelectorAll("#footCronograma tr td");
    totalSub = Number(totalSub).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    totalInt = Number(totalInt).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    totalIgv = Number(totalIgv).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    totalTot = Number(totalTot).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
    totalSal = Number(totalSal).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

    filas[4].textContent=totalSub;
    filas[5].textContent=totalInt;
    filas[6].textContent=totalIgv;
    filas[7].textContent=totalTot;
    filas[8].textContent=totalSal;
}