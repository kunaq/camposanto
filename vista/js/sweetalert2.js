var SweetAlert2Demo = {
    init: function() {
        $("#m_sweetalert_demo_1").click(function(e) {
            swal("no fila")
        }),
        $("#m_sweetalert_demo_2").click(function(e) {
            swal("Here's the title!", "no cantidad")
        }),
        $("#m_sweetalert_demo_3_1").click(function(e) {
            swal("Good job!", "You clicked the button!", "warning")
        }),
        $("#m_sweetalert_demo_3_2").click(function(e) {
            swal("Good job!", "You clicked the button!", "error")
        }),
        $("#m_sweetalert_demo_3_3").click(function(e) {
            swal("Good job!", "You clicked the button!", "success")
        }),
        $("#m_sweetalert_demo_3_4").click(function(e) {
            swal("Good job!", "You clicked the button!", "info")
        }),
        $("#m_sweetalert_demo_3_5").click(function(e) {
            swal("Good job!", "You clicked the button!", "question")
        }),
        $("#m_sweetalert_demo_4").click(function(e) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                confirmButtonText: "Confirm me!",
                confirmButtonClass: "btn btn-focus m-btn m-btn--pill m-btn--air"
            })
        }),
        $("#m_sweetalert_demo_5").click(function(e) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                confirmButtonText: "<span><i class='la la-headphones'></i><span>I am game!</span></span>",
                confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
                showCancelButton: !0,
                cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
            })
        }),
        $("#m_sweetalert_demo_6").click(function(e) {
            swal({
                position: "top-right",
                type: "success",
                title: "Your work has been saved",
                showConfirmButton: !1,
                timer: 1500
            })
        }),
        $("#m_sweetalert_demo_7").click(function(e) {
            swal({
                title: "jQuery HTML example",
                html: $("<div>").addClass("some-class").text("jQuery is everywhere."),
                animation: !1,
                customClass: "animated tada"
            })
        }),
        $(".m_sweetalert_elimina_servicio").click(function(e) {
            console.log(this.id);
        	var nFilas = $("#bodyServicio tr").length;
        	if(nFilas == 0){

	            swal({
	                title: "Error",
	                text: "Debe haber al menos un elemento en la tabla.",
	                type: "error",
	                confirmButtonText: "Aceptar",
	            })
        	}
        	else{
        		document.querySelectorAll('.elimina').forEach(function (chek) {
					
					if(chek.classList.length > 1){
						var id1 = chek.id;
						if(chek.checked){
							swal({
				                title: "¿Está seguro de eliminar los elementos seleccionados?",
				                type: "question",
				                showCancelButton: !0,
				                confirmButtonText: "Si, eliminar",
				                cancelButtonText: "No, cancelar"
				            }).then(function(e) {
				                e.value ? swal({
				                	title:"Eliminados", 
				                	text:"Se han eliminado los elementos seleccionados.",
				                	type: "success",
				                	onBeforeOpen: igual0() 
				                	
				                }) : "cancel" === e.dismiss
				            })
							
						}
					}
				});
        	}
        }),
        $("#m_sweetalert_demo_9").click(function(e) {
            var nFilas = $("#bodyDscto tr").length;
            if(nFilas == 0){s
                swal({
                    title: "Error",
                    text: "Debe haber al menos un elemento en la tabla.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                })
            }
            else{
                document.querySelectorAll('.eliminaDscto').forEach(function (chek) {
                    
                    if(chek.classList.length > 1){
                        var id1 = chek.id;
                        if(chek.checked){
                            swal({
                                title: "¿Está seguro de eliminar los elementos seleccionados?",
                                type: "question",
                                showCancelButton: !0,
                                confirmButtonText: "Si, eliminar",
                                cancelButtonText: "No, cancelar"
                            }).then(function(e) {
                                e.value ? swal({
                                    title:"Eliminados", 
                                    text:"Se han eliminado los elementos seleccionados.",
                                    type: "success",
                                    onBeforeOpen: igual0Dscto() 
                                    
                                }) : "cancel" === e.dismiss
                            })
                            
                        }
                    }
                });
            }
        }),
        $("#m_sweetalert_demo_10").click(function(e) {
             var nFilas = $("#bodyCobertura tr").length;
            if(nFilas == 0){

                swal({
                    title: "Error",
                    text: "Debe haber al menos un elemento en la tabla.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                })
            }
            else{
                document.querySelectorAll('.eliminaEndoso').forEach(function (chek) {
                    
                    if(chek.classList.length > 1){
                        var id1 = chek.id;
                        if(chek.checked){
                            swal({
                                title: "¿Está seguro de eliminar los elementos seleccionados?",
                                type: "question",
                                showCancelButton: !0,
                                confirmButtonText: "Si, eliminar",
                                cancelButtonText: "No, cancelar"
                            }).then(function(e) {
                                e.value ? swal({
                                    title:"Eliminados", 
                                    text:"Se han eliminado los elementos seleccionados.",
                                    type: "success",
                                    onBeforeOpen: igual0Endoso() 
                                    
                                }) : "cancel" === e.dismiss
                            })
                            
                        }
                    }
                });
            }
        }),
        $("#m_sweetalert_demo_11").click(function(e) {
            swal({
                title: "Auto close alert!",
                text: "I will close in 5 seconds.",
                timer: 5e3,
                onOpen: function() {
                    swal.showLoading()
                }
            }).then(function(e) {
                "timer" === e.dismiss && console.log("I was closed by the timer")
            })
        })
    }
};
jQuery(document).ready(function() {
    SweetAlert2Demo.init()
});

function igual0(){
	document.querySelectorAll('.elimina').forEach(function (chek) {
        console.log('llego igual0');
		if(chek.checked){
			$(chek).parents("tr").remove();
			if ($("#bodyServicio tr").length==0) {
				document.getElementsByClassName("Total A")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total B")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total C")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total D")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total E")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total F")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total G")[0].innerHTML = '0.00';
				document.getElementsByClassName("Total H")[0].innerHTML = '0.00';
				var cui = document.getElementsByClassName("Total E")[0].innerHTML;
		        document.getElementById("importeCUI").value = cui;
		    	var tot = document.getElementsByClassName("Total A")[0].innerHTML;
                document.getElementsByClassName("TotalD A")[0].innerHTML = tot;
		        document.getElementById("saldopagar").value = tot;
                document.getElementById("saldoFinanciar").value = tot;
                document.getElementById("cuitotal").value = cui;
                document.getElementById("total1").value = tot;
                document.getElementById("imp_cobertura").value = tot;
                document.getElementById("imp_dscto").value = tot;
                var container = document.querySelector('#bodyDscto');
                container.querySelectorAll('tr').forEach(function (chek) {
                    $(chek).remove();
                });
                document.getElementById("endoso1").value = tot;
                document.getElementsByClassName("totalEndoso")[0].innerHTML = tot;
                var container1 = document.querySelector('#bodyCobertura');
                container1.querySelectorAll('tr').forEach(function (chek) {
                    $(chek).remove();
                });
                $("#numCuotas").val('').trigger('change');
                $("#interes").val('').trigger('change');
                document.getElementById("imp_saldo_foma").value = tot;
                $("#cuota_FOMA").val('').trigger('change');
                var ldt_fch_ven = $('#m_datepicker_1').datepicker("getDate");
                aux_dia = ldt_fch_ven.getDate();
                aux_mes1 = ldt_fch_ven.setMonth(ldt_fch_ven.getMonth() + 1);
                var aux_mes = ldt_fch_ven.getMonth();
                if(aux_mes == '0'){
                   aux_mes = '12';
                }
                aux_anio = ldt_fch_ven.getFullYear();               
                lda_vencimiento = aux_dia+'/'+aux_mes+'/'+aux_anio;
                $("#m_datepicker_1").datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", lda_vencimiento);
                $("#m_datepicker_2_validate").datepicker({ dateFormat: 'dd/mm/yy' }).datepicker("setDate", lda_vencimiento);
                var container2 = document.querySelector('#bodyCronograma');
                container2.querySelectorAll('tr').forEach(function (chek) {
                    $(chek).remove();
                });
                calcular();
			}
			else{
				sumatabla();
			}
		}
		/*else if(!chek.checked){
			alert('no check');
			swal.fire({
                title: "Error",
                text: "Debe seleccionar al menos un elemento de la tabla.",
                type: "error",
                confirmButtonText: "aceptar"
            })
		}*/
	});
}
function igual0Dscto(){
    document.querySelectorAll('.eliminaDscto').forEach(function (chek) {
       // console.log(chek);
        if(chek.checked){
            $(chek).parents("tr").remove();
            cambiaTodo();
        }
        /*else if(!chek.checked){
            alert('no check');
            swal.fire({
                title: "Error",
                text: "Debe seleccionar al menos un elemento de la tabla.",
                type: "error",
                confirmButtonText: "aceptar"
            })
        }*/
    });
}

function igual0Endoso(){
    document.querySelectorAll('.eliminaEndoso').forEach(function (chek) {
       // console.log(chek);
        if(chek.checked){
            $(chek).parents("tr").remove();
            if ($("#bodyCobertura tr").length==0) {
                document.getElementsByClassName("totalEndoso")[0].innerHTML = '0.00';
            }
            cambiaTodo();
        }
        /*else if(!chek.checked){
            alert('no check');
            swal.fire({
                title: "Error",
                text: "Debe seleccionar al menos un elemento de la tabla.",
                type: "error",
                confirmButtonText: "aceptar"
            })
        }*/
    });
}

function nombreMes(val){
   if(val == 1){
    return 'ENERO';
   }
   else if (val == 2) {
    return 'FEBRERO';
   }
    else if (val == 3) {
    return 'MARZO';
   }
    else if (val == 4) {
    return 'ABRIL';
   }
    else if (val == 5) {
    return 'MAYO';
   }
    else if (val == 6) {
    return 'JUNIO';
   }
    else if (val == 7) {
    return 'JULIO';
   }
    else if (val == 8) {
    return 'AGOSTO';
   }
    else if (val == 9) {
    return 'SEPTIEMBRE';
   }
    else if (val == 10) {
    return 'OCTUBRE';
   }
    else if (val == 11) {
    return 'NOVIEMBRE';
   }
    else if (val == 12) {
    return 'DICIEMBRE';
   }

}