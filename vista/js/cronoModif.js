function cronogramaModifi(){
    var li_valida = 0;
    var lde_porc_total = 0;
    var ls_tipo_servicio = $("#cdServicioSeleccionado").val();
    var ls_localidad_det = $("#sedeContrto").val();
    var ls_tipo_ctt_det = $("#modC").val();
    var ls_tipo_programa_det = $("#tipoPrograma").val();
    var ls_contrato_det = $("#codContrato").val();
    var ls_num_servicio_det = $("#numServicioSeleccionado").val();
    var li_ref = $("#numRefinanciamiento").val();
    var flg_prevencion = $("#flg_prevencion").val();
    var gde_igv = 0.18;
    var is_flg_cronograma_cuoi = $("#flg_cronograma_cuoi").val(); 

    if(ls_num_servicio_det == null || ls_num_servicio_det == ''){
        swal({
            title: "",
            text: "Debe seleccionar el servicio",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
       return;
    }

    var lde_saldo_total = 0;
    var lde_total_pagado = 0;

    // -- Integral -- // 

    var ls_flg_ct_integral = $("#flg_ctt_integral").val();     
    if(ls_flg_ct_integral == '' || ls_flg_ct_integral == null){ ls_flg_ct_integral = 'NO';}

    // -- Porcentaje -- // 

    if( ls_flg_ct_integral == 'SI' ){
                
        // -- Total a financiar -- //

        $.ajax({
            type: 'POST',
            url: 'ajax/modifCtto.ajax.php',
            dataType: 'json',
            data: {'accion' : 'totalFinanciar', 'ls_tipo_ctt_det' : ls_tipo_ctt_det, 'ls_tipo_programa_det' : ls_tipo_programa_det, 'ls_contrato_det' : ls_contrato_det, 'li_ref' : li_ref},
            success : function(respuesta){
                lde_saldo_total = respuesta['lde_saldo_total'];
                if( lde_saldo_total == '' || lde_saldo_total == null){ lde_saldo_total = 0;}

                // -- Pagado -- //

                $.ajax({
                    type: 'POST',
                    url: 'ajax/modifCtto.ajax.php',
                    dataType: 'json',
                    data: {'accion' : 'totalPagado', 'ls_tipo_ctt_det' : ls_tipo_ctt_det, 'ls_tipo_programa_det' : ls_tipo_programa_det, 'ls_contrato_det' : ls_contrato_det, 'ls_num_servicio_det' : ls_num_servicio_det},
                    success : function(respuesta){
                        lde_total_pagado = respuesta['lde_total_pagado'];
                        if( lde_total_pagado == '' || lde_total_pagado == null){ lde_total_pagado = 0;}

                        // -- Saldo del contrato restando lo pagado -- //              

                        lde_saldo_total = pasaAnumero(lde_saldo_total) - pasaAnumero(lde_total_pagado);

                    }//success
                });//ajax totalPagado
            }//success totalFinanciar
        });//ajax totalFinanciar                

        // -- Distribucion -- //               

        $.ajax({
            type: 'POST',
            url: 'ajax/modifCtto.ajax.php',
            dataType: 'json',
            data: {'accion' : 'cr_servicio', 'ls_tipo_ctt_det' : ls_tipo_ctt_det, 'ls_tipo_programa_det' : ls_tipo_programa_det, 'ls_contrato_det' : ls_contrato_det, 'li_ref' : li_ref},
            success : function(respuesta){               
                $.each(respuesta,function(index,value){
                    
                    // FETCH   cr_servicio INTO :lde_saldo_det, :flg_afecto_igv, :cod_servicio;
                                  
                    if (value['flg_afecto_igv'] == 'SI'){

                       // -- Inicializa -- //                                  

                       var lde_total_pagado_x_servicio = 0;
                       var lde_saldo_x_servicio = 0;  
                       var lde_porc = 0;                

                       // -- Pagado por servicio -- // 

                        $.ajax({
                            type: 'POST',
                            url: 'ajax/modifCtto.ajax.php',
                            dataType: 'json',
                            data: {'accion' : 'pagoXservicio', 'ls_tipo_ctt_det' : ls_tipo_ctt_det, 'ls_tipo_programa_det' : ls_tipo_programa_det, 'ls_contrato_det' : ls_contrato_det, 'ls_num_servicio_det' : ls_num_servicio_det, 'cod_servicio' : value['cod_servicio']},
                            success : function(respuesta){                                                 
                                                    
                                if( respuesta['lde_total_pagado_x_servicio'] == '' || respuesta['lde_total_pagado_x_servicio'] == null){ respuesta['lde_total_pagado_x_servicio'] = 0;}
                                                          
                               // -- Saldo por servicio -- //
                                              
                               lde_saldo_x_servicio = pasaAnumero(value['lde_saldo_det']) - pasaAnumero(respuesta['lde_total_pagado_x_servicio']);
                               
                               lde_porc = lde_saldo_x_servicio / lde_saldo_total;
                               
                               if( lde_porc == '' || lde_porc == null){ lde_porc = 0;}

                               lde_porc_total = lde_porc_total + lde_porc; 
                           }//success
                        });//ajax pagado por servicio 
                    }//if afrcto igv
                });//each
            }//success
        });//ajax cr_servicio           

    }//if ctto_integral

    // -- IGV? -- //

    var ls_flg_afecto_igv = $("#flg_afecto_igv").val();
    if( ls_flg_afecto_igv == '' || ls_flg_afecto_igv == null){ ls_flg_afecto_igv = 'NO';}

    // -- Datos -- //
     
    var ls_cuota    = $("#codCuotaModif").val();   //tab_1.tp_4.dw_det_interes.GetItemString(1, "cod_cuota")
    var ls_interes  = $("#codInteresModif").val();   //tab_1.tp_4.dw_det_interes.GetItemString(1, "cod_interes")
    var ldt_fch_ven = $("#fchVenCronograma").datepicker("getDate");   //tab_1.tp_4.dw_det_interes.GetItemDatetime(1, "fch_vencimiento")
    var lde_saldo   = $("#saldoFinCronograma").val();   //tab_1.tp_4.dw_det_interes.GetItemDecimal(1, "imp_saldo")
    var lde_valor_cuota = $("#cuota").val(); //tab_1.tp_1.dw_datos.GetItemDecimal(1, "imp_valor_cuota")
    var ldt_emision = $("#fchEmision").datepicker("getDate"); //tab_1.tp_1.dw_datos.GetItemDatetime(1, "fch_emision")
    var fechaHoy = new Date();
    var aux_dia = fechaHoy.getDate();
    var aux_mes1 = fechaHoy.setMonth(fechaHoy.getMonth() + 1);
    var aux_mes = fechaHoy.getMonth();
    var aux_anio = fechaHoy.getFullYear();
    if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = fechaHoy.getFullYear()-1;
    }               
    var ldt_hoy = aux_dia+'/'+aux_mes+'/'+aux_anio;
    var ldt_hoy_consulta = aux_mes+'/'+aux_dia+'/'+aux_anio;
     
    // -- Ref -- //
     
    var cronograma = document.getElementById('bodyCronogramaModif');
    var cronogramaLenght = cronograma.rows.length;
    if( cronogramaLenght > 0 ){

        for( li_i = 0 ; li_i < cronogramaLenght ; li_i++ ){               
            var oCells = cronograma.rows.item(li_i).cells;
            ls_estado = oCells.item(1).innerHTML.trim();
            
            if( ls_estado != 'REGISTRADO'){
                li_valida = li_valida + 1;
            }
        }           

        if( li_valida > 0 ){
            swal({
                title: "",
                text: "No puede regenerar el cronograma, ya fue modificado.",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }              
    }

    // -- Valida -- //

    if (!ls_contrato_det) {
        swal({
            title: "",
            text: "Debe ingresar el contrato.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
       return;
    }

    if (ls_cuota == '' || ls_cuota == null){
        swal({
            title: "",
            text: "Debe ingresar el numero de cuotas.",
            type: "warning",
            confirmButtonText: "Aceptar",
            onBeforeOpen: document.getElementById("tipoDocBenef").focus()
        })
        return;
    }

    if (ldt_fch_ven == '' || ldt_fch_ven == null){
        swal({
            title: "",
            text: "Debe ingresar la fecha del primer vencimiento.",
            type: "warning",
            confirmButtonText: "Aceptar",
            onBeforeOpen: document.getElementById("fchVenCronograma").focus()
        })
        return;
    } 

    if( flg_prevencion == 'NO' ){
        if (lde_saldo == null || lde_saldo == 0 || lde_saldo == '' ) {
            swal({
                title: "",
                text: "El contrato no tiene saldo a financiar.",
                type: "warning",
                confirmButtonText: "Aceptar"
            })
            return;
        }
    }else{        
        if (lde_valor_cuota == '' || lde_valor_cuota == null) {
            swal({
                title: "",
                text: "Debe ingresar el valor de cuota del contrato de afiliación.",
                type: "warning",
                confirmButtonText: "Aceptar",
                onBeforeOpen: document.getElementById("cuota").focus()
            })
            return;
        }
    }

    if ( ldt_emision > ldt_fch_ven && (ldt_emision != '' || ldt_emision != null) ){
        swal({
            title: "",
            text: "La fecha del primer vencimiento debe ser mayor a la fecha de emisión del contrato.",
            type: "warning",
            confirmButtonText: "Aceptar",
            onBeforeOpen: document.getElementById("fchVenCronograma").focus()
        })
        return;
    } 

    if( ldt_hoy > ldt_fch_ven ){
        swal({
            title: "",
            text: "La fecha del primer vencimiento debe ser mayor a la fecha actual.",
            type: "warning",
            confirmButtonText: "Aceptar",
            onBeforeOpen: document.getElementById("fchVenCronograma").focus()
        })
        return;
    }

    // -- Obtiene Igv -- //

    // if( ldt_emision == '' || ldt_emision == null){
    //     var lde_valor_igv = gde_igv;
    // }else{
    //     lde_valor_igv = ldt_emision;
    // }

    // -- I.G.V. -- //

    // lde_valor_igv_det = lde_valor_igv
    var lde_valor_igv = gde_igv;
    var lde_valor_igv_det = 0.18;

    if( ls_flg_afecto_igv == 'NO'){ lde_valor_igv = 0.00;}

    // -- Obtiene Valores -- //

    li_cuotas = $("#numCuoCronograma").val();

    // -- Interes -- //

    lde_valor = $("#interesCronograma").val();
    if( lde_valor == '' || lde_valor == null ){
        lde_valor = 0.00;
    }else{
        lde_valor = pasaAnumero(lde_valor);
    }

    if( lde_valor == '' || lde_valor == null ){ lde_valor = 0.00;}

    // -- Forma de calculo según configuración -- //
    
    var is_tipo_calculo_interes = 3;
    //Choose Case is_tipo_calculo_interes
    switch(is_tipo_calculo_interes){                                  

        case 3:   
           
            // -- Integrales -- //                            

            if( ls_flg_ct_integral == 'SI' ){                         

                // -- Valor de Interes -- //

                lde_valor = ( 1 + (lde_valor / 100)) ** ( 1 / 12 ) - 1

                if( lde_valor == '' || lde_valor){ lde_valor = 0.00;}

                // -- Inicializa -- //
              
                var li_ctd_servicio = 0;
              
                // -- Limpia Cronograma -- //
            
                if( is_flg_cronograma_cuoi == 'SI' ){
                    
                    var container = document.querySelector('#bodyCronogramaModif');
                    container.querySelectorAll('tr').forEach(function (li_i)
                    {   
                        var oCells = container.rows.item(li_i).cells;                               
                        ls_tipo_cuota = oCells.item(2).innerHTML.trim();
                        if( ls_tipo_cuota == 'ARM' || ls_tipo_cuota == 'FMA'){
                            $(li_i).remove();
                            // tab_1.tp_4.dw_det_cuotas.DeleteRow(li_i)
                        }
                    });
                                          
                }else{      
                    $("#bodyCronogramaModif").empty();           
                }
                        
                // -- Detalle de servicios -- //
                
                var container2 = document.querySelector('#bodyServicioVin');
                container2.querySelectorAll('tr').forEach(function (li_i)
                { 
                    var oCells = container2.rows.item(li_i).cells;           
                    lde_saldo_detalle  = oCells.item(1).innerHTML.trim();
                    lde_saldo_detalle = pasaAnumero(lde_saldo_detalle);
                    var  cod_servicio = $(li_i).attr("name");
                  
                    // -- Inicializa -- //
                  
                    if ( lde_saldo_detalle == '' || lde_saldo_detalle == null) { lde_saldo_detalle = 0;}
                    var lde_valor_igv_detalle = 0;
                    var ls_flg_afecto_igv = 'NO';
                  
                    // -- Si tiene saldo a financiar -- //
                              
                    if( lde_saldo_detalle > 0 ){
                                 
                        li_ctd_servicio++;
                                 
                        // -- Flag -- //

                        ls_flg_afecto_igv = $("#flg_afecto_igv_"+cod_servicio).val();
                                 
                        if(ls_flg_afecto_igv == '' || ls_flg_afecto_igv == null) { ls_flg_afecto_igv = 'NO';}
                        if( ls_flg_afecto_igv == 'SI'){  lde_valor_igv_detalle = lde_valor_igv_det;}

                        // -- Saldo capital -- //
                     
                        var lde_total = lde_saldo_detalle;
                        var lde_total_saldo = lde_saldo_detalle / ( 1 + lde_valor_igv_detalle );
                     
                        // -- Calculo de Cuota -- //

                        if( lde_valor <= 0 ){

                           var lde_cuota = lde_saldo_detalle / li_cuotas;

                        }else{       

                            var lde_cuota = lde_saldo_detalle * ((lde_valor * (1 + lde_valor) ** li_cuotas) / ((1 + lde_valor) ** li_cuotas - 1));

                        }
                                 
                        // -- Armar Cronograma -- //

                        for( li_i = 0; li_i < li_cuotas ; li_i ++){
          
                            // -- Calculo -- //
                             
                            var lde_interes = lde_total_saldo * lde_valor;
                             
                            // -- Datos -- //
                                         
                            var lde_capital_cuota = lde_cuota / ( 1 + lde_valor_igv_detalle );
                            var lde_igv_cuota     = lde_cuota - lde_capital_cuota;
                            var lde_amortizacion  = ( lde_cuota - lde_igv_cuota ) - lde_interes;
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
                             
                            lde_total_saldo  = lde_total_saldo - lde_amortizacion;
             
                            // -- Seteo -- //       

                            if( li_ctd_servicio <= 1 ){
                                         
                                // tab_1.tp_4.dw_det_cuotas.InsertRow(0)
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "num_cuota", li_i + ii_num_cuota_cuoi)
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_estadocuota", "REG")
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_tipo_cuota", 'ARM')
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "fch_vencimiento", lda_vencimiento)
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal", Round(lde_amortizacion, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_interes", Round(lde_interes, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_igv", Round(lde_igv_cuota, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total",  Round(lde_cuota, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_saldo",  Round(lde_cuota, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal_2",  Round(lde_amortizacion, 4)) -----------????
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total_2",  Round(lde_cuota, 4))

                                var filaCrono = '<tr>'+
                                    '<td scope="row">'+li_i+'</td>'+
                                    '<td>REGISTRADO</td>'+
                                    '<td>ARM</td>'+
                                    '<td>'+lda_vencimiento+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '</tr>';

                                document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);


                            }else{

                                var cronograma = document.getElementById('bodyCronogramaModif');
                                var li_find = cronograma.rows.length;                         

                                // li_find = tab_1.tp_4.dw_det_cuotas.Find("num_cuota = " + String(li_i + ii_num_cuota_cuoi), 1, tab_1.tp_4.dw_det_cuotas.Rowcount())

                                if(li_find == '' || li_find == null) { li_find = 0;}
                                 
                                if( li_find > 0 ){
                                                     
                                   //  tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_principal", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_principal") + Round(lde_amortizacion, 4))
                                   //  tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_interes", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_interes") + Round(lde_interes, 4))
                                   //  tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_igv", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_igv") + Round(lde_igv_cuota, 4))
                                   // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_total",  tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_total") + Round(lde_cuota, 4))
                                   // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_saldo",  tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_saldo") + Round(lde_cuota, 4))
                                   // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal_2",  Round(lde_amortizacion, 4))
                                   // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total_2",  Round(lde_cuota, 4))

                                   var filaCrono = '<tr>'+
                                        '<td scope="row">'+(li_find+li_i)+'</td>'+
                                        '<td>REGISTRADO</td>'+
                                        '<td>ARM</td>'+
                                        '<td>'+lda_vencimiento+'</td>'+
                                        '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                        '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                        '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                        '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                        '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '</tr>';
                                    document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);
                                                                    
                                }
                                                     
                            }
                                     
                        }

                        // -- Cuota Final -- //

                        var lde_sumcapital  = 0.00;
                        var lde_sumtotal    = 0.00;
                        var cronograma = document.getElementById('bodyCronogramaModif');
                        var cronogramaLenght = cronograma.rows.length;

                        for( li_i = 0 ; li_i < cronogramaLenght ; li_i++ ){                                   
                            
                            ls_tipo_cuota = oCells.item(2).innerHTML.trim();
                                                              
                            if( ls_tipo_cuota != 'CUI' ){

                                lde_sumcapital = lde_sumcapital + pasaAnumero(oCells.item(4).innerHTML.trim());

                                lde_sumtotal = lde_sumtotal + pasaAnumero(oCells.item(7).innerHTML.trim());

                            }            
                        }

                        // -- Saldo sin I.G.V. -- //                

                        lde_saldo_2 =  lde_saldo_detalle / ( 1 + lde_valor_igv_detalle );

                        // -- Interes -- //
                     
                        lde_interes = (lde_saldo_2 - lde_sumcapital ) * lde_valor;  

                        // -- Amortización -- //

                        if( lde_valor <= 0 ){

                            lde_amortizacion = (lde_total - lde_sumtotal) / ( 1 + lde_valor_igv_detalle );

                        }else{       

                            lde_amortizacion = lde_saldo_2 - lde_sumcapital;

                        }
                     
                        aux_dia = ldt_fch_ven.getDate();
                        aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
                        aux_mes = ldt_fch_ven.getMonth();
                        aux_anio = ldt_fch_ven.getFullYear();
                        if(aux_mes == '0'){
                           aux_mes = '12';
                           aux_anio = ldt_fch_ven.getFullYear()-1;
                         }               
                        lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
                     
                        // -- Datos -- //
                             
                        lde_igv_cuota   = ( lde_amortizacion + lde_interes ) * lde_valor_igv_detalle;
                        lde_cuota   = ( lde_amortizacion + lde_interes ) + lde_igv_cuota;
                     
                        // -- Regenera -- //

                        lde_capital_cuota  = lde_cuota / ( 1 + lde_valor_igv_detalle );
                        lde_igv_cuota = lde_cuota - lde_capital_cuota;

                        if( lde_valor > 0 ){

                            lde_interes = lde_capital_cuota - lde_amortizacion

                        }else{

                            lde_amortizacion = lde_capital_cuota;
                        }

                        // -- Inserta -- //
                             
                        if( li_ctd_servicio <= 1 ){
                         
                            // tab_1.tp_4.dw_det_cuotas.InsertRow(0) 
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "num_cuota", li_i + ii_num_cuota_cuoi)
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_tipo_cuota", "ARM")
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_estadocuota", "REG")
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "fch_vencimiento", lda_vencimiento)
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal", Round(lde_amortizacion, 4))
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_interes", Round(lde_interes, 4))
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_igv", Round(lde_igv_cuota, 4))
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total",  Round(lde_cuota, 4))
                            // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_saldo",  Round(lde_cuota, 4))
                            var cronograma = document.getElementById('bodyCronogramaModif');
                            var li_find = cronograma.rows.length;

                            var filaCrono = '<tr>'+
                                '<td scope="row">'+(li_find+1)+'</td>'+
                                '<td>REGISTRADO</td>'+
                                '<td>ARM</td>'+
                                '<td>'+lda_vencimiento+'</td>'+
                                '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                            '</tr>';
                            document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);
                                     
                        }else{
                            var cronograma = document.getElementById('bodyCronogramaModif');
                            var li_find = cronograma.rows.length;

                            if(li_find == '' || li_find == null ) {li_find = 0;}
                         
                            if( li_find > 0 ){
                                                 
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_principal", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_principal") + Round(lde_amortizacion, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_interes", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_interes") + Round(lde_interes, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_igv", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_igv") + Round(lde_igv_cuota, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_total",  tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_total") + Round(lde_cuota, 4))
                                // tab_1.tp_4.dw_det_cuotas.SetItem(li_find, "imp_saldo",  tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_find, "imp_saldo") + Round(lde_cuota, 4))

                                var filaCrono = '<tr>'+
                                    '<td scope="row">'+(li_find+1)+'</td>'+
                                    '<td>REGISTRADO</td>'+
                                    '<td>ARM</td>'+
                                    '<td>'+lda_vencimiento+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                                '</tr>';
                                document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);
            
                            }
                                             
                        }
                              
                    }//if lde_saldo_detalle > 0
                              
                });//foreach serv vin

            }else{ // -- No integrales -- //
        
                lde_valor = ( 1 + (lde_valor / 100)) ** ( 1 / 12 ) - 1;
                if(lde_valor == '' || lde_valor == null){ lde_valor = 0.00;}
              
                // -- Total en caso no haber interes -- //
              
                lde_total = lde_saldo;
              
                if( lde_porc_total > 0 ){

                    lde_total_saldo = lde_saldo * lde_porc_total / ( 1 + lde_valor_igv_det ) + lde_saldo * ( 1 - lde_porc_total);

                }else{

                   lde_total_saldo = lde_saldo / ( 1 + lde_valor_igv );

                }
        
               // -- Calculo de Cuota -- //
              
                if (lde_valor <= 0 ){

                    lde_cuota = lde_saldo / li_cuotas;

                }else{       

                    lde_cuota = lde_saldo * ((lde_valor * (1 + lde_valor) ** li_cuotas) / ((1 + lde_valor) ** li_cuotas - 1));

                }

               // -- Limpia Cronograma -- //

                if( is_flg_cronograma_cuoi == 'SI' ){
                    var container = document.querySelector('#bodyCronogramaModif');
                    container.querySelectorAll('tr').forEach(function (li_i)
                    {   
                        var oCells = container.rows.item(li_i).cells;                               
                        ls_tipo_cuota = oCells.item(2).innerHTML.trim();
                        if( ls_tipo_cuota == 'ARM' || ls_tipo_cuota == 'FMA'){
                            $(li_i).remove();
                            // tab_1.tp_4.dw_det_cuotas.DeleteRow(li_i)
                        }
                    });
                                          
                }else{  

                    $("#bodyCronogramaModif").empty();           
                }
                          
                // -- Armar Cronograma -- //

                for( li_i = 0 ; li_i < li_cuotas ; li_i++ ){ 

                    // -- Calculo -- //
 
                    lde_interes = lde_total_saldo * lde_valor;
                  
                    // -- Datos -- //
                  
                    if( lde_porc_total > 0 ){           

                       lde_capital_cuota   = lde_cuota * lde_porc_total;
                       lde_capital_cuota   = lde_capital_cuota / ( 1 + lde_valor_igv_det );
                       lde_capital_cuota_2 = lde_cuota * ( 1 - lde_porc_total);
                       lde_capital_cuota   = lde_capital_cuota + lde_capital_cuota_2;
                                 
                    }else{

                       lde_capital_cuota = lde_cuota / ( 1 + lde_valor_igv );

                    }
                     
                    lde_igv_cuota    = lde_cuota - lde_capital_cuota;
                    lde_amortizacion = ( lde_cuota - lde_igv_cuota ) - lde_interes;
                    aux_dia = ldt_fch_ven.getDate();
                    aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
                    aux_mes = ldt_fch_ven.getMonth();
                    aux_anio = ldt_fch_ven.getFullYear();
                    if(aux_mes == '0'){
                       aux_mes = '12';
                       aux_anio = ldt_fch_ven.getFullYear()-1;
                     }               
                    lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
                  
                    // -- Saldos -- //
                  
                    lde_total_saldo = lde_total_saldo - lde_amortizacion;

                    // -- Seteo -- //
                              
                    // tab_1.tp_4.dw_det_cuotas.InsertRow(0)
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "num_cuota", li_i + ii_num_cuota_cuoi)
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_estadocuota", "REG")
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_tipo_cuota", 'ARM')
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "fch_vencimiento", lda_vencimiento)
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal", Round(lde_amortizacion, 4))
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_interes", Round(lde_interes, 4))
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_igv", Round(lde_igv_cuota, 4))
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total",  Round(lde_cuota, 4))
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_saldo",  Round(lde_cuota, 4))
                    // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "flg_generar_mora",  "SI")

                    var filaCrono = '<tr>'+
                        '<td scope="row">'+(li_i+1)+'</td>'+
                        '<td>REGISTRADO</td>'+
                        '<td>ARM</td>'+
                        '<td>'+lda_vencimiento+'</td>'+
                        '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                        '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                        '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                        '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                        '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                        '<input type="hidden" id="flg_generar_mora_'+(li_i+1)+'" value="SI">'+
                    '</tr>';
                    document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);

                              
                }
              
               // -- Cuota Final -- //
              
               lde_sumcapital  = 0.00;
               lde_sumtotal    = 0.00;
                          
                var cronograma = document.getElementById('bodyCronogramaModif');
                var cronogramaLenght = cronograma.rows.length;

                for( li_i = 0 ; li_i < cronogramaLenght ; li_i++ ){                                   
                    
                    ls_tipo_cuota = oCells.item(2).innerHTML.trim();
                                                      
                    if( ls_tipo_cuota != 'CUI' ){

                        lde_sumcapital = lde_sumcapital + pasaAnumero(oCells.item(4).innerHTML.trim());

                        lde_sumtotal = lde_sumtotal + pasaAnumero(oCells.item(7).innerHTML.trim());
                        console.log('lde_sumcapital for',oCells.item(4).innerHTML.trim());
                        console.log('lde_sumtotal for',oCells.item(7).innerHTML.trim());

                    }            
                }
                          
                if( lde_porc_total > 0 ){

                    lde_saldo_2 = lde_saldo * lde_porc_tota;
                    lde_saldo_2 = lde_saldo_2 / ( 1 + lde_valor_igv_det );
                    lde_saldo_3 = lde_saldo * ( 1 - lde_porc_total);
                    lde_saldo_2 = lde_saldo_2 + lde_saldo_3;

                }else{
                              
                    lde_saldo_2 =  lde_saldo / ( 1 + lde_valor_igv );
                              
                }
              
                lde_interes = (lde_saldo_2 - lde_sumcapital ) * lde_valor;
                          
                if (lde_valor <= 0) {

                    if (lde_porc_total > 0){
                                             
                        lde_amortizacion = (lde_total - lde_sumtotal);
                        lde_amortizacion_2 = lde_amortizacion;
                        lde_amortizacion = lde_amortizacion * lde_porc_total;
                        lde_amortizacion_afecta = lde_amortizacion / ( 1 + lde_valor_igv_det );
                        lde_amortizacion = (lde_amortizacion / ( 1 + lde_valor_igv_det )) + (lde_amortizacion_2 * ( 1 - lde_porc_total));
                                 
                    }else{

                        lde_amortizacion = (lde_total - lde_sumtotal) / ( 1 + lde_valor_igv );

                    }
                              
                }else{       
                    
                    lde_amortizacion = lde_saldo_2 - lde_sumcapital;

                }
                
                aux_dia = ldt_fch_ven.getDate();
                aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
                aux_mes = ldt_fch_ven.getMonth();
                aux_anio = ldt_fch_ven.getFullYear();
                if(aux_mes == '0'){
                   aux_mes = '12';
                   aux_anio = ldt_fch_ven.getFullYear()-1;
                 }               
                lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
              
                // -- Datos -- //
                          
                if (lde_porc_total > 0){

                    lde_igv_cuota = ( lde_amortizacion_afecta + lde_interes ) * lde_valor_igv_det;
 
                }else{
 
                    lde_igv_cuota = ( lde_amortizacion + lde_interes ) * lde_valor_igv;
 
                }
              
                lde_cuota = ( lde_amortizacion + lde_interes ) + lde_igv_cuota;
              
                // -- Regenera -- //

                if (lde_porc_total > 0) {
                             
                    lde_capital_cuota   = lde_cuota * lde_porc_total;
                    lde_capital_cuota   = lde_capital_cuota / ( 1 + lde_valor_igv_det );
                    lde_capital_cuota_2 = lde_cuota * ( 1 - lde_porc_total);
                    lde_capital_cuota   = lde_capital_cuota + lde_capital_cuota_2;
                              
                }else{

                    lde_capital_cuota  = lde_cuota / ( 1 + lde_valor_igv );

                }
                         
                lde_igv_cuota = lde_cuota - lde_capital_cuota;
              
                if (lde_valor > 0) {

                    lde_interes = lde_capital_cuota - lde_amortizacion;

                }else{

                    lde_amortizacion = lde_capital_cuota;

                }
                console.log('lde_amortizacion',lde_amortizacion);
                // -- Inserta -- //
                var cronograma = document.getElementById('bodyCronogramaModif');
                var li_find = cronograma.rows.length;

                // tab_1.tp_4.dw_det_cuotas.InsertRow(0) 
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "num_cuota", li_i + ii_num_cuota_cuoi)
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_tipo_cuota", "ARM")
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "cod_estadocuota", "REG")
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "fch_vencimiento", lda_vencimiento)
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_principal", Round(lde_amortizacion, 4))
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_interes", Round(lde_interes, 4))
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_igv", Round(lde_igv_cuota, 4))
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_total",  Round(lde_cuota, 4))
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "imp_saldo",  Round(lde_cuota, 4))
                // tab_1.tp_4.dw_det_cuotas.SetItem(li_i + ii_num_cuota_cuoi, "flg_generar_mora",  "SI")

                var filaCrono = '<tr>'+
                    '<td scope="row">'+(li_find+1)+'</td>'+
                    '<td>REGISTRADO</td>'+
                    '<td>ARM</td>'+
                    '<td>'+lda_vencimiento+'</td>'+
                    '<td style="text-align: right;">'+Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '<td style="text-align: right;">'+Number(lde_interes).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '<td style="text-align: right;">'+Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '<td style="text-align: right;">'+Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '<input type="hidden" id="flg_generar_mora_'+(li_find+1)+'" value="SI">'+
                '</tr>';
                document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);                
                          
            }//if integrales
          
            // -- Recupera -- //
            var cronograma = document.getElementById('bodyDetCttoModif');  //=============================>>>>>>>>>no deberia ser el serv ppal???==========
            var li_row = cronograma.rows.length;

            if( li_row > 0 ){           
                var ls_flg_ds = $("#ls_flg_ds_"+li_row).val();
                var ls_num_servicio_foma = $("#num_servicio_foma_"+li_row).val();
              
                // -- DS -- //
              
                if( ls_flg_ds == null || ls_flg_ds == ''){ ls_flg_ds = 'NO';}
                if( ls_num_servicio_foma == null || ls_num_servicio_foma == ''){ ls_num_servicio_foma = '';}
              
                if (ls_flg_ds == 'SI' && ls_num_servicio_foma == '' ){
                    
                    swal({
                        title: "",
                        text: "Debe generar el cronograma de pagos del fondo de mantenimiento.",
                        type: "warning",
                        confirmButtonText: "Aceptar",
                        onBeforeOpen: document.getElementById("fchVenCronograma").focus()
                    })
                }
            }
          
            // -- FOMA -- //

            aux_dia = ldt_fch_ven.getDate();
            aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
            var aux_mes = ldt_fch_ven.getMonth();
            aux_anio = ldt_fch_ven.getFullYear();
            if(aux_mes == '0'){
              aux_mes = '12';
              aux_anio = ldt_fch_ven.getFullYear()-1;
            }               
            lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;

            $("#fchVenCronoFOMA").datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", lda_vencimiento);
        //fin case 3 de aqui en adelante segui caso el remanso y jde
    }//switch
    // -- Filas -- //
    $("#cambioCronograma").val('SI');
    calcular();
}//function cronogramaModif


//----------------------------------------------------------------------------------------------//
//-----------------------------FUNCIÓN CUOTAS DEFINIDAS-----------------------------------------//   
//----------------------------------------------------------------------------------------------//

function CuoDefinidas() {
 
var gde_igv = 0.18;
var lde_valor_igv = 0;
var is_tipo_calculo_interes = '3';
var is_tipo_redondeo = 'ARRIBA';
var li_ini = document.getElementById("cuoIni").value;
var li_fin = document.getElementById("cuoFin").value;
var lde_valor = document.getElementById("valCuo").value;
var lde_valor_aux = parseInt(lde_valor);

// // -- Afecto a I.G.V. -- //

  var ls_cod_servicio = [];
  var row = $("#bodyDetCttoModif").length;
  var codServicio = $("#bodyDetCttoModif")
    for (var i = 0; i < row; i++) {
       ls_cod_servicio = $(codServicio[i]).val(); 

        // -- Flag -- //
         
      //    SELECT  vtama_tipo_servicio.flg_afecto_igv
      //    INTO                     :ls_flg_afecto_igv
      //    FROM                   vtama_servicio
      //    INNER JOIN vtama_tipo_servicio ON vtama_servicio.cod_tipo_servicio = vtama_tipo_servicio.cod_tipo_servicio
      //    WHERE vtama_servicio.cod_servicio = :ls_cod_servicio
        var ls_flg_afecto_igv = document.getElementById("flg_afecto_igv_"+ls_cod_servicio).value;
         
        if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
            ls_flg_afecto_igv = 'NO';
        }
     
        // -- Si? -- //
         
        if(ls_flg_afecto_igv == 'SI'){
            break;
        }
                 
    }
                
    if(ls_flg_afecto_igv == null || ls_flg_afecto_igv == ''){
      ls_flg_afecto_igv = 'NO'
    }

    // -- Datos -- //

    var li_total = $("#bodyCronograma tr").length;
    var ls_interes = document.getElementById("interes").value;
    if(ls_interes == 'Seleccione...'){
      ls_interes = 0;
    }
    else{
      ls_interes = pasaAnumero(ls_interes);
    }
    var lde_saldo = document.getElementById("saldoFinanciar").value;
    lde_saldo = pasaAnumero(lde_saldo);
    var ldt_emision = new Date();

    if( li_ini == null || li_ini == ''){
      swal({
          title: "Error",
          text: "Debe ingresar la cuota inicial.",
          type: "error",
          confirmButtonText: "Aceptar",
          onBeforeOpen:document.getElementById("cuoIni").focus()
      });
      return;
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
    }

    if(( lde_valor * li_fin ) > lde_saldo){
      swal({
          title: "Error",
          text: "El total a generar no puede ser mayor que el saldo a financiar.",
          type: "error",
          confirmButtonText: "Aceptar"
      });
      return;
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

            filas=document.querySelectorAll("#bodyCronograma tr");
            result = filas[li_i-1].querySelectorAll("td");
            lde_cuota = result[4].textContent;
            lde_cuota = pasaAnumero(lde_cuota);
            lde_suma_capital = lde_suma_capital + lde_cuota;
              
        }
       
        var lde_x_financiar = document.getElementById("saldoFinanciar").value;
        lde_x_financiar = pasaAnumero(lde_x_financiar);

        var lde_x_financiar2 = document.getElementById("saldoFinanciar").value;
        lde_x_financiar2 = pasaAnumero(lde_x_financiar2);

        var li_final = $("#bodyCronograma tr").length;
       
        lde_x_financiar = (lde_x_financiar / (lde_valor_igv + 1));
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
         
            // -- Seteo -- //

            var filas=document.querySelectorAll("#bodyCronograma tr");
            result = filas[li_i-1].querySelectorAll("td");
         

            aux1 = Number(lde_capital_actual).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[4].innerHTML = aux1;
            if(lde_interes_cuota == 0){
              aux2 = '0.00'
            }else{
              aux2 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            }
            result[5].innerHTML = aux2;
            aux3 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[6].innerHTML = aux3;
            aux4 = Number(lde_total_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[7].innerHTML = aux4;
            result[8].innerHTML = aux4;
       
        }

        if( li_fin < li_final){
            li_meses =  li_final - li_fin;
        }else{
            li_meses = 1;
        }
       
        // -- Con IGV -- //
       
        lde_saldo = lde_saldo + ( lde_saldo * lde_valor_igv );
       
        // -- El interes es mensual -- //
       
        if( lde_interes <= 0){
            lde_cuota = lde_saldo / li_meses;
        }else{        
            lde_cuota = lde_saldo * (( lde_interes * ( 1 + lde_interes ) ** li_meses )  /  ((1 + lde_interes ) ** li_meses - 1));
        }    
       
        // -- Redondeo -- //
       
        switch(is_tipo_redondeo){                  
            case 'ARRIBA':
                lde_cuota = Math.ceil(lde_cuota);          
            case 'CERO':
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

             // -- Saldo -- //
         
            lde_saldo = lde_saldo - lde_amortizacion;
         
            // -- Seteo -- //

            var filas=document.querySelectorAll("#bodyCronograma tr");
            result = filas[li_i-1].querySelectorAll("td");

            aux1 = Number(lde_amortizacion).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[4].innerHTML = aux1;
            if(lde_interes_cuota == 0){
                aux2 = '0.00'
            }else{
                aux2 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            }
            result[5].innerHTML = aux2;
            aux3 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[6].innerHTML = aux3;
            aux4 = Number(lde_total_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[7].innerHTML = aux4;
            result[8].innerHTML = aux4;
                       
        }
                                 
        // -- Final -- //
       
        if( li_fin < li_final){
                       
            lde_suma_capital = 0;
            var lde_suma_total = 0;
         
            for(li_i = 1; li_i <= (li_final - 1); li_i++){

                filas=document.querySelectorAll("#bodyCronograma tr");
                result = filas[li_i-1].querySelectorAll("td");
                aux = pasaAnumero(result[4].innerHTML);
                var lde_suma_capital = lde_suma_capital + aux;
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
                   lde_cuota = Math.ceil(lde_cuota);
                               
                case 'CERO':
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
            aux2 = Number(lde_saldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[4].innerHTML = aux2;
            if(lde_interes_cuota == 0){
              aux3 = '0.00'
            }else{
              aux3 = Number(lde_interes_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            }
            result[5].innerHTML = aux3;
            if(lde_igv_cuota == 0){
              aux4 = '0.00'
            }else{
              aux4 = Number(lde_igv_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            }
            result[6].innerHTML = aux4;
            aux5 = Number(lde_cuota).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            result[7].innerHTML = aux5;
            result[8].innerHTML = aux5;
        } //( li_fin < li_final)                       
    //  fin Case igual que el cronograma                             
  }
  calcular();
}

//----------------------------------------------------------------------------------------------//
//----------------------------------FUNCIÓN CALCULAR--------------------------------------------//
//----------------------------------------------------------------------------------------------//


function calcular() {
    // obtenemos todas las filas del tbody
    var filas=document.querySelectorAll("#bodyCronogramaModif tr");
 
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
    var filas=document.querySelectorAll("#footCronogramaModif tr td");
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